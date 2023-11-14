<?php
/*
Template Name: Page with sidebar
*/

?>

<?php get_header(); 
?>
<!-- main content start -->
<div class="mainwrap sidebar">
	<!--rev slider-->
	<?php $postmeta = get_post_custom(get_the_id()); 
	if(!empty($postmeta["ribtun_sigle_option_revslider"][0]) && function_exists('putRevSlider')) { ?>
		<div id="ribtun-slider-wrapper" class="ribtun-rev-slider">
		<?php putRevSlider(esc_attr($postmeta["ribtun_sigle_option_revslider_alias"][0])); ?>
		</div>
	<?php } ?>	

	<div class="blogsingleimage">			
			<?php echo ribtun_getImage(get_the_id(), 'ribtun-postBlock'); ?>
	</div>
	<div class="main clearfix">
		
		<div class="content  singlepage">
			<div class="postcontent">
				<div class="posttext">
					<h1><?php the_title(); ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="usercontent"><?php the_content(); ?></div>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<div class="ribtun-page-navigation">
				<?php wp_link_pages(); ?> 
			</div>
			<?php comments_template(); ?>	
		</div>

		<?php if(is_active_sidebar( 'ribtun_sidebar' )) { ?>
			<div class="sidebar">	
				<?php dynamic_sidebar( 'ribtun_sidebar' ); ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php get_footer(); ?>