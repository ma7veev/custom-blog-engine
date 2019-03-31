<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 31.03.2019
     * Time: 13:35
     */
    
    namespace Core\Helpers;
    
    class Data
    {
        public static function formatDate($string, $format)
        {
            $date = new \DateTime;
            
            return $date -> format($format);
        }
    }