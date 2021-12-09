<?php
//use Lbm\Partials\Partials;
$title = "Business accoumpt /2";
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/register_2.css">

<body>

<section id="s_sec1_signin_2">
    <form id="s_signin_form_div_2" method="POST">

        <div class="s_ttl_2">CREATE <strong>LBM</strong> BUSINESS ACCOUNT
            <P>Step 2</P>
        </div>

        <label>Shop name <mark style="color: red">*</mark>
            <input id="s_usrn_2" type="text" required="required" name="shop_name">
        </label>

        <label>City <mark style="color: red">*</mark>
            <input type="text" name="city" id="sh_city">
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

        <label>Matricul<mark style="color: red">*</mark>
            <input id="s_mail_2" type="text" required="required" name="matricul" >
        </label>

        <label>
            <input id="s_pw_2" type="button" required="required" autocomplete="off"
                   value="GENERATE SHOP KEY" name="shop_key">
        </label>

        <label>
            <input id="s_pw_c_2" type="button" required="required" autocomplete="off"
                   value="CHOOSE PLAN"
                   name="current_plan">
        </label>

        <label>
            <input name="submit" id="s_cnnct_sign_2" type="submit" value="SUBMIT">
        </label>
    </form>

</section>

<!-- scripts start -->
<script src="<?= S_ASSETS?>js/jquery.min.js"></script>
<script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
<script src="<?= S_ASSETS?>js/Index.js"></script>
<script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->
</body>