<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 30.03.2019
     * Time: 13:31
     */
    
    namespace Core\Server;

    use Core\Controllers\ExeptionsController;
    class Exeptions
    {
        public static function throwNotFound(){
          
            return ExeptionsController::actionNotFound();
        }
    }