<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت مدرن</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>--}}
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">--}}

{{--    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
    <style>
        body {
            font-family: Vazirmatn, sans-serif;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-purple-100 min-h-screen">
<div class="flex h-screen">
    <!-- Sidebar -->
    @include('Admin.Particels.nav')
    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <div class="mb-6">
            <button onclick="printInvoice()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                چاپ فاکتور
            </button>
        </div>
        <h2 class="text-3xl font-bold mb-6 text-indigo-800">اطلاعات سفارش</h2>

        {{-- بخش اطلاعات کلی سفارش --}}
        <div class="bg-white shadow rounded-2xl p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">جزئیات سفارش</h3>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-gray-500">شماره سفارش</p>
                    <p class="font-medium text-gray-900">{{ $order->order_code }}</p>
                </div>
                <div>
                    <p class="text-gray-500">وضعیت</p>
                    <p>
                        @switch($order->status)
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
                </div>
                <div>
                    <p class="text-gray-500">تاریخ ثبت</p>
                    <p class="font-medium text-gray-900">{{ $orderDate }}</p>
                </div>
                <div>
                    <p class="text-gray-500">مبلغ کل</p>
                    <p class="font-medium text-gray-900">{{ number_format($order->total_price ) }} تومان</p>
                </div>
            </div>
        </div>

        {{-- بخش آدرس کاربر --}}
        <div class="bg-white shadow-lg rounded-2xl p-6 mb-6">
            <h3 class="text-xl font-bold text-gray-800 mb-5 border-b pb-2">آدرس تحویل</h3>



            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3 text-gray-700">
                <div>
                    <span class="font-semibold">نام:</span> {{ $order->user->address->name }}
                </div>
                <div>
                    <span class="font-semibold">نام خانوادگی:</span> {{ $order->user->address->family_name ?? 'ثبت نشده' }}
                </div>
                <div>
                    <span class="font-semibold">تلفن:</span> {{ $order->user->address->telephone ?? '-' }}
                </div>
                <div>
                    <span class="font-semibold">استان:</span> {{  $province->title }}
                </div>
                <div>
                    <span class="font-semibold">شهر:</span>
                    {{ $cities->title ?? 'نامشخص' }}
                </div>
                <div class="sm:col-span-2">
                    <span class="font-semibold">آدرس کامل:</span> {{ $order->user->address->full_address ?? 'آدرسی یافت نشد' }}
                </div>
                <div>
                    <span class="font-semibold">کد پستی:</span> {{ $order->user->address->postal_code ?? '-' }}
                </div>
                <div class="sm:col-span-2">
                    <span class="font-semibold">توضیحات:</span> {{ $order->user->address->description ?? '-' }}
                </div>
            </div>
        </div>


        {{-- بخش آیتم‌های خریداری شده --}}
        <div class="bg-white shadow rounded-2xl p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">آیتم‌های سفارش</h3>

            <table class="w-full text-sm text-right border-collapse">
                <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-3">محصول</th>
                    <th class="py-2 px-3">دسته بندی</th>
                    <th class="py-2 px-3">برند</th>
                    <th class="py-2 px-3">سایز</th>
                    <th class="py-2 px-3">رنگ</th>
                    <th class="py-2 px-3">SKU</th>
                    <th class="py-2 px-3">قیمت واحد</th>
                    <th class="py-2 px-3">تعداد</th>
                    <th class="py-2 px-3">جمع</th>
                    <th class="py-2 px-3">عکس</th>
                </tr>
                </thead>

                <tbody>
                @foreach($order->items as $item)

                    @php
                        $product = $item->product;
                        $variant = $item->variant;

                        // اول بررسی تخفیف
                        if (!empty($variant?->discount_price) && $variant->discount_price > 0) {
                            $price = $variant->discount_price;
                        } else {
                            // قیمت ثبت‌شده هنگام خرید (اولویت دوم)
                            $price = $item->price_at_purchase
                                ?? $variant?->price
                                ?? 0;
                        }

                        $images = is_array($product->images)
                            ? $product->images
                            : ['defaults/no-image.png'];

                        $image = $images[0] ?? 'defaults/no-image.png';
                    @endphp

                    <tr class="border-b">

                        <td class="py-2 px-3">{{ $product->name }}</td>
                        <td class="py-2 px-3">{{ $product->category->name ?? '-' }}</td>
                        <td class="py-2 px-3">{{ $product->brand->name ?? '-' }}</td>

                        <td class="py-2 px-3">{{ $variant?->size ?? '-' }}</td>
                        <td class="py-2 px-3">
                            @if($variant?->color)
                                <span style="display: inline-block; width: 20px; height: 20px; background-color: {{ $variant->color }}; vertical-align: middle; margin-right: 5px; border: 1px solid #ccc;"></span>
                                ({{ App\Models\Color::select('name')->where('code', $variant->color)->value('name') }})
                            @else
                                -
                            @endif
                        </td>

                        <td class="py-2 px-3">{{ $variant?->sku ?? '-' }}</td>

                        <td class="py-2 px-3">
                            {{ number_format($price) }} تومان
                        </td>

                        <td class="py-2 px-3">{{ $item->quantity }}</td>

                        <td class="py-2 px-3">
                            {{ number_format($price * $item->quantity) }} تومان
                        </td>

                        <td class="py-2 px-3">
                            <img src="{{ asset('storage/' . $image) }}"
                                 class="w-20 h-20 object-cover rounded-lg">
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>

</div>


{{-- فاکتور چاپی --}}
<div id="invoice" class="hidden bg-white p-8 text-sm"
     style="font-family: IRANSans, sans-serif; direction: rtl; width: 850px; color:#333;">

    {{-- هدر --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold">فاکتور فروش</h2>
            <p>شماره سفارش: <strong>{{ $order->tracking_code }}</strong></p>
            <p>تاریخ ثبت: {{ $orderDate }}</p>
        </div>

        <div class="text-left">
            <p>وضعیت:
                <strong>
                    @switch($order->status)
                        @case('pending') در حال پردازش @break
                        @case('paid') پرداخت موفق @break
                        @case('shipped') ارسال شد @break
                        @case('delivered') تحویل داده شد @break
                        @case('canceled') لغو شده @break
                    @endswitch
                </strong>
            </p>
            <p>مبلغ کل:
                <strong>{{ number_format($order->total_price) }} تومان</strong>
            </p>
        </div>
    </div>

    <hr class="my-4">

    {{-- اطلاعات خریدار --}}
    <h3 class="font-bold mb-2">مشخصات تحویل گیرنده</h3>

    <div class="grid grid-cols-2 gap-2 text-xs mb-4">
        <p><strong>نام:</strong> {{ $order->user->address?->name }} {{ $order->user->address?->family_name }}</p>
        <p><strong>تلفن:</strong> {{ $order->user->address?->telephone }}</p>
        <p><strong>استان:</strong> {{ $cities->title }}</p>
        <p><strong>شهر:</strong> {{ $province->title }}</p>
        <p class="col-span-2"><strong>آدرس کامل:</strong> {{ $order->user->address?->full_address }}</p>
        <p><strong>کد پستی:</strong> {{ $order->user->address?->postal_code }}</p>
        <p><strong>توضیحات:</strong> {{ $order->user->address?->description }}</p>
    </div>

    <hr class="my-4">

    {{-- آیتم‌ها --}}
    <h3 class="font-bold mb-3">اقلام سفارش</h3>

    <table class="w-full text-xs border border-gray-300" style="border-collapse: collapse;">
        <thead style="background:#f3f4f6;">
        <tr>
            <th class="border p-2">محصول</th>
            <th class="border p-2">ویژگی</th>
            <th class="border p-2">تعداد</th>
            <th class="border p-2">قیمت واحد</th>
            <th class="border p-2">جمع</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->items as $item)
            <tr>
                <td class="border p-2">
                    {{ $item->product->name }}
                </td>

                <td class="border p-2">
                    سایز: {{ $item->variant?->size ?? '-' }}
                    <br>
                    رنگ:
                    <span style="display:inline-block;width:12px;height:12px;border-radius:50%;background:{{ $item->variant?->color }}"></span>
                </td>

                <td class="border p-2 text-center">
                    {{ $item->quantity }}
                </td>

                <td class="border p-2 text-center">
                    {{ number_format($item->unit_price) }} تومان
                </td>

                <td class="border p-2 text-center font-bold">
                    {{ number_format($price * $item->quantity) }} تومان
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-6 text-left">
        <p class="text-sm font-bold">
            مبلغ نهایی قابل پرداخت: {{ number_format($order->total_price) }} تومان
        </p>
    </div>

    <hr class="my-6">

    <p class="text-center text-xs text-gray-500">
        این فاکتور به صورت سیستمی صادر شده و نیاز به مهر و امضا ندارد.
    </p>
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
</html>
