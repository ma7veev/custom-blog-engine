<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 30.03.2019
     * Time: 12:44
     */
    
    namespace App\Models;
    
    use Core\MVC\Model;
    
    class Records extends Model
    {
        protected $table_name = 'records';
        
        public function getLast()
        {
            $commit = $this -> instance -> select(['*']) -> limit(5) -> exe();
            if($commit->success){
                return $commit -> data;
            }
        }
        
        public function getLastOne()
        {
            $commit = $this -> instance -> select(['*'])
                                        -> orderBy('id', 'desc')
                                        -> limit(1)
                                        -> exe();
            if ($commit -> success) {
                return current($commit -> data);
            }
        }
        
        public function getOne($id)
        {
            $commit = $this -> instance -> select(['*']) -> where(['id' => $id]) -> exe();
           
            if ($commit -> success) {
                return current($commit -> data);
            }
        }
        
        public function createOne($data)
        {
            $commit = $this -> instance -> insert($data) -> exe();
            
            return $commit -> success;
        }
        
        public function create()
        {
            /* $i = 1;
             while ($i<=40) {
                 $this -> instance -> insert([
                       'author_name' => 'author_'.$i,
                       'title'       => 'title1'.$i,
                       'text'        => $i.'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi, aspernatur, commodi consequuntur delectus dolor doloribus eos facilis fugit ipsa laudantium minima nesciunt officiis quibusdam repellendus sapiente sint sit voluptatibus.',
                 ]) -> exe();
                 $i++;
             }*/
        }
    }