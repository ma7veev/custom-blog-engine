<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 28.03.2019
     * Time: 16:05
     */
    
    namespace Core\Database;
    
    use Core\Loader\Config;
    use Exeption;
    
    class DB
    {
        private $connection;
        private $query = '';
        
        public function __construct()
        {
            $config = Config ::getDb();
            $connection = new Connection($config);
            if ( !$connection -> connect()) {
                return false;
            }
            $this -> connection = $connection;
        }
        
        public function select($columns, $table)
        {
            if (is_array($columns)) {
                $this -> query = 'SELECT '.implode(', ', $columns).' FROM '.$table;
                
                return $this;
            }
        }
        
        public function exe()
        {
            var_dump($this -> query);
            if ( !is_null($this -> query)) {
                $resultPDO = $this -> connection -> makeQuery($this -> query);
                if ($resultPDO) {
                    return $resultPDO;
                }
                
                return [];
            }
        }
        
        public function raw($query)
        {
            if ( !is_null($query)) {
                $this -> query = $query;
                
                return $this;
            }
        }
        public function addRaw($query)
        {
            if ( !is_null($query)) {
                $this -> query .= $query;
                
                return $this;
            }
        }
    }