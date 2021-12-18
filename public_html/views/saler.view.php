<title>Business Account Login</title>
<?php include(S_VIEWS.'partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/saler.css">



<body class="body">

    <section id="_busi_" class="container">
        <div class="ttl text-center">
            <img style="margin-top: -5px;" src="<?= S_ASSETS ?>images/svg/person_outline_black_24dp.svg" alt="">
            BUSINESS ACCOUNT LOGIN</div>

        <form method="post" class="form-group">
            <input type="text"
                   name="u_name"
                   placeholder="Name"
                   value="<?php (isset($_COOKIE['rmbs'])) ? print_r(unserialize($_COOKIE['rmbs'])[0]) : null?>"
                   required="required">

            <input type="password"
                   name="passw"
                   placeholder="Password"
                   value="<?php (isset($_COOKIE['rmbs'])) ? print_r(unserialize($_COOKIE['rmbs'])[1]) : null?>"
                   required="required">

            <span class="forg_rem">
                <input type="checkbox"
                        name="ckb_rm_s"
                        <?php (isset($_COOKIE['rmbs'])) ? print_r('checked'): null?>
                        id="remenber">
                <label for="remenber">Remenber me</label>

                <a href="forget">Password forget</a>
            </span>

            <input class="submit" type="submit" name="submit" value="CONNECT">


            <span class="dntacc">
                <b>Do not have account?</b>
                <a href="register">sign up</a>
            </span>

            <span class="fbk_twr">
                <b>OR</b>
                <button class="btnfbk">Signin with Facebook</button>
                <button class="btntwr">Signin with Twitter</button>
            </span>

            <br>
            <a href="" class="s_signup_a_">All right reserved &copy; LBM production lebolma.com</a>
        </form>


    </section>

<!-- scripts start -->
<script src="<?= S_ASSETS?>js/jquery.min.js"></script>
<script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
<script src="<?= S_ASSETS?>js/Index.js"></script>
<script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->
</body>
