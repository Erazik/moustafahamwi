<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
get_header();
global $post;
$id = $post->ID;
?>

<?php

$content_post = get_post($id);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
echo $content;
?>

<?php get_footer(); ?>

<script>
    $(document).ready(function(){url: 'https://app.getresponse.com/add_contact_webform_v2.html?u=BoPG0&webforms_id=3207802',
        $('#sa').on('submit', function(e){
            e.preventDefault();
            console.log($(this).attr('method'));
            console.log($(this).attr('action'));
            console.log($(this).find('input[name=email]').val());
            $.ajax({
                type: 'POST',//$(this).attr('method'),
                url: 'https://app.getresponse.com/add_contact_webform_v2.html?u=BoPG0&webforms_id=3207802', //$(this).attr('action'),
                data: 'webform[email]=alex777@gmail.com&webform[first_name]=test&webform[http_referer]=https%3A%2F%2Fapp.getresponse.com%2Fsite2%2Fmoustafa%3Fu%3DBoPG0%26webforms_id%3D3207802',
                //data: $(this).serialize(),
                contentType : 'application/json',
                dataType    : 'JSON',
                crossDomain : true,
                async       : false,
                            
			   
                success     : function(data){
                    console.log(data);
                    console.log($(this).serialize());
                    if (data.result != "success") {
                        alert('error');
                    } else {
						alert('ok');
                        $('.overlay').css('display','block');
                        $('.modal').fadeIn(600);
                    }
                },
                error       : function(err) {
                    alert("Could not connect to the registration server. Please try again later.");
					//console.log(err);
                }
            });
        })
    })
</script>
