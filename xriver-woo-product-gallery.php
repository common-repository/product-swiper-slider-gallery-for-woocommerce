<?php
/**
 * Plugin Name:       Product Swiper Slider Gallery for WooCommerce
 * Plugin URI:        https://themexriver.com
 * Description:       Transform your online store with our exquisite WooCommerce Product Image Carousel Slider, a visual masterpiece designed to elevate your product showcase! Immerse your customers in a captivating carousel of stunning images, meticulously crafted to enhance the beauty of your WooCommerce products.
 * Version:           1.0.1
 * Author:            themexriver
 * Author URI:        https://themexriver.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       xriver-woo-product-gallery
 * Domain Path:       /languages
 * Tested up to: 6.4
 * WC requires at least: 3.9
 * WC tested up to: 8.3.1
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';
/**
 * Main Class
 */
final class Wooc_Swiper_Gallery
{

    /**
     * Plugin Version
     */
    const version = '1.0.1';

    /**
     * class construct
     */
    private function __construct()
    {
        $this->define_constants();
        register_activation_hook(__FILE__, [$this, 'activate']);
        add_action('plugins_loaded', [$this, 'init_plugin']);
        add_action('admin_enqueue_scripts', [$this, 'admin_scripts']);
    }

    /**
     * initialize a single instance
     *
     * @return \Wooc_Swiper_Gallery
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define Requird Plugin Activation Constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('WOO_PSGS_VERSION', self::version);
        define('WOO_PSGS_FILE', __FILE__);
        define('WOO_PSGS_PATH', __DIR__);
        define('WOO_PSGS_URL', plugins_url('', WOO_PSGS_FILE));
        define('WOO_PSGS_ASSETS', WOO_PSGS_URL . '/assets');
    }


    public function init_plugin()
    {
        /**
         * Css Framework Load
         */
        if (file_exists(plugin_dir_path(__FILE__) . '/inc/codestar-framework/codestar-framework.php')) {
            require_once plugin_dir_path(__FILE__) . '/inc/codestar-framework/codestar-framework.php';
        }
        new Raziul\ProductGallery\Admin\Dashboard();
        new Raziul\ProductGallery\Product_Option();
        new Raziul\ProductGallery\Gallery();

    }

    /**
     * Plugin Activation
     *
     * @return void
     */
    public function activate()
    {
        $installed = get_option('woo_psgs_version');
        if (!$installed) {
            update_option('woo_psgs_version', time());
        }
        update_option('woo_psgs_version', WOO_PSGS_VERSION);
    }

    public function admin_scripts()
    {
        wp_enqueue_style('woopsg-admin-style', WOO_PSGS_ASSETS . '/css/admin.css');
    }


}

/**
 * Initialize the main plugin
 *
 * @return \Wooc_Swiper_Gallery
 */
function wooc_swiper_gallery()
{
    return wooc_swiper_gallery::init();
}

//kick-off the plugin
wooc_swiper_gallery();