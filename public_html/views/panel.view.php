<?php
//use Lbm\Functions\Functions;
$title = ''.$_SESSION['username'];
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/panel.css">


<body style="background-color: white">

    <article class="short__by">
        <div class="u__info">
            <h5 class="mt-4 mb-4 small">
                <img class="mt-3 i_su" id="" src="<?= S_ASSETS?>images/svg/dashboard_black_24dp.svg" alt="user image">
                DASHBOARD</h5>
            <h5 class="mt-2 small" id="cu_name"><?= $this->getCurrentSuData()->username?></h5>
        </div>

        <div class="d1">
            <button class="srt_by">
                <img class="mt-3 i_su" id="" src="<?= S_ASSETS?>images/svg/manage_accounts_black_24dp.svg" alt="user image">
                PROFIL <b class="float-right">&blacktriangledown;</b></button>
        </div>
        <div class="bt1">
            <form method="post">
                <input type="button" class="s1" data-show="sett_sub_item" value="Name">
                <input type="button" class="l1" data-show="sett_desc_item" value="E-mail">
                <input type="button" class="pr" data-show="sett_cp_item" value="Phone number">
                <input type="button" class="qt" data-show="pa_form" value="City">
                <input type="button" class="pi" data-show="sett_mt_item" value="Profil image">
                <input type="button" class="pss" data-show="lt_form_" value="Password">
            </form>
        </div>

        <div class="d2">
            <button class="s_a">
                <img class="mt-3 i_su" id="" src="<?= S_ASSETS?>images/svg/description_white.svg" alt="user image">
                PRODUCT <b class="float-right">&blacktriangledown;</b></button>
        </div>
        <div class="bt2">
            <form>
                <input data-show="lt_cart" type="button" class="_crt_" value="Cart">
                <input data-show="fav_prd_" type="button" class="fvr__" value="Favori">
                <input data-show="hope_list_div" type="button" id="hop_list" class="pr" value="Hope list">
            </form>
        </div>

        <div class="d3 mt-3">
            <button class="shop_btn">
                <img class="mt-3 i_su" id="" src="<?= S_ASSETS?>images/svg/shop_white.svg" alt="user image">
                SHOP <b class="float-right">&blacktriangledown;</b></button>
        </div>
        <div class="bt3">
            <form method="post">
                <input type="button" class="l1" value="Favori">
            </form>
        </div>

        <div class="d4 mt-3">
            <button class="anc__btn">
                <img class="mt-3 i_su" id="" src="<?= S_ASSETS?>images/svg/payments_white.svg" alt="user image">
                ANNONCES <b class="float-right">&blacktriangledown;</b></button>
        </div>
        <div class="bt4">
            <form method="post">
                <input data-show="res_ann" type="button" id="p_v_ann" class="s1" value="Annonces">
                <input data-show="p_form-add_ann" type="button" id="p_add_ann" class="l1" value="Add annonces">
            </form>
        </div>
        <br>
    </article>

    <section class="ctnr">

        <div class="add">
            <div class="search">
                <img class="bck___hm" src="<?= S_ASSETS?>images/svg/arrow.png" alt="back to home">

                <form class="sch__form form-group" method="get">
                    <label>
                        <input class="srch__ form-control" type="search" name="search" placeholder="SEARCH" autocomplete="off">
                    </label>
                    <div class="p_serch_div"></div>
                    <img class="search_slct" src="<?= S_ASSETS ?>images/svg/down-arrow.png" alt="">
                </form>
            </div>

            <div class="p_notif_messa">
                <img class="mt-3 mr-1" id="p_messa__" src="<?= S_ASSETS?>images/svg/email_black_24dp.svg" alt="user image">

                <?php if(count($this->getNotif()) > 0 ): ?>
                    <div class="notCont"><?= count($this->getNotif())?></div>
                <?php endif;?>
                <?php if(count($this->getMess()) > 0 ): ?>
                    <div class="notCont_mess"><?= count($this->getMess())?></div>
                <?php endif;?>

                <div class="row notifdiv__">
                    <h6 class="text-primary">Notifications</h6>
                    <?php for($m=0; $m<count($this->getNotif()); $m++): ?>
                        <div class="one_n">
                            <a class="text-decoration-none" href="<?= $this->getNotif()[$m]['link']?>">
                                <p class="notif_date"><?= $this->getNotif()[$m]['date']?></p>
                                <p class="notif_message"><?= $this->getNotif()[$m]['message']?></p>
                                <div class="d-flex w-100 _bbo">
                                    <img class="w-25" src="<?= S_ASSETS ?>images/img/lite.jpg" alt="image">
                                    <div class="w-75">
                                        <p class="notif_pn"><?= $this->getNotif()[$m]['name']?></p>
                                        <p class="notif_pp"><?= $this->getNotif()[$m]['price']?>
                                            <del class="text-danger ml-3"><?php ($this->getNotif()[$m]['promo'] === '0') ? print_r('') : print_r($this->getNotif()[$m]['promo'])?>
                                            </del>
                                        </p>
                                    </div>
                                </div>
                                <img class="del_notif" title="Delete this notification" src="<?= S_ASSETS ?>images/svg/delete_black_24dp.svg" alt="">
                            </a>
                        </div>
                    <?php endfor;?>
                </div>

                <div class="row notifmess">
                    <h6 class="text-primary">Messages</h6>
                    <?php if(count($this->getMess()) > 0 ): ?>
                        <?php for($m=0; $m<count($this->getMess()); $m++): ?>
                            <div class="one_n">
                                <p class="notif_date"><?= $this->getMess()[$m]['sent_at']?></p>
                                <p class="notif_message" id="_header_"><?= $this->getMess()[$m]['inf_mess']?></p>
                                <div class="d-flex w-100 _bbo">
                                    <img class="w-25" src="<?= S_ASSETS ?>images/img/lite.jpg" alt="image">
                                    <div class="w-75">
                                        <p class="notif_pn"><?= $this->getMess()[$m]['expediteur']?></p>
                                        <button class="text-dark v__btn" title="click here for quick see this message">View</button>
                                        <p class="notif_pp" id="_message_"><?= $this->getMess()[$m]['message']?> </p>
                                    </div>
                                </div>
                                <img class="del_notif" title="Delete this message" src="<?= S_ASSETS ?>images/svg/delete_black_24dp.svg" alt="">
                            </div>
                        <?php endfor;?>
                    <?php endif;?>
                </div>

                <img class="mt-3" id="p_notif__" src="<?= S_ASSETS?>images/svg/notifications_active_black_24dp.svg" alt="user image">
            </div>

            <div class="admin_pers">
                <img class="admin_imag" id="admin_persn" src="<?= Functions::setpp()?>" alt="user image">
                <div class="admin_stat_point" id="<?= Functions::online();?>"></div>

                <div class="admin_dropdown-content" id="admin_myDropdown" style="display: none">
                    <a id="admin_u_sett" href="panel">
                        <img class="_i_size" src="<?= S_ASSETS?>images/svg/settings_black.svg" alt="user image">
                        Setting</a>
                    <a id="admin_lgt" href="logout">
                        <img class="_i_size" src="<?= S_ASSETS?>images/svg/cached_black_24dp.svg" alt="user image">
                        Log out</a>
                </div>
            </div>
        </div>

        <div class="alltbl row-cols-md-2">
            <div class="panel_profil">
                <p>Profil</p>
                <table class="table-hover jumbotron" id="tble">
                    <tbody class="panel-body" id="tbod">
                        <tr class="__tb_sn">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/visibility_off_black_24dp.svg" alt="bag image">
                                    <a><?= $this->getCurrentSuData()->username?></a>
                                </h6>
                                <form id="sett_sub_item" method="post">
                                    <input class="sett_inSub" type="text" name="in_sub" placeholder="Enter New Username">
                                    <input class="sett_inSub_" type="password" placeholder="Enter password" name="_pwr">
                                    <input id="su_upd_name" class="sett_i_Sub" name="in_submt" type="submit" value="SAVE">
                                </form>
                            </td>
                        </tr>

                        <tr class="__tb_desc">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/alternate_email_black_24dp.svg" alt="bag image">
                                    <a><?= $this->getCurrentSuData()->email?></a>
                                </h6>
                                <form id="sett_desc_item" method="post">
                                    <input class="sett_inDesc" type="email" name="in_desc" placeholder="Enter new email">
                                    <input class="sett_inSub_" type="password" placeholder="Enter password" name="_pwr">
                                    <input id="su_upd_mail" class="sett_i_desc" name="desc_sbmt" type="submit" value="SAVE">
                                </form>
                            </td>
                        </tr>

                        <tr class="__tb_cp">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/call_black_24dp.svg" alt="bag image">
                                    <a><?= $this->getCurrentSuData()->phone_number?></a>
                                </h6>
                                <form id="sett_cp_item" method="post">
                                    <input class="in_cp" type="number" name="in_cp" placeholder="Enter new phone number">
                                    <input class="sett_inSub_" type="password" placeholder="Enter password" name="_pwr">
                                    <input id="su_upd_phone" class="sett_cp_sbmt" name="sett_cp_sbmt" type="submit" value="SAVE">
                                </form>
                            </td>
                        </tr>

                        <tr class="__tb_pa">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/location_city_black_24dp.svg" alt="bag image">
                                    <a><?= $this->getCurrentSuData()->city?></a>
                                </h6>

                                <form id="pa_form" method="post">
                                    <select class="pa_slct" name="activity">
                                        <option value="Douala">Douala</option>
                                        <option value="Yaounde">Yaounde</option>
                                        <option value="Bafoussam">Bafoussam</option>
                                        <option value="Limbe">Limbe</option>
                                    </select>
                                </form>
                            </td>
                        </tr>

                        <tr class="__tb_mt">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/image_noir.svg" alt="bag image">
                                    <a><?= $this->getCurrentSuData()->profil_image?></a>
                                </h6>
                                <form id="sett_mt_item" method="post">
                                    <input class="sett_pp_inSub" type="file" name="in_mt_nm">
                                    <input class="sett_inSub_" type="password" placeholder="Enter password" name="_pwr">
                                    <input class="sett_pp_i_Sub" name="in_sbmt_mt" type="submit" value="SAVE">
                                </form>
                            </td>
                        </tr>

                        <tr class="__tb_lt">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/key_black_24dp.svg" alt="bag image">
                                    <a>**********</a>
                                </h6>
                                <form id="lt_form_" method="post">
                                    <input id="su_upd_old_pass" class="sett_inSub_" type="password" placeholder="Old password" name="olpwr">
                                    <input id="su_upd_npass" class="sett_inSub_" type="password" placeholder="New password" name="nw_pwr">
                                    <input id="su_upd_cpass" class="sett_inSub_" type="password" placeholder="Password confirm" name="pwr_c_">
                                    <button id="su_upd_pass" type="submit" name="pnl_pswr_upd" class="sett_i_Sub">SAVE</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel_prd" style="display: block">
                <p>Product</p>
                <table class="table-hover jumbotron" id="tble">
                    <tbody class="panel-body" id="tbod">
                        <tr class="__tb_pr">
                        <td>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/add_shopping_cart_black_24dp.svg" alt="bag image">
                                <a>Cart</a>
                            </h6>

                            <div class="lt_cart">
                                <div class="items___">
                                    <b class="i1">Product</b>
                                    <b class="i2">Qte</b>
                                    <b class="i3">Price</b>
                                </div>

                                <?php for ($n=0; $n<3; $n++):?>
                                    <div class="item___">
                                        <a class="_i1">Tecno pop 2</a>
                                        <a class="_i2">2</a>
                                        <a class="_i3">115890.99$</a>
                                    </div>
                                <?php endfor;?>

                                <div class="items___">
                                    <b class="i1">SUBTOTAL</b>
                                    <b class="i2"></b>
                                    <b class="i3">523$</b>
                                </div>

                                <button class="chkout">CHECKOUT</button>
                            </div>
                        </td>
                    </tr>

                        <tr class="__tb_desc">
                        <td>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/favorite_black_24dp.svg" alt="bag image">
                                <a>Favori</a>
                            </h6>

                            <div class="fav_prd_">
                                <ul>
                                    <?php for ($n=0; $n<3; $n++):?>
                                        <li>
                                            <h5>Toyota Rav 4 2008</h5>
                                            <img src="<?= S_ASSETS?>images/svg/delete_sweep_black_24dp.svg" alt="bag image">
                                        </li>
                                    <?php endfor;?>
                                </ul>
                            </div>
                        </td>
                    </tr>

                        <tr class="__tb_cp">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/link_black_24dp.svg" alt="bag image">
                                    <a>Hope list</a>
                                </h6>
                                <div class="hope_list_div">
                                    <ul>
                                        <?php for ($n=0; $n<3; $n++):?>
                                            <li>
                                                <h5>MacBook pro Touch Pad</h5>
                                                <img src="<?= S_ASSETS?>images/svg/delete_sweep_black_24dp.svg" alt="bag image">
                                            </li>
                                        <?php endfor;?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel_shop" style="display: block">
                <p>Shop</p>
                <table class="table-hover jumbotron" id="tble">
                    <tbody class="panel-body" id="tbod">
                        <tr class="__tb_sn">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/favorite_black_24dp.svg" alt="bag image">
                                    <a>Favori</a>
                                </h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel_ann" style="display: block">
                <p>Annonces</p>
                <table class="table-hover jumbotron" id="tble">
                    <tbody class="panel-body" id="tbod">
                        <tr class="__tb_sn">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/room_black_24dp.svg" alt="bag image">
                                    <a>Annonces</a>
                                </h6>

                                <?php for ($e=0; $e<count($this->getAnnonceD()); $e++):?>
                                    <div class="res_ann">
                                        <div class="p_a_prod">
                                            <a class="p_a_pn"><?= $this->getAnnonceD()[$e]->prod_name?></a>
                                            <a class="p_a_p"><?= $this->getAnnonceD()[$e]->price.'$'?></a>
                                            <a class="p_a_qte"><?= $this->getAnnonceD()[$e]->quantity?></a>
                                            <a class="p_a_q"><?= $this->getAnnonceD()[$e]->quality?></a>
                                        </div>

                                        <div class="p_ann_res">
                                            <ul>
                                                <b class="small">Responses</b>
                                                <?php
                                                    $responses = (new MgrAnnonces())->showResponses($this->getAnnonceD()[$e]->id, $this->getAnnonceD()[$e]->user_name);
                                                ?>
                                                <?php for ($j=0; $j<count($responses); $j++):?>
                                                    <li>
                                                        <?php $sn = $responses[$j]['shop_name']?>
                                                        <h6 class="res_inf"><a class="mr-3 text-primary" href="shop?name=<?=$sn?>"><?=$sn?></a> <?= $responses[$j]['add_at']?></h6>

                                                        <h6><?= $responses[$j]['response']?></h6>
                                                    </li>
                                                <?php endfor;?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endfor;?>
                            </td>
                        </tr>

                        <tr class="__tb_desc">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/star_rate_black_24dp.svg" alt="bag image">
                                    <a>Add Annonces</a>
                                </h6>

                                <div class="p_form-add_ann">
                                    <form id="panel_add_a" method="post">
                                        <select id="p_p_qly" type="text" name="p_p_qly">
                                            <option value="New">New</option>
                                            <option value="Occasion">Occasion</option>
                                        </select>
                                        <input id="p_p_n" type="text" name="p_p_n" placeholder="Product Name" required>
                                        <input id="p_p_prc" type="text" name="p_p_prc" placeholder="Price" required>
                                        <input id="p_p_qte" type="number" name="p_p_qte" placeholder="Quantity" required>
                                        <input id="p_p_clr" type="text" name="p_p_clr" placeholder="Color" required>
                                        <input id="p_p_sze" type="text" name="p_p_sze" placeholder="Size" required>
                                        <textarea id="p_p_cmt" type="text" rows="4" name="p_p_clr">Other comment's...</textarea>
                                        <button id="p_p_post" type="submit" name="p_p_add">POST</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="p_fv">
            <div class="">
                <h6 class="text-primary"><?= count($this->getMess())?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= count($this->getMess())?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= count($this->getMess())?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= count($this->getMess())?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= count($this->getMess())?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= count($this->getMess())?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= count($this->getMess())?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= count($this->getMess())?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= count($this->getMess())?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= count($this->getMess())?></h6>
                Messages non lu
            </div>
        </div>
    </section>

<!-- scripts start -->
<script src="<?= S_ASSETS?>js/jquery.min.js"></script>
<script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
<script src="<?= S_ASSETS?>js/panel.js"></script>
<script src="<?= S_ASSETS?>js/Index.js"></script>
<script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->
</body>
