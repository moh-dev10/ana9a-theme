

<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    // استدعاء ملف hero.php من داخل مجلد template-parts/home/
    get_template_part( 'template-parts/home/hero' );
    // استدعاء قسم المنتجات الجديد
    get_template_part( 'template-parts/home/featured-products' );
    
    
    ?>

    
    </main>

<?php get_footer(); ?>