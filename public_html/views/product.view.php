<?php
//use Lbm\Functions\Functions;
//use Lbm\Partials\Partials;
$title = "Product"
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/product.css">

<body class="body">

    <section class="prd_im1">
        <?php if (isset($_SESSION['username'])):?>
            <div class="blog_post___">
                <button class="close">&times;</button>
                <fieldset class="">
                    <legend class="small">Personnals informations</legend>
                    <input id="post_pd_name" type="text" name="name" placeholder="Enter your name" required value="<?= $_SESSION['username']?>" disabled>
                    <input id="post_pd_mail" type="email" name="email" placeholder="Enter your e-mail" required value="<?= $_SESSION['email']?>" disabled>
                </fieldset>

                <fieldset class="">
                    <legend class="small">Post</legend>
                    <textarea id="blogPostcmt" name="post" rows="6" required="required"></textarea>
                    <input id="add_blog_post" class="btn btn-primary text-center" type="submit" name="sbt" value="POST">
                </fieldset>
            </div>
        <?php endif;?>

        <div class="arbo">
            <a id="link__" href="<?= 'shop?name='.$_GET['shop']?>"><?= $_GET['shop']?></a>
            <b style="margin-top:-4px; margin-left:4px; color:black">&raquo;</b>
            <a id="arbo_pn"> Product name</a>
        </div>

       <div class="diapo__">
           <div class="all_img">
               <div class="prn_img">
                   <img id="" src="<?= S_ASSETS?>images/upload/<?= $this->getShopProdData()->img1?>" alt="product">
               </div>
               <div class="prn_img">
                   <img id="" src="<?= S_ASSETS?>images/upload/<?= $this->getShopProdData()->img2?>" alt="product">
               </div>
               <div class="prn_img">
                   <img id="" src="<?= S_ASSETS?>images/upload/<?= $this->getShopProdData()->img3?>" alt="product">
               </div>
               <div class="prn_img">
                   <img id="" src="<?= S_ASSETS?>images/upload/<?= $this->getShopProdData()->img4?>" alt="product">
               </div>
               <div class="prn_img">
                   <img id="" src="<?= S_ASSETS?>images/upload/<?= $this->getShopProdData()->img5?>" alt="product">
               </div>
           </div>

           <?php if (isset($_SESSION['username'])):?>
                <div id="options__"><img src="<?= S_ASSETS?>images/img/more-options.svg" alt=""></div>
           <?php endif;?>

           <div id="nav_left_"><img src="<?= S_ASSETS?>images/svg/left-arrow.png" alt=""></div>
           <div id="nav_right_"><img src="<?=  S_ASSETS?>images/svg/right-arrow.png" alt=""></div>
       </div>

       <div class="contner">
            <div class="carr" id="carousel1">
                <img class="im" src="<?= S_ASSETS?>images/upload/<?= $this->getShopProdData()->img2?>" alt="product">
            </div>

            <div class="carr" id="carousel2">
                <img class="im" src="<?= S_ASSETS?>images/upload/<?= $this->getShopProdData()->img3?>" alt="product">
            </div>

            <div class="carr" id="carousel3">
                <img class="im" src="<?= S_ASSETS?>images/upload/<?= $this->getShopProdData()->img4?>" alt="product">
            </div>

            <div class="carr" id="carousel4">
                <img class="im" src="<?= S_ASSETS?>images/upload/<?= $this->getShopProdData()->img5?>" alt="product">
            </div>
       </div>

       <div class="info">
           <p class="p_nm"><?= $this->getShopProdData()->prod_name;?></p>
           <p class="p_pce"><a><?= $this->getShopProdData()->price;?></a><sup><?= $this->getShopPref()[0]['currency'];?></sup>
                <del class="p_prom"><?= $this->getShopProdData()->promo;?></del><sup style="color: crimson" class="sp_promo"><?= $this->getShopPref()[0]['currency'];?></sup>
           </p>

           <p class="p_rt">
                <?php for ($m_=0; $m_<$this->getShopProdData()->rating; $m_++): ?>
                      <a data-count= "<?= $this->getShopProdData()->rating;?>" style="color: #ec6206; text-decoration:none!important;">&starf;</a>
                <?php endfor ?>
            </p>
           <p class="p_qte"><?= $this->getShopProdData()->quantity;?></p>
           <p class="p_typ"><?= $this->getShopProdData()->quality;?></p>
           <p class="p_carc"><?php ($this->getShopProdData()->checked == 1) ? print "Yes" : print "No";?></p>

           <form method="post">
               <input class="prod_data" type="hidden" name="prod_data">
               <input class="prod_key" type="hidden" name="prod_key">
               <input class="prod_cat" type="hidden" name="prod_key" value="<?= $this->getShopProdData()->category;?>">

               <div class="btn">
                   <button class="contant_saler">CONTACT MANAGER</button>
                   <input id="vw_cart" class="btn-lg" type="submit" name="bn" value="ADD TO CART">
               </div>

               <div class="clr__sze">
                   <?php $ck = explode(',', $this->getShopProdData()->color);?>
                   <?php $sk = explode(',', $this->getShopProdData()->size);?>

                   <select name="color" id="prd_clr">
                       <option value="">COLOR</option>
                       <?php foreach ($ck as $ck__):?>
                           <option value="<?= $ck__?>"><?= $ck__?></option>
                       <?php endforeach;?>
                   </select>
                   <select name="sze" id="prd_sze">
                       <option value="">SIZE</option>
                       <?php foreach ($sk as $sk__):?>
                           <option value="<?= $sk__?>"><?= $sk__?></option>
                       <?php endforeach;?>
                   </select>
               </div>

               <div class="qte__">
                   <button type="button" class="rem_prd">-</button>
                   <input  class="prd_count" type="text" name="prdQte" value="0">
                   <button type="button" class="add_prd">+</button>
               </div>
           </form>
           <div class="cntc_saler">
               <button class=""><img class="" src="<?= S_ASSETS?>images/svg/whatsapp_black_24dp.svg" alt="image"></button>
               <button class=""><img class="" src="<?= S_ASSETS?>images/svg/alternate_email_black_24dp.svg" alt="image"></button>
               <button class=""><img class="" src="<?= S_ASSETS?>images/svg/call_black_24dp.svg" alt="image"></button>
           </div>
       </div>
    </section>

    <section class="container lg_details">
        <div class="lt">
            <div class="pt_div">
                <span class="text"  data-v="pp_desc">Description</span>
                <span class="p_s_p" data-v="pp_p">Proprities</span>
                <span class="p_s_c" data-v="pp_c">Comments</span><br><br>
            </div>

            <div class="dpc">
                <p class="pp_desc">
                    <?= $this->getShopProdData()->description;?>
                </p>

                <p class="pp_p">
                    <?= $this->getShopProdData()->proprities;?>
                </p>

                <div class="pp_c">
                    <?php if($this->getShopPref()[0]['comments'] !== null): ?>
                        <?php for ($t=0; $t<count($this->getShopPref()); $t++):?>
                            <?php $cmm_ = array_reverse(json_decode($this->getShopPref()[$t]['comments'], true))?>
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
                        <?php endfor;?>
                    <?php endif;?>
                </div>
            </div>
        </div><br>

        <div class="same_sub_c">
            <?php if ($_GET['sub'] !== ''):?>
                <?php for ($i=0; $i<count($this->getData()); $i++): ?>
                <div class="sub_cont">
                    <div class="sub_prd_img_div">
                        <img class="sub_prd_image" src="<?= S_ASSETS.'images/upload/'.$this->getData()[$i]['img1']?>" alt="product">

                        <?php if ($this->getData()[$i]['color']): ?>
                            <?php $k = explode(',', $this->getData()[$i]['color']);?>
                            <form method="post" class="sub_color_size">
                                <select name="color" id="sub_prod_clr">
                                    <?php foreach ($k as $k__):?>
                                        <option value="<?= $k__?>"><?= $k__?></option>
                                    <?php endforeach;?>
                                </select>

                                <?php $pl = explode(',', $this->getData()[$i]['size']);?>
                                <select name="color" id="sub_prod_sze">
                                    <?php foreach ($pl as $pl__):?>
                                        <option value="<?= $pl__?>"><?= $pl__?></option>
                                    <?php endforeach;?>
                                </select>
                            </form>

                        <?php endif ?>
                    </div>

                    <div class="sub_np">
                        <?php (new Functions)->isChk($this->getData()[$i]['checked']);?>

                        <b class="sub_nm"><?= $this->getData()[$i]['prod_name'];?></b>

                        <p class="sub_prc"><?= $this->getData()[$i]['price'].$this->getShopPref()[0]['currency'];?>
                            <del class="sub_prom"><?= $this->getData()[$i]['promo'].$this->getShopPref()[0]['currency'];?></del>
                        </p>

                        <span class="sub_r_span">
                        <?php for ($r=0; $r<$this->getData()[$i]['rating']; $r++): ?>
                            <a style="color: #ec6206; text-decoration:none!important; font-size: 12px">&starf;</a> 
                        <?php endfor ?>
                    </span>
                        <b class="sub_rater"><?= $this->getData()[$i]['rater']?></b>
                        <p class="sub_desc"><?= $this->getData()[$i]['proprities'];?></p>
                    </div>

                    <div class="sub_add">
                        <button class="sub_btn-group" id="sub_ad"
                                data-id="<?= $this->getData()[$i]['id'];?>"
                                data-name="<?= $this->getData()[$i]['prod_name'];?>"
                                data-price="<?= $this->getData()[$i]['price'];?>"
                                data-qte="<?= $this->getData()[$i]['quantity'];?>">BUY NOW</button>
                        <?php
                             $v = explode('=', $_SERVER['REQUEST_URI']);
                        ?>
                        <a class="sub_btn-group" href="product?id=<?= $this->getData()[$i]['id']?>&sub=<?= $this->getData()[$i]['sub_category']?>&shop=<?= array_pop($v) ?>">VIEW PRODUCT</a>
                    </div>

                </div>
            <?php endfor ?>
            <?php endif;?>
        </div>
    </section>

    <div class="chat">
        <button class="close chat_close">&times;</button>
        <img src="<?= S_ASSETS ?>images/img/lite.jpg" alt="">
        <a>En ligne</a>
        <div class="exchange">
            <?php for($m=0; $m<1; $m++): ?>
                <p class="from_me">wouerrr</p>
            <?php endfor;?>
        </div>
        <form class="form-group" method="post">
            <input id="slr" name="addby" type="hidden" value="<?= $this->getShopProdData()->add_by?>">
            <textarea id="chatbtn_s_m_name_f" name="chat_name" maxlength="200" placeholder="Your Message..." required></textarea>
            <button id="btn_s_m" type="submit">Send</button>
        </form>
    </div>

    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="<?= S_ASSETS?>js/product.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>

<?php Partials::showFooter();?>
