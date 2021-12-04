<?php
//use Lbm\Partials\Partials;
$title = "Setting";
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/setting.css">

<body>
    <section class="sett_sec1">
        <div class="div_sec1">
            <h5><img style="cursor: pointer" class="ic" src="<?= S_ASSETS?>images/svg/arrow.png" alt="bag image"> Setting</h5>

            <form method="post">
                <input type="search" name="sett_search" class="sett_search"  placeholder="Search">
            </form>
        </div>

        <form action="plans" method="post">
            <input type="submit" name="continue" class="sett_cls" value="CONTINUE">
        </form>
    </section>

    <section class="sett_sec2">
        <div class="options">
            <p class="usg1"><img class="ic" src="<?= S_ASSETS?>images/svg/settings_applications_black_24dp.svg" alt="bag image">Profil</p>
            <p class="thm1"><img class="ic" src="<?= S_ASSETS?>images/svg/palette_black_24dp.svg" alt="bag image">Theme</p>
            <p class="cfd1"><img class="ic" src="<?= S_ASSETS?>images/svg/v_user_noir_24dp.svg" alt="bag image">Confidentiality and Security</p>
            <p class="pynt1"><img class="ic" src="<?= S_ASSETS?>images/svg/payments_noir.svg" alt="bag image">Payment method</p>
            <br>

            <p class="pynt1"><img class="ic" src="<?= S_ASSETS?>images/svg/more_black_24dp.svg" alt="bag image">Avanced</p>
        </div>
    </section>

    <section class="sett_sec3">
        <div class="using">
            <p>Profil</p>
            <table class="table-hover jumbotron" id="tble">
                <tbody class="panel-body" id="tbod">
                    <tr class="__tb_sn">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/edit_note_black_24dp.svg" alt="bag image">
                                Shop name
                            </h6>

                            <form method="post" id="sett_sub_item">
                                <input id="setshopname"
                                       type="text"
                                       name="in_sub"
                                       class="sett_inSub"
                                       value="<?= $this->getSData()[0]['shop_name']?>"
                                       required>

                                <input id="__snSetid" type="submit" name="in_submt" class="sett_i_Sub" value="SAVE">
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_desc">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/description_noir.svg" alt="bag image">
                                Description
                            </h6>

                            <form method="post" id="sett_desc_item">
                                <textarea id="__setdes_ta"
                                          name="in_desc"
                                          class="sett_inDesc"
                                          required><?= $this->getSData()[0]['description']?></textarea>

                                <input id="__setdes_id" type="submit" name="desc_sbmt" class="sett_i_desc" value="SAVE">
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_cp">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/image_noir.svg" alt="bag image">
                                Cover picture
                            </h6>
                            <form method="post" id="sett_cp_item">
                                <input type="file" name="in_cp" class="in_cp" required>
                                <input type="submit" name="sett_cp_sbmt" class="sett_cp_sbmt" value="SAVE">
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_pa">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/emoji_transportation_black_24dp.svg" alt="bag image">
                                Principal activity
                            </h6>

                            <form method="post" id="_s_pa">
                                <select class="pa_slct" name="activity">
                                    <option value="<?= $this->getSData()[0]['shop_name']?>"><?= $this->getSData()[0]['activity']?></option>
                                    <option value="General Market">General Market</option>
                                    <option value="Electronic">Electronic</option>
                                    <option value="Style">Style</option>
                                    <option value="Auto">Auto</option>
                                </select>
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_mt">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/badge_black_24dp.svg" alt="bag image">
                                Matricul
                            </h6>
                            <form method="post" id="sett_mt_item">
                                <input type="text" name="in_mt_nm" class="sett_inSub" value="<?= $this->getSData()[0]['matricule']?>" required>
                                <input type="submit" name="in_sbmt_mt" class="sett_i_Sub" value="SAVE">
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_lt">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/my_location_black_24dp.svg" alt="bag image">
                                Location
                            </h6>

                            <form method="post" id="_s_lt">
                                <select class="lt_slct" name="country">
                                    <option value="<?= $this->getSData()[0]['shop_location']?>"><?= $this->getSData()[0]['shop_location']?></option>
                                    <option value="Douala">Douala</option>
                                    <option value="Yaounde">Yaounde</option>
                                    <option value="Bafoussam">Bafoussam</option>
                                    <option value="Limbe">Limbe</option>
                                </select>
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_shp">
                        <td>
                            <button class="close"></button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/local_shipping_black_24dp.svg" alt="bag image">
                                Shipping
                            </h6>

                            <span class="yes_no">
                                 <button class="yes">YES</button>
                                 <button class="no">NO</button>
                            </span>

                            <form method="post" class="shp_form">
                                <select class="shp_slct" name="sheapping">
                                    <option value="DHL">DHL</option>
                                    <option value="ROYAL">ROYAL SHEAPPING</option>
                                    <option value="SOLAR">SOLAR</option>
                                </select>
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_dv">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/euro_symbol_black_24dp.svg" alt="bag image">
                                Devise
                            </h6>
                            <form method="post" id="_s_de">
                                <select class="dv_slct" name="devise">
                                    <option  value="<?= $this->getSData()[0]['currency']?>"><?= $this->getSData()[0]['currency']?></option>
                                    <option value="US$">US dollar</option>
                                    <option value="Euro">Euro</option>
                                    <option value="Pound">Pound</option>
                                    <option value="FCFA">Franc CFA</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="theme">
            <p>Theme</p>
            <table class="table-hover jumbotron" id="tble">
                <tbody class="panel-body" id="tbod">
                    <tr class="__tb_th">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" id="persn" src="<?= S_ASSETS?>images/svg/palette_black_24dp.svg" alt="bag image">
                                Choose theme
                            </h6>

                            <div id="_s_th" class="light_dark">
                                <div class="l_div">
                                    <img class="ict" id="light" src="<?= S_ASSETS?>images/svg/smile.png"
                                         alt="bag image"/>
                                    <p class="text-center mr-4">ligth</p>
                                </div>

                                <div class="d_div">
                                    <img class="ict" id="dark" src="<?= S_ASSETS?>images/svg/smile.png"
                                         alt="bag image"/>
                                    <p class="text-center mr-4">dark</p>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="__tb_cn">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" id="persn" src="<?= S_ASSETS?>images/svg/stream_black_24dp.svg" alt="bag image">
                                Columb number
                            </h6>

                            <form method="post" id="_s_nc">
                                <select class="cn_slct" name="columb">
                                    <option value="Default">Default</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_clr">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" id="persn" src="<?= S_ASSETS?>images/svg/category_black_24dp.svg" alt="bag image">
                                Font Color
                            </h6>

                            <div id="_s_fc">
                                <h5 class="__pn">Product name</h5>
                                <h5 class="__prc">Price</h5>
                                <h5 class="__op">Promo price</h5>
                                <h5 class="__btns">Button</h5>

                                <form class="colr form-group" method="post">
                                    <input type="button" name="sett_green" class="sett_green" data-color_code="#55bf6d">
                                    <input type="button" name="sett_bleu" class="sett_bleu" data-color_code="#FF4169E1">
                                    <input type="button" name="sett_orange" class="sett_orange" data-color_code="#FFFF7F50">
                                    <input type="button" name="sett_cyan" class="sett_cyan" data-color_code="#07b4b4">
                                    <input type="button" name="sett_crimson" class="sett_crimson" data-color_code="#FFDC143C">
                                    <input type="button" name="sett_violet" class="sett_violet" data-color_code="#FFEE82EE">
                                </form>
                            </div>
                        </td>
                    </tr>

                    <tr class="__tb_hp">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" id="persn" src="<?= S_ASSETS?>images/svg/home_black_24dp.svg" alt="bag image">
                                Home page
                            </h6>

                            <form class="hp_form" method="post" id="_s_hp">
                                <select class="hp_slct" name="homepage">
                                    <option value="Product">Default</option>
                                    <option value="Profil">Profil page</option>
                                    <option value="Product">Product page</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="confidentiality">
            <p>Confidentiality and security</p>
            <table class="table-hover jumbotron" id="tble">
                <tbody class="panel-body" id="tbod">
                    <tr class="__tb_sk">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/key_black_24dp.svg" alt="bag image">
                                Shop key
                            </h6>

                            <form class="lt_form" method="post" id="sett_sk_item">
                                <input type="text" name="in_sk" class="sett_inSk" placeholder="10 characters min" minlength="10">
                                <input type="submit" name="in_submt" class="sett_i_Sav" value="SAVE">
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_pi">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/manage_accounts_noir_24dp.svg" alt="bag image">
                                Personnal informations
                            </h6>
                            
                            <form method="post" id="p__pi">
                                <h4><b>visible</b></h4>

                                <div>Name<span><input type="checkbox" name="name" class="chk_nm"></span></div>
                                <div>Phone number<span><input type="checkbox" name="ph" class="chk_ph"></span></div>
                                <div>E-mail<span><input type="checkbox" name="Eml" class="chk_eml"></span></div>
                                <div>Profil picture<span><input type="checkbox" name="ppr" class="chk_ppr"></span></div>
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_cmt">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/insert_comment_black_24dp.svg" alt="bag image">
                                Comment
                            </h6>

                            <form method="post" id="cmt__pi">
                                <h4><b>allow</b></h4>
                                <div>Product comment's<span><input type="checkbox" name="p_cmt" class="p_cmt"></span></div>
                                <div>Shop comment's<span><input type="checkbox" name="sp_cmt" class="sp_cmt"></span></div>
                            </form>
                        </td>
                    </tr>

                    <tr class="__tb_rl">
                        <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/warning_black_24dp.svg" alt="bag image">
                                Rules
                            </h6>
                            <form class="lt_form" method="post" id="sett_rule_item">
                                <textarea name="in_rl" class="sett_inRl"></textarea>
                                <input type="submit" name="rl_sbmt" class="sett_i_rl" value="SAVE">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="payment">
            <p>Payment</p>
            <table class="table-hover jumbotron" id="tble">
                <tbody class="panel-body" id="tbod">
                   <tr class="pm__mth">
                      <td>
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/payments_noir.svg" alt="bag image">
                                Payment method
                            </h6>

                            <form method="post" id="s_mp_">
                                <h4><b>Accepted</b></h4>

                                <div>Visa/Mastercard<span><input type="checkbox" name="visa" class="visa"></span></div>
                                <div>Bank<span><input type="checkbox" name="bank" class="bank"></span></div>
                                <div>PayPal<span><input type="checkbox" name="PayPal" class="PayPal"></span></div>
                                <div>Mobil money<span><input type="checkbox" name="Mobil" class="Mobil"></span></div>
                                <div>Orange money<span><input type="checkbox" name="Orange" class="Orange"></span></div>
                                <div>YUP<span><input type="checkbox" name="YUP" class="YUP"></span></div>
                            </form>
                      </td>
                   </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="sett_sec4">
        <div class="div_sec4">
            <h5>Complete</h5>

            <span class="usg">
                <b>
                    Profil
                </b>
                <button class="sett_btn_usg">50%</button>
            </span>

            <span class="them">
                <b>Theme</b>
                <button class="sett_btn_them">30%</button>
            </span>

            <span class="secur">
                <b>Security</b>
                <button class="sett_btn_secur">80%</button>
            </span>

            <span class="pay">
                <b>Payment</b>
                <button class="sett_btn_pay">70%</button>
            </span>

            <span class="sett_ttl">
                <b>Total</b>
                <button class="sett_btn_ttl">90%</button>
            </span>
        </div>
    </section>

<!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/setting.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->
</body>

