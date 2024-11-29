<?php
/*
add_action('woocommerce_after_add_to_cart_button','cmk_additional_button');
function cmk_additional_button() {
	echo '<a href="" type="submit" class="single_add_to_cart_button button alt add-lenses-button"><h6 class="add-lenses-button-text" >ADD LENSES</h6></a>';
}
//href="'.esc_url(get_site_url() . '/add-lenses' ).'"
*/

function add_content_after_addtocart() {

    // get the current post/product ID
    $current_product_id = get_the_ID();

    // get the product based on the ID
    $product = wc_get_product( $current_product_id );

    // get the "Checkout Page" URL
    //$checkout_url = WC()->cart->get_checkout_url();

		//if ( WC()->cart->get_cart_contents_count() == 0 ) {

		// if no products in cart, add it
		//$checkout_url = WC()->cart->add_to_cart( $product_id );

	//	}
    // run only on simple products
    //if( $product->is_type( 'simple' ) ){
    echo '<a id="add-lenses-button save-this-options" type="submit" href="'.get_site_url() . '/lenses/?add-to-cart='.$current_product_id.'" class="save-this-options single_add_to_cart_button button alt ">Add Lenses</a>';
  //  }
}
add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart' );



// Change 'add to cart' text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'add_to_cart_text' );
function add_to_cart_text() {
        return __( 'Add Frame', 'your-slug' );

}
/*
add_action( 'wp_ajax_add_foobar', 'prefix_ajax_add_foobar' );
add_action( 'wp_ajax_nopriv_add_foobar', 'prefix_ajax_add_foobar' );

function prefix_ajax_add_foobar() {
   $product_id  = intval( $_POST['product_id'] );
// add code the add the product to your cart
die();
}

function hide_extra_button() { ?>
    <script>
					jQuery( document ).on( 'click', '#add-lenses-button', function() {

				var post_id = jQuery(this).data('product_id');//store product id in post id variable
				var qty = jQuery(this).data('quantity');//store quantity in qty variable

				jQuery.ajax({
				    url : ajax_url, //ajax object of localization
				    type : 'post', //post method to access data
				    data :
				    {
				        action : 'prefix_ajax_add_foobar', //action on prefix_ajax_add_foobar function
				        post_id : post_id,
				        quantity: qty
				    },

				    success : function(response){

				            jQuery('.site-header .quantity').html(response.qty);//get quantity
				            jQuery('.site-header .total').html(response.total);//get total

				            //loaderContainer.remove();
				            alert("Product Added successfully..");
				    }

				});

				return false;
				});
    </script>
<?php
}
add_action( 'wp_footer', 'hide_extra_button' );
