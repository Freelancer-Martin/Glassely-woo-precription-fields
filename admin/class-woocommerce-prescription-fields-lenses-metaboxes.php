<?php
/**
 * Calls the class on the post edit screen.
 */
 /**
  * @snippet       Create a New Product Type @ WooCommerce Admin
  * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
  * @source        https://businessbloomer.com/?p=73644
  * @author        Rodolfo Melogli
  * @compatible    Woo 3.3.3
  */
/*
 // --------------------------
 // #1 Add New Product Type to Select Dropdown

 add_filter( 'product_type_selector', 'bbloomer_add_custom_product_type' );

 function bbloomer_add_custom_product_type( $types ){
     $types[ 'custom' ] = 'Custom product';
     return $types;
 }

 // --------------------------
 // #2 Add New Product Type Class

 add_action( 'init', 'bbloomer_create_custom_product_type' );

 function bbloomer_create_custom_product_type(){
     class WC_Product_Custom extends WC_Product {
         public function get_type() {
             return 'custom';
         }
     }
 }

 // --------------------------
 // #3 Load New Product Type Class

 add_filter( 'woocommerce_product_class', 'bbloomer_woocommerce_product_class', 10, 2 );

 function bbloomer_woocommerce_product_class( $classname, $product_type ) {
     if ( $product_type == 'custom' ) {
         $classname = 'WC_Product_Custom';
     }
     return $classname;
 }

 */

function call_someClass() {
    new someClass();
}

if ( is_admin() ) {
    add_action( 'load-post.php',     'call_someClass' );
    add_action( 'load-post-new.php', 'call_someClass' );
}

/**
 * The Class.
 */
