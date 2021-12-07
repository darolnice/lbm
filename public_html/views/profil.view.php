<?php
//use Lbm\Functions\Functions;
    $title = $_GET['name'];
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/profil.css">

<body>

    <section id="home_pre_sec1">
        <img id="img1_pre_sec1" src="<?= S_ASSETS?>images/upload/<?= $this->getProfilData()[0]['cover_image']?>" alt="investir">

        <div id="pre_cntnr">

            <div id="pre_p">
                <p class="reveal-1" id="sec1_pre_titre" style="color: <?= json_decode($this->getProfilData()[0]['theme'], true)[0]['wm']?>">
                Welcome to <?= $_GET['name']?>,
                    do your market easy
                </p>
                <p class="reveal-2" id="sec1_pre_desc" style="color: <?= json_decode($this->getProfilData()[0]['theme'], true)[0]['sm']?>!important;">
                    Découvrez comment ça marche et vous aussi financé votre projet
                    en toute simplicité avec des taux d'intéret inférieurs à 10%
                </p>
            </div>

            <div class="reveal-3" id="pre_encaiss_div">
                <button class="btn-lg" id="sec1_pre_btn_subs">Get Discount</button>
                <button class="btn-lg" id="sec1_pre_btn_cont">Contact us</button>
            </div>
        </div>
    </section>

    <section class="container reveal-2" id="pre_sec2">
        <div id="pre_depot_detail">
            <div id="pre_xpl">
                <img class="bnk" src="<?= S_ASSETS?>images/upload/<?= $this->getProfilData()[0]['snd_img']?>" alt="snd">
            </div>
            <h1 class="prof_ttl">About us</h1>
            <p>
               <?= $this->getProfilData()[0]['description'];?>
            </p>
        </div>
    </section>

    <section class="container reveal-2" id="sec4_stat">
        <p id="ttr">
            Some statistiques
        </p>

        <div id="stat_det_div">
            <p id="sucess">
                Taux de réussite
                <span>90%</span>
            </p>
            <div class="progress" id="progress1">
                <div class="progress-done" data-done="29" id="myBar"></div>
            </div>

            <p id="sucess">
                Taux d'intérets
                <span>5%</span>
            </p>
            <div class="progress" id="progress2">
                <div class="progress-done2" data-done="2" id="myBar2"></div>
            </div>

            <p id="sucess">
                Budget mensuel
                <span>40%</span>
            </p>
            <div class="progress" id="progress1">
                <div class="progress-done3" data-done="15" id="myBar3"></div>
            </div>
        </div>

        <div id="stat_det_div">
            <p id="sucess">
                Taux de réussite
                <span>95%</span>
            </p>
            <div class="progress" id="progress1">
                <div class="progress-done" data-done="35" id="myBar"></div>
            </div>

            <p id="sucess">
                Taux d'intérets
                <span>5%</span>
            </p>
            <div class="progress" id="progress2">
                <div class="progress-done2" data-done="2" id="myBar2"></div>
            </div>

            <p id="sucess">
                Budget mensuel
                <span>40%</span>
            </p>
            <div class="progress" id="progress1">
                <div class="progress-done3" data-done="15" id="myBar3"></div>
            </div>
        </div>
    </section>

    <section class="container reveal-2" id="credit_sec3">
        <?php for ($t=0; $t<count($this->getProfilData()); $t++):?>
        <?php if($this->getProfilData()[$t]['comments'] !== null): ?>
            <p id="cred_tes">Comment's</p>

            <?php $cmm_ = array_reverse(json_decode($this->getProfilData()[$t]['comments'], true))?>
                <?php foreach ($cmm_ as $cm):?>
                    <div id="ctn">
                        <img id="res1_img" src="<?= S_ASSETS?>images/img/lite.jpg" alt="person">

                        <div class="prof_nm">
                            <p id="res1_name"><?= $cm['name']?></p>
                            <p id="res1_mail"><?= $cm['email']?></p>
                            <p id="res1_rate">Rate
                                <?php for ($u=0; $u<$cm['rate']; $u++):?>
                                    <b class="strt ml-1" style="color: #ec6206">&starf;</b>
                                <?php endfor;?>
                            </p>
                        </div>

                        <div class="prof_cmt_rate">
                            <p id="res1_cmnt"><?= $cm['comment']?></p>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        <?php endfor;?>
    </section>

    <section class="container reveal-2" id="home_sec8">
        <div id="sec8_div1">
            <p id="ow_T">OUR TEAM</p>
        </div>

        <div id="sec8_serv">
            <div class="flex-lg-wrap" id="tl1">
                <div class="home-currency-item" id="tl1_div_title">
                    <h6 class="text-center" id="tl1_title">Market manger</h6>
                </div>
                <img id="sec8_img1_qg" src="<?= S_ASSETS?>images/upload/<?= $this->getProfilData()[0]['col_1_img']?>" alt="col1">
                <div class="home-currency-item-desc u_list" id="tl1_div_detail">
                    <h6 class="text-center" id="tl1_detail">Far far away, behind the word mountains,
                        far from the countries
                        Vokalia and Consonantia</h6>
                    <button id="ct1">CONTACT</button>
                </div>
            </div>

            <div class="flex-lg-wrap" id="tl2">

                <div class="home-currency-item" id="tl2_div_title">
                    <h6 class="text-center" id="s2_title">CEO</h6>
                </div>
                <img id="sec8_img2_qg" src="<?= S_ASSETS?>images/upload/<?= $this->getProfilData()[0]['ceo_img']?>" alt="ceo">
                <div class="home-currency-item-desc u_list" id="tl2_div_detail">
                    <h6 class="text-center" id="tl2_detail">Far far away, behind the word mountains,
                        far from the countries
                        Vokalia and Consonantia</h6>
                </div>
                <button id="ct2">CONTACT</button>
            </div>

            <div class="flex-lg-wrap" id="tl3">

                <div class="home-currency-item" id="tl3_div_title">
                    <h6 class="text-center" id="tl3_title">Logistique manger</h6>
                </div>
                <img id="sec8_img3_qg" src="<?= S_ASSETS?>images/upload/<?= $this->getProfilData()[0]['col_2_img']?>" alt="loggo">
                <div class="home-currency-item-desc u_list" id="s3_list">
                    <h6 class="text-center" id="tl3_detail">Far far away, behind the word mountains,
                        far from the countries
                        Vokalia and Consonantia</h6>
                </div>
                <button id="ct3">CONTACT</button>
            </div>
        </div>
    </section>

