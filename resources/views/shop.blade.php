<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

{{--    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">--}}

    {!! SEO::generate() !!}
</head>

<body class="max-w-[1700px] mx-auto bg-gray-50/30 text-gray-800 antialiased font-sans">
<!-- progress bar -->
<div id="progressBar" class="fixed top-0 left-0 h-1 bg-primary-500 z-50 transition-all duration-300"></div>

@include('header')

<main class="mt-4 md:mt-8 px-4 md:px-8 max-w-7xl mx-auto pb-20">

    <div class="flex flex-col lg:flex-row gap-6 md:gap-8 lg:items-start">

        <!-- Sidebar / Filters -->
        <aside class="lg:w-1/4 w-full sticky top-24 space-y-4 shrink-0">
            <form action="{{route('shop')}}" method="get" class="space-y-4">

                <!-- دسته بندی -->
                <div class="bg-white border border-gray-100 rounded-3xl p-2 hover:border-gray-200 transition-colors shadow-sm">
                    <button class="flex justify-between items-center w-full py-3 px-4 rounded-2xl cursor-pointer category-toggle group">
                        <span class="text-gray-700 font-medium text-sm">دسته‌بندی‌ها</span>
                        <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group-hover:bg-gray-100 transition-colors">
                            <img class="w-3.5 transition-transform opacity-60" src="./assets/image/icons/arrowDown.svg" alt="">
                        </div>
                    </button>
                    <ul class="submenu hidden mt-1 space-y-1 px-2 pb-2">
                        @foreach($categories as $category)
                            <li>
                                <label class="flex items-center gap-2 py-2.5 px-3 text-gray-600 text-sm hover:bg-gray-50 rounded-xl cursor-pointer transition-colors">
                                    <input type="radio" name="category" value="{{ $category->id }}"
                                           class="hidden peer"
                                        {{ request('category') == $category->id ? 'checked' : '' }}>
                                    <div class="w-4 h-4 rounded-full border-2 border-gray-300 peer-checked:border-primary-500 peer-checked:border-[5px] transition-all"></div>
                                    <span class="peer-checked:text-primary-600 peer-checked:font-medium transition-colors">{{ $category->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- برندها -->
                <div class="bg-white border border-gray-100 rounded-3xl p-2 hover:border-gray-200 transition-colors shadow-sm">
                    <button class="flex justify-between items-center w-full py-3 px-4 rounded-2xl cursor-pointer brand-toggle group">
                        <span class="text-gray-700 font-medium text-sm">برندها</span>
                        <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group-hover:bg-gray-100 transition-colors">
                            <img class="w-3.5 transition-transform opacity-60" src="./assets/image/icons/arrowDown.svg" alt="">
                        </div>
                    </button>
                    <ul class="submenu hidden mt-1 space-y-1 px-2 pb-2">
                        @foreach($brands as $brand)
                            <li>
                                <label for="brand-{{ $brand->id }}" class="flex items-center gap-x-3 py-2.5 px-3 hover:bg-gray-50 rounded-xl cursor-pointer transition-colors group">
                                    <div class="relative flex items-center justify-center">
                                        <input id="brand-{{ $brand->id }}" type="checkbox"
                                               name="brands[]" value="{{ $brand->id }}"
                                               class="peer appearance-none w-5 h-5 border-2 border-gray-300 rounded-lg checked:bg-primary-500 checked:border-primary-500 cursor-pointer transition-colors"
                                            {{ in_array($brand->id, request()->get('brands', [])) ? 'checked' : '' }}>
                                        <svg class="absolute w-3.5 h-3.5 text-white opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    <span class="text-gray-600 text-sm group-hover:text-gray-900 transition-colors">{{ $brand->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- فیلتر قیمت -->
                <div class="bg-white border border-gray-100 rounded-3xl p-2 hover:border-gray-200 transition-colors shadow-sm">
                    <button class="flex justify-between items-center w-full py-3 px-4 rounded-2xl cursor-pointer price-toggle group">
                        <span class="text-gray-700 font-medium text-sm">محدوده قیمت</span>
                        <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center group-hover:bg-gray-100 transition-colors">
                            <img class="w-3.5 transition-transform opacity-60" src="./assets/image/icons/arrowDown.svg" alt="">
                        </div>
                    </button>
                    <div class="submenu hidden mt-4 px-5 pb-5 space-y-6">
                        <div id="shop-price-slider" class="mt-4"></div>
                        <div class="flex items-center justify-between text-gray-700 text-sm font-medium bg-gray-50 p-3 rounded-xl border border-gray-100">
                            <div class="flex items-center gap-1"><span id="shop-price-slider-min"></span></div>
                            <span class="text-gray-300">-</span>
                            <div class="flex items-center gap-1"><span id="shop-price-slider-max"></span></div>
                            <input type="hidden" name="price_min" id="price_min" value="{{ request('price_min') }}">
                            <input type="hidden" name="price_max" id="price_max" value="{{ request('price_max') }}">
                        </div>
                    </div>
                </div>

                <!-- فقط کالاهای موجود -->
                <label class="bg-white border border-gray-100 hover:border-gray-200 shadow-sm rounded-3xl flex items-center justify-between w-full py-4 px-5 cursor-pointer transition-colors">
                    <span class="text-gray-700 font-medium text-sm">فقط کالاهای موجود</span>
                    <div class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="onlyAvailableDesktop" name="onlyAvailable" value="1"
                               {{ request()->has('onlyAvailable') ? 'checked' : '' }}
                               class="peer sr-only">
                        <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:shadow-sm peer-checked:bg-primary-500 peer-checked:after:translate-x-full"></div>
                    </div>
                </label>
            </form>
        </aside>

        <!-- Main Content (Products) -->
        <div class="lg:w-3/4 w-full flex-1">

            <!-- Sorting Bar -->
            <div class="bg-white shadow-sm rounded-3xl p-2 md:p-3 border border-gray-100 mb-6 md:mb-8 overflow-x-auto hide-scrollbar">
                <div class="flex items-center gap-1 md:gap-2 min-w-max">
                    <div class="text-gray-500 text-sm font-medium px-3 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                        </svg>
                        مرتب‌سازی:
                    </div>

                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'best_selling']) }}"
                       class="px-4 py-2 rounded-xl text-sm transition-all duration-300 {{ request('sort')=='best_selling' || !request('sort') ? 'bg-primary-50 text-primary-600 font-bold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        پرفروش‌ترین
                    </a>

                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}"
                       class="px-4 py-2 rounded-xl text-sm transition-all duration-300 {{ request('sort')=='newest' ? 'bg-primary-50 text-primary-600 font-bold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        جدیدترین
                    </a>

                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}"
                       class="px-4 py-2 rounded-xl text-sm transition-all duration-300 {{ request('sort')=='price_asc' ? 'bg-primary-50 text-primary-600 font-bold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        ارزان‌ترین
                    </a>

                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}"
                       class="px-4 py-2 rounded-xl text-sm transition-all duration-300 {{ request('sort')=='price_desc' ? 'bg-primary-50 text-primary-600 font-bold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        گران‌ترین
                    </a>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-5">
                @foreach($results as $product)
                    <div class="bg-white rounded-3xl border border-gray-100 hover:border-gray-200 hover:shadow-xl hover:shadow-gray-200/40 transition-all duration-300 p-2 sm:p-3 group relative flex flex-col">

                        @php
                            $cheapestVariant = $product->variants->where('is_active', true)->sortBy('price')->first();
                            $mainImage = $product->images[0] ?? 'defaults/no-image.png';
                        @endphp

                            <!-- Image Container -->
                        <a href="{{ route('product.details',['id'=>$product->id, 'slug'=>$product->slug]) }}" class="relative rounded-2xl overflow-hidden aspect-square bg-gray-50 mb-3 sm:mb-4 block">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                 src="{{ asset('storage/' . $mainImage) }}"
                                 alt="{{ $product->title ?? $product->name }}" />

                            <!-- Discount Badge -->
                            @if($cheapestVariant && $cheapestVariant->discount_price)
                                @php
                                    $discountPercent = round((($cheapestVariant->price - $cheapestVariant->discount_price) / $cheapestVariant->price) * 100);
                                @endphp
                                <span class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-lg">
                                        {{ $discountPercent }}٪ تخفیف
                                    </span>
                            @endif
                        </a>

                        <!-- Content -->
                        <div class="px-1 sm:px-2 flex-1 flex flex-col">

                            <a href="{{ route('product.details',['id'=>$product->id, 'slug'=>$product->slug]) }}" class="text-sm font-medium text-gray-800 hover:text-primary-500 transition-colors line-clamp-2 mb-4 min-h-[40px] leading-relaxed">
                                {{ $product->name }}
                            </a>

                            <div class="mt-auto flex items-end justify-between gap-2">
                                <!-- Cart Button -->
                                <a href="{{ route('product.details',['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-gray-50 hover:bg-primary-500 text-gray-500 hover:text-white flex items-center justify-center transition-colors duration-300 shrink-0 shadow-sm hover:shadow-primary-500/30">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                </a>

                                <!-- Price -->
                                <div class="flex flex-col items-end text-left">
                                    @if($cheapestVariant)
                                        @if($cheapestVariant->discount_price)
                                            <div class="flex items-center gap-1.5 opacity-50 mb-0.5">
                                                <span class="text-[11px] sm:text-xs line-through">{{ number_format($cheapestVariant->price) }}</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <span class="text-base sm:text-lg font-bold text-gray-900">{{ number_format($cheapestVariant->discount_price) }}</span>
                                                <span class="text-[10px] sm:text-xs text-gray-500 font-medium">تومان</span>
                                            </div>
                                        @else
                                            <div class="flex items-center gap-1 mt-4">
                                                <span class="text-base sm:text-lg font-bold text-gray-900">{{ number_format($cheapestVariant->price) }}</span>
                                                <span class="text-[10px] sm:text-xs text-gray-500 font-medium">تومان</span>
                                            </div>
                                        @endif
                                    @else
                                        <span class="text-sm font-medium text-gray-400 mt-4">ناموجود</span>
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
