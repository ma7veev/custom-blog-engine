<?php
    
    namespace App\Controllers;
    
    use Core\MVC\View;
    use Core\Server\Request;
    use Core\MVC\Controller;
    use Core\Database\DB;
    use App\Models\Records;
    use PDO;
    class RecordsController extends Controller
    {
        public function last()
        {
            $request = new Request;
            $test = $request -> prop('test');
            $records_model = new Records;
            //   $records -> create();
            $records = $records_model -> getLast();
            
            return self ::view('index', ['records' => $records]);
        }
        
        public function viewOne()
        {
            $request = new Request;
            $id = $request -> prop('id');
            $records_model = new Records;
            $record = $records_model -> getOne($id);
           
            return self ::view('view-record', ['record' => $record]);
        }
        
        public function addNew()
        {
        
        }
        
        public function submitNew()
        {
        
        }
    }