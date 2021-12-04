<?php
//    use Lbm\Functions\Functions;
//    use Lmb\MgrProducts\MgrProducts;
$title = 'Check Cart';
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/checkcart.css">

<body class="user-select-none">
    <section class="chkcrt_table container jumbotron mt-5" id="chkcrt_tabl">
        <table class="tab-content mt-5">
            <thead><h4 class="ml user-select-none">CHECK YOUR CART</h4></thead>

            <p class="user-select-none" id="shop_name"></p>
                <tr class="tl">
                    <td style="font-weight: 400; width: 110px">PRODUCT</td>
                    <td style="font-weight: 400; width: 40px">QUANTITY</td>
                    <td style="font-weight: 400; width: 80px">COLOR</td>
                    <td style="font-weight: 400; width: 50px">SIZE</td>
                    <td style="font-weight: 400; width: 110px">PRICE TTC</td>
                </tr>

            <?php foreach ($_SESSION['cart'] as $k => $v): ?>
                <?php foreach ($v as $k_ => $v_): ?>
                    <tr class="tl_v">
                        <td id="crt_name"><?= json_decode($v_)->prod_name?></td>
                        <td id="crt_qte"><?= json_decode($v_)->quantity?></td>
                        <td id="crt_clr"><?= json_decode($v_)->color?></td>
                        <td id="crt_sze"><?= json_decode($v_)->size?></td>
                        <td id="crt_price"
                            data-qte="<?= json_decode($v_)->quantity?>"
                            data-shopname="<?= json_decode($v_)->shop_name?>"
                            data-pid="<?= json_decode($v_)->prod_id?>">
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php endforeach;?>
        </table>

        <div class="sub">
            <form method="post" class="form-group">
                <div class="cc_pi mb-3">
                    <p class="mb-1">Personal informations</p>
                    <input type="text" name="firstname" placeholder="FIRST NAME" required>
                    <input type="text" name="lastname" class="float-right" placeholder="LAST NAME" required>
                    <input type="email" name="email" placeholder="EMAIL" required>
                    <input type="number" name="phn" class="float-right" placeholder="PHONE NUMBER" required>
                </div>

                <div class="cc_si">
                    <p class="mb-1">Shipping informations</p>
                    <input type="text" name="country" placeholder="COUNTRY">
                    <input type="text" class="float-right" name="city" placeholder="CITY">
                    <input type="text" name="quartier" placeholder="NOM DU QUARTIER">
                    <input type="text" class="float-right" name="appart" placeholder="APPART NUMBER">
                </div>

                <div class="ttal mt-4"><h6>SUBTOTAL</h6>
                <button class="btn_t"><?= array_sum($_SESSION["somme"]).' US$'?></button>
            </div>
                <div class="bn">
                    <input name="bnw" type="submit" class="bnw" value="CONTINUE">
                </div>
            </form>
        </div>
    </section>

    <section class="sec2_cc">
        <div class="cc_mth-p">
            <form method="post">
                <h6>Select your payment method</h6>
                <button class="cc_plansClose">&times</button>

                <label>Visa / MasterCard <br>
                    <input class="cc_mth-p_visa" type="radio" name="rad" id="cc_rad" value="VISA / MASTERCARD">
                </label>

                <label>PayPal <br>
                    <input class="cc_mth-p_PayPal" type="radio" name="rad" id="cc_rad" value="paypal">
                </label>

                <label>Bank <br>
                    <input class="cc_mth-p_Bank" type="radio" name="rad" id="cc_rad" value="bank">
                </label>

                <label>Mobil money <br>
                    <input class="cc_mth-p_Mobil" type="radio" name="rad" id="cc_rad" value="momo">
                </label>

                <label>Orange money <br>
                    <input class="cc_mth-p_Orange" type="radio" name="rad" id="cc_rad" value="om">
                </label>

                <label>Cash <br>
                    <input class="cc_mth-p_Cash" type="radio" name="rad" id="cc_rad" value="cash">
                </label>
            </form>
        </div>
    </section>


    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/Cart.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>
