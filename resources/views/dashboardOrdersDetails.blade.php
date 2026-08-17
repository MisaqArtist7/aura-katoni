@php use Morilog\Jalali\Jalalian; @endphp
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

<body class="max-w-[1700px] mx-auto bg-zinc-100 flex flex-col min-h-screen relative">

  <!-- bg blur mobile -->
  <div id="overlay" class="fixed z-10 inset-0 bg-black/35 hidden transition-opacity duration-300"></div>
  <!-- Sidebar -->
    @include('partials.panelsidemenu')
  <div class="w-full lg:w-[83%] mr-auto flex flex-col min-h-screen">
    <!-- header -->
      @include('partials.dashboard-header')





      <main class="p-6 flex-1 overflow-y-auto">
      <div class="bg-white rounded-2xl min-h-80 h-auto shadow-custom p-4">
        <div class="px-2 md:px-3 pt-3 pb-5 mb-3 text-zinc-700 text-sm md:text-base flex items-center gap-x-2 border-b border-zinc-200">
          <svg class="fill-primary-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M128,16a88.1,88.1,0,0,0-88,88c0,75.3,80,132.17,83.41,134.55a8,8,0,0,0,9.18,0C136,236.17,216,179.3,216,104A88.1,88.1,0,0,0,128,16Zm0,56a32,32,0,1,1-32,32A32,32,0,0,1,128,72Z"></path></svg>
          جزئیات سفارش #{{ $data->order_code }}
        </div>




        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-3 xl:gap-4">
            @foreach($data->items as $item)
                @php


                       $images = is_array($item->product->images)
                            ? $item->images
                            : ['defaults/no-image.png'];

                        $image = $images[0] ?? 'defaults/no-image.png';
                @endphp
          <div class="shiny my-2 p-2 md:p-4 hover:border-transparent hover:shadow-lg transition-shadow rounded-3xl border border-zinc-200">
            <a href="./single-product.html" class="image-box mb-6 block py-10">
              <img class="max-w-40 mx-auto" src="{{ asset('storage/' . $image) }}" alt="" />
            </a>
            <a href="./single-product.html" class="text-sm font-semibold text-zinc-700 h-10 line-clamp-2">
                {{ $item->product->name }}
            </a>
{{--            <div class="flex my-5">--}}
{{--              <div class="text-xl md:text-2xl text-zinc-800">{{ number_format($item->product->price) }}</div>--}}
{{--              <div class="-rotate-90 text-zinc-400 text-xs">--}}
{{--                تومان--}}
{{--              </div>--}}
{{--            </div>--}}
          </div>
            @endforeach
        </div>






          @php
              $address = json_decode($data->address, true);
              $orderDate = \Morilog\Jalali\Jalalian::fromDateTime($data->created_at)->format('Y/m/d');
          @endphp

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 my-5 max-w-4xl mx-auto">

              {{-- بخش اطلاعات پرداخت --}}
              <div class="px-2 sm:px-6 py-3 rounded-xl border border-zinc-300">
                  <div class="flex gap-x-1 justify-center items-center text-zinc-700">
                      <svg class="fill-zinc-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256">
                          <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path>
                      </svg>
                      اطلاعات پرداخت
                  </div>

                  <div class="flex gap-x-1 justify-between items-center text-zinc-600 mt-5 bg-gray-100 rounded-lg px-2 py-3 text-sm">
                      <div>
                          جمع قیمت کالاها ( {{ $data->items->count() }} )
                      </div>
                      <div class="flex gap-x-1">
                          <div>{{ number_format($data->total_price) }}</div>
                          <div>تومان</div>
                      </div>
                  </div>

                  <div class="flex gap-x-1 justify-between items-center text-zinc-600 mt-3 bg-gray-100 rounded-lg px-2 py-3 text-sm">
                      <div>تاریخ</div>
                      <div>{{ $orderDate }}</div>
                  </div>

                  <div class="flex gap-x-1 justify-between items-center text-zinc-600 mt-3 bg-gray-100 rounded-lg px-2 py-3 text-sm">
                      <div>شماره پیگیری</div>
                      <div>#{{ $data->order_code }}</div>
                  </div>

                  <div class="flex gap-x-1 justify-between items-center text-zinc-800 mt-3 bg-gray-100 rounded-lg px-2 py-3 text-sm">
                      <div>وضعیت سفارش</div>
                      <div>
                          @switch($data->status)
                              @case('pending')
                                  <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">در حال پردازش</span>
                                  @break

                              @case('paid')
                                  <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">پرداخت موفق</span>
                                  @break

                              @case('shipped')
                                  <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">ارسال شد</span>
                                  @break

                              @case('delivered')
                                  <span class="px-2 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-700">تحویل داده شد</span>
                                  @break

                              @case('canceled')
                                  <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">لغو شده</span>
                                  @break
                          @endswitch
                      </div>
                  </div>

                  <button  onclick="printInvoice()" class="block text-center w-full px-2 py-3 mt-5 text-sm bg-gradient-to-bl from-primary-500 to-primary-700 hover:opacity-80 transition text-gray-100 rounded-lg">
                      چاپ
                  </button>
              </div>
              @if($data->address)
              {{-- بخش آدرس کاربر --}}
              <div class="px-2 sm:px-6 py-3 rounded-xl border border-zinc-300">
                  <div class="flex gap-x-1 justify-center items-center text-zinc-700">
                      <svg class="fill-zinc-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                          <path d="M128 24A104 104 0 1 0 232 128 104.11 104.11 0 0 0 128 24Zm0 152a12 12 0 1 1 12-12A12 12 0 0 1 128 176Zm12-44h-8V92a12 12 0 0 1 24 0v28a12 12 0 0 1-12 12Z"/>
                      </svg>
                      آدرس
                  </div>

                  <div class="mt-5 bg-gray-100 rounded-lg px-2 py-3 text-sm text-zinc-700 space-y-2">
                      <div><strong>نام:</strong> {{ $address['name'] ?? '-' }} {{ $address['family_name'] ?? '' }}</div>
                      <div><strong>تلفن:</strong> {{ $address['telephone'] ?? '-' }}</div>
                      <div><strong>آدرس:</strong> {{ $address['full_address'] ?? '-' }}</div>
                      <div><strong>کد پستی:</strong> {{ $address['postal_code'] ?? '-' }}</div>
                      <div><strong>توضیحات:</strong> {{ $address['description'] ?? '-' }}</div>
                  </div>
              </div>
              @endif

          </div>






      </div>
    </main>

  </div>

  <div id="invoice" class="hidden p-6" style="font-family: sans-serif; direction: rtl; width: 800px;">
      <h2 style="text-align: center; margin-bottom: 20px;">فاکتور سفارش</h2>

      <p><strong>شماره سفارش:</strong> {{ $data->order_code }}</p>
      <p><strong>تاریخ ثبت:</strong> {{ $orderDate }}</p>
      <p><strong>وضعیت:</strong>
          @switch($data->status)
              @case('pending')
                  <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                    در حال پردازش
                                </span>
                  @break

              @case('paid')
                  <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    پرداخت موفق
                                </span>
                  @break

              @case('shipped')
                  <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                    ارسال شد
                                </span>
                  @break

              @case('delivered')
                  <span class="px-2 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-700">
                                    تحویل داده شد
                                </span>
                  @break

              @case('canceled')
                  <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                    لغو شده
                                </span>
                  @break
          @endswitch
      </p>
      <p><strong>مبلغ کل:</strong> {{ number_format($data->total_price) }} تومان</p>

      <hr style="margin: 15px 0;">
      @if($data->address)
          <h3>آدرس تحویل:</h3>
          <p>{{ $address['name'] }} {{ $address['family_name'] }}</p>
          <p>تلفن: {{ $address['telephone'] }}</p>
            @if($province && $city)
              <p>استان: {{ $province->title }}, شهر: {{ $city->title }}</p>
            @endif
          <p>آدرس کامل: {{ $address['full_address'] }}</p>
          <p>کد پستی: {{ $address['postal_code'] }}</p>
          <p>توضیحات: {{ $address['description'] }}</p>
      @endif
      <hr style="margin: 15px 0;">

      <h3>آیتم‌های سفارش:</h3>
      <table style="width: 100%; border-collapse: collapse;">
          <thead>
          <tr>
              <th style="border: 1px solid #000; padding: 6px;">محصول</th>
              <th style="border: 1px solid #000; padding: 6px;">تعداد</th>
              <th style="border: 1px solid #000; padding: 6px;">قیمت واحد</th>
              <th style="border: 1px solid #000; padding: 6px;">جمع</th>
          </tr>
          </thead>
          <tbody>
          @foreach($data->items as $item)
              <tr>
                  <td style="border: 1px solid #000; padding: 6px;">{{ $item->product->name }}</td>
                  <td style="border: 1px solid #000; padding: 6px;">{{ $item->quantity }}</td>
                  <td style="border: 1px solid #000; padding: 6px;">{{ number_format($item->product->price) }}</td>
                  <td style="border: 1px solid #000; padding: 6px;">{{ $item->quantity * $item->product->price }}</td>
              </tr>
          @endforeach
          </tbody>
      </table>
  </div>
  <script>
      function printInvoice() {
          var invoiceContent = document.getElementById('invoice').innerHTML;
          var originalContent = document.body.innerHTML;

          document.body.innerHTML = invoiceContent;
          window.print();
          document.body.innerHTML = originalContent;
      }
  </script>
</body>

<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/sliders.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</html>
