<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 30.03.2019
     * Time: 18:19
     */
    
    namespace Core\Server;
    
    class Response
    {
        public static function redirect($location, $params = [], $flash = null)
        {
            $response_str = "Location: $location";
            if ( !is_null($params) && !empty($params)) {
                $response_str .= "?".http_build_query($params);
            }
            if ( !is_null($flash)) {
              
                $session = new Session;
                $session -> storeFlash($flash);
            }
            header($response_str);
        }
    }