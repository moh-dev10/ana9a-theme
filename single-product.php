<?php get_header(); ?>



<main class="bg-white min-h-screen py-8 md:py-16" dir="rtl">

    <div class="max-w-[1200px] mx-auto px-4 md:px-6">

       

        <?php while ( have_posts() ) : the_post(); global $product; ?>

           

            <nav class="flex mb-8 text-[10px] uppercase tracking-[0.2em] text-brand-gray-500">

                <a href="<?php echo home_url(); ?>" class="hover:text-brand-black transition-colors">الرئيسية</a>

                <span class="mx-2">/</span>

                <span><?php the_title(); ?></span>

            </nav>

           

                <?php

                 // ووردبريس يوفر دالة wp_is_mobile() لاكتشاف الموبايل

                 if ( wp_is_mobile() ) : ?>

                     <div class="mb-2">

                         <h1 class="text-3xl font-bold text-brand-black uppercase"><?php the_title(); ?></h1>

                         <div class="product-description text-sm text-brand-gray-500 leading-relaxed my-6" dir="rtl">

                             <?php

                             // جلب محتوى المنتج (الوصف الكامل) وتمريره عبر فلاتر ووردبريس لضمان التنسيق الصحيح

                             echo apply_filters( 'the_content', get_the_content() );

                             ?>

                         </div>

                         <div class="text-2xl font-black product-price-wrapper"><?php echo $product->get_price_html(); ?></div>

                     </div>

                 <?php endif; ?>

                 

            <div class="grid grid-cols-1 md:grid-cols-2  gap-8 xl:gap-12 ">

               

                <div class=" space-y-4">



                    <?php

                       $main_id    = get_post_thumbnail_id( $product->get_id() );

                       $gallery_ids = $product->get_gallery_image_ids();

                       $all_images  = array_merge( [$main_id], $gallery_ids );

                       ?>



                    <div id="main-image-wrapper" class="relative w-full aspect-4/5 md:aspect-1/1 overflow-hidden rounded-lg bg-gray-50" >        

                        <?php echo wp_get_attachment_image( $all_images[0], 'full', false, [

                            'id'    => 'main-image',

                            'class' => 'absolute inset-0 w-full h-full object-cover block'

                        ]); ?>

                    </div>



                    <div id="thumbnails-row" class="grid grid-cols-4 gap-2 mt-4">

                        <?php

                        $index = 0;

                        foreach ( $all_images as $ids ) :

                            ?>

                            <div class="thumb-wrapper aspect-square overflow-hidden rounded-lg">

                                <?php echo wp_get_attachment_image( $ids, 'thumbnail', false, [

                                    'class'      => 'thumb-img w-full h-full object-cover rounded-lg  border-4 border-transparent transition-all duration-300 ease-in-out cursor-pointer hover:opacity-80',

                                    'data-full'  => wp_get_attachment_image_url( $ids, 'full' ),

                                    'data-index' => $index // معرف فريد لكل صورة

                                ]); ?>

                            </div>

                            <?php

                            $index++;

                        endforeach;

                        ?>

                    </div>

                </div>  

               

                <div class=" top-24 space-y-8">

                 

                <?php if ( !wp_is_mobile() ) : ?>

                    <div class="mb-6 space-y-4">

                        <h1 class="text-3xl  md:text-4xl font-bold tracking-tight text-brand-black uppercase leading-none">

                            <?php the_title(); ?>

                        </h1>

                        <div class="product-description text-sm text-brand-gray-500 leading-relaxed my-6" dir="rtl">

                             <?php

                             // جلب محتوى المنتج (الوصف الكامل) وتمريره عبر فلاتر ووردبريس لضمان التنسيق الصحيح

                             echo apply_filters( 'the_content', get_the_content() );

                             ?>

                         </div>

                       

                        <div class="text-2xl font-black text-brand-black product-price-wrapper" >

                            <?php echo $product->get_price_html(); ?>

                        </div>

                    </div>

                <?php endif; ?>



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



                </div> </div> <?php

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



                <section class="space-y-6 mt-16">



                    <h2 class="reveal-on-scroll text-center text-3xl font-sans font-black  mb-8 ">

                        منتجات ذات صلة

                    </h2>



                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">



                        <?php while ( $related_query->have_posts() ) : $related_query->the_post();

                            global $product;

                        ?>

                         

                          <?php

                           echo '<div class="reveal-on-scroll">';

                           get_template_part('template-parts/woocommerce/product-card');

                           echo '</div>';

                          ?>

                        <?php endwhile; wp_reset_postdata(); ?>



                    </div>



                </section>



            <?php endif; ?>



        <?php endwhile; ?>

    </div>



    <div x-data="{

        stickyVisible: false,

        stickyQty: 1

     }"

     x-init="

        window.addEventListener('scroll', () => {

            const mainForm = document.querySelector('.main-order-form');

            if(mainForm) {

                const rect = mainForm.getBoundingClientRect();

                stickyVisible = rect.bottom < 0;

            }

        });

     "

     x-show="stickyVisible"

     x-transition:enter="transition ease-out duration-300 transform"

     x-transition:enter-start="translate-y-full"

     x-transition:enter-end="translate-y-0"

     x-transition:leave="transition ease-in duration-200 transform"

     x-transition:leave-start="translate-y-0"

     x-transition:leave-end="translate-y-full"

     class="fixed bottom-0 left-0 w-full z-50 bg-brand-white border-t border-brand-gray-100 p-4 shadow-[0_-8px_30px_rgb(0,0,0,0.06)] lg:hidden"

     dir="rtl">



    <div class="flex items-center justify-between gap-3 w-full max-w-full">

       

       



        <button @click="

                    const mainQtyInput = document.querySelector('.main-order-form input[name=\'quantity\']');

                    if(mainQtyInput) mainQtyInput.value = stickyQty;

                    document.querySelector('.main-order-form').submit();

                "

                type="button"

                class="flex-1 bg-white backdrop-blur-3xl text-brand-black h-14 border-t-2 rounded-full border-brand-black hover:border-white font-black text-xl md:text-base flex items-center

                justify-center gap-2 active:scale-[0.98] transition-all hover:bg-brand-black/90 hover:text-white cursor-pointer box-border">

            <span>اطلب الآن</span>

            <span class="text-xs font-normal opacity-70 border-r border-brand-white/20 pr-2 mr-1">

                <?php echo $product->get_price_html(); ?>

            </span>

        </button>



    </div>

