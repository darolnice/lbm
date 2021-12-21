<?php
//    use Lbm\Annonces\MgrAnnonces;
//    use Lbm\Partials\Partials;
$title = "Best"
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/best.css">

    <body>
        <div class="__best__">
            <article class="row bst_art">
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
                            <h6 class="small">
                                <?= $this->getSpecialOffer()[$i]['message']?>
                            </h6>
                        </li>
                    <?php endfor; ?>
                </ul>
            </article>

            <div class="best_p">
                <h1 class="bttl">Best</h1>
                <?php for ($v=0; $v<count($this->getBest()); $v++): ?>
                    <div class="best_cont vu">
                        <div class="best_prd_img_div">
                            <img src="<?= S_ASSETS?>images/img/pet_care.png" alt="product">
                            <div class="best_add">
                                <a href="<?= 'product?id='.$this->getBest()[$v]['id']."&shop=".$this->getBest()[$v]['shop_name']?>">View Product</a>
                            </div>
                        </div>

                        <div class="best_np">
                            <h4 class="best_nm"><?= $this->getBest()[$v]['name']?></h4>
                            <h4 class="best_nm"><?= "sale ".$this->getBest()[$v]['sale']?></h4>

                            <?php if ($_GET['f'] === "sale"): ?>
                                <p class="best_prc"><?= '$'.$this->getBest()[$v]['price']?></p>
                            <?php else:?>
                                <br>
                            <?php endif;?>

                            <div class="best_rating">
                                <p class="best_rating_p">
                                    <?php for ($r=0; $r<$this->getBest()[$v]['rating']; $r++): ?>
                                        <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                                    <?php endfor ?>
                                </p>
                                <b class="best_rater" title="Rater"><?= "raters ".$this->getBest()[$v]['raters']?></b>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

        </div>

        <!-- scripts start -->
        <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
        <!-- scripts end -->
    </body>