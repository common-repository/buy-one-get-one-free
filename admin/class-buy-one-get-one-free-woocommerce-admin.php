<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       piwebsolution.com
 * @since      1.0.0
 *
 * @package    Buy_One_Get_One_Free_Woocommerce
 * @subpackage Buy_One_Get_One_Free_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Buy_One_Get_One_Free_Woocommerce
 * @subpackage Buy_One_Get_One_Free_Woocommerce/admin
 * @author     PI Websolution <sales@piwebsolution.com>
 */
class Buy_One_Get_One_Free_Woocommerce_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		new Buy_One_Get_One_Free_Woocommerce_Menu($this->plugin_name, $this->version);

		add_action('admin_init', array($this,'plugin_redirect'));
	}

	function plugin_redirect(){
		if (get_option('pisol_bogo_redirect', false)) {
			delete_option('pisol_bogo_redirect');
			if(!isset($_GET['activate-multi']))
			{
				wp_redirect("admin.php?page=pisol-bogo-deal");
			}
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/buy-one-get-one-free-woocommerce-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		

		

	}

}
