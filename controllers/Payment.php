<?php
session_start();
class Payment
{
    public function showMomo(){
        if(isset($_SESSION['somme'])){
            $view = dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'payment'.DIRECTORY_SEPARATOR.'momo.view.php';
            include_once $view;
        }else{
            Functions::redir('./');
        }
    }

    public function showOm(){
        if(isset($_SESSION['somme'])){
            $view = dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'payment'.DIRECTORY_SEPARATOR.'om.view.php';
            include_once $view;
        }else{
            Functions::redir('./');
        }
    }

    public function showStripe(){

    }

    public function showBank(){

    }

    public function showPaypal(){

    }
}