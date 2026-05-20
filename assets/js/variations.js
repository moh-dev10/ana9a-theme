document.addEventListener('DOMContentLoaded', function() {
    // استهداف الأزرار باستخدام الكلاس الموحد swatch-btn
    const swatchButtons = document.querySelectorAll('.swatch-btn');
    
    swatchButtons.forEach(button => {
        button.addEventListener('click', function() {
            // 1. تحديد نطاق المجموعة الحالية (اللون أو المقاس فقط) لضمان عدم تداخل الخيارات
            const swatchGroup = this.closest('.swatch-group');
            const hiddenInput = swatchGroup.querySelector('.variation-input');
            const selectedTextDisplay = swatchGroup.querySelector('.selected-value');
            const value = this.getAttribute('data-value');
            const label = this.getAttribute('title') || this.innerText; // جلب الاسم من title أو نص الزر
            
            // 2. تحديث قيمة الـ Input المخفي
            hiddenInput.value = value;

            // 3. تحديث النص المختار في الواجهة (UX Improvement)
            if (selectedTextDisplay) {
                selectedTextDisplay.innerText = label;
                selectedTextDisplay.classList.remove('text-gray-400');
                selectedTextDisplay.classList.add('text-brand-black', 'font-bold');
            }

            // 4. تحديث الشكل البصري (Active State) داخل هذه المجموعة فقط
            swatchGroup.querySelectorAll('.swatch-btn').forEach(btn => {
                btn.classList.remove('bg-brand-black', 'text-white', 'border-brand-black', 'ring-2', 'ring-brand-black');
                btn.classList.add('border-gray-200');
            });
            
            this.classList.add('bg-brand-black', 'text-white', 'border-brand-black');
            this.classList.remove('border-gray-200');

            // 5. ربط التغيير مع نظام WooCommerce الأساسي
            const form = this.closest('form.variations_form');
            if (form && typeof jQuery !== 'undefined') {
                const $hiddenInput = jQuery(hiddenInput);
                // تحديث القيمة وإطلاق حدث التغيير ليفهم WooCommerce أن عليه تحديث السعر والصورة
                $hiddenInput.val(value).trigger('change');
                
                // إجبار النموذج على التحقق من المتغيرات المختارة (Check Variations)
                jQuery(form).trigger('check_variations');
            }
        });
    });
});