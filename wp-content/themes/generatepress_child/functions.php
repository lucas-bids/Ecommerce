<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

 // Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );

  /**
 * @snippet       Add Custom Field @ WooCommerce Checkout Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 6
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_action( 'woocommerce_before_order_notes', 'bbloomer_add_custom_checkout_field' );
  
function bbloomer_add_custom_checkout_field( $checkout ) { 
   $current_user = wp_get_current_user();
   $saved_license_no = $current_user->license_no;
   woocommerce_form_field( 'license_no', array(        
      'type' => 'text',        
      'class' => array( 'form-row-wide' ),        
      'label' => 'License Number',        
      'placeholder' => 'CA12345678',        
      'required' => true,        
      'default' => $saved_license_no,        
   ), $checkout->get_value( 'license_no' ) ); 
}

/**
 * @snippet       Validate Custom Field @ WooCommerce Checkout Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 6
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
 add_action( 'woocommerce_checkout_process', 'bbloomer_validate_new_checkout_field' );
  
 function bbloomer_validate_new_checkout_field() {    
    if ( ! $_POST['license_no'] ) {
       wc_add_notice( 'Please enter your Licence Number', 'error' );
    }
 }

 /**
 * @snippet       Save & Display Custom Field @ WooCommerce Order
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 6
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'woocommerce_checkout_update_order_meta', 'bbloomer_save_new_checkout_field' );
  
function bbloomer_save_new_checkout_field( $order_id ) { 
    if ( $_POST['license_no'] ) update_post_meta( $order_id, '_license_no', esc_attr( $_POST['license_no'] ) );
}
 
add_action( 'woocommerce_thankyou', 'bbloomer_show_new_checkout_field_thankyou' );
   
function bbloomer_show_new_checkout_field_thankyou( $order_id ) {    
   if ( get_post_meta( $order_id, '_license_no', true ) ) echo '<p><strong>License Number:</strong> ' . get_post_meta( $order_id, '_license_no', true ) . '</p>';
}
  
add_action( 'woocommerce_admin_order_data_after_billing_address', 'bbloomer_show_new_checkout_field_order' );
   
function bbloomer_show_new_checkout_field_order( $order ) {    
   $order_id = $order->get_id();
   if ( get_post_meta( $order_id, '_license_no', true ) ) echo '<p><strong>License Number:</strong> ' . get_post_meta( $order_id, '_license_no', true ) . '</p>';
}
 
add_action( 'woocommerce_email_after_order_table', 'bbloomer_show_new_checkout_field_emails', 20, 4 );
  
function bbloomer_show_new_checkout_field_emails( $order, $sent_to_admin, $plain_text, $email ) {
    if ( get_post_meta( $order->get_id(), '_license_no', true ) ) echo '<p><strong>License Number:</strong> ' . get_post_meta( $order->get_id(), '_license_no', true ) . '</p>';
}