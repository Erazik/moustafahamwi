<?php
/*
 * Template Name: About me Page Template
 *
 * */

get_header();
?>
<div class="about_content">
    <div class="about_content_top">
        <div class=" ellipse_all">
            <div class=" ellipse"></div>
            <div class="ellipse_name"><p>Moustafa Hamwi</p></div>
            <div class="ellipse_content">
                <div class="ellipse_content1"><p>SPEAKER, COACH, ADVENTURER AND A PASSIONATE SOCIALREPRENEUR. </p></div>
                <div class="ellipse_content2"><p>On a mission to bring more passion & purpose into peoples lives…</p></div>
            </div>
            <div class="ellipse_bottom">Get to know me</div>
        </div>

    </div>
    <div id="mc_embed_signup" class="mailchimp_about">
        <div class="cont inp_btn_about">
            <form action="//asup.us7.list-manage.com/subscribe/post-json?u=9329bb7e69a5f45bee46f731d&amp;id=aa3a7fd7c6&amp;c=?" method="get" id="mc-embedded-subscribe-form-about" name="mc-embedded-subscribe-form"autocomplete="off" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <div class="mailchimp_about_text">
                        <p>
                            Want more PASSION in your life? Subscribe to the weekly Passion Sundays for free.
                        </p>
                    </div>
                    <div class="mc-field-group">
                        <div class="element">
                            <input type="text" value="" name="FNAME" class="inp_about" id="mce-FNAME" placeholder="Full Name">
                            <p class="element_error"></p>
                        </div>
                        <div class="element">
                            <input type="email" value="" name="EMAIL" class="required email inp_about" id="mce-EMAIL" placeholder="Your email address">
                            <p class="element_error"></p>
                        </div>
                        <input type="submit" value="I want PASSION" name="subscribe" id="mc-embedded-subscribe" class="button btn_about">
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
    <div class="middle1">
        <div class="cont about_middle">
            <div class="about_middle_left">
                <div class="left_title">
                    <p> <?php
                        global $cfs, $tag, $post;
                        if($cfs->get('title', 10 )){
                            $text = $cfs->get('title', 10 );
                            echo($text);
                        }
                        ?></p>
                </div>
                <div class="left_content">
                    <?php
                    $content_post = get_post($id);
                    $content = $content_post->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]&gt;', $content);
                    echo $content;
                    ?>
                </div>

            </div>
            <div class="about_middle_right"><img src="<?php bloginfo('template_url')?>/images/moustafa.png"></div>
        </div>
        <div class=" cont about_middle_btn"><a href="#">Connect</a></div>
    </div>
    <div class="cont middle22">
        <div class="middle2">
            <div class="middle2_title"><p>Qualifications</p></div>
            <div class="middle2_content">
                <?php
                    global $cfs, $tag, $post;
                    if($cfs->get('qualifications', 10 )){
                        $text = $cfs->get('qualifications', 10 );
                        echo($text);
                    }
                    ?>
            </div>
        </div>
        <div class="middle2">
            <div class="middle2_title"><p>Experiences</p></div>
            <div class="middle2_content">
                <?php
                global $cfs, $tag, $post;
                if($cfs->get('experiences', 10 )){
                    $text = $cfs->get('experiences', 10 );
                    echo($text);
                }
                ?>
        </div>
        </div>
        <div class="middle2">
            <div class="middle2_title"><p>Board Roles</p></div>
            <div class="middle2_content">
                 <?php
                global $cfs, $tag, $post;
                if($cfs->get('board_roles', 10 )){
                    $text = $cfs->get('board_roles', 10 );
                    echo($text);
                }
                ?>
            </div>
        </div>
    </div>
    <div class="about_pic">
        <div class="cont">
            <?php
            global $cfs, $tag, $post;
            if($cfs->get('gallery', 10 )){
                $text = $cfs->get('gallery', 10 );
                echo($text);
            }
            ?>
        </div>
    </div>
    <div class="mission">
        <div class="cont" >
            <div class="mission_first"><p>Moustafa Hamwi</p></div>
            <div class="mission_second"><p>MY MISSION</p></div>
            <div class="mission_tirth"><p>is to create communities of passionate leaders who are living an inspired
                life full of passion & purpose.</p></div>
        </div>

    </div>
    <div class="testimonial">
        <div class="cont">
            <ul class="bxslider">

                            <?php
                            if($cfs->get('testimonials', 10 )){
                                $loop = $cfs->get('testimonials', 10 );

                                foreach($loop as $pool => $path)
                                {

                                    $show ='<li>';
                                    $show.= '<a class="test_cont">'.$path['test_content'].'</a>';

                                    $show .= '<a class="test_name">'.$path['test_name'].'</a>';
                                    $show .='</li>';

                                    echo $show;

                                }
                            }
                            ?>

            </ul>
        </div>
    </div>
    <div class="mailchimp_about_second">
    <div id="mc_embed_signup" class="mailchimp">
        <div class="cont inp_btn">
            <form autocomplete="off" action="//asup.us7.list-manage.com/subscribe/post-json?u=9329bb7e69a5f45bee46f731d&amp;id=aa3a7fd7c6&amp;c=?" method="get" id="mc-embedded-subscribe-form-home" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <div class="mailchimp_text">
                        <p>
                            Want more PASSION in your life?<br>
                            get Passion Sundays series for free
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
    </div>
    <div class="ask ask_about">
        <div class="cont">
            <div class="ask_title">Ask Moustafa</div>
            <div class="ask_content">
                <p>Have a question you’d love to ask me about passion, purpose, motivation, work or life in general?</p>
                <p>Send it over and I’ll answer the best in a future blog post…</p>
            </div>
            <div class="ask_btn">
                <a href="http://moustafa.shahum.net/contact-me/">Ask Now!</a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>