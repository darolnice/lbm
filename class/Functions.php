<?php
//namespace Lbm\Functions;
//
//use Exception;

class Functions extends Navigation
{
    /**
     * @param $path
     * @return string
     */
    public static function setActive($path){
        $ray = explode('/', $_SERVER['REQUEST_URI']);
        $rout = array_pop($ray);
        if ($rout == $path){
            return 'active';
        }else{
            return '';
        }
    }


    /**
     * @param $path
     * @return string
     */
    public static function setActiveRelLink($path){
        $ray = explode('/', $_SERVER['REQUEST_URI']);
        $rout = array_pop($ray);
        if (explode('?', $rout )[0] == $path){
            return 'active';
        }else{
            return '';
        }
    }

    /**
     * redirection
     * @param $url
     */
    public static function redir($url){
        if (headers_sent()){
            print ('<meta http-equiv="refresh" content="0;URL='.$url.'">');
        }else{
            header('location: '.$url."\n");
        }
        exit();
    }


    function redirect($page, $permanent){
        if (headers_sent()=== false){
            header('location:' .$page, true, ($permanent === true) ? 301 : 302);
        }
        exit();
    }


    /**
     *
     */
    public static function clear_input_data(){
        if (isset($_SESSION ['input'])){
            $_SESSION ['input'] = [];
        }
    }



    /**
     * verification
     * @param array $fields
     * @return bool
     */
    public function not_empty($fields = []){
        if (count($fields) !== 0){
            foreach ($fields as $field){
                if (empty($_POST[$field]) || trim($_POST[$field]) == ""){
                    return false;
                }else{
                    return true;
                }
            }
        }
        return false;
    }

    //notifications

    /**
     * @param array $messages
     * @param string $type
     */
    public static function set_flash_tab($messages = [] , $type = 'info'){
        foreach ($messages as $message){
            $_SESSION['lbmAlert']['message'] = $message;
            $_SESSION['lbmAlert']['type'] = $type;
        }
    }


    /**
     * @param array $errors
     */
    public function notif_errors($errors = []){
        if (isset($errors) && count($errors) !== 0){
            echo '<div class="alert_danger">
            <button class="close" style="color: white; font-size: 14px;" data-dismiss="alert" aria-hidden="true">&times;</button>';

            foreach ($errors as $error){
                echo $error.'<br/>';
            }
            echo '</div>';
        }
    }

    /**
     * @param $bool
     */
    public function isChk($bool){
        if ($bool === '1'){
            echo '<div class="is_chk"> 
                    <b>&check;</b>';
            echo '</div>';
        }
    }

    /**
     * @param $bool
     */
    public function isChk_home($bool){
        if ($bool === '1'){
            echo '<p class="lbm_cktd"> 
                    <b>erified</b>';
            echo '</p>';
        }
    }

    /**
     * @return string
     * @throws Exception
     */
    public static function random_id(){
        return  random_int(1854, 2540) * 6;
    }

    /**
     * @return string
     * @throws Exception
     */
    public static function random_key(){
        return  sha1(random_int(14, 40) * 5);
    }

    //security

