<?php
    get_header();
global $post;
global $cfs;
$id = $post->ID;
?>
<div class="cont content">
    <div class="content_left">
        <div class="post full">
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
                <div <?php if($type == 'text') echo 'style="width:100%"' ?> class="post_right">
                    <div class="post_title">
                        <?php echo get_the_title($id); ?>
                    </div>
                    <div class="post_date">
                        <?php echo get_the_date();?>
                    </div>
                    <div class="post_content">

                        <?php
                        $content_post = get_post($id);
                        $content = $content_post->post_content;
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        echo $content;
                        ?>
                    <div class="tagss">
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
                            echo '<p><span>Tags</span>' . $tagE . '</p>'
                        ?>

                    </div>
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
        </div>
        <div id="mc_embed_signup" class="mailchimp">
            <div class=" inp_btn">
                <form action="//asup.us7.list-manage.com/subscribe/post-json?u=9329bb7e69a5f45bee46f731d&amp;id=aa3a7fd7c6&amp;c=?" method="get" id="mc-embedded-subscribe-form-single" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <div class="mailchimp_text">
                            <p>
                                LIKE WHAT YOU’VE READ SO FAR?<br/>
                                GET ACCESS TO MY FREE WEEKLY PASSION SUNDAYS
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
        <?php if ( comments_open() || get_comments_number() ) {
            comments_template();
        } ?>
    </div>
    <div class="content_right">
        <div class="single_right_top">
            <div id="mc_embed_signup" class="mailchimp_single">
                <div class="inp_btn_single">
                    <form action="//asup.us7.list-manage.com/subscribe/post?u=9329bb7e69a5f45bee46f731d&amp;id=aa3a7fd7c6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <div class="mailchimp_text_single">
                                <p style="color:#fff">Want more PASSION in your life?<br>
                                    Subscribe the weekly Passion dose for FREE…</p>
                            </div>
                            <div class="mc-field-group">
                                <input type="text" value="" name="FNAME" class="inp_single" id="mce-FNAME" placeholder="Full Name">
                                <input type="email" value="" name="EMAIL" class="required email inp_single" id="mce-EMAIL" placeholder="Your email address">
                                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn_single">
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
            <div class="mailchimp_bg">
                <img src="<?php bloginfo('template_url'); ?>/images/single.png">
            </div>

        </div>


        <?php get_sidebar(); ?>
    </div>
</div>


<style>
    .post.full .post_img,
    .post.full iframe{
        width: 100%;
        height: 500px;
        float: none;
    }
    .post.full .post_right{
        float: none;
        width: 100%;
    }
    .post.full{
        height: 100%;
    }
    .content {
        padding-top: 40px;
    }
    .single_right_top {
        float: left;
        width: 100%;
        margin-bottom: 23px;
    }
    .mailchimp_single {
        position: absolute;
        float: left;
        width: 16%;
    }
    .mailchimp_text_single {
        width: 100%;
    }
    .inp_btn_single {
        width: 100%;
    }
    .mailchimp_text_single p {
        width: 100%;
        padding-top: 38px;
        padding-left: 17px;
        padding-right: 15px;
        padding-bottom: 31px;
        font-size: 22px;
        font-family: roboto-bold;
        line-height: 26px;
    }
    .inp_single {
        width: 235px;
        height: 50px;
        margin-left: 8px;
        margin-bottom: 7px;
        padding-left: 10px;
    }
    .btn_single {
        width: 235px;
        height: 50px;
        color: #fff;
        border-radius: 30px;
        background: #f08800;
        margin-top: 7px;
        margin-left: 8px;
        border: none;
        text-transform: uppercase;
    }
</style>


<?php get_footer(); ?>
