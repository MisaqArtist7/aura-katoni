<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="آورا کتونی (Aura Katooni) - فروشگاه تخصصی بهترین و جدیدترین کتونی‌های اورجینال و با کیفیت.">
    <meta name="robots" content="index, follow">
    <title>آورا کتونی | Aura Katooni - فروشگاه پریمیوم کتونی</title>

    <!-- Tailwind CSS (via CDN for standalone completeness) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Vazirmatn Persian Font -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.0.0/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Tailwind Config for Custom Colors and Fonts -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Vazirmatn', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            500: '#FF7043',
                            600: '#F4511E',
                            700: '#D84315',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Vazirmatn', sans-serif; }
        /* Hide scrollbar for slider containers but keep functionality */
        .hide-scroll::-webkit-scrollbar { display: none; }
        .hide-scroll { -ms-overflow-style: none; scrollbar-width: none; }

        /* Smooth zoom transition */
        .img-zoom { transition: transform 0.5s ease; }
        .group:hover .img-zoom { transform: scale(1.05); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden">

<!-- ================= HEADER & NAVIGATION ================= -->
@include('header')
<!-- Mobile Menu Overlay -->
<div id="mobile-menu-overlay" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-[60] hidden opacity-0 transition-opacity duration-300"></div>

<!-- Mobile Menu Drawer -->
<div id="mobile-menu-drawer" class="fixed top-0 right-0 h-full w-4/5 max-w-sm bg-white shadow-2xl z-[70] transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col">
    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
        <a href="/" class="text-xl font-black text-slate-950 flex items-center gap-2">
            <svg class="w-6 h-6 text-brand-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2L2 22h20L12 2zm0 4.5l6.5 13h-13L12 6.5z"/>
            </svg>
            آورا <span class="text-brand-600">کتونی</span>
        </a>
        <button type="button" id="mobile-menu-close" aria-label="Close menu" class="text-gray-500 hover:text-red-500 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <div class="flex-1 overflow-y-auto py-6 px-6">
        <nav class="flex flex-col space-y-6">
            <a href="/" class="text-lg font-bold text-brand-600">خانه</a>
            <a href="{{ route('shop') }}" class="text-lg font-medium text-slate-700 border-b border-gray-50 pb-2">فروشگاه</a>
            <div class="flex flex-col space-y-3 pl-4">
                <span class="text-sm font-bold text-gray-400">دسته‌بندی‌ها</span>
                <a href="#" class="text-slate-600 hover:text-brand-600">مردانه</a>
                <a href="#" class="text-slate-600 hover:text-brand-600">زنانه</a>
                <a href="#" class="text-slate-600 hover:text-brand-600">ورزشی</a>
                <a href="#" class="text-slate-600 hover:text-brand-600">روزمره</a>
            </div>
            <a href="#new-arrivals" class="text-lg font-medium text-slate-700 border-b border-gray-50 pb-2">جدیدترین‌ها</a>
            <a href="#special-offers" class="text-lg font-medium text-red-500 border-b border-gray-50 pb-2">تخفیف ویژه</a>
        </nav>
    </div>
    <div class="p-6 border-t border-gray-100 bg-slate-50 flex justify-around">
        <button class="flex flex-col items-center text-slate-600 hover:text-brand-600">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span class="text-xs">حساب کاربری</span>
        </button>
        <button class="flex flex-col items-center text-slate-600 hover:text-brand-600">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            <span class="text-xs">علاقه‌مندی</span>
        </button>
    </div>
</div>

<!-- ================= MAIN CONTENT ================= -->
<main>
    <section class="relative min-h-[550px] overflow-hidden flex items-center justify-center">
        <!-- Background -->
        <div class="absolute inset-0">
            <img
                src="{{ asset('assets/image/heros/hero.jpeg') }}"
                alt="Aura Sneakers"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/70 via-slate-900/50 to-slate-950/90"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-3xl mx-auto px-4 text-center text-white">
            <span class="inline-block mb-4 text-sm md:text-base font-medium tracking-widest text-slate-300 uppercase">
                Step Into Your Style
            </span>

            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight drop-shadow-lg">
                آورا کتونی
            </h1>

            <p class="mt-5 text-lg md:text-xl text-slate-200 font-light leading-relaxed max-w-2xl mx-auto">
                استایل خودت را پیدا کن؛
                با جدیدترین کتونی‌های روز، راحت‌تر قدم بردار و متفاوت‌تر دیده شو.
            </p>

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a
                    href="#products"
                    class="px-7 py-3 rounded-xl bg-white text-slate-900 font-semibold hover:bg-slate-100 transition"
                >
                    مشاهده محصولات
                </a>

                <a
                    href="#categories"
                    class="flex items-center justify-center gap-2 px-7 py-3 rounded-xl border border-white/30 bg-white/10 backdrop-blur-sm font-semibold hover:bg-white/20 transition"
                >
                تخفیفات ویژه    
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
                </a>
            </div>
        </div>
        <!-- Curved Bottom Shape -->
        <div class="absolute bottom-0 left-0 right-0 w-full overflow-hidden leading-none pointer-events-none">
            <svg class="relative block w-full h-[40px] sm:h-[60px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 Q600,100 1200,0 L1200,120 L0,120 Z" class="fill-white"></path>
            </svg>
        </div>
    </section>

    <!-- CATEGORIES SECTION -->
    <section class="py-16 bg-slate-50/50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </span>
                    <span class="text-xs font-bold tracking-wider text-brand-600 uppercase mb-1 block">دسته‌بندی‌ها</span>
                </div>
                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">محبوب‌ترین دسته‌ها</h2>
            </div>

            <!-- Navigation Buttons -->
            @if(!empty($categories) && count($categories) > 0)
                <div class="flex items-center gap-2">
                    <button class="category-prev w-10 h-10 rounded-full bg-white border border-slate-200 shadow-sm flex items-center justify-center text-slate-600 hover:bg-brand-600 hover:text-white hover:border-brand-600 transition-all cursor-pointer z-10">
                        <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button class="category-next w-10 h-10 rounded-full bg-white border border-slate-200 shadow-sm flex items-center justify-center text-slate-600 hover:bg-brand-600 hover:text-white hover:border-brand-600 transition-all cursor-pointer z-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                </div>
            @endif
        </div>

        @if(!empty($categories) && count($categories) > 0)
            <!-- Swiper Container -->
            <div class="swiper category-swiper !py-4 !px-1">
                <div class="swiper-wrapper">
                    @foreach($categories as $category)
                        <!-- Category Card (Swiper Slide) -->
                        <div class="swiper-slide !h-auto">
                            <a href="{{ route('shop', ['category' => $category->slug ?? $category->id]) }}"
                            class="group relative flex flex-col items-center p-5 bg-white rounded-2xl border border-slate-100 shadow-md hover:shadow-xl hover:shadow-brand-500/10 hover:border-brand-200 hover:-translate-y-2 transition-all duration-300 cursor-pointer overflow-hidden h-full">

                                <!-- Top Highlight Glow -->
                                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-brand-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                <!-- Image Wrapper -->
                                <div class="w-24 h-24 md:w-28 md:h-28 mb-4 rounded-2xl p-1.5 group-hover:bg-brand-50 transition-colors duration-300">
                                    <div class="w-full h-full bg-white rounded-xl flex items-center justify-center overflow-hidden relative">
                                        @if(isset($category->image) && $category->image)
                                            <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-out" loading="lazy">
                                        @else
                                            <svg class="w-10 h-10 text-slate-300 group-hover:text-brand-500 group-hover:scale-110 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2l2 2h8a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/>
                                            </svg>
                                        @endif
                                    </div>
                                </div>

                                <!-- Category Name & Count -->
                                <div class="text-center w-full mt-auto">
                                    <h3 class="font-bold text-slate-800 text-sm md:text-base group-hover:text-brand-600 transition-colors duration-300 truncate">
                                        {{ $category->name }}
                                    </h3>
                                    @if(isset($category->products_count))
                                        <span class="text-xs text-slate-400 mt-1 block group-hover:text-slate-500 transition-colors">
                                            {{ $category->products_count }} کالا
                                        </span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="w-full py-16 flex flex-col items-center justify-center bg-white rounded-3xl border border-slate-100 shadow-sm mx-auto">
        <div class="w-16 h-16 mb-4 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
            </svg>
        </div>
        <p class="text-base font-bold text-slate-800">دسته‌بندی یافت نشد</p>
        <p class="text-xs text-slate-400 mt-1">در حال حاضر هیچ دسته‌بندی برای نمایش وجود ندارد.</p>
        </div>
            @endif
        </div>
    </section>

    <!-- BEST SELLERS SECTION -->
    <section class="py-16 bg-slate-50 relative overflow-hidden dir-rtl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="flex h-2 w-2 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                        </span>
                        <span class="text-xs font-bold tracking-wider text-brand-600 uppercase block">پیشنهاد ویژه</span>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">پرفروش‌ترین محصولات</h2>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex items-center gap-2">
                    <button type="button" class="bestseller-prev w-10 h-10 rounded-full bg-white border border-slate-200 shadow-sm flex items-center justify-center text-slate-600 hover:bg-brand-600 hover:text-white hover:border-brand-600 transition-all cursor-pointer z-10" aria-label="قبلی">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                    <button type="button" class="bestseller-next w-10 h-10 rounded-full bg-white border border-slate-200 shadow-sm flex items-center justify-center text-slate-600 hover:bg-brand-600 hover:text-white hover:border-brand-600 transition-all cursor-pointer z-10" aria-label="بعدی">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Swiper Container -->
            <div class="swiper bestseller-swiper !py-4 !px-1">
                <div class="swiper-wrapper">
                    @if(isset($bestSellingProducts) && count($bestSellingProducts) > 0)
                        @foreach($bestSellingProducts as $bestProduct)
                            <!-- Product Card (Swiper Slide) -->
                            <div class="swiper-slide !h-auto">
                                <div class="group relative flex flex-col bg-white rounded-2xl border border-slate-100 shadow-md hover:shadow-xl hover:shadow-brand-500/10 hover:border-brand-200 hover:-translate-y-2 transition-all duration-300 cursor-pointer overflow-hidden h-full">

                                    <!-- Top Highlight Glow -->
                                    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-brand-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20"></div>

                                    <!-- Wishlist Button & Badges -->
                                    <div class="absolute top-3 inset-x-3 z-10 flex items-center justify-between pointer-events-none">
                                        <span class="bg-amber-500/10 text-amber-600 text-[10px] font-extrabold px-2.5 py-1 rounded-lg backdrop-blur-md border border-amber-500/20">
                                            پرفروش
                                        </span>
                                        <button type="button" class="pointer-events-auto w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition shadow-sm" aria-label="افزودن به علاقمندی‌ها">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Image Wrapper -->
                                    <a href="{{ route('shop', ['product' => $bestProduct->slug ?? $bestProduct->id]) }}" class="relative aspect-square overflow-hidden p-6 flex items-center justify-center">
                                        @if(!empty($bestProduct->images) && count($bestProduct->images) > 0)
                                            <img src="{{ asset('storage/'.$bestProduct->images[0]) }}" alt="{{ $bestProduct->name }}" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 ease-out" loading="lazy">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="محصول" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 ease-out drop-shadow-md" loading="lazy">
                                        @endif
                                    </a>

                                    <!-- Content Wrapper -->
                                    <div class="p-5 flex-1 flex flex-col justify-between">
                                        <div>
                                            <span class="text-xs font-bold text-slate-400 block mb-1">
                                                {{ $bestProduct->category->name ?? 'کفش ورزشی' }}
                                            </span>
                                            <a href="{{ route('shop', ['product' => $bestProduct->slug ?? $bestProduct->id]) }}" class="block font-bold text-slate-800 text-sm md:text-base group-hover:text-brand-600 transition-colors duration-300 line-clamp-2 mb-2">
                                                {{ $bestProduct->name }}
                                            </a>
                                        </div>

                                        <!-- Price & Cart Button -->
                                        <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-50">
                                            <div class="flex flex-col">
                                                @if(isset($bestProduct->old_price) && $bestProduct->old_price > $bestProduct->price)
                                                    <span class="text-xs text-slate-400 line-through">
                                                        {{ number_format($bestProduct->old_price) }}
                                                    </span>
                                                @endif
                                                <span class="font-extrabold text-slate-900 text-base md:text-lg">
                                                    {{ number_format($bestProduct->price ?? 0) }} <span class="text-xs font-normal text-slate-400">تومان</span>
                                                </span>
                                            </div>
                                            <button type="button" class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center hover:bg-brand-600 transition-all duration-300 shadow-md hover:shadow-brand-500/30 group-hover:scale-105" aria-label="افزودن به سبد خرید">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- STATIC FALLBACK SLIDES -->
                        @for($i=1; $i<=5; $i++)
                            <div class="swiper-slide !h-auto">
                                <div class="group relative flex flex-col bg-white rounded-2xl border border-slate-100 shadow-md hover:shadow-xl hover:shadow-brand-500/10 hover:border-brand-200 hover:-translate-y-2 transition-all duration-300 cursor-pointer overflow-hidden h-full">
                                    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-brand-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20"></div>
                                    
                                    <div class="absolute top-3 inset-x-3 z-10 flex items-center justify-between pointer-events-none">
                                        <span class="bg-amber-500/10 text-amber-600 text-[10px] font-extrabold px-2.5 py-1 rounded-lg backdrop-blur-md border border-amber-500/20">
                                            پرفروش
                                        </span>
                                        <button type="button" class="pointer-events-auto w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition shadow-sm" aria-label="افزودن به علاقمندی‌ها">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                        </button>
                                    </div>

                                    <a href="#" class="block relative aspect-square bg-slate-50 overflow-hidden p-6 flex items-center justify-center">
                                        <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="نایک ایر جردن" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 ease-out drop-shadow-md">
                                    </a>

                                    <div class="p-5 flex-1 flex flex-col justify-between">
                                        <div>
                                            <span class="text-xs font-bold text-slate-400 block mb-1">نایک</span>
                                            <a href="#" class="block font-bold text-slate-800 text-sm md:text-base group-hover:text-brand-600 transition-colors duration-300 line-clamp-2 mb-2">نایک ایر جردن ۱ مدل رترو</a>
                                        </div>
                                        <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-50">
                                            <div class="flex flex-col">
                                                <span class="font-extrabold text-slate-900 text-base md:text-lg">۴,۵۰۰,۰۰۰ <span class="text-xs font-normal text-slate-400">تومان</span></span>
                                            </div>
                                            <button type="button" class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center hover:bg-brand-600 transition-all duration-300 shadow-md hover:shadow-brand-500/30 group-hover:scale-105" aria-label="افزودن به سبد خرید">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- SPECIAL OFFERS SECTION -->
    <section id="special-offers" class="py-16 bg-slate-50 relative overflow-hidden dir-rtl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="flex h-2 w-2 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                        </span>
                        <span class="text-xs font-bold tracking-wider text-brand-600 uppercase block">پیشنهاد ویژه</span>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">تخفیف‌های شگفت‌انگیز</h2>
                </div>
            </div>

            <!-- Grid Container (4 Columns) -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @if(isset($discountsProduct) && count($discountsProduct) > 0)
                    @foreach($discountsProduct as $product)
                        @php
                            $bestVariant = isset($product->variants) ? $product->variants->whereNotNull('discount_price')->sortBy('discount_price')->first() : null;
                            $originalPrice = $bestVariant ? $bestVariant->price : ($product->price ?? 0);
                            $discountPrice = $bestVariant ? $bestVariant->discount_price : ($product->discount_price ?? 0);

                            $discountPercent = 0;
                            if($originalPrice > 0 && $discountPrice > 0 && $originalPrice > $discountPrice) {
                                $discountPercent = round((($originalPrice - $discountPrice) / $originalPrice) * 100);
                            }
                        @endphp

                        <!-- Product Card -->
                        <div class="group relative flex flex-col bg-white rounded-2xl border border-slate-100 shadow-md hover:shadow-xl hover:shadow-brand-500/10 hover:border-brand-200 hover:-translate-y-2 transition-all duration-300 cursor-pointer overflow-hidden h-full">

                            <!-- Top Highlight Glow -->
                            <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-brand-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20"></div>

                            <!-- Wishlist Button & Discount Badge -->
                            <div class="absolute top-3 inset-x-3 z-10 flex items-center justify-between pointer-events-none">
                                @if($discountPercent > 0)
                                    <span class="bg-red-500 text-white text-[11px] font-extrabold px-2.5 py-1 rounded-lg shadow-sm">
                                        {{ $discountPercent }}٪ تخفیف
                                    </span>
                                @else
                                    <div></div>
                                @endif
                                <button type="button" class="pointer-events-auto w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition shadow-sm" aria-label="افزودن به علاقمندی‌ها">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </button>
                            </div>

                            <!-- Image Wrapper -->
                            <a href="{{ route('shop', ['product' => $product->slug ?? $product->id]) }}" class="relative aspect-square overflow-hidden p-6 flex items-center justify-center bg-slate-50">
                                <img src="{{ asset($product->image ?? 'images/default-sneaker.png') }}" alt="{{ $product->name }}" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 ease-out drop-shadow-md" loading="lazy">
                            </a>

                            <!-- Content Wrapper -->
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-slate-400 block mb-1">
                                        {{ $product->category->name ?? 'کفش ورزشی' }}
                                    </span>
                                    <a href="{{ route('shop', ['product' => $product->slug ?? $product->id]) }}" class="block font-bold text-slate-800 text-sm md:text-base group-hover:text-brand-600 transition-colors duration-300 line-clamp-2 mb-2">
                                        {{ $product->name }}
                                    </a>
                                </div>

                                <!-- Price & Cart Button -->
                                <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-50">
                                    <div class="flex flex-col">
                                        @if($discountPrice > 0)
                                            <span class="text-xs text-slate-400 line-through decoration-red-400 mb-0.5">
                                                {{ number_format($originalPrice) }}
                                            </span>
                                            <span class="font-extrabold text-slate-900 text-base md:text-lg">
                                                {{ number_format($discountPrice) }} <span class="text-xs font-normal text-slate-400">تومان</span>
                                            </span>
                                        @else
                                            <span class="font-extrabold text-slate-900 text-base md:text-lg">
                                                {{ number_format($originalPrice) }} <span class="text-xs font-normal text-slate-400">تومان</span>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="button" class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center hover:bg-brand-600 transition-all duration-300 shadow-md hover:shadow-brand-500/30 group-hover:scale-105" aria-label="افزودن به سبد خرید">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- STATIC FALLBACK SLIDES (4 ITEMS) -->
                    @for($i=1; $i<=4; $i++)
                        <div class="group relative flex flex-col bg-white rounded-2xl border border-slate-100 shadow-md hover:shadow-xl hover:shadow-brand-500/10 hover:border-brand-200 hover:-translate-y-2 transition-all duration-300 cursor-pointer overflow-hidden h-full">
                            <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-brand-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20"></div>

                            <div class="absolute top-3 inset-x-3 z-10 flex items-center justify-between pointer-events-none">
                                <span class="bg-red-500 text-white text-[11px] font-extrabold px-2.5 py-1 rounded-lg shadow-sm">۲۰٪ تخفیف</span>
                                <button type="button" class="pointer-events-auto w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition shadow-sm" aria-label="افزودن به علاقمندی‌ها">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                </button>
                            </div>

                            <a href="#" class="block relative aspect-square bg-slate-50 overflow-hidden p-6 flex items-center justify-center">
                                <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="کتونی تخفیف‌دار" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 ease-out drop-shadow-md">
                            </a>

                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-slate-400 block mb-1">آدیداس</span>
                                    <a href="#" class="block font-bold text-slate-800 text-sm md:text-base group-hover:text-brand-600 transition-colors duration-300 line-clamp-2 mb-2">کتونی رانینگ ادیداس اولترابوست</a>
                                </div>
                                <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-50">
                                    <div class="flex flex-col">
                                        <span class="text-xs text-slate-400 line-through decoration-red-400 mb-0.5">۵,۸۰۰,۰۰۰</span>
                                        <span class="font-extrabold text-slate-900 text-base md:text-lg">۴,۶۴۰,۰۰۰ <span class="text-xs font-normal text-slate-400">تومان</span></span>
                                    </div>
                                    <button type="button" class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center hover:bg-brand-600 transition-all duration-300 shadow-md hover:shadow-brand-500/30 group-hover:scale-105" aria-label="افزودن به سبد خرید">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </section>

    <!-- NEW ARRIVALS SECTION -->
    <section id="new-arrivals" class="py-16 bg-slate-50 border-t border-slate-200/60 relative overflow-hidden dir-rtl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="flex h-2 w-2 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-slate-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-slate-800"></span>
                        </span>
                        <span class="text-xs font-bold tracking-wider text-brand-600 uppercase block">کالکشن جدید</span>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">جدیدترین محصولات</h2>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex items-center gap-2">
                    <button type="button" id="btn-prev-new" aria-label="قبلی" class="w-10 h-10 rounded-full bg-white border border-slate-200 shadow-sm flex items-center justify-center text-slate-600 hover:bg-brand-600 hover:text-white hover:border-brand-600 transition-all cursor-pointer z-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                    <button type="button" id="btn-next-new" aria-label="بعدی" class="w-10 h-10 rounded-full bg-white border border-slate-200 shadow-sm flex items-center justify-center text-slate-600 hover:bg-brand-600 hover:text-white hover:border-brand-600 transition-all cursor-pointer z-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Grid / Slider Container (4 Columns on Desktop) -->
            <div class="flex lg:grid lg:grid-cols-4 overflow-x-auto hide-scroll pb-6 gap-6 scroll-smooth snap-x snap-mandatory" id="new-slider">
                @if(isset($latestProducts) && count($latestProducts) > 0)
                    @foreach($latestProducts as $product)
                        @php
                            $finalVariant = isset($product->variants) ? $product->variants->first() : null;
                            $activeVariants = isset($product->variants) ? $product->variants : [];
                            $displayPrice = $finalVariant ? ($finalVariant->discount_price ?? $finalVariant->price) : ($product->price ?? 0);
                        @endphp

                        <!-- Product Card -->
                        <div class="group flex-shrink-0 w-72 lg:w-auto snap-center relative flex flex-col bg-white rounded-sm border border-slate-200 shadow-sm hover:shadow-xl hover:shadow-brand-500/10 hover:border-brand-200 hover:-translate-y-1 transition-all duration-300 cursor-pointer overflow-hidden h-full">

                            <!-- Top Highlight Glow -->
                            <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-brand-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20"></div>

                            <!-- Badge & Wishlist Button -->
                            <div class="absolute top-3 inset-x-3 z-10 flex items-center justify-between pointer-events-none">
                                <span class="bg-slate-900 text-white text-[10px] font-extrabold px-2.5 py-1 rounded-lg shadow-sm">
                                    جدید
                                </span>
                                <button type="button" class="pointer-events-auto w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition shadow-sm" aria-label="افزودن به علاقمندی‌ها">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </button>
                            </div>

                            <!-- Image Wrapper -->
                            <a href="{{ route('shop', ['product' => $product->slug ?? $product->id]) }}" class="relative aspect-square overflow-hidden p-6 flex items-center justify-center">
                                <img src="{{ asset('storage/'.$bestProduct->images[0]) }}" alt="{{ $product->name }}" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 ease-out" loading="lazy">
                            </a>

                            <!-- Content Wrapper -->
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-slate-400 block mb-1">
                                        {{ $product->category->name ?? 'کفش ورزشی' }}
                                    </span>
                                    <a href="{{ route('shop', ['product' => $product->slug ?? $product->id]) }}" class="block font-bold text-slate-800 text-sm md:text-base group-hover:text-brand-600 transition-colors duration-300 line-clamp-2 mb-2">
                                        {{ $product->name }}
                                    </a>

                                    <!-- Variants Info -->
                                    <div class="mt-2 mb-1">
                                        @if(count($activeVariants) > 0)
                                            <div class="flex items-center justify-between text-xs text-slate-400">
                                                <div class="flex -space-x-1 space-x-reverse">
                                                    @foreach($activeVariants->take(3) as $variant)
                                                        @if(isset($variant->color))
                                                            <div class="w-3.5 h-3.5 rounded-full border border-white shadow-sm" style="background-color: {{ $variant->color }}"></div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <span>{{ count($activeVariants) }} سایز موجود</span>
                                            </div>
                                        @else
                                            <span class="text-[11px] text-slate-400">تک سایز</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Price & Action Button -->
                                <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-50">
                                    <div class="flex flex-col">
                                        <span class="font-extrabold text-slate-900 text-base md:text-lg">
                                            {{ number_format($displayPrice) }} <span class="text-xs font-normal text-slate-400">تومان</span>
                                        </span>
                                    </div>
                                    <button type="button" class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center hover:bg-brand-600 transition-all duration-300 shadow-md hover:shadow-brand-500/30 group-hover:scale-105" aria-label="افزودن به سبد خرید">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- STATIC FALLBACK (4 ITEMS) -->
                    @for($i=1; $i<=4; $i++)
                        <div class="group flex-shrink-0 w-72 lg:w-auto snap-center relative flex flex-col bg-white rounded-2xl border border-slate-100 shadow-md hover:shadow-xl hover:shadow-brand-500/10 hover:border-brand-200 hover:-translate-y-2 transition-all duration-300 cursor-pointer overflow-hidden h-full">
                            <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-brand-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20"></div>

                            <div class="absolute top-3 inset-x-3 z-10 flex items-center justify-between pointer-events-none">
                                <span class="bg-slate-900 text-white text-[10px] font-extrabold px-2.5 py-1 rounded-lg shadow-sm">جدید</span>
                                <button type="button" class="pointer-events-auto w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 transition shadow-sm" aria-label="افزودن به علاقمندی‌ها">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                </button>
                            </div>

                            <a href="#" class="block relative aspect-square bg-slate-50 overflow-hidden p-6 flex items-center justify-center">
                                <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="New Arrival" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 ease-out drop-shadow-md">
                            </a>

                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-slate-400 block mb-1">نیوبالانس</span>
                                    <a href="#" class="block font-bold text-slate-800 text-sm md:text-base group-hover:text-brand-600 transition-colors duration-300 line-clamp-2 mb-2">کتونی نیوبالانس ۵۵۰ اورجینال</a>
                                    <div class="mt-2 mb-1 flex items-center justify-between text-xs text-slate-400">
                                        <div class="flex -space-x-1 space-x-reverse">
                                            <div class="w-3.5 h-3.5 rounded-full border border-white shadow-sm bg-white"></div>
                                            <div class="w-3.5 h-3.5 rounded-full border border-white shadow-sm bg-blue-900"></div>
                                        </div>
                                        <span>۴ سایز موجود</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-50">
                                    <div class="flex flex-col">
                                        <span class="font-extrabold text-slate-900 text-base md:text-lg">۶,۲۰۰,۰۰۰ <span class="text-xs font-normal text-slate-400">تومان</span></span>
                                    </div>
                                    <button type="button" class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center hover:bg-brand-600 transition-all duration-300 shadow-md hover:shadow-brand-500/30 group-hover:scale-105" aria-label="افزودن به سبد خرید">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </section>

</main>

<!-- ================= FOOTER ================= -->
@include('footer')
<!-- ================= JAVASCRIPT ================= -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // راه اندازی Swiper
        if (typeof Swiper !== 'undefined') {
            new Swiper('.category-swiper', {
                slidesPerView: 2,
                spaceBetween: 16,
                navigation: {
                    nextEl: '.category-next',
                    prevEl: '.category-prev',
                },
                breakpoints: {
                    640: { slidesPerView: 3, spaceBetween: 20 },
                    768: { slidesPerView: 4, spaceBetween: 20 },
                    1024: { slidesPerView: 5, spaceBetween: 24 },
                    1280: { slidesPerView: 6, spaceBetween: 24 },
                }
            });
        }

        /* --- Mobile Menu Logic --- */
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const closeBtn = document.getElementById('mobile-menu-close');
        const overlay = document.getElementById('mobile-menu-overlay');
        const drawer = document.getElementById('mobile-menu-drawer');
        const body = document.body;

        function openMenu() {
            if(!overlay || !drawer) return;
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
                drawer.classList.remove('translate-x-full');
            }, 10);
            body.style.overflow = 'hidden';
        }

        function closeMenu() {
            if(!overlay || !drawer) return;
            drawer.classList.add('translate-x-full');
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
            body.style.overflow = '';
        }

        if(mobileBtn && closeBtn && overlay) {
            mobileBtn.addEventListener('click', openMenu);
            closeBtn.addEventListener('click', closeMenu);
            overlay.addEventListener('click', closeMenu);

            document.addEventListener('keydown', (e) => {
                if(e.key === 'Escape') closeMenu();
            });
        }
        
        /* --- Slider Logic Function --- */
        function initSlider(containerId, prevBtnId, nextBtnId) {
            const container = document.getElementById(containerId);
            const prevBtn = document.getElementById(prevBtnId);
            const nextBtn = document.getElementById(nextBtnId);

            if(!container || !prevBtn || !nextBtn) return;

            const scrollAmount = 300;
            const isRTL = document.documentElement.dir === 'rtl';

            nextBtn.addEventListener('click', () => {
                container.scrollBy({ left: isRTL ? -scrollAmount : scrollAmount, behavior: 'smooth' });
            });

            prevBtn.addEventListener('click', () => {
                container.scrollBy({ left: isRTL ? scrollAmount : -scrollAmount, behavior: 'smooth' });
            });
        }

        initSlider('bestseller-slider', 'btn-prev-bestseller', 'btn-next-bestseller');
        initSlider('new-slider', 'btn-prev-new', 'btn-next-new');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        /* --- Mobile Menu Logic --- */
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const closeBtn = document.getElementById('mobile-menu-close');
        const overlay = document.getElementById('mobile-menu-overlay');
        const drawer = document.getElementById('mobile-menu-drawer');
        const body = document.body;

        function openMenu() {
            if(!overlay || !drawer) return;
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
                drawer.classList.remove('translate-x-full');
            }, 10);
            body.style.overflow = 'hidden';
        }

        function closeMenu() {
            if(!overlay || !drawer) return;
            drawer.classList.add('translate-x-full');
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
            body.style.overflow = '';
        }

        if(mobileBtn && closeBtn && overlay) {
            mobileBtn.addEventListener('click', openMenu);
            closeBtn.addEventListener('click', closeMenu);
            overlay.addEventListener('click', closeMenu);

            document.addEventListener('keydown', (e) => {
                if(e.key === 'Escape') closeMenu();
            });
        }
        
        /* --- Custom Sliders (Bestseller & New Products) --- */
        function initSlider(containerId, prevBtnId, nextBtnId) {
            const container = document.getElementById(containerId);
            const prevBtn = document.getElementById(prevBtnId);
            const nextBtn = document.getElementById(nextBtnId);

            if(!container || !prevBtn || !nextBtn) return;

            const scrollAmount = 300;
            const isRTL = document.documentElement.dir === 'rtl';

            nextBtn.addEventListener('click', () => {
                container.scrollBy({ left: isRTL ? -scrollAmount : scrollAmount, behavior: 'smooth' });
            });

            prevBtn.addEventListener('click', () => {
                container.scrollBy({ left: isRTL ? scrollAmount : -scrollAmount, behavior: 'smooth' });
            });
        }

        initSlider('bestseller-slider', 'btn-prev-bestseller', 'btn-next-bestseller');
        initSlider('new-slider', 'btn-prev-new', 'btn-next-new');

        /* --- Drag with Mouse for Horizontal Scroll Areas --- */
        const sliders = document.querySelectorAll('.hide-scroll');
        let isDown = false;
        let startX;
        let scrollLeft;

        sliders.forEach(slider => {
            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('cursor-grabbing');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });
            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.classList.remove('cursor-grabbing');
            });
            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.classList.remove('cursor-grabbing');
            });
            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 2;
                slider.scrollLeft = scrollLeft - walk;
            });
        });

    });
    new Swiper('.bestseller-swiper', {
        slidesPerView: 1.2,
        spaceBetween: 16,
        navigation: {
            nextEl: '.bestseller-next',
            prevEl: '.bestseller-prev',
        },
        breakpoints: {
            640: { slidesPerView: 2.2, spaceBetween: 20 },
            768: { slidesPerView: 3.2, spaceBetween: 24 },
            1024: { slidesPerView: 4, spaceBetween: 24 }
        }
    });
</script>

</body>
</html>
