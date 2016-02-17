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
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/responsive.css" />
    <link rel="shortcut icon" href="<?php  bloginfo('template_url') ?>/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/style_sl_slider.css" />
    <link href="<?php bloginfo('template_url') ?>/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_url') ?>/css/jquery.selectBoxIt.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_url') ?>/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_url') ?>/css/baguetteBox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/custom.css" />
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-72913111-1', 'auto');
        ga('send', 'pageview');

    </script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.79639.js"></script>
    <noscript>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/styleNoJS.css" />
    </noscript>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- page overlays for social icons share and thank you pop up-->
<div class="overlay2" style="display: none">
	<div class="cl_ov2"></div>
	<div class="social_icons_share">
		<p>Share the Passion</p>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink($id); ?>&t=<?php echo get_the_title($id); ?>"
		   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
		   target="_blank" title="Share on Facebook">
			<i class="fa fa-facebook-square"></i>
		</a>
		<a href="https://twitter.com/share?url=<?php echo get_the_permalink($id); ?>&via=Moustafa&text=<?php echo get_the_title($id); ?> >"
		   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
		   target="_blank" title="Share on Twitter">
			<i class="fa fa-twitter-square"></i>
		</a>
		<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink($id); ?>&title=<?php echo get_the_title($id); ?>"
		   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
		   target="_blank" title="Share on Linkeldn">
			<i class="fa fa-linkedin"></i>
		</a>
		<a href="http://pinterest.com/pin/create/button/?url=<?php echo get_the_permalink($id); ?>&description=<?php echo get_the_title($id); ?>"
		   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
		   target="_blank" title="Share on Pinterest">
			<i class="fa fa-pinterest"></i>
		</a>
		<a href="https://plus.google.com/share?url=<?php echo get_the_permalink($id); ?>&t=<?php echo get_the_title($id); ?>"
		   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
		   target="_blank" title="Share on Google Plus">
			<i class="fa fa-google-plus"></i>
		</a>
	</div>
</div>
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
                <a href="/">
                    <div class="logo">

                            <img src="<?php bloginfo('template_url');?>/images/MH-logo.png">

                    </div>
                </a>
                <div class="header_right">
                    <div class="icons">
                        <i class="fa fa-share-alt"></i>
                       <span class="search">
                            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search trAll" method="get" name="searchForm">
                                <input type="search" name="s" class="mobile_search" placeholder="Search"/>
                                <i class="fa fa-search"></i>
                            </form>
                       </span>
                    </div>

                    <nav class="codrops-demos">
                        <?php wp_nav_menu( array( 'menu' => 'header_menu' ) ); ?>
                    </nav>


                </div>
               <div id='cssmenu'>
                    <?php
                    wp_nav_menu( array( 'menu' => 'header_menu','container' => '', 'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>' ) );
                    ?>
                   <div class="icons">
                       <i class="fa fa-share-alt"></i>
                   </div>
                </div>
            </div>
        </div>
</header>
