<?php

use Hekmatinasser\Verta\Verta;

if (!function_exists('convertEnglishToPersianNumber')) {


    function convertEnglishToPersianNumber($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $output = str_replace($persian, $english, $string);
//        dd($output);
        return $output;
    }

}

if (!function_exists('convert_date')) {
    function convert_date($stringDate, $type)
    {
        $date = convertEnglishToPersianNumber($stringDate);
        $date = explode('/', $date);


        $convert = '';
        if ($type == 'jalali') {
            $convert = Verta::getJalali($date[0], $date[1], $date[2]);
        } else if ($type == 'gregorian') {
            $convert = Verta::getGregorian($date[0], $date[1], $date[2]);
        }
        return implode('/', $convert);
    }
}
