<section class="relative w-full min-h-[85vh] md:min-h-screen flex items-center overflow-hidden" dir="rtl">
    
    <div class="absolute inset-0 z-0">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero1.webp')?>"
             alt="ولد الروجي شوز"
             fetchpriority="high"
             loading="eager"
             decoding="async"
             width="1920"
             height="1080"
             class="w-full h-full object-cover object-center">
        
        {{-- موبايل: overlay داكن كامل --}}
        <!-- احذف الـ div ديال ديسكتوب وخلي overlay واحد لكل الشاشات -->
<div class="absolute inset-0 bg-brand-black/55"></div>
        
        {{-- ديسكتوب: gradient من اليمين --}}
        <div class="absolute inset-0 hidden md:block bg-gradient-to-l from-brand-white via-brand-black/85 to-brand-white/10"></div>
    </div>

    <div class="container-lux relative z-10  w-full px-6 md:px-12 text-right">
        <div class="max-w-2xl  flex flex-col  space-y-8">

            <header class="space-y-5 ">

                <div class="flex items-center gap-4 justify-start">
                    <span class="w-10 h-px bg-brand-black  md:bg-brand-black"></span>
                    <span class="text-xs uppercase tracking-[0.3em] font-bold text-brand-white md:text-brand-gray-500">
                        <?php _e('كوليكسيون 2026', 'ana9a'); ?>
                    </span>
                </div>

                <h1 class="hero-title tracking-tighter animate-reveal leading-[1.05]
                           text-brand-white md:text-brand-black
                           text-4xl sm:text-5xl lg:text-7xl">
                    <?php _e('باسكات، صنادل،', 'ana9a'); ?><br>
                    <?php _e('بلايغ — كلشي هنا.', 'ana9a'); ?>
                </h1>

                <p class="text-sm md:text-base animate-reveal delay-250 leading-relaxed max-w-md
                          text-brand-white/80 md:text-brand-gray-500">
                    <?php _e('توصيل لـ 58 ولاية. دفع عند الاستلام. بلا تعقيد.', 'ana9a'); ?>
                </p>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2 animate-reveal delay-500 justify-start">
                    
                    <a href="<?php echo esc_url( home_url('/shop/') ); ?>" 
                       class="btn-primary w-full sm:w-auto group inline-flex items-center justify-center rounded-2xl">
                        <span><?php _e('تسوق الآن', 'ana9a'); ?></span>
                        <svg class="w-4 h-4 transition-transform duration-500 group-hover:-translate-x-2 me-3" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m7 7l-7-7 7-7"/>
                        </svg>
                    </a>

                    <a href="<?php echo esc_url( home_url('/collections/') ); ?>" 
                       class="btn-secondary w-full sm:w-auto text-center shadow-none rounded-2xl
                              border-brand-white/40 text-brand-white md:border-brand-gray-200 md:text-brand-black">
                        <?php _e('شوف الكوليكسيون', 'ana9a'); ?>
                    </a>

                </div>
            </header>

            <div class="flex items-center gap-6 pt-6 border-t border-brand-white/20 md:border-brand-gray-100 animate-reveal delay-700">
                <div class="text-center">
                    <p class="text-2xl font-black text-brand-white md:text-brand-black">58</p>
                    <p class="text-[10px] uppercase tracking-widest text-brand-white/60 md:text-brand-gray-500">
                        <?php _e('ولاية', 'ana9a'); ?>
                    </p>
                </div>
                <div class="w-px h-8 bg-brand-white/20 md:bg-brand-gray-100"></div>
                <div class="text-center">
                    <p class="text-2xl font-black text-brand-white md:text-brand-black">100%</p>
                    <p class="text-[10px] uppercase tracking-widest text-brand-white/60 md:text-brand-gray-500">
                        <?php _e('دفع عند الاستلام', 'ana9a'); ?>
                    </p>
                </div>
                <div class="w-px h-8 bg-brand-white/20 md:bg-brand-gray-100"></div>
                <div class="text-center">
                    <p class="text-2xl font-black text-brand-white md:text-brand-black">+500</p>
                    <p class="text-[10px] uppercase tracking-widest text-brand-white/60 md:text-brand-gray-500">
                        <?php _e('زبون راضي', 'ana9a'); ?>
                    </p>
                </div>
            </div>

        </div>
    </div>

</section>