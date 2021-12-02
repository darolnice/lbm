<?php
//use Lbm\Partials\Partials;
$title = "Reclamations";
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/reclamations.css">

    <body>

        <section class="container">
            <div class="rec__pre">
                <div class="rec_choose">
                    <button id="rec_cls" class="close">&times;</button>
                    <h6 class="mb-4">OPTIONS</h6>
                    <button class="small rec_sig_btn">Alert</button>
                    <button class="small rec_btn">Back product(s)</button>
                    <button class="small rec_resol_btn">Aboutissement</button>
                </div>

                <div class="rec_txt">
                    <h1 class="rec__ttl">Reclamations</h1>
                    <h6 class="rec__desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusantium aut commodi, cumque delectus ducimus est et
                        inventore ipsa. Ad assumenda deleniti harum hic quae sit?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Aut beatae eius id ipsum iure minus, neque obcaecati. Aliquid
                        animi corporis ducimus ipsam ipsum obcaecati perferendis,
                        quisquam sapiente sint ut vitae!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusantium aut commodi, cumque delectus ducimus est et
                        inventore ipsa. Ad assumenda deleniti harum hic quae sit?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Aut beatae eius id ipsum iure minus, neque obcaecati. Aliquid
                        animi corporis ducimus ipsam ipsum obcaecati perferendis,
                        quisquam sapiente sint ut vitae!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusantium aut commodi, cumque delectus ducimus est et
                        inventore ipsa. Ad assumenda deleniti harum hic quae sit?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Aut beatae eius id ipsum iure minus, neque obcaecati. Aliquid
                        animi corporis ducimus ipsam ipsum obcaecati perferendis,
                        quisquam sapiente sint ut vitae!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusantium aut commodi, cumque delectus ducimus est et
                        inventore ipsa. Ad assumenda deleniti harum hic quae sit?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Aut beatae eius id ipsum iure minus, neque obcaecati. Aliquid
                        animi corporis ducimus ipsam ipsum obcaecati perferendis,
                        quisquam sapiente sint ut vitae!
                    </h6>
                    <button class="pre_btn">GET STARTED</button>
                </div>

                <div class="rec_img">
                    <img src="<?= S_ASSETS ?>images/pet_care.png" alt="">
                </div>
            </div>

            <div class="rec__options">

                <div class="rec_sig">
                   <h6>Alert</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        At excepturi fuga ipsam iure iusto obcaecati provident quasi quis tenetur voluptatem?
                    </p>

                    <form id="alert_form_id" name="alert_form" class="form-group" method="post">
                        <p class="small">Alert informations</p>

                        <input type="text" name="s_name" placeholder="Enter full name" required>
                        <input type="email" name="s_email" placeholder="Enter your E-mail" required>
                        <input type="number" name="s_phone" placeholder="Enter your phone number" required>
                        
                        <p class="mt-4 small">Alert informations</p>

                        <select id="s_about" type="text" name="s_rec_about">
                            <option value="About us">About us</option>
                            <option value="About business custumers">About business custumers</option>
                            <option value="About one product">About one product</option>
                            <option value="Other">Other</option>
                        </select>
                        <input type="text" id="s_name_" name="s_busi_name" placeholder="Enter shop name" style="display: none">
                        <textarea type="text" name="s_rec_ta" rows="8" maxlength="200" required></textarea>

                        <input id="s_sbt_" class="rec_sig_sbt" type="submit" value="SEND" name="s_sbt">
                    </form>

                    <h6 class="confid">
                        <p>
                            Confidentiality
                        </p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad aperiam, dolore expedita fuga hic impedit ipsum libero porro quae quisquam
                        repellat ut velit voluptatum! Animi aspernatur consectetur fugiat, ipsa minus
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad aperiam, dolore expedita fuga hic impedit ipsum libero porro quae quisquam
                        repellat ut velit voluptatum! Animi aspernatur consectetur fugiat, ipsa minus
                        non officia quaerat recusandae repudiandae suscipit velit voluptas voluptatem?
                        Aliquam doloribus excepturi ipsa itaque natus numquam placeat unde vero voluptas!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad aperiam, dolore expedita fuga hic impedit ipsum libero porro quae quisquam
                        repellat ut velit voluptatum! Animi aspernatur consectetur fugiat, ipsa minus
                    </h6>
                </div>

                <div class="rec_back_prd">
                    <h6>Retouner un produit</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        At excepturi fuga ipsam iure iusto obcaecati provident quasi quis tenetur voluptatem?
                    </p>

                    <form id="bp_form" class="form-group" method="post" name="bp_form">
                        <p class="small">Personnal informations</p>

                        <input id="b_name" type="text" name="b_name" placeholder="Enter full name" required>
                        <input id="b_email" type="email" name="b_email" placeholder="Enter your E-mail" required>
                        <input id="b_phone" type="number" name="b_phone" placeholder="Enter your phone number" required>

                        <p class="mt-4 small">Product(s) informations</p>

                        <p class="mt-4 mb-1 small">Quantity</p>
                        <select id="b_qte" name="b_qte">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="more">More</option>
                        </select>
                        <input id="p_name" type="text" name="p_name" placeholder="Enter product(s) name separate with coma" required>

                        <p class="mt-4 mb-1 small">Reason</p>

                        <select id="b_reason" type="text" name="b_reason">
                            <option value="Produit de mauvais qualité">Produit de mauvaise qualité</option>
                            <option value="C'est pas ce que j'ai acheté">C'est pas ce que j'ai acheté</option>
                            <option value="livarison tardive">Livraison tardive</option>
                            <option value="Il ne me convient pas">Il ne me convient pas</option>
                            <option value="Produit defectueux">Produit endommagé</option>
                        </select>
                        <input id="b_busi_name" type="text" name="b_busi_name" placeholder="Enter shop name" required>
                        <input id="b_tid" type="text" name="b_tid" autocomplete="off" placeholder="Enter transaction id" required>

                        <p class="mt-4 mb-1 small">Select needled</p>
                        <select id="b_issu" type="text" name="b_issu">
                            <option value="Remboursement">Remboursement</option>
                            <option value="Remplacement">Remplacement</option>
                        </select>
                        <textarea id="rec_ta" type="text" name="rec_ta" rows="3" maxlength="200" required>Other observations...</textarea>

                        <input id="b_submit" name="b_submit" class="rec_sig_sbt" type="submit" value="SEND">
                    </form>

                    <h6 class="confid_">
                        <p>
                            Confidentiality
                        </p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad aperiam, dolore expedita fuga hic impedit ipsum libero porro quae quisquam
                        repellat ut velit voluptatum! Animi aspernatur consectetur fugiat, ipsa minus
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad aperiam, dolore expedita fuga hic impedit ipsum libero porro quae quisquam
                        repellat ut velit voluptatum! Animi aspernatur consectetur fugiat, ipsa minus
                        non officia quaerat recusandae repudiandae suscipit velit voluptas voluptatem?
                        Aliquam doloribus excepturi ipsa itaque natus numquam placeat unde vero voluptas!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad aperiam, dolore expedita fuga hic impedit ipsum libero porro quae quisquam
                        repellat ut velit voluptatum! Animi aspernatur consectetur fugiat, ipsa minus
                        non officia quaerat recusandae repudiandae suscipit velit voluptas voluptatem?
                        Aliquam doloribus excepturi ipsa itaque natus numquam placeat unde vero voluptas!
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad aperiam, dolore expedita fuga hic impedit
                        repellat ut velit voluptatum! Animi aspernatur consectetur fugiat, ipsa minus
                        non officia quaerat recusandae repudiandae suscipit velit voluptas voluptatem?
                        Aliquam doloribus excepturi ipsa itaque natus numquam placeat unde vero voluptas!
                    </h6>
                </div>

                <div class="rec_resol">
                    <h6>Aboutissement</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        At excepturi fuga ipsam iure iusto obcaecati provident quasi quis tenetur voluptatem?
                    </p>

                    <form id="aboutiss_id" name="abtss_name" class="form-group" method="post">
                        <input type="text" name="a_name" placeholder="Enter full name" required>
                        <input type="text" name="a_rec_id" placeholder="reclamation id" required>

                        <input id="a_sbt_" class="rec_sig_sbt" name="a_sbt" type="submit" value="ENTER">
                    </form>
                </div>

                <div class="rec_img">
                    <img src="<?= S_ASSETS ?>images/C10876760.jfif" alt="">
                </div>
            </div>
        </section>


        <!-- scripts start -->
        <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
        <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
        <script src="<?= S_ASSETS?>js/reclamations.js"></script>
        <script src="<?= S_ASSETS?>js/Index.js"></script>
        <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
        <!-- scripts end -->
    </body>

<?php Partials::showFooter();?>
