<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $product;
$images = $product->get_gallery_image_ids();
$proopt = get_option('woopsg_opt');
$iframe_video = get_post_meta(get_the_ID(), 'woopgfs_product_iframe_video', true);
$popup_video = get_post_meta(get_the_ID(), 'woopgfs_product_popup_video', true);
$video_type = isset($_GET['video']) ? esc_html($_GET['video']) : get_post_meta(get_the_ID(), 'woopgfs_product_video_type', true);
$attachment_ids = $product->get_gallery_image_ids();
$lightbox_enable = $proopt['lightbox_enable'];
?>
<div class="ptx-product-details-slider woocommerce-product-gallery images wpgs-wrapper">
    <div class="item-details-slider-arrow position-relative">
        <?php if (!empty($attachment_ids)): ?>
            <div class="product-details-slider-for swiper-container">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="product-details-for position-relative">
                            <?php if ($lightbox_enable == 1): ?>
                                <span class="product-view-icon   zoom-gallery"><a
                                        href="<?php echo get_the_post_thumbnail_url($product->get_id(), 'full'); ?>"
                                        data-source="<?php echo get_the_post_thumbnail_url($product->get_id(), 'full'); ?>"><i
                                            class="fa fa-search"></i></a></span>
                            <?php endif; ?>
                            <img src="<?php echo get_the_post_thumbnail_url($product->get_id(), 'full'); ?>" alt=""
                                data-zoomed="<?php echo get_the_post_thumbnail_url($product->get_id(), 'full'); ?>">
                            <?php if ($popup_video && 'popup' == $video_type && $proopt['gallery_video__opt'] == 1) { ?>
                                <div class="product-view-video">
                                    <a class="video_box" href="<?php echo esc_url($popup_video); ?>"><i
                                            class="fas fa-play"></i></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    foreach ($attachment_ids as $attachment_id) { ?>
                        <div class="swiper-slide">
                            <div class="product-details-for position-relative">
                                <?php if ($lightbox_enable == 1): ?>
                                    <span class="product-view-icon   zoom-gallery"><a
                                            href="<?php echo get_the_post_thumbnail_url($product->get_id(), 'full'); ?>"
                                            data-source="<?php echo get_the_post_thumbnail_url($product->get_id(), 'full'); ?>"><img
                                                src="<?php echo WOO_PSGS_ASSETS . '/img/search.svg' ?>" alt=""></a></span>
                                <?php endif; ?>
                                <img src="<?php echo wp_get_attachment_image_url($attachment_id, 'full'); ?>" alt=""
                                    data-zoomed="<?php echo wp_get_attachment_image_url($attachment_id, 'full'); ?>">
                                <?php if ($popup_video && 'popup' == $video_type && $proopt['gallery_video__opt'] == 1) { ?>
                                    <div class="product-view-video">
                                        <a class="video_box" href="<?php echo esc_url($popup_video); ?>"><i
                                                class="fas fa-play"></i></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <?php if ($iframe_video && 'iframe' == $video_type && $proopt['gallery_video__opt'] == 1) { ?>
                        <div class="swiper-slide">
                            <div class="product-details-for">
                                <iframe width="100%" height="550"
                                    src="https://www.youtube.com/embed/<?php echo esc_attr($iframe_video); ?>?si=xVutj9NnEkFlZhIt"
                                    title="YouTube video player"
                                    allow="autoplay; fullscreen; accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    frameborder="0" allowfullscreen></iframe>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="ptx-slider-arrow d-flex justify-content-center align-items-center views-button-prev"><i
                    class="fal fa-chevron-left"></i></div>
            <div class="ptx-slider-arrow d-flex justify-content-center align-items-center views-button-next"><i
                    class="fal fa-chevron-right"></i></div>

        <?php else: ?>
            <div class="product_thumb">
                <div class="product-details-for position-relative">
                    <span class="product-view-icon   "><a
                            href="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'full'); ?>"
                            data-source="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'full'); ?>"><img
                                src="<?php echo WOO_PSGS_ASSETS . '/img/search.svg' ?>" alt=""></a></span>
                    <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'full'); ?>" alt=""
                        data-zoomed="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'full'); ?>">
                    <?php if ($popup_video && 'popup' == $video_type && $proopt['gallery_video__opt'] == 1) { ?>
                        <div class="product-view-video">
                            <a class="video_box" href="<?php echo esc_url($popup_video); ?>"><i class="fas fa-play"></i></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($proopt['st_pagination']): ?>
            <div class="swiper-pagination"></div>
        <?php endif; ?>
    </div>
    <?php if (!empty($attachment_ids) && $proopt['st_disable_thumbnail'] == 1): ?>
        <div class="product-details-slider-nav swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="product-details-nav">
                        <?php echo get_the_post_thumbnail($product->get_id(), 'thumbnail'); ?>
                    </div>
                </div>
                <?php
                foreach ($attachment_ids as $attachment_id) { ?>
                    <div class="swiper-slide">
                        <div class="product-details-nav">
                            <?php echo wp_get_attachment_image($attachment_id, 'thumbnail'); ?>
                        </div>
                    </div>
                <?php }
                ?>
                <?php if ($iframe_video && 'iframe' == $video_type && $proopt['gallery_video__opt'] == 1) { ?>
                    <div class="swiper-slide">
                        <div class="product-details-nav">
                            <iframe width="100%" height="550"
                                src="https://www.youtube.com/embed/<?php echo esc_attr($iframe_video); ?>?si=xVutj9NnEkFlZhIt"
                                title="YouTube video player"
                                allow="autoplay; fullscreen; accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>
</div>