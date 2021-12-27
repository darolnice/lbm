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
                <input data-show="reclam_list_div" type="button" id="rec_list" class="pr" value="Reclamations">
                <input data-show="transac_list_div" type="button" id="trn_list" class="pr" value="Transactions">
                <input data-show="ship_list_div" type="button" id="shp_list" class="pr" value="Shipping">
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
                AD <b class="float-right">&blacktriangledown;</b></button>
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

                <?php if($this->getNotif() > 0): ?>
                    <div class="notCont"><?= $this->getNotif()?></div>
                <?php endif;?>

                <?php if($this->getMess() > 0): ?>
                    <div class="notCont_mess"><?= $this->getMess()?></div>
                <?php endif;?>

                <div class="row notifdiv__">
                    <h6 class="text-primary">Notifications</h6>
                </div>

                <div class="row notifmess">
                    <h6 class="text-primary">Messages</h6>
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
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/badge_black_24dp.svg" alt="bag image">
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
                                    <a class="ppname"><?= $this->getCurrentSuData()->profil_image?></a>
                                </h6>
                                <form class="su_pp_form" id="sett_mt_item" method="post" enctype="multipart/form-data">
                                    <input class="sett_pp_inSub"
                                           id="_supp_" type="file"
                                           name="in_mt_nm" required
                                           data-crr="<?= $this->getCurrentSuData()->profil_image?>">
                                    <input class="sett_inSub_" id="supp_pass" type="password" placeholder="Enter password" name="_pwr" required>
                                    <input class="sett_pp_i_Sub" id="su_pp_btn" name="in_sbmt_mt" type="submit" value="SAVE">
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

                                <?php if ($_SESSION['cart']):?>
                                    <?php foreach ($_SESSION['cart'] as $k => $v):?>
                                        <?php foreach ($v as $k_ => $v_): ?>
                                            <div class="item___">
                                                <a class="_i1"><?= json_decode($v_)->prod_name?></a>
                                                <a class="_i2"><?= json_decode($v_)->quantity?></a>
                                                <a class="_i3"><?= (json_decode($v_)->price * json_decode($v_)->quantity). json_decode($v_)->currency?></a>
                                            </div>
                                        <?php endforeach;?>
                                    <?php endforeach;?>
                                <?php endif;?>

                                <div class="items___">
                                    <b class="i1">SUBTOTAL</b>
                                    <b class="i2"></b>
                                    <?php if ($_SESSION['somme']):?>
                                        <b class="i3"><?= array_sum($_SESSION["somme"]).' US$'?></b>
                                    <?php endif;?>
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
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/warning_black_24dp.svg" alt="bag image">
                                    <a>Reclamations</a>
                                </h6>
                                <div class="reclam_list_div">
                                    <ul>
                                        <?php if (count($this->getReclamation()) !== 0): ?>
                                            <?php for ($n=0; $n<count($this->getReclamation()); $n++):?>
                                                <li>
                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Product Name">Product Name :</b>
                                                        <?= $this->getReclamation()[$n]['prod_name']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Store name">Store name :</b>
                                                        <?= Functions::SNFormatFront($this->getReclamation()[$n]['business_name'])?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Reclamation id">Reclamation Id :</b>
                                                        <?= $this->getReclamation()[$n]['rec_id']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Transaction id">Transaction Id :</b>
                                                        <?= $this->getReclamation()[$n]['transaction_id']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Your reason">Reason :</b>
                                                        <?= $this->getReclamation()[$n]['reason']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Product Quantity">Product Quantity :</b>
                                                        <?= $this->getReclamation()[$n]['quantity']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Issu">Issu :</b>
                                                        <?= $this->getReclamation()[$n]['issu']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="add date">Add at :</b>
                                                        <?= $this->getReclamation()[$n]['add_at']?>
                                                    </p>

                                                </li>
                                            <?php endfor;?>
                                        <?php endif;?>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr class="__tb_trs">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/swap_horiz_black_24dp.svg" alt="bag image">
                                    <a>Transactions</a>
                                </h6>
                                <div class="transac_list_div">
                                    <ul>
                                        <?php if (count($this->getTransactions()) !== 0): ?>
                                            <?php for ($h=0; $h<count($this->getTransactions()); $h++):?>
                                                <li>
                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Transaction id">Transaction Id :</b>
                                                        <?= $this->getTransactions()[$h]['transaction_id']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Transaction Type">Transaction Type :</b>
                                                        <?= $this->getTransactions()[$h]['t_type']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Store name">Store name :</b>
                                                        <?= Functions::SNFormatFront($this->getTransactions()[$h]['shop_name'])?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Issu">Transactions Info :</b>
                                                        <?php foreach (json_decode($this->getTransactions()[$h]['transaction_info'], true) as $item): ?>
                                                            <?php foreach ($item as $value => $v): ?>
                                                                <br><br><n style="font-family: 'Candara',serif;"><?= $value .' : '. $v?></n>
                                                            <?php endforeach;?>
                                                        <?php endforeach;?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="add date">Transaction Date :</b>
                                                        <?= $this->getTransactions()[$h]['transaction_date']?>
                                                    </p>

                                                </li>
                                            <?php endfor;?>
                                        <?php endif;?>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr class="__tb_shpp">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/local_shipping_black_24dp.svg" alt="bag image">
                                    <a>Shipping</a>
                                </h6>
                                <div class="ship_list_div">
                                    <ul>
                                        <?php if (count($this->getShipping()) !== 0): ?>
                                            <?php for ($e=0; $e<count($this->getShipping()); $e++):?>
                                                <li>
                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Store name">Store name :</b>
                                                        <?= Functions::SNFormatFront($this->getShipping()[$e]['from_'])?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="State">State :</b>
                                                        <?= $this->getShipping()[$e]['state']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Transaction id">Transaction Id :</b>
                                                        <?= $this->getShipping()[$e]['transaction_id']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Qualification">Qualification :</b>
                                                        <?= $this->getShipping()[$e]['prod_nature']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Shipping Type">Type :</b>
                                                        <?= $this->getShipping()[$e]['type']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Shipping Agence">Shipping Agence :</b>
                                                        <?= $this->getShipping()[$e]['agent']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Store Adress">Store Adress :</b>
                                                        <?= $this->getShipping()[$e]['shop_adress']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Store Phone Number">Store Phone Number :</b>
                                                        <?= $this->getShipping()[$e]['shop_phone']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Delivery Adress">Delivery Adress :</b>
                                                        <?= $this->getShipping()[$e]['client_adress']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Distance">Distance :</b>
                                                        <?= $this->getShipping()[$e]['distance']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Duration Estimation">Duration Estimation :</b>
                                                        <?= $this->getShipping()[$e]['duration_estimation']?>
                                                    </p>

                                                    <p class="small">
                                                        <b class="font-weight-bold" title="Register at">Register at :</b>
                                                        <?= $this->getShipping()[$e]['add_at']?>
                                                    </p>
                                                </li>
                                            <?php endfor;?>
                                        <?php endif;?>
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
                <p>Ad</p>
                <table class="table-hover jumbotron" id="tble">
                    <tbody class="panel-body" id="tbod">
                        <tr class="__tb_sn">
                            <td>
                                <h6>
                                    <img class="ict" src="<?= S_ASSETS?>images/svg/room_black_24dp.svg" alt="bag image">
                                    <a>Ad List</a>
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
                                                <b class="small">Responses</b><br>
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
                                    <a>New Ad</a>
                                </h6>

                                <div class="p_form-add_ann">
                                    <form id="panel_add_a" method="post">
                                        <select id="p_p_qly" type="text" name="p_p_qly">
                                            <option value="New">New</option>
                                            <option value="Occasion">Occasion</option>
                                            <option value="Occasion or New">Occasion or New</option>
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
                <h6 class="text-primary"><?php ($this->getMess() !== '0') ? print $this->getMess() : print '00' ?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?php (isset($_SESSION['cart'])) ? print count($_SESSION['cart']) : print '00'?></h6>
                Products In Cart
            </div>
            <div class="">
                <h6 class="text-primary"><?php (count($this->getShipping()) !== 0) ? print count($this->getShipping()) : print '00'?></h6>
                Shipping Standbay
            </div>
            <div class="">
                <h6 class="text-primary"><?= 'Reserv'?></h6>
                Reservations
            </div>
            <div class="">
                <h6 class="text-primary"><?php (count($this->getReclamation()) !== 0) ? print count($this->getReclamation()) : print '00' ?></h6>
                Reclamations
            </div>
            <div class="">
                <h6 class="text-primary"><?php (count($this->getAnnonceD()) !== 0) ? print count($this->getAnnonceD()) : print '00'?></h6>
                Annonces
            </div>
            <div class="">
                <h6 class="text-primary"><?php (count($this->getTransactions()) !== 0) ? print count($this->getTransactions()) : print '00'?></h6>
                Transactions
            </div>
            <div class="">
                <h6 class="text-primary"><?= $this->getMess()?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= $this->getMess()?></h6>
                Messages non lu
            </div>
            <div class="">
                <h6 class="text-primary"><?= $this->getMess()?></h6>
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
