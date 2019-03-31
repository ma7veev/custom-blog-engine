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
        public static function redirect($location, $params = [])
        {
            $response_str = "Location: $location";
            if ( !is_null($params) && !empty($params)) {
                $response_str .= "?".http_build_query($params);
            }
            header($response_str);
        }
    }