<?php
    define('ROOT_PATH', __DIR__);
    $config = require_once(ROOT_PATH.'/config/main.php');
    ini_set('display_errors', $config[ 'php_errors' ]);
    require_once 'requirements.php';
    requirements();
    require_once(ROOT_PATH.'/vendor/autoload.php');
    require_once(ROOT_PATH.'/app/bootstrap.php');