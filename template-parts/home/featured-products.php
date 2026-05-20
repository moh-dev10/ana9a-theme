<?php
/**
 * Template part for displaying featured products on the homepage
 * Theme: Ana9a - 100% Arabic Native Blueprint
 */
if (!defined('ABSPATH')) exit;

// إعداد الاستعلام لجلب أحدث 4 منتجات
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 4,
    'status'         => 'publish',
);

$products_query = new WP_Query($args);
?>

<section class=" section-lux container-lux mx-auto px-6 py-24" dir="rtl">
    
    <div class="flex justify-between items-end mb-12 text-right">
        <div class="space-y-1">
            <h2 class="text-[10px] uppercase tracking-[0.3rem] text-brand-gray-500">
                <?php _e('وصلنا حديثاً', 'ana9a'); ?>
            </h2>
            <p class="text-3xl font-bold tracking-tighter uppercase text-gray-900">
                <?php _e('قطع مختارة بعناية', 'ana9a'); ?>
            </p>
        </div>
        
        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"
           class="text-[10px] font-bold uppercase tracking-widest border-b border-black pb-1 hover:text-brand-gray-500 hover:border-brand-gray-500 transition-all">
            <?php _e('عرض الكل', 'ana9a'); ?>
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-12">
        <?php
        if ($products_query->have_posts()):
            while ($products_query->have_posts()) : $products_query->the_post();
                
                // استدعاء ملف الكارت العربي والمعدل من المسار الصحيح
                echo '<div class="reveal-on-scroll">';
                get_template_part('template-parts/woocommerce/product-card');
                echo '</div>';
            endwhile;
            wp_reset_postdata(); // إعادة تعيين البيانات بعد الـ Loop
        else :
            // رسالة في حال عدم وجود منتجات مضافة بعد
            echo '<p class="text-sm text-gray-400 uppercase tracking-widest col-span-full py-4 text-center">' . __('لا توجد منتجات معروضة حالياً.', 'ana9a') . '</p>';
        endif;
        ?>
    </div>
</section>