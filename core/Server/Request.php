<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 28.03.2019
     * Time: 14:34
     */
    
    namespace Core\Server;
    
    class Request
    {
        public $get;
        public $post;
        public $data;
        public $session;
        public $isPost = false;
        public $isGet = false;
        
        public function __construct()
        {
            $session = new Session(true);
            if ( !empty($_GET)) {
                $this -> isGet = true;
                $this -> get = $_GET;
                $this -> data = $this -> get;
            }
            if ( !empty($_POST)) {
                $this -> isPost = true;
                $this -> post = $_POST;
                $this -> data = $this -> post;
            }
            $this -> session = $session -> getData();
        }
        
        public function has($property)
        {
            if ($this -> isPost && isset($this -> post[$property])) {
                return true;
            }
            if ($this -> isGet && isset($this -> get[$property])) {
                
                return true;
            }
            
            return false;
        }
        
        public function prop($property)
        {
            if ($this -> has($property)) {
                return $this -> data [$property];
            }
            
            return null;
        }
        public function getUri(){
            return $_SERVER[ 'REQUEST_URI' ];
        }
        public static function getReferer(){
            return $_SERVER['HTTP_REFERER'];
        }
        public static function all()
        {
        
        
        }
    }