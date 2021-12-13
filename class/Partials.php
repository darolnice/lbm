<?php
//namespace Lbm\Partials;
//
//use Lbm\Cart\Cart;
//use Lbm\Functions\Functions;
//use Lbm\MgrShop\MgrShop;


class Partials
{




    private $notif;
    private $data;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    public function getNotif()
    {
        return $this->notif;
    }



    public static function showFooter(){
        include_once S_VIEWS.'partials/_footer.view.php';
    }

    public function showNav(){
        $this->data = ($db = new MgrShop)->showAllCategories();

        if ($_SESSION['saller_id']){
            $this->notif = (new MgrUser)->getAllNotifs('sallers', $_SESSION['saller_id']);
        }else{
            $this->notif = (new MgrUser)->getAllNotifs('users', $_SESSION['current_user_id']);
        }

        include_once S_VIEWS.'partials/_nav.view.php';
        $this->getData();
        $this->getNotif();

    }

    public function showHomeNav(){
        session_start();
        $this->data = ($db = new MgrShop)->showAllCategories();

        if ($_SESSION['saller_id']){
            $this->notif = (new MgrUser)->getAllNotifs('sallers', $_SESSION['saller_id']);
        }else{
            $this->notif = (new MgrUser)->getAllNotifs('users', $_SESSION['current_user_id']);
        }

        include_once S_VIEWS.'partials/_homeNav.view.php';
        $this->getNotif();
        $this->getData();

    }


}