<?php

//use Lbm\Navigation\Navigation;
//use Lbm\Log\Log;
//use Lbm\Cart\Cart;




/**class router
 * *create routes and find controllers
 */
class Rooter
{
    private $request;

    private $routes = [
                        ""                  => ["controllers" => "navigation", "method" => "showHome"],
                        "session"           => ["controllers" => "navigation", "method" => "session"],
                        "product"           => ["controllers" => "navigation", "method" => "showProduct"],
                        "checkcart"         => ["controllers" => "navigation", "method" => "showCheckcart"],
                        "contact"           => ["controllers" => "navigation", "method" => "showContact"],
                        "payment"           => ["controllers" => "navigation", "method" => "showPayment"],
                        "shop"              => ["controllers" => "navigation", "method" => "showShop"],
                        "annonces"          => ["controllers" => "navigation", "method" => "showAnnonces"],
                        "forum"             => ["controllers" => "navigation", "method" => "showForum"],
                        "service"           => ["controllers" => "navigation", "method" => "showService"],
                        "faq"               => ["controllers" => "navigation", "method" => "showFaq"],
                        "reclamations"      => ["controllers" => "navigation", "method" => "showReclam"],
                        "profil"            => ["controllers" => "navigation", "method" => "showProfil"],
                        "about us"          => ["controllers" => "navigation", "method" => "showAbout"],
                        "plans"             => ["controllers" => "navigation",  "method" => "showPlans"],
                        "dashboard"         => ["controllers" => "navigation",  "method" => "showDashboard"],
                        "setting"           => ["controllers" => "navigation",  "method" => "showSetting"],
                        "panel"             => ["controllers" => "navigation",  "method"  => "showPanel"],
                        "homePagination"    => ["controllers" => "navigation",  "method"  => "pagination"],
                        "transactions"      => ["controllers" => "navigation",  "method" => "showTransactions"],
                        "shoplist"          => ["controllers" => "navigation",  "method" => "showShopList"],


                        "login"             => ["controllers" => "log", "method"  => "showLogin"],
                        "business"          => ["controllers" => "log", "method"  => "showBusinessLogin"],
                        "logout"            => ["controllers" => "log", "method"  => "showLogout"],
                        "authentification"  => ["controllers" => "log",  "method" => "showAuthentification"],
                        "forget"            => ["controllers" => "log",  "method" => "showForget"],
                        "reset"             => ["controllers" => "log",  "method" => "showReset"],
                        "signup"            => ["controllers" => "log",  "method" => "showSignup"],
                        "register"          => ["controllers" => "log",  "method" => "showRegister"],
                        "register_2"        => ["controllers" => "log",  "method" => "showRegister2"],

                        "om"                => ["controllers" => "payment",  "method" => "showOm"],
                        "momo"              => ["controllers" => "payment",  "method" => "showMomo"],
                        "stripe"            => ["controllers" => "payment",  "method" => "showStripe"],
                        "bank"              => ["controllers" => "payment",  "method" => "showBank"],
                        "paypal"            => ["controllers" => "payment",  "method" => "showPaypal"],

    ];


