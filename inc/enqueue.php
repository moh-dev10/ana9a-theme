<?php

 function ana9a_scripts(){

    wp_enqueue_style('ana9a_tailwind', get_template_directory_uri().'/style.css', array(), '1.0.0');

    // استدعاء ملف الـ JS الجديد
    wp_enqueue_script(
        'ana9a-navigation', 
        get_template_directory_uri() . '/js/navigation.js', 
        [], 
        '1.0.0', 
        true //  وهذا أفضل للأداء Footer تعني وضعه في  true
        
    );

 }
 
 add_action('wp_enqueue_scripts','ana9a_scripts');

 function ana9a_enqueue_scripts() {
    // استدعاء Alpine.js كـ Script مع خاصية defer لضمان عدم تأثر سرعة الموقع (FCP)
    wp_enqueue_script( 'alpinejs', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', array(), '3.0.0', array( 'strategy' => 'defer' ) );

// شحن ملفات Swiper والـ Carousel داخل inc/enqueue.php
wp_enqueue_style('swiper-cdn-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');
wp_enqueue_script('swiper-cdn-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
wp_enqueue_script('ana9a-carousel-custom', get_template_directory_uri() . '/assets/js/carousel.js', array('swiper-cdn-js'), '1.0.0', true);

 }
 
add_action( 'wp_enqueue_scripts', 'ana9a_enqueue_scripts' );




