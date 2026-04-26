<?php
/**
 * Template part for displaying featured products on the homepage
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



<section class="section-lux container-lux mx-auto px-6 py-24">
    <div class="flex justify-between items-end mb-12">
        <div>
            <h2 class="text-[10px] uppercase tracking-[0.3rem] text-brand-gray-500 mb-2">New Arrivals</h2>
            <p class="text-3xl font-bold tracking-tighter uppercase">Selected Pieces</p>
        </div>
        <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>"
        class="text-[10px] font-bold uppercase tracking-widest border-b boredr-black
        pb-1 hover:text-brand-gray-500 hover:border-brand-gray-500 transition-all">
        View All
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-12">
        <?php
        if ($products_query->have_posts()):
            while ($products_query->have_posts()) : $products_query->the_post();
            // استدعاء ملف الكارت الخاص بالمنتج
            get_template_part('template-parts/woocommerce/product-card');

        endwhile;
        wp_reset_postdata(); // مهم جداً لإعادة تعيين البيانات العالمية    </div>
    else :
        echo '<p class="text-sm text-gray-500 uppercase tracking-widest">NO products found.</p>';
    endif;
    ?>
    </div>
</section>