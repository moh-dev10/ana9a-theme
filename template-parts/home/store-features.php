<?php
/**
 * Template part for displaying Store Features grid (Centered Version)
 * Theme: Ana9a - 100% Arabic Native Blueprint
 */
if (!defined('ABSPATH')) exit;
?>

<section class="bg-brand-white border-y border-brand-gray-100 py-16" dir="rtl">
    <div class="container-lux mx-auto px-6">
        
        <div class="reveal-on-scroll grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8  text-center">
            
            <?php
            // مصفوفة البيانات لتقليل التكرار في الكود (Senior Practice)
$features = [
    [
        'icon'  => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4',
        'title' => __('توصيل لـ 58 ولاية', 'ana9a'),
        'desc'  => __('نوصلك لأي ولاية في الجزائر بسرعة وأمان', 'ana9a'),
    ],
    [
        'icon'  => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z',
        'title' => __('الدفع عند الاستلام', 'ana9a'),
        'desc'  => __('تشوف وتجرب، وبعدين تدفع — بلا قلقة', 'ana9a'),
    ],
    [
        'icon'  => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
        'title' => __('أحذية أصلية 100%', 'ana9a'),
        'desc'  => __('سنيكرات وصنادل وبلايغ — كلها أوريجينال مضمونة', 'ana9a'),
    ],
    [
        'icon'  => 'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z',
        'title' => __('خدمة عملاء 7/7', 'ana9a'),
        'desc'  => __('عندك سؤال أو مشكل؟ فريقنا دايما حاضر يعاونك', 'ana9a'),
    ],
];

            foreach ($features as $f) : ?>
                <div class="flex flex-col items-center p-6 text-center bg-white border border-brand-gray-100 rounded-3xl transition-all duration-500 hover:-translate-y-2 hover:border-brand-gray-200 hover:shadow-xl hover:shadow-brand-black/5 group">
    
                 <div class="mb-4 p-4 bg-brand-gray-50 rounded-2xl text-brand-black shadow-inner group-hover:bg-brand-black group-hover:text-brand-white transition-all duration-300">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                         <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo $f['icon']; ?>" />
                     </svg>
                 </div>
             
                 <div class="space-y-2">
                     <h3 class="text-sm font-black text-brand-black uppercase tracking-wider"><?php echo $f['title']; ?></h3>
                     <p class="text-[13px] leading-relaxed text-brand-gray-500 max-w-[200px] mx-auto">
                         <?php echo $f['desc']; ?>
                     </p>
                 </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>