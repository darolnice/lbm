<?php $title = "I forget"?>
<?php include_once S_VIEWS.'partials/_header.view.php';?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/forget.css">

<body>

<section id="sec1_signin">
    <img class="signup__img" src="<?= S_ASSETS?>images/btc.jpg" alt="cover image">

    <div id="signin_form_div">
        <form method="POST">
            <div class="ttl">I forgot</div>

            <label>Phone number or E-mail adress
                <input id="usrn" type="text" required="required" name="user_name">
            </label>

            <label>
                <input name="soumettre" id="cnnct_sign" type="submit" value="SUBMIT">
            </label>
        </form>

        <a id="already" href="../../index.php">CANCEL</a>
    </div>
</section>

<!-- scripts start -->
<script src="<?= S_ASSETS?>js/jquery.min.js"></script>
<script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
<script src="<?= S_ASSETS?>js/authentification.js"></script>
<script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->
</body>