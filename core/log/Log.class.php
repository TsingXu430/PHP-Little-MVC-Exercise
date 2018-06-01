<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/5/31
 * Time: 17:04
 */

namespace core\log;


class Log
{

    private static $logDir;
    private static $enable;

    const LOG_LEVEL_ERROR = 1;
    const LOG_LEVEL_DEBUG = 2;
    const LOG_LEVEL_INFO  = 3;
    const LOG_LEVEL_WARN  = 4;

    static public function init($logDir,$enable){
        self::$logDir = $logDir;
        self::$enable = $enable;
    }

    static public function write($data,$level){
        if(self::isEnable()){
            if(!is_dir(self::$logDir)){
                mkdir(self::$logDir);
            }
            $content = self::buildContent($data,$level);
            return file_put_contents(self::$logDir.DIRECTORY_SEPARATOR.date('y-m-d').'.log',$content.PHP_EOL,FILE_APPEND);
        }
        return false;
    }

    static public function buildContent($data,$level){
        $logContent = "[";
        switch ($level){
            case self::LOG_LEVEL_ERROR:
                $levelStr = "ERROR";
                break;
            case self::LOG_LEVEL_DEBUG:
                $levelStr = "DEBUG";
                break;
            case self::LOG_LEVEL_INFO:
                $levelStr = "INFO";
                break;
            case self::LOG_LEVEL_WARN:
                $levelStr = "WARN";
                break;
            default:
                break;
        }
        $logContent.=$levelStr." ".date('Y-m-d H:i:s')." ] ".$data;

        return $logContent;
    }

    static public function isEnable(){
        return self::$enable;
    }


}