document.addEventListener('DOMContentLoaded', function() {
    // التأكد من أن حاوية السلايدر موجودة في الصفحة لمنع الأخطاء
    const productSlider = document.querySelector('.products-swiper');
    
    if (productSlider && typeof Swiper !== 'undefined') {
        new Swiper('.products-swiper', {
            // الإعدادات الأساسية
            slidesPerView: 2, // يظهر كارت وجزء من الثاني في الموبايل
            spaceBetween: 16,
            rtl: true, // متوافق تماماً مع الاتجاه العربي للمتجر
            grabCursor: true,

            autoplay: {
                delay: 1500, // الوقت بين كل سحب وسحب (3000 ملي ثانية = 3 ثواني)
                disableOnInteraction: false, // إذا لمس المستخدم السلايدر أو سحبه، لا يتوقف الـ Autoplay بل يستمر بعدها
                pauseOnMouseEnter: true, // ميزة رائعة: إذا وضع المستخدم الماوس فوق المنتج، يتوقف السلايدر ليتصفحه بوقته
            },

            // ربط أزرار التحكم المخصصة التي صممناها في الـ PHP
            navigation: {
                nextEl: '.swiper-button-next-products',
                prevEl: '.swiper-button-prev-products',
            },
            
            // نقاط الترقيم التفاعلية في الأسفل
            pagination: {
                el: '.swiper-pagination-products',
                clickable: true,
            },

            // تقسيم الشاشة (Breakpoints) لضمان توزيع الكروت بانتظام
            breakpoints: {
                640: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 24,
                }
            }
        });
    }
    
});