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
    use Core\Server\Exeptions;
    
    class Application
    {
        private $routes_list;
        private $request_uri;
        private $main_config;
        
        function __construct()
        {
            $this -> setConfig();
            $this -> setRequestUri();
        }
        
        public function setConfig()
        {
            $this -> routes_list = Config ::getRoutes();
            $this -> main_config = Config ::getMain();
        }
        
        public function setRequestUri()
        {
            $this -> request_uri = $_SERVER[ 'REQUEST_URI' ];
            if ($this -> request_uri != '/') {
                $this -> request_uri = ltrim($this -> request_uri, '/');
                if (strpos($this -> request_uri, '?')) {
                    $this -> request_uri = explode('?', $this -> request_uri)[ 0 ];
                }
            }
        }
        
        public function run()
        {
            $session = new Session(true);
            $session -> start();
            $session->checkFlash();
            $method_name = $this -> routes_list[ $this -> request_uri ];
            
            if (is_null($method_name)) {
                if ( !$this -> main_config[ 'http_errors' ]) {
                   
                    return Exeptions ::throwNotFound();
                }
                echo 'Can`t start application. Invalid route';
                return false;
            }
            
            return Routes ::direct($method_name);
        }
    }