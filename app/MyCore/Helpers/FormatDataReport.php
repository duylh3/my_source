<?php

/**
 * @author Tuyenvtt3
 */

namespace App\MyCore\Helpers;

class FormatDataReport {
    /*
     * @function: Thống kê theo ngày cho dạng biểu đồ cột
     * @return: array()
     * @author: Tuyenvtt3
     */

    public static function formatDataReportCollum($data, $listStatus) {
        $dataReport = array();
        $dataReportDate = array();
        $sumAll = 0;
        $sumMoney = 0;
        foreach ($data as $date => $items) {
            $dataReportDate[$date] = '"' . date('d/m/Y', strtotime($date)) . '"';
            if (is_array($items)) {
                foreach ($items as $key => $value) {
                    if (!isset($dataReport[$key])) {
                        $dataReport[$key] = array(
                            'name' => $listStatus[$key],
                            'data' => array()
                        );
                    }
                    if (is_array($value)and isset($value['count'])) {
                        $dataReport[$key]['data'][] = $value['count'];
                        $sumAll+=$value['count'];
                        $sumMoney+=$value['amount'];
                    } else {
                        $dataReport[$key]['data'][] = $value;
                        $sumAll+=$value;
                    }
                }
            } else {
                if (!isset($dataReport[0])) {
                    $dataReport[0] = array(
                        'name' => reset($listStatus),
                        'data' => array()
                    );
                }
                $dataReport[0]['data'][] = $items;
                $sumAll+=$items;
            }
        }
        $dataAffter = array();
        foreach ($dataReport as $key => $value) {
            $dataAffter[] = $value;
        }
//        array_multisort($dataAffter, SORT_ASC);
        return array(
            'dataReport' => $dataAffter,
            'dataReportDate' => $dataReportDate,
            'sumAll' => number_format($sumAll),
            'sumMoney' => number_format($sumMoney) . ' VND'
        );
    }

    /*
     * @function: Thống kê tất cả cho dạng biểu đồ hình bánh
     * @return: array()
     * @author: Tuyenvtt3
     */

    public static function formatDataReportPie($data, $listStatus) {
        $dataReportLine = array(
            'Tổng' => 0
        );
        $dataReportPie = array();
        $sumAll = 0;
        foreach ($data as $date => $items) {
            if (is_array($items)) {
                foreach ($items as $key => $value) {
                    if (!isset($dataReportPie[$key])) {
                        $dataReportPie[$key] = array(
                            'name' => $listStatus[$key],
                            'y' => (is_array($value)and isset($value['count'])) ? $value['count'] : $value
                        );
                    } else {
                        if (is_array($value)and isset($value['count'])) {
                            $dataReportPie[$key]['y']+=$value['count'];
                        } else {
                            $dataReportPie[$key]['y']+=$value;
                        }
                    }
                    if (!isset($dataReportLine[$listStatus[$key]])) {
                        if (is_array($value)and isset($value['count'])) {
                            $dataReportLine[$listStatus[$key]] = $value['count'];
                        } else {
                            $dataReportLine[$listStatus[$key]] = $value;
                        }
                    } else {
                        if (is_array($value)and isset($value['count'])) {
                            $dataReportLine[$listStatus[$key]]+=$value['count'];
                        } else {
                            $dataReportLine[$listStatus[$key]]+=$value;
                        }
                    }
                    if (is_array($value)and isset($value['count'])) {
                        $sumAll+=$value['count'];
                    } else {
                        $sumAll+=$value;
                    }
                }
            } else {
                $sumAll+=$items;
                $dataReportPie = null;
            }
        }
        $dataAffter = array();
        if (isset($dataReportPie)) {
            foreach ($dataReportPie as $key => $value) {
                $dataReportPie[$key]['y'] = round(($value['y'] / $sumAll) * 100, 2);
            }
            foreach ($dataReportPie as $key => $value) {
                $dataAffter[] = $value;
            }
        }
        $dataReportLine['Tổng'] = $sumAll;
        array_multisort($dataAffter, SORT_ASC);

        return array(
            'dataReportLine' => $dataReportLine,
            'dataReportPie' => $dataAffter
        );
    }

    /*
     * @function: Định dạng hiển thị trên dashboard
     * @return: array()
     * @author: Tuyenvtt3
     */

    public static function formatReportLine($listData) {
        $dataCategories = array();
        $dataValue = array();
        $i = 0;
        foreach ($listData as $index => $item) {
            $dataValue[$i]['name'] = $index;
            $dataValue[$i]['data'] = array();
            foreach ($item as $key => $value) {
                if (is_array($value)) {
                    $data = array_sum(array_values($value));
                    if (is_array($data)) {
                        $dataValue[$i]['data'][] = array_sum(array_values($data));
                    } else {
                        $dataValue[$i]['data'][] = $data;
                    }
                } else {
                    $dataValue[$i]['data'][] = $value;
                }
                $valueDate = '"' . date('d/m/Y', strtotime($key)) . '"';
                if (!in_array($valueDate, $dataCategories)) {
                    $dataCategories[] = $valueDate;
                }
            }
            $i++;
        }
        return array(
            'categories' => $dataCategories,
            'data' => $dataValue
        );
    }

    /**
     * format money
     * @author Tuyenvtt3
     */
    public static function formatMoney($money) {
   
        if ($money < 1000) {
            return $money . ' ';
        } else {
       
            return number_format(round(($money / 1000), 1)) . ' ';
        }
    }

}
