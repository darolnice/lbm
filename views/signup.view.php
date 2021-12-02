<?php
//use Lbm\Functions\Functions;
//use Lbm\Partials\Partials;
$title = "Sign up";
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/signup.css">

<body>

    <section id="sec1_signin">
        <img class="signup__img" src="<?= S_ASSETS?>images/btc.jpg" alt="cover image">

        <form id="signin_form_div" method="POST">

            <div class="ttl">SIGN UP</div>

            <label>Country <mark style="color: red">*</mark>
                <select id="country" type="text" required="required" name="country">
                    <option value="USA">USA</option>
                    <option value="CANADA">CANADA</option>
                    <option value="FRANCE">FRANCE</option>
                    <option value="CAMEROON">CAMEROON</option>
                </select>
            </label>

            <label>City <mark style="color: red">*</mark>
                <select id="country" type="text" required="required" name="city">
                    <option value="DOUALA">DOUALA</option>
                    <option value="QUEBEC">QUEBEC</option>
                    <option value="PARIS">PARIS</option>
                    <option value="NEW YORK">NEW YORK</option>
                </select>
            </label>

            <label>Genre<mark style="color: red">*</mark>
                <select id="civility" type="text" required="required" name="civility">
                    <option value="Men">Men</option>
                    <option value="Woman">Woman</option>
                </select>
            </label>

            <label>User name <mark style="color: red">*</mark>
                <input id="usrn" type="text" required="required" name="user_name">
            </label>

            <label>Phone number <mark style="color: red">*</mark>
                <input id="ph_nmb" type="number" required="required" name="phone_number" >
            </label>

            <label>E-mail<mark style="color: red">*</mark>
                <input id="mail" type="text" required="required" name="email" >
            </label>

            <label>
                <input id="pw" type="password" required="required" autocomplete="off"
                       placeholder="Password" name="password">
            </label>

            <label>
                <input id="pw_c" type="password" required="required" autocomplete="off"
                       placeholder="Password confirm"
                       name="password_confirm">
            </label>

            <a id="already" href="login">Already account!</a>

            <label>
                <input name="soumettre" id="cnnct_sign" type="submit" value="SUBMIT">
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