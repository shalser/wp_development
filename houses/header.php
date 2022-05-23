<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('description');?></title>
<!--    <link rel="stylesheet" href="css/normalize.css">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Roboto:wght@300;400;700&display=swap"
          rel="stylesheet">
<!--    <link rel="stylesheet" href="css/magnific-popup.css">-->
<!--    <link rel="stylesheet" href="css/style.css">-->

    <?php wp_head(); ?>
</head>
<body>

<header class="header" style="background-image: url(<?php the_field('main-bgd');?>);">
    <div class="header__inner">
        <img src="<?php bloginfo('template_url');?> . /assets/img/home.png" alt="">
        <div class="header__name">
            <?php the_field('company-name'); ?>
        </div>
        <a href="tel:<?php the_field('href'); ?>" class="phone"><?php the_field('phone'); ?></a>
        <div class="header__title">
            <?php the_field('slogan'); ?>
        </div>
        <div class="header__sale">
            <img src="<?php the_field('stock');?>">
        </div>
    </div>
</header>
