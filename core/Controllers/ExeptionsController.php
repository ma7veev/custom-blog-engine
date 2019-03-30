<?php
    /**
     * Created by PhpStorm.
     * User: baduser
     * Date: 30.03.2019
     * Time: 13:11
     */
    
    namespace Core\Controllers;
    
    use Core\MVC\View;
    use Core\Server\Request;
    use Core\MVC\Controller;
    use Core\Database\DB;
    use Core\Loader\Config;
    
    class ExeptionsController extends Controller
    {
        public function actionNotFound()
        {
    
            $main_config = Config ::getMain();
          
            return self ::view($main_config[ 'not_found_view' ]);
        }
    }