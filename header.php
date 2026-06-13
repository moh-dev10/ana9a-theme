<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="متجر أناقة - اكتشف القطع المثالية التي تمنحك حضوراً استثنائياً وتعبر عن تميزك الفريد.">
    <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/img/heroImg.webp" fetchpriority="high">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>


    <style>
    /* هاد الكود هو اللي يخلي alpine يخدم مليح مع x-cloak */
    [x-cloak] {
        display: none !important;
    }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
    (function() {
        var supportsPassive = false;
        try {
            var opts = Object.defineProperty({}, 'passive', {
                get: function() { supportsPassive = true; }
            });
            window.addEventListener("testPassive", null, opts);
            window.removeEventListener("testPassive", null, opts);
        } catch (e) {}

        var originalAddEventListener = EventTarget.prototype.addEventListener;
        EventTarget.prototype.addEventListener = function(type, listener, options) {
            var argOptions = options;
            if (supportsPassive && (type === 'touchstart' || type === 'touchmove' || type === 'mousewheel' || type === 'wheel')) {
                if (typeof argOptions === 'undefined') {
                    argOptions = { passive: true };
                } else if (typeof argOptions === 'boolean') {
                    argOptions = { capture: argOptions, passive: true };
                } else if (typeof argOptions === 'object' && typeof argOptions.passive === 'undefined') {
                    argOptions.passive = true;
                }
            }
            return originalAddEventListener.call(this, type, listener, argOptions);
        };
    })();
    </script>
</head>

<?php
$hide_header         = function_exists('get_field') ? get_field('hide_header', get_the_ID()) : false;
$custom_body_classes = $hide_header ? 'no-header-active' : '';
$final_body_classes  = trim($custom_body_classes . ' animate-page '); 
?>

<body <?php body_class($final_body_classes); ?>>
    <?php wp_body_open(); ?>

    <?php if ( ! $hide_header ) : ?>

    <!-- ⚡ الـ Header هنا يرجع h-auto وبدون بلور افتراضي لكي لا يغطي الصفحة ⚡ -->
    <header 
        x-data="{ mobileMenuOpen: false }" 
        x-cloak
        class="sticky top-0 left-0 w-full z-50 bg-white/90 border-b border-brand-gray-100"
    >
        <!-- شريط التنقل العلوي النظيف -->
        <div class="container-lux mx-auto px-4 py-4 grid  grid-cols-3 items-center">

            <!-- زر الهامبرغر للموبايل -->
            <div class="flex-1 flex lg:hidden justify-start">
                <button 
                    @click="mobileMenuOpen = !mobileMenuOpen" 
                    class="p-2 text-black hover:opacity-60 focus:outline-none cursor-pointer"
                    aria-label="قائمة التحكم"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- اللوغو -->
            <div class="flex justify-start text-lg md:text-2xl lg:text-3xl font-black tracking-tighter flex-1 lg:flex-initial text-center lg:text-right leading-none">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:opacity-80 transition-opacity">
                    <?php
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        echo esc_html(get_bloginfo('name')) . '<span class="text-brand-gray-500">.</span>';
                    }
                    ?>
                </a>
            </div>

            <!-- منيو الديسكتوب -->
            <nav dir="rtl" class="hidden lg:flex justify-center col-span-3 lg:col-span-1   mt-4 lg:mt-0">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex gap-6 text-sm uppercase font-bold tracking-[0.2em] list-none m-0 p-0',
                ]);
                ?>
            </nav>

            <!-- الأيقونات الجانبية -->
            <div class="flex-1 flex justify-end gap-5">
                <button class="hover:opacity-50 transition-opacity cursor-pointer" aria-label="بحث">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
                <a href="#" class="relative hover:opacity-50 transition-opacity" aria-label="السلة">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span class="absolute -top-1.5 -right-1.5 bg-black text-white text-[8px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
                </a>
            </div>

        </div> <!-- نهاية الـ container-lux -->

        <?php get_template_part('template-parts/header/nav-mobile'); ?>
        
    </header>

    <?php endif; ?>