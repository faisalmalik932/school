<?php

namespace App\Http\Helpers;

/**
 * Created by PhpStorm.
 * User: nayabraheel
 * Date: 05/04/2018
 * Time: 1:01 AM
 */
class CryptoHelper
{
    public static function encryptString($value) {
        $hashmethod = "aes-256-cbc";
        $secretkey = substr(hash('sha256', "WB@eP>[44u>`jrBbn.$/ZvZ3':RC=WCTakwC<=6/Dn8Ur2VV9mB.Pp6Z=tKv!]'D", true), 0, 32);
        // IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        return base64_encode(openssl_encrypt($value, $hashmethod, $secretkey, OPENSSL_RAW_DATA, $iv));
    }

    public static function decryptString($value) {
        $hashmethod = "aes-256-cbc";
        $secretkey = substr(hash('sha256', "WB@eP>[44u>`jrBbn.$/ZvZ3':RC=WCTakwC<=6/Dn8Ur2VV9mB.Pp6Z=tKv!]'D", true), 0, 32);
        // IV must be exact 16 chars (128 bit)
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        return openssl_decrypt(base64_decode($value), $hashmethod, $secretkey, OPENSSL_RAW_DATA, $iv);
    }
}