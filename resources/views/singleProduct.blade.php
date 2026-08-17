<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="{{ asset('./assets/css/main.css') }}">

    {!! SEO::generate() !!}

    <style>
        @keyframes fadeIn {
            0% {opacity:0; transform: translateY(-5px);}
            100% {opacity:1; transform: translateY(0);}
        }
        .animate-fadeIn {
            animation: fadeIn 0.3s ease forwards;
        }
    </style>

</head>

<body class="max-w-[1700px] mx-auto">

  <!-- loading -->
  @if(session('error'))
      <script>
          Swal.fire({
              icon: 'error',
              title: 'خطا',
              text: "{{ session('error') }}",
              confirmButtonText: 'باشه'
          });
      </script>
  @endif

  @if(session('success'))
      <script>
          Swal.fire({
              icon: 'success',
              title: 'موفقیت',
              text: "{{ session('success') }}",
              confirmButtonText: 'باشه'
          });
      </script>
  @endif

<!-- loading -->
{{--@if(session('error'))--}}
{{--    <script>--}}
{{--        alert("خطا: {{ session('error') }}");--}}
{{--    </script>--}}
{{--@endif--}}

{{--@if(session('success'))--}}
{{--    <script>--}}
{{--        alert("موفقیت: {{ session('success') }}");--}}
{{--    </script>--}}
{{--@endif--}}


  <!-- progress bar -->
  <div id="progressBar"></div>

