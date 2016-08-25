<?php
/*function shipping_switch( $rates, $package  ) {

  global $woocommerce;
  global $wp_query;

  $cart_contents_group = $woocommerce->cart->cart_contents;
  $cart_total_w_tax=0;

  foreach($cart_contents_group as $cart_contents):

      $cart_total_w_tax += $cart_contents['line_total'] + $cart_contents['line_tax'];

  endforeach;


  if($cart_total_w_tax <= 89.99 ):

    unset($rates['90_to_600']);
    unset($rates['above_600']);

  elseif($cart_total_w_tax > 89.99 && $cart_total_w_tax <= 599.99):

    unset($rates['less_than_90']);
    unset($rates['above_600']);

  elseif($cart_total_w_tax > 599.99):

    unset($rates['less_than_90']);
    unset($rates['90_to_600']);

endif;


  $current_order_id = $wp_query->query['order-pay'];
  $order_object = get_post($current_order_id);
  $order_status = $order_object->post_status;

  $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
  $current_shipping_cost = WC()->session->get( 'shipping_total' );

  if ($chosen_methods[0] == 'international_delivery' && $order_status != 'wc-pending') :
    //only invoice
    $available_gateways = array('invoice' => $available_gateways['invoice']);

  else:

    unset($available_gateways['invoice']);

  endif;

  return $rates;
}

add_filter( 'woocommerce_package_rates', 'shipping_switch', 10, 2 ); */


// alter the subscriptions error
function my_woocommerce_add_error( $error ) {
    print_r($error);
    if( false !== strpos($error, 'Please enter an alternative shipping address.')) {
        $error = '<strong style="font-size:18px;">You have ordered a item that is outside of our European postage range. Can you please call our office on <a href="tel:01308426982">01308 426 982</a> or email <a href="mailto:sales@acask.com">sales@acask.com</a> for further details on shipping your item.</strong>';
    }
    return $error;
}
add_filter( 'woocommerce_add_error', 'my_woocommerce_add_error', 10, 2 );


add_filter( 'gettext', 'custom_paypal_button_text', 20, 3 );
function custom_paypal_button_text( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Proceed to PayPal' :
			$translated_text = __( 'Proceed to Payment', 'woocommerce' );
			break;
	}
	return $translated_text;
}
