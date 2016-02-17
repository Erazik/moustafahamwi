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
