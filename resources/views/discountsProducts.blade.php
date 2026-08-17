<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/image/fav.png">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <title>فروشگاه آنلاین دیجیتو</title>
</head>

<body class="max-w-[1700px] mx-auto">
<!-- progress bar -->
<div id="progressBar"></div>

@include('header')

<main class="mt-0 md:mt-8">
    <div class="flex flex-col lg:flex-row px-4 md:px-8 md:mt-10 gap-5 pb-20">
        <!-- filters -->
        <div class="lg:w-3/12 space-y-5">

            <form action="{{route('shop')}}" method="get">
                <div class="border border-zinc-100 h-fit rounded-2xl py-2 hover:shadow-sm transition-all">
                    <button class="flex justify-between w-full py-3 px-4 rounded-2xl cursor-pointer category-toggle">
                        <span class="text-zinc-700 text-sm">دسته بندی</span>
                        <img class="w-4 transition-transform opacity-80" src="./assets/image/icons/arrowDown.svg" alt="">
                    </button>
                    <ul class="submenu hidden mt-2 space-y-1">
                        @foreach($categories as $category)
                            <li>
                                <label class="block py-2 px-4 text-zinc-700 text-xs hover:bg-gray-100 rounded cursor-pointer">
                                    <input type="radio" name="category" value="{{ $category->id }}"
                                           class="hidden peer"
                                        {{ request('category') == $category->id ? 'checked' : '' }}>
                                    <span class="peer-checked:text-primary-500">{{ $category->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- برندها -->
                <div class="border border-zinc-100 h-fit rounded-2xl py-2 hover:shadow-sm transition-all">
                    <button class="flex justify-between w-full py-3 px-4 rounded-2xl cursor-pointer brand-toggle">
                        <span class="text-zinc-700 text-sm">برند ها</span>
                        <img class="w-4 transition-transform opacity-80" src="./assets/image/icons/arrowDown.svg" alt="">
                    </button>
                    <ul class="submenu hidden mt-2 space-y-1">
                        @foreach($brands as $brand)
                            <li class="flex items-center gap-x-2 py-1 px-4">
                                <input id="brand-{{ $brand->id }}" type="checkbox"
                                       name="brands[]" value="{{ $brand->id }}"
                                       class="h-4 w-4 accent-primary-500 cursor-pointer rounded-xl border-gray-300 bg-gray-100"
                                    {{ in_array($brand->id, request()->get('brands', [])) ? 'checked' : '' }}>
                                <label for="brand-{{ $brand->id }}" class="text-zinc-600 text-xs cursor-pointer">
                                    {{ $brand->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- فیلتر قیمت -->
                <div class="border border-zinc-100 h-fit rounded-2xl py-2 hover:shadow-sm transition-all">
                    <button class="flex justify-between w-full py-3 px-4 rounded-2xl cursor-pointer price-toggle">
                        <span class="text-zinc-700 text-sm">فیلتر بر اساس قیمت</span>
                        <img class="w-4 transition-transform opacity-80" src="./assets/image/icons/arrowDown.svg" alt="">
                    </button>
                    <div class="submenu hidden mt-2 px-6 space-y-4">
                        <div id="shop-price-slider"></div>
                        <div class="flex items-center justify-between text-red-400 text-xs font-semibold">
                            <span id="shop-price-slider-min"></span>
                            <span id="shop-price-slider-max"></span>
                            <input type="hidden" name="price_min" id="price_min" value="{{ request('price_min') }}">
                            <input type="hidden" name="price_max" id="price_max" value="{{ request('price_max') }}">

                        </div>
                    </div>
                </div>

                <!-- فقط کالاهای موجود -->
                <label class="border border-zinc-100 h-fit rounded-2xl hover:shadow-sm transition-all flex justify-between w-full py-5 px-4 cursor-pointer">
                    <span class="text-zinc-700 text-sm">فقط کالا های موجود</span>
                    <div class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="onlyAvailableDesktop" name="onlyAvailable" value="1"
                               {{ request()->has('onlyAvailable') ? 'checked' : '' }}
                               class="peer sr-only">

                        <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all peer-checked:bg-primary-400 peer-checked:after:translate-x-full"></div>
                    </div>
                </label>
            </form>

        </div>
        <!-- products -->
        <div class="lg:w-9/12">
            <div class="flex flex-wrap gap-3 md:gap-5 justify-start items-center bg-white shadow-box-sm rounded-3xl px-5 py-6 border border-zinc-100 mb-5">
                <div class="text-zinc-600 text-sm">مرتب سازی:</div>

                <a href="{{ request()->fullUrlWithQuery(['sort' => 'best_selling']) }}"
                   class="text-xs transition cursor-pointer {{ request('sort')=='best_selling' ? 'text-primary-500 font-bold' : 'text-zinc-500 hover:text-primary-400' }}">
                    پرفروش ترین
                </a>

                <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}"
                   class="text-xs transition cursor-pointer {{ request('sort')=='price_asc' ? 'text-primary-500 font-bold' : 'text-zinc-500 hover:text-primary-400' }}">
                    ارزان ترین
                </a>

                <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}"
                   class="text-xs transition cursor-pointer {{ request('sort')=='price_desc' ? 'text-primary-500 font-bold' : 'text-zinc-500 hover:text-primary-400' }}">
                    گران ترین
                </a>

                <a href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}"
                   class="text-xs transition cursor-pointer {{ request('sort')=='newest' ? 'text-primary-500 font-bold' : 'text-zinc-500 hover:text-primary-400' }}">
                    جدیدترین
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($results as $data)

                    @php
                        $variant = $data->variants
                            ->where('is_active', true)
                            ->whereNotNull('discount_price')
                            ->where('discount_price', '>', 0)
                            ->first();
                    @endphp

                    <div class="p-3 md:p-4 rounded-3xl border border-zinc-100 hover:shadow-lg transition relative flex flex-col">

                        {{-- عکس --}}
                        <a href="{{ route('product.details',['id'=>$data->id, 'slug'=>$data->slug]) }}" class="mb-4 block">
                            <img class="h-40 mx-auto object-contain"
                                 src="{{ asset('storage/' . ($data->images[0] ?? 'defaults/no-image.png')) }}"
                                 alt="{{ $data->name }}" />
                        </a>

                        {{-- نام محصول --}}
                        <a href="{{ route('product.details',['id'=>$data->id, 'slug'=>$data->slug]) }}"
                           class="text-xs md:text-sm font-semibold text-zinc-700 line-clamp-2 mb-3">
                            {{ $data->name }}
                        </a>

                        <div class="border-b border-dashed border-zinc-200 mb-4"></div>

                        {{-- قیمت --}}
                        <div class="mt-auto flex justify-between items-center">

                            <a href="{{ route('product.details',['id'=>$data->id, 'slug'=>$data->slug]) }}"
                               class="bg-primary-500 hover:bg-primary-400 px-3 py-2 rounded-xl shadow-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-6 h-6 stroke-white"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </a>

                            <div class="flex items-center gap-1">

                                @if($variant)
                                    <div class="flex flex-col text-right">
                        <span class="text-xl md:text-2xl text-red-600 font-bold">
                            {{ number_format($variant->discount_price) }}
                        </span>

                                        <span class="text-sm md:text-base text-zinc-500 line-through">
                            {{ number_format($variant->price) }}
                        </span>
                                    </div>
                                @endif

                                <span class="text-xs md:text-sm text-zinc-400 -rotate-90">تومان</span>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- pagination -->
    <div class="flex justify-center mb-12">
        {{-- Previous Page --}}
        @if($results->onFirstPage())
            <span class="flex items-center justify-center px-3.5 md:px-4 py-2 mx-1 text-gray-400 bg-white rounded-md cursor-not-allowed -scale-x-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 md:size-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </span>
        @else
            <a href="{{ $results->previousPageUrl() }}" class="flex items-center justify-center px-3.5 md:px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md -scale-x-100 hover:bg-primary-500 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 md:size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($results->getUrlRange(1, $results->lastPage()) as $page => $url)
            @if($page == $results->currentPage())
                <span class="border border-zinc-100 text-sm md:text-base px-3.5 md:px-4 py-2 mx-1 bg-primary-500 text-white rounded-md">{{ $page }}</span>
            @elseif($page == 1 || $page == $results->lastPage() || ($page >= $results->currentPage() - 1 && $page <= $results->currentPage() + 1))
                <a href="{{ $url }}" class="border border-zinc-100 text-sm md:text-base px-3.5 md:px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md hover:bg-primary-500 hover:text-white">{{ $page }}</a>
            @elseif($page == $results->currentPage() - 2 || $page == $results->currentPage() + 2)
                <span class="border border-zinc-100 text-sm md:text-base px-3.5 md:px-4 py-2 mx-1 text-gray-700 bg-white rounded-md">...</span>
            @endif
        @endforeach

        {{-- Next Page --}}
        @if($results->hasMorePages())
            <a href="{{ $results->nextPageUrl() }}" class="flex items-center justify-center px-3.5 md:px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md -scale-x-100 hover:bg-primary-500 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 md:size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        @else
            <span class="flex items-center justify-center px-3.5 md:px-4 py-2 mx-1 text-gray-400 bg-white rounded-md cursor-not-allowed -scale-x-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 md:size-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </span>
        @endif
    </div>
</main>

@include('footer')
</body>
<script>
    document.querySelectorAll('.category-toggle, .brand-toggle, .price-toggle')
        .forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault(); // جلوی submit فرم رو می‌گیره

                const submenu = btn.nextElementSibling;
                submenu.classList.toggle('hidden'); // باز/بسته کردن زیرمنو
                btn.querySelector('img').classList.toggle('rotate-180'); // چرخش فلش
            });
        });
    document.querySelectorAll('input[name="category"], input[name="brands[]"], input[name="onlyAvailable"]')
        .forEach(input => {
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
