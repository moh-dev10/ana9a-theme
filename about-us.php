<?php
/**
 * Template Name: About Us Template
 * Theme: Ana9a (Tailwind v4 Blueprint)
 */

get_header(); ?>

<main class="max-w-[1000px] mx-auto px-6 py-16 md:py-24 animate-fade-in" dir="rtl">
    
    <header class="text-center mb-20">
    <span class="text-[11px] font-black tracking-widest uppercase bg-brand-black text-brand-white px-3 py-1 rounded-full">
        <?php _e('من نحن', 'ana9a'); ?>
    </span>
    <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tighter text-brand-black mt-6 mb-6">
        <?php _e('جزائريين، نبيعو لجزائريين', 'ana9a'); ?>
    </h1>
    <p class="text-lg text-brand-gray-500 max-w-2xl mx-auto leading-relaxed">
        <?php _e('ولد الروجي شوز — متجر جزائري من قلب البلاد. ما عندناش مستودع في فرنسا ولا في دبي، راه نشروا ونبيعو هنا، وكل دورو تدفعو يبقى في الجزائر.', 'ana9a'); ?>
    </p>
</header>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-20">
    <div class="p-8 bg-brand-white-soft border border-brand-gray-100 rounded-3xl">
        <h3 class="text-xl font-black text-brand-black mb-4 uppercase">
            <?php _e('علاش تشري منا؟', 'ana9a'); ?>
        </h3>
        <p class="text-sm text-brand-gray-500 leading-relaxed">
            <?php _e('لأننا كنا كيفك — نحوسو على أحذية أصلية بسعر معقول بلا ما نشريو من برا. قررنا نحلو المشكلة ونجيبو الأوريجينال مباشرة لعندك.', 'ana9a'); ?>
        </p>
    </div>
    <div class="p-8 bg-brand-white-soft border border-brand-gray-100 rounded-3xl">
        <h3 class="text-xl font-black text-brand-black mb-4 uppercase">
            <?php _e('كيفاش نخدمو؟', 'ana9a'); ?>
        </h3>
        <p class="text-sm text-brand-gray-500 leading-relaxed">
            <?php _e('تطلب أونلاين، نوصلك لبيتك في أي ولاية، وتدفع عند الاستلام. ما فيه ريسك — تشوف السلعة قبل ما تدفع.', 'ana9a'); ?>
        </p>
    </div>
</div>


</main>

<?php get_footer(); ?>