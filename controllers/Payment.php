<?php
session_start();
class Payment
{
    public function showMomo(){
        if(isset($_SESSION['somme'])){
            $view = dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'public_html'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'payment'.DIRECTORY_SEPARATOR.'momo.view.php';
            include_once $view;

            /**
             * 
             * 
             *  $request = new Http_Request2('https://sandbox.momodeveloper.mtn.com/collection/v1_0/bc-authorize');
             *   $url = $request->getUrl();

             *   $headers = array(
             *       // Request headers
             *       'Authorization' => '',
             *       'X-Target-Environment' => '',
             *       'X-Callback-Url' => '',
             *       'Content-Type' => 'application/x-www-form-urlencoded',
             *       'Ocp-Apim-Subscription-Key' => '{subscription key}',
             *   );

              *  $request->setHeader($headers);

             *   $parameters = array(
             *       // Request parameters
             *   );

             *   $url->setQueryVariables($parameters);

             *   $request->setMethod(HTTP_Request2::METHOD_POST);

             *   // Request body
             *   $request->setBody("{body}");

             *   try
             *   {
             *       $response = $request->send();
             *       echo $response->getBody();
             *   }
             *   catch (HttpException $ex)
             *   {
             *       echo $ex;
             *   }
             * 
             * 
             */
        }else{
            Functions::redir('./');
        }
    }

    public function showOm(){
        if(isset($_SESSION['somme'])){
            $view = dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'public_html'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'payment'.DIRECTORY_SEPARATOR.'om.view.php';
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