<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/6/1
 * Time: 8:53
 */

namespace core\db;

use core\log\Log;


class DbHelper
{

    private static $instance;

    private function __construct($config)
    {
        $this->config = $config;
        $this->dsn    = "mysql:host=".$this->config['host'].";port=".$this->config['port'].";dbname=".$this->config['dbname'];
        try{

            $this->pdo    = new \PDO($this->dsn,$this->config['username'],$this->config['password']);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            $this->pdo->query("set names utf8");

        }catch(Exception $e){
            Log::write($e->getMessage(),Log::LOG_LEVEL_ERROR);
        }
    }

    static public function getInstance($config){
        if(null == self::$instance){
            self::$instance =  new self($config);
        }
        return self::$instance;
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }



}