<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       developerforwebsites@gmail.com
 * @since      1.0.0
 *
 * @package    Woocommerce_Prescription_Fields
 * @subpackage Woocommerce_Prescription_Fields/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Woocommerce_Prescription_Fields
 * @subpackage Woocommerce_Prescription_Fields/includes
 * @author     Freelancer Martin <developerforwebsites@mail.com>
 */
class Woocommerce_Prescription_Fields_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'woocommerce-prescription-fields',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
