<link rel="stylesheet" href="<?= S_ASSETS?>css/partials/best..._.css">
<body>

<div class="__best__ row-cols-md-1" style="display: none;">


    <h4 class="best__ttl">Best</h4>
    <button class="close small">&times</button>

    <div class="best_p">
        <?php for ($v=0; $v<count($this->getBestSaling()); $v++): ?>
            <div class="best_cont vu">
                <div class="best_prd_img_div">
                    <img src="<?= S_ASSETS?>images/img/pet_care.png" alt="product">
                    <div class="best_add">
                        <a href="<?= 'product?id='.$this->getBestSaling()[$v]['id']."&shop=".$this->getBestSaling()[$v]['shop_name']?>">View Product</a>
                    </div>
                </div>


                <div class="best_np">
                    <h4 class="best_nm"><?= $this->getBestSaling()[$v]['name']?></h4>
                    <h4 class="best_nm"><?= "sale ".$this->getBestSaling()[$v]['sale']?></h4>
                    <p class="best_prc"><?= '$'.$this->getBestSaling()[$v]['price']?></p>

                    <div class="best_rating">
                        <p class="best_rating_p">
                            <?php for ($r=0; $r<$this->getBestSaling()[$v]['rating']; $r++): ?>
                                <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                            <?php endfor ?>
                        </p>
                        <b class="best_rater" title="Rater"><?= "raters ".$this->getBestSaling()[$v]['raters']?></b>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>

    <div class="best_s">
        <?php for ($s=0; $s<count($this->getBestShop()); $s++): ?>
            <div class="best_cont vu">
                <div class="best_prd_img_div">
                    <img src="<?= S_ASSETS?>images/pet_care.png" alt="product">
                    <div class="best_add">
                        <a href="<?= 'shop?name='.$this->getBestShop()[$s]['name']?>">View Shop</a>
                    </div>
                </div>


                <div class="best_np">
                    <h4 class="best_nm"><?= $this->getBestShop()[$s]['name']?></h4>
                    <p class="best_nm"><?= "sale ".$this->getBestShop()[$s]['sale']?></p><br>

                    <div class="best_rating">
                        <p class="best_rating_p">
                            <?php for ($r=0; $r<$this->getBestShop()[$s]['rating']; $r++): ?>
                                <a style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                            <?php endfor ?>
                        </p>
                        <b class="best_rater" title="Rater"><?= "raters ".$this->getBestShop()[$s]['raters']?></b>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>


<!-- scripts start -->
<script src="<?= S_ASSETS?>js/jquery.min.js"></script>
<script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->
</body>