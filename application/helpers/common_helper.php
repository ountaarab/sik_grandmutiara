<?php

if (!function_exists('en_crypt')) {
    function en_crypt($string)
    {
        $output = false;
        /*
        * read sekuritas.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
        Develop by : Fazri Ramadhan
        Email : fazri.rramadhanh@gmail.com
        */
        $security       = parse_ini_file("sekuritas.ini");
        $secret_key     = $security["encryption_key"];
        $secret_iv      = $security["iv"];
        $encrypt_method = $security["encryption_mechanism"];

        // hash
        $key    = hash("sha256", $secret_key);

        // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
        $iv     = substr(hash("sha256", $secret_iv), 0, 16);

        //do the encryption given text/string/number
        $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($result);
        return $output;
    }
}


if (!function_exists('de_crypt')) {
    function de_crypt($string)
    {

        $output = false;
        /*
        * read sekuritas.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
         Develop by : Hirakusan
        Email : hirakusan10@gmail.com
        */

        $security       = parse_ini_file("sekuritas.ini");
        $secret_key     = $security["encryption_key"];
        $secret_iv      = $security["iv"];
        $encrypt_method = $security["encryption_mechanism"];

        // hash
        $key    = hash("sha256", $secret_key);

        // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
        $iv = substr(hash("sha256", $secret_iv), 0, 16);

        //do the decryption given text/string/number

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }
}
