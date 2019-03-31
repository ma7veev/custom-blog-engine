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
        
        public function rules()
        {
            return [
                  ['author_name', 'required' => true, 'type'=>'string', 'min'=>2, 'max'=>255],
                  ['title', 'required' => true, 'type'=>'string', 'min'=>3, 'max'=>255],
                  ['text', 'required' => true, 'type'=>'string', 'min'=>12, 'max'=>65535],
            ];
        }
        
        public function getLast()
        {
            $commit = $this -> instance -> select(['id', 'author_name', 'title', 'text', 'created_at'])
                                        -> orderBy('created_at', 'desc')
                                        -> exe();
            if ($commit -> success) {
                return $commit -> data;
            }
        }
        
        public function getByIds($ids)
        {
            $commit = $this -> instance -> select(['id', 'author_name', 'title', 'text', 'created_at']) -> whereIn('id', $ids) -> exe();
            if ($commit -> success) {
                return $commit -> data;
            }
        }
        
        public function getLastOne()
        {
            $commit = $this -> instance -> select(['id', 'author_name', 'title', 'text', 'created_at'])
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