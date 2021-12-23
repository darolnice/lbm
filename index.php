<?php
include_once('_config.php');

MyAutoLoad::start();

$request = $_GET['r'];

if (empty($request)) {
    $rt = new Rooter('');
    $rt->renderController();
} else {
    $router = new Rooter($request);
    $router->renderController();
}


if (isset($_SESSION['username']) && isset($_SESSION['llst'])){
    if ((time() - $_SESSION['llst']) > 1000){
        (new Log)->showLogout();
    }else{
        $_SESSION['llst'] = time();
    }
}

