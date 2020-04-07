<?php


namespace App\Mixins;


class StrMixins
{
    protected function prefix(){
        return function($string, $prefix = "AB-"){
            return $prefix.$string;
        };
    }
}
