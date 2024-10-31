<?php
//namespace
namespace Raziul\ProductGallery;

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

class Product_Option
{
    public function __construct()
    {
        $this->themeOption();
    }
    public function themeOption()
    {
        //
        // Set a unique slug-like ID
        $prefix = 'woopsg_opt';

        //
        // Create options
        \CSF::createOptions(
            $prefix,
            array(
                'menu_title' => 'Gallery Settings',
                'menu_slug' => 'woopsg-theme-option',
                'menu_type' => 'submenu',
                'menu_parent' => 'xriver-woo-product-gallery',
                'enqueue_webfont' => true,
                'show_in_customizer' => true,
                'theme' => '',
                'nav' => 'inline',
                'class' => 'woopsg-porduct-opt',
                'menu_icon' => 'dashicons-category',
                'framework_title' => '',
                'footer_text' => wp_kses_post('The Plugin will Created By Themexriver '),
                'show_footer' => false,
                'show_all_options' => false,
                'show_form_warning' => true,
                'sticky_header' => false,
                'show_search' => false,
                'show_reset_all' => false,
            )
        );



        /*-------------------------------------------------------
         ** Footer  Options
        --------------------------------------------------------*/

        \CSF::createSection(
            $prefix,
            array(
                'title' => esc_html__('Slider Settings', 'gesto-tools'),
                'icon' => 'fas fa-sliders-h',
                'fields' => array(

                    array(
                        'id' => 'woopsg_autoplay',
                        'type' => 'switcher',
                        'title' => __('Slider Autoplay', 'xriver-woo-product-gallery'),
                        'label' => __('You Can control Slider Autoplay Here', 'xriver-woo-product-gallery'),
                        'default' => true,
                    ),
                    array(
                        'id' => 'woopsg_slider_loop',
                        'type' => 'switcher',
                        'title' => __('Slider Loop', 'xriver-woo-product-gallery'),
                        'label' => __('Infinity loop. Duplicate last and first items to get loop illusion.', 'xriver-woo-product-gallery'),
                        'default' => true
                    ),
                    array(
                        'id' => 'mousewheel',
                        'type' => 'switcher',
                        'title' => __('Mouse Wheel Scroll', 'xriver-woo-product-gallery'),
                        'label' => __('You can scroll Slider in your Mouse Wheel Scroll', 'xriver-woo-product-gallery'),
                        'default' => false

                    ),
                    array(
                        'id' => 'st_keyboard',
                        'type' => 'switcher',
                        'title' => __('KeyBoard Scroll', 'xriver-woo-product-gallery'),
                        'label' => __('You can scroll Slider in your Keyboard Arrow key', 'xriver-woo-product-gallery'),
                        'default' => false,
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),
                    array(
                        'id' => 'st_navigation',
                        'type' => 'switcher',
                        'title' => __('Navigation Arrow', 'xriver-woo-product-gallery'),
                        'label' => __('Slider Navigation Arrow Disable And enable Here', 'xriver-woo-product-gallery'),
                        'default' => false,
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),
                    array(
                        'id' => 'st_pagination',
                        'type' => 'switcher',
                        'title' => __('Pagination', 'xriver-woo-product-gallery'),
                        'label' => __('Slider Pagination Dot Enabel or Disable Here', 'xriver-woo-product-gallery'),
                        'default' => false,
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),

                    array(
                        'id' => 'st_speed',
                        'type' => 'slider',
                        'title' => __('Slider Speed', 'xriver-woo-product-gallery'),
                        'desc' => __('Added Here Sliding Speed ', 'xriver-woo-product-gallery'),
                        'default' => 15,
                        'min' => 0,
                        'max' => 5000000,
                        'default' => 1000,
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),
                ),
            )
        );

        \CSF::createSection(
            $prefix,
            array(
                'title' => esc_html__('Zoom Settings', 'gesto-tools'),
                'icon' => 'fas fa-search-minus',
                'fields' => array(
                    array(
                        'id' => 'lightbox_enable',
                        'type' => 'switcher',
                        'title' => __('Lightbox Image pupup', 'xriver-woo-product-gallery'),
                        'label' => __('You can enable/disable image popup', 'xriver-woo-product-gallery'),
                        'default' => true
                    ),
                ),
            )
        );

        \CSF::createSection(
            $prefix,
            array(
                'title' => esc_html__('Thumbnail Settings', 'gesto-tools'),
                'icon' => 'fas fa-thumbtack',
                'fields' => array(

                    array(
                        'id' => 'st_spaceBetween',
                        'type' => 'slider',
                        'title' => __('Space Between', 'xriver-woo-product-gallery'),
                        'desc' => __('Slider Thumbnail Space Between', 'xriver-woo-product-gallery'),
                        'default' => 15,
                    ),
                    array(
                        'id' => 'desktop_count',
                        'type' => 'slider',
                        'title' => __('Desktop Thumbnail Item', 'xriver-woo-product-gallery'),
                        'desc' => __('Added Here Sliding Speed ', 'xriver-woo-product-gallery'),
                        'max' => 100,
                        'default' => 4,
                    ),
                    array(
                        'id' => 'laptop_count',
                        'type' => 'slider',
                        'title' => __('Laptop Thumbnail Item', 'xriver-woo-product-gallery'),
                        'desc' => __('Added Here Sliding Speed ', 'xriver-woo-product-gallery'),
                        'max' => 100,
                        'default' => 4,
                    ),
                    array(
                        'id' => 'tablet_count',
                        'type' => 'slider',
                        'title' => __('Tablet Thumbnail Item', 'xriver-woo-product-gallery'),
                        'desc' => __('Added Here Sliding Speed ', 'xriver-woo-product-gallery'),
                        'max' => 100,
                        'default' => 3,
                    ),
                    array(
                        'id' => 'mobile_count',
                        'type' => 'slider',
                        'title' => __('Mobile Thumbnail Item', 'xriver-woo-product-gallery'),
                        'desc' => __('Added Here Sliding Speed ', 'xriver-woo-product-gallery'),
                        'max' => 100,
                        'default' => 3,
                    ),
                    array(
                        'id' => 'st_disable_thumbnail',
                        'type' => 'switcher',
                        'title' => __('Disable Thumbnail', 'xriver-woo-product-gallery'),
                        'label' => __('You can Diable Thumbnail Here', 'xriver-woo-product-gallery'),
                        'default' => true,
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),
                    array(
                        'id' => 'page-spacing-blog',
                        'type' => 'spacing',
                        'title' => 'Active Thumbnail Padding',
                        'output' => '.product-details-slider-nav .swiper-slide-thumb-active',
                        'output_mode' => 'padding', // or margin, relative
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),
                ),
            )
        );

        \CSF::createSection(
            $prefix,
            array(
                'title' => esc_html__('Color Settings', 'gesto-tools'),
                'icon' => 'fas fa-tint',
                'fields' => array(

                    array(
                        'id' => 'arrow_color',
                        'type' => 'color',
                        'title' => __('Arrow Color', 'xriver-woo-product-gallery'),
                        'output' => '.ptx-product-details-slider .ptx-slider-arrow',
                        'output_mode' => 'color',
                    ),
                    array(
                        'id' => 'arrow_bg_color',
                        'type' => 'color',
                        'title' => __('Arrow BG Color', 'xriver-woo-product-gallery'),
                        'output' => '.ptx-product-details-slider .ptx-slider-arrow',
                        'output_mode' => 'background-color',
                    ),
                    array(
                        'id' => 'dot_bg_color',
                        'type' => 'color',
                        'title' => __('Dot BG Color', 'xriver-woo-product-gallery'),
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),

                    array(
                        'id' => 'slider_bg_color',
                        'type' => 'color',
                        'title' => __('Slider BG Color', 'xriver-woo-product-gallery'),
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),
                    array(
                        'id' => 'slider_bg_thumb_color',
                        'type' => 'color',
                        'title' => __('Slider Thumb BG Color', 'xriver-woo-product-gallery'),
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),
                    array(
                        'id' => 'slider_thumb_border_color',
                        'type' => 'color',
                        'title' => __('Slider Thumb Border Color', 'xriver-woo-product-gallery'),
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),
                ),
            )
        );
        \CSF::createSection(
            $prefix,
            array(
                'title' => esc_html__('Gallery Video Settings', 'gesto-tools'),
                'icon' => 'fab fa-youtube',
                'fields' => array(
                    array(
                        'id' => 'gallery_video__opt',
                        'type' => 'switcher',
                        'title' => __('Gallery Video Option', 'xriver-woo-product-gallery'),
                        'label' => __('Woocommerce Gallery Video Option Enable And Disable Here', 'xriver-woo-product-gallery'),
                        'default' => false,
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                    ),
                    array(
                        'id' => 'iframe_video_height',
                        'type' => 'slider',
                        'title' => __('Iframe Video Height', 'xriver-woo-product-gallery'),
                        'desc' => __('Add Iframe Video Height', 'xriver-woo-product-gallery'),
                        'min' => 0,
                        'max' => 5000000,
                        'output' => '.product-details-for iframe',
                        'output_mode' => 'min-height',
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                        'dependency' => array('gallery_video__opt', '==', 'true')
                    ),
                    array(
                        'id' => 'iframe_video_thumb_height',
                        'type' => 'slider',
                        'title' => __('Iframe Video Thumbnail Height', 'xriver-woo-product-gallery'),
                        'desc' => __('Add Iframe Thumbnail Video Height', 'xriver-woo-product-gallery'),
                        'min' => 0,
                        'max' => 5000000,
                        'output' => '.product-details-nav iframe',
                        'output_mode' => 'height',
                        'class' => 'thx-pro-item',
                        'subtitle' => 'Available in <a target="_blank" href="#">Pro</a>',
                        'dependency' => array('gallery_video__opt', '==', 'true')
                    ),
                ),
            )
        );
    }
}


