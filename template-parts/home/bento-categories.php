<?php
/**
 * Template part for displaying Categories dynamically using Bento Grid Layout
 * Theme: Ana9a - 100% Arabic Native Blueprint
 */
if (!defined('ABSPATH')) exit;

// جلب أقسام المنتجات التي تحتوي على منتجات ومجهزة بصور من لوحة التحكم
$product_categories = get_terms( array(
    'taxonomy'     => 'product_cat',
    'orderby'      => 'count',
    'order'        => 'DESC',
    'number'       => 4, // جلب أول 4 تصنيفات فقط لبناء شبكة البينتو
    'hide_empty'   => false, // اجعلها true إذا كنت تريد إخفاء الأقسام الفارغة
) );

if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) :
?>

<section class="reveal-on-scroll section-lux container-lux mx-auto px-6 py-20" dir="rtl">
    
    <div class="mb-12 text-right reveal-on-scroll">
        <h2 class="text-[10px] uppercase tracking-[0.3rem] text-brand-gray-500 mb-2">
            <?php _e('تصفح مجموعاتنا', 'ana9a'); ?>
        </h2>
        <p class="text-3xl font-bold tracking-tighter uppercase text-gray-900">
            <?php _e('تسوق حسب التصنيف', 'ana9a'); ?>
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 md:grid-rows-2 gap-4 h-auto md:h-[640px]">
        
        <?php 
        $index = 0;
        foreach ( $product_categories as $category ) : 
            $category_link = get_term_link( $category );
            
            // جلب معرف الصورة المصغرة للتصنيف المرفوعة من قبل صاحب الموقع
            $thumbnail_id  = get_term_meta( $category->term_id, 'thumbnail_id', true );
            
            // إذا كان صاحب الموقع لم يرفع صورة، نضع صورة افتراضية (Fallback) لمنع انهيار التصميم
            if ( $thumbnail_id ) {
                $image_url = wp_get_attachment_url( $thumbnail_id );
            } else {
                $image_url = get_template_directory_uri() . '/assets/img/placeholder.webp'; 
            }

            /**
                      * إدارة توزيع البينتو هندسياً بناءً على الترتيب (Index):
             * الكارت الأول (Index 0) -> يأخذ مساحة كبرى (md:col-span-2 md:row-span-2)
             * الكارت الثاني (Index 1) -> يأخذ مساحة عرضية (md:col-span-2 md:row-span-1)
             * الكارت الثالث والرابع (Index 2 & 3) -> يأخذان مساحة مربعة عادية (md:col-span-1)
             */
            $grid_classes = 'md:col-span-2 md:row-span-2 min-h-[320px]'; // الافتراضي للأول
            $padding_class = 'p-8';
            $title_size = 'text-2xl';

            if ( $index === 1 ) {
                $grid_classes = 'md:col-span-2 md:row-span-1 min-h-[200px]';
                $title_size = 'text-xl';
            } elseif ( $index > 1 ) {
                $grid_classes = 'md:col-span-1 md:row-span-1 min-h-[200px]';
                $padding_class = 'p-6';
                $title_size = 'text-lg';
            }
        ?>
        
            <a href="<?php echo esc_url( $category_link ); ?>" class="group relative overflow-hidden bg-gray-100 rounded-3xl flex flex-col justify-end md:min-h-full transition-all duration-300 <?php echo $grid_classes . ' ' . $padding_class; ?>">
                
                <img src="<?php echo esc_url( $image_url ); ?>" 
                     alt="<?php echo esc_html( $category->name ); ?>" 
                     class="absolute inset-0 w-full h-full object-cover object-center grayscale opacity-85 group-hover:scale-105 group-hover:grayscale-0 transition-all duration-700 ease-out"
                     loading="lazy">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent z-0"></div>
                
                <div class="relative z-10 text-right space-y-1.5">
                    <h3 class="<?php echo $title_size; ?> font-black text-white">
                        <?php echo esc_html( $category->name ); ?>
                    </h3>
                    <span class="inline-flex items-center text-xs font-bold text-white/80 border-b border-white/40 pb-0.5 group-hover:border-white transition-colors">
                        <?php _e('اكتشف التشكيلة', 'ana9a'); ?>
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