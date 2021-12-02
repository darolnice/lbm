<?php
/***********configuration***********/
ini_set('display_errors', 'off');
error_reporting(E_ALL);


class MyAutoLoad
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('SITE_NAME', 'LEBOLMA');
        define('SITE_MAIL', 'lebolma@lbm.com');
        define('SITE_PHONE_NUMBERS', '+237 694253565');
        define('SITE_ADRESS', 'CAMEROON DOUALA');

        define('HOST', 'http://'.$host.'/projets/lebolma');
        define('ROOT', $root.'/projets/lebolma');


        define('S_CONTROLLERS', ROOT.'/controllers/');
        define('S_SERVICES', ROOT.'/services/');
        define('S_API', ROOT.'/api/');
        define('S_MODELS', ROOT.'/models/services/');
        define('S_VIEWS', ROOT.'/views/');
        define('S_CLASSES', ROOT.'/class/');
        define('S_DATABASE', ROOT.'/models/');

        define('S_ASSETS', HOST.'/assets/');
    }

    public static function autoload($class)
    {
        if (file_exists(S_SERVICES.$class.'.php')){
            include_once (S_SERVICES.$class.'.php');
        }if (file_exists(S_DATABASE.$class.'.php')){
            include_once (S_DATABASE.$class.'.php');
        }if (file_exists(S_MODELS.$class.'.php')){
            include_once (S_MODELS.$class.'.php');
        }elseif (file_exists(S_API.$class.'.php')){
            include_once (S_API.$class.'.php');
        }elseif (file_exists(S_VIEWS.$class.'.php')){
            include_once (S_VIEWS.$class.'.php');
        }elseif (file_exists(S_CONTROLLERS.$class.'.php')){
            include_once (S_CONTROLLERS.$class.'.php');
        }elseif (file_exists(S_CLASSES.$class.'.php')){
            include_once (S_CLASSES.$class.'.php');
        }
    }
}
