<?php
/**
 * The template for displaying the footer (High Visibility Links & Socials)
 * Theme: Ana9a - 100% Arabic Native RTL Blueprint
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<footer class="bg-brand-black text-white border-t border-brand-gray-800 pt-12 md:pt-16 pb-6" dir="rtl">
    <div class="max-w-[1440px] mx-auto px-6">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-8 gap-x-8 text-right pb-10 border-b border-brand-gray-800">
            
            <div class="space-y-4">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-xl font-black tracking-widest uppercase block text-white">
                    <?php bloginfo( 'name' ); ?>.
                </a>
                <p class="text-xs text-brand-gray-300 font-medium leading-relaxed max-w-[260px]">
                    <?php _e('وجهتك الأولى للأزياء والأحذية الفاخرة المصممة خصيصاً لتمنحك حضوراً استثنائياً يبرز تميزك الفريد.', 'ana9a'); ?>
                </p>
                
                <div class="flex items-center gap-4 pt-2">
                    <a href="#" class="text-brand-gray-400 hover:text-white transition-colors duration-300" aria-label="Instagram">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg>
                    </a>
                    <a href="#" class="text-brand-gray-400 hover:text-white transition-colors duration-300" aria-label="TikTok">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31.01 2.58.42 3.65 1.19.14.1.2.22.18.39a8.21 8.21 0 0 1-.18 2.21c-.06.21-.19.3-.41.22A5.4 5.4 0 0 1 13.5 3c-.15-.05-.22-.15-.22-.31V14.5a3.5 3.5 0 1 1-4.244-3.443.73.73 0 0 1 .844.62c.04.28.01.56-.09.82a2 2 0 1 0 2.24 1.983V.77c0-.26.15-.41.41-.41a8.4 8.4 0 0 0 1.1-.34H12.525z"/></svg>
                    </a>
                    <a href="#" class="text-brand-gray-400 hover:text-white transition-colors duration-300" aria-label="Facebook">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                </div>
            </div>

            <div class="space-y-3">
                <h4 class="text-[11px] uppercase tracking-[0.15rem] text-white font-bold"><?php _e('المتجر', 'ana9a'); ?></h4>
                <ul class="space-y-2 text-xs font-semibold text-white">
                    <li><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="text-brand-gray-500 hover:text-brand-white transition-colors duration-200 block"><?php _e('جميع المنتجات', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 hover:text-brand-white transition-colors duration-200 block"><?php _e('التتشكيلة الرجالية', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 hover:text-brand-white transition-colors duration-200 block"><?php _e('الأزياء النسائية', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 hover:text-brand-white transition-colors duration-200 block"><?php _e('الأحذية الفاخرة', 'ana9a'); ?></a></li>
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-[11px] uppercase tracking-[0.15rem] text-white font-bold"><?php _e('المساعدة والسياسات', 'ana9a'); ?></h4>
                <ul class="space-y-2 text-xs font-semibold text-white">
                    <li><a href="#" class="text-brand-gray-500 hover:text-brand-white transition-colors duration-200 block"><?php _e('سياسة الاستبدال والاسترجاع', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 hover:text-brand-white transition-colors duration-200 block"><?php _e('معلومات التوصيل لـ 58 ولاية', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 hover:text-brand-white transition-colors duration-200 block"><?php _e('من نحن', 'ana9a'); ?></a></li>
                    <li><a href="#" class="text-brand-gray-500 hover:text-brand-white  transition-colors duration-200 block"><?php _e('اتصل بنا', 'ana9a'); ?></a></li>
                </ul>
            </div>

            <div class="space-y-3">
                <h4 class="text-[11px] uppercase tracking-[0.15rem] text-white font-bold"><?php _e('خدمة الزبائن', 'ana9a'); ?></h4>
                <ul class="space-y-2 text-xs font-semibold text-white">
                    <li class="flex items-center gap-2">
                        <span class="text-brand-gray-400"><?php _e('هاتف:', 'ana9a'); ?></span>
                        <a href="tel:+213XXXXXXXXX" class="text-white transition-colors tracking-wide" dir="ltr">+213 (0) XX XX XX XX</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-brand-gray-400"><?php _e('بريد:', 'ana9a'); ?></span>
                        <a href="mailto:support@ana9a.test" class="text-white transition-colors">support@ana9a.test</a>
                    </li>
                    <li class="pt-1 text-[11px] text-brand-gray-400 leading-relaxed font-medium">
                        <?php _e('فريقنا متواجد لخدمتكم طيلة أيام الأسبوع.', 'ana9a'); ?>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] font-medium text-brand-gray-400 text-center sm:text-right">
            <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4">
                <span>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('جميع الحقوق محفوظة.', 'ana9a'); ?></span>
                <span class="hidden sm:inline text-brand-gray-800">|</span>
                <a href="https://github.com/moh-dev10" target="_blank" rel="noopener" class="text-brand-white  font-mono tracking-wider">
                    powered by moh-dev10
                </a>
            </div>
            
            <div class="flex items-center gap-2 bg-brand-gray-800 px-3.5 py-1.5 border border-brand-gray-800 rounded-xl text-brand-gray-300 select-none">
                <span class="text-[10px] font-bold uppercase tracking-wider text-white">
                    <?php _e('الدفع نقداً عند الاستلام', 'ana9a'); ?>
                </span>
            </div>
        </div>
    </div>
</footer>



<?php wp_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    
    // 1. تشغيل الأنميشن القديم (Intersection Observer)
    const observerOptions = { root: null, rootMargin: '0px', threshold: 0.1 };
    const scrollObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const elementsToReveal = document.querySelectorAll('.reveal-on-scroll');
    elementsToReveal.forEach(el => scrollObserver.observe(el));


    
});
</script>
</body>
</html>