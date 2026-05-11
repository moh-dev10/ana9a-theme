
<section class="relative w-full min-h-[85vh] md:min-h-screen flex items-center justify-start overflow-hidden bg-white ">
    
    <div class="absolute inset-0 z-0">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/heroImg.webp')?>"
         alt="Hero Image"
         fetchpriority="high"
         loading="eager"
         decoding="async"
         width="1920"
         hight="1080"
         class="w-full h-full object-cover object-center grayscale opacity-50"
         >
         <div class="absolute inset-0 bg-white/20"></div>
        </div>

        <!-- content -->

        <div class="container-lux relative z-10 w-full px-6 md:px-12">
            <div class="max-w-4xl space-y-12">

                   <header class="space-y-6">
                       <div class="flex items-center gap-4 ">
                           <span class="w-10 h-px bg-brand-black"></span>
                           <span class="text-xs md:text-sm uppercase tracking-[0.3em] font-bold text-brand-gray-500">
                               <?php _e('New Collection 2026', 'ana9a');?>
                              </span>
                        </div>
    
                        <h1 class="hero-title letter-spacing-[-0.2em]
                         animate-reveal">
                            <?php 
                            printf(
                                __('Elevate Your <span class="%s">Style</span>', 'ana9a'),
                                'text-outline-black tracking-tightest text-transparent'
                                 );
                                ?>
                        </h1>
                        <p class="text-lg text-brand-gray-600 animate-reveal delay-250">
                            Discover the perfect pieces to elevate your style and express your unique personality.
                        </p>
    
                        <!-- Button -->

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-6 animate-reveal delay-500">
                           <a href="#" class="btn-primary w-full sm:w-auto group">
                               <span><?php _e('Shop Now', 'ana9a'); ?></span>
                                  <svg class="w-4 h-4 transition-transform duration-500 group-hover:translate-x-2 ms-2" 
                                       fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                  </svg>
                           </a>
                           <a href="#" class="btn-secondary w-full sm:w-auto">
                               <?php _e('Explore Collection', 'ana9a'); ?>
                           </a>
                          </div>
                   </header>
            </div>
        </div>

</section>
