<?php
//namespace Lbm\Annonces;
//
//use Lmm\Database\Database;
//use PDO;

class MgrAnnonces extends Database
{

    /**
     * @param array $data
     * @return bool|string
     */
    public function postAnnonce(array $data){
        try{
            $ad_qry = parent::getDb()->prepare('INSERT INTO annonces (user_name, phone_number, email, country, city, prod_name, quantity,
                                                                       quality, price, color, size, ad_img1, ad_img2, comment_s)
                                                           VALUES (:user_name, :phone_number, :email, :country, :city, :prod_name, :quantity,
                                                                    :quality, :price, :color, :size, :ad_img1, :ad_img2, :comment_s
                                                           )'

            );

            $ad_qry->bindValue('user_name', $data[0], PDO::PARAM_STR_CHAR);
            $ad_qry->bindValue('phone_number', $data[1], PDO::PARAM_STR_CHAR);
            $ad_qry->bindValue('email', $data[2], PDO::PARAM_STR_CHAR);
            $ad_qry->bindValue('country', $data[3], PDO::PARAM_STR_CHAR);
            $ad_qry->bindValue('city', $data[4], PDO::PARAM_STR_CHAR);
            $ad_qry->bindValue('prod_name', $data[5], PDO::PARAM_STR_CHAR);
            $ad_qry->bindValue('quantity', $data[6], PDO::PARAM_INT);
            $ad_qry->bindValue('quality', $data[7], PDO::PARAM_STR_CHAR);
            $ad_qry->bindValue('price', $data[8], PDO::PARAM_STR_CHAR);
            $ad_qry->bindValue('color', $data[9], PDO::PARAM_STR_CHAR);
            $ad_qry->bindValue('size', $data[10], PDO::PARAM_STR_CHAR);
            $ad_qry->bindValue('comment_s', $data[11], PDO::PARAM_STR_CHAR);

            if (!empty($data[12])){
                $im1Ext = strtolower(pathinfo($data[12]['img1_name'], PATHINFO_EXTENSION));
                $im2Ext = strtolower(pathinfo($data[12]['img2_name'], PATHINFO_EXTENSION));

                $new_img1_name = uniqid("AD-", true).'.'.$im1Ext;
                $new_img2_name = uniqid("AD-", true).'.'.$im2Ext;

                $img1_def_path = 'public_html/assets/images/upload/'.$new_img1_name;
                $img2_def_path = 'public_html/assets/images/upload/'.$new_img2_name;

                $ad_qry->bindValue('ad_img1', $new_img1_name, PDO::PARAM_STR_CHAR);
                $ad_qry->bindValue('ad_img2', $new_img2_name, PDO::PARAM_STR_CHAR);
            }else{
                $ad_qry->bindValue('ad_img1', '', PDO::PARAM_STR_CHAR);
                $ad_qry->bindValue('ad_img2', '', PDO::PARAM_STR_CHAR);
            }


            if ($ad_qry->execute()){
                $ad_qry->closeCursor();

                move_uploaded_file($data[12]['img1_tmp'], $img1_def_path);
                move_uploaded_file($data[12]['img2_tmp'], $img2_def_path);

                Functions::redir('annonces');
            }

        }catch (PDOException $e){
            return $e->getMessage();
        }
        return false;
    }

    /**
     * @param string|null $search
     * @param string|null $city
     * @param string|null $name
     * @return array
     */
    public function showAnnonces(string $search = null, string $city = null, string $name = null): array {
        try {
            if ($search){
                $sh = parent::getDb()->prepare("SELECT * FROM annonces WHERE prod_name = :prodname");
                $strip_tags = strip_tags($search);
                $sh->bindParam('prodname', $strip_tags, PDO::PARAM_STR_CHAR);
                $sh->execute();
                return $sh->fetchAll(PDO::FETCH_OBJ);

            }else{
                if ($city !== null){
                    $sh = parent::getDb()->prepare("SELECT * FROM annonces ORDER BY city = :city");
                    $sh->execute(['city'=>$city]);
                    return $sh->fetchAll(PDO::FETCH_OBJ);

                }elseif ($city == ''){
                    $sh = $this->getDb()->prepare("SELECT * FROM annonces");
                    $sh->execute();
                    return $sh->fetchAll(PDO::FETCH_OBJ);

                }elseif ($name !== null){
                    $sh = $this->getDb()->prepare("SELECT * FROM annonces WHERE user_name = :name");
                    $sh->execute(['name'=>$name]);
                    return $sh->fetchAll(PDO::FETCH_OBJ);
                }
            }

        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return [];
    }

    /**
     * @param $annonce_id
     * @param string $annoncer
     * @param $comment
     * @return bool|string
     */
    public function postComment($annonce_id, string $annoncer, $comment){
        try {
            $pc = $this->getDb()->prepare("INSERT INTO responses (annonce_id,
                                                                       annoncer,
                                                                       shop_name,
                                                                       response,
                                                                       add_at)
                                                     VALUES (:annonce_id,
                                                             :annoncer,
                                                             :shop_name,
                                                             :response,
                                                             :add_at)");

            $pc->execute([
                'annonce_id'=>$annonce_id,
                'annoncer' => $annoncer,
                'shop_name'=>$_SESSION['shop_name'],
                'response'=> (new Functions())->e($comment),
                'add_at'=> date("Y-M-D H:i:s")
            ]);

            $pc->closeCursor();
            if ($pc->rowCount() === 1){
                return true;
            }
        }catch (PDOException $e){
            return $e->getMessage();
        }
        return false;
    }

    /**
     * @param string $annonce_id
     * @param string $annoncer
     * @return array
     */
    public function showResponses(string $annonce_id, string $annoncer): array{
        try {
            $sh = parent::getDb()->prepare("SELECT * FROM responses WHERE annonce_id = :annonce_id AND annoncer = :annoncer");
            $sh->execute(['annonce_id'=>$annonce_id, 'annoncer'=>$annoncer]);
            return $sh->fetchAll(PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            return [$e->getMessage()];
        }

    }


    /**
     * home page ajax search
     */
    public function jxsearch() {
        try {
            $q = parent::getDb()->prepare("SELECT prod_name FROM annonces WHERE prod_name LIKE :prod_name");
            $q->execute(['prod_name'=> htmlentities(trim("%".$_GET["Search"]."%"))]);
            $data = $q->fetchAll(PDO::FETCH_ASSOC);
            $q->closeCursor();

            echo json_encode($data);

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }








}