<?php
function shipping_switch( $rates, $package  ) {

  global $woocommerce;
  global $wp_query;

  $cart_contents = reset($woocommerce->cart->cart_contents);

  $cart_total_w_tax = $cart_contents['line_total'] + $cart_contents['line_tax'];

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


  /*$current_order_id = $wp_query->query['order-pay'];
  $order_object = get_post($current_order_id);
  $order_status = $order_object->post_status;
  
  $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
  $current_shipping_cost = WC()->session->get( 'shipping_total' );

  if ($chosen_methods[0] == 'international_delivery' && $order_status != 'wc-pending') : 
    //only invoice
    $available_gateways = array('invoice' => $available_gateways['invoice']);
  
  else:

    unset($available_gateways['invoice']);

  endif;*/

  return $rates;
}

add_filter( 'woocommerce_package_rates', 'shipping_switch', 10, 2 ); 
?>