<?php

namespace Modules\Outside\Http\Controllers;

use App\MyCore\Routing\MyController;
use Modules\Outside\Http\Models\Positions;

class PositionsController extends MyController {

    private $_model = null;
    private $_params = array();

    public function __construct() {
        $options = array();
        $this->_params = \Request::all();
        $this->data['params'] = $this->_params;
        parent::__construct($options);

        $this->data['title'] = 'Danh sách ';
        $this->data['controllerName'] = 'positions';
        $this->_model = new Positions();
    }

    public function getShowPosition() {
        $data = $this->_model->showAll();
        foreach ($data as $item) {
            if ($item['position_name_1'] == 'Ban Thường Vụ') {
                $this->data['arrBanThV'][] = $item;
            }
            if ($item['position_name_2'] == 'Hội Đồng Khen Thưởng Kỷ Luật') {
                $this->data['arrKhenThuong'][] = $item;
            }
            if ($item['position_name_3'] == 'Ban Kiểm Tra') {
                $this->data['arrTest'][] = $item;
            }
            if ($item['position_name_4'] == 'Bộ Phận Văn Phòng') {
                $this->data['arrVanPhong'][] = $item;
            }
            if ($item['position_name_5'] == 'Ban Chuyên Môn') {
                $this->data['arrChuyenMon'][] = $item;
            }
            if ($item['position_name_6'] == 'Ban Tài Chính') {
                $this->data['arrTaiChinh'][] = $item;
            }
        }
        return view("outside::{$this->data['controllerName']}.show-position", $this->buildDataView($this->data));
    }

}
