<?php

//use Hekmatinasser\Verta\Verta;


if (!function_exists('hasPermission')) {

    function hasPermission($permission)
    {
      return is_array(old('permissions')) ? in_array($permission, old('permissions')) : false ;
    }
}

if (!function_exists('arrayTwoItem')) {


    function arrayTwoItem($result)
    {
        $arr=[];
        foreach ($result as $item){
            $test = array_keys($item);
            $arr[$item[$test[0]]]=$item[$test[1]];
        }


        return $arr;
    }

}

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

if (!function_exists('digit')) {
    function digit($number, $count)
    {
        if ($number < 10) {
            return '0' . $number;
        }
        return $number;
    }
}

if (!function_exists('convert_date')) {
    function convert_date($stringDate, $type)
    {
//        $date = convertEnglishToPersianNumber($stringDate);
//        $date = explode('/', $date);
//
//        $convert = [];
//        if (!empty($stringDate)) {
//            if ($type == 'jalali') {
//                $convert = \Hekmatinasser\Verta\Verta::getJalali($date[0], $date[1], $date[2]);
//            } else if ($type == 'gregorian') {
//                $convert = \Hekmatinasser\Verta\Verta::getGregorian($date[0], $date[1], $date[2]);
//            }
//            $convert[1] = digit($convert[1], 2);
//            $convert[2] = digit($convert[2], 2);
////            dd($convert,implode('/', $convert));
//            return implode('/', $convert);
//        } else {
//            return null;
//        }

        return $stringDate;
    }
}
