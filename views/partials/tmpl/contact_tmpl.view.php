<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Message from contact us</title>
    </head>

    <body>
        <br>
        <div class="jumbotron">
            <ul>
                <li>Subject: <?= $this->getCtnSubject()?></li>
                <li>Name: <?= $this->getCtnName()?></li>
                <li>E_mail: <?= $this->getCtnMail()?></li>
            </ul>
        </div><br>
        <p><?= $this->getCtnMsg();?></p>
    </body>

</html>