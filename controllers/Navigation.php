<?php
////namespace Lbm\Navigation;
//
//use Lbm\Annonces\MgrAnnonces;
//use Lbm\Functions\Functions;
//use Lbm\Mgrlogin\MgrLogin;
//use Lbm\MgrUser\MgrUser;
//use Lmb\MgrProducts\MgrProducts;
//use Lbm\MgrShop\MgrShop;

class Navigation
{
    private $data;
    private $shopProdData;
    private $shop_data;
    private $saller_data;
    private $sub_admin_data;
    private $specialPromoData;
    private $lbmProdData;
    private $lbmFindCat;
    private $promoFindCat;
    private $prodArray;
    private array $annonceData = [];
    private $shopCatSort;
    private $current_su_data;
    private $ctn_name, $ctn_subject, $ctn_mail, $ctn_msg;
    private $promoFindprod;
    private $searchProdShop;
    private $annonceD;
    private $busiProd;
    private $splbm;
    private $bestSaling;
    private $bestShop;
    private $faq;
    private $blogData;
    private $blogShowAll;
    private $profilData;
    private $allinpromo;
    private $promoClient;
    private $allinFaq;
    private $allplan;
    private $allinplan;
    private $totalBu;
    private $totalSu;
    private $totalBuActif;
    private $totalSuActif;

    private $totalMenSallers;
    private $totalWomanSallers;
    private $totalMenUsers;
    private $totalWomanUsers;
    private $BusiClient;
    private $SuClient;
    private $shoplist;
    private $s_Data;
    private $shopPref;













    /**
     * @return mixed
     */
    public function getShopPref()
    {
        return $this->shopPref;
    }

    /**
     * @return mixed
     */
    public function getSData()
    {
        return $this->s_Data;
    }

    /**
     * @return mixed
     */
    public function getShoplist()
    {
        return $this->shoplist;
    }

    /**
     * @return mixed
     */
    public function getSuClient()
    {
        return $this->SuClient;
    }

    /**
     * @return mixed
     */
    public function getBusiClient()
    {
        return $this->BusiClient;
    }

    /**
     * @return mixed
     */
    public function getTotalMenSallers()
    {
        return $this->totalMenSallers;
    }

    /**
     * @return mixed
     */
    public function getTotalWomanSallers()
    {
        return $this->totalWomanSallers;
    }

    /**
     * @return mixed
     */
    public function getTotalMenUsers()
    {
        return $this->totalMenUsers;
    }

    /**
     * @return mixed
     */
    public function getTotalWomanUsers()
    {
        return $this->totalWomanUsers;
    }

    /**
     * @return mixed
     */
    public function getTotalBuActif()
    {
        return $this->totalBuActif;
    }

    /**
     * @return mixed
     */
    public function getTotalSuActif()
    {
        return $this->totalSuActif;
    }

    /**
     * @return mixed
     */
    public function getTotalBu()
    {
        return $this->totalBu;
    }

    /**
     * @return mixed
     */
    public function getTotalSu()
    {
        return $this->totalSu;
    }

    /**
     * @return mixed
     */
    public function getAllinplan()
    {
        return $this->allinplan;
    }

    /**
     * @return mixed
     */
    public function getAllplan()
    {
        return $this->allplan;
    }

    /**
     * @return mixed
     */
    public function getAllinFaq()
    {
        return $this->allinFaq;
    }

    /**
     * @return mixed
     */
    public function getPromoClient()
    {
        return $this->promoClient;
    }

    /**
     * @return mixed
     */
    public function getAllinpromo()
    {
        return $this->allinpromo;
    }

    /**
     * @return mixed
     */
    public function getSpecialPromoData()
    {
        return $this->specialPromoData;
    }

    /**
     * @return mixed
     */
    public function getProfilData()
    {
        return $this->profilData;
    }

    /**
     * @return mixed
     */
    public function getBlogShowAll()
    {
        return $this->blogShowAll;
    }

    /**
     * @return mixed
     */
    public function getBlogData()
    {
        return $this->blogData;
    }

    /**
     * @return mixed
     */
    public function getFaq()
    {
        return $this->faq;
    }

    /**
     * @return mixed
     */
    public function getBestShop()
    {
        return $this->bestShop;
    }

    /**
     * @return mixed
     */
    public function getBestSaling()
    {
        return $this->bestSaling;
    }

