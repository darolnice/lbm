<?php
//namespace Lbm\MgrShop;
//
//use Lbm\Functions\Functions;
//use Lmm\Database\Database;
//use PDO;

class MgrShop extends Database
{

    /**
     * @param string $categorie
     */
    public function addcat(string $categorie){
        $f = new Functions();
        $cat = $this->getDb()->prepare("INSERT INTO categories VALUES (:categories, :sub_categories)");
        $cat->execute([
            'categories'      => $f->e($categorie),
            'sub_categories'  => ''
        ]);
        $cat->closeCursor();
    }

    public function editCat(){


    }

    public function editsubCat(){


    }

    /**
     * @param string $shop
     * @param string $category
     * @return array
     */
    public function findCategorie(string $shop, string $category): array {
        $q = parent::getDb()->prepare("SELECT * FROM $shop WHERE category = :category");
        $q->execute(['category'=> htmlentities($category)]);
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * @param string $shop
     * @param string $category
     * @return array|bool|string
     */
    public function ShopFindByCategory(string $shop, string $category){
        try {
            $cat = strip_tags($category);
            $shp = htmlentities($shop);

            $q = parent::getDb()->prepare("SELECT * FROM $shp WHERE category = :category");
            $q->bindParam(":category", $cat, PDO::PARAM_STR_CHAR);
            if ($q->execute()){
                return $q->fetchAll(PDO::FETCH_ASSOC);
            }

        }catch (PDOException $e){
            return $e->getMessage();
        }
        return false;
    }

    /**
     * @param string $shop
     * @param string $category
     * @param string $subCategories
     * @return array
     */
    public function findSubCategorie(string $shop, string $category, string $subCategories): array {
        $q = $this->getDb()->prepare("SELECT * FROM $shop WHERE category= :category AND sub_categories= :sub_categories");
        $q->execute(['category'=> htmlentities($category), 'sub_categories'=> htmlentities($subCategories)]);
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * @param string $shopname
     * @return array|bool
     */
    public function showAllCategories(string $shopname){
        try {
            if (!empty($shopname)){
                $q = $this->getDb()->prepare("SELECT business_categories FROM sallers WHERE shop_name = :shopname");
                $q->bindValue('shopname', strip_tags($shopname), PDO::PARAM_STR_CHAR);
                if ($q->execute()){
                     $data = $q->fetch(PDO::FETCH_ASSOC)["business_categories"];
                     return explode(',', $data);
                }

            }else{
                $q = $this->getDb()->prepare("SELECT business_categories FROM sallers WHERE shop_name = :shopname");
                $q->bindValue('shopname', 'lbm', PDO::PARAM_STR_CHAR);
                if ($q->execute()){
                    $data = $q->fetch(PDO::FETCH_ASSOC)["business_categories"];
                    return explode(',', $data);
                }
            }

        }catch (PDOException $e){
            $e->getMessage();
        }
        return false;
    }

    /**
     * @param string $columb
     * @param string $entrie
     * @param $s_id
     * @param $data
     */
    public function updateShopCheckboxSettting(string $columb, string $entrie, $s_id, $data){
        $q = parent::getDb()->prepare("SELECT $columb FROM sallers WHERE id = $s_id");
        $q->execute();
        $dta = $q->fetchAll(PDO::FETCH_ASSOC);
        $tab = json_decode($dta[0][$columb], true);
        $tab[0][$entrie] = $data;

        $qr = parent::getDb()->prepare("UPDATE sallers SET $columb = :col WHERE id = $s_id");
        if($qr->execute(['col' => json_encode($tab)])){
            return Functions::sentNotif('Update successfully');
        }
        return false;
    }

    /**
     * @param string $start
     * @param string $end
     * @param string $code
     * @param string $amount
     * @return bool|string
     * Cette fonction crée un code discount
     */
    public function createDiscount(string $start, string $end, string $code, string $amount, $pass){
        session_start();
        try {
            $id = $_SESSION['saller_id'];

            $qr = parent::getDb()->prepare("SELECT saller_password FROM sallers WHERE id = $id");
            $qr->execute();
            $p = $qr->fetch(PDO::FETCH_ASSOC);
            if (password_verify($pass,  $p['saller_password'])){
                $q = parent::getDb()->prepare("SELECT discount FROM sallers WHERE id = :id");
                if($q->execute(['id' => $id])){
                    $d = $q->fetch(PDO::FETCH_ASSOC);
                    if($d['discount'] !== ''){
                        $this->tab = json_decode($d['discount'], true);
                        $this->tab [] = ['id' => count($this->tab)+1, 'start' => strip_tags($start), 'end' => strip_tags($end),
                            'amount' => strip_tags($amount), 'state' => 'standbay', 'code' => strip_tags($code)
                        ];

                        $qs = parent::getDb()->prepare("UPDATE sallers SET discount = :disc WHERE id = $id");
                        $qs->bindValue('disc', json_encode($this->tab), PDO::PARAM_STR_CHAR);
                        if ($qs->execute()){
                            return true;

                        }else{
                            return 'Someone is wrong please try again later !!!';
                        }

                    }else{
                        $tab = [];
                        $tab [] = ['id' => '1', 'start' => strip_tags($start), 'end' => strip_tags($end),
                            'amount' => strip_tags($amount), 'state' => 'standbay', 'code' => strip_tags($code)
                        ];

                        $q_ = parent::getDb()->prepare("UPDATE sallers SET discount = :disc WHERE id = $id");
                        $q_->bindValue('disc', json_encode($tab), PDO::PARAM_STR_CHAR);
                        if ($q_->execute()){
                            return true;

                        }else{
                            return 'Someone is wrong please try again later !!!';
                        }
                    }
                }else{
                    return 'Someone is wrong please try again later !!!';
                }
            }else{
                return 'Password is wrong.';
            }
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

}