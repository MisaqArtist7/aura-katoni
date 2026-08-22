<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

{{--    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">--}}

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

    {!! SEO::generate() !!}
</head>

<body class="max-w-[1700px] mx-auto bg-gray-50/30 text-gray-800 antialiased font-sans">
<!-- progress bar -->
<div id="progressBar" class="fixed top-0 left-0 h-1 bg-primary-500 z-50 transition-all duration-300"></div>

@include('header')

<main class="mt-4 md:mt-8 px-4 md:px-8 max-w-7xl mx-auto pb-20">

    <div class="flex flex-col lg:flex-row gap-6 md:gap-8 lg:items-start">

        <!-- Sidebar / Filters -->
        <aside class="lg:w-1/4 w-full sticky top-24 space-y-3 shrink-0 dir-rtl">
            <form action="{{ route('shop') }}" method="get" id="shop-filter-form" class="space-y-3">

                <!-- دسته بندی -->
                <div class="bg-white border border-slate-100 rounded-2xl p-1.5 shadow-sm hover:border-slate-200 transition-all duration-200">
                    <details class="group" {{ request('category') ? 'open' : '' }}>
                        <summary class="flex justify-between items-center w-full py-2.5 px-3 rounded-xl cursor-pointer select-none list-none">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center group-hover:bg-brand-50 group-hover:text-brand-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                    </svg>
                                </div>
                                <span class="text-slate-800 font-bold text-sm">دسته‌بندی‌ها</span>
                            </div>
                            <div class="w-7 h-7 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-open:rotate-180 transition-transform duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </summary>
                        
                        <ul class="mt-2 space-y-1 px-1 pb-2 border-t border-slate-50 pt-2 max-h-56 overflow-y-auto custom-scrollbar">
                            @foreach($categories as $category)
                                <li>
                                    <label class="flex items-center gap-2.5 py-2 px-3 text-slate-600 text-sm hover:bg-slate-50 rounded-xl cursor-pointer transition-colors group/item">
                                        <input type="radio" name="category" value="{{ $category->id }}"
                                            class="hidden peer"
                                            {{ request('category') == $category->id ? 'checked' : '' }}>
                                        <div class="w-4 h-4 rounded-full border-2 border-slate-300 peer-checked:border-brand-600 peer-checked:border-[5px] transition-all"></div>
                                        <span class="peer-checked:text-brand-600 peer-checked:font-bold text-slate-700 group-hover/item:text-slate-900 transition-colors">{{ $category->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </details>
                </div>

                <!-- برندها -->
                <div class="bg-white border border-slate-100 rounded-2xl p-1.5 shadow-sm hover:border-slate-200 transition-all duration-200">
                    <details class="group" {{ request('brands') ? 'open' : '' }}>
                        <summary class="flex justify-between items-center w-full py-2.5 px-3 rounded-xl cursor-pointer select-none list-none">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center group-hover:bg-brand-50 group-hover:text-brand-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                                <span class="text-slate-800 font-bold text-sm">برندها</span>
                            </div>
                            <div class="w-7 h-7 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-open:rotate-180 transition-transform duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </summary>
                        
                        <ul class="mt-2 space-y-1 px-1 pb-2 border-t border-slate-50 pt-2 max-h-56 overflow-y-auto custom-scrollbar">
                            @foreach($brands as $brand)
                                <li>
                                    <label for="brand-{{ $brand->id }}" class="flex items-center gap-3 py-2 px-3 hover:bg-slate-50 rounded-xl cursor-pointer transition-colors group/item">
                                        <div class="relative flex items-center justify-center">
                                            <input id="brand-{{ $brand->id }}" type="checkbox"
                                                name="brands[]" value="{{ $brand->id }}"
                                                class="peer appearance-none w-4 h-4 border-2 border-slate-300 rounded-md checked:bg-brand-600 checked:border-brand-600 cursor-pointer transition-all"
                                                {{ in_array($brand->id, request()->get('brands', [])) ? 'checked' : '' }}>
                                            <svg class="absolute w-3 h-3 text-white opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                        <span class="text-slate-600 text-sm group-hover/item:text-slate-900 transition-colors">{{ $brand->name }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </details>
                </div>

                <!-- فیلتر قیمت -->
                <div class="bg-white border border-slate-100 rounded-2xl p-1.5 shadow-sm hover:border-slate-200 transition-all duration-200">
                    <details class="group" {{ (request('price_min') || request('price_max')) ? 'open' : '' }}>
                        <summary class="flex justify-between items-center w-full py-2.5 px-3 rounded-xl cursor-pointer select-none list-none">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center group-hover:bg-brand-50 group-hover:text-brand-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <span class="text-slate-800 font-bold text-sm">محدوده قیمت</span>
                            </div>
                            <div class="w-7 h-7 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-open:rotate-180 transition-transform duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </summary>
                        
                        <div class="px-3 pb-3 border-t border-slate-50 pt-4 space-y-4">
                            <div id="shop-price-slider" class="my-3"></div>
                            <div class="flex items-center justify-between text-slate-700 text-xs font-bold bg-slate-50 p-2.5 rounded-xl border border-slate-100 dir-rtl">
                                <div class="flex items-center gap-1"><span id="shop-price-slider-min">۰</span> تومان</div>
                                <span class="text-slate-300">-</span>
                                <div class="flex items-center gap-1"><span id="shop-price-slider-max">بی‌نهایت</span> تومان</div>
                            </div>
                            <input type="hidden" name="price_min" id="price_min" value="{{ request('price_min', 0) }}">
                            <input type="hidden" name="price_max" id="price_max" value="{{ request('price_max', 20000000) }}">
                        </div>
                    </details>
                </div>

                <!-- فقط کالاهای موجود (با رنگ روشن و مشخص هنگام فعال‌سازی) -->
                <label class="bg-white border border-slate-100 hover:border-slate-200 shadow-sm rounded-2xl flex items-center justify-between w-full py-3.5 px-4 cursor-pointer transition-all duration-200">
                    <span class="text-slate-800 font-bold text-sm">فقط کالاهای موجود</span>
                    <div class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="onlyAvailableDesktop" name="onlyAvailable" value="1"
                            {{ request()->has('onlyAvailable') ? 'checked' : '' }}
                            class="peer sr-only">
                        <!-- تغییر رنگ پس‌زمینه به سبز/امبر فعال و روشن‌تر شدن دکمه چرخان -->
                        <div class="peer h-6 w-11 rounded-full bg-slate-200 transition-all duration-300
                                    after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:shadow-md
                                    peer-checked:bg-emerald-500 peer-checked:after:translate-x-full"></div>
                    </div>
                </label>

                <!-- Submit & Clear Buttons -->
                <div class="pt-1 flex gap-2">
                    <button type="submit" class="flex-1 py-3 bg-slate-900 text-white rounded-xl text-xs font-extrabold hover:bg-brand-600 transition-colors shadow-sm cursor-pointer">
                        اعمال فیلترها
                    </button>
                    @if(request()->anyFilled(['category', 'brands', 'price_min', 'price_max', 'onlyAvailable']))
                        <a href="{{ route('shop') }}" class="px-3.5 py-3 bg-red-50 text-red-500 rounded-xl text-xs font-bold hover:bg-red-100 transition-colors flex items-center justify-center">
                            حذف
                        </a>
                    @endif
                </div>

            </form>
        </aside>

<!-- اسکریپت راه‌اندازی noUiSlider جهت فعال‌سازی اسلایدر قیمت -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('shop-price-slider');
    const minInput = document.getElementById('price_min');
    const maxInput = document.getElementById('price_max');
    const minLabel = document.getElementById('shop-price-slider-min');
    const maxLabel = document.getElementById('shop-price-slider-max');

    if (slider && typeof noUiSlider !== 'undefined') {
        const minVal = parseInt(minInput.value) || 0;
        const maxVal = parseInt(maxInput.value) || 20000000;

        noUiSlider.create(slider, {
            start: [minVal, maxVal],
            connect: true,
            direction: 'rtl',
            step: 50000,
            range: {
                'min': 0,
                'max': 20000000
            }
        });

        slider.noUiSlider.on('update', function (values, handle) {
            const min = Math.round(values[0]);
            const max = Math.round(values[1]);

            minInput.value = min;
            maxInput.value = max;

            if (minLabel) minLabel.innerText = new Intl.NumberFormat('fa-IR').format(min);
            if (maxLabel) maxLabel.innerText = new Intl.NumberFormat('fa-IR').format(max);
        });
    }
});
</script>

        <!-- Main Content (Products) -->
        <div class="lg:w-3/4 w-full flex-1">

            <!-- Sorting Bar -->
            <div class="bg-white shadow-sm rounded-2xl p-2 border border-slate-100 mb-6 md:mb-8 overflow-x-auto hide-scrollbar dir-rtl">
                <div class="flex items-center gap-1.5 min-w-max">
                    
                    <!-- Label -->
                    <div class="text-slate-500 text-xs font-bold px-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                        </svg>
                        مرتب‌سازی:
                    </div>

                    <!-- Option: Best Selling -->
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'best_selling']) }}"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all duration-200 flex items-center gap-1.5 {{ request('sort')=='best_selling' || !request('sort') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        @if(request('sort')=='best_selling' || !request('sort'))
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-500"></span>
                        @endif
                        پرفروش‌ترین
                    </a>

                    <!-- Option: Newest -->
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all duration-200 flex items-center gap-1.5 {{ request('sort')=='newest' ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        @if(request('sort')=='newest')
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-500"></span>
                        @endif
                        جدیدترین
                    </a>

                    <!-- Option: Price Low to High -->
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all duration-200 flex items-center gap-1.5 {{ request('sort')=='price_asc' ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        @if(request('sort')=='price_asc')
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-500"></span>
                        @endif
                        ارزان‌ترین
                    </a>

                    <!-- Option: Price High to Low -->
                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}"
                        class="px-3.5 py-2 rounded-xl text-xs font-bold transition-all duration-200 flex items-center gap-1.5 {{ request('sort')=='price_desc' ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        @if(request('sort')=='price_desc')
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-500"></span>
                        @endif
                        گران‌ترین
                    </a>

                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-5 dir-rtl">
                @foreach($results as $product)
                    @php
                        $cheapestVariant = $product->variants->where('is_active', true)->sortBy('price')->first();
                        $mainImage = $product->images[0] ?? 'defaults/no-image.png';
                    @endphp

                    <!-- Product Card -->
                    <div class="group relative flex flex-col bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-xl hover:shadow-brand-500/10 hover:border-brand-200 hover:-translate-y-1 transition-all duration-300 overflow-hidden h-full">

                        <!-- Top Highlight Glow -->
                        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-brand-500 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20"></div>

                        <!-- Discount Badge -->
                        @if($cheapestVariant && $cheapestVariant->discount_price)
                            @php
                                $discountPercent = round((($cheapestVariant->price - $cheapestVariant->discount_price) / $cheapestVariant->price) * 100);
                            @endphp
                            <div class="absolute top-3 right-3 z-10">
                                <span class="bg-red-500 text-white text-[10px] sm:text-xs font-extrabold px-2 py-1 rounded-lg shadow-sm">
                                    {{ $discountPercent }}٪ تخفیف
                                </span>
                            </div>
                        @endif

                        <!-- Image Container -->
                        <a href="{{ route('product.details',['id'=>$product->id, 'slug'=>$product->slug]) }}" class="relative aspect-square overflow-hidden p-4 sm:p-5 flex items-center justify-center transition-colors">
                            <img class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 ease-out"
                                src="{{ asset('storage/' . $mainImage) }}"
                                alt="{{ $product->title ?? $product->name }}" 
                                loading="lazy"/>
                        </a>

                        <!-- Content Container -->
                        <div class="p-4 sm:p-5 flex-1 flex flex-col justify-between">
                            
                            <!-- Product Title -->
                            <div>
                                <a href="{{ route('product.details',['id'=>$product->id, 'slug'=>$product->slug]) }}" class="block font-bold text-slate-800 text-xs sm:text-sm md:text-base group-hover:text-brand-600 transition-colors duration-300 line-clamp-2 leading-relaxed mb-3">
                                    {{ $product->name }}
                                </a>
                            </div>

                            <!-- Footer: Price & Cart Button -->
                            <div class="flex items-center justify-between gap-2 mt-2 pt-3 border-t border-slate-50">
                                
                                <!-- Action Button -->
                                <a href="{{ route('product.details',['id'=>$product->id, 'slug'=>$product->slug]) }}" 
                                class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center hover:bg-brand-600 transition-all duration-300 shadow-sm hover:shadow-brand-500/30 group-hover:scale-105 shrink-0" 
                                aria-label="مشاهده محصول">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </a>

                                <!-- Price Info -->
                                <div class="flex flex-col items-end text-left">
                                    @if($cheapestVariant)
                                        @if($cheapestVariant->discount_price)
                                            <span class="text-[10px] sm:text-xs text-slate-400 line-through font-medium">
                                                {{ number_format($cheapestVariant->price) }}
                                            </span>
                                            <div class="flex items-center gap-1">
                                                <span class="text-sm sm:text-base md:text-lg font-extrabold text-slate-900">
                                                    {{ number_format($cheapestVariant->discount_price) }}
                                                </span>
                                                <span class="text-[10px] sm:text-xs font-normal text-slate-400">تومان</span>
                                            </div>
                                        @else
                                            <div class="flex items-center gap-1">
                                                <span class="text-sm sm:text-base md:text-lg font-extrabold text-slate-900">
                                                    {{ number_format($cheapestVariant->price) }}
                                                </span>
                                                <span class="text-[10px] sm:text-xs font-normal text-slate-400">تومان</span>
                                            </div>
                                        @endif
                                    @else
                                        <span class="text-xs sm:text-sm font-bold text-red-500/80 bg-red-50 px-2.5 py-1 rounded-lg">
                                            ناموجود
                                        </span>
                                    @endif
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($results->hasPages())
                <div class="flex justify-center mt-12 mb-8">
                    <nav class="flex items-center gap-1 bg-white border border-gray-100 p-1.5 rounded-2xl shadow-sm">
                        {{-- Previous Page --}}
                        @if($results->onFirstPage())
                            <span class="flex items-center justify-center w-10 h-10 text-gray-300 cursor-not-allowed -scale-x-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                            </span>
                        @else
                            <a href="{{ $results->previousPageUrl() }}" class="flex items-center justify-center w-10 h-10 text-gray-500 rounded-xl hover:bg-gray-50 transition-colors -scale-x-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                            </a>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($results->getUrlRange(1, $results->lastPage()) as $page => $url)
                            @if($page == $results->currentPage())
                                <span class="flex items-center justify-center w-10 h-10 bg-primary-500 text-white rounded-xl font-bold text-sm shadow-md shadow-primary-500/30">{{ $page }}</span>
                            @elseif($page == 1 || $page == $results->lastPage() || ($page >= $results->currentPage() - 1 && $page <= $results->currentPage() + 1))
                                <a href="{{ $url }}" class="flex items-center justify-center w-10 h-10 text-gray-600 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors">{{ $page }}</a>
                            @elseif($page == $results->currentPage() - 2 || $page == $results->currentPage() + 2)
                                <span class="flex items-center justify-center w-10 h-10 text-gray-400">...</span>
                            @endif
                        @endforeach

                        {{-- Next Page --}}
                        @if($results->hasMorePages())
                            <a href="{{ $results->nextPageUrl() }}" class="flex items-center justify-center w-10 h-10 text-gray-500 rounded-xl hover:bg-gray-50 transition-colors -scale-x-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                            </a>
                        @else
                            <span class="flex items-center justify-center w-10 h-10 text-gray-300 cursor-not-allowed -scale-x-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                            </span>
                        @endif
                    </nav>
                </div>
            @endif

        </div>
    </div>
</main>

@include('footer')

</body>
<script>
    // Toggle for accordion
    document.querySelectorAll('.category-toggle, .brand-toggle, .price-toggle').forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            const submenu = btn.nextElementSibling;

            // Smooth toggle
            if (submenu.classList.contains('hidden')) {
                submenu.classList.remove('hidden');
                submenu.classList.add('animate-fadeIn');
                btn.querySelector('img').style.transform = "rotate(180deg)";
            } else {
                submenu.classList.add('hidden');
                btn.querySelector('img').style.transform = "rotate(0deg)";
            }
        });
    });

    // Auto submit form on input change
    document.querySelectorAll('input[name="category"], input[name="brands[]"], input[name="onlyAvailable"]').forEach(input => {
        input.addEventListener('change', () => {
            input.closest('form').submit();
        });
    });
</script>

<script src="./assets/js/swiper.min.js"></script>
<script src="./assets/js/sliders.js"></script>
<script src="./assets/js/nouislider.min.js"></script>
<script src="./assets/js/main.js"></script>

</html>
