<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body class="jumbotron">
        <h3>Acoumpte activation!</h3><br>
        For actived your acoumpte, please click on this link:
        <h2>
            <a href="<?=SITE_NAME."/activation?shop name=" .$_SESSION['shop_name']. '&amp;token='.$_SESSION['tkn'] ?>"
               style="font-weight: bold;">Activation link
            </a>
        </h2><br>

        <b style="color: #de5a5a">This link will be available 7 days.</b>
    </body>


</html>