<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 31.03.2019
     * Time: 13:35
     */
    
    namespace Core\Helpers;
    
    class HData
    {
        public static function formatDate($string, $format)
        {
            $date = new \DateTime;
            
            return $date -> format($format);
        }
        
        public static function issetCount($arr, $key)
        {
            if (isset($arr[ $key ])) {
                return $arr[ $key ];
            }
            
            return '0';
        }
    }