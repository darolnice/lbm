<?php
//namespace Lbm\Mgrlogin;
//
//use Lbm\Functions\Functions;
//use Lmb\MgrProducts\MgrProducts;
//use Lmm\Database\Database;
//use PDO;


class MgrLogin extends Database
{
    /**
     * @param $password
     */
    public function adminLog($password){
        $errors = [];

        $q = parent::getDb()->prepare("SELECT * FROM sallers WHERE (username = :identifiant or email = :identifiant)AND actived = :actived");
        $q->execute([
            'actived'        => '2',
            'identifiant'    => strip_tags($_POST['u_name']),
        ]);
        $data = $q->fetch(PDO::FETCH_OBJ);

        if (password_verify($password, $data->saller_password)){
            $_SESSION['saller_id'] = $data->id;
            $_SESSION['username'] = $data->username;
            $_SESSION['shop_name'] = $data->shop_name;
            $_SESSION['city'] = $data->city;
            $_SESSION['country'] = $data->country;
            $_SESSION['email'] = $data->email;
            $_SESSION['phone_number'] = $data->phone_number;
            $_SESSION['profil_image'] = $data->profil_image;
            $_SESSION['order by'] = 'prod_name';
            if($data->shop_name === 'lbm'){
                $_SESSION['client_order'] = 'statu';
                $_SESSION['filter_user'] = 'username';
            }
            $_SESSION['llst'] = time();
            Functions::save_in_cookies("cookies_u_data", $data->username, $data->city, $data->phone_number, $data->email, $data->country, Functions::SNFormatFront($data->shop_name));

            if ($_POST['ckb_rm_s'] === 'on'){
                $ds = serialize([$data->username, $password]);
                setcookie("rmbs",  $ds);
            }else{
                unset($_COOKIE['rmbs']);
                setcookie("rmbs",  "", time()-10);
            }

            (!empty($_COOKIE['r'])) ? Functions::redir($_COOKIE['r']) : Functions::redir('dashboard');

        }else{
            $errors[] = '- Password is wrong click on PASSWORD FORGET for reset your password or click on SIGNUP to create account';
            (new Functions)->notif_errors($errors);
        }
    }

