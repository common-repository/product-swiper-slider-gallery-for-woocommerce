<?php 
//namespace
namespace Raziul\ProductGallery\Admin;
if(!defined('ABSPATH')){
    exit;
}
class Dashboard{

    /**
     * class construct
     */
    public function __construct(){
       add_action('admin_menu', [$this, 'admin_dashboard']);
       add_action('admin_menu', array( $this, 'menu_remove' ), 99);
       add_action('admin_menu', array( $this, 'go_pro_board' ), 99);
    }

    public function menu_remove(){
        remove_submenu_page('xriver-woo-product-gallery', 'xriver-woo-product-gallery');
    }

    /**
     * Admin Dashboard
     *
     * @return void
     */
    
    public function admin_dashboard(){
        add_menu_page(
            __('Themexriver Gallery', 'xriver-woo-product-gallery'), 
            __('Themexriver Gallery', 'xriver-woo-product-gallery'), 
            'manage_options', 
            'xriver-woo-product-gallery', 
            null, 
            'dashicons-table-row-before', 
            55
        );
    }

    /**
     * Plugin Page
     *
     * @return void
     */
    public function go_pro_board(){
        add_submenu_page(
            'xriver-woo-product-gallery',
            __('Go Pro', 'xriver-woo-product-gallery'),
            __('Go Pro', 'xriver-woo-product-gallery'),
            'manage_options',
            'go-pro',
            [$this, 'go_pro_dashboard']
        );
    }


    /**
     * Display Pro Dashboard
     *
     * @return void
     */
    public function go_pro_dashboard(){
        //
    }
}