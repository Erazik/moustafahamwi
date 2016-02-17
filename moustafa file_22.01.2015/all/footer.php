<footer>
    <div class="instagram">
        <?php get_instagram(); ?>
    </div>
    <div class="cont bottom">
        <div class="about_bottom">
            <div class="bottom_title">
                <p><?php echo get_the_title(10); ?></p>
            </div>
            <div class="bottom_content">
                <?php
                global $cfs;
                if($cfs->get('content', 10 )){
                    $text2 = $cfs->get('content', 10 );
                    echo($text2);
                }
                ?>
            </div>
        </div>
        <div class="tags">
            <div class="tags_title">
                <p>Tags</p>
            </div>
            <div class="bottom_content">
                <ul>
                    <?php
                        $tags = get_tags();
                        foreach($tags as $tag){
                            echo '<li><a href="'.get_home_url().'/tag/'.$tag->slug.'">'.$tag->name.'</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="social_icon">
            <div class="social_icon_title">
                <p>Social</p>
            </div>
            <div class="bottom_icons">
                <a target="_blank" href="https://www.facebook.com/moustafa.hamwi"><i class="fa fa-facebook-square"></i></a>
                <a target="_blank" href="https://twitter.com/moustafahamwi"> <i class="fa fa-twitter-square"> </i></a>
                <a target="_blank" href="https://www.linkedin.com/in/moustafahamwi"><i class="fa fa-linkedin-square"></i></a>
                <!--            <i class="fa fa-vimeo-square"></i>-->
                <a target="_blank" href="https://www.youtube.com/channel/UCGNaeUI8uj4JzGABlcmEvoA"> <i class="fa fa-youtube">   </i></a>
                <a target="_blank" href="https://www.instagram.com/moustafahamwi/"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
<div class="footer">
    <div class="cont">
        <div class="footer_left"><p>© <span id="year">2016</span> Moustafa Hamwi</p></div>
        <div class="footer_right">
            <nav class="codrops-demos">
                <?php wp_nav_menu( array( 'menu' => 'header_menu' ) ); ?>
            </nav>
        </div>
    </div>
</div>
</footer>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.ba-cond.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.slitslider.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.0.6/jquery.mousewheel.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/baguetteBox.js"></script>
<!--<script type="text/javascript" src="--><?php //bloginfo('template_url'); ?><!--/js/jquery.nicescroll.js"></script>-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>-->
<!--<script type="text/javascript" src="--><?php //bloginfo('template_url'); ?><!--/js/jquery.selectBoxIt.min.js"></script>-->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.min.js"></script>
<script type="text/javascript">
    $(function() {

        var Page = (function() {

            var $nav = $( '#nav-dots > span' ),
                slitslider = $( '#slider' ).slitslider( {
                    onBeforeChange : function( slide, pos ) {

                        $nav.removeClass( 'nav-dot-current' );
                        $nav.eq( pos ).addClass( 'nav-dot-current' );

                    }
                } ),

                init = function() {

                    initEvents();

                },
                initEvents = function() {

                    $nav.each( function( i ) {

                        $( this ).on( 'click', function( event ) {

                            var $dot = $( this );

                            if( !slitslider.isActive() ) {

                                $nav.removeClass( 'nav-dot-current' );
                                $dot.addClass( 'nav-dot-current' );

                            }

                            slitslider.jump( i + 1 );
                            return false;

                        } );

                    } );

                };

            return { init : init };

        })();

        Page.init();

        /**
         * Notes:
         *
         * example how to add items:
         */

    });
</script>
<script defer type="text/javascript" src="<?php bloginfo('template_url') ?>/js/custom.js"></script>
<script defer
    type="text/javascript"
    data-lf-domain="{network name (domain.fyre.co)}"
    src="//cdn.livefyre.com/libs/commentcount/v1.0/commentcount.js">
</script>
<?php wp_footer(); ?>
</body>
</html>