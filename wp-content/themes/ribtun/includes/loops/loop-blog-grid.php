	<?php if(ribtun_data('excpert_lenght')){ $short = ribtun_data('excpert_lenght');}else{$short = 25;} ?>
	<div class="entry grid">
		<div class = "meta">		
			<div class="blogContent">
				<div class="topBlog">	
					<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_attr__( ' ', 'ribtun' ) ) . '</em>'; ?> </div>
					<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','ribtun')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php get_template_part('includes/loops/loop-meta-blog','category-grid'); ?>
				</div>				
				<div class="blogcontent"><?php echo wp_trim_words(get_the_excerpt(),$short,'...') ?></div>
			<?php if(ribtun_globals('display_post_meta')) { ?>
			
				<div class="bottomBlog">
			

					
					 <!-- end of socials -->
					
					<?php if(ribtun_globals('display_reading')) { ?>
					<div class="blog_time_read">
						<?php if(function_exists('ot_estimated_reading_time')) { ?>
							<?php echo esc_attr__('Reading time: ','ribtun') . esc_attr(ot_estimated_reading_time(get_the_ID())) . esc_attr__(' min','ribtun') ; ?>
						<?php } ?>
					</div>
					<?php } ?>
					<!-- end of reading -->
					<div class="ribtun-read-more"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to ','ribtun'); ?><?php the_title_attribute(); ?>"><?php esc_attr_e('Continue reading','ribtun') ?></a></div>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
				</div> 
		
		<?php } ?> <!-- end of bottom blog -->
			</div>
		</div>		
	</div>
