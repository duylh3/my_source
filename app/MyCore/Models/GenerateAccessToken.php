<?php

namespace App\MyCore\Models;

class GenerateAccessToken {

    public $mcKey;
    public $mcKeyPaid;

    public function __construct() {
        $this->mcKey = pack('H*', "acdf2384d22178ca23048adad123213da2390acdddddfd21348adad123213da2");
        $this->mcKeyPaid = pack('H*', "18c1a293565ab9fc52dce42878b483661b57c88ca24675cdcd4a7ee5e55e976a");
    }

    // Encrypt Function
    public function mcEncrypt($encrypt,$mcKey) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

        # creates a cipher text compatible with AES (Rijndael block size = 128)
        # to keep the text confidential
        # only suitable for encoded input that never ends with value 00h
        # (because of default zero padding)
        $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $mcKey,
            $encrypt, MCRYPT_MODE_CBC, $iv);

        # prepend the IV for it to be available for decryption
        $ciphertext = $iv . $ciphertext;

        # encode the resulting cipher text so it can be represented by a string
        return base64_encode($ciphertext);
    }

    // Decrypt Function
    public function mcDecrypt($decrypt, $mcKey) {
        $ciphertext_dec = base64_decode($decrypt);

        # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
        $iv_dec = substr($ciphertext_dec, 0, $iv_size);

        # retrieves the cipher text (everything except the $iv_size in the front)
        $ciphertext_dec = substr($ciphertext_dec, $iv_size);

        # may remove 00h valued characters from end of plain text
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $mcKey,
            $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    }

    /**
     * generate access token
     *
     * @param array $params
     * @return string
     * @author Giau Le
     */
    public function generateAccessToken($params = array()) {
        $key = implode('|', $params);
        return base64_encode($this->mcEncrypt($key,$this->mcKey));
    }

    /**
     * regenerate access token
     *
     * @param string $token
     * @return array
     * @author Giau Le
     */
    public function regenerateAccessToken($token) {
        return $this->mcDecrypt(base64_decode($token), $this->mcKey);
    }
    
    
    /**
     * generate access token
     *
     * @param array $params
     * @return string
     * @author Giau Le
     */
    public function generateAccessTokenPaid($params = array()) {
        $key = implode('|', $params);
        return base64_encode($this->mcEncrypt($key,$this->mcKeyPaid));
    }

    /**
     * regenerate access token
     *
     * @param string $token
     * @return array
     * @author Giau Le
     */
    public function regenerateAccessTokenPaid($token) {
        return $this->mcDecrypt(base64_decode($token), $this->mcKeyPaid);
    }
    

    /**
     * validateAccessToken
     *
     * Struct: phone|deviceId|tokenId|timestamp
     */
    public function checkAccessToken($token) {
        $arrData = explode('|', $this->regenerateAccessToken($token));
        if (count($arrData) == $this->numVar) {

            //check timestamp
            if ($this->checkTimestamp($arrData[3])) {
                return true;
            }
        }
        return false;
    }

    public function checkTimestamp($timestamp) {
        $nowTimestamp = time();
        if (($nowTimestamp - $timestamp) > $this->expire)
            return false;
        else
            return true;
    }

}