    /**
     * @return mixed
     */
    public function getSplbm()
    {
        return $this->splbm;
    }

    /**
     * @return mixed
     */
    public function getBusiProd()
    {
        return $this->busiProd;
    }

    /**
     * @return mixed
     */
    public function getSearchProdShop()
    {
        return $this->searchProdShop;
    }

    /**
     * @return mixed
     */
    public function getPromoFindprod()
    {
        return $this->promoFindprod;
    }

    /**
     * @param mixed $ctn_name
     */
    public function setCtnName($ctn_name): void
    {
        $this->ctn_name = $ctn_name;
    }

    /**
     * @param mixed $ctn_subject
     */
    public function setCtnSubject($ctn_subject): void
    {
        $this->ctn_subject = $ctn_subject;
    }

    /**
     * @param mixed $ctn_mail
     */
    public function setCtnMail($ctn_mail): void
    {
        $this->ctn_mail = $ctn_mail;
    }

    /**
     * @param mixed $ctn_msg
     */
    public function setCtnMsg($ctn_msg): void
    {
        $this->ctn_msg = $ctn_msg;
    }

    /**
     * @return mixed
     */
    public function getCtnName()
    {
        return $this->ctn_name;
    }

    /**
     * @return mixed
     */
    public function getCtnSubject()
    {
        return $this->ctn_subject;
    }

    /**
     * @return mixed
     */
    public function getCtnMail()
    {
        return $this->ctn_mail;
    }

    /**
     * @return mixed
     */
    public function getCtnMsg()
    {
        return $this->ctn_msg;
    }

    /**
     * @return mixed
     */
    public function getCurrentSuData()
    {
        return $this->current_su_data;
    }

    /**
     * @return mixed
     */
    public function getShopCatSort()
    {
        return $this->shopCatSort;
    }

    /**
     * @return mixed
     */
    public function getAnnonceData()
    {
        return $this->annonceData;
    }

    /**
     * @return mixed
     */
    public function getProdArray()
    {
        return $this->prodArray;
    }

    /**
     * @return mixed
     */
    public function getPromoFindCat()
    {
        return $this->promoFindCat;
    }

    /**
     * @return mixed
     */
    public function getLbmFindCat()
    {
        return $this->lbmFindCat;
    }

    /**
     * @return mixed
     */
    public function getLbmProdData()
    {
        return $this->lbmProdData;
    }

    /**
     * @return mixed
     */
    public function getSubAdminData()
    {
        return $this->sub_admin_data;
    }

    /**
     * @return mixed
     */
    public function getSallerData()
    {
        return $this->saller_data;
    }

    /**
     * @return mixed
     */
    public function getShopData()
    {
        return $this->shop_data;
    }

