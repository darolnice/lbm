<?php
header('content-type: application/json');

class AjaxApiRes
{
    private $HTTP_OK = 200;
    private $HTTP_BAD_REQUEST = 400;


    /**
     *
     */
    public function searchApi()
    {
        session_start();
        if(isset($_GET['name'])) {
            (new RestApi)->ajaxSearchApi($_GET['name']);
        }else {
            (new RestApi)->ajaxSearchApi($_SESSION['shop_name']);
        }
    }

    /**
     *  Recherche ajax sur la home page
     */
    public function jxSearchApi()
    {
        (new RestApi)->ajaxHomeSearchApi();
    }

    /**
     *  Recherche ajax, controle si un nom d'utilisateur est deja prix
     */
    public function checkReadyUse()
    {
        if(!empty($_POST['proposition'])) {
            $r = (new RestApi)->AjaxCheckDuplicateName((new Functions)->e($_POST['proposition']));
            $this->response($this->HTTP_OK, $r, 238);
        }
    }

    /**
     *  Recherche ajax, controle si un nom d'utilisateur est deja prix
     */
    public function ckReadyUse()
    {
        if(!empty($_POST['prop'])) {
            $r = (new RestApi)->jxCheckDuplicateShop((new Functions)->e($_POST['prop']));
            $this->response($this->HTTP_OK, $r, 2318);
        }
    }

    /**
     *
     */
    public function jxProdData()
    {
        session_start();
        if($_POST['id'] !== null && $_POST['id'] !== '') {
            $r = (new RestApi())->jxProdData($_SESSION['shop_name'], (new Functions())->e($_POST['id']));
            $this->response($this->HTTP_OK, $r, 100);
        }
    }

    /**
     *
     */
    public function jxEditProd()
    {
        session_start();
        if($_POST['data']) {
            $post = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            if(empty($post['data'][0][3])) {
                $this->response($this->HTTP_BAD_REQUEST, "Sorry product name can not to be empty");
                return null;
            }
            if(empty($post['data'][0][0])) {
                $this->response($this->HTTP_BAD_REQUEST, "Sorry product categorie can not to be empty");
                return null;
            }
            if(empty($post['data'][0][2])) {
                $this->response($this->HTTP_BAD_REQUEST, "Sorry product quality can not to be empty");
                return null;
            }
            if(empty($post['data'][0][4])) {
                $this->response($this->HTTP_BAD_REQUEST, "Sorry product price can not to be empty");
                return null;
            }
            if(empty($post['data'][0][6])) {
                $this->response($this->HTTP_BAD_REQUEST, "Sorry product description can not to be empty");
                return null;
            }
            if(empty($post['data'][0][7])) {
                $this->response($this->HTTP_BAD_REQUEST, "Sorry product proprites can not to be empty");
                return null;
            }
            if(empty($post['data'][0][8])) {
                $this->response($this->HTTP_BAD_REQUEST, "Sorry product color can not to be empty");
                return null;
            }
            if(empty($post['data'][0][9])) {
                $this->response($this->HTTP_BAD_REQUEST, "Sorry product size can not to be empty");
                return null;
            }
            if(empty($post['data'][0][10])) {
                $this->response($this->HTTP_BAD_REQUEST, "Sorry product stock can not to be empty");
                return null;
            }

            $data = [$post['data'][0][3], $post['data'][0][0], $post['data'][0][1],
                $post['data'][0][2], $post['data'][0][4], $post['data'][0][5],
                ucwords($post['data'][0][8]), $post['data'][0][9], $post['data'][0][7],
                $post['data'][0][10], $post['data'][0][6]
            ];

            if(!empty($_FILES)){
                $_SESSION['img_to_set'] = array_unique($_POST['data'][1]);
            }

            $_SESSION['ed_prod_array'] = $data;
            $_SESSION['tmp_pid'] = $post['data'][0][18];
            $this->response($this->HTTP_OK, 'next', 1);

        }else {

            $dta = $_SESSION['ed_prod_array'];
            if(!empty($_FILES)){
                $img_to_update = $_SESSION['img_to_set'];

                //push new data in final array
                foreach($_FILES as $key => $value) {
                    $uniq = uniqid("PRD-", true).'.'.Functions::imgExtention($value['type']);
                    if(Functions::checkImg($_FILES[$key])) {
                        array_push($dta, $uniq);
                        Functions::moveUloadImage($value['tmp_name'], $uniq);
                    }
                }
            }

            $r = (new MgrProducts)->UpdateProd($_SESSION['shop_name'], $_SESSION['tmp_pid'], $dta);
            if($r === 1) {
                //delete old files
                if(isset($img_to_update)){
                    foreach($img_to_update as $tdl) {
                        $path = dirname(__DIR__).DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR.$tdl;
                        try{
                            unlink($path);
                        }catch(Exception $e){
                            return $e->getMessage();
                        }
                    }

                    //unsent vars
                    unset($_SESSION['ed_prod_array']);
                    unset($_SESSION['tmp_pid']);
                    unset($_SESSION['img_to_set']);
                }

                //sent res
                $this->response($this->HTTP_OK, $r, 49);
            }
        }
        return false;
    }

