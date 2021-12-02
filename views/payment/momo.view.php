<?php $title = 'Mtn Mobil Money';
include_once dirname(__DIR__, 1).DIRECTORY_SEPARATOR.'./partials/_header.view.php';?>

<link rel="stylesheet" href="<?= S_ASSETS?>css/payment.css">

<body>
    <div class="container">
        <h6>BUY WITH MTN MOBIL MONEY</h6>
        <div class="momo__">
            <img src="<?= S_ASSETS?>images/img/mtn.png" alt="mtn mobile money logo">
            <div class="momo_price">
                <p class="strong"><?= array_sum($_SESSION["somme"]).' US$'?></p>

                <div class="momo__form">
                    <form class="form-group" method="post">
                        <div class="momo__slct__ph">
                            <select name="cid" id="">
                                <option value="237">237</option>
                            </select>
                            <input class="form-control" type="number" id="" name="momop" maxlength="9" min="9" placeholder="Enter your phone number" required>
                        </div>
                        <button type="submit" name="momopay">BUY</button>
                    </form>
                    <a href="./">CANCEL PAYMENT</a>
                </div>
            </div>
        </div>
        <p class="comm__">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Blanditiis eius eligendi esse, facere incidunt
            laudantium magnam mollitia nesciunt rerum temporibus!
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Blanditiis eius eligendi esse, facere incidunt
            laudantium magnam mollitia nesciunt rerum temporibus!
        </p>
    </div>

    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <!-- scripts end -->
</body>
