<title>Reset password</title>
<?php include(S_VIEWS.'partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/reset.css">

<body>

    <section id="sec1_signin">
        <img class="signup__img" src="<?= S_ASSETS?>images/btc.jpg" alt="cover image">

        <div id="signin_form_div">
            <form method="POST">
                <div class="ttl">Reset password</div>

                <label>
                    <input id="usrn" type="password" required="required" name="n_password" placeholder="Enter a new password">
                </label>

                <label>
                    <input id="pass_cnfr" type="password" required="required" name="np_confirm" placeholder="Confirm password">
                </label>

                <label>
                    <input name="submit" id="cnnct_sign" type="submit" value="RESET">
                </label>
            </form>

            <a id="already" href="../../index.php">Cancel</a>
        </div>
    </section>

    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->
</body>