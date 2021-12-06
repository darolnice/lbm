<?php //use Lbm\Functions\Functions; ?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/partials/homeNav.css">

<nav class="nav-bar" id="">

    <ul>
        <li class="cool <?= Functions::setActive('');?><?= Functions::setActive('home');?>" id="home">
            <a class="" href="./">
                <img class="_dpp"
                     style="width: 19px; height: 19px; margin-top: 10px; margin-right: 2px;"
                     src="<?= S_ASSETS?>images/svg/home_black_24dp.svg" alt="">
                Home
            </a>
        </li>

        <li class="cool <?= Functions::setActive('shoplist');?>" id="stl__"><a href="shoplist">
                <img class="_dpp"
                     src="<?= S_ASSETS?>images/svg/shop_black_24dp.svg" alt="">
                Shop
            </a>
        </li>

        <li class="cool <?= Functions::setActive('service');?>" id="stl__">
            <a class="" href="service">
                <img class="_dpp"
                     src="<?= S_ASSETS?>images/svg/home_repair_service_black_24dp.svg" alt="">
                Services
            </a>
        </li>

        <?php if (Functions::isCatLink($_GET['r'])):?>
            <li id="category_nav"><a style="cursor: default" class="fk">
                    <img class="_dpp"
                         src="<?= S_ASSETS?>images/svg/category_black_24dp.svg" alt="">
                    Category <b style="margin-top: 1px;margin-left: 3px">&blacktriangledown;</b></a>
                <div class="sub-menu-2">
                    <ul class="row-cols-md-3" id="ul_2">
                        <?php for ($i=0; $i<count($this->getData()); $i++): ?>
                            <li id="cm_id">
                                <a class="" href="?Search=<?= $this->getData()[$i]->categorie;?>"><?= $this->getData()[$i]->categorie;?></a>
                            </li>
                        <?php endfor;?>
                    </ul>
                </div>
            </li>
        <?php endif;?>

        <li class="cool <?= Functions::setActive('annonces');?>" id="stl__">
            <a class="" href="annonces">
                <img class="_dpp"
                     src="<?= S_ASSETS?>images/svg/visibility_off_black_24dp.svg" alt="">
                Ad
            </a>
        </li>

        <li class="cool <?= Functions::setActive('transactions');?>" id="stl__">
            <a class="" href="transactions">
                <img class="_dpp"
                     src="<?= S_ASSETS?>images/svg/swap_horiz_black_24dp.svg" alt="">
                Transactions
            </a>
        </li>

        <li class="cool <?= Functions::setActive('forum');?>" id="stl__">
            <a class="" href="forum">
                <img class="_dpp"
                     src="<?= S_ASSETS?>images/svg/save_alt_black_24dp.svg" alt="">
                Forum
            </a>
        </li>

        <li class="cool <?= Functions::setActive('Faq');?>" id="stl__">
            <a class="" href="faq">
                <img class="_dpp"
                     src="<?= S_ASSETS?>images/svg/question_answer_black_24dp.svg" alt="">
                Faq
            </a>
        </li>

        <li class="cool <?= Functions::setActive('contact');?>" id="stl__">
            <a class="" href="contact">
                <img class="_dpp"
                     src="<?= S_ASSETS?>images/svg/call_black_24dp.svg" alt="">
                Contact us
            </a>
        </li>

        <?php if (!isset($_GET['r'])):?>
            <li class="small" id="srch">
            <form class="form-group" method="GET">
                <input type="search"
                       id="home_srch"
                       class="form-control"
                       placeholder="SEARCH PRODUCTS"
                       name="Search"
                       autocomplete="off">
                <div id="_srch"></div>
            </form>
        </li>
        <?php endif;?>

        <li id="notif_price">
            <a class="c_cart" href="checkcart">
                <img class="" style="width: 25px; height: 25px; margin-top: -9px; margin-right: 2px;"
                     src="<?= S_ASSETS?>images/svg/shopping_basket_black_24dp.svg" alt="">
                <h6 id="total"></h6>
            </a>
        </li>

        <?php if ($_SESSION['username']): ?>
            <li class="messa__">
                <img class="mt-3" id="messa__" src="<?= S_ASSETS?>images/svg/email_black_24dp.svg" alt="user image">
            </li>

            <li class="notif__">
                <img class="mt-3" id="notif__" src="<?= S_ASSETS?>images/svg/notifications_active_black_24dp.svg" alt="user image">
            </li>

            <div class="row notifdiv__" style="display: none">
                <h6 class="text-primary">Notifications</h6>
                <?php for($m=0; $m<3; $m++): ?>
                    <div class="one_n">
                        <p class="notif_date">Mercredi 7 janvier 2022 à 10:00:05</p>
                        <p class="notif_message">Un produit qui pourrait vous interesser a été ajouté pret de chez vous, cliquez pour en savoir plus!</p>
                        <div class="d-flex w-100 _bbo">
                            <img class="w-25" src="<?= S_ASSETS ?>images/img/lite.jpg" alt="image">
                            <div class="w-75">
                                <p class="notif_pn">Montre rolex en or</p>
                                <p class="notif_pp">150.99$ <del class="text-danger ml-3">200.99$</del></p>
                            </div>
                        </div>
                        <img class="del_notif" title="Delete this notification" src="<?= S_ASSETS ?>images/svg/delete_black_24dp.svg" alt="">
                    </div>
                <?php endfor;?>
            </div>
        <?php endif;?>


        <li class="pers">
            <img class="imag" id="persn" src="<?= Functions::setpp()?>" alt="user image">
            <div class="stat_point" id="<?= Functions::online();?>"></div>

            <div class="dropdown-content" id="myDropdown" style="display: none">
                <?php if($_SESSION['saller_id']): ?>
                    <a id="u_sett" href="dashboard">
                        <img class="nav_ico" src="<?= S_ASSETS?>images/svg/dashboard_black.svg" alt="user image">
                        Dashboard
                    </a>

                    <a id="lgt" href="setting">
                        <img class="nav_ico" src="<?= S_ASSETS?>images/svg/settings_black.svg" alt="user image">
                        Setting
                    </a>
                <?php endif;?>

                <?php if($_SESSION['current_user_id']): ?>
                    <a id="lgt" href="panel">
                        <img class="nav_ico" src="<?= S_ASSETS?>images/svg/settings_black.svg" alt="user image">
                        Dashboard
                    </a>
                <?php endif;?>

                <a id="lgt" href="logout">
                    <img class="nav_ico" src="<?= S_ASSETS?>images/svg/refresh_black_24dp.svg" alt="user image">
                    Log out
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- scripts start -->
<script src="<?= S_ASSETS?>js/jquery.min.js"></script>
<script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
<script src="<?= S_ASSETS?>js/Navhome.js"></script>
<script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->