<?php
//use Lbm\Partials\Partials;
$title = "Blog"
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/blog.css">


    <body>

        <section class="container" id="c___">

            <section class="container" id="blog__sec1">
                <h2>Blog</h2>

                <?php for ($s=0; $s<count($this->getBlogData()); $s++):?>
                    <div class="blog_v">
                    <div class="blog__img_">
                        <img class="___img0" src="<?= S_ASSETS?>images/lite.jpg" alt="">
                    </div>

                    <div class="poster_info_div">
                        <div class="poster_img_div">
                            <img class="___img" src="<?= S_ASSETS?>images/lite.jpg" alt="">
                        </div>

                        <div class="posted__at">
                            <p class="blg_stt">About Product</p>
                            <p class="blg_stt___"><?= $this->getBlogData()[$s]['prod_name']?></p>
                            <p class="blg_stt____"><?= $this->getBlogData()[$s]['price']. " US$"?></p>
                            <p class="blg_stt_____">
                                <?php for ($sr=0; $sr<$this->getBlogData()[$s]['rate']; $sr++):?>
                                <a data-count= "<?= $this->getShopProdData()->rating;?>" style="color: #ec6206; text-decoration:none!important;">&starf;
                                    <?php endfor?>
                                </a>
                            </p>
                        </div>

                        <div class="poster_info">
                            <p class="blg_stt">About Post</p>
                            <p class="poster_info_">Posted at: <b><?= $this->getBlogData()[$s]['posted_at']?></b></p>
                            <p class="poster_info_">Name: <b><?= $this->getBlogData()[$s]['username']?></b></p>
                            <p class="poster_info_">E-mail: <b><?= $this->getBlogData()[$s]['email']?></b></p>
                        </div>

                        <?php if($this->getBlogData()[$s]['comments'] !== null): ?>
                        <?php $cmm_ = array_reverse(json_decode($this->getBlogData()[$s]['comments'], true))?>
                            <div class="other_cmt__">
                                <?php foreach ($cmm_ as $cm):?>
                                    <div class="more__blg_cmt">
                                        <div class="cmt__inf">
                                            <div class="cmt__img">
                                                <img src="<?= S_ASSETS?>images/lite.jpg" alt="">
                                            </div>

                                            <div class="blg__p__inf">
                                                <p><?= $cm['name']?></p>
                                                <h6><?= $cm['add_at']?></h6>
                                            </div>
                                        </div>
                                        <h5><br>
                                            <?= $cm['comment']?>
                                        </h5>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        <?php endif;?>
                    </div>

                    <div class="blog__post">
                        <h4>Post</h4>
                        <p>
                            <?= $this->getBlogData()[$s]['post']?>
                        </p>

                        <?php if($cmm_[0]['name'] !== null): ?>
                            <h3>Comment's</h3>

                            <div class="__blg_cmt">
                                <div class="cmt__inf">
                                    <div class="cmt__img">
                                        <img src="<?= S_ASSETS?>images/lite.jpg" alt="">
                                    </div>

                                    <div class="blg__p__inf">
                                        <p><?= $cmm_[0]['name']?></p>
                                        <h6><?= $cmm_[0]['add_at']?></h6>
                                    </div>
                                </div>
                                <h5>
                                    <?= $cmm_[0]['comment'] ?>
                                </h5>
                                <div class="blog__btn_post">
                                    <button class="blg__more_cmt">MORE COMMENT'S</button>
                                </div>
                            </div>
                        <?php endif;?>



                        <form method="post" class="form-group">
                            <textarea id="cmtform"
                                      class="form-control"
                                      name="blg_comment"
                                      maxlength="310"
                                      rows="4" required></textarea>
                            <input id="sendCmt"
                                   type="submit"
                                   data-pid="<?= $this->getBlogData()[$s]['id']?>"
                                   name="blg__sbt_cmt"
                                   value="SEND">
                        </form>
                    </div>
                </div>
                <?php endfor;?>

                <?php $limit = (new MgrProducts)->totalItem('blog_post')/2;
                      $prev = Functions::blogPrev($_GET['page'], $limit);
                      $next = Functions::blogNext($limit);
                ?>

                <div class="paginate">
                    <span class="pl-1 pr-1"><a href="?page=<?= $prev?>">&leftarrow;</a></span>
                    <?php for($ln=0; $ln<$limit; $ln++): ?>
                          <span><a href="?page=<?= $ln?>"><?= $ln?></a></span>
                    <?php endfor;?>
                    <span class="pl-1 pr-1"><a href="blog?page=<?= $next?>">&rightarrow;</a></span>
                </div>
            </section>

            <article class="blg__art__">
                <div class="blg_f_div">
                    <form method="get">
                        <input id="blg__ipt__" class="form-control" type="search" name="Search" placeholder="SEARCH" required>
                        <button id="blg_btn_ipt" type="submit">Search</button>
                    </form>
                    <div class="blogResDiv"></div>
                </div>

                <div class="blg_arc_cat">
                    <h6>Categories</h6><br>
                    <ul>
                        <li>
                            <a href="">Men</a> <h6>(<?= Functions::get_occurence("Men")?>)</h6>
                        </li>
                        <li>
                            <a href="">Woman</a> <h6>(<?= Functions::get_occurence("Woman")?>)</h6>
                        </li>
                        <li>
                            <a href="">Child</a> <h6>(<?= Functions::get_occurence("Child")?>)</h6>
                        </li>
                        <li>
                            <a href="">Accessories</a> <h6>(<?= Functions::get_occurence("Accessories")?>)</h6>
                        </li>
                        <li>
                            <a href="">Sport</a> <h6>(<?= Functions::get_occurence( "Sport")?>)</h6>
                        </li>
                        <li>
                            <a href="">Mode</a> <h6>(<?= Functions::get_occurence("Mode")?>)</h6>
                        </li>
                        <li>
                            <a href="">Health</a> <h6>(<?= Functions::get_occurence("Health")?>)</h6>
                        </li>
                        <li>
                            <a href="">Auto mobile</a> <h6>(<?= Functions::get_occurence("Automobile")?>)</h6>
                        </li>
                        <li>
                            <a href="">Electronic</a> <h6>(<?= Functions::get_occurence("Electronic")?>)</h6>
                        </li>
                    </ul>
                </div>

                <div class="blg_arc_res_post">
                    <h6>Recent Post</h6><br>
                    <ul>
                        <?php for ($j=0; $j<5; $j++): ?>
                            <li>
                                <a href="">
                                    <img src="<?= S_ASSETS?>images/lite.jpg" alt="">
                                    <h6><?=  $this->getBlogShowAll()[$j]['post'] ?></h6>
                                </a>
                            </li>
                        <?php endfor;?>
                    </ul>
                </div>

                <div class="blg_arc_res_cmt">
                    <h6>Recent Comment's</h6><br>
                    <ul>
                        <?php for($x=0; $x<5; $x++):?>
                            <?php
                                $nr_ = [];
                                if(json_decode($this->getBlogShowAll()[$x]['comments']) !== null){
                                    array_push($nr_, array_reverse(json_decode($this->getBlogShowAll()[$x]['comments'], true)));
                                }
                            ?>
                            <?php foreach($nr_ as $nv__):?>
                                <?php foreach($nv__ as $lk_):?>
                                    <li>
                                        <a href="">
                                            <img src="<?= S_ASSETS ?>images/lite.jpg" alt="">
                                            <span><?= $lk_['name']?></span>
                                            <h6><?= $lk_['comment']?></h6>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                            <?php endforeach;?>
                        <?php endfor;?>
                    </ul>
                </div>
            </article>

        </section>
<!--         scripts start -->
        <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
        <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
        <script src="<?= S_ASSETS?>js/blog.js"></script>
        <script src="<?= S_ASSETS?>js/Index.js"></script>
        <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!--        scripts end -->
    </body>

<?php Partials::showFooter();?>