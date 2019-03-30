<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 30.03.2019
     * Time: 08:35
     */
    
    namespace Core\Loader;
    
    class Config
    {
        const CONFIG_PATH = '/config/';
        public static function getGlobal(){
            $config = require_once(ROOT_PATH.self::CONFIG_PATH.'global.php');
            return $config;
        
        }
        public static function getRoutes(){
            $config = require_once(ROOT_PATH.self::CONFIG_PATH.'routes.php');
            return $config;
        
        }
        public static function getMain(){
            $config = require_once(ROOT_PATH.self::CONFIG_PATH.'main.php');
            return $config;
        
        }
        public static function getDb(){
            $config = require_once(ROOT_PATH.self::CONFIG_PATH.'db.php');
            return $config;
        
        }
    }