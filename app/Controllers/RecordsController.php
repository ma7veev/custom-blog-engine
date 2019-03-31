<?php
    
    namespace App\Controllers;
    
    use App\Models\Comments;
    use Core\MVC\View;
    use Core\Server\Request;
    use Core\Server\Response;
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
            if ($request -> isGet) {
                $id = $request -> prop('id');
                $records_model = new Records;
                $record = $records_model -> getOne($id);
                $comments_model = new Comments;
                $comments_model->create();
                $comments_list = $comments_model -> getByRecord($id);
                
            } else {
                /*bad response*/
            }
            return self ::view('view-record',
                  ['record' => $record, 'comments_list' => $comments_list]);
        }
        
        public function addNew()
        {
            return self ::view('add-record');
        }
        
        public function submitNew()
        {
            $request = new Request;
            if ($request -> isPost) {
                $records_model = new Records;
                $create = $records_model -> createOne($request -> data);
                if ($create) {
                    $last_record = $records_model -> getLastOne();
                    
                    return Response ::redirect('/view-record',
                          ['id' => $last_record[ 'id' ]]);
                } else {
                    /*bad response*/
                }
            }
        }
    }