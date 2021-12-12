<?php $title = "Transactions"?>
<?php include(S_VIEWS.'partials/_header.view.php');?>
<link rel="stylesheet" href="<?= S_ASSETS?>css/transactions.css">

<body>
    <section class="container">
        <?php if(!$_SESSION['tid']): ?>
            <p id="titl">Transactions id</p>
            <form class="row-cols-sm-1 row-cols-md-1 form-group hide" method="post">
            <input class="text-center"
                   type="text"
                   id="t_id"
                   name="t_id"
                   placeholder="Enter your transaction id here"
                   autocomplete="off"
                   required="required"
            >

            <p id="cb_expl">
                Please enter your transaction id to get access to your card statement
                (posted transactions) and card balance.
                You will be required to provide your card PIN to check your card balance.
            </p>

            <input type="submit" name="t_id_sbmt" id="t_id_sbmt" value="Submit">
        </form>
        <?php endif;?>

        <?php if($_SESSION['tid']): ?>
            <button class="back___" title="Back">
                &larr;
            </button>
            <form class="logoff" title="Log out" method="post">
                <input name="logoff" type="submit" value="Log out">
            </form>
            <div class="row-cols-md-2 trans_opt">
                <h2>About Transactions</h2>
                <div class="t_details">
                    <p>Reclamations <br> ipsum dolor sit amet, consectetur adipisicing elit.
                        Architecto at autem eligendi labore nostrum nulla sequi tempora totam? Atque delectus,
                        deserunt doloribus fugiat itaque iusto natus non quasi quidem soluta?
                    </p>
                    <p>Shipping <br> ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad asperiores ipsa laborum magnam mollitia ut.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad asperiores ipsa laborum magnam mollitia ut.
                    </p>
                    <p>Receptions <br> ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad asperiores ipsa laborum magnam mollitia ut.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ad asperiores ipsa laborum magnam mollitia ut.
                    </p>
                </div>
                <div class="tr_btn">
                    <button id="recbtn" class="rec" style="background-color: #0d9282">
                        <img alt="reclamations button" src="<?= S_ASSETS?>images/svg/warning_black_24dp.svg">
                        Reclamations</button>
                    <button class="ship" style="background-color: #99069e">
                        <img alt="shipping button" src="<?= S_ASSETS?>images/svg/local_shipping_black_24dp.svg">
                        Shipping</button>
                    <button class="recp" style="background-color: #d0a00f">
                        <img alt="reception button" src="<?= S_ASSETS?>images/svg/clean_hands_black_24dp.svg">
                        Reception</button>
                </div>
            </div>
            <div class="trans_shipp" style="display: none">
                <h2>Shipping</h2>
                <div class="shipp_details">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto,
                        deleniti dolor eos esse fuga molestiae mollitia neque, quaerat quibusdam,
                        sint tempore ut vel! Amet aperiam asperiores assumenda at,
                        blanditiis consectetur culpa dolor explicabo fugit impedit iusto laboriosam maxime
                        nulla officiis quam quia ratione reiciendis tempora vel vero? Alias architecto et eveniet,
                        possimus quasi repellat sapiente sit! Beatae, dolorum, ducimus.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto,
                        deleniti dolor eos esse fuga molestiae mollitia neque, quaerat quibusdam,
                        sint tempore ut vel! Amet aperiam asperiores assumenda at,
                        blanditiis consectetur culpa dolor explicabo fugit impedit iusto laboriosam maxime
                        nulla officiis quam quia ratione reiciendis tempora vel vero? Alias architecto et eveniet,
                        possimus quasi repellat sapiente sit! Beatae, dolorum, ducimus.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto,
                        deleniti dolor eos esse fuga molestiae mollitia neque, quaerat quibusdam,
                        sint tempore ut vel! Amet aperiam asperiores assumenda at,
                        blanditiis consectetur culpa dolor explicabo fugit impedit iusto laboriosam maxime
                        nulla officiis quam quia ratione reiciendis tempora vel vero? Alias architecto et eveniet,
                        possimus quasi repellat sapiente sit! Beatae, dolorum, ducimus.
                    </p>
                </div>
                <div class="map">
                    <img src="<?= S_ASSETS ?>images/svg/location_on_black_24dp.svg" alt="">
                </div>
            </div>
            <div class="recp_" style="display: none">
                <h2>Reception</h2>
                <div class="recp_details">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto,
                        deleniti dolor eos esse fuga molestiae mollitia neque, quaerat quibusdam,
                        sint tempore ut vel! Amet aperiam asperiores assumenda at,
                        blanditiis consectetur culpa dolor explicabo fugit impedit iusto laboriosam maxime
                        nulla officiis quam quia ratione reiciendis tempora vel vero? Alias architecto et eveniet,
                        possimus quasi repellat sapiente sit! Beatae, dolorum, ducimus.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto,
                        deleniti dolor eos esse fuga molestiae mollitia neque, quaerat quibusdam,
                        sint tempore ut vel! Amet aperiam asperiores assumenda at,
                        blanditiis consectetur culpa dolor explicabo fugit impedit iusto laboriosam maxime
                        nulla officiis quam quia ratione reiciendis tempora vel vero? Alias architecto et eveniet,
                        possimus quasi repellat sapiente sit! Beatae, dolorum, ducimus.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto,
                        deleniti dolor eos esse fuga molestiae mollitia neque, quaerat quibusdam,
                        sint tempore ut vel! Amet aperiam asperiores assumenda at.
                </div>

                <div class="qr">
                    <img src="<?= S_ASSETS ?>images/svg/qr_code_2_black_24dp.svg" alt="">
                </div>
            </div>
        <?php endif;?>
    </section>

    <!-- scripts start -->
    <script src="<?= S_ASSETS?>js/jquery.min.js"></script>
    <script src="<?= S_ASSETS?>js/bootstrap.min.js"></script>
    <script src="<?= S_ASSETS?>js/transactions.js"></script>
    <script src="<?= S_ASSETS?>js/Index.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFCtG_Lyb_Cnun3GqE3-TpNFg_3jx0RIk"></script>
    <script src="https://kit.fontawesome.com/1fb6f59a4b.js" crossorigin="anonymous"></script>
    <!-- scripts end -->

</body>
