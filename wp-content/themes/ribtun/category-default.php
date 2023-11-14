
<!-- main content start -->
<div class="mainwrap blog <?php if(is_front_page()) echo 'home' ?> <?php if(!ribtun_globals('use_fullwidth')) echo 'sidebar' ?> default">
	<div class="ribtun-breadcrumb">
		<div class="browsing"><?php if(is_tag()){esc_attr_e('Browsing Tag','ribtun');}else{esc_attr_e('Browsing Category','ribtun');} ?></div>
		<?php echo ribtun_breadcrumb(); ?>
	</div>
	<div class="main clearfix">
		<div class="pad"></div>			
		<div class="content blog">
			
			<?php if (have_posts()) : ?>
				<?php 
				add_filter( 'shortcode_atts_gallery', 'ribtun_gallery_C' );
				function ribtun_gallery_c( $out )
				{
					
					$out['size'] = 'ribtun-news';
					return $out;
				}			
				?>
				<?php while (have_posts()) : the_post(); ?>
					<?php if(is_sticky(get_the_id())) { 
					?>
						<div class="ribtun_sticky">
					<?php } ?>
					<?php $postmeta = get_post_custom(get_the_id()); 
					?>
					<?php if ( has_post_format( 'gallery' , get_the_id())) { ?>	
						<div class="slider-category ribtun-type-gallery">
							<div class="blogpostcategory">
								<?php get_template_part('includes/loops/loop-top-blog','category'); ?>				
								<?php get_template_part('includes/post-formats/format-gallery','category'); ?>
								<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>						
								<?php get_template_part('includes/loops/loop-blog','category'); ?>	
							</div>
						</div>				
					<?php } 
					if ( has_post_format( 'video' , get_the_id())) { ?>
						<div class="slider-category ribtun-video">		
							<div class="blogpostcategory">
								<?php get_template_part('includes/loops/loop-top-blog','category'); ?>			
								<?php
								if(!empty($postmeta["_format_video_embed"][0])) {
									echo wp_oembed_get(esc_url($postmeta["_format_video_embed"][0]));
								} ?>
								<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>				
								<?php get_template_part('includes/loops/loop-blog','category'); ?>	
							</div>	
						</div>
					<?php } 
					
					if ( has_post_format( 'link' , get_the_id())) {
						get_template_part('includes/post-formats/format-link','category');
					} 	
					
					if ( has_post_format( 'quote' , get_the_id())) {?>
						<div class="quote-category">
							<?php get_template_part('includes/post-formats/format-quote','category'); ?>	
						</div>	
					<?php } ?>
					
					<?php if ( has_post_format( 'audio' , get_the_id())) {?>
						<div class="blogpostcategory ribtun-audio">
							<?php get_template_part('includes/loops/loop-top-blog','category'); ?>	
							<div class="audioPlayerWrap">
								<div class="audioPlayer">
									<?php 
									if(isset($postmeta["_format_audio_embed"][0]))
										echo wp_oembed_get(esc_url($postmeta["_format_audio_embed"][0])) ?>
								</div>
							</div>
							<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>			
							<?php get_template_part('includes/loops/loop-blog','category'); ?>		
						</div>	
					<?php } ?>					
					
					
					<?php if ( !get_post_format() ) {?>
						<div class="blogpostcategory">
							<?php get_template_part('includes/loops/loop-top-blog','category'); ?>				
							<?php if(ribtun_getImage(get_the_id(), 'ribtun-postBlock') != '') { ?>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
								<div class="blogimage">	
									<?php if(!empty($postmeta["ribtun_sigle_option_recipe"][0]) && !empty($postmeta["ribtun_sigle_option_recipe_hover"][0])){ ?>
										<div class="ribtun-hover-image-recipe"><?php echo ribtun_recipe_hover(); ?></div>
									<?php } ?>
									<?php echo ribtun_getImage(get_the_id(), 'ribtun-postBlock'); ?>
								</div></a>
							<?php } ?>
							<?php get_template_part('includes/loops/loop-meta-blog','category'); ?>				
							<?php get_template_part('includes/loops/loop-blog','category'); ?>								
						</div>
					
					<?php } ?>	
					
					<?php if(is_sticky()) { ?>
						</div>
					<?php } ?>
					
				<?php endwhile; ?>
					
				<?php
					get_template_part('includes/wp-pagenavi','navigation');
					if(function_exists('ribtun_wp_pagenavi')) { ribtun_wp_pagenavi(); }
				?>
						
			<?php else : ?>
				<div class="postcontent error-404">
					<?php $ribtun_data = get_option(OPTIONS); ?>
					<h1><?php ribtun_security($ribtun_data['errorpagetitle']) ?></h1>
					<div class="posttext">
						<?php ribtun_security($ribtun_data['errorpage']) ?>
					</div>
				</div>			
			<?php endif; ?>
				
		</div>
		<!-- sidebar -->
		<?php if(!ribtun_globals('use_fullwidth')) { ?>
			<?php if(is_active_sidebar( 'ribtun_sidebar' )) { ?>
				<div class="sidebar">	
					<?php dynamic_sidebar( 'ribtun_sidebar' ); ?>
				</div>
			<?php } ?>
		<?php } ?>
	</div>	
</div>											
