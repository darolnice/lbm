<?php
//use Lbm\Functions\Functions;
//use Lbm\Partials\Partials;
$title = "Contact us"
?>
<?php include('partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/contact.css">


<body class="body">

    <section id="contner">
        <img class="c__img" src="<?= S_ASSETS?>images/btc.jpg" alt="cover image">

        <div class="ttle">
            <h3>CONTACT US</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Consectetur debitis dolorum error ex, iste libero
                molestiae molestias nobis quam reprehenderit.
            </p>
        </div>

        <form class="form-group" id="frm" method="post">
            <input type="text" name="subject" required="required" autocomplete="off" placeholder="Subject">

            <input type="text"
                   name="name"
                   required="required"
                   autocomplete="off"
                   placeholder="Name"
                   value="<?= Functions::getUserDataFromSession($_SESSION['current_user_name'], $_SESSION['username'])?>">

            <input type="email"
                   name="email"
                   required="required"
                   autocomplete="off"
                   placeholder="E-mail"
                   value="<?= Functions::getUserDataFromSession($_SESSION['email'], "")?>">

            <textarea type="text" name="msg" required="required" rows="4" autocomplete="off"> Message...</textarea>

            <input class="btn_i" type="submit" name="submit" value="SEND">
        </form>
    </section>

<!-- scripts start -->
<script src="<?= S_ASSETS?>js/jquery.min.js"></script>
<script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
<script src="<?= S_ASSETS?>js/contact.js"></script>
<script src="<?= S_ASSETS?>js/Index.js"></script>
<script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
<!-- scripts end -->
</body>

<?php Partials::showFooter();?>
