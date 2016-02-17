<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage doc
 * @since doc
 */

get_header(); ?>
    <div class="cont content">
        <div class="content_left">
            <?php
            global $tag;
            if(isset($_GET['page'])){
                $offset = intval($_GET['page']) * 5 - 5;
                if($offset == 5)
                    $offset = 0;
            }
            $args = array(
                'post_type'        =>'post',
                'posts_per_page'   => 5,
                'order'            =>'DESC',
                'suppress_filters' => 0,
                'offset'           => $offset,
                'tag'          => $tag
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
                        <div <?php if($type == 'text') echo 'style="width:100%"' ?> class="post_right">
                            <div class="post_title">
                                <?php echo get_the_title($id); ?>
                            </div>
                            <div class="post_date">
                                <?php
                                $tags = get_the_tags($id);
                                $count = 0;$tagE  = '';
                                foreach($tags as $tag){
                                    if($count == 0)
                                        $tagE .= $tag->name;
                                    else{
                                        $tagE .= ', ' . $tag->name;
                                    }
                                    $count++;
                                }
                                echo get_the_date() . '/ <span>' .  $tagE . '</span> /<span class="livefyre-commentcount" data-lf-site-id="380413" data-lf-article-id="' . $id . '">0</span> Comments';?>
                            </div>
                            <div class="post_content">

                                <?php
                                $content_post = get_post($id);
                                $content = $content_post->post_content;
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                //limit_words($content, 40);
                                echo substr($content, 0, 200).'...';
                                ?>
                                <!--                            <a href="#">-->
                                <i class="fa fa-arrow-circle-right"></i>
                                <!--                            </a>-->

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
            <div class="pagination">
                <?php //nums('post', 5); ?>
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
                <a href="http://moustafa.shahum.net/contact-me/">Ask Now!</a>
            </div>
        </div>
    </div>


<?php
get_footer();
?>