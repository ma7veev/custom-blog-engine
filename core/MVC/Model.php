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
            $this->instance = new DB($this -> table_name);
        }
    
        public function init()
        {
        
        }
    }