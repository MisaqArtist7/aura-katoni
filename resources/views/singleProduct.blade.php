<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>

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

        /* حذف فلش‌های بالا و پایین input number در تمام مرورگرها */
        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type='number'] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body class="bg-slate-50/50 max-w-[1700px] mx-auto text-slate-800 antialiased">

  <!-- SweetAlert Messages -->
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

  <!-- Progress Bar -->
  <div id="progressBar"></div>

  @include('header')

  <main class="mt-4 md:mt-8 px-4 md:px-8 pb-24">
    
    <!-- Product Main Card -->
    <div class="bg-white rounded-3xl border border-slate-100 p-4 md:p-8 shadow-sm">
      <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- Gallery Section -->
        <div class="lg:w-5/12">
            @php
                $images = $product->images ?: ['defaults/no-image.png'];
            @endphp
            <div class="relative sticky top-6">
              
              <!-- Share Button -->
              <button onclick="copyToClipboard(event)" class="absolute top-3 right-3 z-20 p-2.5 bg-white/80 backdrop-blur rounded-2xl text-slate-600 hover:text-slate-900 shadow-sm border border-slate-100 transition">
                  <svg class="w-5 h-5 fill-current" viewBox="0 0 256 256">
                      <path d="M176,160a39.89,39.89,0,0,0-28.62,12.09l-46.1-29.63a39.8,39.8,0,0,0,0-28.92l46.1-29.63a40,40,0,1,0-8.66-13.45l-46.1,29.63a40,40,0,1,0,0,55.82l46.1,29.63A40,40,0,1,0,176,160Zm0-128a24,24,0,1,1-24,24A24,24,0,0,1,176,32ZM64,152a24,24,0,1,1,24-24A24,24,0,0,1,64,152Zm112,72a24,24,0,1,1,24-24A24,24,0,0,1,176,224Z"></path>
                  </svg>
              </button>

              <!-- Main Image Box -->
              <div class="relative overflow-hidden rounded-2xl bg-slate-50 border border-slate-100 aspect-square flex items-center justify-center p-6 group">
                  <img id="mainImage" src="{{ asset('storage/'.$images[0]) }}"
                       class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500 drop-shadow-md"
                       alt="{{ $product->title }}">
              </div>

              <!-- Thumbnails -->
              <div class="flex justify-start gap-3 mt-4 overflow-x-auto pb-2 scrollbar-none">
                  @foreach($images as $image)
                      <img src="{{ asset('storage/'.$image) }}"
                           class="w-20 h-20 object-contain p-2 bg-slate-50 rounded-xl cursor-pointer border border-slate-200 hover:border-slate-800 transition-all shrink-0"
                           onclick="changeImage(this)"
                           alt="{{ $product->title }}">
                  @endforeach
              </div>
            </div>
        </div>

        <!-- Product Info Section -->
        <div class="lg:w-4/12 flex flex-col">
          
          <!-- Breadcrumb -->
          <div class="mb-4 text-xs flex items-center gap-2 text-slate-400">
            <a href="#" class="hover:text-slate-700 transition">{{ $product->category->name }}</a>
            <span>/</span>
            <span class="text-slate-600 line-clamp-1">{{ $product->name }}</span>
          </div>

          <h1 class="text-xl md:text-2xl font-bold text-slate-900 leading-snug">
                {{ $product->name }}
          </h1>

          @if($product->model)
            <div class="text-xs text-slate-400 mt-2">مدل: {{ $product->model }}</div>
          @endif

          <div class="flex items-center gap-2 text-xs text-slate-500 mt-3 pb-4 border-b border-slate-100">
            <svg class="w-4 h-4 fill-amber-400" viewBox="0 0 256 256"><path d="M140,128a12,12,0,1,1-12-12A12,12,0,0,1,140,128ZM84,116a12,12,0,1,0,12,12A12,12,0,0,0,84,116Zm88,0a12,12,0,1,0,12,12A12,12,0,0,0,172,116Zm60,12A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-16,0A88,88,0,1,0,51.81,172.06a8,8,0,0,1,.66,6.54L40,216,77.4,203.53a7.85,7.85,0,0,1,2.53-.42,8,8,0,0,1,4,1.08A88,88,0,0,0,216,128Z"></path></svg>
            <span>{{ $product->review->count() }} دیدگاه کاربران</span>
          </div>

          <!-- Product Features Preview -->
          @php
              $features = is_string($product->features) ? json_decode($product->features, true) : $product->features;
          @endphp

          @if(!empty($features))
              <div class="mt-6">
                  <div class="text-xs font-bold text-slate-700 mb-3">ویژگی‌های اصلی:</div>
                  <div class="grid grid-cols-2 gap-2">
                      @foreach(array_slice($features, 0, 4) as $attr)
                          <div class="bg-slate-50 border border-slate-100 rounded-xl p-2.5">
                              <div class="text-[11px] text-slate-400">{{ $attr['name'] ?? '' }}</div>
                              <div class="text-xs font-bold text-slate-700 mt-0.5">{{ $attr['value'] ?? '' }}</div>
                          </div>
                      @endforeach
                  </div>
              </div>
          @endif

          <!-- Variants Selection -->
          @php
              $variants = $product->variants;
              $uniqueColors = $variants->pluck('color')->unique();
          @endphp

          @if($variants->isNotEmpty())
              <div class="mt-6 pt-6 border-t border-slate-100">
                  <div class="text-xs font-bold text-slate-700 mb-2">انتخاب رنگ و سایز:</div>
                  <div class="text-[11px] text-slate-400 mb-3">برای مشاهده قیمت، ابتدا رنگ و سپس سایز مورد نظر را انتخاب کنید.</div>

                  <!-- Color Selection -->
                  <div class="flex flex-wrap gap-3">
                      @foreach($uniqueColors as $color)
                          <label class="cursor-pointer group flex items-center gap-2 border border-slate-200 rounded-xl px-3 py-2 hover:border-slate-400 transition">
                              <input type="radio" name="color_selector" value="{{ $color }}" class="hidden color-input"/>
                              <span class="w-4 h-4 rounded-full border border-slate-300 shadow-sm" style="background: {{ $color }}"></span>
                              <span class="text-xs font-medium text-slate-700">
                                  {{ App\Models\Color::select('name')->where('code', $color)->value('name') ?? $color }}
                              </span>
                          </label>
                      @endforeach
                  </div>

                  <!-- Sizes Wrapper -->
                  <div id="sizesWrapper" class="flex gap-2 overflow-x-auto pb-2 mt-4 hidden scrollbar-none">
                      <!-- Rendered dynamically via JS -->
                  </div>
              </div>
          @endif

          <div class="mt-auto pt-6 text-[11px] text-slate-400 flex items-center gap-1.5">
            <svg class="w-4 h-4 fill-slate-400 shrink-0" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z"></path></svg>
            درخواست تعویض سایز کالا تنها در صورتی که در شرایط اولیه باشد امکان‌پذیر است.
          </div>
        </div>

        <!-- Purchase Box -->
        <div class="lg:w-3/12">
          <form method="post" action="{{ route('cart.add', $product->id) }}" id="addToCartForm" class="bg-slate-50 border border-slate-100 rounded-2xl p-5 sticky top-6">
            @csrf
            <input type="hidden" name="variant_id" id="selectedVariantId" value="">

            <div class="space-y-4 text-xs text-slate-600 pb-5 border-b border-slate-200/60">
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4 fill-slate-700" viewBox="0 0 256 256"><path d="M208,40H48A16,16,0,0,0,32,56v58.78c0,89.61,75.82,119.34,91,124.39a15.53,15.53,0,0,0,10,0c15.2-5.05,91-34.78,91-124.39V56A16,16,0,0,0,208,40ZM0,74.79c0,78.42-66.35,104.62-80,109.18-13.53-4.51-80-30.69-80-109.18V56H208ZM82.34,141.66a8,8,0,0,1,11.32-11.32L112,148.68l50.34-50.34a8,8,0,0,1,11.32,11.32l-56,56a8,8,0,0,1-11.32,0Z"></path></svg>
                <span>ضمانت اصالت و تعویض سایز</span>
              </div>
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4 fill-slate-700" viewBox="0 0 256 256"><path d="M247.42,117l-14-35A15.93,15.93,0,0,0,218.58,72H184V64a8,8,0,0,0-8-8H24A16,16,0,0,0,8,72V184a16,16,0,0,0,16,16H41a32,32,0,0,0,62,0h50a32,32,0,0,0,62,0h17a16,16,0,0,0,16-16V120A7.94,7.94,0,0,0,247.42,117ZM184,88h34.58l9.6,24H184ZM24,72H168v64H24ZM72,208a16,16,0,1,1,16-16A16,16,0,0,1,72,208Zm81-24H103a32,32,0,0,0-62,0H24V152H168v12.31A32.11,32.11,0,0,0,153,184Zm31,24a16,16,0,1,1,16-16A16,16,0,0,1,184,208Zm48-24H215a32.06,32.06,0,0,0-31-24V128h48Z"></path></svg>
                <span>ارسال سریع (۲ روز کاری)</span>
              </div>
              <div class="flex items-center gap-2 text-emerald-600 font-medium">
                <svg class="w-4 h-4 fill-emerald-600" viewBox="0 0 256 256"><path d="M234,80.12A24,24,0,0,0,216,72H160V56a40,40,0,0,0-40-40,8,8,0,0,0-7.16,4.42L75.06,96H32a16,16,0,0,0-16,16v88a16,16,0,0,0,16,16H204a24,24,0,0,0,23.82-21l12-96A24,24,0,0,0,234,80.12ZM32,112H72v88H32ZM223.94,97l-12,96a8,8,0,0,1-7.94,7H88V105.89l36.71-73.43A24,24,0,0,1,144,56V80a8,8,0,0,0,8,8h64a8,8,0,0,1,7.94,9Z"></path></svg>
                <span>رضایت کاربران: ۹۵٪</span>
              </div>
            </div>

            <!-- Selected Price Info -->
            <div class="py-4 border-b border-slate-200/60">
                <div id="mainPriceBox" class="hidden text-left">
                    <div id="mainOldPrice" class="line-through text-slate-400 text-xs mb-0.5 hidden"></div>
                    <div class="flex items-center justify-end gap-1">
                        <span id="mainPrice" class="text-xl font-extrabold text-slate-900"></span>
                        <span class="text-xs text-slate-500 font-medium">تومان</span>
                    </div>
                </div>
                <div id="defaultPricePrompt" class="text-xs text-slate-400 text-center py-2">
                    لطفا ابتدا تنوع کالا را انتخاب کنید
                </div>
                <div id="mainStockBox" class="hidden text-[11px] text-right mt-2"></div>
            </div>

            <!-- Clean Quantity Selector (+ / - buttons without spin arrows) -->
            <div class="mt-4 flex items-center justify-between bg-white border border-slate-200 rounded-xl px-3 py-1.5 shadow-sm">
                <button type="button" class="w-8 h-8 flex items-center justify-center hover:bg-slate-100 rounded-lg text-emerald-600 font-bold transition select-none" onclick="adjustQty(1)">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                </button>
                <input value="1" min="1" id="productQty" name="quantity" type="number" readonly class="w-12 text-center font-extrabold text-slate-800 bg-transparent outline-none text-base cursor-default select-none">
                <button type="button" class="w-8 h-8 flex items-center justify-center hover:bg-slate-100 rounded-lg text-rose-500 font-bold transition select-none" onclick="adjustQty(-1)">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 12H4"/></svg>
                </button>
            </div>

            <button type="submit" class="hidden lg:block w-full mt-4 py-3 bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm rounded-xl transition shadow-md hover:shadow-lg">
                افزودن به سبد خرید
            </button>

            <!-- Fixed Mobile Buy Bar -->
            <div class="fixed bottom-0 right-0 left-0 lg:hidden bg-white/90 backdrop-blur border-t border-slate-200 p-3 flex items-center justify-between gap-3 z-50">
                <button type="submit" class="flex-1 py-3 bg-slate-900 text-white font-bold text-sm rounded-xl shadow-md">
                    افزودن به سبد خرید
                </button>
                <div class="text-left">
                    <span id="mobileVariantPrice" class="font-extrabold text-slate-900 text-lg"></span>
                    <span class="text-[10px] text-slate-500 block">تومان</span>
                </div>
            </div>
          </form>
        </div>

      </div>
    </div>

    <!-- Product Details & Specifications -->
    <div class="mt-12">
      <div class="flex gap-8 border-b border-slate-200">
        <a href="#details" class="pb-3 text-sm font-bold text-slate-800 border-b-2 border-slate-900">توضیحات و مشخصات کالا</a>
        <a href="#comments" class="pb-3 text-sm font-medium text-slate-500 hover:text-slate-800 transition">دیدگاه‌ها</a>
      </div>

      <!-- Description Container -->
      <div class="bg-white rounded-3xl p-6 md:p-8 mt-6 border border-slate-100" id="details">
        
        <h3 class="text-base font-bold text-slate-900 mb-4">توضیحات محصول</h3>
        <div class="prose prose-slate max-w-none text-xs md:text-sm leading-relaxed text-slate-600 mb-8">
           {!! $product->description !!}
        </div>

        <!-- Complete Specifications Section -->
        @if(!empty($features))
            <div class="pt-6 border-t border-slate-100">
                <h3 class="text-base font-bold text-slate-900 mb-4">مشخصات فنی</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @foreach($features as $attr)
                        <div class="flex items-center justify-between p-3.5 bg-slate-50/80 rounded-2xl border border-slate-100/80">
                            <span class="text-xs text-slate-400 font-medium">{{ $attr['name'] ?? '' }}</span>
                            <span class="text-xs font-bold text-slate-800">{{ $attr['value'] ?? '' }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

      </div>

      <!-- Comments Container -->
      <div class="bg-white rounded-3xl p-6 md:p-8 mt-6 border border-slate-100" id="comments">
        <h3 class="text-base font-bold text-slate-900 mb-6">دیدگاه کاربران</h3>
        
        <div class="grid lg:grid-cols-12 gap-8">
          <!-- Submit Comment Form -->
          <div class="lg:col-span-4 bg-slate-50 p-5 rounded-2xl border border-slate-100">
            <div class="text-xs font-bold text-slate-800 mb-4">دیدگاه خود را بنویسید</div>
            <form method="POST" action="{{ route('reviews.store') }}" class="space-y-4">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">

              <div class="grid grid-cols-2 gap-3">
                <label class="cursor-pointer">
                    <input type="radio" name="rating" value="yes" class="hidden peer" required>
                    <div class="p-2.5 bg-white border border-slate-200 rounded-xl text-center text-xs text-slate-600 peer-checked:border-emerald-500 peer-checked:text-emerald-600 font-medium transition">
                        پیشنهاد می‌کنم
                    </div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="rating" value="no" class="hidden peer" required>
                    <div class="p-2.5 bg-white border border-slate-200 rounded-xl text-center text-xs text-slate-600 peer-checked:border-rose-500 peer-checked:text-rose-600 font-medium transition">
                        پیشنهاد نمی‌کنم
                    </div>
                </label>
              </div>

              <textarea placeholder="متن دیدگاه شما..." name="comment" rows="4" class="w-full rounded-xl text-xs text-slate-700 bg-white border border-slate-200 p-3 outline-none focus:border-slate-400 transition" required></textarea>
              
              <button type="submit" class="w-full py-2.5 bg-slate-900 text-white font-bold text-xs rounded-xl hover:bg-slate-800 transition">
                ارسال دیدگاه
              </button>
            </form>
          </div>

          <!-- Comments List -->
          <div class="lg:col-span-8 space-y-4">
              @forelse($product->review as $review)
                <div class="p-4 bg-slate-50/50 rounded-2xl border border-slate-100">
                  <div class="flex items-center justify-between pb-2 border-b border-slate-100 text-[11px] text-slate-400">
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-slate-700">{{ $review->user->name ?? 'کاربر' }}</span>
                        <span class="bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-md font-medium">خریدار</span>
                    </div>
                    <span>{{ \Morilog\Jalali\Jalalian::fromDateTime($review->created_at)->format('Y/m/d') }}</span>
                  </div>

                  <div class="mt-3">
                    @if($review->rating == 'yes')
                        <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600 mb-1">
                            ✓ خرید این محصول را پیشنهاد می‌کنم
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 text-[11px] font-bold text-rose-500 mb-1">
                            ✕ خرید این محصول را پیشنهاد نمی‌کنم
                        </span>
                    @endif
                    <p class="text-xs text-slate-600 leading-relaxed mt-1">{{ $review->comment }}</p>
                  </div>
                </div>
              @empty
                <div class="text-xs text-slate-400 py-6 text-center">هنوز دیدگاهی برای این محصول ثبت نشده است.</div>
              @endforelse
          </div>
        </div>
      </div>

      <!-- Related Products Slider -->
      @if(isset($simalarProducts) && count($simalarProducts) > 0)
        <div class="mt-16">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-slate-900">محصولات مرتبط</h3>
            </div>
            <div class="containerPSlider swiper">
              <div class="productSlider1">
                  <div class="card-wrapper swiper-wrapper pb-6">
                      @foreach($simalarProducts as $simalarProduct)
                          @php
                              $simImages = $simalarProduct->images ?: ['defaults/no-image.png'];
                              $activeVariant = $simalarProduct->active_variant;
                              $minPrice = $simalarProduct->min_price;
                          @endphp
                          <div class="card swiper-slide bg-white p-4 rounded-2xl border border-slate-100 hover:shadow-lg transition-all flex flex-col justify-between">
                              <a href="{{ route('product.details', ['id' => $simalarProduct->id, 'slug' => $simalarProduct->slug]) }}" class="aspect-square bg-slate-50 rounded-xl p-3 flex items-center justify-center mb-3">
                                  <img class="max-h-full object-contain" src="{{ asset('storage/' . $simImages[0]) }}" alt="{{ $simalarProduct->name }}" />
                              </a>
                              <a href="{{ route('product.details', ['id' => $simalarProduct->id, 'slug' => $simalarProduct->slug]) }}" class="text-xs font-bold text-slate-800 line-clamp-2 leading-relaxed mb-3">
                                  {{ $simalarProduct->name }}
                              </a>
                              <div class="flex items-center justify-between pt-3 border-t border-slate-50">
                                  <a href="{{ route('product.details', ['id' => $simalarProduct->id, 'slug' => $simalarProduct->slug]) }}" class="p-2 bg-slate-900 text-white rounded-lg text-xs">
                                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                  </a>
                                  <div class="text-left">
                                      @if($activeVariant && $activeVariant->discount_price)
                                          <div class="text-xs text-slate-400 line-through">{{ number_format($activeVariant->price) }}</div>
                                          <div class="text-sm font-bold text-slate-900">{{ number_format($activeVariant->discount_price) }} <span class="text-[10px] font-normal">تومان</span></div>
                                      @elseif($minPrice)
                                          <div class="text-sm font-bold text-slate-900">{{ number_format($minPrice) }} <span class="text-[10px] font-normal">تومان</span></div>
                                      @else
                                          <div class="text-xs font-bold text-slate-400">تماس بگیرید</div>
                                      @endif
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
            </div>
        </div>
      @endif

    </div>
  </main>

@include('footer')

<script>
    const variants = @json($variants->keyBy('id'));

    document.addEventListener('DOMContentLoaded', function() {
        const selectedVariantInput = document.getElementById('selectedVariantId');
        const mobilePriceEl = document.getElementById('mobileVariantPrice');
        const mainPriceEl = document.getElementById('mainPrice');
        const mainOldPriceEl = document.getElementById('mainOldPrice');
        const mainPriceBox = document.getElementById('mainPriceBox');
        const defaultPricePrompt = document.getElementById('defaultPricePrompt');
        const mainStockBox = document.getElementById('mainStockBox');
        const sizesWrapper = document.getElementById('sizesWrapper');
        const colorInputs = document.querySelectorAll('.color-input');

        colorInputs.forEach(ci => {
            ci.addEventListener('change', function () {
                const color = this.value;
                const related = Object.values(variants).filter(v => v.color === color);

                sizesWrapper.innerHTML = "";
                sizesWrapper.classList.remove('hidden');

                related.forEach(v => {
                    sizesWrapper.innerHTML += `
                        <label class="flex-shrink-0 cursor-pointer flex items-center gap-2 bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 hover:border-slate-400 transition">
                            <input type="radio" name="variant_selector" value="${v.id}" class="hidden variant-size-input">
                            <span class="text-slate-700 text-xs font-bold">سایز: ${v.size ?? "-"}</span>
                        </label>
                    `;
                });

                attachSizeVariantListeners();
            });
        });

        function attachSizeVariantListeners() {
            document.querySelectorAll('.variant-size-input').forEach(radio => {
                radio.addEventListener('change', function () {
                    const selected = variants[this.value];
                    if (!selected) return;

                    selectedVariantInput.value = this.value;

                    const price = selected.discount_price > 0 ? selected.discount_price : selected.price;
                    const oldPrice = selected.discount_price > 0 ? selected.price : null;

                    mainPriceEl.innerText = Number(price).toLocaleString();
                    if (mobilePriceEl) mobilePriceEl.innerText = Number(price).toLocaleString();

                    if (oldPrice) {
                        mainOldPriceEl.innerText = Number(oldPrice).toLocaleString() + " تومان";
                        mainOldPriceEl.classList.remove('hidden');
                    } else {
                        mainOldPriceEl.classList.add('hidden');
                    }

                    if(defaultPricePrompt) defaultPricePrompt.classList.add('hidden');
                    mainPriceBox.classList.remove('hidden');

                    let stockText = "";
                    let stockClass = "";

                    if(selected.stock == 0){
                        stockText = "ناموجود در انبار";
                        stockClass = "text-rose-500 font-bold";
                    } else if(selected.stock <= 5){
                        stockText = `تنها ${selected.stock} عدد در انبار باقی مانده`;
                        stockClass = "text-amber-600 font-bold";
                    } else {
                        stockText = "موجود در انبار";
                        stockClass = "text-emerald-600 font-medium";
                    }

                    mainStockBox.innerText = stockText;
                    mainStockBox.className = "text-[11px] mt-2 " + stockClass;
                    mainStockBox.classList.remove('hidden');
                });
            });
        }

        // Cart Form Validation
        const cartForm = document.getElementById('addToCartForm');
        if(cartForm){
            cartForm.addEventListener('submit', function(e){
                if(!selectedVariantInput.value){
                    e.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'انتخاب سایز و رنگ',
                        text: 'لطفا ابتدا رنگ و سایز مورد نظر خود را انتخاب کنید.',
                        confirmButtonText: 'متوجه شدم'
                    });
                }
            });
        }
    });

    function changeImage(element) {
        document.getElementById('mainImage').src = element.src;
    }

    function adjustQty(amount) {
        const qtyInput = document.getElementById('productQty');
        let current = parseInt(qtyInput.value) || 1;
        current += amount;
        if(current < 1) current = 1;
        qtyInput.value = current;
    }

    function copyToClipboard(e) {
        e.preventDefault();
        navigator.clipboard.writeText(window.location.href);
        Swal.fire({
            icon: 'success',
            title: 'لینک کپی شد',
            text: 'لینک این محصول با موفقیت کپی شد.',
            timer: 1500,
            showConfirmButton: false
        });
    }
</script>

<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/sliders.js') }}"></script>
<script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>