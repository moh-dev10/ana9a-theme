<?php
/**
 * The template for displaying the footer (High Visibility Links & Socials)
 * Theme: Ana9a - 100% Arabic Native RTL Blueprint
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<footer class="bg-black text-white border-t border-neutral-900 pt-12 md:pt-16 pb-6" dir="rtl">
    <div class="max-w-[1440px] mx-auto px-6">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-8 gap-x-8 text-right pb-10 border-b border-neutral-900">
            
            <div class="space-y-4">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-xl font-black tracking-widest uppercase block text-white">
                    <?php bloginfo( 'name' ); ?>.
                </a>
                <p class="text-xs text-neutral-300 font-medium leading-relaxed max-w-[260px]">
                    <?php _e('وجهتك الأولى للأزياء والأحذية الفاخرة المصممة خصيصاً لتمنحك حضوراً استثنائياً يبرز تميزك الفريد.', 'ana9a'); ?>
                </p>
                
                <div class="flex items-center gap-4 pt-2">
                    <a href="#" class="text-neutral-400 hover:text-white transition-colors duration-300" aria-label="Instagram">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="#" class="text-neutral-400 hover:text-white transition-colors duration-300" aria-label="TikTok">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31.01 2.58.42 3.65 1.19.14.1.2.22.18.39a8.21 8.21 0 0 1-.18 2.21c-.06.21-.19.3-.41.22A5.4 5.4 0 0 1 13.5 3c-.15-.05-.22-.15-.22-.31V14.5a3.5 3.5 0 1 1-4.244-3.443.73.73 0 0 1 .844.62c.04.28.01.56-.09.82a2 2 0 1 0 2.24 1.983V.77c0-.26.15-.41.41-.41a8.4 8.4 0 0 0 1.1-.34H12.525z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-neutral-400 hover:text-white transition-colors duration-300" aria-label="Facebook">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="space-y-3">
                <h4 class="text-[11px] uppercase tracking-[0.15rem] text-white font-bold">
                    <?php _e('المتجر', 'ana9a'); ?>
                </h4>
                <ul class="space-y-2 text-xs font-semibold text-white">
                    <li><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="hover:text-white transition-colors duration-200 block"><?php _e('جميع المنتجات', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 transition-colors duration-200 block"><?php _e('التشكيلة الرجالية', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 transition-colors duration-200 block"><?php _e('الأزياء النسائية', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 transition-colors duration-200 block"><?php _e('الأحذية الفاخرة', 'ana9a'); ?></a></li>
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-[11px] uppercase tracking-[0.15rem] text-white font-bold">
                    <?php _e('المساعدة والسياسات', 'ana9a'); ?>
                </h4>
                <ul class="space-y-2 text-xs font-semibold text-white">
                    <li><a href="#" class="text-brand-gray-500 transition-colors duration-200 block"><?php _e('سياسة الاستبدال والاسترجاع', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 transition-colors duration-200 block"><?php _e('معلومات التوصيل لـ 58 ولاية', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 transition-colors duration-200 block"><?php _e('من نحن', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 transition-colors duration-200 block"><?php _e('اتصل بنا', 'ana9a'); ?></a></li>
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-[11px] uppercase tracking-[0.15rem] text-white font-bold">
                    <?php _e('خدمة الزبائن', 'ana9a'); ?>
                </h4>
                <ul class="space-y-2 text-xs font-semibold text-white">
                    <li class="flex items-center gap-2">
                        <span class="text-neutral-400"><?php _e('هاتف:', 'ana9a'); ?></span>
                        <a href="tel:+213XXXXXXXXX" class="text-white transition-colors tracking-wide" dir="ltr">+213 (0) XX XX XX XX</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-neutral-400"><?php _e('بريد:', 'ana9a'); ?></span>
                        <a href="mailto:support@ana9a.test" class="text-white transition-colors">support@ana9a.test</a>
                    </li>
                    <li class="pt-1 text-[11px] text-neutral-400 leading-relaxed font-medium">
                        <?php _e('فريقنا متواجد لخدمتكم طيلة أيام الأسبوع.', 'ana9a'); ?>
                    </li>
                </ul>
            </div>

        </div>

        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] font-medium text-neutral-400 text-center sm:text-right">
            
            <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">
                <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('جميع الحقوق محفوظة.', 'ana9a'); ?></span>
                <span class="hidden sm:inline text-neutral-800">|</span>
                <a href="https://github.com/moh-dev10" target="_blank" rel="noopener" class="text-neutral-300 hover:text-white transition-colors font-mono tracking-wider">
                    powered by moh-dev10
                </a>
            </div>
            
            <div class="flex items-center gap-2 bg-neutral-950 px-3.5 py-1.5 border border-neutral-900 rounded-xl text-neutral-300 select-none">
                <span class="text-[10px] font-bold uppercase tracking-wider text-white">
                    <?php _e('الدفع نقداً عند الاستلام', 'ana9a'); ?>
                </span>
            </div>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link rel="preload" as="image" href="<?php echo get_template_directory_uri();?>/assets/img/heroImg.webp" fetchpriority="high">
    <?php wp_head(); ?>
</head>

<?php 
// 1. جلب قيمة الصندوق للمنتج الحالي أولاً (لتفادي تحذير الـ Undefined variable)
$hide_header = function_exists('get_field') ? get_field('hide_header', get_the_ID()) : false; 

// 2. تجهيز كلاسات إضافية للـ body بناءً على الشرط لتصفير الفراغ بالـ CSS
$custom_body_classes = $hide_header ? 'no-header-active' : '';
?>

<body <?php body_class($custom_body_classes . ' animate-page'); ?>>
    <?php wp_body_open(); ?>

    <?php 
    // 3. إذا لم يتم تفعيل خيار الإخفاء، نقوم بعرض الهيدر والدروير بشكل طبيعي
    if ( ! $hide_header ) : 
    ?>
    
    <header class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-brand-gray-100">
        <div class="container-lux mx-auto px-4 py-4 flex items-center">

            <div class="flex-1 block lg:hidden z-[120]">
                <button id="mobile-menu-trigger" class="p-2 text-black focus:outline-none hover:opacity-50 transition-opacity" aria-label="Toggle Menu">
                    <svg class="w-6 h-6 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path id="line-top" class="transition-all duration-300 origin-center" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5" />
                        <path id="line-mid" class="transition-all duration-300 origin-center" stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5" />
                        <path id="line-bot" class="transition-all duration-300 origin-center" stroke-linecap="round" stroke-linejoin="round" d="M3.75 17.25h16.5" />
                    </svg>
                </button>
            </div>
            
            <div class="text-2xl font-black tracking-tighter flex-1">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    ANA9A<span class="text-brand-gray-500">.</span>
                </a>
            </div>

            <nav dir="rtl" class="hidden lg:flex flex-1 justify-center">
                <?php 
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'flex gap-6 text-[10px] uppercase font-bold tracking-[0.2em]',
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

        <div id="mobile-menu-drawer" class="fixed inset-0 h-screen w-full z-[110] invisible pointer-events-none transition-all duration-300" dir="rtl">
            
            <div id="mobile-menu-overlay" class="absolute inset-0 w-full h-full bg-black/40 opacity-0 transition-opacity duration-300"></div>
            
            <div id="mobile-menu-content" class="absolute top-0 right-0 w-full max-w-[85vw] h-full bg-white shadow-2xl pt-8 px-8 pb-10 flex flex-col justify-between translate-x-full transition-transform duration-300 ease-in-out z-10">
                
                <div class="w-full flex flex-col gap-10">
                    
                    <div class="text-2xl font-black tracking-tighter text-right pt-2 border-b border-gray-100 pb-4">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            ANA9A<span class="text-brand-gray-500">.</span>
                        </a>
                    </div>

                    <nav class="w-full">
                      <?php 
                          wp_nav_menu([
                              'theme_location' => 'primary',
                              'container'      => false,
                              'menu_class'     => 'flex flex-col gap-7 text-[16px] uppercase font-bold tracking-[0.15em] text-black w-full text-right list-none m-0 p-0', 
                              'fallback_cb'    => false,
                          ]); 
                      ?>
                    </nav>

                </div>

                <div class="w-full pt-6 border-t border-gray-100 flex flex-col gap-3">
                    <span class="text-[10px] uppercase font-bold tracking-[0.2em] text-gray-400 text-right">تابعنا على</span>
                    
                    <div class="flex gap-5 justify-start items-center text-black">
                        <a href="https://instagram.com/your_username" target="_blank" rel="noopener noreferrer" class="hover:opacity-50 transition-opacity" aria-label="Instagram">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 10.186 3h3.628a2.31 2.31 0 0 1 3.359 3.175V6.83c0 .568-.26 1.11-.707 1.456l-1.008.783A2.31 2.31 0 0 1 14.1 10.19h-4.2a2.31 2.31 0 0 1-1.358-1.121l-1.009-.783a1.82 1.82 0 0 1-.707-1.456V6.175Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 7.5h.008v.008H16.5V7.5Z" />
                                <rect width="18" height="18" x="3" y="3" rx="5" id="re" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>

                        <a href="https://facebook.com/your_username" target="_blank" rel="noopener noreferrer" class="hover:opacity-50 transition-opacity" aria-label="Facebook">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                            </svg>
                        </a>

                        <a href="https://tiktok.com/@your_username" target="_blank" rel="noopener noreferrer" class="hover:opacity-50 transition-opacity" aria-label="TikTok">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12a4 4 0 1 0 4 4V4h5v4h-5v8a4 4 0 0 0-4-4z"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </header>

<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const menuTrigger = document.getElementById('mobile-menu-trigger');
    const lineTop = document.getElementById('line-top');
    const lineMid = document.getElementById('line-mid');
    const lineBot = document.getElementById('line-bot');

    const drawer = document.getElementById('mobile-menu-drawer');
    const overlay = document.getElementById('mobile-menu-overlay');
    const content = document.getElementById('mobile-menu-content');

    if (menuTrigger && drawer && overlay && content) {
        let isMenuOpen = false;

        const openMenu = () => {
            drawer.classList.remove('invisible', 'pointer-events-none');
            
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
                content.classList.remove('translate-x-full');
                content.classList.add('translate-x-0');
            }, 10);

            lineTop.classList.add('translate-y-[5.25px]', 'rotate-45');
            lineMid.classList.add('opacity-0');
            lineBot.classList.add('-translate-y-[5.25px]', '-rotate-45');

            document.body.style.overflow = 'hidden';
            isMenuOpen = true;
        };

        const closeMenu = () => {
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
            content.classList.remove('translate-x-0');
            content.classList.add('translate-x-full');

            lineTop.classList.remove('translate-y-[5.25px]', 'rotate-45');
            lineMid.classList.remove('opacity-0');
            lineBot.classList.remove('-translate-y-[5.25px]', '-rotate-45');

            setTimeout(() => {
                drawer.classList.add('invisible', 'pointer-events-none');
            }, 300);

            document.body.style.overflow = '';
            isMenuOpen = false;
        };

        menuTrigger.addEventListener('click', () => {
            if (isMenuOpen) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        overlay.addEventListener('click', closeMenu);
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        root: null, // يراقب بالنسبة للشاشة كاملة
        rootMargin: '0px',
        threshold: 0.1 // يبدأ الأنيميشن أول ما يظهر 10% من العنصر
    };

    const scrollObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // إضافة كلاس الظهور
                entry.target.classList.add('is-visible');
                // وقف المراقبة للعنصر ده عشان الأنميشن ما يتكررش كل شوية
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // البحث عن أي عنصر في الصفحة يحمل كلاس reveal-on-scroll ومراقبته
    const elementsToReveal = document.querySelectorAll('.reveal-on-scroll');
    elementsToReveal.forEach(el => scrollObserver.observe(el));
});
</script>
</body>
</html>