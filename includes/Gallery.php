<?php
//namespace
namespace Raziul\ProductGallery;

class Gallery
{

    //Option Panel
    public $woospg_options;

    public function __construct()
    {
        $this->woospg_options = get_option('woopsg_opt');
        $this->customiz_hook();
        add_action('after_setup_theme', [$this, 'remove_woo_gallery_default_value'], 90);
        add_action('wp_enqueue_scripts', [$this, 'frontend_scripts'], 90);
        add_shortcode('woopgfs_shortcode', [$this, 'woopgfs_shortcode_render']);
    }


    /**
     * Remove Woocommerce Default Gallery
     *
     * @return void
     */
    public function remove_woo_gallery_default_value()
    {
        remove_theme_support('wc-product-gallery-slider');
        remove_theme_support('wc-product-gallery-zoom');
        remove_theme_support('wc-product-gallery-lightbox');
    }

    /**
     * Woocommerce Hook Customization
     *
     * @return void
     */
    public function customiz_hook()
    {
        remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
        remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);
        add_action('woocommerce_before_single_product_summary', [$this, 'woopsg_swiper_gallery'], 20);
    }

    public function woopsg_swiper_gallery()
    {
        require_once WOO_PSGS_PATH . '/inc/woopsg-product-gallery.php';
    }

    /**
     * Load Front-end Scripts
     *
     * @return void
     */
    public function frontend_scripts()
    {

        //Load Plugin Css
        wp_enqueue_style('woo-swiper', WOO_PSGS_ASSETS . '/css/swiper.min.css');
        wp_enqueue_style('woo-magnific-popup', WOO_PSGS_ASSETS . '/css/magnific-popup.css');
        wp_enqueue_style('woopsg', WOO_PSGS_ASSETS . '/css/woopsg.css');

        //Load Plugin JS
        wp_enqueue_script('woo-swiper', WOO_PSGS_ASSETS . '/js/swiper-bundle.min.js', array('jquery'), WOO_PSGS_VERSION, true);
        wp_enqueue_script('woo-zoomit', WOO_PSGS_ASSETS . '/js/jquery.zoomit.min.js', array('jquery'), WOO_PSGS_VERSION, true);
        wp_enqueue_script('woo-magnific-popup', WOO_PSGS_ASSETS . '/js/jquery.magnific-popup.min.js', array('jquery'), WOO_PSGS_VERSION, true);
        wp_enqueue_script('woo-custom', WOO_PSGS_ASSETS . '/js/woopsg.js', array('jquery', 'woo-swiper', 'woo-magnific-popup', 'woo-zoomit'), WOO_PSGS_VERSION, true);

        $sloop = ('1' == $this->woospg_options['woopsg_slider_loop']) ? 'true' : 'false';
        $sautoplay = $this->woospg_options['woopsg_autoplay'];
        $mousewheel = ('1' == $this->woospg_options['mousewheel']) ? 'true' : 'false';
        $sthumbnail = $this->woospg_options['st_disable_thumbnail'];
        $spaceBetween = !empty($this->woospg_options['st_spaceBetween']) ? $this->woospg_options['st_spaceBetween'] : 15;

        $desktop_count = $this->woospg_options['desktop_count'];
        $laptop_count = $this->woospg_options['laptop_count'];
        $tablet_count = $this->woospg_options['tablet_count'];
        $mobile_count = $this->woospg_options['mobile_count'];

        $woopsg_sliderActive = "
            jQuery(document).ready(function(){ ";
        $woopsg_sliderActive .= "
                var quick_view = new Swiper('.product-details-slider-nav', {
					loop: {$sloop},
					spaceBetween: {$spaceBetween},
					slidesPerView: {$desktop_count},
					breakpoints: {	
						'1200': {
							slidesPerView: {$laptop_count},
						},
						'1024': {
							slidesPerView: {$tablet_count},
						},
						'991': {
							slidesPerView: {$tablet_count},
						},
						'768': {
							slidesPerView: {$tablet_count},
						},
						'577': {
							slidesPerView: {$mobile_count},
						},
						'0': {
							slidesPerView: {$mobile_count},
						},
					},
				});";
        $woopsg_sliderActive .= "
				var swiper2 = new Swiper('.product-details-slider-for', {
					loop: {$sloop},
					spaceBetween: 0,
					speed: 1000,
					slidesPerView: 1,
                    navigation: {
                        prevEl: '.views-button-prev',
                        nextEl: '.views-button-next',
                    },
                    ";

        $woopsg_sliderActive .= "
                        thumbs: {
                            swiper: quick_view,
                        },";

        $woopsg_sliderActive .= "
                    mousewheel: {$mousewheel},";
        if ($sautoplay == 1):
            $woopsg_sliderActive .= "
                        autoplay: {
                            delay: 2500,
                            disableOnInteraction: false,
                        },";
        endif;
        $woopsg_sliderActive .= "
				});
            });
        ";

        wp_add_inline_script('woo-custom', $woopsg_sliderActive);
    }

    /**
     * Render Gallery Shortcode
     *
     * @return void
     */
    function woopgfs_shortcode_render()
    {
        ob_start();
        if (is_product()) {
            wc_get_template('single-product/product-image.php');
        }

        $output = ob_get_clean();
        return $output;
    }

}