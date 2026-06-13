<?php
/**
 * Template part for displaying an Infinite Scrolling Ticker (Pure Tailwind CSS)
 * Theme: Ana9a - 100% Arabic Native Blueprint
 */
if (!defined('ABSPATH')) exit;

$ticker_items = [
    __('توصيل لـ 58 ولاية', 'ana9a'),
    __('الدفع عند الاستلام', 'ana9a'),
    __('سنيكرات — صنادل — بلايغ', 'ana9a'),
    __('خامات أصلية 100%', 'ana9a'),
    __('تشكيلة جديدة كل أسبوع', 'ana9a'),
    __('مقاسات من 18 إلى 45', 'ana9a'),
];
?>

<!-- تم تغيير border-neutral-900 ليتماشى مع الـ brand-gray-800 -->
<div class="relative w-full overflow-hidden bg-brand-black text-brand-white py-4 border-y border-brand-gray-800 select-none pointer-events-none" dir="ltr">
    
    <!-- زدنا المدة لـ 30s لتكون الحركة ناعمة وفخمة -->
    <div class="flex whitespace-nowrap w-max animate-[ticker_30s_linear_infinite] gap-12">
        <?php for($i = 0; $i < 2; $i++): ?>
            <div class="flex items-center gap-12" dir="rtl">
                <?php foreach ($ticker_items as $item) : ?>
                    <span class="text-xs font-black tracking-widest uppercase whitespace-nowrap">
                        <?php echo esc_html($item); ?>
                    </span>
                    <!-- النقطة الفاصلة أصبحت تتبع لون brand-gray-200 لتعطي تباين أنيق -->
                    <span class="w-1.5 h-1.5 bg-brand-gray-200 rounded-full"></span>
                <?php endforeach; ?>
            </div>
        <?php endfor; ?>
    </div>
</div>