    /**
     *
     */
    public function jxNewProd(){
        session_start();
        $data = [];

        try {
            if($_POST['data']){
                $post = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                array_push($data,
                    (new Functions)->Fl_upercase($post["data"][0][3]), $post["data"][0][0], $post["data"][0][2], $post["data"][0][4],
                    $post["data"][0][5], ucwords($post["data"][0][8]), $post["data"][0][6],
                    $post["data"][0][7], $post["data"][0][1], $post["data"][0][10], $post["data"][0][9]
                );
                $_SESSION['prod_array'] = $data;
                $this->response($this->HTTP_OK, 'next', 1808);
            }else{
                if(Functions::checkImg($_FILES['nw__im1'])){
                    if(Functions::checkImg($_FILES['nw__im2'])){
                        if(Functions::checkImg($_FILES['nw__im3'])){
                            if(Functions::checkImg($_FILES['nw__im4'])){
                                if(Functions::checkImg($_FILES['nw__im5'])){
                                    $new_img1 = uniqid("PRD-", true).'.'.Functions::imgExtention($_FILES['nw__im1']['type']);
                                    $new_img2 = uniqid("PRD-", true).'.'.Functions::imgExtention($_FILES['nw__im2']['type']);
                                    $new_img3 = uniqid("PRD-", true).'.'.Functions::imgExtention($_FILES['nw__im3']['type']);
                                    $new_img4 = uniqid("PRD-", true).'.'.Functions::imgExtention($_FILES['nw__im4']['type']);
                                    $new_img5 = uniqid("PRD-", true).'.'.Functions::imgExtention($_FILES['nw__im5']['type']);

                                    $dta = $_SESSION['prod_array'];
                                    array_push($dta, $new_img1);
                                    array_push($dta, $new_img2);
                                    array_push($dta, $new_img3);
                                    array_push($dta, $new_img4);
                                    array_push($dta, $new_img5);

                                    $r = (new MgrProducts)->addProd($_SESSION['shop_name'], $_SESSION['username'], $dta);
                                    if($r === 1){
                                        Functions::moveUloadImage($_FILES['nw__im1']['tmp_name'], $new_img1);
                                        Functions::moveUloadImage($_FILES['nw__im2']['tmp_name'], $new_img2);
                                        Functions::moveUloadImage($_FILES['nw__im3']['tmp_name'], $new_img3);
                                        Functions::moveUloadImage($_FILES['nw__im4']['tmp_name'], $new_img4);
                                        Functions::moveUloadImage($_FILES['nw__im5']['tmp_name'], $new_img5);
                                        unset($_SESSION['prod_array']);
                                        $this->response($this->HTTP_OK, $r);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }catch(Exception $e){return $e->getMessage();}
        return false;
    }

    /**
     *
     */
    public function ajxUpdateUD(){
        session_start();
        $_POST['dta_'];
        $_POST['columb'];
        $F = new Functions();
        $rpi = new RestApi();

        if ($_POST['columb'] === 'username'){
            if ($_POST['dta_'] === ""){
                $rpi->jxSendAuthCode();
                if ($rpi->jxSendAuthCode()){
                    $this->response($this->HTTP_OK, 'name', null);
                }

            }else{
                $rpi->jxUV($_POST['columb'], $F->e($F->Fl_upercase($_POST['dta_'])), $F->e($_POST['value'][0]));
                $this->response($this->HTTP_OK, '', 1220);
            }
        }

        if ($_POST['columb'] === 'email'){
            if ($_POST['dta_'] === ""){
                $rpi->jxSendAuthCode();
                $this->response($this->HTTP_OK, 'email');

            }else{
                $rpi->jxUV($_POST['columb'], $F->e($_POST['dta_']), $F->e($_POST['value'][0]));
                $this->response($this->HTTP_OK, '', 1240);
            }
        }

        if ($_POST['columb'] === 'phone_number'){
            if ($_POST['dta_'] === ""){
                $rpi->jxSendAuthCode();
                $this->response($this->HTTP_OK, 'phone');

            }else{
                $rpi->jxUV($_POST['columb'], $F->e($_POST['dta_']), $F->e($_POST['value'][0]));
                $this->response($this->HTTP_OK, '', 999);
            }
        }

        if ($_POST['columb'] === 'city'){
            if ($_POST['dta_'] === ""){
                $rpi->jxSendAuthCode();
                if ($rpi->jxSendAuthCode()){
                    $this->response($this->HTTP_OK, 'city');
                }

            }else{
                $rpi->jxUV($_POST['columb'], $F->e($_POST['dta_']), $F->e($_POST['value'][0]));
                $this->response($this->HTTP_OK, '', 9009);
            }
        }

        if ($_POST['columb'] === 'profil_image'){
            if ($_POST['value'][0] === ""){
                $rpi->jxSendAuthCode();
                if ($rpi->jxSendAuthCode()){
                    $this->response($this->HTTP_OK, 'profil_image');
                    return;
                }
            }
        }
    }

    /**
     *
     */
    public function ajxDP(){
        session_start();
        if (!empty($_POST['del'])){
            $r = (new MgrProducts())->delProd($_SESSION['shop_name'], (int)$_POST['del']);
            $this->response($this->HTTP_OK, $r);
        }
    }

    /**
     *
     */
    public function jxMSA(){
        session_start();
        $mgr = new MgrUser();
        $f = new Functions();

        if (isset($_POST['right'])){
            $r = $mgr->mgrSAR($f->e($_POST['uid']), $f->e($_POST['right']));
            if ($r === true){
                $this->response($this->HTTP_OK, $r, 215);
            }else{
                $this->response($this->HTTP_BAD_REQUEST, $r, 212);
            }

        }else{
            $r = $mgr->delSA($f->e($_POST['uid']));
            if ($r === true){
                $this->response($this->HTTP_OK, $r, 2144);
            }else{
                $this->response($this->HTTP_BAD_REQUEST, $r, 488);
            }
        }



    }

    /**
     *
     */
    public function jxNewSA(){
        session_start();
        if (isset($_POST['right'])){
            $r = (new RestApi())->jxNewSa(
                    $_POST["right"],
                    ucwords($_POST["name"]),
                    $_POST["email"],
                    $_POST["phone"],
                    $_POST["pass"],
                    $_POST["img"],
                    $_SESSION["shop_name"]
            );

            if ($r === true){
                $this->response($this->HTTP_OK, true, 1036);
            }else{
                $this->response($this->HTTP_BAD_REQUEST, false, 1054);
            }
        }
    }

    /**
     *
     */
    public function jxNewSCAT(){
        session_start();
        if (isset($_POST['item'])){
            $r = (new RestApi())->jxNewSCAT($_SESSION['saller_id'], (new Functions())->e($_POST["item"]));

            if ($r === true){
                $this->response($this->HTTP_OK, $r, 1584);

            }else{
                $this->response($this->HTTP_BAD_REQUEST, false, 387);
            }
        }
    }

    /**
     *
     */
    public function jxMgrC(){
        session_start();
        if (isset($_POST['action'])){
            $f = new Functions();
            $r = (new RestApi())->jxMrgCAT($_POST['action'], $_SESSION['saller_id'], $f->e($_POST["item"]), $f->e($_POST["newVal"]));
            $this->response($this->HTTP_OK, $r, 036);
        }
    }

    /**
     * @return null
     */
    public function jx2fa_(){
        session_start();
        if ($_POST['indice']){
            $f = new Functions();
            for($h=0; $h<count($_POST['dta']); $h++){
                if ($_POST['dta'][$h] !== ''){
                    $value[] = $_POST['dta'][$h];
                }
            }
            $r = (new MgrUser())->updateSuData($_SESSION['current_user_id'], $f->e($value[0]), $f->e($value[1]), $_POST['indice']);

            $res = ['Update Success', 'Password is wrong', 'Password Update Successfully', 'City Update Successfully'];

            if (in_array($r, $res)){
                $this->response($this->HTTP_OK, $r, 897);
                return false;
            }else{
                $this->response($this->HTTP_BAD_REQUEST, 'Update Fail, please try again', 113);
            }
        }
        return null;
    }

    /**
     *
     */
    public function jxPa(){
        session_start();
        if (isset($_POST['items'])){
            $r = (new RestApi())->jxPostAnnonce($_POST['items']);
            if($r){
                $this->response($this->HTTP_OK, 'Annonce Add successfully', 133);
            }else{
                $this->response($this->HTTP_BAD_REQUEST, 'Faill Please Try Again', 54);
            }
        }
    }

    /**
     * @param array $array
     * @return bool|int
     */
    function forUpdate(array  $array) {
        foreach($array as $item => $v) {
            foreach($v as $k){
                if(json_decode($k)->prod_id === json_decode($_POST['value'])->prod_id &&
                   json_decode($k)->quantity !== json_decode($_POST['value'])->quantity){
                    return $item;
                }
            }
        }
        return false;
    }

    function prod_sum($acc, $curr){
         return  $acc + $curr;
    }

    /**
     *
     */
    public function saveCart() {
        session_start();
        if($_POST['key'] !== '' && $_POST['value'] !== ''){
            if (isset($_SESSION['cart'])){
                $tab = $_SESSION['cart'];

                //price sum
                array_push( $_SESSION['somme'], json_decode($_POST['value'])->price * json_decode($_POST['value'])->quantity);

                //update
                if($this->forUpdate($_SESSION['cart']) !== false){
                    $v = [$_POST['value']];
                    unset($_SESSION['cart'][$this->forUpdate($_SESSION['cart'])]);
                    array_push($_SESSION['cart'], $v);
                    $this->response($this->HTTP_OK, 'Product Update', 878);
                    return null;
                }

                //already in cart
                if (in_array($_POST['value'], $_SESSION['val'])){
                    $this->response($this->HTTP_OK, 'Already In Cart', 878);
                    return null;
                }

                // Add in cart
                foreach ($_SESSION['cart'] as $k => $v){
                    foreach ($v as $k_ => $v_){
                        array_push($tab, [$_POST['key'] => $_POST['value']]);
                        $_SESSION['cart'] = $tab;

                        $chk = $_SESSION['val'];
                        array_push($chk, $_POST['value']);
                        $_SESSION['val'] = $chk;

                        $this->response($this->HTTP_OK, 'Product Add', 878);
                        return null;
                    }
                }

            }else {
                $_SESSION['somme'] = [];
                array_push( $_SESSION['somme'], json_decode($_POST['value'])->price * json_decode($_POST['value'])->quantity);

                $_SESSION['cart'][0] = [$_POST['key'] => $_POST['value']];
                $_SESSION['val'] = [$_POST['value']];
                $this->response($this->HTTP_OK, 'Product Add', 878);
            }

        }else{
            $this->response($this->HTTP_BAD_REQUEST, "Some one is wrong", 485);
        }
    }

    /**
     *
     */
    public function showProductPrice(){
        session_start();
        if ($_POST['data']){
            $f = new Functions();
            $res = (new RestApi)->jxGetPriceFromDb($f->e($_POST['data'][0]), $f->e($_POST['data'][1]));
            if ($res){
                $this->response($this->HTTP_OK, $res, 1009);
            }
        }
    }

    /**
     *
     */
    public function jxAnPsCmt(){
        session_start();
        if (isset($_POST['data'])){
            $res = (new RestApi())->postAndGetcomment($_POST['data'][0], $_POST['data'][1], $_POST['data'][2]);
            $this->response($this->HTTP_OK, $res, 1005);
        }
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function jxAddRec(){
        $f = new Functions();
        if ($_POST['data']){
            if(mb_strlen($_POST['data'][0]) < 3){
                $this->response($this->HTTP_OK, 'Please enter valid username', 1919);
                return false;
            }
            if(!filter_var($_POST['data'][1], FILTER_VALIDATE_EMAIL)){
                $this->response($this->HTTP_OK, 'Please enter valid adress mail', 1919);
                return false;
            }
            if(mb_strlen($_POST['data'][2]) < 6){
                $this->response($this->HTTP_OK, 'Please enter valid phone number', 1919);
                return false;
            }
            if(!filter_var($_POST['data'][3], FILTER_VALIDATE_INT)){
                $this->response($this->HTTP_OK, 'Please enter valid quantity', 1919);
                return false;
            }
            if(empty($_POST['data'][4])){
                $this->response($this->HTTP_OK, 'Please enter product name', 1919);
                return false;
            }
            if(empty($_POST['data'][5])){
                $this->response($this->HTTP_OK, 'Please enter reason', 1919);
                return false;
            }
            if(empty($_POST['data'][6])){
                $this->response($this->HTTP_OK, 'Please enter shop name', 1919);
                return false;
            }
            if(empty($_POST['data'][7]) || mb_strlen($_POST['data'][1]) < 6){
                $this->response($this->HTTP_OK, 'Please enter valid transaction id', 1919);
                return false;
            }

            $r = (new MgrProducts)->checkTransaction([
                $f->e($_POST['data'][0]),
                $f->e($_POST['data'][1]),
                $f->e($_POST['data'][2]),
                $f->e($_POST['data'][3]),
                $f->e($_POST['data'][4]),
                $f->e($_POST['data'][5]),
                $f->e($_POST['data'][7]),
                $f->e($_POST['data'][6]),
                $f->e($_POST['data'][8]),
                $f->e($_POST['data'][9])
            ]);
            $this->response($this->HTTP_OK, $r, 1919);
        }
        return false;
    }

    /**
     * @return bool
     */
    public function jxAddAlrt(){
        $f = new Functions();
        if ($_POST['data']){
            if(mb_strlen($_POST['data'][0]) < 3){
                $this->response($this->HTTP_OK, 'Please enter valid username', 929);
                return false;
            }
            if(!filter_var($_POST['data'][1], FILTER_VALIDATE_EMAIL)){
                $this->response($this->HTTP_OK, 'Please enter valid adress mail', 929);
                return false;
            }
            if(mb_strlen($_POST['data'][2]) < 6){
                $this->response($this->HTTP_OK, 'Please enter valid phone number', 929);
                return false;
            }
            if(empty($_POST['data'][3])){
                $this->response($this->HTTP_OK, 'Please enter valid subject', 929);
                return false;
            }
            if(empty($_POST['data'][5])){
                $this->response($this->HTTP_OK, 'Please enter message', 929);
                return false;
            }

            $r = (new MgrProducts)->addAlert([
                $f->e($_POST['data'][0]),
                $f->e($_POST['data'][1]),
                $f->e($_POST['data'][2]),
                $f->e($_POST['data'][3]),
                $f->e($_POST['data'][4]),
                $f->e($_POST['data'][5]),
            ]);
            $this->response($this->HTTP_OK, $r, 929);
        }
        return false;
    }

    /**
     * @return bool
     */
    public function jxAbttsm(){
        $f = new Functions();
        if ($_POST['data']){
            if(mb_strlen($_POST['data'][0]) < 3){
                $this->response($this->HTTP_OK, 'Please enter valid username', 106);
                return false;
            }
            if(mb_strlen($_POST['data'][1]) < 10){
                $this->response($this->HTTP_OK, 'Please enter valid reclamation key ', 106);
                return false;
            }

            $r = (new MgrProducts)->aboutissement([$f->e($_POST['data'][0]), $f->e($_POST['data'][1])]);
            $this->response($this->HTTP_OK, $r, 106);
        }
        return false;
    }

    /**
     * @return bool
     */
    public function jxFaqP(){
        $f = new Functions();
        $v = [1, 0];
        if ($_POST['data']){
            if(!filter_var((int)$_POST['data'][0], FILTER_VALIDATE_INT)){
                $this->response($this->HTTP_OK, 'sonder', 110);
                return false;
            }
            if(!in_array((int)$_POST['data'][1], $v)){
                $this->response($this->HTTP_OK, 'positif', 110);
                return false;
            }
            if(!in_array((int)$_POST['data'][2], $v)){
                $this->response($this->HTTP_OK, 'negatif', 110);
                return false;
            }

            $r = (new RestApi())->jxPostFaq( $f->e((int)$_POST['data'][0]), [$f->e($_POST['data'][1]), $f->e($_POST['data'][2])]);
            $this->response($this->HTTP_OK, $r, 110);
        }
        return false;
    }

    /**
     *
     */
    public function jxAddPost(){
        session_start();
        $f = new Functions();
        if ($_POST['data']){
            if (empty($_POST['data'][0])){
                $this->response($this->HTTP_OK, 'Error post image not set', 603);
                return;
            }
            if (empty($_POST['data'][1])){
                $this->response($this->HTTP_OK, 'Error post category not set', 603);
                return;
            }
            if (empty($_POST['data'][2])){
                $this->response($this->HTTP_OK, 'Please write post', 603);
                return;
            }
 
            $r = (new MgrUser)->addBlogPost([
                $f->e($_POST['data'][0]),
                $f->e($_POST['data'][1]), 
                $f->e($_POST['data'][2]),
                $f->e($_POST['data'][3]),
                $f->e($_POST['data'][4]),
                $f->e($_POST['data'][5])
            ]);
            $this->response($this->HTTP_OK, $r, 603);
        }
        
    }

    /**
     *
     */
    public function jxAddCmt(){
        $f = new Functions();
        session_start();
        if (isset($_SESSION['username'])){
            if(isset($_POST['data'])){
                if (empty($_POST['data'][0])){
                    $this->response($this->HTTP_OK, 'Faill please try again', 1030);
                    return;
                }
                if  (empty($_POST['data'][1])){
                    $this->response($this->HTTP_OK, 'Please write your comment', 1030);
                    return;
                }
               $r = (new MgrUser)->addBlogCmt([$f->e($_POST['data'][0]), $f->e($_POST['data'][1]),
                    $f->e($_POST['data'][2]),$_SESSION['username'],
                    $_SESSION['email']]);
               $this->response($this->HTTP_OK, $r, 1030);
            }
        }else{
            $this->response($this->HTTP_OK, 'Please login to comment', 1030);
        }
    }

    /**
     *
     */
    public function jxSphAnyWhere(){
        if(isset($_GET['Sp'])){
            (new RestApi)->jxSearchAnyWhere("blog_post", "prod_name");
        }
    }

    /**
     *
     */
    public function profsendmail(){
        if(isset($_POST['data'])){
            if($_POST['data'][0] == '' || $_POST['data'][0] === null){
                $this->response($this->HTTP_OK, 'Please enter your name', 107);
                return;
            }
            if(!filter_var($_POST['data'][1], FILTER_VALIDATE_EMAIL) || $_POST['data'][1] === null){
                $this->response($this->HTTP_OK, 'Please enter valid e-mail', 107);
                return;
            }
            if($_POST['data'][2] == '' || $_POST['data'][2] === null){
                $this->response($this->HTTP_OK, 'Please enter Subjet', 107);
                return;
            }
            if($_POST['data'][3] == '' || $_POST['data'][3] === null){
                $this->response($this->HTTP_OK, 'Please enter your message', 107);
                return;
            }
            if($_POST['data'][4] == '' || $_POST['data'][4] === null){
                $this->response($this->HTTP_OK, 'Faill please try again', 107);
                return;
            }

            $f = new Functions();
            $header = "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            mail($f->e($_POST['data'][4]), $f->e($_POST['data'][2]), $f->e($_POST['data'][3]), $header);
            $this->response($this->HTTP_OK, 'ok', 107);
        }
    }

    /**
     *
     */
    public function jxpromsetste (){
        if(isset($_POST['data'])){
            $post = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $r = (new Pagination)->updateOneItem('promo', 'statu', $post['data'][0], $post['data'][1]);
            $this->response($this->HTTP_OK, $r, 298);
        }
    }

    /**
     *
     */
    public function jxprompost(){
       if(isset($_POST['data'])){
           $r = (new RestApi)->genericShopInsert('home_special_promo', $_POST['data']);
           $this->response($this->HTTP_OK, $r, 202);
       }
    }

    /**
     *
     */
    public function jxPromAdd(){
        session_start();
        if ($_POST['data']){
            $post = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $r = (new RestApi())->jxAddPromo($post);
            $this->response($this->HTTP_OK, $r, 10);
        }
    }

    /**
     * *
     */
    public function jxAbtCust(){
        if($_POST['data']){
            $post = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $r = (new MgrUser)->getallFromOne($post['data'][0], $post['data'][1]);
            $this->response($this->HTTP_OK, $r, 1012);
        }
    }

    /**
     *
     */
    public function jxSearchAnyWhere(){
        (new RestApi)->jxSearchAW("ref", "shop_name");
    }

    /**
     *
     */
    public function ftcUpAdminImg(){
        session_start();
        $_SESSION['old_pp'] = $_POST['old_pp'];

        if ($_FILES['inpFile']['size'] > 10000000){
            $this->response($this->HTTP_OK, 'Sorry you image is too large!!!', 102);

        }else{
            $this->jxUploadImage(
                $_FILES['inpFile']['name'],
                $_FILES['inpFile']['tmp_name'],
                'profil_image',
                'sallers',
                $_SESSION['old_pp'],
                htmlentities($_COOKIE['dxa']),
            );
        }
    }

    /**
     * @param $img_name
     * @param $img_path
     * @param $columb
     * @param null $table
     * @param null $old_image
     * @param null $code
     * @return bool|string
     */
    public function jxUploadImage($img_name, $img_path, $columb, $table = null, $old_image = null, $code = null){
        $allowed_exs = array("jpg", "png", "jpeg");
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        if (in_array($img_ex_lc, $allowed_exs)){
            if($columb === 'snd_img'){
                $new_img_name = uniqid("SI-", true).'.'.$img_ex_lc;
            }elseif($columb === 'ceo_img'){
                $new_img_name = uniqid("CEO-", true).'.'.$img_ex_lc;
            }elseif($columb === 'col_1_img'){
                $new_img_name = uniqid("CI1-", true).'.'.$img_ex_lc;
            }elseif($columb === 'col_2_img'){
                $new_img_name = uniqid("CI2-", true).'.'.$img_ex_lc;
            }elseif($columb === 'cover_image'){
                $new_img_name = uniqid("CI-", true).'.'.$img_ex_lc;
            }else{
                $new_img_name = uniqid("PP-", true).'.'.$img_ex_lc;
            }


            $img_upload_path = 'public_html/assets/images/upload/'.$new_img_name;
            if($table === 'sallers'){
                if($columb === 'cover_image' || $columb === 'snd_img' || $columb === 'ceo_img' ||
                    $columb === 'col_1_img' || $columb === 'col_2_img'){
                    $r = (new MgrUser)->updateSallerData($_SESSION['saller_id'], $columb, $new_img_name);
                }

                else{
                    $r = (new RestApi)->jxUV($columb, $new_img_name, (int)$code);
                }

                if($r !== 'Auth code is wrong'){
                    if($old_image !== ""){
                        try {
                            unlink('public_html/assets/images/upload/'.$old_image);
                        }catch(Exception $e){
                            return $e->getMessage();
                        }
                    }
                    move_uploaded_file($img_path, $img_upload_path);
                }

                if($old_image !== ""){unset($_SESSION['old_pp']);}
                $this->response($this->HTTP_OK, $r, 20);
            }

        }else{
            $this->response($this->HTTP_OK, 'File type not allowed!!', 120);
            return false;
        }
        return false;
    }

    /**
     *
     */
    public function jxPanelSrch(){
       if(isset($_GET['search'])){
           (new Pagination)->searchWithParams(htmlentities($_GET['search']), '');
       }
    }

    /**
     *
     */
    public function jxHomeRange(){
        if(isset($_POST['data'])){
            setcookie($_POST['data'][1], $_POST['data'][0]);
            $this->response($this->HTTP_OK, 'true', 45);
        }
    }

    /**
     * @param string $topic
     * @param array $data
     */
    public function mercurepost(string $topic, array $data = []){
        define('JWT', 'eyJhbGciOiJIUzI1NiJ9.eyJtZXJjdXJlIjp7InB1Ymxpc2giOlsiKiJdLCJzdWJzY3JpYmUiOlsiaHR0cHM6Ly9leGFtcGxlLmNvbS9teS1wcml2YXRlLXRvcGljIiwie3NjaGVtZX06Ly97K2hvc3R9L2RlbW8vYm9va3Mve2lkfS5qc29ubGQiLCIvLndlbGwta25vd24vbWVyY3VyZS9zdWJzY3JpcHRpb25zey90b3BpY317L3N1YnNjcmliZXJ9Il0sInBheWxvYWQiOnsidXNlciI6Imh0dHBzOi8vZXhhbXBsZS5jb20vdXNlcnMvZHVuZ2xhcyIsInJlbW90ZUFkZHIiOiIxMjcuMC4wLjEifX19.z5YrkHwtkz3O_nOnhC_FP7_bmeISe3eykAkGbAl5K7c');

        $postData = http_build_query([
            'topic' => $topic,
            'data'  => json_encode($data)
        ]);

        echo file_put_contents('http://localhost:3000/.well-known/mercure', false, stream_context_create([
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\nAuthorization:
                     Bearer ".JWT,
                    'content' => $postData
                ]
        ]));
    }

    /**
     * @throws Exception
     */
    public function jxchat(){
        if(!empty($_POST['data'])){
            $post = filter_var_array($_POST['data'], FILTER_SANITIZE_SPECIAL_CHARS);
            if(!isset($_SESSION['username'])){
                if(isset($_COOKIE['v_id'])){
                    $r = (new RestApi)->message($post[1], $_COOKIE['v_id'], $post[0], $post[2] ,$post[3]);
                    $this->response($this->HTTP_OK, $r, null);

                }else{
                    $r = (new RestApi)->message($post[1], Functions::random_key(), $post[0], $post[2], $post[3]);
                    ($r == true) ? setcookie("v_id", Functions::random_key()):
                    $this->response($this->HTTP_OK, $r, null);
                }

            }else{
                $r = (new RestApi)->message($post[1], $_SESSION['username'], $post[0], $post[2], $post[3]);
                $this->response($this->HTTP_OK, $r, null);
            }
        }
    }

    /**
     *
     */
    public function ftcSetD(){
        session_start();
        if(!empty($_POST['data'])){
            if(count($_POST['data']) === 2){
                $post = filter_var_array($_POST['data'], FILTER_SANITIZE_SPECIAL_CHARS);
                $r = (new MgrUser)->updateSallerData($_SESSION['saller_id'], (string)$post[1], $post[0]);
                $this->response($this->HTTP_OK, $r, 106);
            }

            if(count($_POST['data']) === 3){
                $post = filter_var_array($_POST['data'], FILTER_SANITIZE_SPECIAL_CHARS);
                $r = (new MgrShop)->updateShopCheckboxSettting($post[1], $post[2], $_SESSION['saller_id'], $post[0]);
                $this->response($this->HTTP_OK, $r, 166);
            }
        }

        if(isset($_FILES['newCover'])){
            $oldImgName = $_POST['oldCover'];
            $indice = $_POST['indice'];

            $newImgName =  $_FILES['newCover']['name'];
            $newImgTmp  =  $_FILES['newCover']['tmp_name'];
            $newImgSize =  $_FILES['newCover']['size'];

            if($newImgSize > 500000){
                $this->response($this->HTTP_OK, 'Image is too large', null);

            }else{
                $this->jxUploadImage($newImgName, $newImgTmp, $indice, "sallers", $oldImgName, null);
            }
        }
    }











    /**
     * @param $response_code
     * @param $message
     * @param null $res_id
     */
    public function response($response_code, $message, $res_id = null){
        header('content-type: application/json');
        http_response_code($response_code);
        echo json_encode(['response_code' => $response_code, 'message' => $message, 'res_id' => $res_id]);
    }

}