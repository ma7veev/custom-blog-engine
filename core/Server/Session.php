<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 28.03.2019
     * Time: 14:46
     */
    
    namespace Core\Server;
    
    class Session
    {
        public function __construct()
        {
        
        }
        
        public function start()
        {
            if ( is_null($_SESSION)) {
                session_start();
            }
        }
        
        public function getData()
        {
            if ( !empty($_SESSION)) {
                return (object)$_SESSION;
            }
            
            return (object)[];
        }
    }