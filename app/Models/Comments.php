<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 30.03.2019
     * Time: 12:45
     */
    
    namespace App\Models;
    
    use Core\MVC\Model;
    
    class Comments extends Model
    {
        protected $table_name = 'comments';
        
        public function createOne($data)
        {
            $commit = $this -> instance -> insert($data) -> exe();
            
            return $commit -> success;
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
        
        public function getByRecord($id)
        {
            $commit = $this -> instance -> select(['*'])
                                        -> where(['record_id' => $id])
                                        -> exe();
    
            if ($commit -> success) {
                return $commit -> data;
            }
        }
        public function getCommentsFrequecy(){
            $commit = $this -> instance -> select(['`record_id`', 'COUNT(`record_id`) AS `record_freq`'])
                                        -> groupBy('record_id')
                                        -> orderBy('record_freq', 'desc')
                                        -> exe();
            if ($commit -> success) {
                $customize_data = [];
                foreach ($commit -> data as $item){
                    $customize_data[$item['record_id']]=$item['record_freq'];
                }
              //  return $commit -> data;
                return $customize_data;
            }
        }
        public function create()
        {
            $i = 164;
             while ($i<=189) {
                 $this -> instance -> insert([
                       'author_name' => 'author_'.$i,
                       'record_id'       => $i,
                     
                       'text'        => $i.'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi, aspernatur, commodi consequuntur delectus dolor doloribus eos facilis fugit ipsa laudantium minima nesciunt officiis quibusdam repellendus sapiente sint sit voluptatibus.',
                 ]) -> exe();
                 $i++;
             }
        }
    }