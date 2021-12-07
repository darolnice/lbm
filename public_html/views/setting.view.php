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

        <form action="dashboard" method="post">
            <input type="submit" name="continue" class="sett_cls" value="DASHBOARD">
        </form>
    </section>

    <section class="sett_sec2">
        <div class="options">
            <p class="usg1"><img class="ic" src="<?= S_ASSETS?>images/svg/settings_applications_black_24dp.svg" alt="bag image">Profil</p>
            <p class="thm1"><img class="ic" src="<?= S_ASSETS?>images/svg/palette_black_24dp.svg" alt="bag image">Theme</p>
            <p class="cfd1"><img class="ic" src="<?= S_ASSETS?>images/svg/v_user_noir_24dp.svg" alt="bag image">Confidentiality and Security</p>
            <p class="pynt1"><img class="ic" src="<?= S_ASSETS?>images/svg/payments_noir.svg" alt="bag image">Payment</p>
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
                                Picture
                            </h6>

                            <div class="" id="allpdiv">
                                <form method="post" id="sett_cp_item">
                                    <b class="mb-0 mt-2">Profil Page: Cover Picture</b>
                                    <input id="profcpId" type="file" name="in_cp" class="in_cp" data-cci ="<?= $this->getSData()[0]['cover_image']?>">
                                    <input type="submit" name="sett_cp_sbmt" class="sett_cp_sbmt" value="SAVE">
                                </form>

                                <form method="post" id="ppsp_form">
                                    <b class="mb-0 ">Profil Page: Second Picture</b>
                                    <input id="ppsp" type="file" name="ppsp" class="in_cp" data-cci ="<?= $this->getSData()[0]['snd_img']?>">
                                    <input type="submit" name="ppsp_sbt" class="sett_cp_sbmt" value="SAVE">
                                </form>

                                <form method="post" id="pppc_form">
                                    <b class="mb-0">Profil Page: Picture CEO</b>
                                    <input id="pppc" type="file" name="pppc" class="in_cp" data-cci ="<?= $this->getSData()[0]['ceo_img']?>">
                                    <input type="submit" name="pppc_sbt" class="sett_cp_sbmt" value="SAVE">
                                </form>

                                <form method="post" id="ppp_1_form">
                                    <b class="mb-0">Profil Page: Picture Collaborator 1</b>
                                    <input id="ppp_1" type="file" name="ppp_1" class="in_cp" data-cci ="<?= $this->getSData()[0]['col_1_img']?>">
                                    <input type="submit" name="ppp_1_sbt" class="sett_cp_sbmt" value="SAVE">
                                </form>

                                <form method="post" id="ppp_2_form">
                                    <b class="mb-0">Profil Page: Picture Collaborator 2</b>
                                    <input id="ppp_2" type="file" name="ppp_2" class="in_cp" data-cci ="<?= $this->getSData()[0]['col_2_img']?>">
                                    <input type="submit" name="ppp_2_sbt" class="sett_cp_sbmt" value="SAVE">
                                </form>
                            </div>
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
                                <select class="pa_slct" name="activity" id="__paSettslct">
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
                                <input id="__setmtid" type="text" name="in_mt_nm" class="sett_inSub" value="<?= $this->getSData()[0]['matricule']?>" required>
                                <input id="__setmtbtn" type="submit" name="in_sbmt_mt" class="sett_i_Sub" value="SAVE">
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
                                <select id="__setslid" class="lt_slct" name="country">
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
                            <button class="close">&times;</button>
                            <h6>
                                <img class="ict" src="<?= S_ASSETS?>images/svg/local_shipping_black_24dp.svg" alt="bag image">
                                Shipping
                            </h6>

                            <form method="post" id="__setShfr" class="shp_form">
                                <select id="__ship_sett" class="shp_slct" name="sheapping">
                                    <option value="NOT">NO SHIPPING</option>
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
                                Currency
                            </h6>
                            <form method="post" id="_s_de">
                                <select id="__setdeid" class="dv_slct" name="devise">
                                    <option value="&dollar;">US dollar</option>
                                    <option value="&euro;">Euro</option>
                                    <option value="&pound;">Pound</option>
                                    <option value="CFA">Franc CFA</option>
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
                                <div class="l_div" data-entrie="theme" data-value="Simplify">
                                    <?php if(json_decode($this->getSData()[0]['theme'], true)[0]['theme'] === 'Simplify'):?>
                                        <a>&checkmark;</a>
                                    <?php endif;?>
                                    <img class="ict" id="light" src="<?= S_ASSETS?>images/svg/smile.png"
                                         alt="bag image">
                                    <p class="text-center mr-4">Simplify</p>
                                </div>

                                <div class="d_div" data-entrie="theme" data-value="Smart">
                                    <?php if(json_decode($this->getSData()[0]['theme'], true)[0]['theme'] === 'Smart'):?>
                                        <a>&checkmark;</a>
                                    <?php endif;?>
                                    <img class="ict" id="dark" src="<?= S_ASSETS?>images/svg/smile.png"
                                         alt="bag image"/>
                                    <p class="text-center mr-4">Smart</p>
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
                                <select class="cn_slct set__th" name="columb" data-entrie="cn">
                                    <option value="<?=json_decode($this->getSData()[0]['theme'], true)[0]['cn']?>">
                                        <?= json_decode($this->getSData()[0]['theme'], true)[0]['cn']?>
                                    </option>
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
                                Color
                            </h6>

                            <div id="_s_fc">
                                <h5 class="__pn" data-entrie="pnc">Product name</h5>
                                <h5 class="__prc" data-entrie="pc">Price</h5>
                                <h5 class="__op" data-entrie="ppc">Promo price</h5>
                                <h5 class="__slc" data-entrie="slc">Color / Size</h5>
                                <h5 class="__btns" data-entrie="btnc">Button</h5>
                                <h5 class="__btns" data-entrie="wm">Welcome Message</h5>
                                <h5 class="__btns" data-entrie="sm">Short Message</h5>

                                <form class="colr form-group" method="post">
                                    <input type="button" title="green" name="sett_green" class="sett_green" data-color_code="#55bf6d">
                                    <input type="button" title="bleu" name="sett_bleu" class="sett_bleu" data-color_code="#4169e1">
                                    <input type="button" title="orange" name="sett_orange" class="sett_orange" data-color_code="#ff7f50">
                                    <input type="button" title="darkcyan" name="sett_cyan" class="sett_Dcyan" data-color_code="#07b4b4">
                                    <input type="button" title="crimson" name="sett_crimson" class="sett_crimson" data-color_code="#dc143c">
                                    <input type="button" title="violet" name="sett_violet" class="sett_violet" data-color_code="#b509a3">
                                    <input type="button" title="black" name="sett_black" class="sett_black" data-color_code="#000">
                                    <input type="button" title="gray" name="sett_black" class="sett_gray" data-color_code="#5e5d5d">
                                    <input type="button" title="white" name="sett_white" class="sett_white" data-color_code="#fff">
                                    <input type="button" title="cyan" name="sett_cyan" class="sett_cyan" data-color_code="#00ffff">
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
                                <select class="hp_slct set__th" name="homepage" data-entrie="hp">
                                    <option value="<?=json_decode($this->getSData()[0]['theme'], true)[0]['hp']?>">
                                        <?= json_decode($this->getSData()[0]['theme'], true)[0]['hp']?>
                                    </option>
                                    <option value="Product page">Product page</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <?php
            function chk($bool){
                if($bool === 'true'){echo 'checked';}
                echo '';
            }
        ?>
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
                                <input type="text"
                                       id="__setSkinp"
                                       value="<?= $this->getSData()[0]['shop_key']?>"
                                       name="in_sk"
                                       class="sett_inSk"
                                       placeholder="10 characters min"
                                       minlength="10">
                                <input id="__skbtn" type="submit" name="in_submt" class="sett_i_Sav" value="SAVE">
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
                                <h4><b></b></h4>

                                <div>Name
                                    <span>
                                        <input data-b="confidentiality" data-xiss="name"
                                               <?php chk(json_decode($this->getSData()[0]['confidentiality'], true)[0]['name'])?>
                                               value="<?= json_decode($this->getSData()[0]['confidentiality'], true)[0]['name']?>"
                                               type="checkbox" name="name" class="chk_nm">
                                    </span>
                                </div>
                                <div>Phone number
                                    <span>
                                        <input data-b="confidentiality" data-xiss="phone"
                                               <?php chk(json_decode($this->getSData()[0]['confidentiality'], true)[0]['phone'])?>
                                               value="<?= json_decode($this->getSData()[0]['confidentiality'], true)[0]['phone']?>"
                                               type="checkbox" name="ph" class="chk_ph">
                                    </span>
                                </div>
                                <div>E-mail
                                    <span>
                                        <input data-b="confidentiality" data-xiss="email"
                                               <?php chk(json_decode($this->getSData()[0]['confidentiality'], true)[0]['email'])?>
                                               value="<?= json_decode($this->getSData()[0]['confidentiality'], true)[0]['email']?>"
                                               type="checkbox" name="Eml" class="chk_eml">
                                    </span>
                                </div>
                                <div>Profil picture
                                    <span>
                                        <input data-b="confidentiality" data-xiss="pp"
                                               <?php chk(json_decode($this->getSData()[0]['confidentiality'], true)[0]['pp'])?>
                                               value="<?= json_decode($this->getSData()[0]['confidentiality'], true)[0]['pp']?>"
                                               type="checkbox" name="ppr" class="chk_ppr">
                                    </span>
                                </div>
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
                                <h4><b></b></h4>
                                <div>Product comment's
                                    <span>
                                        <input data-b="confidentiality" data-xiss="prod_cmt" type="checkbox"
                                               <?php chk(json_decode($this->getSData()[0]['confidentiality'], true)[0]['prod_cmt'])?>
                                               value="<?= json_decode($this->getSData()[0]['confidentiality'], true)[0]['prod_cmt']?>"
                                               name="p_cmt" id="p_cmt">
                                    </span>
                                </div>

                                <div>Shop comment's
                                    <span>
                                        <input data-b="confidentiality" data-xiss="shop_cmt" type="checkbox"
                                               <?php chk(json_decode($this->getSData()[0]['confidentiality'], true)[0]['shop_cmt'])?>
                                               value="<?= json_decode($this->getSData()[0]['confidentiality'], true)[0]['shop_cmt']?>"
                                               name="sp_cmt" id="sp_cmt">
                                    </span>
                                </div>
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
                                <textarea id="__shpruta_id" name="in_rl" class="sett_inRl"><?= $this->getSData()[0]['shop_rules']?></textarea>
                                <input id="__shpru_btnid" type="submit" name="rl_sbmt" class="sett_i_rl" value="SAVE">
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
                                <h4><b></b></h4>

                                <div>Visa/Mastercard
                                    <span>
                                        <input data-b="payment" data-xiss="visa"
                                               <?php chk(json_decode($this->getSData()[0]['payment'], true)[0]['visa'])?>
                                               value="<?= json_decode($this->getSData()[0]['payment'], true)[0]['visa']?>"
                                               type="checkbox" name="visa" class="visa">
                                    </span>
                                </div>

                                <div>Bank
                                    <span>
                                        <input data-b="payment" data-xiss="bank"
                                               <?php chk(json_decode($this->getSData()[0]['payment'], true)[0]['bank'])?>
                                               value="<?= json_decode($this->getSData()[0]['payment'], true)[0]['bank']?>"
                                               type="checkbox" name="bank" class="bank">
                                    </span>
                                </div>

                                <div>PayPal
                                    <span>
                                        <input data-b="payment" data-xiss="paypal"
                                               <?php chk(json_decode($this->getSData()[0]['payment'], true)[0]['paypal'])?>
                                               value="<?= json_decode($this->getSData()[0]['payment'], true)[0]['paypal']?>"
                                               type="checkbox" name="PayPal" class="PayPal">
                                    </span>
                                </div>

                                <div>Mtn Mobil money
                                    <span>
                                        <input data-b="payment" data-xiss="momo"
                                               <?php chk(json_decode($this->getSData()[0]['payment'], true)[0]['momo'])?>
                                               value="<?= json_decode($this->getSData()[0]['payment'], true)[0]['momo']?>"
                                               type="checkbox" name="Mobil" class="Mobil">
                                    </span>
                                </div>

                                <div>Orange money
                                    <span>
                                        <input data-b="payment" data-xiss="om"
                                               <?php chk(json_decode($this->getSData()[0]['payment'], true)[0]['om'])?>
                                               value="<?= json_decode($this->getSData()[0]['payment'], true)[0]['om']?>"
                                               type="checkbox" name="Orange" class="Orange">
                                    </span>
                                </div>

                                <div>YUP
                                    <span>
                                        <input data-b="payment" data-xiss="yup"
                                               <?php chk(json_decode($this->getSData()[0]['payment'], true)[0]['yup'])?>
                                               value="<?= json_decode($this->getSData()[0]['payment'], true)[0]['yup']?>"
                                               type="checkbox" name="YUP" class="YUP">
                                    </span>
                                </div>
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
                <button class="sett_btn_usg">60%</button>
            </span>

            <span class="them">
                <b>Theme</b>
                <button class="sett_btn_them">90%</button>
            </span>

            <span class="secur">
                <b>Security</b>
                <button class="sett_btn_secur">90%</button>
            </span>

            <span class="pay">
                <b>Payment</b>
                <button class="sett_btn_pay">50%</button>
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

