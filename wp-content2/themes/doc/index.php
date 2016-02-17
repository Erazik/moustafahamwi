<?php
/*
 * Template Name: Home Page Template
 *
 * */

get_header();
?>
<div class="container demo-2">
        <div id="slider" style="min-height: 667px" class="sl-slider-wrapper">

            <div class="sl-slider">
                <?php
                $args = array(
                    'post_type'        =>'slider',
                    'posts_per_page'   => -1,
                    'order'            =>'DESC',
                    'suppress_filters' => 0
                );
                $posts = query_posts( $args );
                foreach($posts as $item) {
                    $id = $item->ID;
                    ?>
                    <?php

                    if($cfs->get('slider_option', $id )){
                        $loop = $cfs->get('slider_option', $id );

                        foreach($loop as $pool => $path)
                        {?>
                            <div class="sl-slide" data-orientation="<?php echo $path['data_orientation'];?>" data-slice1-rotation="<?php echo $path['data_slice1_rotation'];?>" data-slice2-rotation="<?php echo $path['data_slice2_rotation'];?>" data-slice1-scale="<?php echo $path['data_slice1_scale'];?>" data-slice2-scale="<?php echo $path['data_slice2_scale'];?>">
                        <?php }}?>
                    <div class="sl-slide-inner">
                        <div class="slide">
                            <div class="slider_img">
                                <?php echo get_the_post_thumbnail( $id ); ?>
                            </div>
<!--                            <div class="cont slider_title">-->
<!--                                <p>--><?php //echo get_the_title($id); ?><!--</p>-->
<!--                            </div>-->
                            <div class="cont slider_content">
                                <?php if( $item->post_content != "" ) {
                                    $content_post = get_post($id);
                                    $content = $content_post->post_content;
                                    $content = apply_filters('the_content', $content);
                                    $content = str_replace(']]>', ']]&gt;', $content);
                                    echo $content;
                                    ?>

                                    <a href="#"><i class="fa fa-arrow-circle-right"></i></a>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                    </div>
                <?php
                };
                wp_reset_query();
                ?>
            </div>

            <div id="mc_embed_signup" class="mailchimp">
                <div class="cont inp_btn">
                    <form autocomplete="off" action="http://moustafahamwi.us12.list-manage.com/subscribe/post-json?u=4db02be49a9a2c776ff45b166&amp;id=77cc7efe5a&amp;c=?" method="get" id="mc-embedded-subscribe-form-home" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <div class="mailchimp_text">
                                <p>
                                    Want more PASSION in your life? Subscribe to the weekly Passion Sundays for free.
                                </p>
                            </div>
                            <div class="mc-field-group">
								<div class="element">
									<input type="text"  name="FNAME" class="inp" id="mce-FNAME" placeholder="Full Name" />
									<p class="element_error"></p>
								</div>
								<div class="element">
									<input type="email" name="EMAIL" class="required email inp" id="mce-EMAIL" placeholder="Your email address"  />
									<p class="element_error"></p>
								</div>
                                <input type="submit" value="I want PASSION" name="subscribe" id="mc-embedded-subscribe" class="button btn">
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

            <nav id="nav-dots" class="nav-dots">
                <span class="nav-dot-current"></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </nav>


        </div><!-- /slider-wrapper -->



    </div>
<div class="cont content">
    <div class="content_left">
        <div id="elems">
        <?php
        if(isset($_GET['page'])){
            $offset = intval($_GET['page']) * 5 - 5;
            if($offset == 5)
                $offset = 0;
//            var_dump($offset);
        }
        $args = array(
            'post_type'        =>'post',
            'posts_per_page'   => 5,
            'order'            =>'DESC',
            'suppress_filters' => 0,
            'offset'           => $offset
        );
        $posts = query_posts( $args );
        global $cfs;
        foreach($posts as $item) {
            $id = $item->ID;
            ?>
        <div class="post">
                <a href="<?php echo get_the_permalink($id); ?>">
                    <?php
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

                    if($type != 'text') echo ' <div class="post_img">' . $type . '</div>'; ?>
                    <div <?php
                    if($type == 'text')
                    {
                        echo 'class="noImage post_right" style="width:100%"';
                    } else{
                        echo 'class="post_right"';
                    } ?> >
                        <div class="post_title">
                            <?php echo get_the_title($id); ?>
                        </div>

                        <div class="post_date">
                            <?php
                            $tags = get_the_tags($id);
                            $count = 0;$tagE  = '';
                            foreach($tags as $tag){
                                if($count == 0)
                                    $tagE .=  $tag->name ;
                                else{
                                    $tagE .= ', ' . $tag->name;
                                }
                                $count++;
                            }
                            if($tagE != '')
                                $tagE = " / <span>" . $tagE . " </span>";
                            else
                                $tagE = '';
                            echo get_the_date('F j, Y',$id) .  $tagE . '/ <span class="livefyre-commentcount" data-lf-site-id="380413" data-lf-article-id="' . $id . '">0</span> Comments';?>
                        </div>
                        <div class="post_content">

                            <?php
                            $content_post = get_post($id);
                            $content = $content_post->post_content;
                            $content = apply_filters('the_content', $content);
                            $content = str_replace(']]>', ']]&gt;', $content);
                            //limit_words($content, 40);
                            echo substr($content, 0, 180);
                            ?>
                            <i class="fa fa-arrow-circle-right"></i>
                        </div>
                    </div>
                    <?php
                    if($cfs->get('icon', $id )["Video"] == 'Video'){
                        $type = '<i class="fa fa-video-camera"></i>';
                    }
                    elseif($cfs->get('icon', $id )["Audio"] == 'Audio') {
                        $type = '<i class="fa fa-music"></i>';
                    }
                    elseif($cfs->get('icon', $id )["Standard"] == 'Standard') {
                        $type = '<i class="fa fa-pencil"></i>';
                    }
                    elseif($cfs->get('icon', $id )["Photo"] == 'Photo') {
                        $type = '<i class="fa fa-picture-o"></i>';
                    }
                    echo '<div class="Icon">' . $type . '</div>';
                    ?>
                </a>
        </div>
        <?php }; wp_reset_query(); ?>
            </div>
        <div class="pagination">
            <?php nums('post', 5); ?>
        </div>
    </div>
    <div class="content_right">
        <?php get_sidebar(); ?>
        </div>
</div>
    <div class="ask">
        <div class="cont">
            <div class="ask_title">Ask Moustafa</div>
            <div class="ask_content">
                <p>Have a question you’d love to ask me about passion, purpose, motivation, work or life in general?</p>
                <p>Send it over and I’ll answer the best in a future blog post…</p>
            </div>
            <div class="ask_btn">
                <a href="/connect/">Ask Now!</a>
            </div>
        </div>
    </div>


<?php
get_footer();
?>