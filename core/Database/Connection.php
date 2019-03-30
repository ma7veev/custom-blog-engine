<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 28.03.2019
     * Time: 16:13
     */
    
    namespace Core\Database;
    
    use PDO;
    use PDOException;
    use Core\Loader\Config;
    
    class Connection
    {
        public $host;
        public $db_name;
        public $user;
        public $pass;
        public $charset;
        private $pdo;
        private $main_config;
        
        public function __construct($config)
        {
            $this -> setConfig($config);
            $this -> main_config = Config ::getMain();
        }
        
        public function connect()
        {
            
            $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=$this->charset";
            $opt = [
                  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                  PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            try {
                $pdo = new PDO($dsn, $this -> user, $this -> pass, $opt);
            } catch (PDOException $e) {
                if ($this -> main_config[ 'pdo_errors' ]) {
                    echo $e -> getmessage();
                }
                
                return false;
            }
            $this -> pdo = $pdo;
            
            return true;
        }
        
        private function setConfig($config)
        {
            if (is_array($config) && array_key_exists('host', $config)) {
                $this -> host = $config[ 'host' ];
            }
            if (is_array($config) && array_key_exists('db_name', $config)) {
                $this -> db_name = $config[ 'db_name' ];
            }
            if (is_array($config) && array_key_exists('user', $config)) {
                $this -> user = $config[ 'user' ];
            }
            if (is_array($config) && array_key_exists('pass', $config)) {
                $this -> pass = $config[ 'pass' ];
            }
            if (is_array($config) && array_key_exists('charset', $config)) {
                $this -> charset = $config[ 'charset' ];
            }
        }
        
        public function makeQuery($sql)
        {
            if ( !is_null($this -> pdo)) {
                try {
                    return $this -> pdo -> query($sql, PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    if ($this -> main_config[ 'pdo_errors' ]) {
                        echo $e -> getmessage();
                    }
                    return false;
                }
            }
        }
    }