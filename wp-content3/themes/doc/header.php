<!DOCTYPE html>
<html lang="en">
<head profile="http://gmpg.org/xfn/11">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="slit slider, plugin, css3, transitions, jquery, fullscreen, autoplay" />
    <meta name="author" content="Codrops" />
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/responsive.css" type="text/css" media="screen" />
    <link rel="shortcut icon" href="<?php  bloginfo('template_url') ?>/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style_sl_slider.css" />
    <link href="<?php bloginfo('template_url') ?>/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_url') ?>/css/jquery.selectBoxIt.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_url') ?>/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_url') ?>/css/baguetteBox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/custom.css" />

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.79639.js"></script>
    <noscript>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/styleNoJS.css" />
    </noscript>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="overlay"></div>
<div class="modal">
	<h3 class="ty_text"><span class="upper">Thank You</span> <br>for subscribing</h3>
	<div class="close_modal"></div>
	<div class="social_icons">
		<p>follow me</p>
		<a target="_blank" href="https://www.facebook.com/moustafa.hamwi"><i class="fa fa-facebook-square"></i></a>
		<a target="_blank" href="https://twitter.com/moustafahamwi"> <i class="fa fa-twitter-square"> </i></a>
		<a target="_blank" href="https://www.linkedin.com/in/moustafahamwi"><i class="fa fa-linkedin-square"></i></a>
		<a target="_blank" href="https://www.youtube.com/channel/UCGNaeUI8uj4JzGABlcmEvoA"> <i class="fa fa-youtube">   </i></a>
		<a target="_blank" href="https://www.instagram.com/moustafahamwi/"><i class="fa fa-instagram"></i></a>
	</div>
</div>
<!--<div id="loading"></div>-->

    <header >
        <div class="header">
            <div class="cont">
                <a href="http://moustafa.shahum.net/">
                    <div class="logo">
                        <div class="logo_img">
                            <img src="<?php bloginfo('template_url');?>/images/newLogo.png">
                        </div>
                    </div>
                </a>
                <div class="header_right">
                    <div class="icons">
                        <i class="fa fa-share-alt"></i>
                       <span class="search">
                           <input type="search" name="s" placeholder="Search"/>
                           <i class="fa fa-search"></i>
                       </span>
                    </div>
                    <nav class="codrops-demos">
                        <?php wp_nav_menu( array( 'menu' => 'header_menu' ) ); ?>
                    </nav>
                </div>
            </div>
        </div>
</header>

