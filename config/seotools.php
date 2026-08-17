<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        /*
         * تنظیمات پیش‌فرض متا تگ‌ها
         */
        'defaults'       => [
            'title'        => "نلی گالری",
            'titleBefore'  => false,
            'description'  => 'نلی گالری؛ جدیدترین و شیک‌ترین مدل‌های کیف و کفش زنانه با تضمین کیفیت و ارسال سریع به سراسر ایران.',
            'separator'    => ' | ', // استفاده از خط عمودی در نتایج گوگل شکیل‌تر است
            'keywords'     => ['نلی گالری', 'خرید کیف زنانه', 'خرید کفش زنانه', 'کفش شیک دخترانه'],
            'canonical'    => 'current',
            'robots'       => 'all',
        ],
        /*
         * تگ‌های تاییدیه گوگل و بینگ (اگر کد دارید اینجا قرار دهید)
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * تنظیمات پیش‌فرض برای اشتراک‌گذاری در شبکه‌های اجتماعی (OpenGraph)
         */
        'defaults' => [
            'title'       => 'نلی گالری | دنیای کیف و کفش زنانه',
            'description' => 'بهترین انتخاب برای خانم‌های شیک‌پوش؛ خرید آنلاین انواع کیف و کفش مجلسی، اسپرت و روزمره در نلی گالری.',
            'url'         => null, // قرار دادن روی null باعث می‌شود خودکار URL فعلی را بردارد
            'type'        => 'website',
            'site_name'   => 'نلی گالری',
            'images'      => ['img/logo.jpg'], // آدرس لوگوی اصلی فروشگاه
        ],
    ],
    'twitter' => [
        /*
         * تنظیمات مربوط به توییتر کارت
         */
        'defaults' => [
            'card'        => 'summary_large_image',
            // 'site'        => '@NelliGallery', // اگر آی‌دی توییتر دارید اینجا بنویسید
        ],
    ],
    'json-ld' => [
        /*
         * تنظیمات ساختار داده برای درک بهتر موتورهای جستجو
         */
        'defaults' => [
            'title'       => 'نلی گالری',
            'description' => 'فروشگاه اینترنتی تخصصی کیف و کفش زنانه با ارسال به تمام نقاط ایران.',
            'url'         => 'full',
            'type'        => 'Store', // نوع را به Store تغییر دادم که برای فروشگاه دقیق‌تر است
            'images'      => ['img/logo.jpg'],
        ],
    ],
];
