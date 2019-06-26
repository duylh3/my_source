<?php

class HashKey {
    
    //aXzJhwhkbcBsBQ710sD0iD9613VHAuzm
    public static function encodeHashKey($string, $keyEncode) {
       
        //get key
        $key = $iv = $keyEncode;
        // ma hoa RIJNDAEL 256
        $cipherText = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_CBC, $iv);
        $cipherText = $iv . $cipherText;

        // ma hoa base 64
        $cipherTextBase64 = base64_encode($cipherText);

        $cipherTextBase64 = str_replace('/', '__', $cipherTextBase64);

        return $cipherTextBase64;
    }

}
