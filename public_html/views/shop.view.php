<?php
//use Lbm\Functions\Functions;
//use Lbm\Partials\Partials;
$title = "Shop";?>

<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/shop.css">
<!--<link rel="stylesheet" href="--><?//= S_ASSETS?><!--css/home.css">-->

<body>
    <section class="both">
            <div class="welcome">
                <h2>Welcome to <?= $_GET['name']?> !</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="<?= 'profil?name='.$_GET['name']?>">About Us</a>
                </p>
            </div>

            <?php if(json_decode($this->getShopPref()[0]['theme'], true)[0]['theme'] === 'Smart'):?>
                <section id="smart_theme">
                    <?php if (isset($_GET['sp'])): ?>
                        <?php for ($i=0; $i<count($this->getSearchProdShop()); $i++): ?>
                            <div class="cont">
                                <div class="prd_img_div">
                                    <img class="prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getSearchProdShop()[$i]['img1']?>" alt="product">

                                    <?php if ($this->getSearchProdShop()[$i]['color']): ?>
                                        <?php $_ck = explode(',', $this->getSearchProdShop()[$i]['color']);?>
                                        <form method="post" class="form_color">
                                            <select name="color" id="prod_clr">
                                                <?php foreach ($_ck as $_k__):?>
                                                    <option value="<?= $_k__?>"><?= $_k__?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </form>
                                    <?php endif ?>

                                    <?php if ($this->getSearchProdShop()[$i]['size']): ?>

                                        <?php $k = explode(',', $this->getSearchProdShop()[$i]['size']);?>
                                        <form method="post" class="form_size">
                                            <select name="size" id="prod_sze">
                                                <?php foreach ($k as $k__):?>
                                                    <option value="<?= $k__?>"><?= $k__?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </form>
                                    <?php endif ?>
                                </div>

                                <div class="np">
                                    <?php $chk = new Functions();
                                    $chk->isChk($this->getSearchProdShop()[$i]['checked']);
                                    ?>

                                    <h4 class="nm"><?= $this->getSearchProdShop()[$i]['prod_name'];?></h4>
                                    <span class="sspp">
                                    <p class="ss_prc"><?= $this->getSearchProdShop()[$i]['price']. '$';?></p>
                                    <del class="ss_prc_prom"><?= $this->getSearchProdShop()[$i]['promo']. '$';?></del>
                                </span>

                                    <span class="r_span">
                                    <?php for ($r=0; $r<$this->getSearchProdShop()[$i]['rating']; $r++): ?>
                                        <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>                                    <?php endfor ?>
                                </span>
                                    <b class="rater" title="Rater"><?= $this->getSearchProdShop()[$i]['rater']?></b>
                                    <p class="desc"><?= $this->getSearchProdShop()[$i]['short_desc'];?></p>
                                </div>

                                <div class="add">

                                    <button class="btn-group" id="ad" style="display: block"
                                            data-id="<?= $this->getSearchProdShop()[$i]['id'];?>"
                                            data-name="<?= $this->getSearchProdShop()[$i]['prod_name'];?>"
                                            data-price="<?= $this->getSearchProdShop()[$i]['price'];?>"
                                            data-max="<?= $this->getSearchProdShop()[$i]['quantity'];?>"
                                            data-color="<?= $this->getSearchProdShop()[$i]['color'];?>"
                                            data-size="<?= $this->getSearchProdShop()[$i]['size'];?>"
                                            data-qte="<?= $this->getSearchProdShop()[$i]['quantity'];?>">BUY NOW</button>

                                    <a class="btn-group"
                                       style="background-color: <?= json_decode($this->getShopPref()[0]['theme'], true)[0]['btnc']?>"
                                       href="product?id=<?= $this->getSearchProdShop()[$i]['id'].'&sub='.$this->getSearchProdShop()[$i]['sub_category'].'&shop='.$_GET['name']?>">VIEW PRODUCT</a>
                                </div>
                            </div>
                        <?php endfor ?>

                    <?php elseif(isset($_GET['Search'])):?>
                        <?php for ($i=0; $i<count($this->getShopCatSort()); $i++): ?>
                            <div class="cont">

                                <div class="prd_img_div">
                                    <img class="prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getShopCatSort()[$i]['img1']?>" alt="product">

                                    <?php if ($this->getShopCatSort()[$i]['color']): ?>
                                        <?php $_ck = explode(',', $this->getShopCatSort()[$i]['color']);?>
                                        <form method="post" class="form_color">
                                            <select name="color" id="prod_clr">
                                                <?php foreach ($_ck as $_k__):?>
                                                    <option value="<?= $_k__?>"><?= $_k__?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </form>
                                    <?php endif ?>

                                    <?php if ($this->getShopCatSort()[$i]['size']): ?>

                                        <?php $k = explode(',', $this->getShopCatSort()[$i]['size']);?>
                                        <form method="post" class="form_size">
                                            <select name="size" id="prod_sze">
                                                <?php foreach ($k as $k__):?>
                                                    <option value="<?= $k__?>"><?= $k__?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </form>
                                    <?php endif ?>
                                </div>

                                <div class="np">
                                    <?php $chk = new Functions();
                                    $chk->isChk($this->getShopCatSort()[$i]['checked']);
                                    ?>

                                    <h4 class="nm"><?= $this->getShopCatSort()[$i]['prod_name'];?></h4>

                                    <p class="prc"><?= $this->getShopCatSort()[$i]['price']. '$';?>
                                        <del class="prc_prom"><?= $this->getShopCatSort()[$i]['promo']. '$';?></del>
                                    </p>

                                    <span class="r_span">
                                    <?php for ($r=0; $r<$this->getShopCatSort()[$i]['rating']; $r++): ?>
                                        <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>                                    <?php endfor ?>
                                </span>
                                    <b class="rater" title="Rater"><?= $this->getShopCatSort()[$i]['rater']?></b>
                                    <p class="desc"><?= $this->getShopCatSort()[$i]['short_desc'];?></p>
                                </div>

                                <div class="add">

                                    <button class="btn-group" id="ad" style="display: block"
                                            data-id="<?= $this->getShopCatSort()[$i]['id'];?>"
                                            data-name="<?= $this->getShopCatSort()[$i]['prod_name'];?>"
                                            data-price="<?= $this->getShopCatSort()[$i]['price'];?>"
                                            data-max="<?= $this->getShopCatSort()[$i]['quantity'];?>"
                                            data-color="<?= $this->getShopCatSort()[$i]['color'];?>"
                                            data-size="<?= $this->getShopCatSort()[$i]['size'];?>"
                                            data-qte="<?= $this->getShopCatSort()[$i]['quantity'];?>">BUY NOW</button>

                                    <a class="btn-group" href="product?id=<?= Functions::ShopPrdLink($this->getShopCatSort()[$i]['id'], $this->getShopCatSort()[$i]['sub_category'].'&shop='.$_GET['name'])?>">VIEW PRODUCT</a>
                                </div>
                            </div>
                        <?php endfor ?>

                    <?php else:?>
                        <?php for ($i=0; $i<count($this->getData()); $i++): ?>
                            <div class="cont">
                                <div class="prd_img_div">
                                    <img class="prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getData()[$i]['img1']?>" alt="product">

                                    <?php if ($this->getData()[$i]['color']): ?>
                                        <?php $h = explode(',', $this->getData()[$i]['color']);?>
                                        <form method="post" class="form_color">
                                            <select name="color" id="prod_clr"
                                                    style="background-color: <?= json_decode($this->getShopPref()[0]['theme'], true)[0]['slc']?>">>
                                                <?php foreach ($h as $h__):?>
                                                    <option value="<?= $h__?>"><?= $h__?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </form>
                                    <?php endif ?>

                                    <?php if ($this->getData()[$i]['size']): ?>
                                        <?php $k = explode(',', $this->getData()[$i]['size']);?>
                                        <form method="post" class="form_size">
                                            <select name="size" id="prod_sze"
                                                    style="background-color: <?= json_decode($this->getShopPref()[0]['theme'], true)[0]['slc']?>">
                                                <?php foreach ($k as $k__):?>
                                                    <option value="<?= $k__?>"><?= $k__?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </form>
                                    <?php endif ?>
                                </div>

                                <div class="np">
                                    <?php $chk = new Functions();
                                    $chk->isChk($this->getData()[$i]['checked']);
                                    ?>

                                    <h4 class="nm" style="color: <?= json_decode($this->getShopPref()[0]['theme'], true)[0]['pnc']?>">
                                        <?= $this->getData()[$i]['prod_name'];?></h4>

                                    <p class="prc" style="color: <?= json_decode($this->getShopPref()[0]['theme'], true)[0]['pc']?>">
                                        <?= $this->getData()[$i]['price']. $this->getShopPref()[0]['currency'];?>
                                        <del class="prc_prom" style="color: <?= json_decode($this->getShopPref()[0]['theme'], true)[0]['ppc']?>">
                                            <?= $this->getData()[$i]['promo']. $this->getShopPref()[0]['currency'];?>
                                        </del>
                                    </p>

                                    <span class="r_span">
                                <?php for ($r=0; $r<$this->getData()[$i]['rating']; $r++): ?>
                                    <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                <?php endfor ?>
                            </span>
                                    <b class="rater" title="Rater"><?= $this->getData()[$i]['rater']?></b>
                                    <p class="desc"><?= $this->getData()[$i]['proprities'];?></p>
                                </div>

                                <div class="add">
                                    <button class="btn-group" id="ad"
                                            style="display: block; background-color: <?= json_decode($this->getShopPref()[0]['theme'], true)[0]['btnc']?>"
                                            data-id="<?= $this->getData()[$i]['id'];?>"
                                            data-name="<?= $this->getData()[$i]['prod_name'];?>"
                                            data-price="<?= $this->getData()[$i]['price'];?>"
                                            data-max="<?= $this->getData()[$i]['quantity'];?>"
                                            data-color="<?= $this->getData()[$i]['color'];?>"
                                            data-size="<?= $this->getData()[$i]['size'];?>"
                                            data-qte="<?= $this->getData()[$i]['quantity'];?>">BUY NOW</button>

                                    <a class="btn-group"
                                       style="background-color: <?= json_decode($this->getShopPref()[0]['theme'], true)[0]['btnc']?>"
                                       href="product?id=<?= Functions::ShopPrdLink($this->getData()[$i]['id'], $this->getData()[$i]['sub_category'].'&shop='.$_GET['name'])?>">VIEW PRODUCT</a>
                                </div>
                            </div>
                        <?php endfor ?>

                    <?php endif;?>
                </section>

                <?php else:?>

                <section id="simplify_theme">
                    <?php if (isset($_GET['sp'])): ?>
                        <?php for ($x=0; $x<count($this->getSearchProdShop()); $x++): ?>
                            <div class="lbm_hme_cont vu">
                                <div class="hme_prd_img_div">
                                    <img class="hme_prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getSearchProdShop()[$x]['img1']?>" alt="product">
                                    <div class="hme_add">
                                        <a href="<?= 'product?id='.$this->getSearchProdShop()[$x]['id']."&sub=".$this->getSearchProdShop()[$x]['sub_category']."&shop=".$_GET['name']?>">View Product</a>
                                    </div>
                                </div>
                                <div class="hme_np">
                                    <h4 class="hme_nm"><?= $this->getSearchProdShop()[$x]['prod_name']?></h4>
                                    <p class="hme_prc"><?= '$'.$this->getSearchProdShop()[$x]['price']?>
                                        <strong>
                                            <del><?= '$'.$this->getSearchProdShop()[$x]['promo']?></del>
                                        </strong>
                                    </p>
                                    <div class="prm_rating">
                                        <p class="prm_rating_p">
                                            <?php for ($o=0; $o<$this->getSearchProdShop()[$x]['rating']; $o++): ?>
                                                <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                            <?php endfor ?>
                                        </p>
                                        <b class="prm_rater" title="Rater"><?= 'raters '.$this->getSearchProdShop()[$x]['rater']?></b>
                                        <?php (new Functions)->isChk_home($this->getSearchProdShop()[$x]['checked']);?>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                    <?php elseif (isset($_GET['Search'])): ?>
                        <?php for ($l=0; $l<count($this->getShopCatSort()); $l++): ?>
                            <div class="lbm_hme_cont vu">
                                <div class="lbm_hme_prd_img_div">
                                    <img class="lbm_hme_prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getShopCatSort()[$l]['img1']?>" alt="product">
                                    <div class="lbm_hme_add vu">
                                        <a href="<?= 'product?id='.$this->getShopCatSort()[$l]['id']."&sub=".$this->getShopCatSort()[$l]['sub_category']."&shop=".$_GET['name']?>">View Product</a>
                                    </div>
                                </div>

                                <div class="lbm_hme_np">
                                    <h4 class="lbm_hme_nm"><?= $this->getShopCatSort()[$l]['prod_name']?></h4>
                                    <p class="lbm_hme_prc"><?= '$'.$this->getShopCatSort()[$l]['price']?>
                                        <strong>
                                            <del><?= '$'.$this->getShopCatSort()[$l]['promo']?></del>
                                        </strong>
                                    </p>

                                    <div class="lbm_rating">
                                        <p class="lbm_rating_p">
                                            <?php for ($r=0; $r<$this->getShopCatSort()[$l]['rating']; $r++): ?>
                                                <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                            <?php endfor ?>
                                        </p>
                                        <b class="lbm_rater" title="Rater">raters (<?= $this->getShopCatSort()[$l]['rater']?>)</b>
                                        <?php (new Functions)->isChk_home($this->getShopCatSort()[$l]['checked']);?>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                    <?php else:?>
                        <?php for ($z=0; $z<count($this->getData()); $z++): ?>
                            <div class="lbm_hme_cont vu">
                                <div class="lbm_hme_prd_img_div">
                                    <img class="lbm_hme_prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getData()[$z]['img1']?>" alt="product">
                                    <div class="lbm_hme_add">
                                        <a href="<?= 'product?id='.$this->getData()[$z]['id']."&sub=".$this->getData()[$z]['sub_category']."&shop=".$_GET['name']?>">View Product</a>
                                    </div>
                                </div>

                                <div class="lbm_hme_np">
                                    <h4 style="color: <?= json_decode($this->getShopPref()[0]['theme'], true)[0]['pnc']?>"
                                        class="lbm_hme_nm"><?= $this->getData()[$z]['prod_name']?>
                                    </h4>

                                    <p style="color: <?= json_decode($this->getShopPref()[0]['theme'], true)[0]['pc']?>"
                                       class="lbm_hme_prc"><?= $this->getData()[$z]['price'].$this->getShopPref()[0]['currency']?>
                                        <strong>
                                            <del><?= $this->getData()[$z]['promo'].$this->getShopPref()[0]['currency']?></del>
                                        </strong>
                                    </p>

                                    <div class="lbm_rating">
                                        <p class="lbm_rating_p">
                                            <?php for ($r=0; $r<$this->getData()[$z]['rating']; $r++): ?>
                                                <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                            <?php endfor ?>
                                        </p>
                                        <b class="lbm_rater" title="Rater"><?= $this->getData()[$z]['rater']?></b>
                                        <?php (new Functions)->isChk_home($this->getData()[$z]['checked']);?>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                    <?php endif;?>
                </section>
            <?php endif;?>

            <article class="d-block">
                <div class="blg_f_div">
                    <form method="get">
                        <input id="blg__ipt__" class="form-control blg__ipt_s" type="search" name="search" placeholder="SEARCH SHOP" required>
                        <input id="blg_btn_ipt" type="submit" value="Search">
                        <div class="hm_ss_div_" id="home_ss_div_"></div>
                    </form>

                    <div class="srtby">
                        <b>SORT BY</b>
                        <h6>Price
                            <form class="form-control-range" method="post" style="position: relative">
                                <a class="state_price_"></a>
                                <a class="illimitate">&infin;</a>
                                <input class="barometre_" type="range" min="0" max="100" value="100">
                            </form>
                        </h6>
                    </div>
                </div>

                <div class="avis">
                    <a>COMMENT'S</a>
                    <?php for ($p=0; $p<4; $p++):?>
                        <img src="<?= S_ASSETS?>images/img/lite.jpg" alt="lite">
                        <h6>Darol</h6>
                        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, porro.</h5>
                    <?php endfor;?>
                    <button class="small">View all comment's</button>
                </div>

                <div class="bshp_">
                    <a class="bshp_art_t1">BEST SELLING</a>
                    <ul class="ul1">
                        <?php for ($i=0; $i<5; $i++): ?>
                            <li>
                                <a href="">Samsung glx n4</a>
                            </li>
                        <?php endfor; ?>
                        <P>VIEW MORE</P>
                    </ul>
                    <ul class="ul2">
                        <?php for ($i=0; $i<5; $i++): ?>
                            <li>
                                <a href="">Samsung glx n4</a>
                            </li>
                        <?php endfor; ?>
                    </ul>

                    <a class="bshp_art_t1">COMMING NEXT</a>
                    <ul class="ul1">
                        <?php for ($i=0; $i<5; $i++): ?>
                            <li>
                                <a href="">Samsung glx n4</a>
                            </li>
                        <?php endfor; ?>
                        <P>VIEW MORE</P>
                    </ul>
                    <ul class="ul2">
                        <?php for ($i=0; $i<5; $i++): ?>
                            <li>
                                <a href="">Samsung glx n4</a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </article>
    </section>

    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/Shop.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>

<?php Partials::showFooter();?>