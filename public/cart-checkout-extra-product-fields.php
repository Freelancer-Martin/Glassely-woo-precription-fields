<?php
add_action( 'woocommerce_cart_contents' , 'custom_cart_contents' );
function custom_cart_contents() {

  //if( ! empty ( $lenses_type_settings ) or ! empty ( $these_second_options ) ) {
    $lenses_type_settings = get_option('lenses_type_settings');
    $lenses_type_settings_field = json_decode( $lenses_type_settings, TRUE );
    print_r( $lenses_type_settings_field );
    $these_second_options = get_option( 'these_second_options' );
    $these_second_options_field = json_decode($these_second_options, TRUE);
    print_r( $these_second_options_field );
  ?>
  <tbody id="delete-object">
      <tr class="woocommerce-cart-form__cart-item cart_item">
         <td class="product-thumbnail">

         <td class="product-name" data-title="Product">
           <a ><?php echo $lenses_type_settings_field['lenses-final-name'] ?></a>
        </td>

         <td class="product-price" data-title="Price">
         <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span><?php echo $lenses_type_settings_field['lense_price'] ?></span>					</td>

         <td class="product-quantity" data-title="Quantity">
           <!--
             <div class="quantity amely_qty"><span class="minus">-</span>
               <label class="screen-reader-text" for="quantity_5bd5de5516c1d">Quantity</label>
               <input id="quantity_5bd5de5516c1d" class="input-text qty text" step="1" min="0" max="" name="cart[c20ad4d76fe97759aa27a0c99bff6710][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="Test Marius Morel quantity" type="number">
               <span class="plus">+</span>
            </div>
          -->
         </td>

         <td class="product-subtotal" data-title="Total">
           <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">£</span><?php echo $lenses_type_settings_field['lense_price'] ?></span>					</td>

         <td class="product-remove">
         <a href="" class="remove" title="Remove this item" data-product_id="12" data-cart_item_key="c20ad4d76fe97759aa27a0c99bff6710" data-product_sku="1234567-1-1-1-1-1">×</a>					</td>
      </tr>
    </tbody>
         <?php
    //} //end of statement
  } // end of function

add_action( 'woocommerce_review_order_before_payment', 'bbloomer_checkout_radio_choice' );

function bbloomer_checkout_radio_choice() {

    $cool_options = get_option('lenses_type_settings');
    $data_array = json_decode($cool_options, TRUE);
    //print_r( $data_array );
    $chosen = WC()->session->get('radio_chosen');
    $chosen = empty( $chosen ) ? WC()->checkout->get_value('radio_choice') : $chosen;
    $chosen = empty( $chosen ) ? 'no_option' : $chosen;

    $args = array(
    'type' => 'text',
    'class' => array( 'form-row-wide' ),
    'options' => array(
        'no_option' => 'No Option',
        'option_1' => ' ( '.$data_array[ 'lense_price' ].' )',
        'option_2' => 'Option 2 ($30)',
    ),
    'default' => $chosen
    );

    echo '<div id="checkout-radio">';
  //  echo '<h3>Customize Your Order!</h3>';
  //  woocommerce_form_field( 'radio_choice', $args, $chosen );
    echo '</div>';

}

// Part 2
// Add Fee and Calculate Total
// Based on session's "

add_action( 'woocommerce_cart_calculate_fees', 'bbloomer_checkout_radio_choice_fee', 20, 1 );

function bbloomer_checkout_radio_choice_fee( $cart ) {

  if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;

  $radio = WC()->session->get( 'radio_chosen' );
  $cool_options = get_option('lenses_type_settings');
  $data_array = json_decode($cool_options, TRUE);


    $fee = $data_array[ 'lense_price' ];


  $cart->add_fee( __('Lenses Fee', 'woocommerce'), $fee );

}

// Part 3
// Refresh Checkout if Radio Changes
// Uses jQuery

add_action( 'wp_footer', 'bbloomer_checkout_radio_choice_refresh' );

function bbloomer_checkout_radio_choice_refresh() {
if ( ! is_checkout() ) return;
    ?>
    <script type="text/javascript">
    jQuery( function($){
        $('form.checkout').on('change', 'input[name=radio_choice]', function(e){
            e.preventDefault();
            var p = $(this).val();
            $.ajax({
                type: 'POST',
                url: wc_checkout_params.ajax_url,
                data: {
                    'action': 'woo_get_ajax_data',
                    'radio': p,
                },
                success: function (result) {
                    $('body').trigger('update_checkout');
                }
            });
        });
    });
    </script>
    <?php
}

// Part 4
// Add Radio Choice to Session
// Uses Ajax

add_action( 'wp_ajax_woo_get_ajax_data', 'bbloomer_checkout_radio_choice_set_session' );
add_action( 'wp_ajax_nopriv_woo_get_ajax_data', 'bbloomer_checkout_radio_choice_set_session' );

function bbloomer_checkout_radio_choice_set_session() {
    if ( isset($_POST['radio']) ){
        $radio = sanitize_key( $_POST['radio'] );
        WC()->session->set('radio_chosen', $radio );
        echo json_encode( $radio );
    }
    die();
}
