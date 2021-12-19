<?php
//use Lmm\Database\Database;
//

class Pagination extends Database
{

    /**
     * @param string $table
     * @return mixed
     */
    public function totalCountFromAnyWhere(string $table){
        $q = parent::getDb()->prepare("SELECT COUNT(*) FROM $table");
        $q->execute();
        $data = $q->fetch();
        return $data[0];
    }

    /**
     * @param string $table
     * @param $actifstate
     * @return mixed
     */
    public function totalActiveCount(string $table, $actifstate){
        $q = parent::getDb()->prepare("SELECT COUNT(*) FROM $table WHERE actived = $actifstate");
        $q->execute();
        $data = $q->fetch();
        return $data[0];
    }

    /**
     * @param string $table
     * @param $actifstate
     * @param string $gender
     * @return mixed
     */
    public function totalGenderCount(string $table, $actifstate, string $gender = null){
        $q = parent::getDb()->prepare("SELECT COUNT(*) FROM $table WHERE actived = $actifstate AND genre = :gender");
        $q->execute(['gender' => $gender]);
        $data = $q->fetch();
        return $data[0];
    }

    /**
     * @param string $table
     * @param $order
     * @param null $premier
     * @param null $limit
     * @return array
     */
    public function showDataWithPagination(string $table, $order, $premier = null, $limit = null){
        try {
            if($order === null){
                $q = parent::getDb()->prepare("SELECT * FROM $table ORDER BY add_at LIMIT $premier, $limit");
                $q->execute();
                return $q->fetchAll(PDO::FETCH_ASSOC);

            }else{
                $q = parent::getDb()->prepare("SELECT * FROM $table ORDER BY :order LIMIT $premier, $limit");
                $q->execute(['order'=>$order]);
                return $q->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e){
            if ($e->getCode() === '42S02'){
                $_SESSION['info'] = "SORRY SHOP NOT FOUND, SEARCH HERE !!!";
                Functions::redir('shoplist');

            }else{
                return [$e->getMessage()];
            }
        }
        return [];
    }

    /**
     * @param string $table
     * @param string $colone
     * @param string $newVal
     * @param string $id
     * @return string
     */
    public function updateOneItem(string $table, string $colone, string $newVal, string $id): string {
        try {
            $q = parent::getDb()->prepare("UPDATE $table SET $colone = :nv WHERE id = :id");
            $q->bindValue('nv', $newVal, PDO::PARAM_STR);
            $q->bindValue('id', $id, PDO::PARAM_STR);
            $q->execute();
            $q->closeCursor();
            return true;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    /**
     * @param $table
     * @param $uid
     * @param null $link
     * @return bool
     */
    public function delAnyWhere($table, $uid, $link = null): bool{
        try {
            $set = parent::getDb()->prepare("DELETE FROM $table WHERE id = $uid");
            $set->execute();
            (new  Functions)->set_flash_tab(['Delete successfully']);
            (new  Functions)->redir($link);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return false;
    }

    /**
     * @param string $value
     * @param string|null $indice
     */
    public function searchWithParams(string $value, string  $indice = null){
        try {
            if($indice === 'prod_name'){
                $qr = parent::getDb()->prepare("SELECT prod_name FROM allproduct WHERE prod_name LIKE :value");
                $qr->bindValue('value', '%'.$value, PDO::PARAM_STR_CHAR);
                $qr->execute();
                echo json_encode($qr->fetchAll(PDO::FETCH_ASSOC));
            }else{
                $qr = parent::getDb()->prepare("SELECT shop_name FROM sallers WHERE actived = 2 AND shop_name LIKE :value");
                $qr->bindValue('value', $value.'%', PDO::PARAM_STR_CHAR);
                $qr->execute();
                echo json_encode($qr->fetchAll(PDO::FETCH_ASSOC));
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * @param string $table
     * @param int $value
     * @param null $premier
     * @param null $limit
     * @return array
     */
    public function showDataWithRange(string $table, $value, $premier = null, $limit = null){
        try {
            $q = parent::getDb()->prepare("SELECT * FROM $table WHERE price BETWEEN 1 AND $value LIMIT $premier, $limit");
            $q->execute();
            return $q->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return [$e->getMessage()];
        }
    }

}