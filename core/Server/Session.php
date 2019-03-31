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
            if (is_null($_SESSION)) {
                session_start();
            }
        }
        
        public function getData()
        {
            if ( !empty($_SESSION)) {
                return $_SESSION;
            }
            
            return [];
        }
        
        public function storeFlash($message)
        {
         
            $_SESSION[ 'flash' ] = $message;
            $_SESSION[ 'flash_status' ] = 1;
           
        }
        
        public function checkFlash()
        {
            if (isset($_SESSION[ 'flash' ]) && isset($_SESSION[ 'flash_status' ])) {
               
                if ($_SESSION[ 'flash_status' ] == 1) {
                    $_SESSION[ 'flash_status' ] = 0;
                } elseif ($_SESSION[ 'flash_status' ] == 0) {
                    unset($_SESSION[ 'flash' ]);
                    unset($_SESSION[ 'flash_status' ]);
                }
            }
        }
    }