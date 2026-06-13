<?php
/**
 * Template Name: Collections Template
 * Theme: Ana9a (Tailwind v4 Blueprint)
 */

get_header(); ?>

<main dir="rtl" class="max-w-[1440px] mx-auto px-6 py-12 md:py-20 animate-fade-in">
    
    <header class="mb-16">
        <span class="text-[11px] font-black tracking-widest uppercase bg-brand-black text-brand-white px-3 py-1 rounded-full">استكشف التشكيلات</span>
        <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter text-brand-black mt-6">مجموعات الموسم</h1>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <?php
        // إعداد المعايير لجلب تصنيفات المنتجات
        $terms = get_terms( array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false, // إخفاء التصنيفات الفارغة
            'orderby'    => 'count',
            'order'      => 'DESC'
        ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                // الحصول على صورة التصنيف (WooCommerce Category Image)
                $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                $image = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : get_template_directory_uri() . '/assets/images/placeholder.jpg';
                $link = get_term_link( $term );
                ?>
                
                <div class="group relative overflow-hidden rounded-3xl aspect-[4/5] bg-brand-gray-100">
                    <img src="<?php echo esc_url( $image ); ?>" 
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" 
                         alt="<?php echo esc_attr( $term->name ); ?>">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-black/80 to-transparent"></div>
                    
                    <div class="absolute bottom-0 p-8 w-full">
                        <h2 class="text-2xl font-black text-white mb-4"><?php echo esc_html( $term->name ); ?></h2>
                        <a href="<?php echo esc_url( $link ); ?>" 
                           class="inline-block bg-brand-white text-brand-black px-6 py-3 rounded-xl text-[11px] font-black uppercase tracking-widest hover:bg-brand-gray-200 transition-colors">
                           تصفح المجموعة
                        </a>
                    </div>
                </div>
                
                <?php
            }
        } else {
            echo '<p class="text-brand-gray-400">لا توجد تصنيفات لعرضها حالياً.</p>';
        }
        ?>

    </div>
</main>

<?php get_footer(); ?>