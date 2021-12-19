<?php
//use Lbm\Functions\Functions;
//use Lbm\Partials\Partials;
$title = "Home"
?>
<?php include_once 'partials/_header.view.php';?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/home.css">


<body>
    <section class="scn1">
        <div class="diapo">
            <div class="elements">
                <div class="div_pub">
                    <div class="div_1">
                        <img src="<?= S_ASSETS?>images/img/free_plan.png" alt="product">
                        <div class="caption">
                            <h1>image 1</h1>
                            <p>Lorem ipsum dolor sit amet, repudiandae?</p>
                        </div>
                    </div>
                </div>

                <div class="div_pub">
                    <div class="div_2">
                        <img src="<?= S_ASSETS?>images/img/a_plans.png" alt="product">
                        <div class="caption">
                            <h1>image 2</h1>
                            <p>Lorem ipsum dolor sit amet, repudiandae?</p>
                        </div>
                    </div>
                </div>

                <div class="div_pub">
                    <div class="div_3">
                        <img src="<?= S_ASSETS?>images/img/btc.jpg" alt="product">
                        <div class="caption">
                            <h1>image 3</h1>
                            <p>Lorem ipsum dolor sit amet, repudiandae?</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="nav_left"><img src="<?= S_ASSETS?>images/svg/left-arrow.png" alt=""></div>
        <div id="nav_right"><img src="<?=  S_ASSETS?>images/svg/right-arrow.png" alt=""></div>
    </section>

    <section class="scn2">
        <article class="col-md-3">
            <div class="blg_f_div">
                <form method="get">
                    <input id="blg__ipt__" class="form-control" type="search" name="search" placeholder="SEARCH SHOP" required>
                    <button id="blg_btn_ipt" type="submit">Search</button>
                    <div class="hm_ss_div" id="home_ss_div"></div>
                </form>

                <div class="srtby">
                    <b>SORT BY</b>
                    <h6>Price
                        <form class="form-control-range" method="post" style="position: relative">
                            <a class="state_price"></a>
                            <a class="illimitate">&infin;</a>
                            <input class="barometre" type="range" min="0" max="100" value="100">
                        </form>
                    </h6>
                </div>
            </div>

            <div class="bshp_">
                <a class="bslg_art_t1">BEST SELLING</a>
                <ul class="ul1">
                    <?php for ($g=0; $g<count($this->getBestSaling()); $g++): ?>
                        <li>
                            <span>
                                <p>
                                     <a
                                        href="<?= 'product?id='.$this->getBestSaling()[$g]['id']."&shop=".Functions::SNFormatFront($this->getBestSaling()[$g]['shop_name'])?>"><?= $this->getBestSaling()[$g]['name']?>
                                     </a>
                                </p>

                                <b><?= Functions::SNFormatFront($this->getBestSaling()[$g]['name'])?></b>

                                <span class="strt">
                                    <?php for ($p=0; $p<$this->getBestSaling()[$g]['rating']; $p++): ?>
                                        <h6 style="color: #ec6206">&starf;</h6>
                                    <?php endfor; ?>
                                </span>
                            </span>
                        </li>
                    <?php endfor; ?>
                    <buttun id="_bslg_art_t1">VIEW MORE</buttun>
                </ul>

                <a class="bshp_art_t1">BEST SHOP</a>
                <ul class="ul1">
                    <?php for ($b=0; $b<count($this->getBestShop()); $b++): ?>
                        <li>
                            <span>
                                <p>
                                    <a href="<?= 'shop?name='.Functions::SNFormatFront($this->getBestShop()[$b]['name'])?>"><?= Functions::SNFormatFront($this->getBestShop()[$b]['name'])?></a>
                                </p>

                                <b><?=$this->getBestShop()[$b]['sale']?></b>

                                <span class="strt">
                                    <?php for ($b_=0; $b_<$this->getBestShop()[$b]['rating']; $b_++): ?>
                                        <h6 style="color: #ec6206">&starf;</h6>
                                    <?php endfor; ?>
                                </span>
                            </span>
                        </li>
                    <?php endfor; ?>
                    <buttun class="bshp_art_t1_vm">VIEW MORE</buttun>
                </ul>

                <a class="bst___art_t1">SPECIAL OFFER</a>
                <ul class="ul1">
                    <?php for ($i=0; $i<count($this->getSpecialOffer()); $i++): ?>
                        <li class="sp_of_li" style="width: 100%!important;">
                            <img src="<?= S_ASSETS ?>images/upload/<?= $this->getSpecialOffer()[$i]['prod_img']?>" alt="">
                            <h6>
                                <a class="text-dark" href="<?= Functions::SNFormatFront($this->getSpecialOffer()[$i]['link'])?>"><?= $this->getSpecialOffer()[$i]['prod_name']?></a>
                            </h6>
                            <h6 class="text-primary"><?= $this->getSpecialOffer()[$i]['price']?>
                                <span><?= $this->getSpecialOffer()[$i]['reduce']?></span>
                            </h6>
                            <h6 class="small" style="font-size: 11.5px; padding: 0 10px 0 10px; line-height: 1.3">
                                <?= $this->getSpecialOffer()[$i]['message']?>
                            </h6>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </article>

        <div class="hpro">
            <div class="promo">
                <?php for ($i=0; $i<count($this->getSpecialPromoData()); $i++): ?>
                    <div class="hme_cont vu">
                        <div class="hme_prd_img_div">
                            <img class="hme_prd_image" src="<?= S_ASSETS?>images/upload/<?= $this->getSpecialPromoData()[$i]['img1']?>" alt="product">
                            <div class="hme_add">
                                <a href="<?= 'product?id='.$this->getSpecialPromoData()[$i]['prod_id']."&shop=".Functions::SNFormatFront($this->getSpecialPromoData()[$i]['shop_name'])?>">View Product</a>
                            </div>
                        </div>
                        <div class="hme_np">
                            <h4 class="hme_nm"><?= $this->getSpecialPromoData()[$i]['prod_name']?></h4>
                            <p class="hme_prc"><?= $this->getSpecialPromoData()[$i]['price'].Functions::getCurrency($this->getSpecialPromoData()[$i]['shop_name'])?>
                                <strong>
                                    <del>
                                        <?=$this->getSpecialPromoData()[$i]['promo'].Functions::getCurrency($this->getSpecialPromoData()[$i]['shop_name'])?>
                                    </del>
                                </strong>
                            </p>
                            <div class="prm_rating">
                                <p class="prm_rating_p">
                                    <?php for ($h=0; $h<$this->getSpecialPromoData()[$i]['rating']; $h++): ?>
                                        <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                    <?php endfor ?>
                                </p>
                                <b class="prm_rater" title="Rater"><?= 'raters '.$this->getSpecialPromoData()[$i]['rater']?></b>
                                <?php ($chk = new Functions)->isChk_home($this->getSpecialPromoData()[$i]['checked']);?>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="lbm_prod">
                <?php for ($l=0; $l<count($this->getLbmProdData()); $l++): ?>
                    <div class="lbm_hme_cont vu">
                        <div class="lbm_hme_prd_img_div">
                            <img class="lbm_hme_prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getLbmProdData()[$l]['img1']?>" alt="product">
                            <div class="lbm_hme_add vu">
                                <p class="home_vp">
                                    <a href="<?= 'product?id='.$this->getLbmProdData()[$l]['id']."&sub=".$this->getLbmProdData()[$l]['sub_category']."&shop=".Functions::SNFormatFront($this->getLbmProdData()[$l]['shop_name'])?>">View Product</a>
                                </p>
                            </div>
                        </div>

                        <div class="lbm_hme_np">
                            <h4 class="lbm_hme_nm"><?= $this->getLbmProdData()[$l]['prod_name']?></h4>
                            <p class="lbm_hme_prc"><?= $this->getLbmProdData()[$l]['price'].$this->getHShopPref()[0]['currency']?>
                                <strong>
                                    <del><?= $this->getLbmProdData()[$l]['promo'].$this->getHShopPref()[0]['currency']?></del>
                                </strong>
                            </p>

                            <div class="lbm_rating">
                                <p class="lbm_rating_p">
                                    <?php for ($r=0; $r<$this->getLbmProdData()[$l]['rating']; $r++): ?>
                                        <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                    <?php endfor ?>
                                </p>
                                <b class="lbm_rater" title="Rater">raters (<?= $this->getLbmProdData()[$l]['rater']?>)</b>
                                <?php (new Functions)->isChk_home($this->getLbmProdData()[$l]['checked']);?>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

            <form method="post" class="promo_nmber">
                <p>
                    <?php if ($_GET['page'] === null || $_GET['page'] === ''){
                        echo '1';
                        }else{
                            echo $_GET['page'];
                        }
                        $f = new Functions();
                        $NextPage = $f->nextPage(1, $_GET['page'], (int)(new Pagination)->totalCountFromAnyWhere("home_special_promo"));
                        $PrevPage = $f->prevPage();
                    ?>
                </p>

                <a type="submit" href="?page=<?= $PrevPage?>" class="promo_preview">Prev</a>
                <a type="submit" href="?page=<?= $NextPage?>" class="promo_nextview">Next</a>
            </form>
        </div>

        <?php include_once S_VIEWS.'partials/_best.view.php'?>
    </section>

    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="<?= S_ASSETS?>js/Home.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>

<?php Partials::showFooter();?>