<?php
//use Lbm\Functions\Functions;
//use Lbm\Partials\Partials;
$title = "Home"
?>
<?php include('partials/_header.view.php');?>
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
                            <a href="<?= 'product?id='.$this->getBestSaling()[$g]['id']."&shop=".$this->getBestSaling()[$g]['shop_name']?>"><?= $this->getBestSaling()[$g]['name']?></a>
                            <div>
                                <b style="margin-left: 50px; margin-right: 10px;"><?= $this->getBestSaling()[$g]['shop_name']?></b>
                                <?php for ($p=0; $p<$this->getBestSaling()[$g]['rating']; $p++): ?>
                                    <h6 class="strt" style="color: #ec6206">&starf;</h6>
                                <?php endfor; ?>
                            </div>
                        </li>
                    <?php endfor; ?>
                    <P id="_bslg_art_t1">VIEW MORE</P>
                </ul>

                <a class="bshp_art_t1">BEST SHOP</a>
                <ul class="ul1">
                    <?php for ($b=0; $b<count($this->getBestShop()); $b++): ?>
                        <li>
                            <a href="<?= 'shop?name='.$this->getBestShop()[$b]['name']?>"><?= $this->getBestShop()[$b]['name']?></a>
                            <div>
                                <b style="margin-left: 20px; margin-right: 30px;"><?=$this->getBestShop()[$b]['sale']?></b>
                                <?php for ($b_=0; $b_<$this->getBestShop()[$b]['rating']; $b_++): ?>
                                    <h6 class="strt" style="color: #ec6206">&starf;</h6>
                                <?php endfor; ?>
                            </div>
                        </li>
                    <?php endfor; ?>
                    <P class="bshp_art_t1_vm">VIEW MORE</P>
                </ul>

                <a class="bst___art_t1">SPECIAL PROMO</a>
                <ul class="ul1">
                    <?php for ($i=0; $i<5; $i++): ?>
                        <li>
                            <a href="">Samsung glx n4</a>
                        </li>
                    <?php endfor; ?>
                    <P>VIEW MORE</P>
                </ul>
            </div>
        </article>

        <div class="hpro">
            <div class="promo">
                <?php if (isset($_GET['sp'])): ?>
                    <?php for ($x=0; $x<count($this->getPromoFindprod()); $x++): ?>
                        <div class="hme_cont vu">
                            <div class="hme_prd_img_div">
                                <img class="hme_prd_image" src="<?= S_ASSETS?>images/img/caterpillar.jpeg" alt="product">
                                <div class="hme_add">
                                    <a href="<?= 'product?id='.$this->getPromoFindprod()[$x]['id']."&sub="."&shop=".$this->getPromoFindprod()[$x]['sub_category'].$this->getPromoFindprod()[$x]['shop_name']?>">View Product</a>
                                </div>
                            </div>
                            <div class="hme_np">
                                <h4 class="hme_nm"><?= $this->getPromoFindprod()[$x]['prod_name']?></h4>
                                <p class="hme_prc"><?= '$'.$this->getPromoFindprod()[$x]['price']?>
                                    <strong>
                                        <del><?= '$'.$this->getPromoFindprod()[$x]['promo']?></del>
                                    </strong>
                                </p>
                                <div class="prm_rating">
                                    <p class="prm_rating_p">
                                        <?php for ($o=0; $o<$this->getPromoFindprod()[$x]['rating']; $o++): ?>
                                            <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                        <?php endfor ?>
                                    </p>
                                    <b class="prm_rater" title="Rater"><?= 'raters '.$this->getPromoFindprod()[$x]['rater']?></b>
                                    <?php (new Functions)->isChk_home($this->getPromoFindprod()[$x]['checked']);?>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>

                <?php elseif (isset($_GET['Search'])):?>
                    <?php for ($i=0; $i<count($this->getPromoFindCat()); $i++): ?>
                        <div class="hme_cont vu">
                            <div class="hme_prd_img_div">
                                <img class="hme_prd_image" src="<?= S_ASSETS?>images/img/pet_care.png" alt="product">
                                <div class="hme_add">
                                    <a href="<?= 'product?id='.$this->getPromoFindCat()[$i]['id']."&sub=".$this->getPromoFindCat()[$i]['sub_category']."&shop=".$this->getPromoFindCat()[$i]['shop_name']?>">View Product</a>
                                </div>
                            </div>
                            <div class="hme_np">
                                <h4 class="hme_nm"><?= $this->getPromoFindCat()[$i]['prod_name']?></h4>
                                <p class="hme_prc"><?= '$'.$this->getPromoFindCat()[$i]['price']?>
                                    <strong>
                                        <del><?= '$'.$this->getPromoFindCat()[$i]['promo']?></del>
                                    </strong>
                                </p>
                                <div class="hme_rating">
                                    <p class="hme_rating_p">
                                        <?php for ($o=0; $o<$this->getPromoFindCat()[$i]['rating']; $o++): ?>
                                            <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                        <?php endfor ?>
                                    </p>
                                    <b class="prm_rater" title="Rater"><?= 'raters '.$this->getPromoFindCat()[$i]['rater']?></b>
                                    <?php ($chk = new Functions)->isChk_home($this->getPromoFindCat()[$i]['checked']);?>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>

                <?php else:?>
                    <?php for ($i=0; $i<count($this->getSpecialPromoData()); $i++): ?>
                        <div class="hme_cont vu">
                            <div class="hme_prd_img_div">
                                <img class="hme_prd_image" src="<?= S_ASSETS?>images/img/caterpillar.jpeg" alt="product">
                                <div class="hme_add">
                                    <a href="<?= 'product?id='.$this->getSpecialPromoData()[$i]['id']."&shop=".$this->getSpecialPromoData()[$i]['shop_name']?>">View Product</a>
                                </div>
                            </div>
                            <div class="hme_np">
                                <h4 class="hme_nm"><?= $this->getSpecialPromoData()[$i]['prod_name']?></h4>
                                <p class="hme_prc"><?= '$'.$this->getSpecialPromoData()[$i]['price']?>
                                    <strong>
                                        <del><?= '$'.$this->getSpecialPromoData()[$i]['promo']?></del>
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
                <?php endif;?>
            </div>

            <div class="lbm_prod">
                <?php if (isset($_GET['sp'])): ?>
                    <?php for ($x=0; $x<count($this->getSplbm()); $x++): ?>
                    <div class="hme_cont vu">
                        <div class="hme_prd_img_div">
                            <img class="hme_prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getSplbm()[$x]['img1']?>" alt="product">
                            <div class="hme_add">
                                <a href="<?= 'product?id='.$this->getSplbm()[$x]['id']."&sub=".$this->getSplbm()[$x]['sub_category']."&shop=".$this->getSplbm()[$x][' shop_name']?>">View Product</a>
                            </div>
                        </div>
                        <div class="hme_np">
                            <h4 class="hme_nm"><?= $this->getSplbm()[$x]['prod_name']?></h4>
                            <p class="hme_prc"><?= '$'.$this->getSplbm()[$x]['price']?>
                                <strong>
                                    <del><?= '$'.$this->getSplbm()[$x]['promo']?></del>
                                </strong>
                            </p>
                            <div class="prm_rating">
                                <p class="prm_rating_p">
                                    <?php for ($o=0; $o<$this->getSplbm()[$x]['rating']; $o++): ?>
                                        <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                    <?php endfor ?>
                                </p>
                                <b class="prm_rater" title="Rater"><?= 'raters '.$this->getSplbm()[$x]['rater']?></b>
                                <?php (new Functions)->isChk_home($this->getSplbm()[$x]['checked']);?>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>

                <?php elseif (!isset($_GET['Search'])): ?>
                    <?php for ($l=0; $l<count($this->getLbmProdData()); $l++): ?>
                        <div class="lbm_hme_cont vu">
                            <div class="lbm_hme_prd_img_div">
                                <img class="lbm_hme_prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getLbmProdData()[$l]['img1']?>" alt="product">
                                <div class="lbm_hme_add vu">
                                    <a href="<?= 'product?id='.$this->getLbmProdData()[$l]['id']."&sub=".$this->getLbmProdData()[$l]['sub_category']."&shop=".$this->getLbmProdData()[$l]['shop_name']?>">View Product</a>
                                </div>
                            </div>

                            <div class="lbm_hme_np">
                                <h4 class="lbm_hme_nm"><?= $this->getLbmProdData()[$l]['prod_name']?></h4>
                                <p class="lbm_hme_prc"><?= '$'.$this->getLbmProdData()[$l]['price']?>
                                    <strong>
                                        <del><?= '$'.$this->getLbmProdData()[$l]['promo']?></del>
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
                <?php else:?>
                    <?php for ($l=0; $l<count($this->getLbmFindCat()); $l++): ?>
                        <div class="lbm_hme_cont vu">
                            <div class="lbm_hme_prd_img_div">
                                <img class="lbm_hme_prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getLbmFindCat()[$l]['img1']?>" alt="product">
                                <div class="lbm_hme_add">
                                    <a href="<?= 'product?id='.$this->getLbmFindCat()[$l]['id']."&sub=".$this->getLbmFindCat()[$l]['sub_category']."&shop=".$this->getLbmFindCat()[$l]['shop_name']?>">View Product</a>
                                </div>
                            </div>

                            <div class="lbm_hme_np">
                                <h4 class="lbm_hme_nm"><?= $this->getLbmFindCat()[$l]['prod_name']?></h4>
                                <p class="lbm_hme_prc"><?= '$'.$this->getLbmFindCat()[$l]['price']?>
                                    <strong>
                                        <del><?= '$'.$this->getLbmFindCat()[$l]['promo']?></del>
                                    </strong>
                                </p>

                                <div class="lbm_rating">
                                    <p class="lbm_rating_p">
                                        <?php for ($r=0; $r<$this->getLbmFindCat()[$l]['rating']; $r++): ?>
                                            <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                        <?php endfor ?>
                                    </p>
                                    <b class="lbm_rater" title="Rater"><?= $this->getLbmFindCat()[$l]['rater']?></b>
                                    <?php (new Functions)->isChk_home($this->getLbmFindCat()[$l]['checked']);?>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif;?>
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
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="<?= S_ASSETS?>js/Home.js"></script>
    <script src="<?= S_ASSETS?>js/navhome.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>

<?php Partials::showFooter();?>