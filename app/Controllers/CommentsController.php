<?php
    
    namespace App\Controllers;
    
    use Core\MVC\View;
    use Core\Server\Request;
    use Core\MVC\Controller;
    use Core\Database\DB;
    use App\Models\Records;
    use App\Models\Comments;
    use Core\Server\Response;
    
    class CommentsController extends Controller
    {
        public function index()
        {
            $request = new Request;
            $test = $request -> prop('test');
            $database = new DB;
            $test = $database -> select(['test', 'tes12'], 'test') -> exe();
            
            //   var_dump($test);
            return self ::view('index', ['test' => $test]);
        }
        
        
        public function submitNew()
        {
            $request = new Request;
            if ($request -> isPost) {
                $comments_model = new Comments;
                $validation = $comments_model->validate($request -> data);
                if(!$validation['validate']){
                    return Response ::redirect($request->getReferer(),
                          null, $validation['error']);
        
                }
                $create = $comments_model  -> createOne($request -> data);
                if ($create) {
                    $last_record = $comments_model ->clearInstance()-> getLastOne();
                   //  var_dump($last_record);
                    return Response ::redirect('/view-record',
                          ['id' => $last_record[ 'record_id' ]]);
                } else {
                    return Response ::redirect('/',
                          null, 'Error creating new comment');
                }
            }
        }
    }