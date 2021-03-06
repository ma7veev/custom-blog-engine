<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 27.03.2019
     * Time: 15:52
     */
    
    namespace Core\MVC;
    
    use Core\Database\DB;
    
    class Model
    {
        public $instance;
        protected $table_name;
        
        public function __construct()
        {
            $this -> instance = new DB($this -> table_name);
        }
        
        public function init()
        {
        
        }
        public function clearInstance(){
            $this -> instance = new DB($this -> table_name);
            return $this;
        }
        public function validate($data)
        {
            foreach ($this -> rules() as $rule) {
                if ( !isset($data[ current($rule) ])) {
                    return [
                          'validate' => false,
                          'error'    => 'Wrong data in '.current($rule).' field',
                    ];
                }
                if ($rule[ 'required' ] && $data[ current($rule) ] == '') {
                    return [
                          'validate' => false,
                          'error'    => 'The '.current($rule).' field is empty',
                    ];
                }
                if ($rule[ 'type' ] == 'string') {
                    if (isset($rule[ 'min' ])&&$rule[ 'min' ]>strlen($data[ current($rule) ])) {
                        return [
                              'validate' => false,
                              'error'    => 'Your '.current($rule).' field must contain min '.$rule[ 'min' ].' symbols',
                        ];
                    }
                    if (isset($rule[ 'max' ])&&$rule[ 'max' ]<strlen($data[ current($rule) ])) {
                        return [
                              'validate' => false,
                              'error'    => 'Your '.current($rule).' field must contain max '.$rule[ 'max' ].' symbols',
                        ];
                    }
                }
            }
            
            return ['validate' => true];
        }
        public static function escapeHtml($array){
            if(is_array($array)){
                $escaped = array_map(function ($val) {
                    return htmlentities($val);
                },
                      $array);
                return $escaped;
            }
            return $array;
        }
    }