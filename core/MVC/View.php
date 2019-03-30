<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 27.03.2019
     * Time: 15:52
     */
    
    namespace Core\MVC;
    
    class View
    {
        public $layout = 'layouts/app';
        public $data = [];
        const VIEWS_PATH = '/app/views/';
        private $name;
        
        private function renderHtml()
        {
            //   var_dump(self::VIEWS_PATH.$this -> layout.'.php');
            $content = $this -> renderContext();
            $html = require_once(ROOT_PATH.self::VIEWS_PATH.$this -> layout.'.php');
            
            return $html;
        }
        
        private function renderContext()
        {
            if (is_array($this -> data) && !empty($this -> data)) {
                foreach ($this -> data as $var => $value) {
                    $$var = $value;
                }
            }
            ob_start();
            require_once(ROOT_PATH.self::VIEWS_PATH.$this -> name.'.php');
            $content = ob_get_contents();
            ob_end_clean();
            
            return $content;
        }
        
        private function setName($name)
        {
            $this -> name = $name;
        }
        
        public function show($name)
        {
            $this -> setName($name);
            $render = $this -> renderHtml();
            
            return $render;
        }
    }