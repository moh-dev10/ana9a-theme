<?php
/**
 * Ana9a Theme Setup
 */
// منع الوصول المباشر إلى هذا الملف
if(!defined('ABSPATH')) exit;// تأكد من تحميل هذا الملف فقط من خلال functions.php
if(!function_exists('ana9a_setup')):// منع إعادة تعريف الدوال إذا تم تضمين هذا الملف أكثر من مرة

    function ana9a_setup() {
         
        
        register_nav_menus( [
            'primary'=> __('Primary Menu','ana9a'),// هذا الاسم يجب أن يطابق الاسم المستخدم في wp_nav_menu داخل header.php
            'footer' => __('Footer Menu','ana9a'),
            ] );
            
        // دعم مميزات ووردبريس الأساسية
       add_theme_support('title-tag');
       add_theme_support('post-thumbnails');
       add_theme_support('html5',['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    }
endif;
        // إضافة كلاس nav-link-item لكل روابط القائمة
        add_filter('nav_menu_link_attributes', 'ana9a_add_menu_link_class', 10, 3);
        
        function ana9a_add_menu_link_class($atts, $item, $args) {
            // نتأكد أننا نستهدف القائمة الرئيسية فقط
            if (isset($args->theme_location) && $args->theme_location == 'primary') {
                $atts['class'] = 'nav-link-item';
            }
        return $atts;
}
        add_action('after_setup_theme','ana9a_setup');

    
add_theme_support( 'woocommerce' );
// اختيارياً: تفعيل ميزات الصور في ووكومرس
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );