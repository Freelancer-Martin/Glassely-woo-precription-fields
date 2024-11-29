<?php
/**
 * Plugin Name: 	WooCommerce Custom Product Fields
 * Plugin URI:		http://jeroensormani.com
 * Description:		A simple demo plugin on how to add a custom product fields.
 */
/**
 * Add a custom product tab.
 */
function custom_product_tabs( $original_tabs ) {
	$new_tab['giftcard'] = array(
		'label'		=> __( 'PD Extra Field', 'woocommerce' ),
		'target'	=> 'giftcard_options',
		'class'		=> array( 'show_if_gift_card' ),
// 		'priority'	=> 55, // Not yet
	);
	// Code to reposition
	$insert_at_position = 2; // This can be changed
	$tabs = array_slice( $original_tabs, 0, $insert_at_position, true ); // First part of original tabs
	$tabs = array_merge( $tabs, $new_tab ); // Add new
	$tabs = array_merge( $tabs, array_slice( $original_tabs, $insert_at_position, null, true ) ); // Glue the second part of original

	return $tabs;
}
add_filter( 'woocommerce_product_data_tabs', 'custom_product_tabs' );
/**
 * Contents of the gift card options product tab.
 */
function giftcard_options_product_tab_content() {
	global $post;
	// Note the 'id' attribute needs to match the 'target' parameter set above
	?><div id='giftcard_options' class='panel woocommerce_options_panel'><?php
		?><div class='options_group'><?php
    /*
			woocommerce_wp_checkbox( array(
				'id' 			=> '_allow_personal_message',
				'label' 		=> __( 'Allow personal message', 'woocommerce' ),
				'desc_tip' 		=> true,
				'description'	=> __( 'Allow the custom to add a personalised message on the product page.', 'woocommerce' ),
			) );
    */
/*
			woocommerce_wp_text_input( array(
				'id'				=> '_valid_singe_pd_ranfe_from',
				'label'				=> __( 'Single PD Range (FROM)', 'woocommerce' ),
				'desc_tip'			=> 'true',
				'description'		=> __( 'Enter single PD Range from.', 'woocommerce' ),
				'type' 				=> 'number',
        'size' => '25',
				'custom_attributes'	=> array(
					'min'	=> '1',
					'step'	=> '1',
				),
			) );
      woocommerce_wp_text_input( array(
        'id'				=> '_valid_singe_pd_ranfe_to',
        'label'				=> __( 'Single PD Range (TO)', 'woocommerce' ),
        'desc_tip'			=> 'true',
        'description'		=> __( 'Enter single PD Range to.', 'woocommerce' ),
        'type' 				=> 'number',
        'size' => '25',
        'custom_attributes'	=> array(
          'min'	=> '1',
          'step'	=> '1',
        ),
      ) );
*/
/*
			woocommerce_wp_text_input( array(
				'id'				=> '_sph_min',
				'label'				=> __( 'SPH (MIN)', 'woocommerce' ),
				'desc_tip'			=> 'true',
				'description'		=> __( 'Enter SPH mn value.', 'woocommerce' ),
				'type' 				=> 'number',
				'size' => '25',
				'custom_attributes'	=> array(
					'min'	=> '1',
					'step'	=> '1',
				),
			) );
			woocommerce_wp_text_input( array(
				'id'				=> '_sph_max',
				'label'				=> __( 'SPH (MAX)', 'woocommerce' ),
				'desc_tip'			=> 'true',
				'description'		=> __( 'Enter SPH max value.', 'woocommerce' ),
				'type' 				=> 'number',
				'size' => '25',
				'custom_attributes'	=> array(
					'min'	=> '1',
					'step'	=> '1',
				),
			) );
*/			
      woocommerce_wp_text_input( array(
        'id'				=> '_valid_dual_pd_range_left_from',
        'label'				=> __( 'Dual PD Range Left (FROM)', 'woocommerce' ),
        'desc_tip'			=> 'true',
        'description'		=> __( 'Dual PD Range Left (FROM)', 'woocommerce' ),
        'type' 				=> 'number',
        'size' => '25',
        'custom_attributes'	=> array(
          'min'	=> '1',
          'step'	=> '1',
        ),
      ) );
      woocommerce_wp_text_input( array(
        'id'				=> '_valid_dual_pd_range_left_to',
        'label'				=> __( 'Dual PD Range Left (TO)', 'woocommerce' ),
        'desc_tip'			=> 'true',
        'description'		=> __( 'Enter the number of Dual PD Range Left (TO).', 'woocommerce' ),
        'type' 				=> 'number',
        'size' => '25',
        'custom_attributes'	=> array(
          'min'	=> '1',
          'step'	=> '1',
        ),
      ) );
      woocommerce_wp_text_input( array(
        'id'				=> '_valid_dual_pd_range_right_from',
        'label'				=> __( 'Dual PD Range Right (FROM)', 'woocommerce' ),
        'desc_tip'			=> 'true',
        'description'		=> __( 'Dual PD Range Right (FROM)', 'woocommerce' ),
        'type' 				=> 'number',
        'size' => '25',
        'custom_attributes'	=> array(
          'min'	=> '1',
          'step'	=> '1',
        ),
      ) );
      woocommerce_wp_text_input( array(
        'id'				=> '_valid_dual_pd_range_right_to',
        'label'				=> __( 'Dual PD Range Right (TO)', 'woocommerce' ),
        'desc_tip'			=> 'true',
        'description'		=> __( 'Enter the number of Dual PD Range Right (TO).', 'woocommerce' ),
        'type' 				=> 'number',
        'size' => '25',
        'custom_attributes'	=> array(
          'min'	=> '1',
          'step'	=> '1',
        ),
      ) );


			$redeemable_stores = (array) get_post_meta( $post->ID, '_redeem_in_stores', true );
			?>
      <p><?php
      $args = array(
	        'posts_per_page' => 30,
	        'paged' => $paged,
	        'post_type' => 'add_lenses_type',
					'fields' => 'ids'
	    );

      $custom_posts = get_posts($args);
			print_r($custom_posts);

        ?><p>
          <p class='form-field _redeem_in_stores'>
    				<label for='_redeem_in_stores'><?php _e( 'Include Lenses Types', 'woocommerce' ); ?></label>
    				<select name='_redeem_in_stores[]' class='wc-enhanced-select' multiple='multiple' style='width: 80%;'>
            <?php  foreach ($custom_posts as $value) {
                $title  = get_the_title( $value );
                //print_r( get_the_title( $value ) );
              //  print_r( get_post_meta( $value ) ); ?>
    					  <option <?php selected( in_array( $title , $redeemable_stores, $value ) ); ?> value="<?php print $value ?>">"<?php print $title ?>"</option>

            <?php } ?>
    				</select>
    				<img class='help_tip' data-tip="<?php _e( 'Select the stores where this gift card is redeemable.', 'woocommerce' ); ?>" src='<?php echo esc_url( WC()->plugin_url() ); ?>/assets/images/help.png' height='16' width='16'>
    			</p>

    		</div>

    	</div><?php

}
add_action( 'woocommerce_product_data_panels', 'giftcard_options_product_tab_content' );
/**
 * Save the custom fields.
 */
