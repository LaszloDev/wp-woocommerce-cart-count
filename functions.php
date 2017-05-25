<?php
// Author: Laszlo Schürg
// Based on:
// https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148 and
// https://docs.woocommerce.com/document/show-cart-contents-total/


function custom_woo_cart_count ($atts) {
  $output = '<a class="cart-customlocation">(' . WC()->cart->get_cart_contents_count() . ')</a>';

  return $output;
}
add_shortcode( 'woo-cart-amount', 'custom_woo_cart_count' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

  ?>
    <a class="cart-customlocation">(<?php echo $woocommerce->cart->cart_contents_count ?>)</a>
  <?php

  $fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
