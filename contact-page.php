<?php
/**
 * Template Name: Contact Us Template
 * Theme: Ana9a (Tailwind v4 Blueprint)
 */

get_header(); ?>

<main class="max-w-[1200px] mx-auto px-4 py-12 md:py-20 animate-fade-in">
    
    <header class="text-center max-w-2xl mx-auto mb-16 md:mb-24">
        <span class="text-[11px] font-black tracking-widest uppercase bg-black text-white px-3 py-1 rounded-full shadow-2xs">تواصل معنا</span>
        <h1 class="text-3xl md:text-5xl font-black uppercase tracking-tighter text-black mt-4 mb-3">نحن هنا لمساعدتك</h1>
        <p class="text-sm text-gray-500 leading-relaxed">هل لديك أي استفسار حول المقاسات، الشحن، أو تبحث عن طلب خاص؟ أرسل لنا رسالة وسيرد عليك فريق العمل في أسرع وقت.</p>
    </header>

    <div dir="rtl" class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
        
        <div class="lg:col-span-5 space-y-6">
            
            <div  class="p-6 bg-gray-50 border border-gray-100 rounded-2xl flex items-start gap-4 hover:border-gray-300 transition-colors">
                <div class="p-3 bg-white rounded-xl shadow-2xs text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.387a12.035 12.035 0 0 1-7.108-7.108c-.145-.44.02-.927.396-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-black uppercase tracking-tight">خدمة العملاء والطلب السريع</h3>
                    <p class="text-xs text-gray-400 mt-0.5">متاحون للإجابة على مدار الساعة</p>
                    <a href="tel:+213555555555" class="block text-base font-black text-black mt-2 tracking-wide dir-ltr text-right hover:underline">+213 (0) 555 55 55 55</a>
                </div>
            </div>

            <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl flex items-start gap-4 hover:border-gray-300 transition-colors">
                <div class="p-3 bg-white rounded-xl shadow-2xs text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0l-7.5-4.615a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-black uppercase tracking-tight">الدعم والمراسلات الرسمية</h3>
                    <p class="text-xs text-gray-400 mt-0.5">لطلبات الشراكة والتبديل</p>
                    <a href="mailto:support@ana9a.test" class="block text-sm font-medium text-black mt-2 hover:underline">support@ana9a.test</a>
                </div>
            </div>

            <div class="p-6 bg-gray-50 border border-gray-100 rounded-2xl flex items-start gap-4">
                <div class="p-3 bg-white rounded-xl shadow-2xs text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-black uppercase tracking-tight">مواعيد العمل ومعالجة الطلبات</h3>
                    <p class="text-xs text-gray-500 mt-2 leading-relaxed">من السبت إلى الخميس: 09:00 صباحاً - 06:00 مساءً<br>الجمعة: عطلة أسبوعية</p>
                </div>
            </div>

        </div>

        <div class="lg:col-span-7 bg-white border border-gray-100 rounded-3xl p-6 md:p-10 shadow-2xs">
            <h2 class="text-xl font-black text-black mb-6">إرسال رسالة مباشرة</h2>
            
            <form action="#" method="POST" class="space-y-5">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-1.5">
                        <label for="contact_name" class="text-xs font-bold text-gray-700 uppercase">الإسم واللقب</label>
                        <input type="text" id="contact_name" name="name" required placeholder="محمد بلقاسم"
                               class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-black focus:outline-none focus:border-black focus:bg-white transition-all">
                    </div>
                    
                    <div class="flex flex-col gap-1.5">
                        <label for="contact_phone" class="text-xs font-bold text-gray-700 uppercase">رقم الهاتف</label>
                        <input type="tel" id="contact_phone" name="phone" required placeholder="0555 55 55 55"
                               class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-black text-left focus:outline-none focus:border-black focus:bg-white transition-all dir-ltr">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="contact_email" class="text-xs font-bold text-gray-700 uppercase">البريد الإلكتروني (اختياري)</label>
                    <input type="email" id="contact_email" name="email" placeholder="name@example.com"
                           class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-black focus:outline-none focus:border-black focus:bg-white transition-all">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="contact_message" class="text-xs font-bold text-gray-700 uppercase">نص رسالتك</label>
                    <textarea id="contact_message" name="message" rows="5" required placeholder="اكتب تفاصيل استفسارك هنا..."
                              class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-black focus:outline-none focus:border-black focus:bg-white transition-all resize-none"></textarea>
                </div>

                <button type="submit" 
                        class="w-full bg-black text-white py-4 rounded-xl text-xs font-black tracking-widest uppercase hover:bg-gray-900 transition-colors cursor-pointer shadow-sm mt-2">
                    إرسال الرسالة الآن
                </button>

            </form>
        </div>

    </div>
</main>

<?php get_header(); ?>