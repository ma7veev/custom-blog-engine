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
            $comments_model = new Comments;
            /*get list of comment`s frequency by records*/
            $comments_freq = $comments_model -> getCommentsFrequecy();
          
            /*get 5 most popular record`s ids*/
            $most_freq_ids=array_keys(array_slice($comments_freq, 0, 5, true));
       
            $records_model = new Records;
          
            $popular_records = $records_model -> getByIds($most_freq_ids);
            $last_records = $records_model ->clearInstance()-> getLast();
          
            return self ::view('index',
                  [
                        'comments_freq'=>$comments_freq,
                        'popular_records' => $popular_records,
                        'last_records'    => $last_records,
                  ]);
        }
        
        public function viewOne()
        {
            $request = new Request;
            if ($request -> isGet) {
                $id = $request -> prop('id');
                $records_model = new Records;
                $record = $records_model -> getOne($id);
                if(!$record){
                    return Response ::redirect('/',
                          null, 'This post doesn`t exist');
                }
                $comments_model = new Comments;
                $comments_list = $comments_model -> getByRecord($id);
            } else {
                return Response ::redirect('/');
            }
            
            return self ::view('view-record',
                  ['record' => $record, 'comments_list' => $comments_list]);
        }
        
        
        public function submitNew()
        {
            $request = new Request;
            if ($request -> isPost) {
                $records_model = new Records;
                $validation = $records_model->validate($request -> data);
                if(!$validation['validate']){
                    return Response ::redirect($request->getReferer(),
                          null, $validation['error']);
                    
                }
                $create = $records_model -> createOne($request -> data);
                if ($create) {
                    $last_record = $records_model ->clearInstance()-> getLastOne();
                    
                    return Response ::redirect('/view-record',
                          ['id' => $last_record[ 'id' ]]);
                } else {
                    return Response ::redirect('/',
                          null, 'Error creating new record');
                }
            }
        }
    }