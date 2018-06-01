<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/6/1
 * Time: 15:10
 */

namespace config;


class Config
{
    private static $config;

    static public function init($config){
        self::$config = $config;
    }

    static public function get($name){
        return self::$config[$name];
    }

    static public function set($name,$value){
        self::$config[$name] = $value;
    }

}