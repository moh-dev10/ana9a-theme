<?php
/**
 * Product Card Component - 100% Arabic Blueprint
 * Path: template-parts/woocommerce/product-card.php
 */

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>

<article <?php wc_product_class( 'group relative flex flex-col gap-3 bg-white', $product ); ?>>
    
    <div class=" animate-scroll-reveal relative aspect-[3/4] w-full overflow-hidden rounded-2xl bg-gray-50 border border-gray-100">
        <a href="<?php the_permalink(); ?>" class="block w-full h-full">
            <?php 
            echo woocommerce_get_product_thumbnail('full', [
                'class' => 'w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-500'
            ]); 
            ?>
        </a>

        <?php if ( $product->is_on_sale() ) : ?>
            <span class="absolute top-3 right-3 bg-black text-white text-[10px] font-black tracking-widest uppercase px-3 py-1 rounded-full shadow-sm z-10">
                تخفيض
            </span>
        <?php endif; ?>

        <div class="absolute inset-x-0 bottom-0 p-3 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out hidden md:block z-10">
            <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="block w-full text-center bg-white/90 backdrop-blur-md text-black py-3 rounded-xl text-[11px] font-black tracking-wider uppercase hover:bg-black hover:text-white transition-colors shadow-sm">
                + معاينة المنتج
            </a>
        </div>
    </div>

    <div class="flex flex-col gap-1.5 px-1">
        
        <?php 
        $categories = wc_get_product_category_list($product->get_id(), ', ', '<span class="text-[11px] font-medium uppercase tracking-wider text-gray-400">', '</span>');
        if ( ! empty($categories) ) {
            $cat_text = strip_tags($categories);
            // إذا كان المنتج يتبع للتصنيف الافتراضي لووكومرس، نقوم بتعريبه في الـ Blueprint
            if ( strtolower($cat_text) === 'uncategorized' ) {
                $cat_text = 'عام';
            }
            echo '<span class="text-[11px] font-medium uppercase tracking-wider text-gray-400">' . esc_html($cat_text) . '</span>';
        }
        ?>

        <h2 class="text-sm font-medium text-gray-900 group-hover:text-black transition-colors leading-tight tracking-tight">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        
        <div class="flex items-center justify-between mt-0.5">
            
            <div dir="rtl" class="text-sm font-black text-black flex items-center gap-2  [&_del]:border-none [&_del]:text-gray-400 [&_del]:font-normal [&_ins]:no-underline [&_span]:no-underline">
                <?php echo $product->get_price_html(); ?>
            </div>

            <?php 
            if ( function_exists('display_product_color_swatches') ) {
                display_product_color_swatches($product);
            }
            ?>
        </div>
    </div>

</article>