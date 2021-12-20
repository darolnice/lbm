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
    private $country = ['USA', 'Cameroon', 'france', 'Italia', 'Canada', 'Gabon',
                        'Congo brazaville', 'Ivoire coast', 'Tchad', 'Algeria'
    ];
    public function getCountry(): array
    {
        return $this->country;
    }

    private $activity = ['General Market store', 'Electronic store',
                         'Health store', 'Sport store', 'Children store', 'Foot store'
    ];
    public function getActivity(): array
    {
        return $this->activity;
    }


    private $data;
    private $shopProdData;
    private $shop_data;
    private $saller_data;
    private $sub_admin_data;
    private $specialPromoData;
    private $lbmProdData;
    private array $annonceData = [];
    private $current_su_data;
    private $ctn_name, $ctn_subject, $ctn_mail, $ctn_msg;
    private $annonceD;
    private $busiProd;
    private $best;
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
    private $notif;
    private $mess;
    private $h_shopPref;
    private $specialOffer;
    private $all_readyin_p =[];
    private $hbest;
    private $sbest;






    public function getHbest()
    {
        return $this->hbest;
    }
    public function getSbest()
    {
        return $this->sbest;
    }
    public function getAllReadyinP(): array
    {
        return $this->all_readyin_p;
    }
    public function getSpecialOffer()
    {
        return $this->specialOffer;
    }
    public function getHShopPref()
    {
        return $this->h_shopPref;
    }
    public function getMess()
    {
        return $this->mess;
    }
    public function getNotif()
    {
        return $this->notif;
    }
    public function getShopPref()
    {
        return $this->shopPref;
    }
    public function getSData()
    {
        return $this->s_Data;
    }
    public function getShoplist()
    {
        return $this->shoplist;
    }
    public function getSuClient()
    {
        return $this->SuClient;
    }
    public function getBusiClient()
    {
        return $this->BusiClient;
    }
    public function getTotalMenSallers()
    {
        return $this->totalMenSallers;
    }
    public function getTotalWomanSallers()
    {
        return $this->totalWomanSallers;
    }
    public function getTotalMenUsers()
    {
        return $this->totalMenUsers;
    }
    public function getTotalWomanUsers()
    {
        return $this->totalWomanUsers;
    }
    public function getTotalBuActif()
    {
        return $this->totalBuActif;
    }
    public function getTotalSuActif()
    {
        return $this->totalSuActif;
    }
    public function getTotalBu()
    {
        return $this->totalBu;
    }
    public function getTotalSu()
    {
        return $this->totalSu;
    }
    public function getAllinplan()
    {
        return $this->allinplan;
    }
    public function getAllplan()
    {
        return $this->allplan;
    }
    public function getAllinFaq()
    {
        return $this->allinFaq;
    }
    public function getPromoClient()
    {
        return $this->promoClient;
    }
    public function getAllinpromo()
    {
        return $this->allinpromo;
    }
    public function getSpecialPromoData()
    {
        return $this->specialPromoData;
    }
    public function getProfilData()
    {
        return $this->profilData;
    }
    public function getBlogShowAll()
    {
        return $this->blogShowAll;
    }
    public function getBlogData()
    {
        return $this->blogData;
    }
    public function getFaq()
    {
        return $this->faq;
    }

    public function getBest()
    {
        return $this->best;
    }
    public function getBusiProd()
    {
        return $this->busiProd;
    }
    public function getCtnName()
    {
        return $this->ctn_name;
    }
    public function getCtnSubject()
    {
        return $this->ctn_subject;
    }
    public function getCtnMail()
    {
        return $this->ctn_mail;
    }
    public function getCtnMsg()
    {
        return $this->ctn_msg;
    }
    public function getCurrentSuData()
    {
        return $this->current_su_data;
    }
    public function getAnnonceData()
    {
        return $this->annonceData;
    }

    public function getLbmProdData()
    {
        return $this->lbmProdData;
    }
    public function getSubAdminData()
    {
        return $this->sub_admin_data;
    }
    public function getSallerData()
    {
        return $this->saller_data;
    }
    public function getShopData()
    {
        return $this->shop_data;
    }
    public function getShopProdData()
    {
        return $this->shopProdData;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getAnnonceD()
    {
        return $this->annonceD;
    }

    public function setCtnName($ctn_name): void
    {
        $this->ctn_name = $ctn_name;
    }
    public function setCtnSubject($ctn_subject): void
    {
        $this->ctn_subject = $ctn_subject;
    }
    public function setCtnMail($ctn_mail): void
    {
        $this->ctn_mail = $ctn_mail;
    }
    public function setCtnMsg($ctn_msg): void
    {
        $this->ctn_msg = $ctn_msg;
    }





    public function session(){
        session_start();
        echo "<pre>";
            var_dump($_SESSION);
        echo "</pre>";
    }

    public function showHome(){
        session_start();
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
        if ($_GET['sp']){
            $this->specialPromoData = $db->ProdSearch('home_special_promo', $f->e($_GET['sp']));
            $this->lbmProdData = $db->ProdSearch('lbm', $f->e($_GET['sp']));
        }

        if ($_GET['Search']){
            $this->specialPromoData = $db_->findCategorie('home_special_promo', $f->e($_GET['Search']));
            $this->lbmProdData = $db_->findCategorie('lbm', $f->e($_GET['Search']));
        }

        $this->hbest = $db->getAllItemsFromTable("best_saling", 0, 5);
        $this->sbest = $db->getAllItemsFromTable("best_shop", 0, 5);
        $this->h_shopPref = (new MgrUser)->getAllfromAnyBusiUser("sallers", 'lbm');
        $this->specialOffer = $db->getAllItemsFromTable("special_offer", 0, 10);


        include_once S_VIEWS.'/home.view.php';
        $this->getSpecialPromoData();
        $this->getLbmProdData();
        $this->getSpecialOffer();
        $this->getHShopPref();
        $this->getHbest();
        $this->getSbest();
    }

    public function showProduct(){
        session_start();
        $d = new MgrProducts();
        $shop = Functions::SNFormatBack($_GET['shop']);
        $this->data = $d->showProdBycategory($shop, $_GET['sub']);

        if(empty($_GET['id']) && empty($_GET['name'])){
            Functions::redir('./shop?name='.$shop);
        }else{
            $this->shopProdData = $d->showProdDetails($shop, $_GET['id']);
            $this->shopPref = (new MgrUser)->getAllfromAnyBusiUser("sallers", $shop);

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
                        'User info'   =>[  strip_tags($_POST["firstname"]),
                                           strip_tags($_POST["lastname"]),
                                           strip_tags($_POST["email"]),
                                           strip_tags($_POST["phn"])],
                        'Shipping info'=>[ strip_tags($_POST["country"]),
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
        session_start();
        setcookie('ssc', serialize('add_at'), time()+60*24);
        setcookie('curr', utf8_decode($this->shopPref[0]['currency']), time()+60*24);
        $d = new MgrProducts();
        $f = new Functions();
        $current_business = str_replace(" ",'_', $f->e($_GET['name']));

        if($_COOKIE['spl']){
            if ($_GET['Search']){
                $this->data = (new MgrShop)->ShopFindByCategory($current_business, $f->e($_GET['Search']));
            }
            if ($_GET['sp']){
                $this->data = $d->ProdSearch($current_business, $f->e($_GET['sp']));
            }
            if (!isset($_GET['Search']) && !isset($_GET['sp'])){
                $this->data = (new Pagination)->showDataWithRange($current_business, (int)$_COOKIE['spl'], 0, 50);
            }

        }else{
            if($_GET['Search']){
                $this->data = (new MgrShop)->ShopFindByCategory($current_business, $f->e($_GET['Search']));
            }
            if ($_GET['sp']){
                $this->data = $d->ProdSearch($current_business, $f->e($_GET['sp']));
            }
            if (!isset($_GET['Search']) && !isset($_GET['sp'])){
                $this->data = (new Pagination)->showDataWithPagination($current_business, "prod_name", 0,50);
            }
        }
        $this->shopPref = (new MgrUser)->getAllfromAnyBusiUser("sallers", $current_business);

        if ($_SESSION['info']){
            Functions::set_flash_tab([$_SESSION['info']], 'danger');
            unset($_SESSION['info']);
        }

        include_once S_VIEWS.'/shop.view.php';
        $this->getData();
        $this->getShopPref();
        $this->getData();
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

        $this->notif = json_decode($this->getSallerData()[0]['notif'], true);
        $this->mess = (new MgrUser)->getAllMess($_SESSION['username'], null);


        foreach($this->promoClient as $prd){
            $id = json_decode($prd['prod_data'], true);
            foreach ($id as $item){
                $this->all_readyin_p [] = $item['prod_id'];
            }
        }

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
        $this->getNotif();
        $this->getMess();
        $this->getAllReadyinP();






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

        if (isset($_GET['Search'])){
            $this->annonceData = $d->showAnnonces($_GET['Search'], $_SESSION['city'], null);
        }else{
            $this->annonceData = $d->showAnnonces(null, $_SESSION['city'], null);
        }

        include_once S_VIEWS.'/annonces.view.php';
        $this->getAnnonceData();
        $f = new Functions();

        $name = $f->e($_POST['name']);
        $phone = $f->e($_POST['phone']);
        $mail = $f->e($_POST['email']);
        $country = $f->e($_POST['country']);
        $city = $f->e($_POST['city']);

        $ann_prod_name = $f->e($_POST['ann_prod_name']);
        $ann_prod_qte = $f->e($_POST['ann_prod_qte']);
        $ann_prod_price = $f->e($_POST['ann_prod_price']);
        $ann_prod_qly = $f->e($_POST['ann_prod_qly']);
        $ann_prod_color = $f->e($_POST['ann_prod_color']);
        $ann_prod_size = $f->e($_POST['ann_prod_size']);
        $ann_prod_cmt = $f->e($_POST['ann_prod_cmt']);

        $error__ = [];

        if (isset($_POST['add_annonce'])){
            if (empty($name) || mb_strlen($name) < 3){
                $error__[] = '- PLease enter your name';
            }
            if (empty($phone) || $phone < 6){
                $error__[] = '- PLease enter phone number';
            }
            if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)){
                $error__[] = '- PLease enter e-mail adress';
            }
            if (empty($country) || mb_strlen($country) < 3){
                $error__[] = '- PLease enter your country';
            }
            if (empty($city) || mb_strlen($city) < 3){
                $error__[] = '- PLease enter your city';
            }


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

            if ($_FILES){
                $ex_allowes = ['jpg', 'jpeg', 'jfif', 'png'];
                foreach ($_FILES as $k => $fv){
                    $lower_ext = strtolower(pathinfo($fv['name'], PATHINFO_EXTENSION));
                    if (!in_array($lower_ext, $ex_allowes)){
                        $error__[] = 'Type files not allowed !!!';
                    }
                    if ($fv['size'] > 1500000){
                        $error__[] = 'Image is too large, max size 1.5mo';
                    }
                }
            }

            $imdata = [
                'img1_name' => $_FILES['ann_img_1']['name'], 'img1_tmp' => $_FILES['ann_img_1']['tmp_name'],
                'img2_name' => $_FILES['ann_img_2']['name'], 'img2_tmp' => $_FILES['ann_img_2']['tmp_name']
            ];

            if (count($error__) === 0){
                $data = [
                    $name, $phone, $mail,
                    $country, $city, $ann_prod_name,
                    $ann_prod_qte, $ann_prod_qly,
                    $ann_prod_price, $ann_prod_color,
                    $ann_prod_size, $ann_prod_cmt, $imdata
                ];

                $d->postAnnonce($data);
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
    }

    public function showPanel(){
        session_start();
        Functions::Auth_SU_userISNT();
        $d = new MgrUser();
        $mgrA = new MgrAnnonces();

        $this->annonceD = $mgrA->showAnnonces(null, strtolower($_SESSION['username']));
        $this->current_su_data = $d->current_su_data($_SESSION["current_user_id"]);
        $this->notif = json_decode($this->getCurrentSuData()->notif, true);
        $this->mess = (new MgrUser)->getAllMess($_SESSION['username'], null);

        include_once S_VIEWS.'/panel.view.php';
        $this->getCurrentSuData();
        $this->getAnnonceD();
        $this->getNotif();
        $this->getMess();
    }

    public function showForum(){
        session_start();
        $this->blogShowAll = (new MgrProducts)->getAll('blog_post');
        if(!isset($_GET['page'])){
            $this->blogData = (new MgrProducts)->getAllItemsFromTable('blog_post', 0, 2);

        }else{
            $this->blogData = (new MgrProducts)->getAllItemsFromTable('blog_post', (int)$_GET['page']*2, 2);
        }

        include_once S_VIEWS.'/forum.view.php';
        $this->getBlogData();
        $this->getBlogShowAll();


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
        $this->profilData = $d->getAllfromAnyBusiUser("sallers", Functions::SNFormatBack($_GET['name']));

        include S_VIEWS.'/profil.view.php';
        $this->getProfilData();

    }

    public function showService(){
        session_start();
        include S_VIEWS.'/service.view.php';
    }

    public function showTransactions(){
        session_start();
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
        session_start();
        $this->shoplist = (new MgrUser)->getshoplist();

        if($_SESSION['info']){
            Functions::set_flash_tab([$_SESSION['info']], 'danger');
            unset($_SESSION['info']);
        }

        include_once S_VIEWS.'/shoplist.view.php';
        $this->getShoplist();

//        echo '<pre>';
//            var_dump();
//        echo '</pre>';
    }

    public function showBest(){
        session_start();
        $db = new MgrProducts();

        if ($_GET['f'] === 'sale'){
            $this->best = $db->getAllItemsFromTable("best_saling", 0, 50);
        }

        if ($_GET['f'] === 'shop'){
            $this->best = $db->getAllItemsFromTable("best_shop", 0, 50);
        }

        include_once S_VIEWS.'/_best.view.php';
        $this->getBest();


//        echo '<pre>';
//            var_dump();
//        echo '</pre>';
    }

}