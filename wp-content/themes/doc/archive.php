<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage doc
 * @since doc
 */

get_header(); global $post; ?>
<div class="cont content">
	<div class="content_left">
		<div class="searchR">
			<p>
				<?php
				if ( is_day() ) :
					printf( __( '<span class="mini">Daily Archives: %s</span>', 'doc' ), '<span class="big">' . get_the_date() . '</span>' );
				elseif ( is_month() ) :
					printf( __( '<span class="mini">Monthly Archives: %s</span>', 'doc' ), '<span class="big">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'doc' ) ) . '</span>' );
				elseif ( is_year() ) :
					printf( __( '<span class="mini">Yearly Archives: %s</span>', 'doc' ), '<span class="big">' . get_the_date( _x( 'Y', 'yearly archives date format', 'doc' ) ) . '</span>' );
				else :
					_e( '<span class="mini">Archives</span>', 'doc' );
				endif;
				?>
			</p>
			<div class="searchClose">
				<a href="/">

				</a>
			</div>
		</div>
<?php if(have_posts()) : while(have_posts()) : the_post();
 $id = $post->ID;	?>
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
					            	<!--               <a href="#">-->

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

<?php endwhile; endif; ?>
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
<?php get_footer(); ?>
