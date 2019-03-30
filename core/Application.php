<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 27.03.2019
     * Time: 14:30
     */
    
    namespace Core;
    
    use Core\Loader\Routes;
    use Core\Loader\Config;
    use Core\Server\Session;
    
    class Application
    {
        private $routes_list;
        public $request_uri;
        
        function __construct()
        {
            $this -> setConfig();
            $this -> setRequestUri();
        }
        
        public function setConfig()
        {
            $this -> routes_list = Config::getRoutes();
        }
        
        public function setRequestUri()
        {
            $this -> request_uri = $_SERVER[ 'REQUEST_URI' ];
            
            $this -> request_uri = ltrim($this -> request_uri, '/');
            
            if(strpos($this->request_uri, '?')){
                $this->request_uri = explode('?',$this->request_uri)[0];
            }
        }
        
        public function run()
        {
            $session = new Session(true);
            $session->start();
            $method_name = $this -> routes_list[ $this -> request_uri ];
            
            return Routes ::direct($method_name);
        }
    }