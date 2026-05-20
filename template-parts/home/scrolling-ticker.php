<?php
/**
 * Template part for displaying an Infinite Scrolling Ticker (Pure Tailwind CSS)
 * Theme: Ana9a - 100% Arabic Native Blueprint
 */
if (!defined('ABSPATH')) exit;

// العبارات التسويقية التي ستتكرر في الشريط
$ticker_text = __('توصيل سريع لـ 58 ولاية  •  الدفع عند الاستلام  •  خامات أصلية وفاخرة 100%  •  ارتقِ بأسلوبك الخاص مع أناقة • ', 'ana9a');
?>

<div class="relative w-full overflow-hidden bg-black text-white py-4 border-y border-neutral-900 select-none pointer-events-none" dir="ltr">
    
    <div class="flex whitespace-nowrap w-max animate-[ticker_30s_linear_infinite]">
        
        <div class="flex items-center gap-12 px-6 text-xs font-black tracking-widest uppercase text-right" dir="rtl">
            <span><?php echo $ticker_text; ?></span>
            <span><?php echo $ticker_text; ?></span>
        </div>
        
        <div class="flex items-center gap-12 px-6 text-xs font-black tracking-widest uppercase text-right" dir="rtl">
            <span><?php echo $ticker_text; ?></span>
            <span><?php echo $ticker_text; ?></span>
        </div>

    </div>
</div>