<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 27.03.2019
     * Time: 15:52
     */
    
    namespace Core\MVC;
    
    class Controller
    {
        
        protected static function view($name, $data = [], $options = [])
        {
            $view = new View;
            if (is_array($options) && !empty($options)) {
                if (array_property_exists('layout', $options)) {
                    $view -> layout = $options[ 'layout' ];
                }
            }
            if (is_array($data) && !empty($data)) {
                
                $view -> data = $data;
            }
            
            return $view -> show($name);
        }
        
    }