<?php
    /**
     * Created by PhpStorm.
     * User: MANAGER
     * Date: 30.01.19
     * Time: 20:37
     */
    
    namespace Core\Loader;
    use Core\Loader\Config;
    
    use Exeption;
    
    class Routes
    {
        function direct($method_name)
        {
            
            $action = str_replace('@', '::', '\App\Controllers\\'.$method_name);
            
            return call_user_func($action);
        }
    }