</body>


<footer class="container-fluid" id="p_footer">

    <div class="row-cols-sm-4 cols-md-2 tp">
        <div class="p_div">
            <a class="p_footer-logo" href=""><i class="fas fa-clipboard-check fa-4x"></i>logo</a>
            <p class="p_txt1">
                <?= $_GET['name']?> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Culpa dignissimos eligendi ipsam magnam omnis quidem repellendus tempora.
                Asperiores fuga fugit harum, impedit inventore
                iure minus natus nostrum quaerat sequi similique?
                Culpa dignissimos eligendi ipsam magnam omnis quidem repellendus tempora.
                Asperiores fuga fugit harum, impedit inventore
                iure minus natus nostrum quaerat sequi similique?
            </p>
        </div>

        <div class="p_footer_menu">
            <p id="p_menu">Menu</p>

            <ul id="p_ul_list">
                <li>
                    <a class="p_menulist">About us</a>
                </li>
                <li>
                    <a class="p_menulist">Our services</a>
                </li>
                <li>
                    <a class="p_menulist">Comments</a>
                </li>
                <li>
                    <a class="p_menulist">Our team</a>
                </li>
            </ul>
        </div>

        <div class="p_ft_sn_div">
            <p>Ours social network</p>
            <button class="p_ft_fbk">f</button>
            <button class="p_ft_twt">t</button>
        </div>

        <form name="prof_form" method="post" class="p_form">
            <p>Contact us</p>
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Enter your e-mail" required>
            <input type="text" name="subject" placeholder="Enter subject" required>
            <textarea rows="4" name="message" maxlength="500" required>Write your message...</textarea>
            <button id="prof_mail" type="submit" name="send" data-mail="<?= $this->getProfilData()[0]['email']?>">SEND</button>
        </form>
    </div>

    <div class="p_copyright_div">
           <span class="p_bottom-copyright">
                Copyright © 2001 | <?= $_GET['name']?> | All Rights Reserved
                <button class="p_btn_tc">Terms and conditions</button>
                <button class="p_btn_pc">Privacy Policy</button>
           </span>
    </div>



    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/profil.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</footer>


