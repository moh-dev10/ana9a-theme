<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <meta name="description" content="متجر أناقة - اكتشف القطع المثالية التي تمنحك حضوراً استثنائياً وتعبر عن تميزك الفريد.">  
    <link rel="preload" as="image" href="<?php echo get_template_directory_uri();?>/assets/img/heroImg.webp" fetchpriority="high">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>

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
$hide_header = function_exists('get_field') ? get_field('hide_header', get_the_ID()) : false; 
$custom_body_classes = $hide_header ? 'no-header-active' : '';
$final_body_classes = trim($custom_body_classes . ' animate-page');
?>

<body <?php body_class($final_body_classes); ?>>
    <?php wp_body_open(); ?>

    <?php if ( ! $hide_header ) : ?>
    
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
                <button class="hover:opacity-50 transition-opacity" aria-label="بحث">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
                <a href="#" class="relative hover:opacity-50 transition-opacity" aria-label="السلة">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span class="absolute -top-1.5 -right-1.5 bg-black text-white text-[8px] w-4 h-4 rounded-full flex items-center justify-center">0</span>
                </a>
            </div>

        </div>

        <div id="mobile-menu-drawer" class="fixed inset-0 h-screen w-full z-[110] invisible pointer-events-none transition-all duration-300" dir="rtl">
            <div id="mobile-menu-overlay" class="absolute inset-0 w-full h-full bg-black/40 opacity-0 transition-opacity duration-300"></div>
            
            <div id="mobile-menu-content" class="absolute top-0 left-0 w-full max-w-[85vw] h-full bg-white shadow-2xl pt-8 px-8 pb-10 flex flex-col justify-between -translate-x-full transition-transform duration-300 ease-in-out z-10">
                
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

    <?php endif; ?> <script>
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
                content.classList.remove('-translate-x-full');
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
            content.classList.add('-translate-x-full');

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
</script>