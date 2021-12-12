<?php
//    use Lbm\Annonces\MgrAnnonces;
//    use Lbm\Partials\Partials;
    $title = "Annonces"
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/annonces.css">


<body>
    <section id="add_ann_sec" class="container" style="display: none">
        <form method="post" class="form-group" id="post_ann_form">
            <p>Personnal informations</p>
            <input type="text" name="name" required value="<?= $_SESSION['username']?>" placeholder="Name">
            <input type="text" name="phone" required value="<?= $_SESSION['phone']?>" placeholder="Phone number">
            <input type="text" name="email"  required value="<?= $_SESSION['email']?>" placeholder="E-mail">
            <select type="text" name="city" required>
                <option value="NEW YORK">Douala</option>
                <option value="NEW YORK"><?= $_SESSION['city']?></option>
            </select><br>

            <p>Products informations</p>
            <label for="ann_prod_name">Name
                <input type="text" name="ann_prod_name" id="ann_prod_name" required>
            </label>

            <label for="ann_prod_qte">Quantity
                <input type="number" name="ann_prod_qte" id="ann_prod_qte" required>
            </label>

            <label for="ann_prod_price">Unit price
                <input type="text" name="ann_prod_price" id="ann_prod_price" required>
            </label>

            <label for="ann_prod_qly">Quality
                <select type="text" name="ann_prod_qly" id="ann_prod_qly" required>
                    <option value="New">NEW</option>
                    <option value="Occasion">OCCASION</option>
                </select>
            </label>

            <label for="ann_prod_color">Color
                <input type="text" name="ann_prod_color" id="ann_prod_color" required>
            </label>

            <label for="ann_prod_size">Size
                <input type="text" name="ann_prod_size" id="ann_prod_size" required>
            </label>

            <label for="ann_prod_cmt">Other comment's
                <textarea type="text" name="ann_prod_cmt" id="ann_prod_cmt" rows="4"></textarea>
            </label>

            <button type="button" id="ann_cancel_btn">&times</button>
            <button type="submit" id="ann_post_btn" name="add_annonce">POST</button>
        </form>
    </section>

    <section id="res_ann_sec" class="container" style="display: block">
        <?php if (!$_SESSION["saller_id"]): ?>
            <div class="inf_ans" style="display: none">
                LOGIN FOR ANSWER IF YOU ALREADY HAVE ACCOUNT, ELSE CREATE YOUR BUSINESS ACCOUNT
                <div class="inf_ans_btn">
                    <button id="bcs__" class="becom_saler">SIGN UP</button>
                    <button id="lg__" class="log__">LOGIN</button>
                </div>
            </div>

            <button id="add_ann_btn__">ADD YOUR ANNONCES</button>
        <?php endif;?>

        <?php for ($i=0; $i<count($this->getAnnonceData()); $i++): ?>
            <div class="__annonce">
                <div class="personnal_ann_info">
                    <div class="annc_im_div">
                        <img src="<?= S_ASSETS?>images/svg/person_black_24dp.svg" alt="user image">
                    </div>

                    <p class="annc_name"><?= $this->getAnnonceData()[$i]->user_name?></p>
                    <?php if ($_SESSION["saller_id"]): ?>
                        <p class="annc_phone"><?= $this->getAnnonceData()[$i]->phone_number?></p>
                        <strong class="annc_mail"><?= $this->getAnnonceData()[$i]->email?></strong>
                        <strong class="annc_city"><?= $this->getAnnonceData()[$i]->country?></strong>
                        <strong class="annc_country"><?= $this->getAnnonceData()[$i]->city?></strong>
                    <?php else:?>
                        <p class="annc_phone"><?= '69**********'?></p>
                        <p class="annc_mail"><?= '***@mail.com'?></p>
                        <p class="annc_mail"><?= $this->getAnnonceData()[$i]->country?></p>
                        <p class="annc_mail"><?= $this->getAnnonceData()[$i]->city?></p>
                    <?php endif;?>

                    <b>Add at</b>
                    <b class="annc_add_at"> <?= $this->getAnnonceData()[$i]->add_at?></b>

                    <button id="res_ann" class="small">ANSWER</button>
                </div>

                <div class="ann__details">
                   <b class="ml-1" style="color: white">About product</b>
                    <ul class="tab-content">
                        <li class="annc_prod_name">
                            <b>Product name :</b><br>
                            <h6><?= $this->getAnnonceData()[$i]->prod_name?></h6>
                        </li>

                        <li class="annc_price">
                            <b>Price :</b><br>
                            <h6><?= $this->getAnnonceData()[$i]->price .'$'?></h6>
                        </li>

                        <li class="annc_qte">
                            <b>Quantity :</b><br>
                            <h6><?= $this->getAnnonceData()[$i]->quantity?></h6>
                        </li>

                        <li class="annc_size">
                            <b>Size :</b><br>
                            <h6><?= $this->getAnnonceData()[$i]->size?></h6>
                        </li>

                        <li class="couleur">
                            <b>Color :</b><br>
                            <h6><?= $this->getAnnonceData()[$i]->color?></h6>
                        </li>

                        <li class="annc_nature">
                            <b>Quality :</b><br>
                            <h6><?= $this->getAnnonceData()[$i]->quality?></h6>
                        </li>
                    </ul>
                </div>

                <div class="img__block">
                    <img src="<?= S_ASSETS ?>images/img/lite.jpg" alt="">
                    <img src="<?= S_ASSETS ?>images/img/lite.jpg" alt="">
                </div>

                <div class="resBlock">
                    <div class="responses">
                        <b id="res_ttl">Responses</b>
                        <ul class="res_ul">
                            <?php
                            $responses = array_reverse((new MgrAnnonces)->showResponses($this->getAnnonceData()[$i]->id, $this->getAnnonceData()[$i]->user_name));
                            ?>
                            <?php for($r=0; $r<count($responses); $r++):?>
                                <li id="res_li">
                                    <a href="shop?name=<?= $responses[$r]['shop_name']?>"><?= $responses[$r]['shop_name']?></a>
                                    <b><?= $responses[$r]['add_at']?></b>
                                    <h6><?= $responses[$r]['response']?></h6>
                                </li>
                            <?php endfor;?>
                        </ul>
                    </div>

                    <?php if ($_SESSION["saller_id"]): ?>
                        <form id="answer_form" method="post" class="form-group">
                            <input class="c_id"
                                   style="display: none"
                                   type="hidden"
                                   name="annonceur"
                                   value="<?= $this->getAnnonceData()[$i]->user_name?>">

                            <input class="c_id"
                                   style="display: none"
                                   type="hidden"
                                   name="annonce_id"
                                   value="<?= $this->getAnnonceData()[$i]->id?>">

                            <label for="answer"></label>

                            <div class="d-block position-relative">
                                <textarea id="answer"
                                          name="answer"
                                          rows="3" maxlength="120"
                                          placeholder="Your response..."
                                          required></textarea>

                                <button type="submit"
                                        id="post__res__"
                                        name="answer_btn"
                                        data-annonce_id="<?= $this->getAnnonceData()[$i]->id?>"
                                        data-annonceur="<?= $this->getAnnonceData()[$i]->user_name?>">>>
                                </button>
                            </div>
                        </form>
                    <?php endif;?>
                </div>
            </div>
        <?php endfor;?>
    </section>

    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/annonces.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>

<?php Partials::showFooter();?>


