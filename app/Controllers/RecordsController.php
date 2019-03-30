<?php
    
    namespace App\Controllers;
    
    
    use Core\MVC\View;
    use Core\Server\Request;
    use Core\MVC\Controller;
    use Core\Database\DB;
    
    class RecordsController extends Controller
    {
        public function last()
        {
            $request = new Request();
            $test = $request->prop('test');
            $database = new DB();
            $test = $database->select(['test', 'tes12'], 'test')->exe();
            //   var_dump($test);
            return self::view('index', ['test'=>$test]);
        }
        public function vewOne(){
        
        }
        public function addNew(){
        
        }
        public function submitNew(){
        
        }
        
    }