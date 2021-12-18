<?php
//use Lbm\Functions\Functions;
//use Lbm\Partials\Partials;
$title = $_GET['name']." Shop";?>

<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/shop.css">

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
                </section>

            <?php else:?>

                <section id="simplify_theme">
                    <?php for ($z=0; $z<count($this->getData()); $z++): ?>
                        <div class="lbm_hme_cont vu">
                            <div class="lbm_hme_prd_img_div">
                                <img class="lbm_hme_prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getData()[$z]['img1']?>" alt="product">
                                <div class="shop_v_p">
                                    <p class="shop_v_p_lk">
                                        <a href="<?= 'product?id='.$this->getData()[$z]['id']."&sub=".$this->getData()[$z]['sub_category']."&shop=".$_GET['name']?>">View Product</a>
                                    </p>
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
                    <?php for ($p=0; $p<count(json_decode($this->getShopPref()[0]['comments'], true)); $p++):?>
                        <div class="shp_cmt_div">
                            <img src="<?= S_ASSETS?>images/img/lite.jpg" alt="lite">
                            <h6><?= json_decode($this->getShopPref()[0]['comments'], true)[$p]['name']?></h6>
                            <h5><?= json_decode($this->getShopPref()[0]['comments'], true)[$p]['comment']?></h5>
                        </div>
                    <?php endfor;?>
                    <button class="small" id="allcmt">View all comment's</button>
                </div>

                <div class="bshp_">
                    <a class="bshp_art_t1">BEST SELLING</a>
                    <ul class="ul1">
                        <?php for ($i=0; $i<5; $i++): ?>
                            <li>
                                <span>
                                    <a href="">Samsung galaxy note 10</a>
                                    <a>Sale (<?= 152?>)</a>
                                    <?php for ($r=0; $r<4; $r++): ?>
                                        <a style="color: #ec6206; text-decoration:none; margin-right: 2px">&starf;</a>
                                    <?php endfor ?>
                                </span>
                            </li>
                        <?php endfor; ?>
                    </ul>

                    <a class="bshp_art_t1">COMMING NEXT</a>
                    <ul class="ul1">
                        <?php for ($i=0; $i<5; $i++): ?>
                            <li>
                                <span>
                                    <a href="">Iphone 13 pro max</a>
                                    <a>Reserve (<?= 12?>)</a>
                                    <a>Price <?= '7500 USD'?></a>
                                </span>
                            </li>
                        <?php endfor; ?>
                        <button class="btn btn-primary btn-sm w-50 text-sm-center"
                                style="margin-left: -40px; font-size: 10px;">
                            RESERVE NOW
                        </button>
                    </ul>
                </div>
            </article>
    </section>

    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/Shop.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>

<?php Partials::showFooter();?>