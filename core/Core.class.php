<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/5/31
 * Time: 16:52
 */

namespace Core;

use config\Config;
use core\db\DbHelper;
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
        /*
         * 初始化数据库类
         */
        $dbh = DbHelper::getInstance(['host'=>Config::get("DB_HOST"),'port'=>Config::get("DB_PORT"),'dbname'=>Config::get("DB_NAME"),
            'username'=>Config::get("DB_USER"),'password'=>Config::get("DB_PWD")]);

        register_shutdown_function(function(){
            DbHelper::getInstance()->close();
        });

    }

    static public function start(){

    }

    static public function autoload(){
        spl_autoload_register(function($className){
            require_once APP_PATH.DIRECTORY_SEPARATOR.$className.".class.php";
        });
    }

}