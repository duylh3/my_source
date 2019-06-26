<?php

/**
 * log lai data
 *
 * @param $fileName
 * @param $data
 */
function logDataApi($fileName, $data) {
    $date = date('Ymd');
    $data['date'] = date('Y-m-d H:i:s');
    file_put_contents(storage_path() . "/{$date}-{$fileName}", "\n\n", FILE_APPEND);
    file_put_contents(storage_path() . "/{$date}-{$fileName}", json_encode($data), FILE_APPEND);
}

/**
 * curl post data
 *
 * @param $url
 * @param array $params
 * @return mixed
 */
function curlPost($url, $params = array(), $isUseProxy = false) {
//    echo '<pre>';
//print_r($params);
//echo '</pre>';
//die;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    if ($isUseProxy == true) {
        curl_setopt($ch, CURLOPT_PROXY, env("PROXY_HOST") . ":" . env("PROXY_PORT"));
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json')
    );

//    if (env('APP_ENV') === 'local') {
//        curl_setopt($ch, CURLOPT_RESOLVE, ["hi-pri.fpt.vn:80:172.20.17.20"]);
//    }

    $output = curl_exec($ch);
//    echo '<pre>';
//    print_r(123);
//    echo '</pre>';
//    die;
    curl_close($ch);
    return $output;
}

/**
 * curl post data
 *
 * @param $url
 * @param array $params
 * @return mixed
 */
function curlPostSession($url, $params = array(), $session, $isUseProxy = false) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    if ($isUseProxy == true) {
        curl_setopt($ch, CURLOPT_PROXY, env("PROXY_HOST") . ":" . env("PROXY_PORT"));
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        "session: $session"
    ));

    if (env('APP_ENV') === 'local') {
        curl_setopt($ch, CURLOPT_RESOLVE, ["hi-pri.fpt.vn:80:172.20.17.20"]);
    }


    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

/**
 *
 * @return mixed
 */
function mobileDetect() {

    if (isset($_SERVER['HTTP_USER_AGENT']) == FALSE) {
        return false;
    }
    $device = '';
    if (stristr($_SERVER['HTTP_USER_AGENT'], 'ipad')) {
        $device = "ipad";
    } else if (stristr($_SERVER['HTTP_USER_AGENT'], 'Windows Phone')) {
        $device = "Windows Phone";
        return $device;
    } else if (stristr($_SERVER['HTTP_USER_AGENT'], 'iphone') || strstr($_SERVER['HTTP_USER_AGENT'], 'iphone')) {
        $device = "iphone";
        return $device;
    } else if (stristr($_SERVER['HTTP_USER_AGENT'], 'blackberry')) {
        $device = "blackberry";
        return $device;
    } else if (stristr($_SERVER['HTTP_USER_AGENT'], 'android')) {
        $device = "android";
        return $device;
    }
    return false;
}
