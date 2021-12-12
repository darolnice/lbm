<?php
//namespace Lbm\Annonces;
//
//use Lmm\Database\Database;
//use PDO;

class MgrAnnonces extends Database
{

    /**
     * @return bool
     */
    public function postAnnonce(){
        try{
            $ann_qry = $this->getDb()->prepare("INSERT INTO annonces (
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
                'prod_name' => $_POST['ann_prod_name'],
                'quantity' => $_POST['ann_prod_qte'],
                'quality' => $_POST['ann_prod_qly'],
                'price' => $_POST['ann_prod_price'],
                'color' => $_POST['ann_prod_color'],
                'size' => $_POST['ann_prod_size'],
                'comment_s' => $_POST['ann_prod_cmt'],
                'add_at' => date("Y-M-D H:i:s")
            ]);
            $ann_qry->closeCursor();
        }catch (PDOException $e){
            return $e->getMessage();
        }
        return false;
    }

    /**
     * @param string|null $city
     * @param string|null $name
     * @return array
     */
    public function showAnnonces(string $city = null, string $name = null): array {
        try {
            if ($city !== null){
                $sh = $this->getDb()->prepare("SELECT * FROM annonces WHERE city = :city");
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
            $sh = $this->getDb()->prepare("SELECT * FROM responses WHERE annonce_id = :annonce_id AND annoncer = :annoncer");
            $sh->execute(['annonce_id'=>$annonce_id, 'annoncer'=>$annoncer]);
            return $sh->fetchAll(PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            return [$e->getMessage()];
        }

    }











}