<?php
/**
 * Shop Archive Template From Scratch (100% Arabic Native RTL)
 * Theme: Ana9a (Tailwind v4 Blueprint)
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header(); ?>

<main class="max-w-[1440px] mx-auto px-4 py-12 md:py-16 text-right" dir="rtl">
    
    <header class="mb-10 md:mb-16 flex flex-col md:flex-row-reverse md:items-end justify-between gap-4 border-b border-gray-100 pb-6">
        
        <div class="flex items-center gap-4 w-full md:w-auto justify-start order-2 md:justify-end">
            <?php do_action( 'woocommerce_before_shop_loop' ); ?>
        </div>

        <div class="order-1 md:order-2">
            <h1 class="text-3xl md:text-5xl font-black uppercase tracking-tighter text-black">
                
                <?php
                 if ( is_shop() ) {
                    echo esc_html__( 'متجرنا', 'ana9a' );
                 }else {

                     woocommerce_page_title();
                 }
                 
                ?>
            </h1>
            <p class="text-sm text-gray-500 mt-2">
                <?php _e('اكتشف أحدث تشكيلات الملابس والأحذية الحصرية', 'ana9a'); ?>
            </p>
        </div>

    </header>

    <?php if ( have_posts() ) : ?>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-4 gap-y-10 md:gap-x-6 md:gap-y-14">
            <?php
            while ( have_posts() ) : the_post();
                // استدعاء بطاقة المنتج المخصصة (ستترتب تلقائياً RTL بناءً على الحاوية الأب)
                echo '<div class="reveal-on-scroll">';
                wc_get_template_part( 'content', 'product' );
                echo '</div>';

            endwhile;
            ?>
        </div>

        <div class="mt-16 md:mt-24 pt-8 border-t border-gray-100 flex justify-center">
            <?php do_action( 'woocommerce_after_shop_loop' ); ?>
        </div>

    <?php else : ?>
        
        <div class="text-center py-20 bg-gray-50 rounded-3xl">
            <p class="text-gray-500 font-medium">
                <?php _e('لم يتم العثور على أي منتجات حالياً في هذا القسم.', 'ana9a'); ?>
            </p>
        </div>

    <?php endif; ?>

</main>

<?php get_footer(); ?>