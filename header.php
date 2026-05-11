<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="image" href="<?php echo 
    get_template_directory_uri();?>/assets/img/heroImg.webp"
    fetchpriority="high">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-brand-gray-100">
    <div class="container-lux mx-auto px-4 py-4 flex items-center ">
        
        <div class="text-2xl font-black tracking-tighter flex-1">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                ANA9A<span class="text-brand-gray-500">.</span>
            </a>
        </div>

        <nav class="hidden lg:flex flex-1 justify-center ">
            <?php 
                wp_nav_menu([
                    'theme_location' => 'primary', // يجب أن يطابق الاسم المسجل في functions.php
                    'container'      => false,      // لإزالة أي div زائد
                    'menu_class'     => 'flex gap-6 text-[10px] uppercase font-bold tracking-[0.2em]', // كلاسات Tailwind
                ]); 
            ?>
        </nav>

        <div class="flex-1 flex justify-end gap-5">
            <button class="hover:opacity-50 transition-opacity">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </button>
            <a href="#" class="relative hover:opacity-50 transition-opacity">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <span class="absolute -top-1.5 -right-1.5 bg-black text-white text-[8px] w-4 h-4 rounded-full flex items-center justify-center">0</span>
            </a>
        </div>

    </div>
</header>