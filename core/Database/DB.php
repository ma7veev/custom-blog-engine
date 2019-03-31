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
        public $table;
        public $success = false;
        public $data = [];
        public $real_params = [];
        
        public function __construct($table_name)
        {
            $config = Config ::getDb();
            $connection = new Connection($config);
            if ( !$connection -> connect()) {
                return false;
            }
            $this -> connection = $connection;
            $this -> setTableName($table_name);
        }
        
        public function select($columns)
        {
            
            if (is_array($columns)) {
                $this -> query = 'SELECT '.implode(', ',
                            $columns).' FROM '.$this -> table;
            }
            
            return $this;
        }
        
        public function insert($data)
        {
            if (is_array($data)) {
                $this -> query = "INSERT INTO {$this -> table} (".implode(", ",
                            array_keys($data)).") VALUES (".implode(", ",
                            array_values($this->escapeParams($data))).")";
            }
            
            return $this;
        }
        
        public function orderBy($field, $type = null)
        {
            $this -> addRaw(" ORDER BY $field");
            if ( !is_null($type)) {
                
                $this -> addRaw(" $type");
            } else {
                $this -> addRaw(" ASC");
            }
            
            return $this;
        }
        
        public function groupBy($field)
        {
            $this -> addRaw(" GROUP BY $field");
            
            return $this;
        }
        
        public function exe()
        {
            if ( !is_null($this -> query)) {
                $resultPDO = $this -> connection -> makeQuery($this -> query, $this->real_params);
            
                if (is_array($resultPDO)) {
                    $this -> success = true;
                    $this -> data = $resultPDO;
                }
            }
            
            return $this;
        }
        
        public function limit($number)
        {
            $this -> addRaw(" LIMIT $number");
            
            return $this;
        }
        
        public function where($conditions)
        {
            if (is_array($conditions)) {
                $this -> addRaw(" where");
                foreach ($this->escapeParams($conditions) as $key => $cond) {
                    $i = 1;
                    $this -> addRaw(" $key=$cond");
                    if ($i != count($conditions)) {
                        $this -> addRaw(" AND ");
                    }
                    $i++;
                }
            }
            
            return $this;
        }
        
        public function whereIn($field, $values)
        {
            if (is_array($values)) {
                $this -> addRaw(" where $field IN (".implode(", ",
                            array_values($this->escapeParams($values))).")");
            }
            
            return $this;
        }
        
        public function raw($query)
        {
            if ( !is_null($query)) {
                $this -> query = $query;
            }
            
            return $this;
        }
        
        public function addRaw($query)
        {
            if ( !is_null($query)) {
                $this -> query .= $query;
            }
            
            return $this;
        }
        
        private function setTableName($table_name)
        {
            $this -> table = $table_name;
        }
        
        private function escapeParams($value)
        {
            if (is_array($value)) {
                $this -> real_params = array_values(array_merge($this -> real_params, $value));
                $replaced_arr = array_map(function ($val) {
                    return '?';
                },
                      $value);
                
                return $replaced_arr;
            } else {
                $this -> real_params[] =$value;
                
                return '?';
            }
        }
    }