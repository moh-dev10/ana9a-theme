

<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    // استدعاء ملف hero.php من داخل مجلد template-parts/home/
    get_template_part( 'template-parts/home/hero' );
    
    // استدعاء ملف scrolling-ticker.php من داخل مجلد template-parts/home/
    get_template_part('template-parts/home/scrolling-ticker');

    get_template_part('template-parts/home/bento-categories');

    // استدعاء قسم السلايدر الخاص بالمنتجات
    get_template_part('template-parts/home/carousel-product');

    // استدعاء قسم المنتجات الجديد
    get_template_part( 'template-parts/home/featured-products' );

    // استدعاء قسم مميزات المتجر
    get_template_part('template-parts/home/store-features');

    
    
    ?>

    
    </main>

<?php get_footer(); ?>