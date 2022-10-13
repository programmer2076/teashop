<?php

namespace App\Services;

class Money{

     // Usage # echo to_pennies("1"); // 100
    static function toPennies($value){
        return intval(
            strval(floatval(
                preg_replace("/[^0-9.]/", "", $value)
            ) * 100)
        );
    }

    
    static function toCent($value): int{
        return (int) (string) ((float) preg_replace("/[^0-9.]/", "", $value) * 100);
    }
}