<?php
//use Lmm\Database\Database;
//

class RestApi extends Database
{
    /**
     * @param string $tabl1
     * @param string $columb
     * @return string
     */
    public function jxSearchAW(string $tabl1, string $columb) {
        try {
            $q = parent::getDb()->prepare("SELECT $columb FROM $tabl1 WHERE $columb LIKE :item");
            $find = filter_var($_GET["Search"], FILTER_SANITIZE_SPECIAL_CHARS);
            $q->bindValue("item", htmlentities(trim($find."%")), PDO::PARAM_STR_CHAR);
            $q->execute();
            $data = $q->fetchAll(PDO::FETCH_ASSOC);
            $q->closeCursor();
            echo json_encode($data);

        }catch (PDOException $e){
            return $e->getMessage();
        }
        return null;
    }

    /**
     * @param string $tabl1
     * @param string $columb
     * @return string
     */
    public function jxSearchAnyWhere(string $tabl1, string $columb) {
        try {
            $q = parent::getDb()->prepare("SELECT $columb FROM $tabl1 WHERE $columb LIKE :item");
            $q->execute(['item' => htmlentities(trim("%".$_GET["Sp"]."%"))]);
            $data = $q->fetchAll(PDO::FETCH_ASSOC);
            $q->closeCursor();
            echo json_encode($data);

        }catch (PDOException $e){
            return $e->getMessage();
        }
        return null;
    }

