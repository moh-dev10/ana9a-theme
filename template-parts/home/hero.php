<section class="relative w-full min-h-[85vh] md:min-h-screen flex items-center justify-start overflow-hidden bg-white" dir="rtl">
    
    <div class="absolute inset-0 z-0 ">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/heroImg.webp')?>"
         alt="تشكيلة أناقة"
         fetchpriority="high"
         loading="eager"
         decoding="async"
         width="1920"
         height="1080"
         class="w-full h-full object-cover object-center grayscale opacity-50"
         >
         <div class="absolute inset-0 bg-white/20"></div>
    </div>

    <div class="container-lux relative z-10 w-full px-6 md:px-12 text-right">
        <div class="max-w-4xl space-y-12">

            <header class="space-y-6">
                
                <div class="flex items-center gap-4 justify-start">
                    <span class="w-10 h-px bg-brand-black"></span>
                    <span class="text-xs md:text-sm uppercase tracking-[0.3em] font-bold text-brand-gray-500">
                        <?php _e('التشكيلة الجديدة 2026', 'ana9a');?>
                    </span>
                </div>
    
                <h1 class="hero-title tracking-tight animate-reveal leading-[1.1] text-brand-black">
                    <?php 
                    printf(
                        __('ارتقِ بأسلوبك <span class="%s">الخاص</span>', 'ana9a'),
                        'text-outline-black tracking-tightest text-transparent'
                    );
                    ?>
                </h1>

                <p class="text-lg text-brand-gray-800 animate-reveal delay-250 leading-relaxed max-w-2xl">
                    <?php _e('اكتشف القطع المثالية التي تمنحك حضوراً استثنائياً وتعبر عن تميزك الفريد وحضورك الأنيق.', 'ana9a'); ?>
                </p>
    
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-6 animate-reveal delay-500 justify-start">
                    
                    <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="btn-primary w-full sm:w-auto group inline-flex items-center justify-center">
                        <span><?php _e('تسوق الآن', 'ana9a'); ?></span>
                        <svg class="w-4 h-4 transition-transform duration-500 group-hover:-translate-x-2 me-3" 
                             fill="none" 
                             stroke="currentColor" 
                             viewBox="0 0 24 24" 
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m7 7l-7-7 7-7"/>
                        </svg>
                    </a>

                    <a href="<?php echo esc_url( home_url( '/collections/' ) ); ?>" class="btn-secondary w-full sm:w-auto text-center shadow-none">
                        <?php _e('استكشاف التشكيلة', 'ana9a'); ?>
                    </a>

                </div>
            </header>
        </div>
    </div>

</section>