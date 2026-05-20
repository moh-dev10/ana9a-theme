<?php

if(!defined('ABSPATH')) exit;

require get_template_directory().'/inc/setup.php';
require get_template_directory().'/inc/enqueue.php';

if ( class_exists( 'Algeria_Delivery_Class' ) ) {
    require get_template_directory() . '/inc/algeria-delivery-integration.php';
}



// ✅ FIXED: دالة معالجة وعرض الأسعار المطورة لتدعم جميع أنواع المنتجات (Simple & Variable)
add_filter( 'woocommerce_get_price_html', 'custom_sale_price_with_badge', 10, 2 );

function custom_sale_price_with_badge( $price, $product ) {
    // 1. إذا كان المنتج لا يملك تخفيضاً نشطاً، نعيد السعر الافتراضي بتنسيق نظيف وبدون خط شطب
    if ( ! $product->is_on_sale() ) {
        return '<ins class="no-underline" style="text-decoration:none;">' . $price . '</ins>';
    }

    // متغيرات التنسيق المشتركة للشارة (البادج)
    $discount_percentage = 0;

    // 2. معالجة المنتجات المتغيرة (Variable Products) لضمان حساب نسبة التخفيض وعكس السعر
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
        
        // جلب الأسعار الأدنى والأعلى للمنتج المتغير لإعادة بنائها بالترتيب الصحيح
        $min_regular_price = $product->get_variation_regular_price( 'min', true );
        $max_regular_price = $product->get_variation_regular_price( 'max', true );
        $min_sale_price    = $product->get_variation_sale_price( 'min', true );
        $max_sale_price    = $product->get_variation_sale_price( 'max', true );

        // بناء نص السعر للمنتج المتغير (مثال: 5.500 د.ج - 7.000 د.ج) ولكن معكوس الهيكل داخلياً
        if ( $min_sale_price !== $max_sale_price ) {
            $sale_html    = '<ins>' . wc_price( $min_sale_price ) . ' - ' . wc_price( $max_sale_price ) . '</ins>';
            $regular_html = '<del>' . wc_price( $min_regular_price ) . ' - ' . wc_price( $max_regular_price ) . '</del>';
        } else {
            $sale_html    = '<ins>' . wc_price( $min_sale_price ) . '</ins>';
            $regular_html = '<del>' . wc_price( $min_regular_price ) . '</del>';
        }

    } else {
        // 3. معالجة المنتجات البسيطة (Simple Products) والأنواع الأخرى الافتراضية
        $regular = (float) $product->get_regular_price();
        $sale    = (float) $product->get_sale_price();

        if ( $regular <= 0 ) {
            return $price;
        }

        $discount_percentage = round( ( ( $regular - $sale ) / $regular ) * 100 );
        $sale_html    = '<ins>' . wc_price( $sale ) . '</ins>';
        $regular_html = '<del>' . wc_price( $regular ) . '</del>';
    }

    // 4. بناء شارة الخصم الجذابة المتوافقة مع أسلوب متجرك
    $badge = '<span dir="rtl" class="custom-sale-badge">خصم ' . $discount_percentage . '%-</span>';

    // ✅ التعديل الجوهري: السعر المخفض أولاً، ثم السعر المشطوب ثانياً، ثم شارة الخصم
    return '<span class="custom-price-container">' . $sale_html . ' ' . $regular_html . ' ' . $badge . '</span>';
}

// ✅ ربط الدالة بفلتر ووكومرس الرسمي لتفعيلها في كامل الموقع
add_filter( 'woocommerce_get_price_html', 'custom_sale_price_with_badge', 10, 2 );


// ✅ تحسين التنسيق الجمالي للشارة والأسعار عبر الـ CSS لضمان عدم التداخل والتناسق الكامل
add_action('wp_head', 'custom_sale_badge_styles');

function custom_sale_badge_styles() {
    echo '<style>
        .custom-price-container {
            display: inline-flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }
        .custom-sale-badge {
            display: inline-block;
            background: #E24B4A;
            color: #fff;
            font-size: 11px;
            font-weight: 800;
            padding: 2px 10px;
            border-radius: 20px;
            line-height: 1.6;
            vertical-align: middle;
            letter-spacing: -0.02em;
        }
        /* حماية وتنسيق إضافي للخطوط المشطوبة والمخفضة لتبدو احترافية */
        .custom-price-container del {
            color: #a3a3a3 !important;
            font-size: 0.8em;
            text-decoration: line-through;
        }
        .custom-price-container ins {
            color: #22c55e; /* لون أخضر جذاب للسعر الحالي أو حسب رغبتك */
            text-decoration: none;
            font-weight: 900;
        }
    </style>';
}



// 5. إيقاف ملفات الـ CSS الافتراضية لووكومرس تماماً للسماح لـ Tailwind v4 بالسيطرة الكاملة
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// 6. تنظيف الهياكل والأوسمة التلقائية (الأغلفة القديمة) لضمان عمل الـ Grid المخصص
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
add_filter( 'woocommerce_product_loop_start', function() { return ''; }, 999 );
add_filter( 'woocommerce_product_loop_end', function() { return ''; }, 999 );

?>