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
        <h2 class="text-3xl font-bold mb-6 text-indigo-800">سفارشات</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-right font-semibold">مبلغ کل</th>
                    <th class="py-3 px-4 text-right font-semibold">وضعیت</th>
                    <th class="py-3 px-4 text-right font-semibold">روش پرداخت</th>
                    <th class="py-3 px-4 text-right font-semibold">کد رهگیری</th>
                    <th class="py-3 px-4 text-right font-semibold">شماره سفارش</th>
                    <th class="py-3 px-4 text-right font-semibold">تاریخ</th>
                    <th class="py-3 px-4 text-right font-semibold">عملیات</th>
                </tr>
                </thead>
                <tbody>
               @foreach($orders as $order)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-right">{{ number_format($order->total_price) }} تومان</td>
                    <td class="py-3 px-4 text-right">
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
                    </td>

                    <td class="py-3 px-4 text-right">پرداخت آنلاین</td>
                    @if($order->payment?->ref_code)
                        <td>{{ $order->payment->ref_code }}</td>
                    @else
                        <td>ثبت نشده</td>
                    @endif


                @if($order->tracking_code)
                        <td class="py-3 px-4 text-right">{{ $order->tracking_code }}</td>
                    @else
                        <td class="py-3 px-4 text-right">پرداخت نشده </td>
                    @endif
                    <td class="py-3 px-4 text-right"> {{ \Morilog\Jalali\Jalalian::fromDateTime($order->created_at)->format('Y/m/d') }}</td>

                    <td class="py-3 px-4 text-right">
                        <a href="{{ route('admin.order.details', $order->id)  }}" class="text-indigo-600 hover:text-indigo-800 font-medium">نمایش سفارش</a>
                    </td>
                </tr>
               @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>



</body>
</html>