    /**
     * @param string $tabl1
     */
    public function ajaxSearchApi(string $tabl1) {
        try {
            $q = parent::getDb()->prepare("SELECT prod_name FROM $tabl1 WHERE prod_name LIKE :prod_name");
            $q->execute(['prod_name' => htmlentities(trim("%".$_GET["Sp"]."%"))]);
            $data = $q->fetchAll(PDO::FETCH_ASSOC);
            $q->closeCursor();
            echo json_encode($data);

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * home page ajax search
     */
    public function ajaxHomeSearchApi() {
        try {
            $q = parent::getDb()->prepare("SELECT prod_name FROM home_special_promo WHERE prod_name LIKE :prod_name");
            $q->execute(['prod_name'=> htmlentities(trim($_GET["Sp"]."%"))]);
            $data = $q->fetchAll(PDO::FETCH_ASSOC);
            $q->closeCursor();

            $qy = parent::getDb()->prepare("SELECT prod_name FROM lbm WHERE prod_name LIKE :prod_name");
            $qy->execute(['prod_name'=> htmlentities(trim($_GET["Sp"]."%"))]);
            $dta = $qy->fetchAll(PDO::FETCH_ASSOC);
            $qy->closeCursor();

            echo json_encode([$data, $dta]);

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }


    /**
     * @param $clientName
     */
    public function jxCheckDuplicateShop($clientName): string {
        try {
            $q = parent::getDb()->prepare("SELECT id FROM $clientName");
            if ($q->execute()){
                return 'Already in use';
            }
        }catch (PDOException $e){
            return 'free';
        }
        return false;
    }

    /**
     * @param $clientName
     */
    public function AjaxCheckDuplicateName($clientName): string {
        try {
            $qr = parent::getDb()->prepare("SELECT id FROM users WHERE username = :clientName");
            $qr->execute(['clientName' => $clientName]);
            if ($qr->rowCount() === 0){
                $q = parent::getDb()->prepare("SELECT id FROM sallers WHERE username = :clientName");
                $q->execute(['clientName' => $clientName]);
                if ($q->rowCount() === 1){
                    return 'Already in use';
                }else{
                    return 'free';
                }
            }
        }catch (PDOException $e){
            echo $e->getMessage();
            return 1;
        }
        return false;
    }


    /**
     * @param $current_shop
     * @param $prod_id
     */
    public function jxProdData($current_shop, $prod_id) {
        $f = parent::getDb()->prepare("SELECT * FROM $current_shop WHERE id = :id");
        $f->execute(["id" => $prod_id]);
        $data = $f->fetchAll(PDO::FETCH_OBJ);
        $f->closeCursor();

        return $data;
    }


    /**
     * @throws \Exception
     */
    public function jxSendAuthCode(): bool {
        $F = new Functions();
        $errors = [];
        $rand = $F->random_id();

        $q = parent::getDb()->prepare('UPDATE sallers SET auth_code = :code WHERE email = :email');
        $q->execute(["code" => $rand, "email" => $_SESSION['email']]);

        if ($q->rowCount() === 1){
            $subject = SITE_NAME. " - Reset";
            $headers = "Content-type: text/html; charset=iso-8859-1" .  "\r\n";
            mail($_SESSION['email'], $subject, 'Your Authentification code is'." ".$rand, $headers);
            return true;

        }else{
            $errors [] = 'User not found';
            $F->notif_errors($errors);
            return false;
        }
    }


    /**
     * @param $columb
     * @param $newValue
     * @param $code
     */
    public function jxUV($columb, $newValue, $code){
        $errors = [];
        $q = parent::getDb()->prepare('SELECT auth_code FROM sallers WHERE id = :id');
        $q->execute(["id" => $_SESSION['saller_id']]);
        $data = $q->fetch(PDO::FETCH_ASSOC);

        if ($data["auth_code"] == $code){
            $qr = parent::getDb()->prepare("UPDATE sallers SET $columb = :newValue, auth_code = :empty WHERE id = :id");
            $qr->execute([
                         "newValue" => $newValue,
                         "id" => $_SESSION['saller_id'],
                         "empty" => ''
            ]);
            $_SESSION[$columb] = $newValue;
            return $newValue;
        }else{
            $errors [] = 'User not found';
            (new Functions)->notif_errors($errors);
            return 'Auth code is wrong';
        }
    }


    /**
     * @param $right
     * @param $name
     * @param $email
     * @param $phone
     * @param $pass
     * @param null $img
     * @param $busi
     *
     */
    public function jxNewSa($right, $name, $email, $phone, $pass, $img, $busi){
        try {
            $qr = parent::getDb()->prepare('INSERT INTO sub_admin (name,
                                                                            email,
                                                                            phone,
                                                                            image,
                                                                            password,
                                                                            auth_code,
                                                                            shop,
                                                                            right_)

                                                            VALUES(:name,
                                                                   :email,
                                                                   :phone,
                                                                   :image,
                                                                   :password,
                                                                   :auth_code,
                                                                   :shop,
                                                                   :right
                                                            )'

            );

            $qr->execute([
                'name'          => $name,
                'email'         => $email,
                'phone'         => $phone,
                'image'         => $img,
                'password'      => password_hash($pass, PASSWORD_DEFAULT, ['cost' => 12]),
                'auth_code'     => '',
                'shop'          => $busi,
                'right'         => $right,
            ]);
            $qr->closeCursor();

            if ($qr->rowCount() === 1){
                return true;
            }

        }catch (PDOException $e){
            $f = new Functions();
            $f->notif_errors([$e->getMessage()]);
        }
        return false;
    }


    /**
     * @param $saller_id
     * @param $item
     */
    public function jxNewSCAT($saller_id, $item): bool {
        try{
            $q = parent::getDb()->prepare("SELECT business_sub_cat FROM sallers WHERE id = $saller_id");
            $q->execute();
            $data = $q->fetch(PDO::FETCH_ASSOC);

            $qr = parent::getDb()->prepare("UPDATE sallers SET business_sub_cat = :value WHERE id = $saller_id");
            if ($data['business_sub_cat'] === ''){
                $qr->execute(["value" => $item]);
            }else{
                $qr->execute(["value" => $data['business_sub_cat'].', '.$item]);
            }

            return true;

        }catch (PDOException $e){
            return $e->getMessage();
        }
    }


    /**
     * @param $action
     * @param $saller_id
     * @param string $item
     * @param string|null $newVal
     * @return string
     */
    public function jxMrgCAT($action, $saller_id, string $item, string $newVal = null): string {
        try {
            if ($action === "delete"){
                $q = parent::getDb()->prepare("SELECT business_categories FROM sallers WHERE id = $saller_id");
                $q->execute();
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $tab = json_decode($data["business_categories"]);
                $position = array_keys($tab, trim($item))[0];
                $tab[$position] = '';

                $qr = parent::getDb()->prepare("UPDATE sallers SET business_categories = :value WHERE id = $saller_id");
                $qr->execute(["value" => json_encode($tab)]);

                return $item.' '.'has been delete successfully';

            }elseif($action === "edit"){
                $q = parent::getDb()->prepare("SELECT business_categories FROM sallers WHERE id = $saller_id");
                $q->execute();
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $tab = json_decode($data["business_categories"]);
                $position = array_keys($tab, trim($item))[0];
                $tab[$position] = $newVal;

                $qr = parent::getDb()->prepare("UPDATE sallers SET business_categories = :value WHERE id = $saller_id");
                $qr->execute(["value" => json_encode($tab)]);

                return 'Update Success';
            }

        }catch (PDOException $e){
            return $e->getMessage();
        }
        return false;
    }


    /**
     * @param array $items
     * @return bool
     */
    public function jxPostAnnonce(array $items): bool{
        $f = new Functions();
        try {
            $ann_qry = parent::getDb()->prepare("INSERT INTO annonces (
                                                                      user_name,
                                                                      phone_number,
                                                                      email,
                                                                      city,
                                                                      prod_name,
                                                                      quantity,
                                                                      quality,
                                                                      price,
                                                                      color,
                                                                      size,
                                                                      comment_s,
                                                                      add_at)
                                                VALUES  (
                                                         :user_name,
                                                         :phone_number,
                                                         :email,
                                                         :city,
                                                         :prod_name,
                                                         :quantity,
                                                         :quality,
                                                         :price,
                                                         :color,
                                                         :size,
                                                         :comment_s,
                                                         :add_at)"
            );
            $ann_qry->execute([
                'user_name' => $_SESSION['username'],
                'phone_number' => $_SESSION['phone'],
                'email' => $_SESSION['email'],
                'city' => $_SESSION['city'],
                'prod_name' => $f->e($items[1]),
                'quantity' => $f->e($items[3]),
                'quality' => $f->e($items[0]),
                'price' => $f->e($items[2]),
                'color' => $f->e($items[4]),
                'size' => $f->e($items[5]),
                'comment_s' => $f->e($items[6]),
                'add_at' => date("Y-M-D H:i:s")
            ]);
            $ann_qry->closeCursor();
            if ($ann_qry->rowCount() == 1){
                return true;
            }

        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return false;
    }


    /**
     * @param $shopName
     * @param $pid
     */
    public function jxGetPriceFromDb($shopName, $pid){
        try {
            $p = parent::getDb()->prepare("SELECT price FROM $shopName WHERE id = $pid");
            $p->execute();
            return $p->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }


    /**
     * @param $annonce_id
     * @param string $annoncer
     * @param $comment
     * @return array
     */
    public function postAndGetcomment($annonce_id, string $annoncer, $comment): array {
        try {
            $pc = $this->getDb()->prepare("INSERT INTO responses (annonce_id, annoncer, shop_name, response, add_at)
                                                    VALUES (:annonce_id, :annoncer, :shop_name, :response, :add_at)"
            );

            $pc->execute([
                'annonce_id'=>$annonce_id,
                'annoncer' => $annoncer,
                'shop_name'=>$_SESSION['shop_name'],
                'response'=> (new Functions())->e($comment),
                'add_at'=> date("Y-M-D H:i:s")
            ]);
            $pc->closeCursor();

            if ($pc->rowCount() === 1){
                $sh = $this->getDb()->prepare("SELECT * FROM responses WHERE annonce_id = :annonce_id AND annoncer = :annoncer");
                $sh->execute(['annonce_id'=>$annonce_id, 'annoncer'=>$annoncer]);
                return $sh->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch (PDOException $e){
            return [$e->getMessage()];
        }
        return [];
    }

    /**
     * @param int $qid
     * @param array $avis
     * @return string
     */
    public function jxPostFaq(int $qid, array $avis): string {
        try {
            $q = parent::getDb()->prepare("SELECT sonder, positive, negative FROM faq WHERE id = :id");
            $q->execute(['id' => $qid]);

            if ($q->rowCount() === 1){
                $data = $q->fetchAll(PDO::FETCH_ASSOC);
                $q = parent::getDb()->prepare("UPDATE faq SET sonder = :sonder, positive = :positive, negative = :negative WHERE id = :id");
                $q->bindValue("sonder", (int)$data[0]['sonder']+1, PDO::PARAM_INT);

                if ((int)$avis[0] === 1){
                    $q->bindValue("positive", (int)$data[0]['positive']+1, PDO::PARAM_INT);
                    $q->bindValue("negative", $data[0]['negative'], PDO::PARAM_INT);
                }else{
                    $q->bindValue("negative", (int)$data[0]['negative']+1, PDO::PARAM_INT);
                    $q->bindValue("positive", $data[0]['positive'], PDO::PARAM_INT);
                }

                $q->bindValue("id", $qid, PDO::PARAM_INT);
                $q->execute();
                return 'Thank for your participation';
            }else{
                return 'Faill';
            }
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }


    /**
     * @param string $table
     * @param array $values
     * @return array
     */
    public function genericShopInsert(string $table, array $values): string {
        try {
            $pc = $this->getDb()->prepare("INSERT INTO $table (shop_name, prod_name, add_by, category, quality, sub_category,
                                                                          price, promo, rating, rater, checked, color, size, proprities,
                                                                          quantity, description, img1, img2, img3, img4, img5)                                     
                                                     VALUES(:shop_name, :prod_name, :add_by, :category, :quality, :sub_category,
                                                        :price, :promo, :rating, :rater, :checked, :color, :size, :proprities,
                                                        :quantity, :description, :img1, :img2, :img3, :img4, :img5
                                                     )"
            );

            $pc->bindValue("shop_name", $values[0], PDO::PARAM_STR_CHAR);
            $pc->bindValue("add_by", $values[1], PDO::PARAM_STR_CHAR);
            $pc->bindValue("prod_name", $values[2], PDO::PARAM_STR_CHAR);
            $pc->bindValue("category", $values[3], PDO::PARAM_STR_CHAR);
            $pc->bindValue("quality", $values[4], PDO::PARAM_STR_CHAR);
            $pc->bindValue("sub_category", $values[5], PDO::PARAM_STR_CHAR);
            $pc->bindValue("price", $values[6], PDO::PARAM_STR_CHAR);
            $pc->bindValue("promo", $values[7], PDO::PARAM_STR_CHAR);
            $pc->bindValue("rating", $values[8], PDO::PARAM_INT);
            $pc->bindValue("rater", $values[9], PDO::PARAM_INT);
            $pc->bindValue("checked", $values[10], PDO::PARAM_INT);
            $pc->bindValue("color", $values[11], PDO::PARAM_STR_CHAR);
            $pc->bindValue("size", $values[12], PDO::PARAM_STR_CHAR);
            $pc->bindValue("proprities", $values[13], PDO::PARAM_STR_CHAR);
            $pc->bindValue("description", $values[14], PDO::PARAM_STR_CHAR);
            $pc->bindValue("quantity", $values[16], PDO::PARAM_INT);
            $pc->bindValue("img1", $values[17], PDO::PARAM_STR_CHAR);
            $pc->bindValue("img2", $values[18], PDO::PARAM_STR_CHAR);
            $pc->bindValue("img3", $values[19], PDO::PARAM_STR_CHAR);
            $pc->bindValue("img4", $values[20], PDO::PARAM_STR_CHAR);
            $pc->bindValue("img5", $values[21], PDO::PARAM_STR_CHAR);

            $pc->execute();
            $pc->closeCursor();
            if ($pc->rowCount() === 1){
                return 'true';
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
    public function jxAddPromo(array $data = []): bool {
        try {
            $shopname = $_SESSION['shop_name'];
            $q = parent::getDb()->prepare("INSERT INTO promo (shop_name, country, city, budget, delay, statu, prod_data)
                                                     VALUES (:shop_name, :country, :city, :budget, :delay, :statu, :prod_data)");


            $q->bindValue("shop_name", $shopname, PDO::PARAM_STR_CHAR);
            $q->bindValue("country", $_SESSION['country'], PDO::PARAM_STR_CHAR);
            $q->bindValue("city", $_SESSION['city'], PDO::PARAM_STR_CHAR);
            $q->bindValue("budget", $data["data"][1], PDO::PARAM_STR_CHAR);
            $q->bindValue("delay", $data["data"][0], PDO::PARAM_STR_CHAR);
            $q->bindValue("statu", 'En attente', PDO::PARAM_STR_CHAR);

            $nv = ['0' => ['prod_id'      => $_COOKIE['sp_cppi_cookie'],
                           'shop_name'    => $shopname,
                           'prod_name'    => $data["data"][2],
                           'add_by'       => $data["data"][15],
                           'category'     => $data["data"][3],
                           'quality'      => $data["data"][4],
                           'sub_category' => $data["data"][5],
                           'price'        => $data["data"][6],
                           'promo'        => $data["data"][7],
                           'rating'       => (int)$data["data"][8],
                           'rater'        => (int)$data["data"][9],
                           'checked'      => (int)$data["data"][10],
                           'color'        => $data["data"][11],
                           'size'         => $data["data"][12],
                           'proprities'   => $data["data"][13],
                           'quantity'     => (int)$data["data"][17],
                           'description'  => $data["data"][14],
                           'img1'         => $data["data"][18],
                           'img2'         => $data["data"][19],
                           'img3'         => $data["data"][20],
                           'img4'         => $data["data"][21],
                           'img5'         => $data["data"][22],
                           'add_at'       => $data["data"][16]
            ]];

            $q->bindValue("prod_data", json_encode($nv), PDO::PARAM_STR_CHAR);
            if($q->execute()){
                $q->closeCursor();
                return true;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
        return false;
    }


    /**
     * @param string $table
     * @param string $columb
     * @param string $value
     * @param int|string $id
     * @return bool|string
     */
    public function jxuploadImage(string $table, string $columb, string $value, $id){
        try {
            $q = parent::getDb()->prepare("UPDATE $table SET $columb = :new_img WHERE id = :user_id");
            $q->bindValue('new_img', $value, PDO::PARAM_STR_CHAR);
            $q->bindValue('user_id',  $id, PDO::PARAM_STR_CHAR);
            if($q->execute()){
                $q->closeCursor();
                return 'Image upload successfully';
            }
        }catch(PDOException $e){
            return $e->getMessage();
        }
        return false;
    }


    /**
     * @param string $table
     * @param string $message
     * @param $id
     * @return bool|string
     */
    public function notify(string $table, string $data, string $topic, $id){
        try {
            $sql = parent::getDb()->exec("SELECT notif FROM $table WHERE id = $id");
            $ntf = $sql->fetch(PDO::FETCH_ASSOC);
            $tab = json_decode($ntf, true);
            array_push($tab, $data[3]);

            $q = parent::getDb()->prepare("UPDATE $table SET notif = :new_notif WHERE id = $id");
            $q->bindValue('new_notif', json_encode($tab), PDO::PARAM_STR_CHAR);
            $q->bindValue('user_id',  $id, PDO::PARAM_STR_CHAR);
            if($q->execute()){
                $data = [
                    'initiateur' => strip_tags($data[0]),
                    'sujet'      => strip_tags($data[1]),
                    'message'    => strip_tags($data[2]),
                    'date'       => date("Y-m-d H:i:s")
                ];
                (new AjaxApiRes)->mercurepost($topic, $data);

                $q->closeCursor();
                return true;
            }
        }catch(PDOException $e){
            return $e->getMessage();
        }
        return false;
    }


    /**
     * @param $destinataire
     * @param $expediteur
     * @param $message
     * @param $sujet
     * @param string $topic
     * @return bool|string
     */
    public function message($destinataire, $expediteur, $message, $sujet, string $topic){
        try {
            $sql = parent::getDb()->prepare("INSERT INTO message (expediteur, destinataire, message)
                                                              VALUES (:expediteur, :destinataire, :message)");

            $sql->bindValue('destinataire', $destinataire, PDO::PARAM_STR_CHAR);
            $sql->bindValue('expediteur', $expediteur, PDO::PARAM_STR_CHAR);
            $sql->bindValue('message', $message, PDO::PARAM_STR_CHAR);

            if($sql->execute()){
                $data = [
                    'initiateur' => $expediteur,
                    'sujet'      => strip_tags($sujet),
                    'message'    => $message,
                    'date'       => date("Y-m-d H:i:s")
                ];
                (new AjaxApiRes)->mercurepost($topic, $data);
                $sql->closeCursor();
                return true;
            }
        }catch(PDOException $e){
            return $e->getMessage();
        }
        return false;
    }

    function zal ($tab, $initiateur): int {
        foreach($tab as $item => $k){
            if($k['id'][$initiateur]){
                return $item;
            }
        }
        return false;
    }

}