    /**
     * @return mixed
     */
    public function getShopProdData()
    {
        return $this->shopProdData;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getAnnonceD()
    {
        return $this->annonceD;
    }








    public function session(){
        session_start();
        echo "<pre>";
            var_dump($_SESSION);
        echo "</pre>";
    }

    public function showHome(){
        $f = new Functions();
        $db = new MgrProducts();
        $db_ = new MgrShop();
        $p = new Pagination();

        setcookie('hsc', serialize('add_at'), time()+60*24);
        $curentPage = $f->homeLoadCurrentPage();
        $primera = ($curentPage * 10) - 10;

        if($_COOKIE['hrpc']){
            $this->specialPromoData = $p->showDataWithRange("home_special_promo", (int)$_COOKIE['hrpc'], $primera, 10);
            $this->lbmProdData = $p->showDataWithRange("lbm", (int)$_COOKIE['hrpc'], $primera, 100);
        }else{
            $this->specialPromoData = $p->showDataWithPagination("home_special_promo", $_COOKIE['hsc'], $primera, 10);
            $this->lbmProdData = $p->showDataWithPagination('lbm', $_COOKIE['hsc'], $primera, 100);
        }

        $this->promoFindprod = $db->ProdSearch('home_special_promo', $f->e($_GET['sp']));
        $this->promoFindCat = $db_->findCategorie('home_special_promo', $f->e($_GET['Search']));

        $this->splbm = $db->ProdSearch('lbm', $f->e($_GET['sp']));
        $this->lbmFindCat = $db_->findCategorie('lbm', $f->e($_GET['Search']));

        $this->bestSaling = $db->getAllItemsFromTable("best_saling", $primera, 10);
        $this->bestShop = $db->getAllItemsFromTable("best_shop", $primera, 10);

        include_once S_VIEWS.'/home.view.php';
        $this->getSpecialPromoData();
        $this->getPromoFindCat();
        $this->getPromoFindprod();

        $this->getLbmProdData();
        $this->getSplbm();
        $this->getLbmFindCat();

        $this->getBestSaling();
        $this->getBestShop();

    }

    public function showProduct(){
        $d = new MgrProducts();
        $this->data = $d->showProdBycategory($_GET['shop'], $_GET['sub']);
        $f = new Functions();

        if(empty($_GET['id']) && empty($_GET['name'])){
            $f->redir('./shop?name='.$_GET['shop']);
        }else{
            $this->shopProdData = $d->showProdDetails($_GET['shop'], $_GET['id']);
            $this->shopPref = (new MgrUser)->getAllfromAnyBusiUser("sallers", $_GET['shop']);

            include_once S_VIEWS.'/product.view.php';
            $this->getShopProdData();
            $this->getShopPref();
        }
    }

    public function showCheckcart(){
        session_start();
        if(isset($_SESSION['cart'])){
            include_once S_VIEWS.'/checkcart.view.php';
            if(isset($_POST['bnw'])){
                $error = [];

                if(empty($_POST["firstname"]) || mb_strlen($_POST["firstname"]) < 3){
                    array_push($error, "Please enter first name");
                    return;
                }
                if(empty($_POST["lastname"]) || mb_strlen($_POST["lastname"]) < 3){
                    array_push($error, "Please enter last name");
                    return;
                }
                if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ){
                    array_push($error, "Please right email");
                    return;
                }
                if(mb_strlen($_POST["phn"]) < 5){
                    array_push($error, 'Pleas enter correct phone number');
                }

                if(empty($error)){
                    $_SESSION['TI'] = [
                        "Items"=>$_SESSION['cart'],
                        'Somme'=>$_SESSION['somme'],
                        'User info'=>[strip_tags($_POST["firstname"]),
                                      strip_tags($_POST["lastname"]),
                                      strip_tags($_POST["email"]),
                                      strip_tags($_POST["phn"])],
                        'Shipping info'=>[strip_tags($_POST["country"]),
                            strip_tags($_POST["city"]),
                            strip_tags($_POST["quartier"]),
                            strip_tags($_POST["appart"])
                        ]
                    ];
                    Functions::redir($_COOKIE['xirp']);
                }else{
                    (new Functions)->notif_errors($error);
                }
            }
        }else{
            Functions::redir('./');
        }
    }