    /**
     * @param $string
     * @return string
     */
    public function e($string): string {
        return  htmlentities($string, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * @param $wordToChange
     * @return string
     */
    public static function Fl_upercase(string $wordToChange): string {
        $first_l_uper = substr(strtoupper($wordToChange), 0, 1);
        $rest_letter = substr($wordToChange, 1, strlen($wordToChange) -1);
        return str_replace($wordToChange, $first_l_uper.$rest_letter, $wordToChange);
    }

    /**
     *
     */
    public static function Auth_UserIS(): void
    {
        if (isset($_SESSION['username'])){
            Functions::redir('./');
            exit();
        }
    }

    /**
     *
     */
    public static function Auth_UserISNT(): void
    {
        if (!isset($_SESSION['saller_id'])){
            Functions::redir('login');
            exit();
        }
    }

    /**
     *
     */
    public static function Auth_SU_userISNT(): void
    {
        if (!isset($_SESSION['username']) || isset($_SESSION['saller_id'])){
            Functions::redir('login');
            exit();
        }
    }

    /**
     * @return string|null
     */
    public static function online(){
        if (!empty($_SESSION['username'])){
            return 'online';
        }else{
            return null;
        }
    }


    /**
     * @param int $cmp{$cmp is use if $_GET is not defined}
     * @param $currentpage
     * @param int $limiter
     * @return int
     */
    function nextPage(int $cmp, $currentpage, int $limiter): int {
        if ($_GET['page'] === null || $_GET['page'] === ''){
            if ((int)$currentpage < round($limiter/10, 0, PHP_ROUND_HALF_UP)){
                return ++$cmp;
            }
        }
        if ((int)$currentpage < ceil($limiter/10)){
            return (int)++$_GET['page'];
        }else{
            return 1;
        }
    }

    /**
     * @param int $limiter
     */
    static function blogNext(int $limiter){
        if (!isset($_GET['page'])){
            return $_GET['page'] = 1;
        }
        if($_GET['page'] !== null && $_GET['page'] < $limiter){
            return  ++$_GET['page'];
        }
        if($_GET['page'] == $limiter){
            return $_GET['page'] = 0;
        }
        return null;
    }

    /**
     * @param int $limiter
     * @return int|null
     */
    static function blogPrev($currentpage, int $limiter){
        if ($currentpage > 0){
            return --$currentpage;
        }
        if ($currentpage > $limiter || $currentpage == ""){
            return $currentpage = 0;
        }
        return null;
    }

    /**
     * @return int*
     */
    static function homeLoadCurrentPage(): int {
        if ($_GET['page'] === null || $_GET['page'] === ''){
            return 1;
        }
        else{
            return $_GET['page'];
        }
    }

    /**
     * @return int
     */
    function prevPage() {
        if ($_GET['page'] === null || $_GET['page'] === ''){
            return $_GET['page'] = 1;
        }elseif((int)$_GET['page'] > 1){
            return (int)--$_GET['page'];
        }
        return null;
    }


    /**
     * @param string|null $r
     * @return bool
     */
    public static function isCatLink(string $r = null): bool {
        $arr = ["shop", ""];
        if (in_array($r, $arr)){
            return true;
        }else {
            return false;
        }
    }

    /**
     * @param string|null $r
     * @return string
     */
    public static function catLink(string $r = null): string {
        if ($_GET['r'] === 'shop'){
            return 'shop?name='.$_GET['name'].'&Search='.$r;
        }else {
            return '?Search='.$r;
        }
    }

    /**
     * Return the good link if " $_GET[search] " is set
     * @param string $prdId
     * @param string $sub
     * @return string
     */
    public static function ShopPrdLink(string $prdId, string $sub): string {
        $v = explode('=', $_SERVER['REQUEST_URI']);
        if ($_GET['Search']){
            return $prdId.'&sub='.$sub.'&shop='.explode('&', explode('=', $_SERVER['REQUEST_URI'])[1])[0];
        }else {
            return $prdId.'&sub='.$sub.'&shop='.array_pop($v);
        }
    }



    /**
     * utilisé dans nav.view.php et _homeNav.view.php,
     * la function retourne le lien exacte de "Setting" selon le contexte
     * @param string|null $typeOfUser
     * @return string
     */
    public static function go(string $typeOfUser = null): string {
        if (isset($typeOfUser) && $typeOfUser !== ''){
            return 'panel';
        }else {
            return 'setting';
        }
    }

    /**
     * @param null $key_1
     * @param null $key_2
     * @return string
     */
    public static function getUserDataFromSession($key_1 = null, $key_2 = null) :string {
        if (isset($key_1) && $key_1 !== null){
            return $key_1;
        }else if (isset($key_2) && $key_2 !== null){
            return $key_2;
        }else{
            return '';
        }
    }

    /**
     * @param string $message
     * @return string
     */
    public static function sentNotif(string $message): string {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === "XMLHTTPREQUEST") {
            return $message;
        }else{
            (new Functions)->notif_errors([$message]);
        }
        return false;
    }

    /**
     * @param string $first_name
     * @param string $city
     * @param string $phone_number
     * @param string $email
     */
    public static function save_in_cookies(string $name = "", string $phone_number = "", string $city = "", string $email = "") {
        $values = serialize([$name, $phone_number, $city, $email]);
        setcookie('cookies_u_data', $values, time()+60*24);
    }

    /**
     * @param string|null $s_cookies
     * @return mixed
     */
    public static function get_cookies_data(string $s_cookies = null){
        return unserialize($_COOKIE[$s_cookies]);
    }

    /**
     * @param string|null $s_cookies
     * @return mixed
     */
    public static function getCookies(string $s_cookies = null){
        return $_COOKIE[$s_cookies];
    }

    /**
     * @param string $value
     * @return int
     */
    public static function get_occurence(string $value){
        $compter = 0;
        $ray = ['Men', 'Electronic', 'Health', 'Automobile', 'Woman', 'Child', 'Accessories', 'Sport', 'Mode'];
        $nr = [];
        foreach((new Navigation)->showForum() as $c_){
            if(in_array($c_['category'], $ray)){
                array_push($nr, $c_['category']);
            }
        }
        foreach($nr as $n__){
            if($n__ == $value){
                $compter++;
            }
        }
        return $compter;
    }

    /**
     * @param string $adress
     * @param string $subject
     * @param $content
     */
    public static function lbmSendMail(string $adress, string $subject, $content){
        $headers = "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        mail($adress, $subject, $content, $headers);
    }

    /**
     * @param $string
     * @return string|string[]
     */
     public static function decode_h_entities ($string) {
            preg_match_all("/&#\?\w\+;/", $string, $entities, PREG_SET_ORDER);
            $entities = array_unique(array_column($entities, 0));
            foreach ($entities as $entity) {
                $decoded = mb_convert_encoding($entity, 'UTF-8', 'HTML-ENTITIES');
                $string = str_replace($entity, $decoded, $string);
            }
            return $string;
     }

    /**
     * @param int $n
     * @param int $N
     * @return int
     */
     public static function percentage(int $N, int $n): int {
         if($n === 0){
             return 0;
         }else{
             return( $n / $N) * 100;
         }
     }

    /**
     * @return string
     */
     public static function setpp(): string {
         if(!empty($_SESSION['profil_image'])){
             return S_ASSETS.'images/upload/'.$_SESSION['profil_image'];
         }else{
             return S_ASSETS.'images/svg/person_black_24dp.svg';
         }
     }

    /**
     * @param $array
     * @return bool
     */
     public static function checkImg($array): bool {
         $allowed_exs = array("jpg", "png", "jpeg", "jfif");
         $img_ex = pathinfo($array['name'], PATHINFO_EXTENSION);
         $img_ex_lc = strtolower($img_ex);

         if($array['size'] > 500000){return false;}
         if($array['name'] === ''){return false;}
         if(!in_array($img_ex_lc, $allowed_exs)){return false;}

         return true;
     }

    /**
     * @param string $tmp
     * @param string $new_name
     * @return bool
     */
     public static function moveUloadImage(string $tmp, string $new_name): bool {
         $img_upload_path = 'public_html/assets/images/upload/'.$new_name;
         return move_uploaded_file($tmp, $img_upload_path);
     }

    /**
     * @param string $type
     * @return string
     */
     public static function imgExtention(string $type): string {
         $arr = explode('/', $type);
         return strtolower($arr[1]);
     }


















}
























//session save valu


//if (!function_exists('save_input')){
//    function save_input(){
//        foreach ($_POST as $key => $value){
//            if(strpos($key,'password') === false){
//                $_SESSION['input'][$key] = $value;
//            }
//        }
//    }
//}
//if (!function_exists('get_input')){
//    function get_input($key){
//            return !empty($_SESSION ['input'][$key]) ? e($_SESSION ['input'][$key]) : null;
//    }
//}










