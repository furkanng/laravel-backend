<?php

namespace App\Helper;

class Helper
{
    static public function generateRandomCode($len = 6, $number = true, $upper = false, $lower = true, $allwOnlyNumeric = true)
    {
        $charSet = '';
        if ($number) {
            $charSet .= '0123456789';
        }
        if ($upper) {
            $charSet .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($lower) {
            $charSet .= 'abcdefghijklmnopqrstuwxyz';
        }
        $max = strlen($charSet) - 1;
        $code = '';
        for ($i = 0; $i < $len; $i++) {
            $code .= substr($charSet, rand(0, $max), 1);
        }

        if ($allwOnlyNumeric === false && is_numeric($code)) {
            return self::generateRandomCode($len, $number, $upper, $lower, $allwOnlyNumeric);
        }

        return $code;
    }

}
