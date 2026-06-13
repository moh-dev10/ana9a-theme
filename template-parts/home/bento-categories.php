<?php
/**
 * Template part for displaying Categories dynamically using Bento Grid Layout
 * Theme: Ana9a - 100% Arabic Native Blueprint
 */
if (!defined('ABSPATH')) exit;

// جلب أقسام المنتجات التي تحتوي على منتجات ومجهزة بصور من لوحة التحكم
$product_categories = get_terms( array(
    'taxonomy'   => 'product_cat',
    'orderby'    => 'term_id',  // ← هذا فقط تبدله
    'order'      => 'ASC',
    'number'     => 4,
    'hide_empty' => false,
    'exclude'    => array( get_option('default_product_cat') ),
) );

$cta_labels = [
    'basket'   => __('شوف  لي باسكات', 'ana9a'),
    'sandals'  => __('شوف الصنادل', 'ana9a'),
    'blayegh'  => __('شوف البلايغ', 'ana9a'),
];

$cta_default = __('شوف الكوليكسيون', 'ana9a');

if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) :
?>

<section class="reveal-on-scroll section-lux container-lux mx-auto px-6 py-20" dir="rtl">
    
    <div class="mb-12 text-right reveal-on-scroll">
        <h2 class="text-[10px] uppercase tracking-[0.3rem] text-brand-gray-500 mb-2">
            <?php _e('تصفح مجموعاتنا', 'ana9a'); ?>
        </h2>
        <p class="text-3xl font-black tracking-tighter uppercase text-brand-black">
            <?php _e('تسوق حسب التصنيف', 'ana9a'); ?>
        </p>
    </div>

    <!-- Grid Container: استخدمنا فجوات صغيرة gap-4 ليعطي مظهر الـ Bento الحقيقي -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 md:grid-rows-2 gap-4 h-auto md:h-[640px]">
        
        <?php 
        $index = 0;
        foreach ( $product_categories as $category ) : 
            $category_link = get_term_link( $category );
            $thumbnail_id  = get_term_meta( $category->term_id, 'thumbnail_id', true );
            $image_url     = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : get_template_directory_uri() . '/assets/img/placeholder.webp';

            // توزيع الـ Grid كما صممته أنت، مع تعديل بسيط للـ responsiveness
            $grid_classes = match($index) {
                0 => 'md:col-span-2 md:row-span-2',
                1 => 'md:col-span-2 md:row-span-1',
                default => 'md:col-span-1 md:row-span-1',
            };        ?>
        
            <a href="<?php echo esc_url( $category_link ); ?>" 
               class="group relative overflow-hidden bg-brand-black rounded-3xl flex flex-col justify-end min-h-[250px] transition-all duration-500 <?php echo $grid_classes; ?> p-8">
                
                <!-- الصورة مع تأثير غامض عند الـ Hover -->
                <img src="<?php echo esc_url( $image_url ); ?>" 
                     alt="<?php echo esc_html( $category->name ); ?>" 
                     class="absolute inset-0 w-full h-full object-cover object-center opacity-70 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 ease-out"
                     loading="lazy">
                
                <!-- الـ Gradient الآن يتماشى مع اللون الأزرق الداكن brand-black -->
                <div class="absolute inset-0 bg-gradient-to-t from-brand-black/90 via-brand-black/20 to-transparent z-0"></div>
                
                <div class="relative z-10 text-right space-y-1">
                    <h3 class="text-2xl font-black text-brand-white">
                        <?php echo esc_html( $category->name ); ?>
                    </h3>
                    <span class="inline-flex items-center text-xs font-bold text-brand-gray-200 border-b border-brand-gray-500 pb-0.5 group-hover:border-brand-white transition-colors duration-300">
                        <?php echo esc_html( $cta_labels[$category->slug] ?? $cta_default ); ?>
                    </span>
                </div>
            </a>

        <?php 
            $index++;
        endforeach; 
        ?>
    </div>
</section>

<?php 
endif; 
?>