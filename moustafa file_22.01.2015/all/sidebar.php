
    <div class="aboutme">
        <div class="content_right_title">
            <p>
                <?php echo get_the_title(10); ?>
            </p>
        </div>
        <div class="aboutme_img">
            <?php echo get_the_post_thumbnail(10); ?>
        </div>
        <div class="aboutme_content_title">

            <?php
            global $cfs, $tag, $post;
            if($cfs->get('title', 10 )){
                $text = $cfs->get('title', 10 );
                echo($text);
            }
            ?>

        </div>
        <div class="aboutme_content">
            <?php
            if($cfs->get('content', 10 )){
                $text2 = $cfs->get('content', 10 );
                echo('<p>' . $text2 . '</p>');
            }
            ?>
        </div>
        <div class="readmore">
            <div class="readmore_p"><p><a href="<?php echo get_the_permalink(10); ?>">Read more</a></p></div>
            <div class="readmore_i"><a href="<?php echo get_the_permalink(10); ?>"><i class="fa fa-arrow-circle-right"></i></a></div>
        </div>
    </div>
    <div class="connectme">
        <div class="content_right_title">
            <p>
                <?php echo get_the_title(12); ?>
            </p>
        </div>
        <div class="social_icons">
                <a target="_blank" href="https://www.facebook.com/moustafa.hamwi"><i class="fa fa-facebook-square"></i></a>
                <a target="_blank" href="https://twitter.com/moustafahamwi"> <i class="fa fa-twitter-square"> </i></a>
                <a target="_blank" href="https://www.linkedin.com/in/moustafahamwi"><i class="fa fa-linkedin-square"></i></a>
<!--            <i class="fa fa-vimeo-square"></i>-->
                <a target="_blank" href="https://www.youtube.com/channel/UCGNaeUI8uj4JzGABlcmEvoA"> <i class="fa fa-youtube">   </i></a>
                <a target="_blank" href="https://www.instagram.com/moustafahamwi/"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <div class="archive">
        <div class="content_right_title"><p>Archive</p></div>
        <?php
        get_years();
        if(!is_single()) {
            ?>
            <div class="subscribe">
                <div class="content_right_title">
                    <p>
                        Subscribe
                    </p>
                </div>
                <div class="subscribe_content">
                    <div class="inp_btn">
                        <form autocomplete="off" action="//asup.us7.list-manage.com/subscribe/post-json?u=9329bb7e69a5f45bee46f731d&amp;id=aa3a7fd7c6&amp;c=?" method="get" id="mc-embedded-subscribe-form-sidebar" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                                <div class="subscribe_text">
                                    <p>
                                        Stories and Tips to live your life with passion!
                                    </p>
                                </div>
                                <div class="mc-field-group">
									<div class="elem">
										<input type="text" value="" name="FNAME" class="subscribe_inp" id="mce-FNAME" placeholder="Full Name">
										<p class="element_error"></p>
									</div>
									<div class="elem">
										<input type="email" value="" name="EMAIL" class="required email subscribe_inp" id="mce-EMAIL" placeholder="Your email address">
										<p class="element_error"></p>
									</div>
                                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button subscribe_btn">
                                </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_9329bb7e69a5f45bee46f731d_aa3a7fd7c6" tabindex="-1" value=""></div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }else{ ?>
        <div class="subscribe">
            <div class="content_right_title">
                <p>
                    Related Posts
                </p>
            </div>
            <?php
            $args = array(
                'post_type'        =>'post',
                'posts_per_page'   => 3,
                'order'            =>'DESC',
                'suppress_filters' => 0,
                'exclude'          => $post->ID,
                'tag'          => $tag->name
            );
            $posts = get_posts( $args );
            global $cfs;
            foreach($posts as $item) {
                $id = $item->ID;
                if($cfs->get('type', $id )["Video"] == 'Video'){
                    $type = $cfs->get('embed', $id );
                }
                elseif($cfs->get('type', $id )["Audio"] == 'Audio') {
                    $type = $cfs->get('embed', $id);
                }
                elseif($cfs->get('type', $id )["Standard"] == 'Standard') {
                    $type = 'text';
                }
                elseif($cfs->get('type', $id )["Photo"] == 'Photo') {
                    $type = get_the_post_thumbnail($id);
                }
                if($type != 'text') $img =  ' <div class="post_imgM">' . $type . '</div>';
                $out = '<div class="miniPost">';
                $out .= $img;
                $out .= '<div>';
                $out .= '<div class="miniDate">' . get_the_date() . '</div>';
                $out .= '<a href= "' . get_the_permalink($id) . '">'.substr(get_the_title($id), 0, 71).'</a>';
                $out .= '</div>';
                $out .= '<div class="line"><span></span>';
                $out .= '</div>';
                $out .= '</div>';
                echo $out;
            }
            ?>
        </div>
        <?php } ?>
    </div>




