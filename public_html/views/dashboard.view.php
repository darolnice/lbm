<?php
//    use Lbm\Functions\Functions;
//    use Lmb\MgrProducts\MgrProducts;
    $title = ' '.$_SESSION['username'];
?>
<?php include_once('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/dashboard.css">

<body>
    <div class="container-fluid">
        <div class="short__by">
            <h5 class="mt-3 mb-3 small">
                <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/dashboard_black_24dp.svg" alt="user image">
                <?= Functions::SNFormatFront($_SESSION['shop_name'])?> DASHBOARD</h5>
            <b class="nam smal"><?= $this->getSallerData()[0]['username'];?></b>

            <div id="d0" class="mt-3 mb-3"><p>
                    <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/manage_accounts_black_24dp.svg" alt="user image">
                    PROFIL <b class="float-right mr-1">&blacktriangledown;</b></p>
                <button id="btn__edit" data-view="sett__profil">Edit Profil</button>
            </div>

            <div id="d1" class="mb-3">
                <p>
                    <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/settings_black_24dp.svg" alt="user image">
                    SETTING <b class="float-right mr-1">&blacktriangledown;</b></p>
                <button data-view="allUsers">Manage Users</button>
                <button data-view="n_user">Add Manager</button>
                <button data-view="setting">Shop Setting</button>
            </div>
            <div id="d2" class="mb-1">
                <p>
                    <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/product-hunt-brands.svg" alt="user image">
                    PRODUCTS <b class="float-right mr-1">&blacktriangledown;</b></p>
                <button data-view="new__prod">Add Product</button>
                <button data-view="mgr_cat">Manage Category</button>
                <button data-view="n_sub_cat">Add Tags</button>
                <?php if($_SESSION['shop_name'] !== 'lbm'): ?>
                    <button data-view="__chk_prod">Sent Check Request</button>
                <?php endif;?>
            </div>

            <div id="d14" class="mb-2 mt-4"><p>
                    <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/attach_money_black_24dp.svg" alt="user image">
                    DISCOUNT <b class="float-right mr-1">&blacktriangledown;</b></p>
                <button data-view="discountList">Show All</button>
                <button data-view="newDiscount">Create</button>
            </div>

            <?php if ($_SESSION['shop_name'] === "lbm"): ?>
                <div id="d9" class="mb-2">
                    <p>
                        <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/people_outline_black_24dp.svg" alt="user image">
                        ALL CUSTUMERS <b class="float-right mr-1">&blacktriangledown;</b></p>
                    <button data-view="custumer_l">Manage</button>
                </div>

                <div id="d11" class="mb-2">
                    <p>
                        <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/turned_in_white_24dp.svg" alt="user image">
                        PROMO <b class="float-right mr-1">&blacktriangledown;</b></p>
                    <button data-view="all_promo">On Line</button>
                    <button data-view="">Standby</button>
                    <button data-view="">Working</button>
                    <button data-view="">Allow</button>
                    <button data-view="promo_candidate">View all</button>
                </div>

                <div id="d12" class="mb-2">
                    <p>
                        <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/verified_user_black_24dp.svg" alt="user image">
                        CHECK PRODUCT <b class="float-right mr-1">&blacktriangledown;</b></p>
                    <button data-view="">Manage</button>
                </div>

                <div id="d6" class="mb-2">
                    <p>
                        <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/map_black_24dp.svg" alt="user image">
                        PLANS <b class="float-right mr-1">&blacktriangledown;</b></p>
                    <button data-view="plan_-">Manage</button>
                </div>

                <div id="d7" class="mb-2">
                    <p>
                        <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/image_black_24dp.svg" alt="user image">
                        BANNERS <b class="float-right mr-1">&blacktriangledown;</b></p>
                    <button data-view="">Manage</button>
                </div>

                <div id="d8" class="mb-2">
                    <p>
                        <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/help_black_24dp.svg" alt="user image">
                        FAQ <b class="float-right mr-1">&blacktriangledown;</b></p>
                    <button data-view="faqq">Manage Faq</button>
                </div>
            <?php endif;?>

            <div id="d5" class="mb-2">
                <p>
                    <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/leaderboard_black_24dp.svg" alt="user image">
                    STATISTIQUES <b class="float-right mr-1">&blacktriangledown;</b></p>
                <button data-view="__stat_view">View All</button>
            </div>

            <?php if ($_SESSION['shop_name'] !== "lbm"): ?>
                <div id="d4" class="mb-4 mt-4"><p>
                        <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/confirmation_number_black_24dp.svg" alt="user image">
                        SPONSORING <b class="float-right mr-1">&blacktriangledown;</b></p>
                    <button data-view="__promo_candidate">Show All</button>
                    <button data-view="addinpromo">Add Product</button>
                </div>

                <div id="d15" class="mb-2">
                    <p>
                        <img class="mt-3 i_size" id="notif__" src="<?= S_ASSETS?>images/svg/support_agent_black_24dp.svg" alt="user image">
                        CALL CENTER <b class="float-right mr-1">&blacktriangledown;</b></p>
                    <button data-view="lcal">Local Call</button>
                    <button class="___call d-none" id="#tel 694253565"></button>
                    <button data-view="wcal">Whatsapp Call</button>
                </div>
            <?php endif;?>

        </div>

        <section class="row pt-5">
            <div class="add">
                <div class="search">
                    <img class="bck___hm" id="bck__hm" src="<?= S_ASSETS?>images/svg/arrow.png" alt="back to home">

                    <form class="sch__form form-group" method="get">
                        <label>
                            <input class="srch__ form-control" type="search" name="Search" placeholder="SEARCH" autocomplete="on">
                        </label>
                    </form>
                </div>

                <div class="notif_messa">
                    <img class="mt-3 mr-1" id="messa__" src="<?= S_ASSETS?>images/svg/email_black_24dp.svg" alt="user image">

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

                    <img class="mt-3" id="notif_" src="<?= S_ASSETS?>images/svg/notifications_active_black_24dp.svg" alt="user image">
                </div>

                <div class="admin_pers">
                    <img class="admin_imag" id="admin_persn" src="<?= Functions::setpp()?>" alt="user image">
                    <div class="admin_stat_point" id="<?= Functions::online();?>"></div>

                    <div class="admin_dropdown-content" id="admin_myDropdown" style="display: none">
                        <a id="admin_u_sett" href="dashboard">
                            <img class="_i_size" src="<?= S_ASSETS?>images/svg/dashboard_black.svg" alt="user image">
                            Dashboard
                        </a>
                        <a id="admin_lgt" href="setting">
                            <img class="_i_size" src="<?= S_ASSETS?>images/svg/settings_black.svg" alt="user image">
                            Setting
                        </a>
                        <a id="admin_lgt" href="logout">
                            <img class="_i_size" src="<?= S_ASSETS?>images/svg/refresh_black_24dp.svg" alt="user image">
                            Log out
                        </a>
                    </div>
                </div>

                <div id="__srch"></div>
            </div>
            <div class="ctnr_analytics__">
                <div class="ctnr">
                    <div class="edit__prod" id="c_style" style="display: none">
                        <button class="close" id="clse">&times;</button>

                        <div class="stt">
                            <b class="stat">1</b>
                        </div>

                        <h6 id="ed_prod_name"></h6>

                        <div class="edit__formm">
                            <form method="post" name="ed_prod_from" enctype="multipart/form-data">
                                <label for="ed__cat" class="ed__cat_lab"></label>
                                <select id="ed__cat" name="ed__cat_">
                                    <option value="Mode">Mode</option>
                                    <option value="Automobile">Automobile</option>
                                    <option value="Electronic">Electronic</option>
                                    <option value="Health">Health</option>
                                    <option value="Accessories">Accessories</option>
                                </select>

                                <label for="ed__cat" class="ed__sub_lab"></label>
                                <select id="ed__cat" class="ed_sub_cat" name="ed_sub_cat" >
                                    <option value="Mobil">Mobil</option>
                                    <option value="Car">Car</option>
                                    <option value="Phone">Phone</option>
                                    <option value="Art">Art</option>
                                    <option value="Blazer">Blazer</option>
                                </select>

                                <label for="ed__cat" class="ed__sub_lab"></label>
                                <select id="ed__cat" class="ed_qly" name="ed_qly" >
                                    <option value="Occasion">Occasion</option>
                                    <option value="New">New</option>
                                </select>

                                <label for="ed__name"></label>
                                <input id="ed__name" type="text" name="ed__name"
                                       placeholder="Enter name">

                                <label for="ed__price"></label>
                                <input id="ed__price" type="text" name="ed__price_"
                                       placeholder="Enter price">

                                <label for="ed__price"></label>
                                <input id="ed__price" class="ed__prom_pr" type="text" name="ed__prom_pr"
                                       placeholder="Enter promo price">

                                <label for="ed__desc1"></label>
                                <textarea id="ed__desc1" name="ed__desc1"
                                          rows="10" maxlength="250"
                                          placeholder="Long description (250 words max)"></textarea>

                                <label for="nw__prop"></label>
                                <textarea id="nw__prop" name="ed__prop" rows="4"
                                          placeholder="Enter proprities (160 words max)"></textarea>


                                <label for="nw__Color"></label>
                                <input id="nw__Color" type="text"
                                       name="ed__Color" placeholder="Enter color(s) separate with coma"
                                       value="">

                                <label for="nw__Size"></label>
                                <input id="nw__Size" type="text"
                                       name="ed__Size" placeholder="Enter size(s) separate with coma"
                                       value="">

                                <label for="nw__stock"></label>
                                <input id="nw__stock" type="number"
                                       name="ed__stock" placeholder="Enter stock"
                                       value="">

                                <label for="ed___im"></label>
                                <input id="ed___im" type="file" name="ed__im1" class="edim1" data-old="">

                                <label for="ed___im"></label>
                                <input id="ed___im" type="file" name="ed__im2" class="edim2" data-old="">

                                <label for="ed___im"></label>
                                <input id="ed___im" type="file" name="ed__im3" class="edim3" data-old="">

                                <label for="ed___im"></label>
                                <input id="ed___im" type="file" name="ed__im4" class="edim4" data-old="">

                                <label for="ed___im"></label>
                                <input id="ed___im" type="file" name="ed__im5" class="edim5" data-old="">

                                <input type="hidden" name="c_ProdId" value="">
                                <input class="ed__sbmt" type="submit" name="ed__sbmt_btn" value="UPDATE">
                            </form>
                        </div>
                    </div>

                    <div class="n_user" id="c_style" style="display: none">
                        <button class="close" id="clse">&times;</button>

                        <form method="post" class="form-group">
                            <h6 class="mt-5 mb-1">NEW USER</h6>

                            <img src="<?= S_ASSETS?>images/svg/person_black_24dp.svg" alt="">
                            <buttun class="n_btn btn btn-sm btn-primary">Upload Image</buttun>
                            <input class="n__up_btn" type="file" id="n__img" name="n__name" placeholder="Name">

                            <label for="typ" class="text-sm-left"></label>
                            <select name="typ__admin" id="typ">
                                <option value="Full">Full right</option>
                                <option value="Limited">Limited right</option>
                            </select>

                            <label for="n__name"></label>
                            <input type="text" id="n__name" name="n__name" placeholder="Name" required>

                            <label for="n__mail"></label>
                            <input type="email" id="n__mail" name="n__mail" placeholder="Email" required>

                            <label for="n__phone"></label>
                            <input type="number" id="n__phone" name="n__phone" placeholder="Phone number" required>

                            <label for="n__passw"></label>
                            <input type="password" id="n__passw" name="n__passw" placeholder="Password (min 8 characters)" required>

                            <label for="n__passw_c"></label>
                            <input type="password" id="n__passw_c" name="n__passw_c" placeholder="Password confirm" required>

                            <input type="submit" name="n__submit" class="n__admin_" value="CREATE" id="n__submit">
                        </form>
                    </div>

                    <div class="sett__profil" id="c_style" style="display: none">
                        <button class="close" id="clse">&times;</button>

                        <img style="cursor: pointer" class="bck" src="<?= S_ASSETS?>images/svg/arrow.png" alt="bag image">

                        <p class="titll">UPDATE</p>

                        <div class="titll__p" style="display: block">
                            <p data-view="image">Change your profil picture</p>
                            <p data-view="name__">Change your name</p>
                            <p data-view="mail__">Change your E-mail</p>
                            <p data-view="city__">Change your city</p>
                            <p data-view="phn__">Change your phone number</p>
                            <p data-view="passw__">Change your password</p>
                        </div>

                        <div class="pers_info">
                            <div class="image" style="display: none">
                                <form class="form-group" method="post" id="ad_img">
                                    <div class="im--upload">
                                        <img src="<?= Functions::setpp()?>" alt="profil image">
                                    </div>

                                    <input id="inpFile" class="upload__img__ipt"
                                           type="file" name="upload__img"
                                           value="<?= $this->getSallerData()[0]['profil_image'];?>"
                                           required>

                                    <label for="up_img_auth"></label>
                                    <input class="text-center field___ipt" id="up_img_auth"
                                           type="number" name="up___img" placeholder="Enter authentification code"
                                           required value="00000">

                                    <input class="___ipt" id="busiUpImgBtn" type="submit" name="sbt" value="UPDATE">
                                </form>
                            </div>
                            <div class="name__" style="display: none">
                                <form method="post">
                                    <label for="up__name"></label>
                                    <input class="field___ipt" id="up__name" type="text" name="up__name"
                                           placeholder="ENTER NAME" required value="<?= $this->getSallerData()[0]['username'];?>">

                                    <label for="up__name_auth"></label>
                                    <input class="text-center field___ipt" id="up__name_auth" type="text" name="up__name_auth"
                                           placeholder="Enter Authentification code" required="required">

                                    <input class="___ipt" id="adm_name_sbt" type="submit" name="n__sbt" value="UPDATE">
                                </form>
                            </div>
                            <div class="mail__" style="display: none">
                                <form method="post">
                                    <label for="up___mail"></label>
                                    <input class="field___ipt" id="up___mail" type="text" name="up___mail"
                                           placeholder="ENTER E-MAIL" required="required" value="<?= $this->getSallerData()[0]['email'];?>">

                                    <label for="up__mail_auth"></label>
                                    <input class="text-center field___ipt" id="up__mail_auth" type="text" name="up__mail_auth"
                                           placeholder="Enter Authentification code" required="required">

                                    <input class="___ipt" id="adm_mail_sbt" type="submit" name="m__sbt" value="UPDATE">
                                </form>
                            </div>
                            <div class="city__" style="display: none">
                                <form method="post">
                                    <label for="up___city"></label>
                                    <input class="field___ipt" id="up___city" type="text" name="up___city"
                                           placeholder="ENTER CITY" required="required" value="<?= $this->getSallerData()[0]['city'];?>">

                                    <label for="up__city_auth"></label>
                                    <input class="text-center field___ipt" id="up__city_auth" type="text" name="up__city_auth"
                                           placeholder="Enter Authentification code" required="required">

                                    <input class="___ipt" id="adm_city_sbt" type="submit" name="m__sbt" value="UPDATE">
                                </form>
                            </div>
                            <div class="phn__" style="display: none">
                                <form method="post">
                                    <label for="up__ph"></label>
                                    <input class="field___ipt" id="up__ph" type="number" name="up__ph"
                                           placeholder="ENTER PHONE NUMBER" required
                                           value="<?= $this->getSallerData()[0]['phone_number'];?>">

                                    <label for="up_ph_auth"></label>
                                    <input class="text-center field___ipt" id="up_ph_auth" type="number" name="up___mail"
                                           placeholder="Enter authentification code" required>

                                    <input class="___ipt" id="adm_ph_sbt" type="submit" name="ph__sbt" value="UPDATE">
                                </form>
                            </div>
                            <div class="passw__" style="display: none">
                                <form method="post">
                                    <label for="up__pw"></label>
                                    <input class="field___ipt" id="up__pw" type="password" name="up__pw" placeholder="OLD PASSWORD" required>

                                    <label for="up__pw__nw"></label>
                                    <input class="field___ipt" id="up__pw__nw" type="password" name="up__pw__nw" placeholder="NEW PASSWORD" required>

                                    <label for="up__pw_c"></label>
                                    <input class="field___ipt" id="up__pw_c" type="password" name="up__pw_c" placeholder="PASSWORD CONFIRM" required>

                                    <input class="___ipt" type="submit" name="p__sbt" value="UPDATE">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="newDiscount" style="display: none">
                        <div class="Discount_options">
                            <p>
                                <strong>AVERTISSEMENT</strong><br><br>
                                Pensez à activer le coupon avant ça distribution. <br>
                                <strong>Notez Bien:</strong> Il ne pourra être actif que dans l'interval de temps précisé
                                à ça création, passé ce délai il sera automatiquement désactivé. <br><br>

                                Les coupons de reductions ne peuvent être annulés ou supprimés
                                une fois que celui ci est en exploitation par un client.
                                Pour plus d'informations veuilllez lire notre <a href="#">contrat d'utilisation </a>et notre
                                <a href="#">politique de confidentialité</a>.
                            </p>
                        </div>

                        <div class="discount_form">
                            <form id="disc_id" method="POST" name="newDis">
                                <label for="dateD">Start Date</label>
                                <input id="dateD" type="date" name="dateD" required>


                                <label for="dateF">End Date</label>
                                <input id="dateF" type="date" name="dateF" required>

                                <input type="text" name="discountC" placeholder="Enter Discount Code (10 Characters max)" maxlength="10" required>
                                <input type="number" name="discountA" placeholder="Enter Discount Value (US$)" id="discountA" autocomplete="off" required>
                                <input type="password" name="Dpasse" placeholder="Enter your password" id="Dpasse" required>

                                <div class="Dbtn">
                                    <button class="mr-1" style="background-color: crimson" value="btn" id="Dcancel">Cancel</button>
                                    <button id="Dsbt" value="btn" type="submit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="discountList" style="display: none">
                        <?php if (count($this->getTabl()) > 0): ?>
                            <strong style="font-size: 11px;">DISCOUNT REGISTER LIST</strong><br><br>
                            <?php for($h=0; $h<count($this->getTabl()); $h++): ?>
                                <div class="row-cols-md-3 discount_">
                                <div class="datesList">
                                    <p><strong>START :</strong> <b><?= $this->getTabl()[$h]['start']?></b></p>
                                    <p><strong>END :</strong> <b><?= $this->getTabl()[$h]['end']?></b></p>
                                </div>

                                <div class="AmountDiscList">
                                    <p><strong>AMOUNT :</strong> <b><?= $this->getTabl()[$h]['amount']?></b></p>
                                    <p><strong>STATE :</strong> <b><?= $this->getTabl()[$h]['state']?></b></p>
                                </div>

                                <div class="AmountDiscBtn">
                                    <button class="mr-4 Disc_activ" style="color: green;" data-id="<?= $this->getTabl()[$h]['id']?>">
                                        ACTIVE
                                    </button>
                                    <button class="mr-3 ml-3 Disc_activ" style="color: gray" data-id="<?= $this->getTabl()[$h]['id']?>">
                                        DESABLED
                                    </button>
                                    <button class="mr-5 Disc_Edit" data-id="<?= $this->getTabl()[$h]['id']?>"
                                            style="color: blue; margin-left: 1px;">
                                        EDIT
                                    </button>
                                    <button class="Disc_rem ml-md-1" style="color: crimson" data-id="<?= $this->getTabl()[$h]['id']?>">
                                        DELETE
                                    </button>
                                </div>
                            </div>
                            <?php endfor;?>
                        <?php else:?>
                            <strong style="font-size: 11px;">NO DISCOUNT REGISTER</strong><br><br>
                        <?php endif;?>
                    </div>

                    <?php if (!empty($this->getSubAdminData())): ?>
                        <div class="allUsers" id="c_style" style="display: none">
                            <button class="close" id="clse">&times;</button>
                                <?php for ($m=0; $m<count($this->getSubAdminData()); $m++): ?>
                                    <div class="sigl__user">
                                        <div class="other__user__img">
                                            <img src="<?= S_ASSETS?>images/svg/person_black_24dp.svg" alt="profil image">
                                        </div>
                                        <div class="centr">
                                            <p id="sa_name"><?= $this->getSubAdminData()[$m]['name'];?></p>
                                            <p id="sa_mail"><?= $this->getSubAdminData()[$m]['email'];?></p>
                                            <p class="<?= $this->getSubAdminData()[$m]['name'];?>" id="sa_right"><?= $this->getSubAdminData()[$m]['right_'];?></p>
                                        </div>
                                        <div class="bt__n">
                                            <buttun class="setRight"
                                                    data-name="<?= $this->getSubAdminData()[$m]['name'];?>"
                                                    data-type="<?= $this->getSubAdminData()[$m]['right_'];?>"
                                                    data-uid="<?= $this->getSubAdminData()[$m]['id'];?>">SET RIGHT</buttun>
                                            <buttun class="adm_delsub"
                                                    data-name="<?= $this->getSubAdminData()[$m]['name'];?>"
                                                    data-uid="<?= $this->getSubAdminData()[$m]['id'];?>">DELETE</buttun>
                                        </div>
                                    </div>
                                <?php endfor;?>
                        </div>
                    <?php else:?>
                        <div class="allUsers" id="c_style" style="display: none; background-color: #c69500!important;">
                            <button class="close" id="clse">&times;</button>
                            <h3 class="text-white">No user save</h3>
                        </div>
                    <?php endif;?>

                    <div class="new__prod" id="c_style" style="display: none">
                        <button class="close" id="clse">&times;</button>

                        <div class="stt">
                            <b class="nw__stat">1</b>
                        </div>

                        <h6>New Product</h6>

                        <div class="new__formm">
                            <form class="add_prd_form" method="post" name="add_new_prod_from" id="add_new_prod">
                                <label for="nw__cat" class="nw__cat_lab"></label>
                                <select id="nw__cat" name="nw__cat" required>
                                    <option value="">CATEGORIES</option>
                                    <option value="Electronic">Electronic</option>
                                    <option value="Mode">Mode</option>
                                    <option value="Automobile">Automobile</option>
                                    <option value="Health">Health</option>
                                </select>

                                <label for="nw__sub_cat" class="nw__cat_lab"></label>
                                <select id="nw__sub_cat" class="new_subCat" name="nw__sub_cat">
                                    <option value="">SUB CATEGORIES</option>
                                    <option value="Mobil">Mobil</option>
                                    <option value="Car">Car</option>
                                    <option value="Accessories">Accessories</option>
                                </select>

                                <label for="nw__sub_cat" class="nw__cat_lab"></label>
                                <select id="nw__sub_cat" class="nw__qly" name="nw__qly" required>
                                    <option value="Occasion">Occasion</option>
                                    <option value="New">New</option>
                                </select>

                                <label for="nw__name"></label>
                                <input id="nw__name" type="text" name="nw__name" value="" placeholder="Enter name" required>

                                <label for="nw__price"></label>
                                <input id="nw__price" type="text" name="nw__price" value="" placeholder="Enter price" required>

                                <label for="nw__price"></label>
                                <input id="nw__price" type="text" class="nw__promo_price" name="nw__promo_price" value="" placeholder="Enter promo price">


                                <label for="nw__desc"></label>
                                <textarea id="nw__desc" name="nw__desc" rows="10"
                                          placeholder="Description (300 words max)" maxlength="300" required></textarea>

                                <label for="nw__prop"></label>
                                <textarea id="nw__prop" class="new__prop" name="nw__prop" rows="4"
                                          placeholder="Enter proprities (60 words max)" maxlength="60"></textarea>

                                <label for="nw__Color"></label>
                                <input id="nw__Color" class="nw__clr" type="text" name="nw__Color"  placeholder="Enter color(s) separate with coma" required>

                                <label for="nw__Size"></label>
                                <input id="nw__Size" class="nw__sze" type="text" name="nw__Size" placeholder="Enter size(s) separate with coma">

                                <label for="nw__stock"></label>
                                <input id="nw__stock" class="new_qte" type="number" name="nw__stock" placeholder="Enter stock" >

                                <label for="nw__im"></label>
                                <input id="nw__im" type="file" name="nw__im1" value="">

                                <label for="nw__im"></label>
                                <input id="nw__im" type="file" name="nw__im2" value="">

                                <label for="nw__im"></label>
                                <input id="nw__im" type="file" name="nw__im3" value="">

                                <label for="nw__im"></label>
                                <input id="nw__im" type="file" name="nw__im4" value="">

                                <label for="nw__im"></label>
                                <input id="nw__im" type="file" name="nw__im5" value="">

                                <input class="nw__sbmt" type="submit" name="nw__sbmt" value="ADD">
                            </form>
                        </div>
                    </div>

                    <?php $tab = explode(',', $this->saller_data[0]['business_categories']);?>
                    <?php if (count($tab) > 0): ?>
                        <div class="n_sub_cat" id="c_style" style="display: none">
                        <button class="close" id="clse">&times;</button>
                        <h6 class="small text-center ml-0 mb-3 mt-5">ADD TAG</h6>

                        <div class="cat__list">
                                <?php for ($g=0; $g<count($tab); $g++): ?>
                                    <div class= "cat_item_">
                                        <b class="font-weight-lighter"><?= $tab[$g]?></b>
                                        <form method="post">
                                            <input id="ipt_new_sbc" type="text" name="sub" placeholder="Enter sub categorie(s) separate with coma">
                                            <button id="new_sub_cat" class="btn btn-primary btn-sm" type="submit">ENTER</button>
                                        </form>
                                    </div>
                                <?php endfor;?>
                        </div>
                    </div>
                    <?php endif;?>

                    <?php if (count($tab) > 0): ?>
                        <div class="mgr_cat" id="c_style" style="display: none">
                            <button class="close" id="clse">&times;</button>
                            <h6 class="small text-center ml-0 mb-3 mt-5">MANAGE CATEGORIES</h6>
                            <buttun class="btn btn-primary btn-sm small mb-3" id="s_Add_cat" style="font-size: 10px;">ADD NEW CATEGORY</buttun>
                            <form action="Dashboard" method="post" id="addCatForm" hidden>
                                <input type="text" name="newCat" id="ncat_ipt" class="form-control" placeholder="Enter Category">
                                <button type="submit"
                                        id="ncat"
                                        class="btn btn-primary btn-sm small w-50 mt-3 mb-3"
                                        style="font-size: 12px;">SUBMIT</button>
                            </form>
                            <div class="cat__list_">
                                <?php for ($m=0; $m<count($tab); $m++): ?>
                                    <div class= "cat_item_">
                                        <b class="font-weight-lighter"><?= $tab[$m]?></b>

                                        <img src="<?= S_ASSETS ?>images/svg/edit.png" alt="edit button">
                                        <form method="post">
                                            <input id="edit_cat" type="text" name="sub" placeholder="Enter new name here">
                                            <button id="mgr__cat_btn"
                                                    data-item=" <?= $tab[$m]?>"
                                                    class="btn-sm"
                                                    type="submit">DELETE
                                            </button>
                                        </form>
                                    </div>
                                <?php endfor;?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($_SESSION['shop_name'] === 'lbm'): ?>
                        <div class="all_promo" id="c_style" style="display: none">
                            <button class="close" id="clse">&times;</button>

                            <h6 class="small text-center ml-0 mb-3 mt-4">ALL PROMO PRODUCT</h6>

                            <div class="promo_list__">
                                <?php for ($rs=0; $rs<count($this->getAllinpromo()); $rs++): ?>
                                    <div class= "prom_item_">
                                        <b class="font-weight-lighter ppn"><?= $this->getAllinpromo()[$rs]['prod_name']?></b>
                                        <b class="font-weight-lighter pps"><?= $this->getAllinpromo()[$rs]['shop_name']?></b>

                                        <a id="mgr__prom_btn"
                                           data-pid="<?= $this->getAllinpromo()[$rs]['id']?>"
                                           data-pn="<?= $this->getAllinpromo()[$rs]['prod_name']?>"
                                           data-sn="<?= $this->getAllinpromo()[$rs]['shop_name']?>"
                                           data-cat="<?= $this->getAllinpromo()[$rs]['category']?>"
                                           data-rtng="<?= $this->getAllinpromo()[$rs]['rating']?>"
                                           data-rtr="<?= $this->getAllinpromo()[$rs]['rater']?>"
                                           data-chck="<?= $this->getAllinpromo()[$rs]['checked']?>"
                                           data-addt="<?= $this->getAllinpromo()[$rs]['add_at']?>">
                                            &vellip;</a>
                                    </div>
                                <?php endfor;?>
                            </div>
                        </div>

                        <div class="promo_candidate" style="display: none">
                            <div id="d8" class="mb-1">
                                <button>Sort By</button>
                            </div>
                            <div id="prom_bt1__" class="prom_bt1 mb-4">
                                <form method="post">
                                    <button type="submit" class="ml-3" name="category" value="category" id="srt">State</button>
                                    <button type="submit" class="ml-3" name="prod_name" value="prod_name" id="srt">Delay</button>
                                    <button type="submit" class="ml-3" name="price" value="price" id="srt">Budget</button>
                                    <button type="submit" class="ml-3" name="date" value="date" id="srt">Date</button>
                                </form>
                            </div>
                            <?php for ($q=0; $q<count($this->getPromoClient()); $q++): ?>
                                <ul class="promo_c_list_ul">
                                    <li>
                                        <div class="promo_c_prd____">
                                            <div class="spn_addt">
                                                <h6 class="sp_prom__"><?= $this->getPromoClient()[$q]['shop_name'];?></h6>
                                                <h6 class="addt_prom__"><?= $this->getPromoClient()[$q]['statu'];?></h6>
                                            </div>

                                            <div class="pay_tim">
                                                <h6 class="pay_prom__"><?= $this->getPromoClient()[$q]['budget']?></h6>
                                                <h6 class="tim_prom__"><?= $this->getPromoClient()[$q]['delay']?></h6>
                                            </div>
                                        </div>

                                        <?php $tabl = json_decode($this->getPromoClient()[$q]['prod_data'], true);?>
                                        <?php foreach($tabl as $itm):?>
                                            <div class="btn_nn_prom">
                                                <form method="post" class="frm_edit">
                                                    <input type="button"
                                                           class="prom_edit"
                                                           value="View More"
                                                           id="prom_more"
                                                           data-prom_id="<?= $this->getPromoClient()[$q]['id']?>"
                                                           data-id="<?= $itm['prod_id'];?>"
                                                           data-shopname="<?= $itm['shop_name'];?>"
                                                           data-prodname="<?= $itm['prod_name'];?>"
                                                           data-addby="<?= $itm['add_by'];?>"
                                                           data-category="<?= $itm['category'];?>"
                                                           data-quality="<?= $itm['quality'];?>"
                                                           data-sub="<?= $itm['sub_category'];?>"
                                                           data-price="<?= $itm['price'];?>"
                                                           data-promo="<?= $itm['promo'];?>"
                                                           data-rating="<?= $itm['rating'];?>"
                                                           data-rater="<?= $itm['rater'];?>"
                                                           data-checked="<?= $itm['checked'];?>"
                                                           data-color="<?= $itm['color'];?>"
                                                           data-size="<?= $itm['size'];?>"
                                                           data-prop="<?= $itm['proprities'];?>"
                                                           data-quantity="<?= $itm['quantity'];?>"
                                                           data-desc="<?= $itm['description'];?>"

                                                           data-img1="<?= $itm['img1'];?>"
                                                           data-img2="<?= $itm['img2'];?>"
                                                           data-img3="<?= $itm['img3'];?>"
                                                           data-img4="<?= $itm['img4'];?>"
                                                           data-img5="<?= $itm['img5'];?>"
                                                           data-added_at="<?= $itm['add_at'];?>"

                                                           data-add_at="<?= $this->getPromoClient()[$q]['add_at'];?>"
                                                           data-py="<?= $this->getPromoClient()[$q]['budget'];?>"
                                                           data-pe="<?= $this->getPromoClient()[$q]['delay'];?>"
                                                           data-st="<?= $this->getPromoClient()[$q]['statu'];?>"
                                                    >

                                                    <input type="button"
                                                           class="prom_delete"
                                                           id="prom_delprod"
                                                           value="Delete"
                                                           data-prodName= '<?= $this->getPromoClient()[$q]['prod_name']?>'
                                                           data-id="<?= $this->getPromoClient()[$q]['id']?>"
                                                    >
                                                </form>
                                            </div>
                                        <?php endforeach;?>
                                    </li>
                                </ul>
                            <?php endfor;?>
                            <div class="rows col-sm-2 col-md-8 mrinf">
                                <button id="prom__close" class="close mrinf_close">&times;</button>
                                <div class="prom_info">
                                    <p class="text-left ml-1">About promo</p>
                                    <ul>
                                        <li>
                                               <span>
                                                   <a>Shop name :</a>
                                                   <a id="_pr_sp" style="margin-left: 1px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Add at :</a>
                                                   <a id="_pr_aa"  style="margin-left: 24px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Budget :</a>
                                                   <a id="_pr_py" style="margin-left: 20px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Delay :</a>
                                                   <a id="_pr_pe" style="margin-left: 30px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Statu :</a>
                                                   <a id="_pr_st" style="margin-left: 32px;"></a>
                                               </span>
                                        </li>

                                        <li class="hide">
                                               <h3 id="_-pid-_" style="display: none;"></h3>
                                        </li>
                                    </ul>
                                    <div class="prombtndiv">
                                        <button class="promBtnstate">Set state &blacktriangledown;</button>
                                        <button class="promBtnAdd">Add in promo</button>
                                        <form method="post">
                                            <button type="submit" name="delfromprom" class="promBtnsdel">Delete</button>
                                        </form>
                                    </div>
                                    <div class="state_opt">
                                        <p>En attente</p>
                                        <p>En cour de traitement</p>
                                        <p>En ligne</p>
                                        <p>Approuvé</p>
                                    </div>
                                </div>

                                <div class="prod_d">
                                    <p class="text-left ml-1">About product</p>
                                    <ul>
                                        <li>
                                               <span>
                                                   <a>Shop name :</a>
                                                   <a id="_pr_sp_" style="margin-left: 15px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Add by :</a>
                                                   <a id="_pr_adb" style="margin-left: 35px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Product :</a>
                                                   <a id="_pr_pn_" style="margin-left: 32px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Price :</a>
                                                   <a id="_pr_pric_" style="margin-left: 47px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Promo price :</a>
                                                   <a id="_pr_prm-" style="margin-left: 11px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Category :</a>
                                                   <a id="_pr_cat-" style="margin-left: 26px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Sub categories :</a>
                                                   <a id="_pr_subcat-" style="margin-left: -1px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Quality :</a>
                                                   <a id="_pr_qly-" style="margin-left: 36px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Quantity :</a>
                                                   <a id="_pr_qty-" style="margin-left: 29px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Proprities :</a>
                                                   <a id="_pr_prp-" style="margin-left: 24px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Color :</a>
                                                   <a id="_pr_clr-" style="margin-left: 44px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Size :</a>
                                                   <a id="_pr_sze-" style="margin-left: 51px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Rating :</a>
                                                   <a id="_pr_rtg-" style="margin-left: 39px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Rater :</a>
                                                   <a id="_pr_rtr-" style="margin-left: 45px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Checked :</a>
                                                   <a id="_pr_chk-" style="margin-left: 29px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Description :</a>
                                                   <a id="_pr_dsc-" style="margin-left: 15px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Add at :</a>
                                                   <a id="_pr_adt-" style="margin-left: 38px;"></a>
                                               </span>
                                        </li>
                                    </ul>

                                    <div class="prod_img__prom">
                                        <div class="f_img">
                                            <img class="cndprom_img1" src="" alt="first product image">
                                        </div>
                                        <div class="rows row-cols-sm-3 other__img">
                                            <img class="cndprom_img2" src="" alt="second product image">
                                            <img class="cndprom_img3" src="" alt="third product image">
                                            <img class="cndprom_img4" src="" alt="four product image">
                                            <img class="cndprom_img5" src="" alt="figth product image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container page">
                                <?php if (count($this->getShopData())): ?>
                                    <?php $limit = (new MgrProducts)->totalItem($_SESSION['shop_name'])/10;
                                    $prev = Functions::blogPrev($_GET['page'], $limit);
                                    $next = Functions::blogNext($limit);
                                    ?>
                                    <div class="paginate">
                                        <span class="pl-1 pr-1 preview"><a href="?page=<?= $prev?>">&leftarrow;</a></span>
                                        <?php for($ln=0; $ln<$limit; $ln++): ?>
                                            <span><a href="?page=<?= $ln?>"><?= $ln?></a></span>
                                        <?php endfor;?>
                                        <span class="pl-1 pr-1 nextview"><a href="?page=<?= $next?>">&rightarrow;</a></span>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="faqq" style="display:none">
                            <strong>FAQ</strong><br><br>
                            <div class="F_add">
                                <form class="form-group" method="POST" style="display: none">
                                    <label>Question</label>
                                    <textarea required autocomplete="off" maxlength="30" rows="2">Max length 30</textarea>

                                    <label>Response</label>
                                    <textarea required autocomplete="off" maxlength="100" rows="4">Max length 100</textarea>
                                    <div class="FBtn">
                                        <button id="faq__NQFC" class="btn btn-dark btn-sm" style="font-size: 11px;" type="button">CANCEL</button>
                                        <button class="btn btn-success btn-sm" style="font-size: 11px; width: 70px" type="submit">SUBMIT</button>
                                    </div>
                                </form>
                                <button id="FAQ_add_" class="btn btn-sm btn-primary" style="font-size: 11px; width: 70px">ADD</button>
                            </div>

                            <div class="f_list">
                                <b>CURRENT FAQ LIST</b><br><br>
                                <?php for($t=0; $t<count($this->getAllinFaq()); $t++): ?>
                                    <div class="F_item">
                                        <div class="F_qr">
                                            <p class="mb-2">Question :
                                                <a>
                                                    <?= $this->getAllinFaq()[$t]['question']?>
                                                </a>
                                            </p>
                                            <p>Response :
                                                <a>
                                                    <?= $this->getAllinFaq()[$t]['response']?>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="F_stat">
                                            <p>Sonder : <a><?= $this->getAllinFaq()[$t]['sonder']?></a></p>
                                            <p>Satisfait : <a>
                                                    <?= $this->getAllinFaq()[$t]['positive']?>
                                                    <b>
                                                        <?= '('.Functions::percentage($this->getAllinFaq()[$t]['sonder'], $this->getAllinFaq()[$t]['positive']).'%)' ?>
                                                    </b>
                                                </a>
                                            </p>
                                            <p>Non satisfait :
                                                <a>
                                                    <?= $this->getAllinFaq()[$t]['negative']?>
                                                    <b>
                                                        <?='('. 100 - Functions::percentage($this->getAllinFaq()[$t]['sonder'], $this->getAllinFaq()[$t]['positive']).'%)' ?>
                                                    </b>
                                                </a>
                                            </p>
                                        </div>
                                        <img id="faq_del" class="mt-5" src="<?= S_ASSETS ?>images/svg/delete_black_24dp.svg" alt="Edit button">
                                        <img id="faq_ed" src="<?= S_ASSETS ?>images/svg/edit.png" alt="Edit button">
                                        <form method="post" class="form-group FeditQ" style="display: none">
                                            <textarea name="FeditQ" id="F__edit_Q" rows="4"><?= $this->getAllinFaq()[$t]['response']?></textarea>
                                            <button class="btn btn-primary btn-sm" type="submit" style="font-size: 11px;">UPDATE</button>
                                            <button id="F__cancel" class="btn btn-dark btn-sm" type="submit" style="font-size: 11px;">CANCEL</button>
                                        </form>
                                    </div>
                                <?php endfor;?>
                            </div>
                        </div>

                        <div class="plan_-" style="display:none">
                            <div class="_add_pl">
                                <form class="form-group" method="POST" style="display: none">
                                    <b>NEW PLAN</b><br><br>
                                    <input name="name" required autocomplete="off" maxlength="10" placeholder="Enter plan name">
                                    <input name="prod" required autocomplete="off" maxlength="10" placeholder="Enter max products">
                                    <input name="storage" required autocomplete="off" maxlength="10" placeholder="Enter max storage">
                                    <input name="sms" required autocomplete="off" maxlength="10" placeholder="Enter max sms">
                                    <input name="mail" required autocomplete="off" maxlength="10" placeholder="Enter max mail">

                                    <div class="FBtn">
                                        <button id="plan__" class="btn btn-dark btn-sm" style="font-size: 11px;" type="button">CANCEL</button>
                                        <button class="btn btn-success btn-sm" style="font-size: 11px; width: 70px" type="submit">SUBMIT</button>
                                    </div>
                                </form>
                                <button id="plan_add_" class="mb-5 btn btn-sm btn-primary" style="font-size: 11px; width: 70px">ADD</button>
                            </div>

                            <div class="plan_list">
                                <b>PLANS LIST</b><br><br>
                                <?php for($s_=0; $s_<count($this->getAllplan()); $s_++): ?>
                                    <div class="plan_item">
                                        <div class="plan_qr">
                                            <p class="">Name :
                                                <a>
                                                    <?= $this->getAllplan()[$s_]['name']?>
                                                </a>
                                            </p>
                                            <p>Value :
                                                <a>
                                                    <?= $this->getAllplan()[$s_]['value'].' US$'?>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="plan_stat">
                                            <p>Product : <a><?= $this->getAllplan()[$s_]['limit_product']?></a></p>
                                            <p>Storage : <a>
                                                    <?= $this->getAllplan()[$s_]['limit_storage'].' Giga'?>
                                                </a>
                                            </p>
                                            <p>E-mail :
                                                <a>
                                                    <?= $this->getAllplan()[$s_]['limit_email']?>
                                                </a>
                                            </p>
                                            <p>Sms :
                                                <a>
                                                    <?= $this->getAllplan()[$s_]['limit_sms']?>
                                                </a>
                                            </p>
                                        </div>
                                        <img id="plan_del" class="mt-5" src="<?= S_ASSETS ?>images/svg/trash.png" alt="Edit button">
                                        <img id="plan_ed" src="<?= S_ASSETS ?>images/svg/edit.png" alt="Edit button">
                                        <form method="post" class="form-group plan_editQ" style="display: none">
                                            <input name="name" required autocomplete="off" maxlength="10" placeholder="Enter plan name" value="<?= $this->getAllplan()[$s_]['name']?>">
                                            <input name="prod" required autocomplete="off" maxlength="10" placeholder="Enter max products" value="<?= $this->getAllplan()[$s_]['limit_product']?>">
                                            <input name="storage" required autocomplete="off" maxlength="10" placeholder="Enter max storage" value="<?= $this->getAllplan()[$s_]['limit_storage']?>">
                                            <input name="sms" required autocomplete="off" maxlength="10" placeholder="Enter max sms" value="<?= $this->getAllplan()[$s_]['limit_sms']?>">
                                            <input name="mail" required autocomplete="off" maxlength="10" placeholder="Enter max mail" value="<?= $this->getAllplan()[$s_]['limit_email']?>">

                                            <button class="btn btn-primary btn-sm" type="submit" style="font-size: 11px;">UPDATE</button>
                                            <button id="plan__cancel" class="btn btn-dark btn-sm" type="button" style="font-size: 11px">CANCEL</button>
                                        </form>
                                    </div>
                                <?php endfor;?>
                            </div>
                        </div>

                        <div class="custumer_l" style="display: none">
                            <div class="pres__">
                                <div class="U1" style="border-right: 1px solid rgba(201,199,199,0.68)">
                                    <h5>Business Users</h5>
                                    <p>Total Account : <b><?= $this->getTotalBu()?></b></p>
                                    <p>Total Actif Account : <b><?= $this->getTotalBuActif()?></b></p>
                                    <p>Total Inactif Account : <b><?= ($this->getTotalBu() - $this->getTotalBuActif())?></b></p>
                                    <p>Total men : <b><?= $this->getTotalMenSallers()?></b></p>
                                    <p>Total woman : <b><?= $this->getTotalWomanSallers()?></b></p>

                                    <button id="__u1" class="btn btn-dark btn-sm">VIEW LIST
                                        &blacktriangledown;
                                    </button>
                                </div>
                                <div class="pl-2 U2">
                                    <h5>Normal Users</h5>
                                    <p>Total Account : <b><?= $this->getTotalSu()?></b></p>
                                    <p>Total Actif Account : <b><?= $this->getTotalSuActif()?></b></p>
                                    <p>Total Inactif Account : <b><?= ($this->getTotalSu() - $this->getTotalSuActif())?></b></p>
                                    <p>Total men : <b><?= $this->getTotalMenUsers()?></b></p>
                                    <p>Total woman : <b><?= $this->getTotalWomanUsers()?></b></p>
                                    <button id="__u2" class="btn btn-dark btn-sm">VIEW LIST
                                        &blacktriangledown;
                                    </button>
                                </div>
                            </div>

                            <div class="custList" style="display: none">
                                <p class="mt-5">Business Users</p>
                                <b>Sort by</b>
                                <div id="cust_sort_div" class="bt1 mb-4 bt12_">
                                    <img src="<?= S_ASSETS ?>images/svg/sort_black_24dp.svg" alt="">
                                    <form method="post" style="margin-top: -25px; margin-left: 10px;">
                                        <button type="submit" class="ml-3" name="cust_Name" value="username" id="cust_">Name</button>
                                        <button type="submit" class="ml-3" name="cust_country" value="country" id="cust_">Country</button>
                                        <button type="submit" class="ml-3" name="cust_city" value="city" id="cust_">city</button>
                                        <button type="submit" class="ml-3" name="cust_gender" value="gender" id="cust_">gender</button>
                                        <button type="submit" class="ml-3" name="cust_plan" value="plan" id="cust_">Plan</button>
                                    </form>
                                </div>

                                <div class="allcustlist" style="display: none">
                                    <ul>
                                        <?php for($li__=0; $li__<count($this->getBusiClient()); $li__++): ?>
                                            <li data-pid="<?= $this->getBusiClient()[$li__]['id']?>" class="list-group-item">
                                                <span>
                                                    <b>Name : </b><a><?= $this->getBusiClient()[$li__]['username']?></a>
                                                    <b>Country : </b><a><?= $this->getBusiClient()[$li__]['country']?></a>
                                                    <b>City : </b><a><?= $this->getBusiClient()[$li__]['city']?></a>
                                                </span>
                                            </li>
                                        <?php endfor;?>
                                    </ul>
                                </div>

                                <div class="_allcustlist_" style="display: none">
                                    <ul>
                                        <?php for($li=0; $li<count($this->getSuClient()); $li++): ?>
                                            <li data-pid="<?= $this->getSuClient()[$li]['id']?>" class="list-group-item">
                                                <span>
                                                    <b>Name : </b><a><?= $this->getSuClient()[$li]['username']?></a>
                                                    <b>Country : </b><a><?= $this->getSuClient()[$li]['country']?></a>
                                                    <b>City : </b><a><?= $this->getSuClient()[$li]['city']?></a>
                                                </span>
                                            </li>
                                        <?php endfor;?>
                                    </ul>
                                </div>
                            </div>

                            <div class="rows col-sm-2 col-md-8 aboutUser" style="display: none">
                                <button id="cust__close" class="close mrinf_close">&times;</button>
                                <div class="UserD">
                                    <p class="text-left ml-1 mt-5">About dashboard</p>
                                    <div class="prod_img__prom">
                                        <div class="u_img"><img src="<?= S_ASSETS ?>images/svg/person_black_24dp.svg" alt=""></div>
                                    </div>
                                    <ul>
                                        <li>
                                               <span>
                                                   <a>Name :</a>
                                                   <b id="c_u_name">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Email :</a>
                                                   <b id="c_u_mail">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Genre :</a>
                                                   <b id="c_u_genre">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Interest By :</a>
                                                   <b id="c_u_interest">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Sub manager :</a>
                                                   <b id="c_u_mgr">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Phone number :</a>
                                                   <b id="c_u_phone">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Country :</a>
                                                   <b id="c_u_country">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>City :</a>
                                                   <b id="c_u_city">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Shop name :</a>
                                                   <b id="c_u_shop">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Matricule :</a>
                                                   <b id="c_u_matricul">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Current plan :</a>
                                                   <b id="c_u_plan">null</b>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Created At :</a>
                                                   <b id="c_u_create">null</b>
                                               </span>
                                        </li>
                                    </ul>
                                    <div class="cust__opt_btn">
                                        <button><img src="<?= S_ASSETS ?>images/svg/call_black_24dp.svg" alt=""></button>
                                        <button><img src="<?= S_ASSETS ?>images/svg/whatsapp_black_24dp.svg" alt=""></button>
                                        <button><img src="<?= S_ASSETS ?>images/svg/alternate_email_black_24dp.svg" alt=""></button>
                                        <button><img src="<?= S_ASSETS ?>images/svg/sms_black_24dp.svg" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                    <div class="__stat_view" id="c_style" style="display:none">
                        <button class="close" id="clse">&times;</button>
                        <p class="text-dark mt-3">Sorry your statistiques is not available now</p>
                    </div>

                    <?php if ($_GET['sp']): ?>
                        <div class="p__list mb-5" id="c_style" style="display: block">
                            <button id="p_list_close" class="close">&times;</button>

                            <?php if ($this->getBusiProd()): ?>
                                <?php for ($n=0; $n<count($this->getBusiProd()); $n++): ?>
                                    <ul class="p__list_ul mt-4">
                                        <li>
                                            <div class="prd____">
                                                <div class="nme_n_price">
                                                    <h6 class="nme"><?= $this->getBusiProd()[$n]['prod_name'];?></h6>
                                                    <h6 class="price"><?= $this->getBusiProd()[$n]['price'].$this->getSallerData()[0]['currency'];?></h6>
                                                </div>

                                                <div class="ctgr_n_qte">
                                                    <h6 class="ctgr"><?= $this->getBusiProd()[$n]['category'];?></h6>
                                                    <h6 class="qte"><?=$this->getBusiProd()[$n]['quantity'];?></h6>
                                                </div>
                                            </div>

                                            <div class="btn_nn">
                                                <form method="post" class="frm_edit">
                                                    <input type="button" class="edit" value="Edit"
                                                           data-id="<?= $this->getBusiProd()[$n]['id'];?>">
                                                </form>

                                                <form method="post" class="frm_delete">
                                                    <input type="button"
                                                           class="delete"
                                                           id="delprod"
                                                           value="Delete"
                                                           data-prodName= '<?= $this->getBusiProd()[$n]['prod_name'];?>'
                                                           data-id="<?= $this->getBusiProd()[$n]['id'];?>">
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                <?php endfor ?>
                            <?php endif;?>
                        </div>
                    <?php endif;?>

                    <?php if ($_SESSION['shop_name'] !== 'lbm'): ?>
                        <div class="__promo_candidate" style="display: none">
                            <div id="d8" class="mb-1">
                                <button>Sort By</button>
                            </div>
                            <div id="prom_bt1__" class="prom_bt1 mb-4">
                                <form method="post">
                                    <button type="submit" class="ml-3" name="category" value="category" id="srt">State</button>
                                    <button type="submit" class="ml-3" name="price" value="price" id="srt">Budget</button>
                                    <button type="submit" class="ml-3" name="date" value="date" id="srt">Date</button>
                                </form>
                            </div>

                            <?php for ($q=0; $q<count($this->getPromoClient()); $q++): ?>
                                <?php $tabl = json_decode($this->getPromoClient()[$q]['prod_data'], true);?>
                                <?php foreach($tabl as $item):?>
                                    <?php if(Functions::SNFormatFront($item['shop_name']) === Functions::SNFormatFront($_SESSION['shop_name'])):?>
                                        <ul class="promo_c_list_ul">
                                            <li>
                                                <div class="__promo_c_prd____">
                                                    <div class="spn_addt">
                                                        <h6 class="sp_prom__"><?= $item['prod_name'];?></h6>
                                                        <h6 class="addt_prom__"><?= $this->getPromoClient()[$q]['statu'];?></h6>
                                                    </div>

                                                    <div class="pay_tim">
                                                        <h6 class="pay_prom__"><?= $this->getPromoClient()[$q]['budget']?></h6>
                                                        <h6 class="tim_prom__"><?= $this->getPromoClient()[$q]['delay']?></h6>
                                                    </div>
                                                </div>

                                                <div class="btn_nn_prom">
                                                    <form method="post" class="frm_edit">
                                                        <input type="button"
                                                               class="prom_delete"
                                                               id="prom_delprod"
                                                               value="Delete"
                                                               data-id="<?= ""?>"
                                                        >
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php endif;?>
                                <?php endforeach;?>
                            <?php endfor;?>

                            <div class="container page">
                                <?php
                                   $arrv = [];
                                    foreach($this->getPromoClient() as $prd){
                                        $id = json_decode($prd['prod_data'], true);
                                        foreach($id as $it) {
                                            if($it['shop_name'] === $_SESSION['shop_name']){
                                                array_push($arrv, $it['prod_id']);
                                            }
                                        }
                                    }
                                ?>
                                <?php if (count($arrv) > 10): ?>
                                    <?php $limit = (new MgrProducts)->totalItem($_SESSION['shop_name'])/10;
                                    $prev = Functions::blogPrev($_GET['page'], $limit);
                                    $next = Functions::blogNext($limit);
                                    ?>
                                    <div class="paginate">
                                        <span class="pl-1 pr-1 preview"><a href="?page=<?= $prev?>">&leftarrow;</a></span>
                                        <?php for($ln=0; $ln<$limit; $ln++): ?>
                                            <span><a href="?page=<?= $ln?>"><?= $ln?></a></span>
                                        <?php endfor;?>
                                        <span class="pl-1 pr-1 nextview"><a href="?page=<?= $next?>">&rightarrow;</a></span>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="row-cols-12 __chk_prod" style="display: none">
                            <div class="chk_for_all mb-5">
                                <h2 class="mt3 mb-3">CHECK REQUEST</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Aliquam cupiditate eius fugit illo laborum quas?
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Aliquam cupiditate eius fugit illo laborum quas?
                                </p>
                                <button class="btn btn-primary btn-sm small">FOR ALL</button>
                            </div>

                            <div class="chk_prod_list">
                                <h6 class="text-sm-left">FOR PARTICULAR PRODUCT</h6>
                                    <?php for($g=0; $g<count($this->getShopData()); $g++): ?>
                                            <div class="inf__">
                                                <div class="chk_nm_cat">
                                                    <p class="mr-5">Name : <?= $this->getShopData()[$g]['prod_name']?></p>
                                                    <p>Price : <?= $this->getShopData()[$g]['price'].'$'?></p>
                                                </div>

                                                <div class="chk_pr_rat">
                                                    <p class="mr-5 text-decoration-none">Category : <?= $this->getShopData()[$g]['category']?></p>
                                                    <p>Rate :
                                                        <?php for($j=0; $j<$this->getShopData()[$g]['rating']; $j++): ?>
                                                            <b style="color: orange">&starf;</b>
                                                        <?php endfor;?>
                                                    </p>
                                                </div>

                                                <?php $__id = []?>
                                                <?php
                                                    foreach ($this->getReschk() as $item) {
                                                       array_push($__id, $item['pid']);
                                                    }
                                                ?>

                                                <?php if (!in_array($this->getShopData()[$g]['id'], $__id)): ?>
                                                    <button class="btn btn-primary btn-sm"
                                                            data-name="<?= $this->getShopData()[$g]['prod_name']?>"
                                                            data-pid="<?= $this->getShopData()[$g]['id']?>">
                                                        SEND
                                                    </button>
                                                <?php endif;?>
                                            </div>
                                    <?php endfor;?>
                            </div>
                        </div>
                    <?php endif;?>

                    <?php if (count($this->getShopData()) > 0): ?>
                        <div class="p__list" id="c_style" style="display: block">
                            <div id="d3" class="mb-1">
                                <button>Sort By</button>
                            </div>
                            <div id="bt1_" class="bt1 mb-4">
                                <form method="post">
                                    <button type="submit" class="ml-3" name="category" value="category" id="srt">Category</button>
                                    <button type="submit" class="ml-3" name="prod_name" value="prod_name" id="srt">Name</button>
                                    <button type="submit" class="ml-3" name="price" value="price" id="srt">Price</button>
                                    <button type="submit" class="ml-3" name="quantity" value="quantity" id="srt">Quantity</button>
                                </form>
                            </div>

                            <?php for ($i=0; $i<count($this->getShopData()); $i++): ?>
                                <ul class="p__list_ul">
                                    <li>
                                        <?php if(!in_array($this->getShopData()[$i]['id'], $this->getAllReadyinP())): ?>
                                            <button class="small addinpromo"
                                                    data-pid="<?= $this->getShopData()[$i]['id'];?>"
                                                    data-prodname="<?= $this->getShopData()[$i]['prod_name'];?>"
                                                    data-addby="<?= $this->getShopData()[$i]['add_by'];?>"
                                                    data-category="<?= $this->getShopData()[$i]['category'];?>"
                                                    data-quality="<?= $this->getShopData()[$i]['quality'];?>"
                                                    data-sub="<?= $this->getShopData()[$i]['sub_category'];?>"
                                                    data-price="<?= $this->getShopData()[$i]['price'];?>"
                                                    data-promo="<?= $this->getShopData()[$i]['promo'];?>"
                                                    data-rating="<?= $this->getShopData()[$i]['rating'];?>"
                                                    data-rater="<?= $this->getShopData()[$i]['rater'];?>"
                                                    data-checked="<?= $this->getShopData()[$i]['checked'];?>"
                                                    data-color="<?= $this->getShopData()[$i]['color'];?>"
                                                    data-size="<?= $this->getShopData()[$i]['size'];?>"
                                                    data-prop="<?= $this->getShopData()[$i]['proprities'];?>"
                                                    data-quantity="<?= $this->getShopData()[$i]['quantity'];?>"
                                                    data-desc="<?= $this->getShopData()[$i]['description'];?>"

                                                    data-img1="<?= $this->getShopData()[$i]['img1'];?>"
                                                    data-img2="<?= $this->getShopData()[$i]['img2'];?>"
                                                    data-img3="<?= $this->getShopData()[$i]['img3'];?>"
                                                    data-img4="<?= $this->getShopData()[$i]['img4'];?>"
                                                    data-img5="<?= $this->getShopData()[$i]['img5'];?>"
                                                    data-add_at="<?= $this->getShopData()[$i]['add_at'];?>">
                                                &plus;
                                            </button>
                                        <?php endif;?>

                                        <div class="prd____">
                                            <div class="nme_n_price">
                                                <h6 class="nme font-weight-normal"><?= $this->getShopData()[$i]['prod_name'];?></h6>
                                                <h6 class="price font-weight-normal"><?= $this->getShopData()[$i]['price']. $this->getSallerData()[0]['currency'];?></h6>
                                            </div>

                                            <div class="ctgr_n_qte">
                                                <h6 class="ctgr font-weight-normal"><?= $this->getShopData()[$i]['category'];?></h6>
                                                <h6 class="qte font-weight-normal"><?= $this->getShopData()[$i]['quantity'];?></h6>
                                            </div>
                                        </div>

                                        <div class="btn_nn">
                                            <form method="post" class="frm_edit">
                                                <input type="button" class="edit" value="Edit"
                                                       data-id="<?= $this->getShopData()[$i]['id'];?>">
                                            </form>

                                            <form method="post" class="frm_delete">
                                                <input type="button"
                                                       class="delete"
                                                       id="delprod"
                                                       value="Delete"
                                                       data-prodName= '<?= $this->getShopData()[$i]['prod_name'];?>'
                                                       data-id="<?= $this->getShopData()[$i]['id'];?>">
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            <?php endfor ?>

                            <?php if ($_SESSION['shop_name'] !== 'lbm'): ?>
                                <div class="rows col-sm-2 col-md-8 ___mrinf">
                                <button id="prom__close" class="close ___mrinf_close">&times;</button>
                                <div class="___prom_info">
                                    <p class="text-left ml-1">About Promo</p>
                                    <ul>
                                        <li>
                                               <span>
                                                   <a>Location :</a>
                                                   <input type="text"
                                                          required="required"
                                                          id="sp_lc_v"
                                                          name="location"
                                                          draggable="false"
                                                          style="cursor: text"
                                                          placeholder="Enter Country separate with coma"
                                                          value="">
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Priority gender :</a>
                                                   <select name="sp_gender" id="sp_gender">
                                                       <option value="Optimise">Optimise</option>
                                                       <option value="Woman">Woman</option>
                                                       <option value="Men">Men</option>
                                                   </select>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Priority years :</a>
                                                   <select name="sp_gender" id="sp_gender">
                                                       <option value="Optimise">Optimise</option>
                                                       <option value="14-16">14-16 (Years)</option>
                                                       <option value="17-22">17-22 (Years)</option>
                                                       <option value="23-28">23-28 (Years)</option>
                                                       <option value="29-35">29-35 (Years)</option>
                                                       <option value="36-42">36-42 (Years)</option>
                                                       <option value="43-51">43-51 (Years)</option>
                                                       <option value="52-60">52-60 (Years)</option>
                                                   </select>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Delay :</a>
                                                   <select name="sp_delay" id="sp_delay">
                                                       <option value="1 Day">1 Day</option>
                                                       <option value="2 Day">2 Day</option>
                                                       <option value="3 Day">3 Day</option>
                                                       <option value="4 Day">4 Day</option>
                                                       <option value="5 Day">5 Day</option>
                                                       <option value="6 Day">6 Day</option>
                                                       <option value="7 Day">7 Day</option>
                                                       <option value="2 Weeks">2 Weeks</option>
                                                       <option value="3 Weeks">3 Weeks</option>
                                                       <option value="4 Weeks">4 Weeks</option>
                                                       <option value="2 Months">2 Months</option>
                                                       <option value="3 Months">3 Months</option>
                                                       <option value="5 Months">4 Months</option>
                                                       <option value="5 Months">5 Months</option>
                                                       <option value="6 Months">6 Months</option>
                                                   </select>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Budget :</a>
                                                   <input type="text"
                                                          id="sp_bg_v"
                                                          name="budget"
                                                          readonly
                                                          draggable="false"
                                                          value="1.90 US$">
                                               </span>
                                        </li>
                                    </ul>
                                    <div class="prombtndiv" style="margin-top: -15px!important;
                                                                   width: 90%;
                                                                   display: flex;
                                                                   margin-left: 12px;">
                                        <button class="___promBtnAdd"
                                                style="width: 50%">
                                            SUBMIT
                                        </button>
                                        <form method="post">
                                            <button type="button" name="___delfromprom" class="____promBtnsdel"
                                                    style="width: 250%">
                                                Cancel
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="___prod_d">
                                    <p class="text-left ml-1">Your Product</p>
                                    <ul>
                                        <li class="hide">
                                               <span>
                                                   <a>Add by :</a>
                                                   <a id="_pr_aby_" style="margin-left: 37px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Product :</a>
                                                   <a id="_pr_pn_" style="margin-left: 32px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Price :</a>
                                                   <a id="_pr_pric_" style="margin-left: 45px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Promo price :</a>
                                                   <a id="_pr_prm-" style="margin-left: 11px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Category :</a>
                                                   <a id="_pr_cat-" style="margin-left: 26px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Sub categories :</a>
                                                   <a id="_pr_subcat-" style="margin-left: -3px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Quality :</a>
                                                   <a id="_pr_qly-" style="margin-left: 38px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Quantity :</a>
                                                   <a id="_pr_qty-" style="margin-left: 32px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Proprities :</a>
                                                   <a id="_pr_prp-" style="margin-left: 24px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Color :</a>
                                                   <a id="_pr_clr-" style="margin-left: 44px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Size :</a>
                                                   <a id="_pr_sze-" style="margin-left: 51px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Rating :</a>
                                                   <a id="_pr_rtg-" style="margin-left: 39px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Rater :</a>
                                                   <a id="_pr_rtr-" style="margin-left: 45px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Checked :</a>
                                                   <a id="_pr_chk-" style="margin-left: 29px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Description :</a>
                                                   <a id="_pr_dsc-" style="margin-left: 15px;"></a>
                                               </span>
                                        </li>

                                        <li>
                                               <span>
                                                   <a>Add at :</a>
                                                   <a id="_pr_adt-" style="margin-left: 38px;"></a>
                                               </span>
                                        </li>
                                    </ul>

                                    <div class="prod_img__prom">
                                        <div class="f_img">
                                            <img class="f_img1" src="" alt="">
                                        </div>
                                        <div class="rows row-cols-sm-3 other__img">
                                            <img class="f_img2" src="" alt="">
                                            <img class="f_img3" src="" alt="">
                                            <img class="f_img4" src="" alt="">
                                            <img class="f_img5" src="" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>

                            <div class="container page">
                                <?php if ((new MgrProducts)->totalItem($_SESSION['shop_name']) > 10): ?>
                                    <?php $limit = (new MgrProducts)->totalItem($_SESSION['shop_name'])/10;
                                           $prev = Functions::blogPrev($_GET['page'], $limit);
                                           $next = Functions::blogNext($limit);
                                    ?>
                                    <div class="paginate">
                                        <span class="pl-1 pr-1 preview"><a href="?page=<?= $prev?>">&leftarrow;</a></span>
                                        <?php for($ln=0; $ln<$limit; $ln++): ?>
                                            <span><a href="?page=<?= $ln?>"><?= $ln?></a></span>
                                        <?php endfor;?>
                                        <span class="pl-1 pr-1 nextview"><a href="?page=<?= $next?>">&rightarrow;</a></span>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endif;?>
                </div>

                <div class="analytics__">
                    <div class="elbi">
                        <p>Product</p>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">02</b> Buy intent</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;"><?= count($this->getMess())?></b> Unread message</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">00</b> Reclamations non traités</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">00</b> Produits en rupture de stock</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">00</b> Produits sponsorisés</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">00%</b> Product is check</a>
                        </div>
                    </div>

                    <div class="elbi">
                        <p>Shop</p>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">00</b> Livraisons en cour</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">00</b> Livraisons en Attentes</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">00</b> New comments</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">00</b> Reservations</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">01</b> Followers</a>
                        </div>
                        <div class="msg">
                            <a>J- <b class="text-primary" style="font-size: 14px;">30</b> Renew your subcription</a>
                        </div>
                    </div>

                    <div class="elbi">
                        <p>Statistiques</p>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">01</b> Visites</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">01%</b> Visites from Facebook</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">99%</b> Taux de rebond</a>
                        </div>
                        <div class="msg">
                            <a><b class="text-primary" style="font-size: 16px;">0%</b> Visites from Canada</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="<?= S_ASSETS?>js/dashboard.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>
