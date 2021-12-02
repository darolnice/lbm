<?php
//use Lbm\Functions\Functions;
$title = 'Plans';?>

<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/plans.css">

<body>
    <section class="__cyp container">
        <p>Choose your plan</p>
    </section>

    <section class="__tbprice">
        <div class="pricing-table container">
            <div class="pricing-card" id="free__d">
                <h3 class="pricing-card-header"><?= $this->getAllplan()[0]['name']?></h3>
                <div class="_price"><sup>$</sup><?= $this->getAllplan()[0]['value']?> <span>/MO</span></div>
                <ul>
                    <li><strong><?= $this->getAllplan()[0]['limit_product']?></strong> Products</li>
                    <li><strong><?= $this->getAllplan()[0]['limit_storage'].' G'?></strong> Storage</li>
                    <li><strong><?= $this->getAllplan()[0]['limit_sms']?></strong> Client sms</li>
                    <li><strong><?= $this->getAllplan()[0]['limit_email']?></strong> E-Mail</li>
                </ul>

                <form method="post">
                    <input type="submit" class="order-btn" id="basic" value="SELECT" name="basic">
                </form>
            </div>

            <div class="pricing-card" id="prof__div">
                <h3 class="pricing-card-header" id="pricing-card-h1"><?= $this->getAllplan()[1]['name']?></h3>
                <div class="_price"><sup>$</sup><?= $this->getAllplan()[1]['value']?> <span> /MO</span></div>
                <ul>
                    <li><strong><?= $this->getAllplan()[1]['limit_product']?></strong> Products</li>
                    <li><strong><?= $this->getAllplan()[1]['limit_storage'].' G'?></strong> Storage</li>
                    <li><strong><?= $this->getAllplan()[1]['limit_sms']?></strong> Client sms</li>
                    <li><strong><?= $this->getAllplan()[1]['limit_email']?></strong> E-Mail</li>
                </ul>

                <form method="post">
                    <input type="submit"  class="order-btn" id="Professional" value="SELECT" name="Professional">
                </form>
            </div>

            <div class="pricing-card" id="prem__div">
                <h3 class="pricing-card-header" id="pricing-card-h2"><?= $this->getAllplan()[2]['name']?></h3>
                <div class="_price"><sup>$</sup><?= $this->getAllplan()[2]['value']?> <span>/MO</span></div>
                <ul>
                    <li><strong><?= $this->getAllplan()[2]['limit_product']?></strong> Products</li>
                    <li><strong><?= $this->getAllplan()[2]['limit_storage']?></strong> Storage</li>
                    <li><strong><?= $this->getAllplan()[2]['limit_sms']?></strong> Client sms</li>
                    <li><strong><?= $this->getAllplan()[2]['limit_email']?></strong> E-Mail</li>
                </ul>

                <form method="post">
                    <input type="submit"  class="order-btn" id="Premium" value="SELECT" name="Premium">
                </form>
            </div>

            <div class="pricing-card" id="ultim__div">
                <h3 class="pricing-card-header" id="pricing-card-h3"><?= $this->getAllplan()[3]['name']?></h3>
                <div class="_price"><sup>$</sup><?= $this->getAllplan()[3]['value']?> <span> /MO</span></div>
                <ul>
                    <li><strong><?= $this->getAllplan()[3]['limit_product']?></strong> Products</li>
                    <li><strong><?= $this->getAllplan()[3]['limit_storage']?></strong> Storage</li>
                    <li><strong><?= $this->getAllplan()[3]['limit_sms']?></strong> Client sms</li>
                    <li><strong><?= $this->getAllplan()[3]['limit_email']?></strong> E-Mail</li>
                </ul>

                <form method="post">
                    <input type="submit" class="order-btn" id="Ultimate" value="SELECT" name="ulitimate">
                </form>
            </div>

            <div class="mth-p">
                <form method="post">
                    <h6>Select your payment method</h6>
                    <button class="plansClose">&times</button>

                    <label>Visa <br>
                        <input class="mth-p_visa" type="radio" name="rad" value=" VISA ">
                    </label>

                    <label>PayPal <br>
                        <input class="mth-p_PayPal" type="radio" name="rad" value=" PAYPAL ">
                    </label>

                    <label>Bank <br>
                        <input class="mth-p_Bank" type="radio" name="rad" value=" BANK ">
                    </label>

                    <label>Mobil money <br>
                        <input class="mth-p_Mobil" type="radio" name="rad" value=" MOMO ">
                    </label>

                    <label>Orange money <br>
                        <input class="mth-p_Orange" type="radio" name="rad" value=" OM ">
                    </label>
                </form>
            </div>
        </div>
    </section>


    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/plans.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>