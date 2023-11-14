<?php
$postmeta = get_post_custom(get_the_id()); 		
$postmeta = get_post_custom(get_the_id()); 
if(isset($postmeta["_format_link_url"][0])){
	$link = esc_url($postmeta["_format_link_url"][0]);
} else {
	$link = "#";
}			
?>
<div class="link-category">
	<div class="topBlog">	
		<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_attr__( '&#8226;', 'ribtun' ) ) . '</em>'; ?> </div>
		<h2 class="title"><a href="<?php echo esc_url($link);?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','ribtun')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	</div>			
	<?php if(ribtun_getImage(get_the_id(), 'ribtun-postBlock') != '') { ?>	
		<a class="overdefultlink" href="<?php echo esc_url($link) ?>">
		<div class="overdefult">
		</div>
		</a>

		<div class="blogimage">	
			<div class="loading"></div>		
			<a href="<?php echo esc_url($link) ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','ribtun')?> <?php the_title_attribute(); ?>"><?php echo ribtun_getImage(get_the_id(), 'ribtun-postBlock'); ?></a>
		</div>
	<?php } ?>					
	<div class="entry">
		<div class = "meta">
			<div class="blogContent">
				<div class="blogcontent"><?php the_content(''); ?> </div>
			</div>

		</div>		
	</div>								
</div>

<?php 