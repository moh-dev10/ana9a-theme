<?php
/**
 * Ana9a Theme WooCommerce Customizations
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// 1. دالة معالجة وعرض الأسعار المطورة لتدعم جميع أنواع المنتجات (Simple & Variable)
add_filter( 'woocommerce_get_price_html', 'custom_sale_price_with_badge', 10, 2 );
function custom_sale_price_with_badge( $price, $product ) {

    $badge = '';// إذا لم يكن المنتج في حالة تخفيض، نعيد السعر كما هو بدون أي تعديلات

    if ( ! $product->is_on_sale() ) {
        return '<ins class="no-underline" style="text-decoration:none;">' . $price . '</ins>';
    }

    $discount_percentage = 0;

    if ( $product->is_type( 'variable' ) ) {
        $percentages = array();
        $variations = $product->get_available_variations();

        foreach ( $variations as $variation ) {
            $r_price = (float) $variation['display_regular_price'];
            $s_price = (float) $variation['display_price'];

            if ( $r_price > 0 && $s_price < $r_price ) {
                $percentages[] = round( ( ( $r_price - $s_price ) / $r_price ) * 100 );
            }
        }

        if ( empty( $percentages ) ) {
            return $price;
        }

        $discount_percentage = max( $percentages );
        
        $min_regular_price = $product->get_variation_regular_price( 'min', true );
        $max_regular_price = $product->get_variation_regular_price( 'max', true );
        $min_sale_price    = $product->get_variation_sale_price( 'min', true );
        $max_sale_price    = $product->get_variation_sale_price( 'max', true );

        if ( $min_sale_price !== $max_sale_price ) {
            $sale_html    = '<ins>' . wc_price( $min_sale_price ) . ' - ' . wc_price( $max_sale_price ) . '</ins>';
            $regular_html = '<del>' . wc_price( $min_regular_price ) . ' - ' . wc_price( $max_regular_price ) . '</del>';
        } else {
            $sale_html    = '<ins>' . wc_price( $min_sale_price ) . '</ins>';
            $regular_html = '<del>' . wc_price( $min_regular_price ) . '</del>';
        }

    } else {
        $regular = (float) $product->get_regular_price();
        $sale    = (float) $product->get_sale_price();

        if ( $regular <= 0 ) {
            return $price;
        }

        $discount_percentage = round( ( ( $regular - $sale ) / $regular ) * 100 );
        $sale_html    = '<ins>' . wc_price( $sale ) . '</ins>';
        $regular_html = '<del>' . wc_price( $regular ) . '</del>';
    }
    if ( is_product() ) {
        $badge = '<span dir="rtl" class="custom-sale-badge">خصم ' . $discount_percentage . '%-</span>';
    }

    return '<span class="custom-price-container">' . $sale_html . ' ' . $regular_html . ' ' . $badge . '</span>';
}

// 2. إيقاف ملفات الـ CSS الافتراضية لووكومرس تماماً للسماح لـ Tailwind بالسيطرة الكاملة
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// 3. تنظيف الهياكل والأوسمة التلقائية (الأغلفة القديمة) لضمان عمل الـ Grid المخصص
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
add_filter( 'woocommerce_product_loop_start', function() { return ''; }, 999 );
add_filter( 'woocommerce_product_loop_end', function() { return ''; }, 999 );