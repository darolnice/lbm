<?php //use Lbm\Partials\Partials;?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="E-commerce" content="<?= "LBM GROUPE ALL RIGHT RESERVED" ?>">
    <meta name="author">

    <title>
        <?php
            echo isset($title) ? SITE_NAME.' - '.$title  : SITE_NAME.'- The best!';
        ?>
    </title>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= S_ASSETS?>css/animate.css">
    <link rel="stylesheet" href="<?= S_ASSETS?>css/flaticon.css">
    <link rel="stylesheet" href="<?= S_ASSETS?>css/bootstrap.min.css">
</head>

<?php
        include_once S_VIEWS.'partials/_fragment.view.php';
        $tab = ['setting', 'signup', 'register', 'business', 'register_2', 'om', 'forget',
               'login', 'checkcart', 'panel', 'dashboard', 'plans', 'profil', 'momo'
        ];

        if (!in_array($_GET["r"], $tab)){
            if ($_GET["r"] === null || $_GET["r"] === "contact"){
               (new Partials)->showHomeNav();
            }else{
               (new Partials)->showNav();
            }
        }

?>


