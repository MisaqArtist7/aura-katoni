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
                            500: '#10b981', // Green-500
                            600: '#059669', // Green-600
                            700: '#047857', // Green-700
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

    <!-- HERO SECTION -->
    <section class="relative bg-slate-900 overflow-hidden">
        <!-- Background Decoration -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-brand-600/10 rounded-l-full blur-3xl transform translate-x-1/3"></div>
            <div class="absolute bottom-0 left-0 w-1/3 h-1/2 bg-blue-500/10 rounded-tr-full blur-3xl transform -translate-x-1/4"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center py-16 lg:py-24 gap-12">
                <!-- Text Content -->
                <div class="w-full lg:w-1/2 text-center lg:text-right space-y-8">
                    <span class="inline-block py-1 px-3 rounded-full bg-brand-500/20 text-brand-400 text-sm font-bold border border-brand-500/30">کالکشن جدید ۲۰۲۶</span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight">
                        کفش مناسب، <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-l from-brand-400 to-green-600">استایل متفاوت.</span>
                    </h1>
                    <p class="text-slate-300 text-lg md:text-xl max-w-lg mx-auto lg:mx-0">
                        جدیدترین کتونی‌های اورجینال از برترین برندهای جهان را کشف کنید. راحتی و زیبایی، قدم به قدم همراه شماست.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                        <a href="{{ route('shop') }}" class="w-full sm:w-auto px-8 py-4 rounded-full bg-brand-600 text-white font-bold text-lg hover:bg-brand-500 transition shadow-lg shadow-brand-500/30 flex items-center justify-center gap-2">
                            مشاهده محصولات
                            <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <a href="#special-offers" class="w-full sm:w-auto px-8 py-4 rounded-full bg-white/10 text-white font-bold text-lg hover:bg-white/20 backdrop-blur-sm transition flex items-center justify-center">
                            تخفیف‌های امروز
                        </a>
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="w-full lg:w-1/2 relative">
                    <div class="relative w-full aspect-square md:aspect-[4/3] flex items-center justify-center">
                        <!-- Floating Badge -->
                        <div class="absolute top-10 right-10 bg-white/90 backdrop-blur rounded-2xl p-4 shadow-xl z-20 animate-bounce" style="animation-duration: 3s;">
                            <div class="text-slate-900 font-bold text-sm">Air Max Pulse</div>
                            <div class="text-brand-600 font-black">جدید</div>
                        </div>
                        <!-- Mock Image - In production use asset('...') -->
                        <img src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="New Sneaker Collection" class="relative z-10 w-4/5 h-auto object-cover transform -rotate-12 hover:rotate-0 hover:scale-105 transition-all duration-700 drop-shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CATEGORIES SECTION -->
    <section class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex items-end justify-between mb-10">
                <div>
                    <h2 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight">دسته‌بندی‌های محبوب</h2>
                    <div class="w-20 h-1.5 bg-brand-500 rounded-full mt-3"></div>
                </div>
            </div>

            <!-- Categories Container -->
            <div class="flex overflow-x-auto gap-4 md:gap-6 pb-8 snap-x snap-mandatory [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">

                @forelse($categories ?? [] as $category)
                    <!-- Category Card -->
                    <a href="{{ route('shop', ['category' => $category->slug ?? $category->id]) }}"
                       class="group relative flex-shrink-0 w-36 md:w-48 flex flex-col items-center p-4 md:p-5 bg-white rounded-[2rem] border border-slate-100 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_-5px_rgba(0,0,0,0.08)] hover:border-brand-100 hover:-translate-y-1.5 transition-all duration-500 snap-center cursor-pointer">

                        <!-- Image Wrapper with Gradient Border Effect -->
                        <div class="w-24 h-24 md:w-32 md:h-32 mb-4 rounded-full p-1 bg-gradient-to-tr from-slate-100 to-slate-50 group-hover:from-brand-100 group-hover:to-brand-50 transition-all duration-500">
                            <!-- Image Inner Circle -->
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center overflow-hidden shadow-sm relative">
                                @if(isset($category->image) && $category->image)
                                    <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-out" loading="lazy">
                                @else
                                    <!-- Fallback SVG if no image -->
                                    <svg class="w-10 h-10 text-slate-300 group-hover:text-brand-400 group-hover:scale-110 transition-all duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2l2 2h8a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/>
                                    </svg>
                                @endif
                            </div>
                        </div>

                        <!-- Category Name -->
                        <h3 class="font-bold text-slate-800 text-sm md:text-base group-hover:text-brand-600 transition-colors duration-300 text-center w-full truncate">
                            {{ $category->name }}
                        </h3>
                    </a>
                @empty
                    <!-- Empty State (When no categories exist) -->
                    <div class="w-full py-16 flex flex-col items-center justify-center bg-slate-50/50 rounded-[2.5rem] border-2 border-dashed border-slate-200 mx-auto">
                        <div class="w-20 h-20 mb-5 bg-white shadow-sm rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        <p class="text-lg md:text-xl font-bold text-slate-700">دسته‌بندی موجود نمی‌باشد</p>
                        <p class="text-sm text-slate-500 mt-2 text-center max-w-sm px-4">
                            در حال حاضر هیچ دسته‌بندی برای نمایش در این بخش ثبت نشده است.
                        </p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>



    <!-- BEST SELLERS SECTION -->
    <section class="py-16 bg-slate-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-2xl md:text-3xl font-black text-slate-900">پرفروش‌ترین‌ها</h2>
                    <div class="w-16 h-1.5 bg-brand-500 rounded-full mt-2"></div>
                </div>
                <div class="flex gap-2">
                    <button type="button" id="btn-prev-bestseller" aria-label="Previous" class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-slate-600 hover:bg-brand-50 hover:text-brand-600 hover:border-brand-300 transition shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                    <button type="button" id="btn-next-bestseller" aria-label="Next" class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-slate-600 hover:bg-brand-50 hover:text-brand-600 hover:border-brand-300 transition shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                </div>
            </div>

            <div class="flex overflow-x-auto hide-scroll pb-8 gap-6 scroll-smooth snap-x snap-mandatory" id="bestseller-slider">
                @if(isset($bestSellingProducts) && count($bestSellingProducts) > 0)
                    @foreach($bestSellingProducts as $bestProduct)
                        <div class="group flex-shrink-0 w-64 md:w-72 bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 relative snap-center flex flex-col overflow-hidden">

                            <!-- Wishlist Button -->
                            <button class="absolute top-4 right-4 z-10 w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 transition shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            </button>

                            <a href="{{ route('shop', ['product' => $bestProduct->slug ?? $bestProduct->id]) }}" class="block relative aspect-square bg-slate-50 overflow-hidden p-6 flex items-center justify-center">
                                @if(!empty($bestProduct->images) && count($bestProduct->images) > 0)
                                    <img src="{{ asset($bestProduct->images[0]) }}" alt="{{ $bestProduct->name }}" class="w-full h-full object-contain img-zoom drop-shadow-lg" loading="lazy">
                                @else
                                    <!-- Placeholder fallback -->
                                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Sneaker placeholder" class="w-full h-full object-contain img-zoom drop-shadow-lg" loading="lazy">
                                @endif
                            </a>

                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-1">{{ $bestProduct->category->name ?? 'کفش ورزشی' }}</span>
                                    <a href="{{ route('shop', ['product' => $bestProduct->slug ?? $bestProduct->id]) }}" class="block font-bold text-slate-900 text-lg hover:text-brand-600 transition line-clamp-2 mb-2">
                                        {{ $bestProduct->name }}
                                    </a>
                                </div>
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex flex-col">
                                        <span class="font-black text-slate-900 text-xl">{{ number_format($bestProduct->price ?? 0) }} <span class="text-xs font-normal text-gray-500">تومان</span></span>
                                    </div>
                                    <button class="w-10 h-10 rounded-full bg-slate-900 text-white flex items-center justify-center hover:bg-brand-600 transition shadow-md hover:shadow-brand-500/30" aria-label="Add to cart">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- STATIC FALLBACK IF NO DATA -->
                    @for($i=1; $i<=5; $i++)
                        <div class="group flex-shrink-0 w-64 md:w-72 bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 relative snap-center flex flex-col overflow-hidden">
                            <button class="absolute top-4 right-4 z-10 w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 transition shadow-sm"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></button>
                            <a href="#" class="block relative aspect-square bg-slate-50 overflow-hidden p-6 flex items-center justify-center">
                                <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Nike Shoe" class="w-full h-full object-contain img-zoom drop-shadow-lg">
                            </a>
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-1">نایک</span>
                                    <a href="#" class="block font-bold text-slate-900 text-lg hover:text-brand-600 transition line-clamp-2 mb-2">نایک ایر جردن ۱ مدل رترو</a>
                                </div>
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex flex-col">
                                        <span class="font-black text-slate-900 text-xl">۴,۵۰۰,۰۰۰ <span class="text-xs font-normal text-gray-500">تومان</span></span>
                                    </div>
                                    <button class="w-10 h-10 rounded-full bg-slate-900 text-white flex items-center justify-center hover:bg-brand-600 transition shadow-md hover:shadow-brand-500/30" aria-label="Add to cart"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg></button>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </section>

    <!-- SPECIAL OFFERS SECTION -->
    <section id="special-offers" class="py-20 bg-slate-950 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-brand-500/10 rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl transform -translate-x-1/2 translate-y-1/2"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-16">
                    <span class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-red-500/10 text-red-500 font-bold text-sm mb-4 border border-red-500/20">
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
                        پیشنهادات شگفت‌انگیز
                    </span>
                <h2 class="text-3xl md:text-4xl font-black text-white">تخفیف‌های ویژه این هفته</h2>
                <p class="text-slate-400 mt-4 text-lg">بهترین محصولات با تخفیف‌های باورنکردنی. فرصت را از دست ندهید.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @if(isset($discountsProduct) && count($discountsProduct) > 0)
                    @foreach($discountsProduct as $product)
                        @php
                            // Preserve requested logic
                            $bestVariant = isset($product->variants) ? $product->variants->whereNotNull('discount_price')->sortBy('discount_price')->first() : null;
                            $originalPrice = $bestVariant ? $bestVariant->price : ($product->price ?? 0);
                            $discountPrice = $bestVariant ? $bestVariant->discount_price : ($product->discount_price ?? 0);

                            // Calculate percentage
                            $discountPercent = 0;
                            if($originalPrice > 0 && $discountPrice > 0 && $originalPrice > $discountPrice) {
                                $discountPercent = round((($originalPrice - $discountPrice) / $originalPrice) * 100);
                            }
                        @endphp

                        <div class="group bg-white/5 backdrop-blur-md rounded-3xl border border-white/10 p-4 hover:bg-white/10 transition-all duration-300 relative flex flex-col">
                            @if($discountPercent > 0)
                                <div class="absolute top-6 right-6 z-10 bg-brand-500 text-white font-black text-sm px-3 py-1 rounded-full shadow-lg shadow-brand-500/30">
                                    {{ $discountPercent }}٪ تخفیف
                                </div>
                            @endif

                            <div class="relative aspect-square rounded-2xl overflow-hidden bg-white/5 p-6 mb-4 flex items-center justify-center">
                                <img src="{{ asset($product->image ?? 'images/default-sneaker.png') }}" alt="{{ $product->name }}" class="w-full h-full object-contain img-zoom drop-shadow-2xl">
                            </div>

                            <div class="flex-1 flex flex-col justify-between px-2 pb-2">
                                <a href="{{ route('shop', ['product' => $product->slug ?? $product->id]) }}" class="font-bold text-white text-xl hover:text-brand-400 transition line-clamp-2 mb-4">
                                    {{ $product->name }}
                                </a>

                                <div class="flex items-center justify-between">
                                    <div>
                                        @if($discountPrice > 0)
                                            <span class="block text-slate-400 line-through text-sm decoration-red-500">{{ number_format($originalPrice) }}</span>
                                            <span class="font-black text-brand-400 text-2xl">{{ number_format($discountPrice) }} <span class="text-xs text-slate-300 font-normal">تومان</span></span>
                                        @else
                                            <span class="font-black text-white text-2xl">{{ number_format($originalPrice) }} <span class="text-xs text-slate-300 font-normal">تومان</span></span>
                                        @endif
                                    </div>
                                    <button aria-label="Add to cart" class="w-12 h-12 rounded-full bg-brand-600 text-white flex items-center justify-center hover:bg-brand-500 transition shadow-lg shadow-brand-500/30">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- STATIC FALLBACK -->
                    @for($i=1; $i<=3; $i++)
                        <div class="group bg-white/5 backdrop-blur-md rounded-3xl border border-white/10 p-4 hover:bg-white/10 transition-all duration-300 relative flex flex-col">
                            <div class="absolute top-6 right-6 z-10 bg-brand-500 text-white font-black text-sm px-3 py-1 rounded-full shadow-lg shadow-brand-500/30">۲۰٪ تخفیف</div>
                            <div class="relative aspect-square rounded-2xl overflow-hidden bg-white/5 p-6 mb-4 flex items-center justify-center">
                                <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Discount Shoe" class="w-full h-full object-contain img-zoom drop-shadow-2xl">
                            </div>
                            <div class="flex-1 flex flex-col justify-between px-2 pb-2">
                                <a href="#" class="font-bold text-white text-xl hover:text-brand-400 transition line-clamp-2 mb-4">کتونی رانینگ ادیداس اولترابوست</a>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="block text-slate-400 line-through text-sm decoration-red-500">۵,۸۰۰,۰۰۰</span>
                                        <span class="font-black text-brand-400 text-2xl">۴,۶۴۰,۰۰۰ <span class="text-xs text-slate-300 font-normal">تومان</span></span>
                                    </div>
                                    <button class="w-12 h-12 rounded-full bg-brand-600 text-white flex items-center justify-center hover:bg-brand-500 transition"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></button>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </section>

    <!-- PROMOTIONAL BANNERS -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <!-- Banner 1 -->
                <div class="relative rounded-3xl overflow-hidden group aspect-[16/9] md:aspect-auto md:h-80 bg-slate-900 flex items-center">
                    <img src="https://images.unsplash.com/photo-1552346154-21d32810baa3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Men's Collection" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 group-hover:opacity-50 transition duration-700">
                    <div class="relative z-10 p-8 md:p-12 w-full">
                        <span class="text-brand-400 font-bold uppercase tracking-widest text-sm mb-2 block">کالکشن جدید</span>
                        <h3 class="text-3xl md:text-4xl font-black text-white mb-6">استایل مردانه</h3>
                        <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-white text-slate-900 font-bold rounded-full hover:bg-brand-500 hover:text-white transition">
                            خرید کنید
                            <svg class="w-4 h-4 mr-2 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Banner 2 -->
                <div class="relative rounded-3xl overflow-hidden group aspect-[16/9] md:aspect-auto md:h-80 bg-slate-900 flex items-center">
                    <img src="https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Women's Collection" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 group-hover:opacity-50 transition duration-700">
                    <div class="relative z-10 p-8 md:p-12 w-full">
                        <span class="text-brand-400 font-bold uppercase tracking-widest text-sm mb-2 block">فصل جدید</span>
                        <h3 class="text-3xl md:text-4xl font-black text-white mb-6">استایل زنانه</h3>
                        <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-white text-slate-900 font-bold rounded-full hover:bg-brand-500 hover:text-white transition">
                            خرید کنید
                            <svg class="w-4 h-4 mr-2 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW ARRIVALS SECTION -->
    <section id="new-arrivals" class="py-16 bg-slate-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-2xl md:text-3xl font-black text-slate-900">جدیدترین محصولات</h2>
                    <div class="w-16 h-1.5 bg-brand-500 rounded-full mt-2"></div>
                </div>
                <div class="flex gap-2">
                    <button type="button" id="btn-prev-new" aria-label="Previous" class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-slate-600 hover:bg-brand-50 hover:text-brand-600 hover:border-brand-300 transition shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                    <button type="button" id="btn-next-new" aria-label="Next" class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-slate-600 hover:bg-brand-50 hover:text-brand-600 hover:border-brand-300 transition shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                </div>
            </div>

            <div class="flex overflow-x-auto hide-scroll pb-8 gap-6 scroll-smooth snap-x snap-mandatory" id="new-slider">
                @if(isset($latestProducts) && count($latestProducts) > 0)
                    @foreach($latestProducts as $product)
                        @php
                            // Preserve requested logic
                            $finalVariant = isset($product->variants) ? $product->variants->first() : null;
                            $activeVariants = isset($product->variants) ? $product->variants : [];
                            $displayPrice = $finalVariant ? ($finalVariant->discount_price ?? $finalVariant->price) : ($product->price ?? 0);
                        @endphp

                        <div class="group flex-shrink-0 w-72 md:w-80 bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 relative snap-center flex flex-col">

                            <div class="absolute top-4 left-4 z-10 bg-slate-900 text-white font-bold text-xs px-2 py-1 rounded-md">جدید</div>

                            <button class="absolute top-4 right-4 z-10 w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 transition shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            </button>

                            <a href="{{ route('shop', ['product' => $product->slug ?? $product->id]) }}" class="block relative aspect-[4/3] bg-slate-50 overflow-hidden rounded-t-3xl p-4 flex items-center justify-center">
                                <img src="{{ asset($product->image ?? 'images/default-sneaker.png') }}" alt="{{ $product->name }}" class="w-full h-full object-contain img-zoom drop-shadow-md" loading="lazy">
                            </a>

                            <div class="p-6 flex-1 flex flex-col">
                                <a href="{{ route('shop', ['product' => $product->slug ?? $product->id]) }}" class="font-bold text-slate-900 text-lg hover:text-brand-600 transition line-clamp-2 mb-3">
                                    {{ $product->name }}
                                </a>

                                <!-- Variants info (Colors/Sizes) -->
                                <div class="mt-auto mb-4 border-t border-gray-100 pt-3">
                                    @if(count($activeVariants) > 0)
                                        <div class="flex items-center justify-between text-sm text-gray-500">
                                            <div class="flex -space-x-1 space-x-reverse">
                                                @foreach($activeVariants->take(3) as $variant)
                                                    @if(isset($variant->color))
                                                        <div class="w-4 h-4 rounded-full border-2 border-white shadow-sm" style="background-color: {{ $variant->color }}"></div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <span class="text-xs">{{ count($activeVariants) }} سایز موجود</span>
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-500">تک سایز</span>
                                    @endif
                                </div>

                                <div class="flex items-center justify-between">
                                    <span class="font-black text-slate-900 text-xl">{{ number_format($displayPrice) }} <span class="text-xs font-normal text-gray-500">تومان</span></span>
                                    <button class="flex items-center gap-1 text-sm font-bold text-brand-600 hover:text-brand-700 transition" aria-label="View Product">
                                        مشاهده
                                        <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- STATIC FALLBACK -->
                    @for($i=1; $i<=4; $i++)
                        <div class="group flex-shrink-0 w-72 md:w-80 bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 relative snap-center flex flex-col">
                            <div class="absolute top-4 left-4 z-10 bg-slate-900 text-white font-bold text-xs px-2 py-1 rounded-md">جدید</div>
                            <button class="absolute top-4 right-4 z-10 w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 transition shadow-sm"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg></button>
                            <a href="#" class="block relative aspect-[4/3] bg-slate-50 overflow-hidden rounded-t-3xl p-4 flex items-center justify-center">
                                <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="New Arrival" class="w-full h-full object-contain img-zoom drop-shadow-md">
                            </a>
                            <div class="p-6 flex-1 flex flex-col">
                                <a href="#" class="font-bold text-slate-900 text-lg hover:text-brand-600 transition line-clamp-2 mb-3">کتونی نیوبالانس ۵۵۰ اورجینال</a>
                                <div class="mt-auto mb-4 border-t border-gray-100 pt-3">
                                    <div class="flex items-center justify-between text-sm text-gray-500">
                                        <div class="flex -space-x-1 space-x-reverse">
                                            <div class="w-4 h-4 rounded-full border-2 border-white shadow-sm bg-white"></div>
                                            <div class="w-4 h-4 rounded-full border-2 border-white shadow-sm bg-blue-900"></div>
                                        </div>
                                        <span class="text-xs">۴ سایز موجود</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="font-black text-slate-900 text-xl">۶,۲۰۰,۰۰۰ <span class="text-xs font-normal text-gray-500">تومان</span></span>
                                    <button class="flex items-center gap-1 text-sm font-bold text-brand-600 hover:text-brand-700 transition">مشاهده <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></button>
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
<script>
    document.addEventListener('DOMContentLoaded', () => {

        /* --- Mobile Menu Logic --- */
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const closeBtn = document.getElementById('mobile-menu-close');
        const overlay = document.getElementById('mobile-menu-overlay');
        const drawer = document.getElementById('mobile-menu-drawer');
        const body = document.body;

        function openMenu() {
            overlay.classList.remove('hidden');
            // slight delay for transition
            setTimeout(() => {
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
                drawer.classList.remove('translate-x-full');
            }, 10);
            body.style.overflow = 'hidden';
        }

        function closeMenu() {
            drawer.classList.add('translate-x-full');
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300); // match duration
            body.style.overflow = '';
        }

        if(mobileBtn && closeBtn && overlay) {
            mobileBtn.addEventListener('click', openMenu);
            closeBtn.addEventListener('click', closeMenu);
            overlay.addEventListener('click', closeMenu);

            // Escape key
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

            // Amount to scroll (roughly one card width + gap)
            const scrollAmount = 300;

            // Note: In RTL, scrolling right (next) means subtracting scrollLeft, but
            // native behavior in modern browsers with dir="rtl" handles this via negative scrollLeft or logical translation.
            // We will use standard scrollBy which modern browsers map correctly based on direction,
            // or we explicitly set the sign based on direction.

            const isRTL = document.documentElement.dir === 'rtl';

            nextBtn.addEventListener('click', () => {
                // For RTL, "Next" visually means scrolling to the left
                container.scrollBy({ left: isRTL ? -scrollAmount : scrollAmount, behavior: 'smooth' });
            });

            prevBtn.addEventListener('click', () => {
                // For RTL, "Prev" visually means scrolling to the right
                container.scrollBy({ left: isRTL ? scrollAmount : -scrollAmount, behavior: 'smooth' });
            });
        }

        // Initialize Sliders
        initSlider('bestseller-slider', 'btn-prev-bestseller', 'btn-next-bestseller');
        initSlider('new-slider', 'btn-prev-new', 'btn-next-new');

        /* --- Optional: Make Categories Draggable/Scrollable with Mouse --- */
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
                const walk = (x - startX) * 2; // Scroll fast
                slider.scrollLeft = scrollLeft - walk;
            });
        });

    });
</script>
</body>
</html>