</div>

</main>



<script>

document.addEventListener('DOMContentLoaded', () => {

    const thumbnailsRow = document.getElementById('thumbnails-row');

    const mainImage = document.getElementById('main-image');



    if (!thumbnailsRow || !mainImage) return;



    const thumbs = thumbnailsRow.querySelectorAll('.thumb-img');

    // كلاسات البوردر والـ Ring المتناسقة مع هويتك البصرية

    const activeClasses = ['border-brand-black', 'ring-2', 'ring-brand-black/20'];



    // دالة لتحديث البوردر بصرياً

    function setActiveThumbnail(activeThumb) {

        thumbs.forEach(img => {

            img.classList.remove(...activeClasses);

            img.classList.add('border-transparent');

        });

        activeThumb.classList.remove('border-transparent');

        activeThumb.classList.add(...activeClasses);

    }



    // 1. تفعيل البوردر على الصورة الأولى فور تحميل الصفحة

    if (thumbs.length > 0) {

        setActiveThumbnail(thumbs[0]);

    }



    // 2. معالج حدث الضغط على الصور المصغرة

    thumbnailsRow.addEventListener('click', (e) => {

        const target = e.target.closest('.thumb-img');

        if (!target) return;



        const newSrc = target.getAttribute('data-full');

        if (!newSrc) return;



        // تغيير الصورة الرئيسية

        mainImage.removeAttribute('srcset');

        mainImage.src = newSrc;



        // تحديث البوردر

        setActiveThumbnail(target);



        // تأثير Fade ناعم جداً عند الانتقال

        mainImage.classList.add('opacity-70');

        setTimeout(() => mainImage.classList.remove('opacity-70'), 150);

    });



    // 3. ذكاء اصطناعي محلي (MutationObserver): لمراقبة تغيير الصورة الرئيسية

    // إذا قام المستخدم بتغيير اللون (Noir / Blanc) من أزرار الووكومرس المخصصة

    const observer = new MutationObserver((mutations) => {

        mutations.forEach((mutation) => {

            if (mutation.attributeName === 'src') {

                const currentMainSrc = mainImage.getAttribute('src');

                thumbs.forEach(thumb => {

                    if (thumb.getAttribute('data-full') === currentMainSrc) {

                        setActiveThumbnail(thumb);

                    }

                });

            }

        });

    });



    observer.observe(mainImage, { attributes: true });

});

</script>



<?php get_footer(); ?>