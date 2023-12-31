<div class="totop"><div class="gototop"><div class="arrowgototop"></div></div></div>
<!-- footer-->
<?php if(is_front_page()){ ?>
<div class="sidebars-wrap bottom">
	<div class="sidebars">
		<div class="sidebar-fullwidth">
			<?php if (is_active_sidebar('ribtun-sidebar-footer-fullwidth' )) { ?>
				<?php dynamic_sidebar( 'ribtun-sidebar-footer-fullwidth' ); ?>
			<?php } ?>	
		</div>		
		<div class="sidebar-left-right">
			<div class="left-sidebar">
				<?php if (is_active_sidebar('ribtun-sidebar-footer-left' )) { ?>
					<?php dynamic_sidebar( 'ribtun-sidebar-footer-left' ); ?>
				<?php } ?>	
			</div>
			<div class="right-sidebar">
				<?php if (is_active_sidebar('ribtun-sidebar-footer-right' )) { ?>
					<?php dynamic_sidebar( 'ribtun-sidebar-footer-right' ); ?>
				<?php } ?>	
			</div>
		</div>							
	</div>
</div>
<?php } ?>
<footer>
	<div id="footer">
	<!-- show crypto slider in bottom bar -->
	<?php if(shortcode_exists('currencyprice_pmc')){
		$postmeta = get_post_custom(get_the_id()); 
		$ribtun_crypto_bottom = isset($postmeta["show_crypto_slider_bottom_bar_post_page"][0]) ? $postmeta["show_crypto_slider_bottom_bar_post_page"][0] : '';
		if(is_front_page() || !is_page() || !is_single()){$ribtun_crypto_bottom = '';}
	?>
		<?php if(ribtun_globals('show_crypto_slider_bottom_bar') || !empty($ribtun_crypto_bottom)) { ?>
			<div class="ribtun-crypto-bottom-bar">
				<?php
				if(ribtun_globals('show_crypto_daychange')) {$daycahnge = 'yes';} else {$daycahnge = 'no';}
				echo do_shortcode(' [currencyprice_pmc currency1="'.implode( ",", ribtun_data('select_crypto_coin')).'" currency2="'.implode( ",", ribtun_data('select_crypto_coin_currency')).'" daychange="'.$daycahnge.'"]');
				?>
			</div>
		<?php } ?>	
	<?php } ?>	
	<?php
	if(ribtun_globals('use_block3') && ribtun_globals('block3_username') && function_exists( 'display_instagram' ) ){ ?>
		<div class="block3">
			<a href="<?php ribtun_security(ribtun_data('block3_url')) ?>" target="_blank"></a>
		</div>
		<?php
			$atts = array('id' => esc_attr(ribtun_data('block3_username')), 'cols' => 8, 'imageres' => 'full', 'num' => 8);
			echo display_instagram($atts);
	}
	?>
	
	<div id="footerinside">
	<!--footer widgets-->
		<div class="block_footer_text">
			<p><?php 
			if(isset($ribtun_data['block_footer_text'])){
			ribtun_security($ribtun_data['block_footer_text']); }?></p>
		</div>
		<div class="footer_widget">
			<div class="footer_widget1">
				<?php if (is_active_sidebar('ribtun_footer1' )) { ?>
				<?php dynamic_sidebar( 'ribtun_footer1' ); ?>	
				<?php } ?>				
			</div>	
			<div class="footer_widget2">	
				<?php if (is_active_sidebar('ribtun_footer2' )) { ?>
				<?php dynamic_sidebar( 'ribtun_footer2' ); ?>	
				<?php } ?>	
			</div>	
			<div class="footer_widget3">	
				<?php if (is_active_sidebar('ribtun_footer3' )) { ?>
				<?php dynamic_sidebar( 'ribtun_footer3' ); ?>	
				<?php } ?>	
			</div>
		</div>
	</div>		
	</div>
	
	
	
	
	<!-- footer bar at the bootom-->
	<div id="footerbwrap">
		<div id="footerb">
			<div class="lowerfooter">
			<div class="copyright">	
				<?php ribtun_security(ribtun_data('copyright')); ?>
			</div>
			</div>
		</div>
	</div>	
</footer>	
<?php wp_footer();  ?>
</body>
</html>
