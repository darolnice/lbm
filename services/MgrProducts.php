<?php
//namespace Lmb\MgrProducts;
//
//use Lbm\Functions\Functions;
//use Lmm\Database\Database;
//use PDO;


class MgrProducts extends Database
{


    /**
     * @param $currentShop
     * @param $sub_category
     * @return array|string
     */
    public function showProdBycategory($currentShop, $sub_category){
        try {
            $d = parent::getDb()->prepare("SELECT * FROM $currentShop WHERE sub_category = :sub_category");
            $d->execute(["sub_category" => $sub_category]);
            return $d->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    /**
     * @param $currentShop
     * @param $prod_id
     * @return mixed
     */
    public function showProdDetails($currentShop, $prod_id){
        try {
            $q = parent::getDb()->prepare("SELECT * FROM $currentShop WHERE id = :id");
            $q->execute(["id" => $prod_id]);
            $data = $q->fetch(PDO::FETCH_OBJ);
            $q->closeCursor();
            return  $data;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    /**
     * @param $current_shop
     * @param $prod_id
     * @param array $data
     * @return bool|int|string
     */
    public function UpdateProd($current_shop, $prod_id, array $data = []){
        try {
            $eq = parent::getDb()->prepare("SELECT img1, img2, img3, img4, img5 FROM $current_shop WHERE id = $prod_id");
            $eq->execute();
            $vall = $eq->fetchAll(PDO::FETCH_ASSOC);


            $q = parent::getDb()->prepare("UPDATE $current_shop
                                                     SET    prod_name = :prod_name, category = :category,
                                                            sub_category = :sub_category, quality = :quality,
                                                            price = :price, promo = :promo,
                                                            color = :color, size = :size,
                                                            proprities = :proprities, quantity = :quantity,
                                                            description = :description, img1 = :img1,
                                                            img2 = :img2, img3 = :img3, img4 = :img4, img5 = :img5
                                                     WHERE  id = $prod_id");

            $q->bindParam('prod_name',    $data[0], PDO::PARAM_STR_CHAR);
            $q->bindParam('category',     $data[1], PDO::PARAM_STR_CHAR);
            $q->bindParam('sub_category', $data[2], PDO::PARAM_STR_CHAR);
            $q->bindParam('quality',      $data[3], PDO::PARAM_STR_CHAR);
            $q->bindParam('price',        $data[4], PDO::PARAM_STR_CHAR);
            $q->bindParam('promo',        $data[5], PDO::PARAM_STR_CHAR);
            $q->bindParam('color',        $data[6], PDO::PARAM_STR_CHAR);
            $q->bindParam('size',         $data[7], PDO::PARAM_STR_CHAR);
            $q->bindParam('proprities',   $data[8], PDO::PARAM_STR);
            $q->bindParam('quantity',     $data[9], PDO::PARAM_INT);
            $q->bindParam('description',  $data[10], PDO::PARAM_STR);

            if($data[11] !== ""){
                $q->bindParam('img1',         $data[11], PDO::PARAM_STR_CHAR);
            }else{
                $q->bindParam('img1',         $vall["img1"], PDO::PARAM_STR_CHAR);
            }

            if($data[12] !== ""){
                $q->bindParam('img2',         $data[12], PDO::PARAM_STR_CHAR);
            }else{
                $q->bindParam('img2',         $vall["img2"], PDO::PARAM_STR_CHAR);
            }

            if($data[13] !== ""){
                $q->bindParam('img3',         $data[13], PDO::PARAM_STR_CHAR);
            }else{
                $q->bindParam('img3',         $vall["img3"], PDO::PARAM_STR_CHAR);
            }

            if($data[14] !== ""){
                $q->bindParam('img4',         $data[14], PDO::PARAM_STR_CHAR);
            }else{
                $q->bindParam('img4',         $vall["img4"], PDO::PARAM_STR_CHAR);
            }

            if($data[15] !== ""){
                $q->bindParam('img5',         $data[15], PDO::PARAM_STR_CHAR);
            }else{
                $q->bindParam('img5',         $vall["img5"], PDO::PARAM_STR_CHAR);
            }

            if($q->execute()){return 1;}

        }catch(PDOException $e){
            return $e->getMessage();
        }
       return false;
    }

    /**
     * @param $current_shop
     * @param $add_by
     * @param array $data
     * @return bool|int
     */
    public function addProd($current_shop, $add_by, array $data){
        try {
            $q = parent::getDb()->prepare("INSERT INTO $current_shop (shop_name, prod_name, add_by, category,
                                                                                quality, sub_category, price, promo, rating,
                                                                                rater, color, size, proprities, quantity, description,
                                                                                img1, img2, img3, img4, img5)

                                          VALUES(:shop_name, :prod_name, :add_by, :category, :quality, :sub_category,
                                                 :price, :promo, :rating, :rater, :color, :size, :proprities,
                                                 :quantity, :description, :img1, :img2, :img3, :img4, :img5
                                          )"
            );
            $q->bindParam("shop_name",    $_SESSION['shop_name'], PDO::PARAM_STR_CHAR);
            $q->bindParam("prod_name",    $data[0], PDO::PARAM_STR_CHAR);
            $q->bindParam("add_by",       $add_by, PDO::PARAM_STR_CHAR);
            $q->bindParam("category",     $data[1], PDO::PARAM_STR_CHAR);
            $q->bindParam("quality",      $data[2], PDO::PARAM_STR_CHAR);
            $q->bindParam("price",        number_format($data[3], 2), PDO::PARAM_STR_CHAR);
            $q->bindParam("promo",        number_format($data[4], 2), PDO::PARAM_STR_CHAR);
            $q->bindParam("color",        $data[5], PDO::PARAM_STR_CHAR);
            $q->bindParam("size",         $data[10], PDO::PARAM_STR_CHAR);
            $q->bindParam("proprities",   $data[7], PDO::PARAM_STR_CHAR);
            $q->bindParam("quantity",     $data[9], PDO::PARAM_INT);
            $q->bindParam("description",  $data[6], PDO::PARAM_STR_CHAR);
            $q->bindParam("img1",         $data[11], PDO::PARAM_STR_CHAR);
            $q->bindParam("img2",         $data[12], PDO::PARAM_STR_CHAR);
            $q->bindParam("img3",         $data[13], PDO::PARAM_STR_CHAR);
            $q->bindParam("img4",         $data[14], PDO::PARAM_STR_CHAR);
            $q->bindParam("img5",         $data[15], PDO::PARAM_STR_CHAR);
            $q->bindParam("rating",       1, PDO::PARAM_INT);
            $q->bindParam("rater",        1, PDO::PARAM_INT);
            $q->bindParam("sub_category", $data[8], PDO::PARAM_STR_CHAR);

            if($q->execute()){
                $q->closeCursor();
                return 1;
            }

        }catch (PDOException $e){
            (new Functions)->notif_errors([$e->getMessage()]);
        }
        return false;
    }

    /**
     * @param string $table
     * @param string $r
     * @return array
     */
    public function ProdSearch(string $table, string $r): array {
        $q = parent::getDb()->prepare("SELECT * FROM $table WHERE prod_name= :prod_name");
        $q->execute(['prod_name'=> htmlentities($r)]);
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        $q->closeCursor();
        return $data;
    }

    /**
     * @param $shop_name
     * @param $message
     * @return bool|string
     */
    public function createShop($shop_name, $message, array $imgData): bool {
        try {
            $q = parent::getDb()->prepare("CREATE TABLE $shop_name (id INT PRIMARY KEY UNIQUE AUTO_INCREMENT,
                                                                    shop_name VARCHAR(255)NOT NULL,
                                                                    prod_name VARCHAR(255)NOT NULL,
                                                                    add_by VARCHAR(255)NOT NULL,
                                                                    category VARCHAR(255)NOT NULL,
                                                                    quality VARCHAR(255)NOT NULL,
                                                                    sub_category VARCHAR(255)NOT NULL,
                                                                    price VARCHAR(255)NOT NULL,
                                                                    promo VARCHAR(255)NOT NULL,
                                                                    rating INT(255)NOT NULL,
                                                                    rater INT(255)NOT NULL,
                                                                    checked TINYINT(1) NOT NULL,
                                                                    color VARCHAR(255)NOT NULL,
                                                                    size VARCHAR(255)NOT NULL,
                                                                    proprities VARCHAR(1000)NOT NULL,
                                                                    quantity INT(255)NOT NULL,
                                                                    description TEXT(255)NOT NULL,
                                                                    img1 VARCHAR(255)NOT NULL,
                                                                    img2 VARCHAR(255)NOT NULL,
                                                                    img3 VARCHAR(255)NOT NULL,
                                                                    img4 VARCHAR(255)NOT NULL,
                                                                    img5 VARCHAR(255)NOT NULL,
                                                                    add_at datetime(6) DEFAULT CURRENT_TIMESTAMP)
                                                                    ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8"
            );
            
            if($q->execute()) {
                $jx = new AjaxApiRes();

                $subject = SITE_NAME. " - Account activation";
                Functions::lbmSendMail($_SESSION['tmp_email'], $subject, $message);

                unset($_SESSION['tmp_name']);
                unset($_SESSION['tmp_email']);

                $jx->jxUploadImage($imgData[0], $imgData[1], 'cni_f1', "sallers", null, null);
                $jx->jxUploadImage($imgData[2], $imgData[3], 'cni_f2', "sallers", null, null);

                (new Functions)->set_flash_tab(["Activation mail sent!"], 'info');
                Functions::redir('business');
            }
        }catch(PDOException $e){
           echo $e->getMessage();
        }
       return false;
    }

    /**
     * @param string $table
     * @param int $pid
     * @return bool
     */
    public function delProd(string $table, int $pid): bool{
        try {
            $del = parent::getDb()->prepare("DELETE FROM $table WHERE id = $pid");
            if ($del->execute()){
                return 'del';
            }
        }catch(PDOException $e){
            return $e->getMessage();
        }
        return false;
    }

    /**
     * @param string $table
     * @return array
     */
    public function getAll(string $table): array {
        try {
            $qr = parent::getDb()->prepare("SELECT * FROM $table");
            $qr->execute();
            return $qr->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return [$e->getMessage()];
        }
    }

    /**
     * @param string $table
     * @param null $premier
     * @param null $limit
     * @return array
     */
    public function getAllItemsFromTable(string $table, $premier = null, $limit = null): array {
        try {
            $qr = parent::getDb()->prepare("SELECT * FROM $table LIMIT $premier, $limit");
            $qr->execute();
            return $qr->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return [$e->getMessage()];
        }
    }

    /**
     * @param string $table
     * @return mixed
     */
    public function totalItem(string $table){
        $q = parent::getDb()->prepare("SELECT COUNT(*) FROM $table");
        $q->execute();
        $data = $q->fetch();
        return $data[0];
    }

    /**
     * @param array $data
     * @return string
     * @throws Exception
     */
    public function addReclamation(array $data): string {
        try {
            $q = parent::getDb()->prepare("INSERT INTO reclamations (rec_id, transaction_id, rec_name, rec_mail,
                                                                         rec_phone, prod_name, quantity, reason, business_name, issu,
                                                                         other_observations, add_at) 
                                                    VALUES(:rec_id, :transaction_id, :rec_name, :rec_mail, :rec_phone, :prod_name, :quantity,
                                                           :reason, :business_name, :issu, :other_observations, :add_at)"
            );
            $q->bindValue("rec_id", Functions::random_key(), PDO::PARAM_STR);
            $q->bindValue("transaction_id", $data[6], PDO::PARAM_STR);
            $q->bindValue("rec_name", $data[0], PDO::PARAM_STR);
            $q->bindValue("rec_mail", $data[1], PDO::PARAM_STR);
            $q->bindValue("rec_phone", $data[2], PDO::PARAM_STR);
            $q->bindValue("prod_name", $data[4], PDO::PARAM_STR);
            $q->bindValue("quantity", $data[3], PDO::PARAM_STR);
            $q->bindValue("reason", $data[5], PDO::PARAM_STR);
            $q->bindValue("business_name", $data[7], PDO::PARAM_STR);
            $q->bindValue("issu", $data[8], PDO::PARAM_STR);
            $q->bindValue("other_observations", $data[9], PDO::PARAM_STR);
            $q->bindValue("add_at", date("Y-M-D H:i:s"), PDO::PARAM_STR);

            $q->execute();
            $q->closeCursor();

            $msg = "Cher " . $data[0] . " votre reclamation a été enregistré avec succes, le delai d'attente moyen est de 10 jours, merci pour votre confiance";
            $headers = "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            mail($data[1], SITE_NAME . "- RECLAMATIONS", $msg, $headers);

            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === "XMLHTTPREQUEST") {
                return "Your reclamation add successfully";
            }else{
                (new Functions)->notif_errors(['Votre reclamation a été enregistré avec succes']);
            }

        }catch (PDOException $e){
            (new Functions)->notif_errors($e->getMessage());
        }
        return false;
    }

    /**
     * @param array|null $data
     * @return string
     * @throws Exception
     */
    public function checkTransaction(array $data = null): string {
        try {
            $q = parent::getDb()->prepare("SELECT * FROM transactions WHERE full_name = :full_name");
            $q->bindValue('full_name', $data[0], PDO::PARAM_STR);
            $q->execute();
            if ($q->rowCount() === 1){
                $d = $q->fetchAll(PDO::FETCH_ASSOC);
                if ($d[0]['full_name'] === $data[0] &&
                    $d[0]['shop_name'] === $data[7] &&
                    $d[0]['transaction_id'] === $data[6])
                {
                    return $this->addReclamation($data);
                }else{
                    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === "XMLHTTPREQUEST"){
                        return 'Bad data please check your transaction informations';
                    }
                    (new Functions)->notif_errors(['Bad data please check your transaction data']);
                }
            }else{
                if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === "XMLHTTPREQUEST"){
                    return 'Bad data please check your transaction informations';
                }
                (new Functions)->notif_errors(['Bad data please check your informations']);
            }
        }catch (PDOException $e){
            return $e->getMessage();
        }
        return false;
    }

    /**
     * @param array $values
     */
    public function addAlert(array $values):string
    {
        try {
            $q = parent::getDb()->prepare("INSERT INTO alerts (full_name, email, phone, about, shop_name, message, add_at) 
                                                    VALUES(:full_name, :email, :phone, :about, :message, :shop_name, :add_at)"
            );
            $q->bindValue("full_name", $values[0], PDO::PARAM_STR);
            $q->bindValue("email", $values[1], PDO::PARAM_STR);
            $q->bindValue("phone", $values[2], PDO::PARAM_STR);
            $q->bindValue("about", $values[3], PDO::PARAM_STR);
            $q->bindValue("shop_name", $values[4], PDO::PARAM_STR);
            $q->bindValue("message", $values[5], PDO::PARAM_STR);
            $q->bindValue("add_at", date("Y-M-D H:i:s"), PDO::PARAM_STR);

            $q->execute();
            $q->closeCursor();

            return Functions::sentNotif('Your alert sent succesfully');

        }catch (PDOException $e){
            (new Functions)->notif_errors([$e->getMessage()]);
        }
        return false;
    }

    /**
     * @param array $array
     * @return string
     */
    public function aboutissement(array $array): string
    {
        try {
            $qr = parent::getDb()->prepare("SELECT rec_id FROM reclamations WHERE rec_name = :fullname");
            $qr->bindValue('fullname', $array[0], PDO::PARAM_STR);
            $qr->execute();
            if ($qr->rowCount() === 1){
                if ($qr->fetchAll(PDO::FETCH_ASSOC[0]['transaction_id'] === $array[1])){
                    $q = parent::getDb()->prepare("DELETE FROM reclamations WHERE rec_id = :tid");
                    $q->execute(["tid" => $array[1]]);
                    $q->closeCursor();

                    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === "XMLHTTPREQUEST") {
                        return 'Information prise en compte avec success';
                    }else{
                        (new Functions)->notif_errors(['Information prise en compte avec success']);
                    }
                }
            }else{
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === "XMLHTTPREQUEST") {
                    return 'Bad data please check your transaction information';
                }else{
                    (new Functions)->notif_errors(['Bad data please check your transaction information']);
                }
            }
        }catch (PDOException $e){
            (new Functions)->notif_errors([$e->getMessage()]);
        }
        return false;
    }

    /**
     *
     */
    public function getQuestions()
    {
        try {
            $q = parent::getDb()->prepare('SELECT question, response, id FROM faq');
            $q->execute();
            return $q->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    /**
     * @param string $transactionId
     * @return bool
     */
    public function transaction_check(string $transactionId): array {
        try {
            $q = parent::getDb()->prepare("SELECT * FROM transactions WHERE transaction_id = :tid");
            $q->bindValue('tid', $transactionId, PDO::PARAM_STR_CHAR);
            if($q->execute()){
                $data = $q->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['tid'] = $data[0]['transaction_id'];
                (new Functions)->redir('transactions');
                return $data;
            }
        }catch(PDOException $e){
            return  $e->getMessage();
        }
        return false;
    }



}