function save_giftcard_option_fields( $post_id ) {
	$allow_personal_message = isset( $_POST['_allow_personal_message'] ) ? 'yes' : 'no';
	update_post_meta( $post_id, '_allow_personal_message', $allow_personal_message );
  if ( isset( $_POST['_sph_min'] ) ) :
		update_post_meta( $post_id, '_sph_min', absint( $_POST['_sph_min'] ) );
	endif;

  if ( isset( $_POST['_sph_max'] ) ) :
		update_post_meta( $post_id, '_sph_max', absint( $_POST['_sph_max'] ) );
	endif;

  if ( isset( $_POST['_valid_dual_pd_range_left_from'] ) ) :
		update_post_meta( $post_id, '_valid_dual_pd_range_left_from', absint( $_POST['_valid_dual_pd_range_left_from'] ) );
	endif;

  if ( isset( $_POST['_valid_dual_pd_range_left_to'] ) ) :
		update_post_meta( $post_id, '_valid_dual_pd_range_left_to', absint( $_POST['_valid_dual_pd_range_left_to'] ) );
	endif;

  if ( isset( $_POST['_valid_dual_pd_range_right_from'] ) ) :
		update_post_meta( $post_id, '_valid_dual_pd_range_right_from', absint( $_POST['_valid_dual_pd_range_right_from'] ) );
	endif;

  if ( isset( $_POST['_valid_dual_pd_range_right_to'] ) ) :
		update_post_meta( $post_id, '_valid_dual_pd_range_right_to', absint( $_POST['_valid_dual_pd_range_right_to'] ) );
	endif;

  update_post_meta( $post_id, '_redeem_in_stores', (array) $_POST['_redeem_in_stores'] );
	$is_gift_card = isset( $_POST['_gift_card'] ) ? 'yes' : 'no';
	update_post_meta( $post_id, '_gift_card', $is_gift_card );
}
add_action( 'woocommerce_process_product_meta_simple', 'save_giftcard_option_fields'  );
add_action( 'woocommerce_process_product_meta_variable', 'save_giftcard_option_fields'  );
/**
 * Add a bit of style
 */
function wcpp_custom_style() {
	?><style>
		#woocommerce-product-data ul.wc-tabs li.giftcard_options a:before { font-family: WooCommerce; content: '\e600'; }
	</style>

	<script>
		jQuery( document ).ready( function( $ ) {
			$( 'input#_gift_card' ).change( function() {
				var is_gift_card = $( 'input#_gift_card:checked' ).size();
console.log( is_gift_card );
				$( '.show_if_gift_card' ).hide();
				$( '.hide_if_gift_card' ).hide();
				if ( is_gift_card ) {
					$( '.hide_if_gift_card' ).hide();
				}
				if ( is_gift_card ) {
					$( '.show_if_gift_card' ).show();
				}
			});
			$( 'input#_gift_card' ).trigger( 'change' );
		});
	</script><?php
}
add_action( 'admin_head', 'wcpp_custom_style' );
/**
 * Add 'Gift Card' product option
 */
function add_gift_card_product_option( $product_type_options ) {
	$product_type_options['gift_card'] = array(
		'id'            => '_gift_card',
		'wrapper_class' => 'show_if_simple show_if_variable',
		'label'         => __( 'Show Pd Extra Field', 'woocommerce' ),
		'description'   => __( 'Insert lense max and min values for lenses.', 'woocommerce' ),
		'default'       => 'no'
	);
	return $product_type_options;
}
add_filter( 'product_type_options', 'add_gift_card_product_option' );