    private $ApiRoutes = [
                        "jxSearchApi"       => ["api"   => "AjaxApiRes",  "method" => "jxSearchApi"],
                        "ajaxSearchApi"     => ["api"   => "AjaxApiRes",  "method" => "searchApi"],
                        "checkReadyUse"     => ["api"   => "AjaxApiRes",  "method" => "checkReadyUse"],
                        "ckReadyUse"        => ["api"   => "AjaxApiRes",  "method" => "ckReadyUse"],
                        "jxProdData"        => ["api"   => "AjaxApiRes",  "method" => "jxProdData"],
                        "jxEditProd"        => ["api"   => "AjaxApiRes",  "method" => "jxEditProd"],
                        "jxNewProd"         => ["api"   => "AjaxApiRes",  "method" => "jxNewProd"],
                        "ajxUUD"            => ["api"   => "AjaxApiRes",  "method" => "ajxUpdateUD"],
                        "jxDP"              => ["api"   => "AjaxApiRes",  "method" => "ajxDP"],
                        "jxMSA"             => ["api"   => "AjaxApiRes",  "method" => "jxMSA"],
                        "jxNewSA"           => ["api"   => "AjaxApiRes",  "method" => "jxNewSA"],
                        "jxNewSCAT"         => ["api"   => "AjaxApiRes",  "method" => "jxNewSCAT"],
                        "jxMgrC"            => ["api"   => "AjaxApiRes",  "method" => "jxMgrC"],
                        "jx2fa_"            => ["api"   => "AjaxApiRes",  "method" => "jx2fa_"],
                        "jxpa"              => ["api"   => "AjaxApiRes",  "method" => "jxpa"],
                        "jxS_Api"           => ["api"   => "AjaxApiRes",  "method" => "searchApi"],
                        "jxlivechk"         => ["api"   => "AjaxApiRes",  "method" => "checkReadyUse"],
                        "cart"              => ["api"   => "AjaxApiRes",  "method" => "saveCart"],
                        "jxPp"              => ["api"   => "AjaxApiRes",  "method" => "showProductPrice"],
                        "jxAnPsCmt"         => ["api"   => "AjaxApiRes",  "method" => "jxAnPsCmt"],
                        "jxAddRec"          => ["api"   => "AjaxApiRes",  "method" => "jxAddRec"],
                        "jxAddAlrt"         => ["api"   => "AjaxApiRes",  "method" => "jxAddAlrt"],
                        "jxAbttsm"          => ["api"   => "AjaxApiRes",  "method" => "jxAbttsm"],
                        "jxFaqP"            => ["api"   => "AjaxApiRes",  "method" => "jxFaqP"],
                        "jxAddPost"         => ["api"   => "AjaxApiRes",  "method" => "jxAddPost"],
                        "jxAddCmt"          => ["api"   => "AjaxApiRes",  "method" => "jxAddCmt"],
                        "jxSphAnyWhere"     => ["api"   => "AjaxApiRes",  "method" => "jxSphAnyWhere"],
                        "jxProfmail"        => ["api"   => "AjaxApiRes",  "method" => "profsendmail"],
                        "jxpromsetste"      => ["api"   => "AjaxApiRes",  "method" => "jxpromsetste"],
                        "jxprompost"        => ["api"   => "AjaxApiRes",  "method" => "jxprompost"],
                        "jxPromAdd"         => ["api"   => "AjaxApiRes",  "method" => "jxPromAdd"],
                        "jxAbtCust"         => ["api"   => "AjaxApiRes",  "method" => "jxAbtCust"],
                        "ftcUpAdminImg"     => ["api"   => "AjaxApiRes",  "method" => "ftcUpAdminImg"],
                        "jxPanelSrch"       => ["api"   => "AjaxApiRes",  "method" => "jxPanelSrch"],
                        "jxHomeRange"       => ["api"   => "AjaxApiRes",  "method" => "jxHomeRange"],
                        'jxchat'            => ["api"   => "AjaxApiRes",  "method" => "jxchat"],
                        'jxrC'              => ["api"   => "AjaxApiRes",  "method" => "jxrC"],
                        'jxUDCart'          => ["api"   => "AjaxApiRes",  "method" => "jxUDCart"],

                        "jxSearchAW"        => ["api"   => "AjaxApiRes",  "method" => "jxSearchAnyWhere"],
                        "ftcSetD"           => ["api"   => "AjaxApiRes",  "method" => "ftcSetD"],

    ];


    public function __construct($r)
    {
        $this->request = $r;
    }

    public function renderController(){
         $request = $this->request ;

          if (key_exists($request, $this->ApiRoutes)){
                $ctlr = $this->ApiRoutes[$request]['api'];
                $method = $this->ApiRoutes[$request]['method'];

                $currentApi = new $ctlr();
                $currentApi->$method();
                return;
          }

          elseif (key_exists($request, $this->routes)){
              $controllers = $this->routes[$request]['controllers'];
              $method = $this->routes[$request]['method'];

              $currentController = new $controllers();
              $currentController->$method();

          }else{
              echo '404';
          }

    }
}