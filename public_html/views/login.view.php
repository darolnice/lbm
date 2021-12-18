<?php
//    use Lbm\Functions\Functions;
//    use Lmb\MgrProducts\MgrProducts;
$title = 'Login';
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/login.css">

<body class="body">

<section class="container">
    <div class="ttl text-center">
        <img src="<?= S_ASSETS ?>images/svg/person_outline_black_24dp.svg" alt="">
        LOGIN</div>

    <form method="post" class="form-group">

        <input type="text"
               name="u_name"
               placeholder="Name"
               value="<?php (isset($_COOKIE['rmb'])) ? print_r(unserialize($_COOKIE['rmb'])[0]) : null?>"
               required="required">

        <input type="password"
               name="passw"
               placeholder="Password"
               value="<?php (isset($_COOKIE['rmb'])) ? print_r(unserialize($_COOKIE['rmb'])[1]) : null?>"
               required="required">

        <span class="forg_rem">
            <input type="checkbox" name="ckb_rm" id="remenber" <?php (isset($_COOKIE['rmb'])) ? print_r('checked'): null?> >
            <label for="remenber" title="Your browser will remember you during 1 week">Remenber me</label>

            <a href="forget">Password forget</a>
        </span>

        <input class="submit" type="submit" name="connect" value="CONNECT">

        <span class="dntacc">
            <b>Do not have account?</b>
            <a href="signup">sign up</a>
        </span>

        <span class="fbk_twr">
            <b>OR</b>
            <button class="btnfbk">Signin with Facebook</button>
            <button class="btntwr">Signin with Twitter</button>
        </span>

        <input type="button" id="bs_account" class="s_signup_a" value="BUSINESS ACCOUNT">
        <img class="imgbusi" src="<?= S_ASSETS ?>images/svg/business_black_24dp.svg" alt="">


        <br><br><br>
        <a href="" class="reserved_">All right reserved &copy; LBM production lebolma.com</a>
    </form>


</section>

<!-- scripts start -->
<script src="<?= S_ASSETS?>js/jquery.min.js"></script>
<script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
<script src="<?= S_ASSETS?>js/Index.js"></script>
<script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->
</body>
