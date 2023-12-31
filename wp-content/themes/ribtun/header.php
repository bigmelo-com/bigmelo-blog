<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" >
<!-- start -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no">
	
	<?php wp_head();?>
</head>		
<!-- start body -->
<body <?php body_class(); ?> id="particles-js" >
	<!-- start header -->
			<!-- fixed menu -->		
			<?php 
			?>	
			<?php if(ribtun_globals('display_scroll')) { ?>
			<div class="pagenav fixedmenu">						
				<div class="holder-fixedmenu">							
					<div class="logo-fixedmenu">								
					<?php if(ribtun_globals('scroll_logo') && !ribtun_globals('use_site_title')){ ?>
						<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(ribtun_data('scroll_logo')); ?>" data-rjs="3" alt="<?php esc_attr(bloginfo('name')); ?> - <?php esc_attr(bloginfo('description')) ?>" ></a>
					<?php } else { ?>
						<a class = "blog-name-scroll" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
					<?php } ?>
					</div>
						<div class="menu-fixedmenu home">
						<?php
						if ( has_nav_menu( 'ribtun_scrollmenu' ) ) {
						wp_nav_menu( array(
						'container' =>false,
						'container_class' => 'menu-scroll',
						'theme_location' => 'ribtun_scrollmenu',
						'echo' => true,
						'fallback_cb' => 'ribtun_fallback_menu',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'walker' => new ribtun_Walker_Main_Menu())
						);
						}
						?>	
					</div>
				</div>	
			</div>
			<?php } ?>
				<header>
				<!-- top bar -->
				<?php if(ribtun_globals('top_bar')) { ?>
					<div class="top-wrapper">
						<?php if(!ribtun_globals('show_crypto_slider_top_bar')) { ?>
						<div class="top-wrapper-content">
							<div class="top-left">
								<?php if(is_active_sidebar( 'ribtun_sidebar-top-left' )) { ?>
									<?php dynamic_sidebar( 'ribtun_sidebar-top-left' ); ?>
								<?php } ?>
							</div>
							<div class="top-right">
								<?php if(is_active_sidebar( 'ribtun_sidebar-top-right' )) { ?>
									<?php dynamic_sidebar( 'ribtun_sidebar-top-right' ); ?>
								<?php } ?>
							</div>
						</div>
						<?php } else { ?>
							<?php if(shortcode_exists('currencyprice_pmc')){
								if(ribtun_data('crypto_options_coins_design') == 1){
									if(ribtun_globals('show_crypto_daychange')) {$daycahnge = 'yes';} else {$daycahnge = 'no';}
									echo do_shortcode(' [currencyprice_pmc currency1="'.implode( ",", ribtun_data('select_crypto_coin')).'" currency2="'.implode( ",", ribtun_data('select_crypto_coin_currency')).'" daychange="'.$daycahnge.'"]');
								}
								if(ribtun_data('crypto_options_coins_design') == 2){
									echo do_shortcode(' [currency_ticker_2 coins="'. str_replace("*", "",implode( ",", ribtun_data('select_crypto_coin'))).'" compare="'.ribtun_data('select_crypto_coin_currency_1').'"]');
								}
							} ?>
						<?php } ?>						
					</div>
					<?php } ?>			
					<div id="headerwrap">		

						<!-- logo and main menu -->
						<div id="header">
							<div class="header-image">
							<!-- respoonsive menu main-->
							<!-- respoonsive menu no scrool bar -->
							<?php if ( has_nav_menu( 'ribtun_respmenu' ) ) { ?>
							<div class="respMenu noscroll">
								<div class="resp_menu_button"><i class="fa fa-list-ul fa-2x"></i></div>
								<?php 
									$menuParameters =  array(
									  'theme_location' => 'ribtun_respmenu', 
									  'walker'         => new ribtun_Walker_Responsive_Menu(),
									  'echo'            => false,
									  'container_class' => 'menu-main-menu-container',
									  'items_wrap'     => '<div class="event-type-selector-dropdown">%3$s</div>',
									);
									echo strip_tags(wp_nav_menu( $menuParameters ), '<a>,<br>,<div>,<i>,<strong>' );
								?>	
							<?php } ?>
							</div>
							<!-- logo -->
							<?php if(ribtun_data('logo_position') == 1 ){ 
								ribtun_logo();
							} ?>
							</div>
							<!-- main menu -->
							<div class="pagenav <?php if( ribtun_data('logo_position') == 3  ){ echo 'logo-left-menu'; } ?>"> 	
							<?php if( ribtun_data('logo_position') == 3  ){ 
									ribtun_logo();
								} ?>								
								<div class="pmc-main-menu">
								<?php
									if ( has_nav_menu( 'ribtun_mainmenu' ) ) {	
										wp_nav_menu( array(
										'container' =>false,
										'container_class' => 'menu-header home',
										'menu_id' => 'menu-main-menu-container',
										'theme_location' => 'ribtun_mainmenu',
										'echo' => true,
										'fallback_cb' => 'ribtun_fallback_menu',
										'before' => '',
										'after' => '',
										'link_before' => '',
										'link_after' => '',
										'depth' => 0,
										'walker' => new ribtun_Walker_Main_Menu()));								
									} ?>											
								</div> 	
							</div> 
							<?php if(ribtun_data('logo_position') == 2){ 
								ribtun_logo();
							} ?>							
						</div>
					</div> 												
				</header>	
				<?php
				if(function_exists( 'putRevSlider')){						
					if(ribtun_globals('use_rev_slider_home') && is_front_page() ){ ?>
						<div id="ribtun-slider-wrapper">
							<div id="ribtun-slider">
								<?php putRevSlider(ribtun_data('rev_slider'),"homepage") ?>
							</div>
						</div>
					<?php } ?>
				<?php } ?>		
				<?php 					
				if(is_front_page() && ribtun_globals('use_categories')){ ?>
						<?php ribtun_block_one(); ?>
					<?php } ?>	
					<?php if(is_front_page() && ribtun_globals('use_block2') ){ ?>	
						<?php ribtun_block_two(); ?>
					<?php } ?>				
				<?php if(is_front_page()){ ?>
				<?php if(function_exists('ribtun_custom_layout')) {ribtun_custom_layout();} ?>
				<?php } ?>				
