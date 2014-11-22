<?php
function childtheme_product_categories() {
	global $woo_options;
	if (class_exists('woocommerce') && $woo_options[ 'woo_homepage_product_categories' ] == "true" ) {
		echo do_shortcode('[product_categories number="" parent="0"]');
		echo '<h1>View by Market</h1>';
		woocommerce_reset_loop(); // can be removed post WooCommerce 1.6.4
	} // End query to see if products should be displayed
}


function my_child_theme_setup() {
	remove_filter('mystile_homepage_content', 'mystile_product_categories', 10);
	add_action('mystile_homepage_content', 'childtheme_product_categories', 10);
}

add_action( 'after_setup_theme', 'my_child_theme_setup' );

?>