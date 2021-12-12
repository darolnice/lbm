<?php
//use Lbm\Partials\Partials;
$title = "Store";
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/service.css">

    <body>

        <section class="container">
            <div class="__our_serv">
                <div class="first__">
                    <div class="txt">
                        <h1>Our Services</h1>
                        <h6>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Aliquam animi aspernatur assumenda atque beatae blanditiis consectetur,
                            consequatur culpa distinctio dolore doloremque dolorum
                            eaque error eveniet ex hic id illo impedit iste maiores
                        </h6>
                    </div>

                    <div class="__s1_s2">
                        <div class="serv__1">
                            <img src="<?= S_ASSETS ?>images/svg/shop_black_24dp.svg" alt="">
                            <b>5485 USERS</b>
                            <p class="text-primary">E-Commerce</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="own_serv" data-goto="shop?name=lbm" class="btn_primary">Try it now</button>
                        </div>

                        <div class="serv__2">
                            <img src="<?= S_ASSETS ?>images/svg/info_black_24dp.svg" alt="">
                            <b>5485 USERS</b>
                            <p class="text-primary">Multi-Plateforme</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="own_serv" data-goto="" class="btn_primary">Try it now</button>
                        </div>
                    </div>
                </div>

                <div class="others___">
                    <div class="serv__3">
                        <img src="<?= S_ASSETS ?>images/svg/local_shipping_black_24dp.svg" alt="">
                        <b>5485 USERS</b>
                        <p class="text-primary">Shipping</p>
                        <p class="small">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                        </p>
                        <button id="own_serv" data-goto="" class="btn_primary">Try it now</button>
                    </div>

                    <div class="serv__4">
                        <img src="<?= S_ASSETS ?>images/svg/info_black_24dp.svg" alt="">
                        <b>5485 USERS</b>
                        <p class="text-primary">Hosting</p>
                        <p class="small">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                        </p>
                        <button id="own_serv" data-goto="" class="btn_primary">Try it now</button>
                    </div>

                    <div class="serv__5">
                        <img src="<?= S_ASSETS ?>images/svg/info_black_24dp.svg" alt="">
                        <b>5485 USERS</b>
                        <p class="text-primary">Developpement</p>
                        <p class="small">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                        </p>
                        <button id="own_serv" data-goto="" class="btn_primary">Try it now</button>
                    </div>

                    <div class="serv__6">
                        <img src="<?= S_ASSETS ?>images/svg/wb_cloudy_black_24dp.svg" alt="">
                        <b>5485 USERS</b>
                        <p class="text-primary">Cloud</p>
                        <p class="small">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                        </p>
                        <button id="own_serv" data-goto="" class="btn_primary">Try it now</button>
                    </div>
                </div>
            </div>

            <div class="__custumers_serv">
                <div class="first_block">
                    <div class="txt">
                        <h1>Custumers services</h1>

                        <h6>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Aliquam animi aspernatur assumenda atque beatae blanditiis consectetur,
                            consequatur culpa distinctio dolore doloremque dolorum
                            eaque error eveniet ex hic id illo impedit iste maiores
                        </h6>
                    </div>

                    <div class="__itms">
                        <div class="serv__1">
                            <img src="<?= S_ASSETS ?>images/svg/shop_black_24dp.svg" alt="">
                            <b>5485 USERS</b>
                            <p class="text-primary">E-Commerce</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="cust_ecom" class="btn_primary">Learn more</button>
                        </div>

                        <div class="serv__2">
                            <img src="<?= S_ASSETS ?>images/svg/home_repair_service_black_24dp.svg" alt="">
                            <b>5485 USERS</b>
                            <p class="text-primary">Prestations</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button class="btn_primary">Learn more</button>
                        </div>
                    </div>
                </div>

                <div class="rest__">
                    <div class="serv__3">
                        <img src="<?= S_ASSETS ?>images/svg/info_black_24dp.svg" alt="">
                        <b>5485 USERS</b>
                        <p class="text-primary">Informations</p>
                        <p class="small">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                        </p>
                        <button class="btn_primary">Learn more</button>
                    </div>

                    <div class="serv__4">
                        <img src="<?= S_ASSETS ?>images/svg/textsms_black_24dp.svg" alt="">
                        <b>5485 USERS</b>
                        <p class="text-primary">Chat</p>
                        <p class="small">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                        </p>
                        <button class="btn_primary">Learn more</button>
                    </div>

                    <div class="serv__5">
                        <img src="<?= S_ASSETS ?>images/svg/info_black_24dp.svg" alt="">
                        <b>5485 USERS</b>
                        <p class="text-primary">Social Network</p>
                        <p class="small">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                        </p>
                        <button class="btn_primary">Learn more</button>
                    </div>

                    <div class="serv__6">
                        <img src="<?= S_ASSETS ?>images/svg/info_black_24dp.svg" alt="">
                        <b>5485 USERS</b>
                        <p class="text-primary">Streaming</p>
                        <p class="small">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                        </p>
                        <button class="btn_primary">Learn more</button>
                    </div>
                </div>
            </div>

            <div class="presentation">
                <div class="pre_frst">
                    <div class="pre_txt">
                        <h1>E-Commerce</h1>

                        <h6>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Consequatur dolores esse impedit inventore laudantium modi
                            placeat quidem tempora! Ad aut dolor ex fugiat hic incidunt
                            ipsa labore laudantium libero maxime molestiae mollitia porro
                            praesentium quam reiciendis, unde veritatis vero voluptates.
                        </h6>
                    </div>

                    <div class="pre_buy">
                        <img src="<?= S_ASSETS ?>images/img/pet_care.png" alt="">
                        <b>925.485 USERS</b>
                        <p class="text-primary">Buy</p>
                        <p class="small">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Eligendi impedit iste, minus odio similique sunt.
                        </p>
                        <button id="serv_vc" class="btn_primary">View categories</button>
                    </div>
                </div>

                <div class="preSale__preShop" style="display: flex">

                    <div class="preSale_preImg">
                        <div class="pre_sale">
                            <img src="<?= S_ASSETS ?>images/img/pet_care.png" alt="">
                            <b>59.495 USERS</b>
                            <p class="text-primary">Sale</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Minus impedit iste,  Eligen diodio similique sunt.
                                hipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Kligendi impedit iste, minus odio similique sunt.
                            </p>

                            <div class="step__">
                                <ol class="small">
                                    Step 1
                                    <li>Choose your country</li>
                                    <li>Choose your genre</li>
                                    <li>Enter your username</li>
                                    <li>Enter your phone number</li>
                                    <li>Enter your e-mail</li>
                                    <li>Enter your password</li>
                                    <li>Confirm your password</li>
                                    <li>Click on next</li>
                                </ol>

                                <ol class="small">
                                    Step 2
                                    <li>Enter your business name</li>
                                    <li>Choose your city</li>
                                    <li>Choose type of your business</li>
                                    <li>Enter your business desciption</li>
                                    <li>Enter your official business id</li>
                                    <li>Generate one business key (Optional)</li>
                                    <li>Choose your plan</li>
                                    <li>Enter your cover image after this submit</li>
                                </ol>
                            </div>

                            <button id="t_i_n" class="btn_primary">Try it now</button>
                        </div>

                        <div class="pre_sale_img">
                            <img src="<?= S_ASSETS ?>images/img/Capture d’écran 2021-10-11 085037.png" alt="">
                            <img src="<?= S_ASSETS ?>images/img/Capture d’écran 2021-10-11 085319.png" alt="">
                        </div>
                    </div>

                    <div class="preShop">
                        <div >
                            <img src="<?= S_ASSETS ?>images/img/pet_care.png" alt="">
                            <b>925.485 USERS</b>
                            <p class="text-primary">Electronic</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="__elec" class="btn_primary">View shop list</button>
                        </div>

                        <div>
                            <img src="<?= S_ASSETS ?>images/img/pet_care.png" alt="">
                            <b>925.485 USERS</b>
                            <p class="text-primary">Accessories</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="__acce" class="btn_primary">View shop list</button>
                        </div>

                        <div>
                            <img src="<?= S_ASSETS ?>images/img/pet_care.png" alt="">
                            <b>925.485 USERS</b>
                            <p class="text-primary">Sport</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="__spor" class="btn_primary">View shop list</button>
                        </div>

                        <div>
                            <img src="<?= S_ASSETS ?>images/img/pet_care.png" alt="">
                            <b>925.485 USERS</b>
                            <p class="text-primary">Mode</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="__md" class="btn_primary">View shop list</button>
                        </div>

                        <div>
                            <img src="<?= S_ASSETS ?>images/img/pet_care.png" alt="">
                            <b>925.485 USERS</b>
                            <p class="text-primary">Men</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="__men" class="btn_primary">View shop list</button>
                        </div>

                        <div>
                            <img src="<?= S_ASSETS ?>images/img/pet_care.png" alt="">
                            <b>925.485 USERS</b>
                            <p class="text-primary">Woman</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="__wmn" class="btn_primary">View shop list</button>
                        </div>

                        <div>
                            <img src="<?= S_ASSETS ?>images/img/pet_care.png" alt="">
                            <b>925.485 USERS</b>
                            <p class="text-primary">Children's</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="__chld" class="btn_primary">View shop list</button>
                        </div>

                        <div>
                            <img src="<?= S_ASSETS ?>images/img/pet_care.png" alt="">
                            <b>925.485 USERS</b>
                            <p class="text-primary">Health</p>
                            <p class="small">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Eligendi impedit iste, minus odio similique sunt.
                            </p>
                            <button id="__health" class="btn_primary">View shop list</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- scripts start -->
        <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
        <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
        <script src="<?= S_ASSETS?>js/Index.js"></script>
        <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
        <!-- scripts end -->
    </body>

<?php Partials::showFooter();?>