    public function showContact(){
        session_start();
        $f = new Functions();

        $this->setCtnSubject($_POST['subject']);
        $this->setCtnName($_POST['name']);
        $this->setCtnMail($_POST['email']);
        $this->setCtnMsg($_POST['msg']);
        $errors = [];

        include_once S_VIEWS.'/contact.view.php';
        $this->getCtnName();
        $this->getCtnMail();
        $this->getCtnMsg();
        $this->getCtnSubject();

        if(isset($_POST['submit'])){

            if (!$f->not_empty([$this->getCtnName(), $this->getCtnMail(), $this->getCtnMsg()])){

                if (mb_strlen($this->getCtnName()) < 2) {
                    $errors[] = "- Username is short";
                }

                if (mb_strlen($this->getCtnSubject()) === "") {
                    $errors[] = "- Please add subject";
                }

                if (!filter_var($this->getCtnMail(), FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "- Invalid adress e-mail";
                }

                if(empty($this->getCtnMsg()) || mb_strlen($this->getCtnMsg()) < 3){
                    $errors[] = "- Invalid Message";
                }

            }else {
                $errors[] = "- PLease complete all forms";
            }

            if(count($errors) === 0){

                ob_start();
                require (S_VIEWS.'/partials/tmpl/contact_tmpl.view.php');
                $content = ob_get_clean();

                $headers = "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                mail(SITE_MAIL, 'Contact Us-'.$this->getCtnSubject(), $content, $headers);

                $f->set_flash_tab(["Message sent!"], 'info');
                $f->redir('contact');
            }

            $f->notif_errors($errors);

        }else{$f->clear_input_data();}
    }

    public function showShop(){
        $d = new MgrProducts();
        $f = new Functions();
        $current_business = $f->e($_GET['name']);
        setcookie('ssc', serialize('add_at'), time()+60*24);

        if($_COOKIE['spl']){
            $this->data = (new Pagination)->showDataWithRange($current_business, (int)$_COOKIE['spl'], 0, 50);
            $this->shopCatSort = (new MgrShop)->ShopFindByCategory($current_business, $f->e($_GET['search']));
            $this->searchProdShop = $d->ProdSearch($current_business, $f->e($_GET['sp']));
        }else{
            $this->data = (new Pagination)->showDataWithPagination($current_business, "prod_name", 0,50);
            $this->shopCatSort = (new MgrShop)->ShopFindByCategory($current_business, $f->e($_GET['search']));
            $this->searchProdShop = $d->ProdSearch($current_business, $f->e($_GET['sp']));
        }

        $this->shopPref = (new MgrUser)->getAllfromAnyBusiUser("sallers", $_GET['name']);
        setcookie('curr', $this->shopPref[0]['currency'], time()+60*24);

        include_once S_VIEWS.'/shop.view.php';
        $this->getData();
        $this->getShopCatSort();
        $this->getSearchProdShop();
        $this->getShopPref();
    }

    public function showSetting(){
        session_start();
        Functions::Auth_UserISNT();
        $this->s_Data = (new MgrUser)->current_saller_data($_SESSION['saller_id']);

        include_once S_VIEWS.'/setting.view.php';
        $this->getSData();

//
//        echo '<pre>';
//            var_dump();
//        echo '</pre>';
    }

    public function showPlans(){
        $this->allplan = (new Pagination)->showDataWithPagination('plans', 'id', 0, 10);
        include_once S_VIEWS.'/plans.view.php';
        $this->getAllplan();
    }

    public function showDashboard(){
        session_start();
        Functions::Auth_UserISNT();
        $d = new MgrProducts();
        $d_ = new MgrUser();
        $f = new Functions();

        if(isset($_GET['page'])){
            $this->shop_data = (new Pagination)->showDataWithPagination($_SESSION['shop_name'], $_SESSION['order by'], (int)$_GET['page']*10, 10);
        }
        $this->shop_data = (new Pagination)->showDataWithPagination($_SESSION['shop_name'], $_SESSION['order by'], 0, 10);


        if($_SESSION['shop_name'] === 'lbm'){
            $this->promoClient = (new Pagination)->showDataWithPagination('promo', $_SESSION['client_order'], 0, 10);

            $this->allinFaq = (new Pagination)->showDataWithPagination("faq", 'id', 0, 10);
            $this->allplan = (new Pagination)->showDataWithPagination("plans", 'id', 0, 10);
            $this->allinpromo = (new Pagination)->showDataWithPagination("home_special_promo", 'id', 0, 10);

            $this->totalBu = (new Pagination)->totalCountFromAnyWhere("sallers");
            $this->totalSu = (new Pagination)->totalCountFromAnyWhere("users");

            $this->totalBuActif = (new Pagination)->totalActiveCount("sallers", 1);
            $this->totalSuActif = (new Pagination)->totalActiveCount("users", 1);

            $this->totalMenSallers = (new Pagination)->totalGenderCount("sallers", 1, "Men");
            $this->totalWomanSallers = (new Pagination)->totalGenderCount("sallers", 1, "Woman");

            $this->totalMenUsers = (new Pagination)->totalGenderCount("users", 1, "Men");
            $this->totalWomanUsers = (new Pagination)->totalGenderCount("users", 1, "Woman");

            $this->BusiClient = (new Pagination)->showDataWithPagination('sallers', $_SESSION['filter_user'], 0, 10000);
            $this->SuClient = (new Pagination)->showDataWithPagination('users', $_SESSION['filter_user'], 0, 10000);

        }else{
            $this->promoClient = (new Pagination)->showDataWithPagination('promo', $_SESSION['client_order'], 0, 10);
        }

        $this->saller_data = $d_->current_saller_data($_SESSION['saller_id']);
        $this->sub_admin_data = $d_->manageSubAdmin();
        $this->busiProd = $d->ProdSearch($_SESSION['shop_name'], $f->e($_GET['sp']));

        include_once S_VIEWS.'/dashboard.view.php';
        $this->getSallerData();
        $this->getShopData();
        $this->getSubAdminData();
        $this->getBusiProd();
        $this->getAllinpromo();
        $this->getPromoClient();
        $this->getAllinFaq();
        $this->getAllplan();
        $this->getTotalBu();
        $this->getTotalSu();
        $this->getTotalBuActif();
        $this->getTotalSuActif();
        $this->getTotalWomanUsers();
        $this->getTotalMenUsers();
        $this->getTotalMenSallers();
        $this->getTotalWomanSallers();
        $this->getBusiClient();
        $this->getSuClient();

        /************************ VAR START *************************/
        $errors = [];

        if (isset($_POST['nw__sbmt'])){
            $post = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            if(empty($post['nw__cat'])){
                $errors [] = "- Please select product categorie";
            }
            if(empty($post['nw__sub_cat'])){
                $errors [] = "- Please select product sub categorie";
            }
            if(empty($post['nw__name'])){
                $errors [] = "- Please enter product name";
            }
            if(empty($post['nw__qly'])){
                $errors [] = "- Please enter product quality";
            }
            if(empty($post['nw__price'])){
                $errors [] = "- Please enter product price";
            }
            if(empty($post['nw__promo_price'])){
                $errors [] = "- Please enter product price";
            }
            if(empty($post['nw__desc'])){
                $errors [] = "- Please enter product short description";
            }
            if(empty($post['nw__prop'])){
                $errors [] = "- Please select enter product proprites";
            }
            if(empty($post['nw__Color'])){
                $errors [] = "- Please enter product color";
            }
            if(empty($post['nw__Size'])){
                $errors [] = "- Please enter product size";
            }
            if(empty($post['nw__stock'])){
                $errors [] = "- Please enter product stock";
            }

            if(empty($post['nw__im1'])){
                $errors [] = "- Please enter product first image";
            }
            if(empty($post['nw__im2'])){
                $errors [] = "- Please select enter product seconde image";
            }
            if(empty($post['nw__im3'])){
                $errors [] = "- Please enter product thirth image";
            }
            if(empty($post['nw__im4'])){
                $errors [] = "- Please enter product four image";
            }
            if(empty($post['nw__im5'])){
                $errors [] = "- Please enter product fith image";
            }

            if (count($errors) === 0){
                $data = [
                    $post['nw__name'], $post['nw__cat'], $post['nw__qly'], $post['nw__price'],
                    $post['nw__promo_price'], $post['nw__Color'], $post['nw__Size'], $post['nw__prop'],
                    $post['nw__stock'], $post['nw__desc'], $post['nw__im1'], $post['nw__im2'],
                    $post['nw__im3'], $post['nw__im4'], $post['nw__im5'], $post['nw__sub_cat']
                ];
                $d->addProd($f->Fl_upercase($_SESSION['shop_name']), $post['add_by'], $data);
            }
            $f->notif_errors($errors);
        }

        if (isset($_POST['ed__sbmt_btn'])){
            $post = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            if(empty($post['ed__cat'])){
                $errors_ [] = "- Sorry product categorie can not to be empty";
            }
            if(empty($post['ed_sub_cat'])){
                $errors_ [] = "- Sorry product sub categorie can not to be empty";
            }
            if(empty($post['ed__name'])){
                $errors_ [] = "- Sorry product name can not to be empty";
            }
            if(empty($post['ed__price'])){
                $errors_ [] = "- Sorry product price can not to be empty";
            }
            if(empty($post['ed__desc1'])){
                $errors_ [] = "- Sorry product long description can not to be empty";
            }
            if(empty($post['ed__prop'])){
                $errors_ [] = "- Sorry product proprites can not to be empty";
            }
            if(empty($post['ed__Color'])){
                $errors_ [] = "- Sorry product color can not to be empty";
            }
            if(empty($post['ed__Size'])){
                $errors_ [] = "- Sorry product size can not to be empty";
            }
            if(empty($post['ed__stock'])){
                $errors_ [] = "- Sorry product stock can not to be empty";
            }

            if(empty($post['ed__im1'])){
                $errors_ [] = "- Sorry product first image can not to be empty";
            }
            if(empty($post['ed__im2'])){
                $errors_ [] = "- Sorry enter product seconde image can not to be empty";
            }
            if(empty($post['ed__im3'])){
                $errors_ [] = "- Sorry product thirth image can not to be empty";
            }
            if(empty($post['ed__im4'])){
                $errors_ [] = "- Sorry product four image can not to be empty";
            }
            if(empty($post['ed__im5'])){
                $errors_ [] = "- Sorry product fith image can not to be empty";
            }

            if (count($errors) !== 0){
                $data = [];
                $d->UpdateProd($_SESSION['shop_name'], $post['c_ProdId'], $data);
            }

            $f->notif_errors($errors);
        }/*** Equiv ajx ***/

        if (isset($_POST['n__submit'])){
            $post = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            if (empty($post['typ__admin'])){
                $errors [] = '- Please select user type';
            }
            if (empty($post['n__name'])){
                $errors [] = '- Please enter user name';
            }
            if (empty($post['n__mail'])){
                $errors [] = '- Please enter user email adress';
            }
            if (empty($post['n__phone'])){
                $errors [] = '- Please enter user phone number';
            }
            if (empty($post['n__passw'])){
                $errors [] = '- Please enter user password';
            }
            if (empty($post['n__passw_c'])){
                $errors [] = '- Please enter user password confirm';
            }
            if ($post['n__passw'] !== $post['n__passw_c']){
                $errors [] = '- Passwords d\'nt machtes';
            }

            if (count($errors) === 0){
                $data = [$post['n__name'], $post['typ__admin'], $post['n__mail'], $post['n__phone'], $post['n__passw_c']];
                $d__ = new MgrLogin();
                $d__->createSubUser($data);
            }

            $f->notif_errors($errors);
        }/*** Equiv ajx ***/

        if (isset($_POST['n__sbt'])){
            if (empty($_POST['up__name']) || mb_strlen($_POST['up__name']) < 3){
                $errors [] = '- Please enter user name';
                
            }else{
                $new_value = $f->Fl_upercase($_POST['up__name']);
                $d_->updateSallerData($_SESSION['saller_id'], "username", $new_value);
            }
            $f->notif_errors($errors);
        }/*** Equiv ajx ***/
        if (isset($_POST['m__sbt'])){
            if (empty($_POST['up___mail']) || !filter_var( $_POST['up___mail'], FILTER_VALIDATE_EMAIL)){
                $errors [] = '- Please enter user name';
            }else{
                $d_->updateSallerData($_SESSION['saller_id'], "email", $_POST['up___mail']);
            }
            $f->notif_errors($errors);
        }/*** Equiv ajx ***/
        if (isset($_POST['ph__sbt'])){
            if (empty($_POST['up__ph'])
                || !filter_var($_POST['up__ph'], FILTER_VALIDATE_INT)
                || mb_strlen($_POST['up__ph'] < 7)){
                $errors [] = '- Please enter correct phone number';
            }else{
                $d_->updateSallerData($_SESSION['saller_id'], "phone_number", $_POST['up__ph']);
            }
            $f->notif_errors($errors);
        }/*** Equiv ajx ***/
        if (isset($_POST['p__sbt'])){

            if (empty($_POST['up__pw'])){
                $errors [] = '- Please complete all form';
            }
            if (mb_strlen($_POST['up__pw']) < 8){
                $errors [] = '- Old password is short';
            }
            if (empty($_POST['up__pw__nw']) || empty($_POST['up__pw_c'])){
                $errors [] = '- Please complete all form';
            }
            if (mb_strlen($_POST['up__pw__nw']) < 8){

                $errors [] = '- Password is short';
            }
            if ($_POST['up__pw__nw'] !== $_POST['up__pw_c']){
                $errors [] = '- Password confirm d\'nt machtes';
            }

            if (!password_verify($f->e($_POST['up__pw']),  $d_->getAdminOldPass()['saller_password'])){
                $errors [] = '- Password d\'nt machtes';
            }
            if (count($errors) === 0){
                $npass = password_hash($f->e($_POST['up__pw__nw']), PASSWORD_DEFAULT, ['cost'=>12]);
                $d_->updateSallerData($_SESSION['saller_id'],"saller_password", $npass);
            }
            $f->notif_errors($errors);
        }/*** Equiv ajx ***/

        if (isset($_POST['add_cat_sbtn'])){
            if (!empty($_POST['set_ipn']) && mb_strlen($_POST['set_ipn'] > 3)){
                $d___ = new MgrShop();
                $d___->addcat($_POST['set_ipn']);
            }
        }

        if (isset($_POST['category'])){
            $_SESSION['order by'] = 'category';
            $f->redir('dashboard');
        }
        if (isset($_POST['prod_name'])){
            $_SESSION['order by'] = 'prod_name';
            $f->redir('dashboard');
        }
        if (isset($_POST['price'])){
            $_SESSION['order by'] = 'price';
            $f->redir('dashboard');
        }
        if (isset($_POST['quantity'])){
            $_SESSION['order by'] = 'quantity';
            $f->redir('dashboard');
        }

        if(isset($_POST['delfromprom'])){
            (new Pagination)->delAnyWhere('promo', Functions::getCookies('cppi_cookie'), "dashboard");
        }

        if(isset($_POST['cust_Name'])){
            $_SESSION['filter_user'] = $_POST['cust_Name'];
            Functions::redir('dashboard');
        }
        if(isset($_POST['cust_country'])){
            $_SESSION['filter_user'] = $_POST['cust_country'];
            Functions::redir('dashboard');
        }
        if(isset($_POST['cust_city'])){
            $_SESSION['filter_user'] = $_POST['cust_city'];
            Functions::redir('dashboard');
        }
        if(isset($_POST['cust_gender'])){
            $_SESSION['filter_user'] = $_POST['cust_gender'];
            Functions::redir('dashboard');
        }
    }

    public function showAnnonces(){
        session_start();
        $d = new MgrAnnonces();
        $f = new Functions();

        $this->annonceData = $d->showAnnonces($_SESSION['city'], null);

        include_once S_VIEWS.'/annonces.view.php';
        $this->getAnnonceData();
        $ann_prod_name = $_POST['ann_prod_name'];
        $ann_prod_qte = $_POST['ann_prod_qte'];
        $ann_prod_price = $_POST['ann_prod_price'];
        $ann_prod_qly = $_POST['ann_prod_qly'];
        $ann_prod_color = $_POST['ann_prod_color'];
        $ann_prod_size = $_POST['ann_prod_size'];

        $error__ = [];

        if (isset($_POST['add_annonce'])){
            if (empty($ann_prod_name) || mb_strlen($ann_prod_name) < 3){
                $error__[] = '- PLease enter product name';
            }
            if (empty($ann_prod_qte) || !filter_var($ann_prod_qte, FILTER_VALIDATE_INT)){
                $error__[] = '- PLease enter product quantity';
            }
            if (empty($ann_prod_qly) || filter_var($ann_prod_qly, FILTER_VALIDATE_INT)){
                $error__[] = '- PLease select product quality';
            }
            if (empty($ann_prod_price) || !filter_var($ann_prod_price, FILTER_VALIDATE_FLOAT)){
                $error__[] = '- PLease enter product price';
            }

            if (empty($ann_prod_color) || filter_var($ann_prod_color, FILTER_VALIDATE_INT)){
                $error__[] = '- PLease enter product color';
            }
            if (empty($ann_prod_size)){
                $error__[] = '- PLease select product size';
            }

            if (count($error__) === 0){
                $d->postAnnonce();
            }

            $f->notif_errors($error__);
        }

        if (isset($_POST['answer_btn'])){
            if (empty($_POST['answer'])){
                $error__ [] = '- Please enter response';
            }elseif (count($error__) === 0){
                $d->postComment($_POST['annonce_id'], $f->e($_POST['annonceur']), $_POST['answer']);
            }
            $f->notif_errors($error__);
        }














//        echo'<pre>';
//            var_dump();
//        echo '</pre>';
    }

    public function showPanel(){
        session_start();
        Functions::Auth_SU_userISNT();
        $d = new MgrUser();
        $mgrA = new MgrAnnonces();

        $this->annonceD = $mgrA->showAnnonces(null, strtolower($_SESSION['username']));
        $this->current_su_data = $d->current_su_data($_SESSION["current_user_id"]);

        include_once S_VIEWS.'/panel.view.php';
        $this->getCurrentSuData();
        $this->getAnnonceD();
    }

    public function showForum(){
        $this->blogShowAll = (new MgrProducts)->getAll('blog_post');
        if(!isset($_GET['page'])){
            $this->blogData = (new MgrProducts)->getAllItemsFromTable('blog_post', 0, 2);

        }else{
            $this->blogData = (new MgrProducts)->getAllItemsFromTable('blog_post', (int)$_GET['page']*2, 2);
        }

        include_once S_VIEWS.'/forum.view.php';
        $this->getBlogData();
        $this->getBlogShowAll();
//
//        echo '<pre>';
//            var_dump($_GET['page']);
//        echo '</pre>';

        return $this->getBlogShowAll();
    }

    public function showFaq(){
        session_start();
        $this->faq = (new MgrProducts)->getQuestions();
        include_once S_VIEWS.'/faq.view.php';
        $this->getFaq();
    }

    public function showReclam(){
        session_start();
        $f = new Functions();
        include S_VIEWS.'/reclamations.view.php';
        $errors = [];

        /******************BACK PRODUCT********************/
        $name = $_POST['b_name'];
        $email = $_POST['b_email'];
        $phone = $_POST['b_phone'];

        $qte = $_POST["b_qte"];
        $p_name = $_POST['p_name'];

        $reason = $_POST['b_reason'];
        $tid = $_POST['b_tid'];
        $businame = $_POST['b_busi_name'];

        $issu = $_POST['b_issu'];
        $rec_ta = $_POST['rec_ta'];

        if(isset($_POST['b_submit'])){
            if ($f->not_empty($_POST))
            {
                $f->notif_errors("Please complete all forms");

            }if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors [] = "Please enter valid adress e-mail";

            }if(mb_strlen($phone) < 6){
                $errors [] = "Please enter valid phone number";
            }

            if (count($errors) == 0){
                try {
                    (new MgrProducts)->checkTransaction([$f->e($name), $f->e($email), $f->e($phone), $f->e($qte),
                        $f->e($p_name), $f->e($reason), $f->e($tid), $f->e($businame),
                        $f->e($issu), $f->e($rec_ta)
                    ]);
                }catch(Exception $e) {
                    echo $e->getMessage();
                }
            }
            $f->notif_errors($errors);
        }
        /*******************BACK PRODUCT********************/

        /******************ALERT********************/
        $s_name = $_POST['s_name'];
        $s_email = $_POST['s_email'];
        $s_phone = $_POST['s_phone'];


        $s_about = $_POST['s_rec_about'];
        $s_businame = $_POST['s_busi_name'];
        $s_rec_ta = $_POST['s_rec_ta'];

        if(isset($_POST['s_sbt'])){
            if ($f->not_empty([$f->e($s_name), $f->e($s_email), $f->e($s_phone),
                $f->e($s_about), $f->e($s_businame), $f->e($s_rec_ta)]))
            {
                $f->notif_errors(["Please complete all forms"]);
            }else{
                (new MgrProducts)->addAlert([$f->e($s_name), $f->e($s_email), $f->e($s_phone),
                    $f->e($s_about), $f->e($s_businame), $f->e($s_rec_ta)]
                );
            }
        }
        /*******************ALERT********************/

        /******************ABOUTISSEMNT********************/
        $a_name = $_POST['a_name'];
        $a_rec_id = $_POST['a_rec_id'];

        if(isset($_POST['a_sbt'])){
            if ($f->not_empty([$f->e($a_name), $f->e($a_rec_id)]))
            {
                $f->notif_errors(["Please complete all forms"]);
            }else{
                (new MgrProducts)->aboutissement([$f->e($a_name), $f->e($a_rec_id)]);
            }
        }
        /*******************ABOUTISSEMNT********************/

    }

    public function showProfil(){
        session_start();
        $d = new MgrUser();

        if (!isset($_GET['name']) || $_GET['name'] === ''){
            (new Functions)->redir('./');
        }
        $this->profilData = $d->getAllfromAnyBusiUser("sallers", $_GET['name']);

        include S_VIEWS.'/profil.view.php';
        $this->getProfilData();
//        var_dump($this->getProfilData()[0]['email']);
    }

    public function showService(){
        session_start();
        include S_VIEWS.'/service.view.php';
    }

    public function showTransactions(){
        include S_VIEWS.'/transactions.view.php';

        if(!empty($_POST['t_id'])){
            $post = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            (new MgrProducts)->transaction_check($post['t_id']);
        }

        if(!empty($_POST['logoff'])){
            unset($_SESSION['tid']);
            (new Functions)->redir('transactions');
        }
    }

    public function showShopList(){
        $this->shoplist = (new MgrUser)->AllItemsFromTable();

        include_once S_VIEWS.'/shoplist.view.php';
        $this->getShoplist();

//        $country = [];
//        foreach($this->getShoplist() as $value){
//            array_push($country, $value['country']);
//        }
//        echo '<pre>';
//            var_dump(array_unique($country));
//        echo '</pre>';
    }

}