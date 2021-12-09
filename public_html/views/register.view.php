<?php
//use Lbm\Partials\Partials;
$title = "Business accoumpt";
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/register.css">


<body>

    <section id="s_sec1_signin">
        <form id="s_signin_form_div" method="POST">

            <div class="s_ttl">CREATE <strong>LBM</strong> BUSINESS ACCOUNT
                <P>Step 1</P>
            </div>

            <label>Country <mark style="color: red">*</mark>
                <select id="s_country" required="required" name="country">
                    <?php foreach(parent::getCountry() as $country): ?>
                        <option value="<?= $country?>"> <?= $country?> </option>
                    <?php endforeach;?>
                </select>
            </label>

            <label>Genre<mark style="color: red">*</mark>
                <select id="s_civility" required="required" name="civility">
                    <option value="Men">Men</option>
                    <option value="Woman">Woman</option>
                </select>
            </label>

            <label>User name <mark style="color: red">*</mark>
                <input id="s_usrn" type="text" required="required" name="user_name">
            </label>

            <label>Phone number <mark style="color: red">*</mark>
                <input id="s_ph_nmb" type="number" required="required" name="phone_number" >
            </label>

            <label>E-mail<mark style="color: red">*</mark>
                <input id="s_mail" type="text" required="required" name="email" >
            </label>

            <label>
                <input id="s_pw" type="password" required="required" autocomplete="off"
                       placeholder="Password" name="password">
            </label>

            <label>
                <input id="s_pw_c" type="password" required="required" autocomplete="off"
                       placeholder="Password confirm"
                       name="password_confirm">
            </label>

            <a id="s_already" href="business">Already account!</a>

            <label>
                <input name="soumettre" id="s_cnnct_sign" type="submit" value="NEXT">
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