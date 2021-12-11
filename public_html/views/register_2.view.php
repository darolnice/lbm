<?php
//use Lbm\Partials\Partials;
$title = "Business accoumpt /2";
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/register_2.css">

<body>

<section id="s_sec1_signin_2">
    <div class="reg-2Form_div">
        <form class="s_signin_form_div_2" name="reg2_form" method="POST">

            <div class="s_ttl_2">CREATE <strong>LBM</strong> BUSINESS ACCOUNT
                <P>Step 2</P>
            </div>

            <label>Shop name <mark style="color: red">*</mark>
                <input id="s_usrn_2" type="text" required="required" name="shop_name">
            </label>

            <label>City <mark style="color: red">*</mark>
                <input type="text" name="city" id="sh_city" require>
            </label>

            <label>Activity<mark style="color: red">*</mark>
                <select id="s_civility_2" required="required" name="activity">
                    <?php foreach(parent::getActivity() as $activity): ?>
                        <option value="<?= $activity?>"> <?= $activity?> </option>
                    <?php endforeach;?>
                </select>
            </label>

            <label>Description <mark style="color: red">*</mark>
                <textarea id="s_ph_nmb_2" required="required" name="description" cols="30" rows="10"></textarea>
            </label>

            <label>Matricul (optionnal)<mark style="color: red"></mark>
                <input id="s_mail_2" type="text" name="matricul" >
            </label>

            <div class="cni-img-div">
                <label>Card id face 1 <mark style="color: red">*</mark>
                    <input id="s_cni_1" type="file" required="required" name="CardIdface1" hidden>
                    <img class="thumb1" src="<?= S_ASSETS?>images/svg/badge_black_24dp.svg" alt="first face card id">
                    <button type="button" class="smartbtn">Upload</button>
                </label>

                <label>Card id face 2 <mark style="color: red">*</mark>
                    <input id="s_cni_2" type="file" required="required" name="CardIdface2" hidden>
                    <img class="thumb2" src="<?= S_ASSETS?>images/svg/badge_black_24dp.svg" alt="seconde face card id">
                    <button type="button" class="mb-2 smartbtn">Upload</button>
                </label>
            </div>

            <label>
                <input class="text-center d-none mt-2" id="tknsh1" type="text" autocomplete="off"
                       placeholder="Enter your plan code"
                       name="plan">
            </label>

            <label>
                <input id="s_pw_c_2" type="button" autocomplete="off"
                       value="CHOOSE PLAN" name="current_plan">
            </label>

            <label>
                <input name="sbmt" id="s_cnnct_sign_2" type="submit" value="SUBMIT">
            </label>
        </form>
    </div>

    <div class="regComm">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        A animi culpa eum facere id nostrum quaerat quisquam quos
        repellendus sapiente, tempore totam. Aliquid consequuntur
        labore, perspiciatis similique temporibus ut veritatis.
    </div>
</section>

<!-- scripts start -->
<script src="<?= S_ASSETS?>js/jquery.min.js"></script>
<script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
<script src="<?= S_ASSETS?>js/Index.js"></script>
<script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->
</body>