<?php if (have_posts()) { ?>
	<?php get_template_part('category','category'); ?>
<?php } else { ?>
	<?php get_header(); ?>
		<div class="mainwrap blog">
			<div class="main clearfix">		
				<div class="content blog">
					<div class="search-no-result">
						<?php esc_attr_e('Nothing found for this search term!','ribtun'); ?>
						
					</div>
					<div class="sidebar search">
						<?php $args = array('before_title' => '<h3>', 'after_title' => '</h3><div class="widget-line"></div>'); ?>
						<div class="one_fourth">
							<?php the_widget( 'WP_Widget_Search','title='.esc_attr__("Try again","ribtun"),$args); ?> 
						</div>
						<div class="one_fourth">
							<?php the_widget( 'WP_Widget_Categories','',$args); ?> 
						</div>	
						<div class="one_fourth">
							<?php the_widget( 'WP_Widget_Archives','',$args); ?> 
						</div>		
						<div class="one_fourth last">
							<?php the_widget( 'WP_Widget_Tag_Cloud','',$args); ?> 
						</div>					
					</div>
				</div>
			</div>
		</div>

	<?php get_footer(); ?>
<?php }  ?>