    /**
     * @param $password
     * @return bool
     */
    public function current_user_log($password){
        try {
            $q = parent::getDb()->prepare("SELECT * FROM users WHERE (username = :username or email = :username) AND actived = 2");
            $q->execute(['username' => $_POST['u_name']]);
            $data = current($q->fetchAll(PDO::FETCH_OBJ));

            if (password_verify($password, $data->password)){
                $_SESSION['current_user_id'] = $data->id;
                $_SESSION['city'] = $data->city;
                $_SESSION['email'] = $data->email;
                $_SESSION['phone_number'] = $data->phone_number;
                $_SESSION['username'] = $data->username;
                $_SESSION['country'] = $data->country;
                $_SESSION['profil_image'] = $data->profil_image;

                $_SESSION['llst'] = time();

                Functions::save_in_cookies("cud", $data->username, $data->city, $data->phone_number, $data->email, $data->country, null);

                if ($_POST['ckb_rm'] === 'on'){
                    $ds = serialize([$data->username, $password]);
                    setcookie("rmb",  $ds);
                }else{
                    unset($_COOKIE['rmb']);
                    setcookie("rmb",  "", time()-10);
                }

                (!empty($_COOKIE['r'])) ? Functions::redir($_COOKIE['r']) : Functions::redir('panel');
            }else{
                $errors[] = '- Password is wrong click on PASSWORD FORGET for reset your password or click on SIGNUP to create account';
                (new Functions)->notif_errors($errors);
            }
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return false;
    }

    /**
     *
     */
    public function signUp(){
        $F = new Functions();

        $_SESSION['tkn'] = sha1($_POST['user_name'].$_POST['email']);
        $_SESSION['new_user'] = $_POST['user_name'];

        $subject = SITE_NAME. " - Acoumpte activation";

        ob_start();
        require(S_VIEWS.'partials/tmpl/custumer_activation_mail_tmpl.view.php');
        $content = ob_get_clean();

        try {
            $qry =parent::getDb()->prepare('INSERT INTO users (username,
                                                               genre,
                                                               interest_by,
                                                               country,
                                                               email,
                                                               phone_number,
                                                               password)
                                                              
                                                        VALUES(:username,
                                                               :genre,
                                                               :interest_by,
                                                               :country,
                                                               :email,
                                                               :phone,
                                                               :password)');

            $qry->execute([
                'username'       => $_POST['user_name'],
                'genre'          => $_POST['civility'],
                'interest_by'    => $_POST['interest'],
                'country'        => $_POST['country'],
                'email'          => $_POST['email'],
                'phone'          => $_POST['phone_number'],
                'password'       => password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]),
            ]);

            if ($qry->rowCount() === 1){
                $headers = "Content-type: text/html; charset=iso-8859-1" .  "\r\n";
                mail($_POST['email'], $subject, $content, $headers);
                Functions::set_flash_tab(['Save successfully, please check your e-mail to active your account']);
                Functions::redir('login');
            }else{
                $F->notif_errors(['someone is wrong please try again!!!']);
            }

        }catch (PDOException $e){
            $F->notif_errors([$e->getMessage()]);
        }
    }

    /**
     * @param array $data
     */
    public function register(array $data){
        try {

            $qr = parent::getDb()->prepare("INSERT INTO sallers (username, genre, country, email, phone_number, saller_password)
                                            VALUES(:username, :genre, :country, :email, :phone_number, :saller_password)"
            );

            $f_pass = password_hash($data[5], PASSWORD_DEFAULT, ['cost' => 12]);                                   
            
            $qr->bindParam(':username', $data[0], PDO::PARAM_STR);
            $qr->bindParam(':genre', $data[1], PDO::PARAM_STR);
            $qr->bindParam(':country', $data[2], PDO::PARAM_STR);
            $qr->bindParam(':email', $data[3], PDO::PARAM_STR);
            $qr->bindParam(':phone_number', $data[4], PDO::PARAM_STR);
            $qr->bindParam(':saller_password', $f_pass, PDO::PARAM_STR_CHAR);

            if ($qr->execute()){     
                $_SESSION['tmp_name'] = $data[0];
                $_SESSION['tmp_email'] = $data[3];
                Functions::redir('register_2');

            }else{
                (new Functions)->notif_errors(['Something is wrong']);
            }

        }catch (PDOException $e){
           $e->getMessage();
        }
    }

    /**
     * @param array $data
     * @param $indice
     * @return bool|string
     */
    public function registerStep2(array $data, $indice){
        session_start();
        if ($indice === 'txt_data'){
            $_SESSION['tkn'] = sha1($data[0].$data[5]);
            $_SESSION['shop_name'] = $data[0];

            try {
                $qry = parent::getDb()->prepare("UPDATE sallers SET shop_name = :_shopname,
                                                                              city = :_city,
                                                                              activity = :_activity,
                                                                              description = :_description,
                                                                              matricule = :_matricule,  
                                                                              current_plan = :_current_plan
                                                           WHERE username = :_username"
                );

                $qry->bindParam(':_username', $_SESSION['tmp_name'], PDO::PARAM_STR);
                $qry->bindParam(':_shopname', $data[0], PDO::PARAM_STR_CHAR);
                $qry->bindParam(':_city', $data[1], PDO::PARAM_STR_CHAR);
                $qry->bindParam(':_activity', $data[2], PDO::PARAM_STR_CHAR);
                $qry->bindParam(':_description', $data[3], PDO::PARAM_STR_CHAR);
                $qry->bindParam(':_matricule', $data[4], PDO::PARAM_STR_CHAR);
                $qry->bindParam(':_current_plan', $data[5], PDO::PARAM_STR_CHAR);

                if ($qry->execute()){
                   return 'ok';
                }

            }catch (PDOException $e){
                return $e->getMessage();
            }

        }else{
            try {
                (new MgrProducts)->createShop($_SESSION['shop_name'], [$data[0], $data[1], $data[2], $data[3]]);

            }catch (PDOException $e){
                return $e->getMessage();
            }
        }

        return false;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function createSubUser(array $data){
        try {
            $qr = parent::getDb()->prepare('INSERT INTO sub_admin (right_, name, email, phone, password, shop)
                                            VALUES(:right, :name, :email, :phone, :password, :shop)'                               
            );

            $qr->bindParam('right', $data[0], PDO::PARAM_STR_CHAR);
            $qr->bindParam('name', $data[1], PDO::PARAM_STR_CHAR);
            $qr->bindParam('email', $data[2], PDO::PARAM_STR_CHAR);
            $qr->bindParam('phone', $data[3], PDO::PARAM_STR_CHAR);
            $password_hash = password_hash($data[4], PASSWORD_DEFAULT, ['cost' => 12]);
            $qr->bindParam('password', $password_hash, PDO::PARAM_STR_CHAR);
            $qr->bindParam('shop', $_SESSION["shop_name"], PDO::PARAM_STR_CHAR);

            if ($qr->execute()){
                $qr->closeCursor();
                return true;
            }

        }catch (PDOException $e){
            $f = new Functions();
            $f->notif_errors($e->getMessage());
        }
        return false;
    }


}