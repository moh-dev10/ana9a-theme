<?php get_header(); ?>

<main class="bg-white min-h-screen py-8 md:py-16" dir="rtl">
    <div class="max-w-[1200px] mx-auto px-4 md:px-10">
        
        <?php while ( have_posts() ) : the_post(); global $product; ?>
            
            <nav class="flex mb-8 text-[10px] uppercase tracking-[0.2em] text-brand-gray-400">
                <a href="<?php echo home_url(); ?>" class="hover:text-brand-black transition-colors">الرئيسية</a>
                <span class="mx-2">/</span>
                <span><?php the_title(); ?></span>
            </nav>

            <!-- ✅ FIXED: Added grid + grid-cols-12 -->
            <div class="grid grid-cols-1 md:grid-cols-2  gap-8 xl:gap-12">
                
                <!-- ✅ FIXED: Added lg:col-span-7 for image -->
                <div class=" space-y-4">

                    <?php
                       $main_id    = get_post_thumbnail_id( $product->get_id() );
                       $gallery_ids = $product->get_gallery_image_ids();
                       $all_images  = array_merge( [$main_id], $gallery_ids );
                       ?>

                       


                    <!-- Main display image -->
                    <div id="main-image-wrapper">
                        <?php echo wp_get_attachment_image( $all_images[0], 'full', false, [
                            'id'    => 'main-image',
                            'class' => 'w-full object-cover rounded-xl'
                        ]); ?>
                    </div>

                    <!-- // ✅ FIXED: Added product gallery images -->
                    <div  id="thumbnails-row" class="grid grid-cols-4 gap-2">
                        
                        <?php foreach ( $all_images as $ids) :?>
                             
                            <div>
                                <?php echo wp_get_attachment_image( $ids, 'thumbnail',false,  [
                                    'class' => 'w-full h-auto object-cover rounded-lg transition-all duration-300 cursor-pointer',
                                    'data-full' => wp_get_attachment_image_url( $ids, 'full' )
                                ]); ?>
                            </div>
                           
                        <?php endforeach; ?>

                    </div>
                </div>  
                
                <!-- ✅ FIXED: lg:col-span-5 wraps ALL product details -->
                <div class=" top-24 space-y-8">
                    
                    <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-brand-black uppercase leading-none">
                        <?php the_title(); ?>
                    </h1>
                    
                    <div class="text-2xl font-black text-brand-black">
                        <?php echo $product->get_price_html(); ?>
                    </div>

                    <div class="text-sm leading-relaxed text-brand-gray-500 max-w-md">
                        <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
                    </div>

                    <div class="space-y-4">
                        <div class="ana9a-checkout-form">
                            <?php 
                            include get_stylesheet_directory() . '/inc/intergrations/algeria-delivery/templates/single-product-checkout.php'; 
                            ?>                          
                        </div>
                    </div>

                </div> <!-- ✅ This closes lg:col-span-5 AFTER all content -->
                
            </div> <!-- ✅ This closes the grid container -->

            <?php
// 1. Get current product category IDs
$category_ids = wc_get_product_term_ids( $product->get_id(), 'product_cat' );

// 2. Query related products
$related_args = [
    'post_type'      => 'product',
    'posts_per_page' => 4,
    'post__not_in'   => [ get_the_ID() ],
    'tax_query'      => [
        [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $category_ids,
        ]
    ]
];

$related_query = new WP_Query( $related_args );
?>

<?php if ( $related_query->have_posts() ) : ?>

    <section class="mt-16">

        <h2 class=" text-center  font-bold uppercase tracking-widest mb-8 text-brand-black">
            منتجات ذات صلة
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            <?php while ( $related_query->have_posts() ) : $related_query->the_post(); 
                global $product; 
            ?>

              <?php get_template_part('template-parts/woocommerce/product-card'); ?>

            <?php endwhile; wp_reset_postdata(); ?>

        </div>

    </section>

<?php endif; ?>

        <?php endwhile; ?>
    </div>
</main>


<script>
    window.addEventListener('load', () => {
        
        const thumbs = document.querySelectorAll('#thumbnails-row img');
    
        console.log('thumbs found:', thumbs.length);
    
        thumbs.forEach((thumb) => {
                thumb.addEventListener('click', () => {
                        const fullUrl = thumb.getAttribute('data-full');
                        document.getElementById('main-image').src = fullUrl;

                        thumbs.forEach(t => t.classList.remove('ring-2', 'ring-black'));
                thumb.classList.add('ring-2', 'ring-black');
            })
        })

    })
    
    
</script>

    <?php get_footer(); ?>
