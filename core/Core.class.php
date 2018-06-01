<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/5/31
 * Time: 16:52
 */

namespace Core;

use config\Config;
use core\log\Log;

class Core
{

    static public function run(){
        self::init();
        self::start();
    }

    static public function init(){
        self::autoload();
        /*
         * 初始化配置
         */
        $config = include CONFIG_PATH;
        Config::init($config);
        /*
         * 初始化日志类
         */
        Log::init(LOG_PATH,Config::get("ENABLE_LOG"));

    }

    static public function start(){

    }

    static public function autoload(){
        spl_autoload_register(function($className){
            require_once APP_PATH.DIRECTORY_SEPARATOR.$className.".class.php";
        });
    }

}