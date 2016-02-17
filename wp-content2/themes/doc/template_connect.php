<?php
/*
 * Template Name: Connect Page Template
 *
 * */

get_header();
?>
<div class="connect_content">
    <div class=" connect_content_top">
        <div class="cont contact_form"><?php echo do_shortcode ('[contact-form-7 id="113" title="Contact form 1"]');?></div>
        <div class="img_mob"><img src="<?php bloginfo('template_url'); ?>/images/Layer-274.png"></div>
        <div id="mc_embed_signup" class="mailchimp_connect">
            <div class="cont inp_btn">
                <form action="//moustafahamwi.us12.list-manage.com/subscribe/post-json?u=4db02be49a9a2c776ff45b166&amp;id=77cc7efe5a&amp;c=?" method="get" id="mc-embedded-subscribe-form-connect" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <div class="mailchimp_text_connect">
                            <p style="color:#fff">Want more PASSION in your life?</p>
                            <p style="color:#fff">Get the Passionate Life series for FREE</p>
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
                            <input type="submit" value="I want PASSION"  name="subscribe" id="mc-embedded-subscribe" class="button btn">
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

    <div class="cont1 connect_content_bottom">
        <div class="connect_bottom_title"><p>Be on Passion Sundays</p></div>
        <div class="connect_bottom_first"><p>Got a burning question you’d like me to answer on an upcoming episode of Passion Sundays? Tell me about it <a href="#">here</a> </p></div>
        <div class="connect_bottom_second"><p>Or email me directly at <a href="mailto:iWantPassion@FindYourSatori.com?body=Your message within Main Body">iWantPassion@FindYourSatori.com</a></p></div>
    </div>
</div>

<?php
get_footer();
?>
<script>
//    $("select").selectBoxIt({
//
//        // Hides the currently selected option from appearing when the drop down is opened
//        hideCurrent: true
//
//    });
</script>