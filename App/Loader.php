<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/17
 * Time: 17:37
 */

namespace App;


class Loader {

    public static function autoload($class){
        require BASEDIR.'/'.str_replace('\\','/',$class).'.php';
    }
} 