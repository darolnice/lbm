<?php
//namespace Lbm\Partials;
//
//use Lbm\Cart\Cart;
//use Lbm\Functions\Functions;
//use Lbm\MgrCat\MgrCat;


class Partials
{

    private $data;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }


    public static function showFooter(){
        include_once S_VIEWS.'partials/_footer.view.php';
    }

    public function showNav(){
        session_start();
        $this->data = ($db = new MgrCat)->showAllCategories();
        include_once S_VIEWS.'partials/_nav.view.php';

        $this->getData();
    }

    public function showHomeNav(){
        session_start();
        $this->data = ($db = new MgrCat)->showAllCategories();
        include_once S_VIEWS.'partials/_homeNav.view.php';

        $this->getData();

    }



}