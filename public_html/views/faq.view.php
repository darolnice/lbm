<?php
//use Lbm\Partials\Partials;
$title = "Faq"
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/faq.css">

    <body>

        <section class="mt-5 container">
            <div class="rec_choose">
                <button id="rec_cls" class="close">&times;</button>
                <h6 class="mb-4">Thank to answer our sondage</h6>
                <input id="pop_p" type="hidden" style="width: 1px; height: 1px; visibility: hidden">

                <p>
                    At the question : <br>
                    <b class="mt-2">Lorem ipsum dolor sit ametipsum dolor?</b><br><br>

                    Avez vous été satisfait de la réponse ou pas vraiment?
                </p>

                <button id="satis" class="small rec_sig_btn" type="button">Satisfait</button>
                <button id="no_satis" class="small rec_btn">Pas satisfait</button>
            </div>

            <h1 class="text_ttl">Frequently ask questions</h1>

            <div class="row jumbotron">
                <?php for ($r=0; $r<count($this->getFaq()); $r++): ?>
                    <article class="small mb-5 col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <h3 class="mb-1"><?= $this->getFaq()[$r]['question']?></h3>
                        <p><?= $this->getFaq()[$r]['response']?> </p>
                        <button class="btn btn-sm btn-primary w-50"
                                data-id ="<?=$this->getFaq()[$r]['id'] ?>">Sondage
                        </button>
                    </article>
                <?php endfor;?>
            </div>
        </section>

        <!-- scripts start -->
        <script src="<?= S_ASSETS?>js/Index.js"></script>
        <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
        <!-- scripts end -->
    </body>

<?php Partials::showFooter();?>