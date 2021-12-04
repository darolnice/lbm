<?php $title = "Authentification"?>

<?php include(S_VIEWS.'partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/authentification.css">

<body>

<section id="sec1_signin">
    <img class="signup__img" src="<?= S_ASSETS?>images/btc.jpg" alt="cover image">

    <div id="signin_form_div">
        <form method="POST">
            <div class="ttl">Authentification</div>

            <label>Code <mark style="color: red">*</mark>
                <input id="usrn" type="text" required="required" name="code">
            </label>

            <label>
                <input name="subt" id="cnnct_sign" type="submit" value="SUBMIT">
            </label>
        </form>

        <input id="already" type="submit" required="required" name="user_name" value="You d'nt receive!">
    </div>
</section>

<!-- scripts start -->
<script src="<?= S_ASSETS?>js/jquery.min.js"></script>
<script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
<script src="<?= S_ASSETS?>js/authentification.js"></script>
<script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->
</body>