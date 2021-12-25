<?php
//namespace Lbm\MgrUser;
//
//use Lbm\Functions\Functions;
//use Lmm\Database\Database;
//use mysql_xdevapi\Exception;
//use PDO;

class MgrUser extends Database
{
    private $format;

    /**
     * @param $id
     * @return mixed
     */
    public function current_su_data($id)
    {
        try {
            $q = parent::getDb()->prepare("SELECT * FROM users WHERE id = $id");
            $q->execute();
            return current($q->fetchAll(PDO::FETCH_OBJ));
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $saller_id
     * @return array|bool
     */
    public function current_saller_data($saller_id): array
    {
        try {
            $d = parent::getDb()->prepare("SELECT * FROM sallers WHERE id = $saller_id");
            $d->execute();
            return $d->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getAdminOldPass()
    {
        $d = parent::getDb()->prepare("SELECT saller_password FROM sallers WHERE id = :id");
        $d->execute(["id" => $_SESSION["saller_id"]]);
        return $d->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function manageSubAdmin()
    {
        try {
            $d = parent::getDb()->prepare("SELECT * FROM sub_admin WHERE shop = :shop");
            $d->execute(["shop" => $_SESSION["shop_name"]]);
            return $d->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [$e->getMessage()];
        }
    }


    /**
     * @param $pf_un
     * @throws \Exception
     */
    public function restPass_M($pf_un)
    {
        $F = new Functions();
        $rand = $F->random_id();

        if (filter_var($pf_un, FILTER_VALIDATE_EMAIL)) {
            $q = parent::getDb()->prepare('UPDATE users SET auth_code = :p_reset WHERE email = :email');
            $q->execute([
                "p_reset" => $rand,
                "email" => $pf_un,
            ]);

        } else {
            $q = parent::getDb()->prepare('UPDATE users SET auth_code = :p_reset WHERE phone = :phone');
            $q->execute([
                "p_reset" => $rand,
                "phone" => $pf_un
            ]);
        }

        if ($q->rowCount() === 1) {
            $to = $pf_un;
            $subject = SITE_NAME . " - Reset password";

            $headers = "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            mail($to, $subject, 'Your reset code is' . " " . $rand, $headers);

            $F->set_flash_tab('Authentification code sent, please check your mail');

            $_SESSION['email'] = $pf_un;
            $F->redir('authentification');

        } else {
            $errors [] = 'User not found';
            $F->notif_errors($errors);
            return;
        }
    }

    /**
     * @param $pf_ph
     */
    public function restPass_P($pf_ph)
    {


    }

    /**
     * @param $in_code
     */
    public function authCodeValidate($in_code)
    {
        $F = new Functions();
        $errors = [];

        $d = parent::getDb()->prepare('SELECT auth_code FROM users WHERE (email = :email or phone = :phone)');
        $d->execute([
            "phone" => $_SESSION['phone'],
            "email" => $_SESSION['email']
        ]);
        $rest = $d->fetch(PDO::FETCH_OBJ);
        $d->closeCursor();

        if ($in_code !== $rest->auth_code) {
            $errors [] = 'Reset code is wrong please try again later!!';
            $F->notif_errors($errors);
            return;
        } else {
            $F->redir('reset');
        }
    }

    /**
     * @param $n_pass
     */
    public function newpass($n_pass)
    {
        $F = new Functions();

        $n = parent::getDb()->prepare('UPDATE users SET password = :password WHERE
                                (phone = :phone or email = :email)');
        $n->execute([
            "password" => password_hash($n_pass, PASSWORD_DEFAULT, ['cost' => 12]),
            "phone" => $_SESSION['phone'],
            "email" => $_SESSION['email']
        ]);
        $n->closeCursor();

        $F->set_flash_tab('Password change successfully', "info");
        $F->redir('login');
    }

    /**
     * @param string $sallerId
     * @param string $columb
     * @param $sallerData
     */
    public function updateSallerData($saller_name, string $columb, $sallerData)
    {
        try {
            if($columb === 'shop_name'){

                $oldName = $_SESSION['shop_name'];
                $t = parent::getDb()->prepare("ALTER TABLE $oldName RENAME TO $sallerData");
                if($t->execute()){

                    $g = parent::getDb()->prepare("UPDATE $sallerData SET shop_name = :shop_name");
                    $g->bindValue('shop_name', $sallerData, PDO::PARAM_STR);
                    if($g->execute()){

                        $y = parent::getDb()->prepare("UPDATE sallers SET $columb = :data WHERE username = :saller_n");
                        $y->bindValue('data', $sallerData, PDO::PARAM_STR);
                        $y->bindValue('saller_n', $saller_name, PDO::PARAM_INT);
                        if($y->execute()){
                            $y->closeCursor();
                            $_SESSION['shop_name'] = $sallerData;
                            return Functions::sentNotif('Update successfully');
                        }
                    }
                }
            }

            $n = parent::getDb()->prepare("UPDATE sallers SET $columb = :data WHERE username = :saller_name");
            $n->bindParam('data', $sallerData, PDO::PARAM_STR);
            $n->bindParam('saller_name', $saller_name, PDO::PARAM_STR);
            if($n->execute()){
                $n->closeCursor();
                return 'Update successfully';
            }

        }catch(PDOException $e){
            return $e->getMessage();
        }
        return false;
    }


    /**
     * @param $table
     * @param $column
     * @param $value
     * @return bool
     */
    public function is_already_in_User($table, $column, $value): bool
    {
        try {
            $q = parent::getDb()->prepare("SELECT $column FROM $table WHERE $column = $value");
            if($q->execute()){
                $q->closeCursor();
                return false;
            }
        }catch(PDOException $e){
            return true;
        }
       return false;
    }

    /**
     * @param $uid
     * @param $right
     * @return bool
     */
    public function mgrSAR($uid, $right): bool
    {
        try {
            $set = parent::getDb()->prepare("UPDATE sub_admin SET right_ = :right WHERE id = $uid");
            $set->execute(['right' => $right]);
            return true;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $uid
     */
    public function delSA($uid): bool
    {
        try {
            $set = parent::getDb()->prepare("DELETE FROM sub_admin WHERE id = $uid");
            $set->execute();
            return true;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $entre
     * @param $val1
     * @param null $passW
     * @param null $colomb
     * @return string
     */
    public function updateSuData($entre, $val1, $passW = null, $colomb = null)
    {
        try {
            if ($colomb === 'password') {
                $q = parent::getDb()->prepare("SELECT password FROM users WHERE id = $entre");
                $q->execute();
                $d = $q->fetch(PDO::FETCH_ASSOC);
                if (password_verify($passW, $d['password'])) {
                    $query = parent::getDb()->prepare("UPDATE users SET $colomb = :newV WHERE id = $entre");
                    $query->execute(['newV' => password_hash($val1, PASSWORD_DEFAULT, ['cost' => 12])]);
                    return 'Password Update Successfully';
                } else {
                    return 'Passwod is wrong';
                }
            }
            if ($colomb === 'city') {
                $query = parent::getDb()->prepare("UPDATE users SET $colomb = :newV WHERE id = $entre");
                $query->execute(['newV' => $val1]);
                $_SESSION[$colomb] = $val1;
                return 'City Update Successfully';
            } else {
                $q = parent::getDb()->prepare("SELECT password FROM users WHERE id = $entre");
                $q->execute();
                $d = $q->fetch(PDO::FETCH_ASSOC);
                if (password_verify($passW, $d['password'])) {
                    $query = parent::getDb()->prepare("UPDATE users SET $colomb = :newV WHERE id = $entre");
                    $query->execute(['newV' => $val1]);
                    $_SESSION[$colomb] = $val1;
                    return 'Update Success';
                } else {
                    return 'Password is wrong';
                }
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array $values
     * @return bool|string
     * Ici je pourrais au prealable sauvegarder la ref de la pp en session et la recuperer a tout moment quand j'en aurais besoin 
     */
    public function addBlogPost(array $values)
    {
        try {
            
            if (isset($_SESSION['saller_id'])) {
                $qr = parent::getDb()->prepare('SELECT profil_image FROM sallers WHERE id = :id');
                $qr->execute(['id' => $_SESSION['saller_id']]);
                $data = $qr->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $qr = parent::getDb()->prepare('SELECT profil_image FROM users WHERE id = :id');
                $qr->execute(['id' => $_SESSION['current_user_id']]);
                $data = $qr->fetchAll(PDO::FETCH_ASSOC);
            }

            $q = parent::getDb()->prepare("INSERT INTO blog_post (username,
                                 email, poster_img, post, prod_name, post_img_ref, price, category, rate, comments, posted_at)
                                 VALUES (:username, :email, :poster_img, :post, :prod_name, :post_img_ref, :price,
                                 :category, :rate, :comments, :posted_at)"
            );

            $q->bindValue("username",     $_SESSION['username'], PDO::PARAM_STR);
            $q->bindValue("email",        $_SESSION['email'], PDO::PARAM_STR);
            $q->bindValue("poster_img",   $data[0]["profil_image"], PDO::PARAM_STR);
            $q->bindValue("post",         $values[5], PDO::PARAM_STR);
            $q->bindValue("prod_name",    $values[0], PDO::PARAM_STR);
            $q->bindValue("post_img_ref", $values[2], PDO::PARAM_STR);
            $q->bindValue("price",        $values[1], PDO::PARAM_STR);
            $q->bindValue("category",     $values[3], PDO::PARAM_STR);
            $q->bindValue("rate",         $values[4], PDO::PARAM_STR);
            $q->bindValue("comments",     null, PDO::PARAM_STR);
            $q->bindValue("posted_at",    date("Y-M-D H:i:s"), PDO::PARAM_STR);
            $q->execute();
            if ($q->rowCount() === 1) {
                return Functions::sentNotif('Post add successfully');
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return false;
    }

    /**
     * @param array $values
     * @return array|bool|string
     */
    public function addBlogCmt(array $values)
    {
        try {
            $q = parent::getDb()->prepare("SELECT comments FROM blog_post WHERE id = :id");
            $q->execute(['id' => $values[0]]);
            if ($q->rowCount() == 1) {
                $data = $q->fetch(PDO::FETCH_ASSOC);
                if ($data['comments'] == null){
                    $nv = ['0' => ['name'    => $values[3],
                                   'email'   => $values[4],
                                   'img'     => $values[2],
                                   'comment' => $values[1],
                                   'add_at'  => date("Y-M-D H:i:s")
                    ]];
                    $qr = parent::getDb()->prepare('UPDATE blog_post SET comments = :commts WHERE id = :id');
                    $qr->execute(['commts' => json_encode($nv), 'id' => $values[0]]);

                }else{
                    $dta = json_decode($data['comments'], true);
                    $nv = ['name'    => $values[3],
                           'email'   => $values[4],
                           'img'     => $values[2],
                           'comment' => $values[1],
                           'add_at'  => date("Y-M-D H:i:s")
                    ];
                    array_push($dta, $nv);
                    $qr = parent::getDb()->prepare('UPDATE blog_post SET comments = :commts WHERE id = :id');
                    $qr->execute(['commts' => json_encode($dta), 'id' => $values[0]]);
                }
                return Functions::sentNotif('Comment Add');
            }

        } catch (PDOException $e) {
            return [$e->getMessage()];
        }
        return false;
    }

    /**
     * @param string $table
     * @param string $shopname
     * @return array
     */
    public function getAllfromAnyBusiUser(string $table, string $shopname): array {
        try {
            $qr = parent::getDb()->prepare("SELECT * FROM $table WHERE shop_name = :shopname");
            $qr->execute(['shopname' => htmlentities($shopname)]);
            return $qr->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return [$e->getMessage()];
        }
    }

    /**
     * @param string $table
     * @param $uid
     * @return array
     */
    public function getallFromOne(string $table, $uid): array {
        try {
            $q = parent::getDb()->prepare("SELECT * FROM $table WHERE id = :uid");
            $q->execute(['uid'=>$uid]);
            return $q->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return [$e->getMessage()];
        }
    }

    /**
     * @return array
     */
    public function getshoplist(): array {
        try {
            $qr = parent::getDb()->prepare("SELECT * FROM sallers WHERE actived = 2");
            $qr->execute();
            return $qr->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return [$e->getMessage()];
        }
    }

    /**
     * @param $destinataire
     * @return bool|mixed|string
     */
    public function getAllNotifs($destinataire){
        try {
            $qr = parent::getDb()->prepare("SELECT activity FROM sallers WHERE shop_name = :shpname");
            $qr->bindValue('shpname', strip_tags($destinataire), PDO::PARAM_STR_CHAR);
            $qr->execute();
            $activity = $qr->fetch(PDO::FETCH_ASSOC)['activity'];

            $ql = parent::getDb()->prepare("SELECT * FROM notif WHERE destinataire = :dest1 OR destinataire = :dest2");
            if ($ql->execute(["dest1" => $destinataire, 'dest2' => 'SPA-'.$activity])){
                $data = $ql->fetchAll(PDO::FETCH_ASSOC);
                return [$data];
            }

        }catch (PDOException $e){
            return $e->getMessage();
        }
        return false;
    }

    /**
     * @param $dest
     * @return bool|mixed|string
     */
    public function getAllMess($dest, $indice = null){
        try {

            if ($indice === null){
                $ql = parent::getDb()->prepare("SELECT * FROM message WHERE statu = 0 AND destinataire = :dest");
                if ($ql->execute(["dest"=>$dest])){
                    return  $ql->fetchAll(PDO::FETCH_ASSOC);
                }
            }else{

                $ql = parent::getDb()->prepare("SELECT * FROM message WHERE destinataire = :dest");
                if ($ql->execute(["dest"=>$dest])){
                    return $ql->fetchAll(PDO::FETCH_ASSOC);
                }
            }

        }catch (PDOException $e){
            return $e->getMessage();
        }
        return false;
    }



}