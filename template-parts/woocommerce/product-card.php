<?php
/**
 * Product Card Component - Dynamic
 */
global $product;

// التأكد من أن المنتج موجود
if (empty($product)) return;
?>

<div class="group relative flex flex-col bg-white">
    <div class="relative aspect-[3/4] overflow-hidden bg-brand-gray-100">
        
        <a href="<?php the_permalink(); ?>">
            <?php echo woocommerce_get_product_thumbnail('woocommerce_single', ['class' => 'h-full w-full object-cover object-center transition-transform duration-700 group-hover:scale-110']); ?>
        </a>

        <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
            <?php 
                echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" class="w-full bg-white text-brand-black py-3 text-[10px] font-bold uppercase tracking-widest text-center transition-transform duration-500 hover:bg-brand-black hover:text-white">%s</a>',
                        esc_url( $product->add_to_cart_url() ),
                        esc_attr( $product->get_id() ),
                        esc_html( $product->add_to_cart_text() )
                    ), $product ); 
            ?>
        </div>
    </div>

    <div class="py-4 flex flex-col gap-1">
        <h3 class="text-[11px] font-medium uppercase tracking-wider text-brand-gray-600">
            <?php echo wc_get_product_category_list($product->get_id()); ?>
        </h3>
        <a href="<?php the_permalink(); ?>" class="text-sm font-bold text-brand-black hover:opacity-70 transition-opacity">
            <?php the_title(); ?>
        </a>
        <div class="flex items-center gap-3 mt-1 text-sm font-bold">
            <?php echo $product->get_price_html(); ?>
        </div>
    </div>
</div>