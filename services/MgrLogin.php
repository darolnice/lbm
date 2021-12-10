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
     * @param $password_login_sha1
     */
    public function adminLog($password_login_sha1){
        $errors = [];

        $q = parent::getDb()->prepare("SELECT * FROM sallers WHERE (username = :identifiant or email = :identifiant)AND actived = :actived");
        $q->execute([
            'actived'        => '1',
            'identifiant'    => $_POST['u_name'],
        ]);
        $data = $q->fetch(PDO::FETCH_OBJ);

        if (password_verify($password_login_sha1, $data->saller_password)){
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

            Functions::save_in_cookies($data->username, $data->city, $data->phone_number, $data->email);
            Functions::redir('dashboard');
        }else{
            $errors[] = '- Password is wrong click on PASSWORD FORGET for reset your password or click on SIGNUP to create account';
            (new Functions)->notif_errors($errors);
        }
    }

    /**
     * @param $password_login_sha1
     */
    public function current_user_log($password_login_sha1){
        try {
            $q = parent::getDb()->prepare("SELECT * FROM users WHERE (username = :username or email = :username) AND actived = 1");
            $q->execute(['username' => $_POST['u_name']]);
            $data = current($q->fetchAll(PDO::FETCH_OBJ));

            if (password_verify($password_login_sha1, $data->password)){
                $_SESSION['current_user_id'] = $data->id;
                $_SESSION['city'] = $data->city;
                $_SESSION['email'] = $data->email;
                $_SESSION['phone_number'] = $data->phone_number;
                $_SESSION['username'] = $data->username;
                $_SESSION['country'] = $data->country;
                $_SESSION['profil_image'] = $data->profil_image;

                Functions::save_in_cookies($data->username, $data->city, $data->phone_number, $data->email);
                Functions::redir('panel');
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
        $pp = 'IMG-60c241dcc931a9.50161382.jpg';

        $_SESSION['tkn'] = sha1($_POST['user_name'].$_POST['email']);
        $_SESSION['new_user'] = $_POST['user_name'];

        $subject = SITE_NAME. " - Acoumpte activation";

        ob_start();
        require(S_VIEWS.'/partials/tmpl/custumer_activation_mail_tmpl.view.php');
        $content = ob_get_clean();

        try {
            $qry =parent::getDb()->prepare('INSERT INTO users (username,
                                                               genre,
                                                               interest_by,
                                                               country,
                                                               email,
                                                               phone_number,
                                                               password,
                                                               profil_image)
                                                        VALUES(:username,
                                                               :genre,
                                                               :interest_by,
                                                               :country,
                                                               :email,
                                                               :phone,
                                                               :password,
                                                               :profil_image)');

            $qry->execute([
                'username'       => $_POST['user_name'],
                'genre'          => $_POST['civility'],
                'interest_by'    => $_POST['interest'],
                'country'        => $_POST['country'],
                'email'          => $_POST['email'],
                'phone'          => $_POST['phone_number'],
                'password'       => password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]),
                'profil_image'   => $pp,
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
     *
     */
    public function register(){
        $pp = 'IMG-60c241dcc931a9.50161382.jpg';
        try {

            $qr = parent::getDb()->prepare('INSERT INTO sallers
                                                        (username,
                                                         genre,
                                                         interest_by,
                                                         country,
                                                         email,
                                                         phone_number,
                                                         saller_password,
                                                         profil_image,
                                                         actived)
                                             VALUES(:username,
                                                          :genre,
                                                          :interest_by,
                                                          :country,
                                                          :email,
                                                          :phone_number,
                                                          :saller_password,
                                                          :profil_image,
                                                          :actived)'
            );

            $qr->execute([
                'username'          => $_POST['user_name'],
                'genre'             => $_POST['civility'],
                'interest_by'       => '',
                'country'           => $_POST['country'],
                'email'             => $_POST['email'],
                'phone_number'      => $_POST['phone_number'],
                'saller_password'   => password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]),
                'profil_image'      => $pp,
                'actived'           => '0'
            ]);

            if ($qr->rowCount() === 1){
                $_SESSION['c_name'] = $_POST['user_name'];
                $_SESSION['saller_mail'] = $_POST['email'];
                Functions::redir('register_2');

            }else{
                (new Functions)->notif_errors(['Something is wrong']);
                return;
            }

        }catch (PDOException $e){
           $e->getMessage();
        }
    }

    /**
     * @param array $data
     * @return string
     */
    public function register_step2(array $data = []): string {
        $F = new Functions();
        $_SESSION['tkn'] = sha1($data[0].$data[5]);
        $_SESSION['shop_name'] = $data[0];

        ob_start();
        require(S_VIEWS.'/partials/tmpl/saller_activation_mail_tmpl.view.php');
        $content = ob_get_clean();

        try {
            $qry = parent::getDb()->prepare('UPDATE sallers SET shop_name = :shop_name,
                                                             city = :city,
                                                             activity = :activity,
                                                             description = :description,
                                                             matricule = :matricule,
                                                             shop_key = :shop_key,
                                                             current_plan = :current_plan                                                  
                                                             WHERE username= :username'
            );

            $qry->bindParams('username', $_SESSION['c_name'], PDO::PARAM_STR);
            $qry->bindParams('shop_name', $data[0], PDO::PARAM_STR);
            $qry->bindParams('city', $data[1], PDO::PARAM_STR);
            $qry->bindParams('activity', $data[2], PDO::PARAM_STR);
            $qry->bindParams('description', $data[3], PDO::PARAM_STR);
            $qry->bindParams('matricule', $data[4], PDO::PARAM_STR);
            $qry->bindParams('shop_key', $data[5], PDO::PARAM_STR);
            $qry->bindParams('current_plan', $data[6], PDO::PARAM_STR);

            if ($qry->execute()){
                (new MgrProducts)->createShop($_POST['shop_name'], $content);
            }else{
                $F->notif_errors(['Someone is wrong please check your network!!!']);
            }

        }catch (PDOException $e){
            return $e->getMessage();
        }
        return false;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function createSubUser(array $data){
        try {
            $qr = parent::getDb()->prepare('INSERT INTO sub_admin (right_,
                                                                            name,
                                                                            email,
                                                                            phone,
                                                                            password,
                                                                            shop)
                                                            VALUES(:right,
                                                                   :name,
                                                                   :email,
                                                                   :phone,
                                                                   :password,
                                                                   :shop)'
            );

            $qr->bindParams('right', $data[0], PDO::PARAM_STR_CHAR);
            $qr->bindParams('name', $data[1], PDO::PARAM_STR_CHAR);
            $qr->bindParams('email', $data[2], PDO::PARAM_STR_CHAR);
            $qr->bindParams('phone', $data[3], PDO::PARAM_STR_CHAR);
            $qr->bindParams('password', password_hash($data[4], PASSWORD_DEFAULT, ['cost' => 12]), PDO::PARAM_STR_CHAR);
            $qr->bindParams('shop', $_SESSION["shop_name"], PDO::PARAM_STR_CHAR);

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