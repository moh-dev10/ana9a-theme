<?php
/**
 * Product Card Component - 100% Arabic Blueprint (Tailwind Pure)
 * Path: template-parts/woocommerce/product-card.php
 */

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>

<article <?php wc_product_class( 'group relative flex flex-col gap-3 bg-brand-white product-card-item in-carousel-target', $product ); ?>>
    
    <div class="animate-scroll-reveal relative aspect-[3/4] w-full overflow-hidden rounded-2xl bg-brand-gray-100 border border-brand-gray-100">
        <a href="<?php the_permalink(); ?>" class="block w-full h-full">
            <?php 
            echo woocommerce_get_product_thumbnail('full', [
                'class' => 'w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-500'
            ]); 
            ?>
        </a>

        <?php if ( $product->is_on_sale() ) : ?>
            <span class="absolute top-3 right-3 bg-brand-black text-brand-white text-[10px] font-black tracking-widest uppercase px-3 py-1 rounded-full shadow-sm z-10 [.in-carousel_&]:hidden">
                <?php _e('تخفيض', 'ana9a'); ?>
            </span>
        <?php endif; ?>

        <div class="absolute inset-x-0 bottom-0 p-3 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out hidden md:block z-10">
            <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="block w-full text-center bg-brand-white/90 backdrop-blur-md text-brand-black py-3 rounded-xl text-[11px] font-black tracking-wider uppercase hover:bg-brand-black hover:text-brand-white transition-colors shadow-sm">
                + <?php _e('معاينة المنتج', 'ana9a'); ?>
            </a>
        </div>
    </div>

    <div class="flex flex-col gap-1.5 px-1 *:in-[.in-carousel]:gap-1 in-[.in-carousel]:text-center in-[.in-carousel]:items-center">
        
       <?php 
       $categories = get_the_terms( $product->get_id(), 'product_cat' );
       $filtered   = is_array($categories) ? array_filter( $categories, fn($c) => $c->slug !== 'uncategorized' ) : [];
       if ( ! empty($filtered) ) {
           $cat = reset($filtered);
           echo '<span class="text-[11px] font-medium uppercase tracking-wider text-brand-gray-500 in-[.in-carousel]:hidden">' . esc_html( $cat->name ) . '</span>';
       }
       ?>

        <h2 class="text-sm font-medium text-brand-gray-800 group-hover:text-brand-black transition-colors leading-tight tracking-tight in-[.in-carousel]:text-[13px] in-[.in-carousel]:font-bold in-[.in-carousel]:text-center in-[.in-carousel]:tracking-widest">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        
        <div class="flex items-center justify-between mt-0.5">
            <div dir="rtl" class="text-sm font-black text-brand-black flex items-center gap-2 [&_del]:border-none [&_del]:text-brand-gray-500 [&_del]:font-normal [&_ins]:no-underline [&_span]:no-underline [.in-carousel_&_del]:hidden in-[.in-carousel]:text-[16px] in-[.in-carousel_&]:justify-center in-[.in-carousel_&]:w-full">
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