<?php
/**
 * Ana9a Theme Setup
 */

// منع الوصول المباشر إلى هذا الملف
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

if ( ! function_exists( 'ana9a_setup' ) ) :
    /**
     * إعداد مميزات القالب الأساسية
     */
    function ana9a_setup() {
        // تسجيل القوائم
        register_nav_menus( [
            'primary'     => __( 'Primary Menu', 'ana9a' ),
            'mobile-menu' => __( 'Mobile Navigation Menu', 'ana9a' ),
            'footer'      => __( 'Footer Menu', 'ana9a' ),
        ] );
            
        // دعم مميزات ووردبريس الأساسية
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

        // دعم ميزات ووكومرس والمعرض
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
endif;
add_action( 'after_setup_theme', 'ana9a_setup' );


/* ==========================================================================
   🚀 إعدادات تحسين الأداء والسرعة (Performance Optimization Hooks)
   ========================================================================== */

/**
 * 1️⃣ تأجيل تحميل ملفات الـ JS لرفع سكور الـ Performance ومنع الـ Render-blocking
 */
function ana9a_defer_scripts( $tag, $handle, $src ) {
    // عدم تطبيق التأجيل داخل لوحة تحكم ووردبريس
    if ( is_admin() ) {
        return $tag;
    }

    // استثناء ملف jQuery الأساسي لمنع حدوث مشاكل توافقية
    if ( strpos( $handle, 'jquery' ) !== false ) {
        return $tag;
    }

    // إضافة خاصية defer="defer" لوسم الـ script
    return str_replace( ' src', ' defer="defer" src', $tag );
}
add_filter( 'script_loader_tag', 'ana9a_defer_scripts', 10, 3 );


/**
 * 2️⃣ تحسين أداء الصورة الرئيسية للمنتج (LCP Optimization) لإلغاء الـ Lazy Loading
 */
function ana9a_optimize_product_lcp_image( $attributes, $attachment, $size ) {
    // التحقق من أننا داخل صفحة المنتج الفردي وأن الصورة هي الصورة البارزة الرئيسية
    if ( is_product() && is_main_query() && 'woocommerce_single' === $size ) {
        
        // إلغاء التحميل الكسول تماماً عن هذه الصورة لتسريع الـ LCP
        if ( isset( $attributes['loading'] ) ) {
            unset( $attributes['loading'] );
        }
        
        // إعطاء أولوية تحميل قصوى للمتصفح
        $attributes['fetchpriority'] = 'high';
        
        // منع الـ Decoding المؤجل
        $attributes['decoding'] = 'sync';
    }
    return $attributes;
}
add_filter( 'wp_get_attachment_image_attributes', 'ana9a_optimize_product_lcp_image', 10, 3 );


/**
 * 3️⃣ تقليص حجم الـ DOM وإلغاء سكريبتات الـ Blocks غير المستخدمة في صفحة المنتج
 */
function ana9a_optimize_js_loading() {
    if ( is_product() ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' );
    }
}
add_action( 'wp_enqueue_scripts', 'ana9a_optimize_js_loading', 99 );


/* ==========================================================================
   ✨ تحسينات التصميم والقوائم (Tailwind Intersections)
   ========================================================================== */

/**
 * إضافة كلاس nav-link-item لكل روابط القائمة ليتماشى مع أنميشن Tailwind v4 الخاص بك
 */
function ana9a_add_menu_link_class( $atts, $item, $args ) {
    // نتأكد أننا نستهدف القائمة الرئيسية فقط
    if ( isset( $args->theme_location ) && $args->theme_location == 'primary' ) {
        $atts['class'] = 'nav-link-item';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'ana9a_add_menu_link_class', 10, 3 );


/**
 * تنظيف صفحة المنتج من سكريبتات ووكومرس الزائدة لرفع السكور
 */
function ana9a_clean_wc_scripts() {
    if ( is_product() ) {
        // إلغاء تحميل سكريبتات الـ Blocks والـ Gutenberg تماماً لتقليص حجم الـ JS والـ DOM
        wp_dequeue_style( 'wc-blocks-style' );
        wp_dequeue_style( 'wc-blocks-style-rtl' );
        
        // إذا كنت لا تستخدم الـ Cart Fragments (التحديث التلقائي للسلة بدون إنعاش الصفحة) عبر سكريبت خارجي:
        wp_dequeue_script( 'wc-cart-fragments' );
    }
}
add_action( 'wp_enqueue_scripts', 'ana9a_clean_wc_scripts', 999 );


// shop

/**
 * تعريب نصوص أدوات الفرز ونتائج البحث في صفحة الأرشيف تلقائياً
 */
add_filter( 'woocommerce_catalog_orderby', 'ana9a_translate_orderby_text' );
function ana9a_translate_orderby_text( $orderby ) {
    return array(
        'menu_order' => 'الترتيب الافتراضي',
        'popularity' => 'الأكثر شعبية',
        'rating'     => 'الأعلى تقييماً',
        'date'       => 'الأحدث وصولاً',
        'price'      => 'السعر: من الأقل إلى الأعلى',
        'price-desc' => 'السعر: من الأعلى إلى الأقل',
    );
}

/**
 * تعريب نصوص عداد نتائج المنتجات بالكامل وبدقة لغوية (مفرد، مثنى، جمع، وصفحات)
 */
add_filter( 'woocommerce_result_count_html', 'ana9a_translate_result_count', 20, 3 );
function ana9a_translate_result_count( $html, $total, $per_page ) {
    // جلب رقم الصفحة الحالية
    $current_page = max( 1, get_query_var( 'paged' ) );
    
    // إذا لم تكن هناك أي منتجات
    if ( 0 === $total ) {
        return '<p class="woocommerce-result-count">لا توجد منتجات حالياً</p>';
    }

    // إذا كان هناك منتج واحد فقط في كل المتجر
    if ( 1 === $total ) {
        return '<p class="woocommerce-result-count">عرض منتج واحد فقط</p>';
    }

    // إذا كان هناك منتجان فقط في كل المتجر
    if ( 2 === $total ) {
        return '<p class="woocommerce-result-count">عرض منتجين فقط</p>';
    }

    // حالة: المنتجات كلها تكفي لصفحة واحدة فقط (أقل من الحد الأقصى للمنتجات في الصفحة)
    if ( $total <= $per_page ) {
        return '<p class="woocommerce-result-count">عرض كل المنتجات (' . $total . ')</p>';
    }

    // حالة: المنتجات مقسمة على صفحات (Pagination) - هنا تحدث المشكلة الافتراضية
    $first = ( $per_page * ( $current_page - 1 ) ) + 1;
    $last  = min( $total, $per_page * $current_page );

    return '<p class="woocommerce-result-count">عرض النتائج من ' . $first . ' إلى ' . $last . ' (من إجمالي ' . $total . ' منتج)</p>';
}