<?php
//namespace Lbm\MgrCat;
//
//use Lbm\Functions\Functions;
//use Lmm\Database\Database;
//use PDO;

class MgrCat extends Database
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
    public function delCat(){


    }
    public function editCat(){


    }

    public function delSubCat(){


    }
    public function addSubcat(){


    }
    public function editsubCat(){


    }

    /**
     * @param string $shop
     * @param string $category
     * @return array
     */
    public function findCategorie(string $shop, string $category): array {
        $q = $this->getDb()->prepare("SELECT * FROM $shop WHERE category = :category");
        $q->execute(['category'=> htmlentities($category)]);
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        $q->closeCursor();

        return $data;
    }

    /**
     * @param string $shop
     * @param string $category
     * @return array
     */
    public function ShopFindByCategory(string $shop, string $category): array {
        $q = $this->getDb()->prepare("SELECT * FROM $shop WHERE category= :category");
        $q->execute(['category'=> htmlentities($category)]);
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        $q->closeCursor();

        return $data;
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
        $q->closeCursor();

        return $data;
    }

    /**
     * @return array
     */
    public function showAllCategories(){
        $q = $this->getDb()->prepare("SELECT * FROM categories");
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_OBJ);
        $q->closeCursor();

        return $data;
    }






}