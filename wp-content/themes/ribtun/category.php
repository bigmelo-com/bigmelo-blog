<?php get_header(); ?>

<?php

	if(ribtun_globals('grid_blog')){
		switch(ribtun_data('grid_blog')){
		case 1:
			get_template_part('category-default','category');
		break;
		case 2:
			get_template_part('category-grid','category');
		break;		
		}
	}
	else {
		get_template_part('category-default','category');
	}

?>

<?php get_footer(); ?>