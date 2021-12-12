<?php
//namespace Lbm\Log;
//
//use Lbm\Functions\Functions;
//use Lbm\Mgrlogin\MgrLogin;
//use Lbm\MgrUser\MgrUser;


class Log extends Navigation
{
    private $current_user_data;

    /**
     * @return mixed
     */
    public function getCurrentUserData()
    {
        return $this->current_user_data;
    }




    public function showSignup(){ 
        session_start();
        Functions::Auth_UserIS();
        $j = new MgrUser();
        $F = new Functions();
        include_once S_VIEWS.'/signup.view.php';

        $country = $_POST['country'];
        $civility = $_POST['civility'];
        $username = $_POST['user_name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        $errors = [];

        if(isset($_POST['soumettre'])){

            if (!$F->not_empty([$country, $civility, $username, $phone_number, $email, $password, $password_confirm])){

                if (mb_strlen($username) < 3) {
                    $errors[] = "- Your user name is short, minimun 3 chars";
                }

                if (mb_strlen($phone_number) < 7) {
                    $errors[] = "- Please enter correct phone number";
                }

                if (!filter_var($phone_number, FILTER_VALIDATE_INT)){
                    $errors[] = '- Invalid phone number';
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "- Invalid e-mail adress!!!";
                }

                if (mb_strlen($password) < 8) {
                    $errors[] = "- Password requiered, minimun 8 chars";
                }else if($password != $password_confirm){
                    $errors[] = "- Password is not the same";
                }

                //entrée dans la bd

                if($j->is_already_in_User('username', $username, 'users')){
                    $errors[] = "- User name is already in use";
                }

                if($j->is_already_in_User('email', $email, 'users')){
                    $errors[] = "- Email adress is already in use";
                }
                $F->notif_errors($errors);

            }else {
                $errors[] = "- please complete all forms";
                $F->notif_errors($errors);
            }

            if(count($errors) === 0){
                $v = new MgrLogin();
                $v->signUp();
            }

        }
    }
    public function showBusinessLogin(){
        session_start();
        Functions::Auth_UserIS();
        $F = new Functions();
        include_once S_VIEWS.'/saler.view.php';

        $errors = [];
        $u_name = $_POST['u_name'];
        $u_pass = $_POST['passw'];

        if (isset($_POST['submit'])){
            if (empty($u_name) || empty($u_pass)){
                $errors[] = 'Please complete all fields';
            }elseif (mb_strlen($u_name)<3){
                $errors[] = '- User name is wrong';
            }elseif (mb_strlen($u_pass)<8){
                $errors[] = '- Password is wrong';
            }

            $F->notif_errors($errors);

            if (count($errors) === 0){
                $D = new MgrLogin();
                $D->adminLog($u_pass);
            }
        }

    }
    public function showLogout(){
        session_start();
        if($_SESSION['saller_id']){
            session_unset();
            unset($_COOKIE['cookies_u_data']);
            setcookie('cookies_u_data', '', time() - 10);
            (new Functions)->redir('business');
        }else{
            session_unset();
            unset($_COOKIE['cookies_u_data']);
            setcookie('cookies_u_data', '', time() - 10);
            (new Functions)->redir('login');
        }
    }

    public function showRegister(){
        session_start();
        Functions::Auth_UserIS();
        $j = new MgrUser();
        $F = new Functions();

        include_once S_VIEWS.'/register.view.php';
       
        $country = $_POST['country'];
        $civility = $_POST['civility'];
        $saller_name = $_POST['user_name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $errors = [];

        if(isset($_POST['soumettre'])){

            if (!$F->not_empty([$country, $civility, $saller_name, $phone_number, $email, $password, $password_confirm])){

                if (mb_strlen($saller_name) < 3) {
                    $errors[] = "- Your user name is short, minimun 3 chars";
                }

                if (mb_strlen($phone_number) < 7) {
                    $errors[] = "- Please enter correct phone number";
                }

                if (!filter_var($phone_number, FILTER_VALIDATE_INT)){
                    $errors[] = '- Invalid phone number';
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "- Invalid e-mail adress!!!";
                }

                if (mb_strlen($password) < 8) {
                    $errors[] = "- Password requiered, minimun 8 chars";
                }else if($password != $password_confirm){
                    $errors[] = "- Password is not the same";
                }

                if(!$j->is_already_in_User('sallers', 'username', $saller_name)){
                    $errors[] = "- User name is already in use";
                }

                if(!$j->is_already_in_User('sallers','email', $email)){
                    $errors[] = "- Email adress is already in use";
                }
                $F->notif_errors($errors);

            }else {
                $errors[] = "- please complete all forms";
                $F->notif_errors($errors);
            }

            if(count($errors) === 0){
                (new MgrLogin)->register([$saller_name, $civility, $country, $email, $phone_number, $password]);
            }
        }

    }
    public function showRegister2(){
        session_start();
        Functions::Auth_UserIS();

        if ($_SESSION['tmp_name']){
            $F = new Functions();
            $mgrUser = new MgrUser();

            include_once S_VIEWS.'/register_2.view.php';

            $post = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $shop_name = $post['shop_name'];
            $city = $post['city'];
            $activity = $post['activity'];
            $description = $post['description'];
            $matricule = $post['matricul'];
            $shop_key = $post['shop_key'];
            $current_plan = $post['current_plan'];

            $data = [$shop_name, $city, $activity, $description, $matricule, $shop_key, $current_plan];
            $errors = [];

            if(isset($_POST['sbmt'])){

                 if (!$F->not_empty([$shop_name, $city, $activity, $description, $shop_key, $current_plan])){

                    if (mb_strlen($shop_name) < 3) {
                        $errors[] = "- Your shop name is short, minimun 3 chars";
                    }

                    if(!$mgrUser->is_already_in_User('sallers','shop_name', $shop_name)){
                        $errors[] = "- This shop name is already in use";
                    }

                    if(!$mgrUser->is_already_in_User('sallers','matricule', $matricule)){
                        $errors[] = "- This matricul is already in use";
                    }

                    $F->notif_errors([$errors]);

                }else {
                    $errors[] = "- Please complete all forms";
                    $F->notif_errors([$errors]);
                } 

                if(count($errors) === 0){
                    (new MgrLogin)->register_step2($data);
                }
            }

        }else{
            Functions::redir('register');
        } 
    }

    public function showForget(){
        session_start();
        Functions::Auth_UserIS();
        $F = new Functions();
        $rest = new MgrUser();
        include_once S_VIEWS.'/forget.view.php';

        $pf_un = $_POST['user_name'];
        $errors = [];

        if (isset($_POST['soumettre'])){

            if (!$F->not_empty([$pf_un])){

                if (filter_var($pf_un, FILTER_VALIDATE_EMAIL)){
                    $rest->restPass_M($pf_un);
                }
                if (filter_var($pf_un, FILTER_VALIDATE_INT) && mb_strlen($pf_un) >= 5){
                    $rest->restPass_P($pf_un);
                }elseif (filter_var($pf_un, FILTER_VALIDATE_INT) && mb_strlen($pf_un) < 5){
                    $errors [] = 'Invalid Phone Number';
                }

                $F->notif_errors($errors);
                return;

            }else{
                $errors [] = 'please complete all forms';
                $F->notif_errors($errors);
            }

        }$F->clear_input_data();
    }
    public function showAuthentification(){
        session_start();
        Functions::Auth_UserIS();
        $D = new MgrUser();
        $F = new Functions();
        include_once S_VIEWS.'/authentification.view.php';

        $in_code = $_POST['code'];
        $errors = [];

        if (isset($_POST['subt'])){
            if (!empty($in_code) && mb_strlen($in_code) === 5 && filter_var($in_code, FILTER_VALIDATE_INT)){
                $D->authCodeValidate($in_code);
            }else{
                $errors [] = 'Invalid code';
                $F->notif_errors($errors);
            }
        }
    }
    public function showReset(){
        session_start();
        Functions::Auth_UserIS();
        $F = new Functions();
        $d = new MgrUser();
        include_once S_VIEWS.'/reset.view.php';

        $n_password = $_POST['n_password'];
        $np_confirm = $_POST['np_confirm'];

        $errors= [];

        if (isset($_POST['submit'])){
            if (!$F->not_empty([$n_password, $np_confirm])){
                if (mb_strlen($n_password) < 8){
                    $errors [] = '- Your password is short, min 8 chars';
                }elseif ($n_password !== $np_confirm){
                    $errors [] = '- Sorry passwords are not same';
                }

                if (count($errors) === 0){
                    $d->newpass($n_password);
                }

                $F->notif_errors($errors);
            }
        }

    }

    public function showLogin(){
        session_start();
        Functions::Auth_UserIS();
        include_once S_VIEWS.'/login.view.php';

        $errors = [];
        $u_name = $_POST['u_name'];
        $u_pass = $_POST['passw'];

        if (isset($_POST['connect'])){
            if (empty($u_name) || empty($u_pass)){
                $errors[] = 'Please complete all fields';
            }elseif (mb_strlen($u_name)<3){
                $errors[] = '- User name is wrong';
            }elseif (mb_strlen($u_pass)<8){
                $errors[] = '- Password is wrong';
            }
            (new Functions)->notif_errors($errors);

            if (count($errors) === 0){
                (new MgrLogin)->current_user_log($u_pass);
            }
        }
    }
}