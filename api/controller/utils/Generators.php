<?php

class Generators
{
    public static function getRandomNumbersWithinRange($min, $max){
        return mt_rand((int)$min, (int)$max);
    }

    public static function getRandomCharacter($length)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $actual = substr(str_shuffle($str_result), 0, $length);
        $main = time() . "_" . $actual; 
        return $main;
    }

    public static function picker($array)
    {
        $index = array_rand($array);
        return $array[$index];
    }
}


?>