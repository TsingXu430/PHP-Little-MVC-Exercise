<?php
/**
 * Created by PhpStorm.
 * User: TsingXu
 * 入口文件
 * Date: 2018/5/31
 * Time: 16:40
 */

define("APP_PATH",dirname(__FILE__));
define("CONFIG_DIR_PATH",APP_PATH.DIRECTORY_SEPARATOR."config");
define("CONFIG_PATH",CONFIG_DIR_PATH.DIRECTORY_SEPARATOR."config.php");
define("CORE_PATH",APP_PATH.DIRECTORY_SEPARATOR."core");
define("LOG_PATH",APP_PATH.DIRECTORY_SEPARATOR."runtime".DIRECTORY_SEPARATOR."log");

require CORE_PATH.DIRECTORY_SEPARATOR."Core.class.php";
Core\Core::run();