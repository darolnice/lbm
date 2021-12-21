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
     * @return array
     */
    public function showAllCategories(){
        $q = $this->getDb()->prepare("SELECT * FROM categories");
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_OBJ);
        return $data;
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

}