@include('header')
  <main class="mt-0 md:mt-8">
    <div class="px-4 md:px-8 md:mt-10 pb-20">
      <div class="flex flex-col lg:flex-row gap-8">
        <!-- photo -->
        <div class="lg:w-4/12">
            <div class="flex gap-x-5 pr-10">

              <a href="#" class="relative" onclick="copyToClipboard(event)">
                <div class="group cursor-pointer relative inline-block text-center">
                    <svg class="fill-zinc-700 hover:fill-zinc-800 transition" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 256 256">
                        <path d="M176,160a39.89,39.89,0,0,0-28.62,12.09l-46.1-29.63a39.8,39.8,0,0,0,0-28.92l46.1-29.63a40,40,0,1,0-8.66-13.45l-46.1,29.63a40,40,0,1,0,0,55.82l46.1,29.63A40,40,0,1,0,176,160Zm0-128a24,24,0,1,1-24,24A24,24,0,0,1,176,32ZM64,152a24,24,0,1,1,24-24A24,24,0,0,1,64,152Zm112,72a24,24,0,1,1,24-24A24,24,0,0,1,176,224Z"></path>
                    </svg>
                    <div class="opacity-0 w-28 transition-all bg-zinc-800 text-white text-center text-xs rounded-lg py-2 absolute z-10 -left-11 group-hover:opacity-100 px-3 pointer-events-none">
                        اشتراک گذاری
                        <svg class="absolute text-black h-2 w-full left-0 bottom-full rotate-180" x="0px" y="0px" viewBox="0 0 255 255">
                            <polygon class="fill-current" points="0,0 127.5,127.5 255,0"></polygon>
                        </svg>
                    </div>
                </div>
              </a>
            </div>

            @php
                $images = $product->images ?: ['defaults/no-image.png'];
            @endphp
            <div class="relative">
              <div class="flex gap-4 justify-center">
                  <div id="zoomBox" class="hidden absolute -left-56 top-0 md:size-64 bg-no-repeat bg-cover border-2 border-gray-300 rounded-md bg-white"></div>
                  <div class="relative overflow-hidden group">
                      <img id="mainImage" src="{{ asset('assets/image/5884168722841275919.jpg') }}"
                           class="w-full max-w-96 object-cover rounded-lg"
                           alt="{{ $product->title }}">
                      
                      <div id="zoomLens" class="hidden absolute w-20 h-20 bg-gray-300 opacity-30 pointer-events-none"></div>
                  </div>
              </div>
              <div class="flex justify-start gap-2 mt-4 overflow-x-auto">
                  @foreach($images as $image)
                      <img src="{{ asset('storage/'.$image) }}"
                           class="w-20 h-20 object-cover rounded-md cursor-pointer border border-zinc-200 hover:border-zinc-400 opacity-80 hover:opacity-100 transition-all"
                           onclick="changeImage(this)"
                           alt="{{ $product->title }}">
                  @endforeach

              </div>
            </div>
        </div>
        <!-- info -->
        <div class="lg:w-5/12">
          <div class="mb-7 text-xs flex flex-wrap space-y-2 md:space-y-0 items-center gap-x-2 opacity-90">
            <a href="" class="text-zinc-500 hover:text-primary-500 transition">
                {{ $product->category->name }}
            </a>
            <svg class="size-3 fill-zinc-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#3d3d3d" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
            <a class="text-primary-500" href="">
           {{ $product->name }}
            </a>
          </div>
          <div class="text-zinc-800 md:text-2xl font-semibold leading-7">
                {{ $product->name }}
          </div>
          <div class="text-zinc-400 text-xs md:text-sm mt-4">
                {{ $product->model  }}
          </div>
          <a href="" class="flex items-start gap-x-1 text-sm text-primary-500 mt-3">
            <svg class="fill-primary-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" viewBox="0 0 256 256"><path d="M140,128a12,12,0,1,1-12-12A12,12,0,0,1,140,128ZM84,116a12,12,0,1,0,12,12A12,12,0,0,0,84,116Zm88,0a12,12,0,1,0,12,12A12,12,0,0,0,172,116Zm60,12A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-16,0A88,88,0,1,0,51.81,172.06a8,8,0,0,1,.66,6.54L40,216,77.4,203.53a7.85,7.85,0,0,1,2.53-.42,8,8,0,0,1,4,1.08A88,88,0,0,0,216,128Z"></path></svg>
            <span>
              <span>
                {{ $product->review->count() }}
              </span>
              <span>
                دیدگاه
              </span>
            </span>
          </a>
            @php
                $features = is_string($product->features) ? json_decode($product->features, true) : $product->features;
            @endphp

            @if(!empty($features))
                <div class="mt-8 text-zinc-700">
                    ویژگی های محصول:
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 max-w-md py-3 mb-5 gap-3">
                    @foreach($features as $attr)
                        <div class="flex flex-col gap-x-2 justify-center bg-gray-100 rounded-md px-2 py-3">
                            <div class="text-zinc-500 text-xs">
                                {{ $attr['name'] ?? '' }}
                            </div>
                            <div class="text-zinc-700 text-sm">
                                {{ $attr['value'] ?? '' }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif


            @php
                $variants = $product->variants;

                // استخراج رنگ‌های یکتا
                $uniqueColors = $variants->pluck('color')->unique();
            @endphp

            @if($variants->isNotEmpty())
                <div class="mt-6">

                    <div class="text-zinc-700 font-semibold mb-3 text-lg">انتخاب رنگ و سایز :</div>

                    <div class="flex gap-x-2 mt-2 pt-2 text-zinc-500 text-xs md:text-sm leading-6">
                        <svg class="fill-zinc-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z"></path>
                        </svg>
                        برای مشاهده قیمت ابتدا رنگ و سپس سایز را انتخاب کنید
                    </div>

                    {{-- انتخاب رنگ --}}
                    <div class="flex gap-3 mt-4">
                        @foreach($uniqueColors as $color)
                            <label class="cursor-pointer flex flex-col items-center gap-1">
                                <input type="radio" name="color_selector"
                                       value="{{ $color }}"
                                       class="hidden color-input"/>

                                <span class="w-8 h-8 rounded-full block border
                                    transition duration-200
                                    ring-transparent ring-2
                                    hover:ring-blue-300" style="background: {{ $color }}">
                                </span>

                                <span class="text-xs text-gray-600">
                                    {{ App\Models\Color::select('name')->where('code', $color)->value('name') }}
                                </span>
                            </label>

                        @endforeach
                    </div>

                    {{-- سایزها --}}
                    <div id="sizesWrapper" class="flex gap-2 overflow-auto pb-2 mt-4 hidden">
                        {{-- با انتخاب رنگ اینجا سایزها رندر می‌شوند --}}
                    </div>

                    {{-- اطلاعات واریانت انتخاب‌شده --}}
                    <div id="variantInfo"
                         class="mt-4 hidden bg-gradient-to-r from-green-50 to-green-100 border border-green-200 rounded-xl p-4 shadow-sm">
                        <div class="text-sm text-zinc-600">
                            قیمت:
                            <span id="variantOldPrice" class="text-zinc-400 line-through mr-2"></span>
                            <span id="variantPrice" class="font-bold text-green-700 text-lg"></span> تومان
                        </div>
                        <div class="text-sm text-zinc-600 mt-1">
                            موجودی: <span id="variantStock" class="font-medium"></span>
                        </div>
                    </div>

                </div>

                {{-- اسکریپت --}}
                <script>
                    const variants = @json($variants);

                    const colorInputs = document.querySelectorAll(".color-input");
                    const sizesWrapper = document.getElementById("sizesWrapper");

                    colorInputs.forEach(ci => {
                        ci.addEventListener("change", function () {
                            const color = this.value;

                            const related = variants.filter(v => v.color === color);

                            sizesWrapper.innerHTML = "";
                            sizesWrapper.classList.remove('hidden');

                            related.forEach(v => {
                                sizesWrapper.innerHTML += `
                    <label class="flex-shrink-0 cursor-pointer flex items-center gap-3 bg-white border border-zinc-300 rounded-xl p-3 shadow-sm hover:shadow-md
                            transition duration-200">

                        <input type="radio" name="variant_selector"
                               value="${v.id}"
                               class="hidden variant-size-input">

                        <span class="text-zinc-700 text-sm">سایز: ${v.size ?? "-"}</span>
                    </label>`;
                            });

                            attachVariantListeners();
                        });
                    });

                    function attachVariantListeners() {
                        document.querySelectorAll(".variant-size-input").forEach(item => {
                            item.addEventListener("change", function () {
                                const selected = variants.find(v => v.id == this.value);

                                document.getElementById("variantOldPrice").innerHTML =
                                    selected.old_price ? selected.old_price.toLocaleString() : "";
                                document.getElementById("variantPrice").innerHTML =
                                    selected.price.toLocaleString();
                                document.getElementById("variantStock").innerHTML =
                                    selected.stock;

                                document.getElementById("variantInfo").classList.remove("hidden");
                            });
                        });
                    }
                </script>

            @endif



            <div class="flex gap-x-2 mt-2 pt-2 text-zinc-500 text-xs md:text-sm border-t border-t-zinc-200 leading-6">
            <svg class="fill-zinc-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z"></path></svg>
            درخواست تعویض سایز کالا  تنها در صورتی قابل انجام است که کالا در شرایط اولیه باشد .
          </div>
        </div>
        <!-- buy -->
        <div class="lg:w-3/12">

          <div class="p-3 border border-zinc-300 rounded-xl mx-auto divide-y divide-zinc-200">
            <div class="flex gap-x-1 items-center text-zinc-600 text-sm pb-5 pt-3">
              <svg class="fill-zinc-700" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M208,40H48A16,16,0,0,0,32,56v58.78c0,89.61,75.82,119.34,91,124.39a15.53,15.53,0,0,0,10,0c15.2-5.05,91-34.78,91-124.39V56A16,16,0,0,0,208,40Zm0,74.79c0,78.42-66.35,104.62-80,109.18-13.53-4.51-80-30.69-80-109.18V56H208ZM82.34,141.66a8,8,0,0,1,11.32-11.32L112,148.68l50.34-50.34a8,8,0,0,1,11.32,11.32l-56,56a8,8,0,0,1-11.32,0Z"></path></svg>
              <div>
               تعویض سایز
              </div>
            </div>
            <div class="flex gap-x-1 items-center text-zinc-600 text-sm py-5">
              <svg class="fill-zinc-700" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M247.42,117l-14-35A15.93,15.93,0,0,0,218.58,72H184V64a8,8,0,0,0-8-8H24A16,16,0,0,0,8,72V184a16,16,0,0,0,16,16H41a32,32,0,0,0,62,0h50a32,32,0,0,0,62,0h17a16,16,0,0,0,16-16V120A7.94,7.94,0,0,0,247.42,117ZM184,88h34.58l9.6,24H184ZM24,72H168v64H24ZM72,208a16,16,0,1,1,16-16A16,16,0,0,1,72,208Zm81-24H103a32,32,0,0,0-62,0H24V152H168v12.31A32.11,32.11,0,0,0,153,184Zm31,24a16,16,0,1,1,16-16A16,16,0,0,1,184,208Zm48-24H215a32.06,32.06,0,0,0-31-24V128h48Z"></path></svg>
              <div>
                ارسال 2 روز کاری
              </div>
            </div>
            <div class="flex gap-x-1 items-center text-green-500 text-sm py-5">
              <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"></path></svg>
              <div>
                رضایت از محصول:
              </div>
              <span>
                95%
              </span>
            </div>
            <div class="flex flex-col justify-center py-5">
                <!-- قیمت انتخاب شده -->
                <div id="mainPriceBox" class="hidden text-zinc-800 text-left">
                    <div class="flex items-center gap-2">
                        <span id="mainPrice" class="text-zinc-800 font-semibold text-xl"></span>
                        <span class="text-xs">تومان</span>
                    </div>

                    <div id="mainOldPrice" class="line-through text-gray-400 text-sm hidden"></div>
                </div>

                <!-- موجودی انتخاب شده -->
                <div id="mainStockBox" class="hidden text-xs"></div>

                <form method="post" action="{{ route('cart.add', $product->id) }}">
                    @csrf
                    <input type="hidden" name="variant_id" id="selectedVariantId" value="">
                    <div class="quantity-container mt-5 flex h-10 w-full items-center justify-between rounded-lg border border-gray-100 px-2 py-1">
                        <button class="cursor-pointer" type="button" data-action="increment">
                            <svg class="fill-green-500 size-5" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 256 256">
                                <path d="M222,128a6,6,0,0,1-6,6H134v82a6,6,0,0,1-12,0V134H40a6,6,0,0,1,0-12h82V40a6,6,0,0,1,12,0v82h82A6,6,0,0,1,222,128Z">

                                </path>
                            </svg>
                        </button>
                        <input value="1" name="quantity" type="number" class="flex h-5 w-full grow select-none items-center justify-center bg-transparent text-center text-sm md:text-lg font-yekanBakhExtraBold text-zinc-600 outline-none"> <button class="cursor-pointer" type="button" data-action="decrement"> <svg class="fill-red-500 size-5" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 256 256">

                            </svg>
                        </button>
                    </div>

                  <button class="hidden lg:block mx-auto cursor-pointer w-full px-2 py-3 text-sm bg-gradient-to-bl
                   from-primary-500 to-primary-400 hover:opacity-90 transition text-gray-100 rounded-lg"> افزودن به سبد خرید </button>
            </div>


              {{--            <button class="hidden lg:block mx-auto w-full px-2 py-3 text-sm bg-gradient-to-bl from-primary-500 to-primary-400 opacity-80 cursor-not-allowed transition text-gray-100 rounded-lg">--}}
{{--              محصول موجود نیست!--}}
{{--            </button>--}}

          </div>
          <!-- fixed div buy mobile -->
          <div class="fixed flex bottom-0 right-0 lg:hidden bg-white border-t border-t-zinc-300 w-full px-5 py-3 gap-x-2 z-50">
            <button class="mx-auto 5 w-1/2 px-2 py-3 text-sm bg-gradient-to-bl from-primary-500 to-primary-400 hover:opacity-90 transition text-gray-100 rounded-lg">
              افزودن به سبد خرید
            </button>
              </form>

            <!-- <button class="mx-auto 5 w-1/2 px-2 py-3 text-sm bg-gradient-to-bl from-primary-500 to-primary-400 opacity-80 cursor-not-allowed transition text-gray-100 rounded-lg">
              محصول موجود نیست!
            </button> -->
            <span class="flex flex-col justify-center items-end w-1/2">
              <div class="text-zinc-700 text-left">
                <span class="font-yekanBakhExtraBold text-2xl"> <span id="mobileVariantPrice" class="font-bold text-green-700 text-lg"></span></span>
                <span class="text-xs">تومان</span>
              </div>

            </span>
          </div>
        </div>
      </div>
      <div class="flex gap-x-8 mt-20 pb-2 border-b border-zinc-200">
        <a class="text-zinc-600 hover:text-zinc-800 transition" href="#details">
           توضیحات و مشخصات
        </a>

        <a class="text-zinc-600 hover:text-zinc-800 transition" href="#comments">
          دیدگاه ها
        </a>
      </div>
      <div class="p-4 border-b border-zinc-200" id="details">
        <p class="text-zinc-800 md:text-lg mb-1 mt-4">
          توضیحات این محصول
        </p>
       {!! $product->description !!}
      </div>

      <div class="p-4" id="comments">
        <p class="text-zinc-800 md:text-lg mb-1 mt-4">
          دیدگاه ها
        </p>
        <div class="lg:flex gap-5">
          <div class="lg:w-3/12 py-5">
            <div class="mt-4 mb-2 text-sm text-zinc-700">
              شما هم دیدگاه خود را ثبت کنید
            </div>
              <form method="POST" action="{{ route('reviews.store') }}">
                  @csrf
            <ul class="grid my-3 gap-5 grid-cols-2">
              <li>

                <input type="radio" id="yes" name="rating" value="yes" class="hidden peer" required="">
                <label for="yes" class="inline-flex items-center justify-center w-full px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-400 peer-checked:text-green-500 hover:text-gray-600 hover:bg-gray-100">
                  <div class="flex items-center gap-x-1">
                    <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"></path></svg>
                    <div class="text-sm">پیشنهاد میشود</div>
                  </div>
                </label>
              </li>
              <li>
                <input type="radio" id="no" name="rating" value="no" class="hidden peer" required="">
                <label for="no" class="inline-flex items-center justify-center w-full px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-red-400 peer-checked:text-red-400 hover:text-gray-600 hover:bg-gray-100">
                  <div class="flex items-center gap-x-1">
                    <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M239.82,157l-12-96A24,24,0,0,0,204,40H32A16,16,0,0,0,16,56v88a16,16,0,0,0,16,16H75.06l37.78,75.58A8,8,0,0,0,120,240a40,40,0,0,0,40-40V184h56a24,24,0,0,0,23.82-27ZM72,144H32V56H72Zm150,21.29a7.88,7.88,0,0,1-6,2.71H152a8,8,0,0,0-8,8v24a24,24,0,0,1-19.29,23.54L88,150.11V56H204a8,8,0,0,1,7.94,7l12,96A7.87,7.87,0,0,1,222,165.29Z"></path></svg>
                    <div class="text-sm">پیشنهاد نمیشود</div>
                  </div>
                </label>
              </li>
            </ul>
              <input type="hidden" name="product_id" value="{{ $product->id }}">
            <textarea placeholder="متن دیدگاه" name="comment" cols="30" rows="7" class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-white border border-zinc-200 px-5 py-3.5 placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300"></textarea>
            <button class="hidden lg:block mx-auto cursor-pointer w-full px-2 py-3 text-sm bg-gradient-to-bl from-primary-500 to-primary-400 hover:opacity-90 transition text-gray-100 rounded-lg">
              ارسال دیدگاه
            </button>
            </form>
          </div>
          <div class="lg:w-9/12 divide-y-2 divide-zinc-300">
              @foreach($product->review as $review)
            <div class="px-2 pt-5">

              <div class="mt-2 flex gap-x-4 items-center border-b border-zinc-200 pb-3">
                <div class="text-xs text-zinc-600">
                    {{ \Morilog\Jalali\Jalalian::fromDateTime($product->created_at)->format('Y/m/d') }}
                </div>
                <div class="text-xs text-zinc-600">
                    @if($product->user_id)
                        {{ $product->user->name }}
                    @endif
                    کاربر
                </div>
                <div class="text-xs text-zinc-50 bg-green-400 rounded-full px-2 py-1">
                  خریدار
                </div>
              </div>
                @if($review->rating == 'yes')
                    <div class="flex items-center gap-x-1 pt-3">
                        <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"></path></svg>
                        <div class="text-sm text-green-500">پیشنهاد میشود</div>
                    </div>
                @else
                    <div class="flex items-center gap-x-1 pt-3">
                        <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M239.82,157l-12-96A24,24,0,0,0,204,40H32A16,16,0,0,0,16,56v88a16,16,0,0,0,16,16H75.06l37.78,75.58A8,8,0,0,0,120,240a40,40,0,0,0,40-40V184h56a24,24,0,0,0,23.82-27ZM72,144H32V56H72Zm150,21.29a7.88,7.88,0,0,1-6,2.71H152a8,8,0,0,0-8,8v24a24,24,0,0,1-19.29,23.54L88,150.11V56H204a8,8,0,0,1,7.94,7l12,96A7.87,7.87,0,0,1,222,165.29Z"></path></svg>
                        <div class="text-sm text-red-500">پیشنهاد نمیشود</div>
                    </div>
                @endif
              <div class="mt-2 text-zinc-600 text-sm">
                 {{ $review->comment }}
              </div>

              @endforeach
          </div>
        </div>
      </div>

      <div class="mt-12 md:mt-20 px-4 md:px-14">
        <!-- top slider -->
        <div class="flex gap-x-4 justify-between items-center mb-7">
          <div class="w-48 min-w-fit text-zinc-700 md:font-yekanBakhBold">
           محصولات مرتبط
          </div>
          <div class="h-[1px] w-full bg-gradient-to-r from-white via-zinc-300 to-white">
          </div>
          <div class="w-32 min-w-fit text-left">
            <a href="" class="group transition flex items-center justify-center gap-x-1 md:gap-x-2 text-zinc-600 hover:text-primary-500 text-xs md:text-sm text-center">
              مشاهده همه
              <svg class="fill-zinc-600 group-hover:-translate-x-1 transition group-hover:fill-primary-500 size-2.5 md:size-3" xmlns="http://www.w3.org/2000/svg" width="" height="" fill="" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path></svg>
            </a>
          </div>
        </div>
        <!-- main slider -->
        <div class="containerPSlider swiper">
          <div class="productSlider1">
              <div class="card-wrapper swiper-wrapper pb-10">
                  @foreach($simalarProducts as $simalarProduct)
                      @php
                          $images = $simalarProduct->images ?: ['defaults/no-image.png'];
                          $activeVariant = $simalarProduct->active_variant;
                          $minPrice = $simalarProduct->min_price;
                      @endphp
                      <div class="card swiper-slide shiny my-2 p-2 md:p-4 hover:border-transparent hover:shadow-lg transition-shadow rounded-3xl border border-zinc-200">
                          <a href="{{ route('product.details', ['id' => $simalarProduct->id, 'slug' => $simalarProduct->slug]) }}" class="image-box mb-6 block py-10">
                              <img class="max-w-40 mx-auto" src="{{ asset('storage/' . $images[0]) }}" alt="{{ $simalarProduct->name }}" />
                          </a>
                          <a href="{{ route('product.details', ['id' => $simalarProduct->id, 'slug' => $simalarProduct->slug]) }}" class="text-sm font-semibold text-zinc-700 h-10 line-clamp-2">
                              {{ $simalarProduct->name }}
                          </a>
                          <div class="border-b-2 border-dashed border-zinc-200 my-5 w-full h-auto"></div>
                          <div class="flex justify-between items-center">
                              <a href="#" class="group/edit bg-primary-500 hover:bg-primary-400 px-5 md:px-2.5 py-2.5 rounded-xl shadow-lg transition-all">
                                  <svg class="stroke-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M3.86399 16.455C4.40999 18.638 4.68299 19.729 5.49599 20.365C6.30999 21 7.43499 21 9.68499 21H14.315C16.565 21 17.69 21 18.505 20.365C19.318 19.729 19.591 18.638 20.136 16.455C20.994 13.023 21.423 11.308 20.523 10.154C19.622 9 17.853 9 14.316 9H9.68499C6.14699 9 4.37899 9 3.47799 10.154C2.94899 10.831 2.87799 11.702 3.08399 13" stroke="#" stroke-width="1.5" stroke-linecap="round"/>
                                      <path d="M19.5 9.5L18.79 6.895C18.516 5.89 18.379 5.388 18.098 5.009C17.8178 4.63246 17.4373 4.3424 17 4.172C16.56 4 16.04 4 15 4M4.5 9.5L5.21 6.895C5.484 5.89 5.621 5.388 5.902 5.009C6.18218 4.63246 6.56269 4.3424 7 4.172C7.44 4 7.96 4 9 4" stroke="#" stroke-width="1.5"/>
                                      <path d="M9 4C9 3.73478 9.10536 3.48043 9.29289 3.29289C9.48043 3.10536 9.73478 3 10 3H14C14.2652 3 14.5196 3.10536 14.7071 3.29289C14.8946 3.48043 15 3.73478 15 4C15 4.26522 14.8946 4.51957 14.7071 4.70711C14.5196 4.89464 14.2652 5 14 5H10C9.73478 5 9.48043 4.89464 9.29289 4.70711C9.10536 4.51957 9 4.26522 9 4Z" stroke="#" stroke-width="1.5"/>
                                  </svg>
                              </a>
                              <div class="flex items-start gap-2 my-5">
                                  <div class="flex flex-col">
                                      @if($activeVariant && $activeVariant->discount_price)
                                          <div class="text-xl md:text-2xl text-red-600 font-bold">
                                              {{ number_format($activeVariant->discount_price) }}
                                          </div>
                                          <div class="text-base md:text-lg text-zinc-500 line-through">
                                              {{ number_format($activeVariant->price) }}
                                          </div>
                                      @elseif($minPrice)
                                          <div class="text-xl md:text-2xl text-zinc-800 font-semibold">
                                              {{ number_format($minPrice) }}
                                          </div>
                                      @else
                                          <div class="text-xl md:text-2xl text-zinc-800 font-semibold">
                                              تماس بگیرید
                                          </div>
                                      @endif
                                  </div>
                                  <div class="-rotate-90 text-zinc-400 text-xs md:text-sm">
                                      تومان
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@include('footer')
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const selectedVariantInput = document.getElementById('selectedVariantId');
// در بالای اسکریپت کنار بقیه selectorها این را اضافه کنید:
        const mobilePriceEl = document.getElementById('mobileVariantPrice');
        const infoBox = document.getElementById('variantInfo');
        const priceEl = document.getElementById('variantPrice');
        const oldPriceEl = document.getElementById('variantOldPrice');
        const stockEl = document.getElementById('variantStock');

        const mainPriceBox = document.getElementById('mainPriceBox');
        const mainPriceEl = document.getElementById('mainPrice');
        const mainOldPriceEl = document.getElementById('mainOldPrice');
        const mainStockBox = document.getElementById('mainStockBox');

        const variants = @json($variants->keyBy('id'));

        const colorInputs = document.querySelectorAll('.color-input');
        const sizesWrapper = document.getElementById('sizesWrapper');

        // واکنش به انتخاب رنگ
        colorInputs.forEach(ci => {
            ci.addEventListener('change', function () {
                const color = this.value;

                // پیدا کردن سایزهای مرتبط با این رنگ
                const related = Object.values(variants).filter(v => v.color === color);

                // پاکسازی و نمایش سایزها
                sizesWrapper.innerHTML = "";
                sizesWrapper.classList.remove('hidden');

                related.forEach(v => {
                    sizesWrapper.innerHTML += `
                    <label class="flex-shrink-0 cursor-pointer flex items-center gap-3 bg-white border border-zinc-300 rounded-xl p-3 shadow-sm hover:shadow-md transition duration-200">
                        <input type="radio" name="variant_selector" value="${v.id}" class="hidden variant-size-input">
                        <span class="text-zinc-700 text-sm">سایز: ${v.size ?? "-"}</span>
                    </label>
                `;
                });

                // اتصال دوباره listenerها
                attachSizeVariantListeners();
            });
        });


        function attachSizeVariantListeners() {
            document.querySelectorAll('.variant-size-input').forEach(radio => {
                radio.addEventListener('change', function () {

                    const selected = variants[this.value];
                    if (!selected) return;

                    // مقدار hidden input برای ارسال به سرور
                    selectedVariantInput.value = this.value;

                    // قیمت‌ها
                    const price = selected.discount_price > 0 ? selected.discount_price : selected.price;
                    const oldPrice = selected.discount_price > 0 ? selected.price : null;

                    priceEl.innerText = Number(price).toLocaleString();
                    if (mobilePriceEl) {
                        mobilePriceEl.innerText = Number(price).toLocaleString();
                    }
                    if (oldPrice) {
                        oldPriceEl.innerText = Number(oldPrice).toLocaleString();
                        oldPriceEl.style.display = 'inline';
                    } else {
                        oldPriceEl.style.display = 'none';
                    }

                    stockEl.innerText = selected.stock;
                    infoBox.classList.remove('hidden');

                    // قیمت اصلی صفحه
                    mainPriceEl.innerText = Number(price).toLocaleString();
                    if (oldPrice) {
                        mainOldPriceEl.innerText = Number(oldPrice).toLocaleString() + " تومان";
                        mainOldPriceEl.classList.remove('hidden');
                    } else {
                        mainOldPriceEl.classList.add('hidden');
                    }
                    mainPriceBox.classList.remove('hidden');

                    // وضعیت موجودی
                    let stockText = "";
                    let stockClass = "";

                    if(selected.stock == 0){
                        stockText = "ناموجود";
                        stockClass = "text-red-500";
                    } else if(selected.stock <= 5){
                        stockText = `تنها ${selected.stock} عدد در انبار باقی مانده`;
                        stockClass = "text-orange-500";
                    } else {
                        stockText = "موجود در انبار";
                        stockClass = "text-green-500";
                    }

                    mainStockBox.innerText = stockText;
                    mainStockBox.className = "text-xs mt-2 " + stockClass;
                    mainStockBox.classList.remove('hidden');

                });
            });
        }


        // جلوگیری از ارسال فرم بدون انتخاب واریانت
        const cartForm = document.querySelector('form[action*="cart.add"]');
        if(cartForm){
            cartForm.addEventListener('submit', function(e){
                if(!selectedVariantInput.value){
                    e.preventDefault();
                    alert("لطفا رنگ و سایز خود را انتخاب کنید");
                }
            });
        }

    });
</script>







<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/sliders.js') }}"></script>
<script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</html>