class someClass {

    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        register_activation_hook(__FILE__,  array($this, 'activation'));
        register_deactivation_hook(__FILE__,  array($this, 'deactivation'));
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post',      array( $this, 'save'         ) );
        add_action('wp_ajax_prescription_options',  array($this, 'prescription_options'));
        add_action('admin_footer', array($this, 'cool_options_javascript'));
    }

    public function prescription_options() {
        global $wpdb; // this is how you get access to the database

        $cool_options = get_option('this_options');
        echo $cool_options;

        die(); // this is required to return a proper result

    }


    function cool_options_javascript() {
        $pluginDirectory = plugins_url() .'/'. basename(dirname(__FILE__));
        wp_enqueue_script("nbs-wp-ajax", $pluginDirectory . '/woocommerce-prescription-fields-public.js');
    }

    /**
     * Adds the meta box container.
     */
    public function add_meta_box( $post_type ) {
        // Limit meta box to certain post types.
        $post_types = array( 'add_lenses_type' );

        if ( in_array( $post_type, $post_types ) ) {
            add_meta_box(
                'some_meta_box_name',
                __( 'Add Lense Type', 'textdomain' ),
                array( $this, 'render_meta_box_content' ),
                $post_type,
                'advanced',
                'high'
            );
        }
    }

    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save( $post_id ) {

        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) ) {
            return $post_id;
        }

        $nonce = $_POST['myplugin_inner_custom_box_nonce'];

        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) ) {
            return $post_id;
        }

        /*
         * If this is an autosave, our form has not been submitted,
         * so we don't want to do anything.
         */
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        // Check the user's permissions.
        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }

        /* OK, it's safe for us to save the data now. */

         $sanitized_lense_name = sanitize_text_field( $_POST['lense_name'] );
         $sanitized_lense_thickness = sanitize_text_field( $_POST['lense_thickness'] );
         $sanitized_lense_SPD_radius_max = sanitize_text_field( $_POST['lense_SPD_radius_max'] );
         $sanitized_lense_SPD_radius_min = sanitize_text_field( $_POST['lense_SPD_radius_min'] );
         $sanitized_lense_cylynder_radius_min = sanitize_text_field( $_POST['lense_cylynder_radius_min'] );
         $sanitized_lense_cylynder_radius_max = sanitize_text_field( $_POST['lense_cylynder_radius_max'] );
         $sanitized_lense_VAT_price = sanitize_text_field( $_POST['lense_VAT_price'] );
         $sanitized_lense_scratch_resistence = sanitize_text_field( $_POST['lense_scratch_resistence'] );
         $sanitized_lense_anti_reflective = sanitize_text_field( $_POST['lense_anti_reflective'] );
         $sanitized_lense_hydrophobic = sanitize_text_field( $_POST['lense_hydrophobic'] );
         $sanitized_lense_possibe = sanitize_text_field( $_POST['lense_possibe'] );
         $sanitized_lense_type = sanitize_text_field( $_POST['lense_type'] );
         $sanitized_lense_lense_strongness = sanitize_text_field( $_POST['lense_strongness'] );
         $sanitized_lense_lense_thinnerness = sanitize_text_field( $_POST['lense_thinnerness'] );


         update_post_meta( $post_id,"_lense_name", $sanitized_lense_name);
         update_post_meta( $post_id,"_lense_thickness", $sanitized_lense_thickness);
         update_post_meta( $post_id,"_lense_SPD_radius_max", $sanitized_lense_SPD_radius_max);
         update_post_meta( $post_id,"_lense_SPD_radius_min", $sanitized_lense_SPD_radius_min);
         update_post_meta( $post_id,"_lense_cylynder_radius_min", $sanitized_lense_cylynder_radius_min);
         update_post_meta( $post_id,"_lense_cylynder_radius_max", $sanitized_lense_cylynder_radius_max);
         update_post_meta( $post_id,"_lense_VAT_price", $sanitized_lense_VAT_price);
         update_post_meta( $post_id,"_lense_scratch_resistence", $sanitized_lense_scratch_resistence);
         update_post_meta( $post_id,"_lense_anti_reflective", $sanitized_lense_anti_reflective);
         update_post_meta( $post_id,"_lense_hydrophobic", $sanitized_lense_hydrophobic);
         update_post_meta( $post_id,"_lense_possibe", $sanitized_lense_possibe);
         update_post_meta( $post_id,"_lense_type", $sanitized_lense_type);
         update_post_meta( $post_id,"_lense_strongness", $sanitized_lense_lense_strongness);
         update_post_meta( $post_id,"_lense_thinnerness", $sanitized_lense_lense_thinnerness);

    }


    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post ) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );

        $value_lense_name = get_post_meta( $post->ID ,"_lense_name", true );
        $value_lense_thickness = get_post_meta( $post->ID ,"_lense_thickness", true );
        $value_lense_SPD_radius_max = get_post_meta( $post->ID ,"_lense_SPD_radius_max", true );
        $value_lense_SPD_radius_min = get_post_meta( $post->ID ,"_lense_SPD_radius_min", true );
        $value_lense_cylynder_radius_min = get_post_meta( $post->ID ,"_lense_cylynder_radius_min", true );
        $value_lense_cylynder_radius_max = get_post_meta( $post->ID ,"_lense_cylynder_radius_max", true );
        $value_lense_VAT_price = get_post_meta( $post->ID ,"_lense_VAT_price", true );
        $value_lense_scratch_resistence = get_post_meta( $post->ID ,"_lense_scratch_resistence", true );
        $value_lense_anti_reflective = get_post_meta( $post->ID ,"_lense_anti_reflective", true );
        $value_lense_hydrophobic = get_post_meta( $post->ID ,"_lense_hydrophobic", true );
        $value_lense_possibe = get_post_meta( $post->ID ,"_lense_possibe", true );
        $value_lense_type = get_post_meta( $post->ID ,"_lense_type", true );
        $value_lense_strongness = get_post_meta( $post->ID ,"_lense_strongness", true );
        $value_lense_thinnerness = get_post_meta( $post->ID ,"_lense_thinnerness", true );

        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta( $post->ID, '_lense_type_field', true );

        print_r($value);

        // Display the form, using the current value.
        ?>
        <table class="form-table" id="iconic-additional-information">
          <tbody>

            <tr>
              <th>
                <label for="lense_SPD_radius_min"><?php _e( 'Lense SPH Radius (MIN)', 'textdomain' ); ?></label>
              </th>
              <td>
                <input class="postbox field_classes" type="text" id="lense_SPD_radius_min" placeholder="Insert text here" name="lense_SPD_radius_min" value="<?php echo esc_attr( $value_lense_SPD_radius_min ); ?>" size="25" />
              </td>
            </tr>
            <tr>
              <th>
                <label for="lense_SPD_radius_max"><?php _e( 'Lense SPH Radius (MAX)', 'textdomain' ); ?></label>
              </th>
              <td>
                <input class="postbox field_classes" type="text" id="lense_SPD_radius_max" placeholder="Insert text here" name="lense_SPD_radius_max" value="<?php echo esc_attr( $value_lense_SPD_radius_max ); ?>" size="25" />
              </td>
            </tr>
            <tr>
      				<th>
                <label for="lense_cylynder_radius_min"><?php _e( 'Lense Cylynder Radius (MIN)', 'textdomain' ); ?></label>
              </th>
            <td>
              <input class="postbox field_classes" type="text" id="lense_cylynder_radius_min" placeholder="Insert text here" name="lense_cylynder_radius_min" value="<?php echo esc_attr( $value_lense_cylynder_radius_min ); ?>" size="25" />
              </td>
            </tr>
            <tr>
      				<th>
                <label for="lense_cylynder_radius_max"><?php _e( 'Lense Cylynder Radius (MAX)', 'textdomain' ); ?></label>
              </th>
            <td>
              <input class="postbox field_classes" type="text" id="lense_cylynder_radius_max" placeholder="Insert text here" name="lense_cylynder_radius_max" value="<?php echo esc_attr( $value_lense_cylynder_radius_max ); ?>" size="25" />
              </td>
            </tr>

            <tr>
      				<th>
                <label for="lense_type"><?php _e( 'Lense Type', 'textdomain' ); ?></label>
              </th>
              <td>
                <select class="postbox field_classes" type="text" id="lense_type" placeholder="Insert text here" name="lense_type"  >
                    <?php
                        $option_values = array( 'Digital', 'Standard');

                        foreach($option_values as $key => $value)
                        {
                            if( $value == $value_lense_type )
                            {
                                ?>
                                    <option selected><?php echo $value; ?></option>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <option><?php echo $value; ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
      				<th>
                <label for="lense_name"><?php _e( 'Lense Name', 'textdomain' ); ?></label>
              </th>
              <td>
                <input class="postbox field_classes" type="text" id="lense_name" placeholder="Insert text here" name="lense_name" value="<?php echo esc_attr( $value_lense_name ); ?>" size="25" />
              </td>
            </tr>
            <tr>
      				<th>
                <label for="lense_thickness"><?php _e( 'Lense Thickness', 'textdomain' ); ?></label>
              </th>
              <td>
                <select class="postbox field_classes" type="text" id="lense_thickness" placeholder="Insert text here" name="lense_thickness"  >
                    <?php
                        $option_values = array( '1,5', '1,6', '1,67', '1,74');

                        foreach($option_values as $key => $value)
                        {
                            if( $value == $value_lense_thickness )
                            {
                                ?>
                                    <option selected><?php echo $value; ?></option>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <option><?php echo $value; ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
                  </td>
            </tr>

            <tr>
              <th>
                <label for="lense_VAT_price"><?php _e( 'Lense VAT Price', 'textdomain' ); ?></label>
              </th>
              <td>
                <input class="postbox field_classes" type="text" id="lense_VAT_price" placeholder="Insert text here" name="lense_VAT_price" value="<?php echo esc_attr( $value_lense_VAT_price ); ?>" size="25" />
              </td>
              </tr>
            <tr>
              <th>
                <label for="lense_scratch_resistence"><?php _e( 'Lense Scratch Resistence', 'textdomain' ); ?></label>
              </th>
              <td>
                <select class="postbox field_classes" type="text" id="lense_scratch_resistence" placeholder="Insert text here" name="lense_scratch_resistence" >
                    <?php
                        $option_values = array( '1', '2', '3', '4', '5');

                        foreach($option_values as $key => $value)
                        {
                            if( $value == $value_lense_scratch_resistence )
                            {
                                ?>
                                    <option selected><?php echo $value; ?></option>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <option><?php echo $value; ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
              </td>
            </tr>
              <tr>
            <th>
                <label for="lense_anti_reflective"><?php _e( 'Lense Anti Reflective', 'textdomain' ); ?></label>
              </th>
              <td>
                <select class="postbox field_classes" type="text" id="lense_anti_reflective" placeholder="Insert text here" name="lense_anti_reflective" >
                    <?php
                        $option_values = array( 'Yes', 'No');

                        foreach($option_values as $key => $value)
                        {
                            if( $value == $value_lense_anti_reflective )
                            {
                                ?>
                                    <option selected><?php echo $value; ?></option>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <option><?php echo $value; ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>  </td>
            </tr>
            <tr>
              <th>
                <label for="lense_hydrophobic"><?php _e( 'Lense Hydrophobic', 'textdomain' ); ?></label>
              </th>
              <td>
                <select class="postbox field_classes" type="text" id="lense_hydrophobic" placeholder="Insert text here" name="lense_hydrophobic">
                    <?php
                        $option_values = array( 'Yes', 'No');

                        foreach($option_values as $key => $value)
                        {
                            if( $value == $value_lense_hydrophobic )
                            {
                                ?>
                                    <option selected><?php echo $value; ?></option>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <option><?php echo $value; ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
                    </td>
            </tr>
              <tr>
                <th>
                  <label for="lense_possibe"><?php _e( 'Lense Price', 'textdomain' ); ?></label>
                </th>
              <td>
                <input class="postbox field_classes" type="text" id="lense_possibe" placeholder="Insert text here" name="lense_possibe" value="<?php echo esc_attr( $value_lense_possibe ); ?>" size="25" />
              </td>
            </tr>
            <tr>
              <th>
                <label for="lense_strongness"><?php _e( 'Lense Strogness', 'textdomain' ); ?></label>
              </th>
            <td>
              <input class="postbox field_classes" type="text" id="lense_strongness" placeholder="Insert text here" name="lense_strongness" value="<?php echo esc_attr( $value_lense_strongness ); ?>" size="25" />
            </td>
          </tr>
          <tr>
            <th>
              <label for="lense_thinnerness"><?php _e( 'Lense Thinnerness', 'textdomain' ); ?></label>
            </th>
          <td>
            <input class="postbox field_classes" type="text" id="lense_thinnerness" placeholder="Insert text here" name="lense_thinnerness" value="<?php echo esc_attr( $value_lense_thinnerness ); ?>" size="25" />
          </td>
        </tr>
          </table >
        </tbody>

        <?php
    }
}
