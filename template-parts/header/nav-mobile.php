<?php
/**
 * Mobile Menu Template Part
 */
?>
<!-- 📱 منيو الموبايل المنسدل الفخم (هنا وضعنا الـ h-screen والـ backdrop-blur) -->
<div 
    x-show="mobileMenuOpen" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-x-full" 
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-full"
    x-cloak
    class="fixed top-0 left-0 w-full h-screen bg-white backdrop-blur-2xl shadow-2xl lg:hidden z-[99999] flex flex-col justify-between p-8"
    dir="rtl"
>
    <!-- توب منيو الموبايل -->
    <div class="flex items-center justify-between border-b border-neutral-100 pb-6">
        <div class="text-2xl font-black tracking-tighter text-brand-black">
            <?php echo esc_html(get_bloginfo('name')); ?><span class="text-brand-gray-500">.</span>
        </div>
        
        <button 
            @click="mobileMenuOpen = false" 
            class="p-2 text-brand-black hover:opacity-50  focus:outline-none cursor-pointer transition-transform duration-300 hover:rotate-90"
            aria-label="إغلاق القائمة"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- روابط منيو الموبايل -->
    <nav class="flex-1 flex flex-col justify-center py-12">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'flex flex-col gap-6 text-xl uppercase font-extrabold tracking-[0.1em] list-none m-0 p-0 text-right text-black divide-y divide-neutral-50',
        ]);
        ?>
    </nav>

    <!-- معلومات التواصل السفلية -->
    <div class="border-t border-neutral-100 pt-6 space-y-4">
        <div class="space-y-1.5 text-right">
            <p class="text-[10px] uppercase font-bold tracking-widest text-brand-gray-500">تحتاج مساعدة؟</p>
            <a href="tel:+213555555555" class="block text-sm font-bold text-brand-black tracking-wide" dir="ltr">+213 (0) 555 55 55 55</a>
            <a href="mailto:support@ana9a.test" class="block text-xs font-medium text-brand-gray-500">support@ana9a.test</a>
        </div>

        <div class="flex items-center gap-5 pt-2 justify-start">
            <a href="#" class="text-brand-black hover:opacity-50 transition-opacity" aria-label="Instagram">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.5" y1="6.5" y2="6.5"></line></svg>
            </a>
            <a href="#" class="text-black hover:opacity-50 transition-opacity" aria-label="TikTok">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31.01 2.58.42 3.65 1.19.14.1.2.22.18.39a8.21 8.21 0 0 1-.18 2.21c-.06.21-.19.3-.41.22A5.4 5.4 0 0 1 13.5 3c-.15-.05-.22-.15-.22-.31V14.5a3.5 3.5 0 1 1-4.244-3.443.73.73 0 0 1 .844.62c.04.28.01.56-.09.82a2 2 0 1 0 2.24 1.983V.77c0-.26.15-.41.41-.41a8.4 8.4 0 0 0 1.1-.34H12.525z"/></svg>
            </a>
        </div>
    </div>
</div>