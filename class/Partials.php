<?php
//namespace Lbm\Partials;
//
//use Lbm\Cart\Cart;
//use Lbm\Functions\Functions;
//use Lbm\MgrShop\MgrShop;


class Partials
{
    private $notif;
    private $mess;
    private $data;

    public function getData()
    {
        return $this->data;
    }
    public function getMess()
    {
        return $this->mess;
    }
    public function getNotif()
    {
        return $this->notif;
    }


    /**
     *
     */
    public static function showFooter(){
        include_once S_VIEWS.'partials/_footer.view.php';
    }

    /**
     *
     */
    public function showNav(){
        $usr = new MgrUser();
        $this->data = (new MgrShop)->showAllCategories(Functions::SNFormatBack($_GET['name']));

        if ($_SESSION['saller_id']){
            $this->notif = $usr->getAllNotifs( $_SESSION['shop_name'],true);
            $this->mess = $usr->getAllMess($_SESSION['username'],true);

        }elseif ($_SESSION['current_user_id']){
            $this->notif = $usr->getAllNotifs($_SESSION['username'],true);
            $this->mess = $usr->getAllMess($_SESSION['username'],true);
        }

        include_once S_VIEWS.'partials/_nav.view.php';
        $this->getData();
        $this->getNotif();
        $this->getMess();

//        echo '<pre>';
//            foreach ($this->getData() as $item){
//                trim($item);
//            }
//        var_dump(trim(' romeo'));
//        echo '<pre>';
    }

    public function showHomeNav(){
        session_start();
        $usr = new MgrUser();
        $this->data = (new MgrShop)->showAllCategories(Functions::SNFormatBack($_GET['name']));

        if ($_SESSION['saller_id']){
            $this->notif = $usr->getAllNotifs($_SESSION['shop_name'], true);
            $this->mess = $usr->getAllMess($_SESSION['username'],  true);

        }elseif($_SESSION['current_user_id']){
            $this->notif = $usr->getAllNotifs( $_SESSION['username'], true);
            $this->mess = $usr->getAllMess($_SESSION['username'],  true);
        }

        include_once S_VIEWS.'partials/_homeNav.view.php';
        $this->getNotif();
        $this->getData();
        $this->getMess();
    }


}