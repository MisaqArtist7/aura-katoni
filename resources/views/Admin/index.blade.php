<!DOCTYPE html>
 <html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت مدرن</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

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
        <h2 class="text-3xl font-bold mb-6 text-rose-600">داشبورد</h2>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="bg-white p-6 rounded-sm shadow-md hover-scale fade-in" style="animation-delay: 0.1s;">
                <h3 class="text-xl font-semibold mb-2">تعداد پست‌ها</h3>
                <p class="text-xl font-semibold text-rose-600">{{ $postsCount }}</p>
                <div class="mt-2 text-green-500 flex items-center">

                </div>
            </div>
            <div class="bg-white p-6 rounded-sm shadow-md hover-scale fade-in" style="animation-delay: 0.2s;">
                <h3 class="text-xl font-semibold mb-2">کل بازدیدهای سایت</h3>
                <p class="text-xl font-semibold text-rose-600">{{ $wesiteViews  }}</p>
                <div class="mt-2 text-green-500 flex items-center">

                </div>
            </div>
            <div class="bg-white p-6 rounded-sm shadow-md hover-scale fade-in" style="animation-delay: 0.3s;">
                <h3 class="text-xl font-semibold mb-2">بازدید های 24 ساعت اخیر</h3>
                <p class="text-xl font-semibold text-rose-600">{{ $todayViews  }}</p>
                <div class="mt-2 text-yellow-500 flex items-center">

                </div>
            </div>
            <div class="bg-white p-6 rounded-sm shadow-md hover-scale fade-in" style="animation-delay: 0.4s;">
                <h3 class="text-xl font-semibold mb-2">تعداد نمونه کار ها</h3>
                <p class="text-xl font-semibold text-rose-600">{{ $workSamples  }}</p>
                <div class="mt-2 text-green-500 flex items-center">

                </div>
            </div>
        </div>


        <!-- Recent Activity -->
        <div class="bg-white p-6 rounded-sm shadow-md mb-8 fade-in" style="animation-delay: 0.6s;">
            <h3 class="text-xl font-semibold mb-4 text-rose-600">آخرین فعالیت‌ها</h3>
            <ul class="space-y-4">
                <li class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-md transition duration-200">
                    <div class="flex items-center space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>پست جدید اضافه شد</span>
                    </div>
                    <span class="text-sm text-gray-500">{{ $latestPostTime  }}</span>
                </li>

                <li class="relative flex items-center justify-between p-3 hover:bg-gray-50 rounded-md transition duration-200">
                    <a href="{{ route('admin.review.index') }}">
                    <div class="flex items-center space-x-3 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <span>مشاهده آخرین کامنت ها </span>

                        <span class="absolute -top-3 -right-4 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                            {{ $seentComment  }}
                        </span>
                    </div>
                    </a>
                    <span class="text-sm text-gray-500">۴ ساعت پیش</span>
                </li>


                <li class="relative flex items-center justify-between p-3 hover:bg-gray-50 rounded-md transition duration-200">
                    <a href="{{ route('admin.order.index') }}">
                        <div class="flex items-center space-x-3 relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span>مشاهده سفارشات جدید</span>

                            <span class="absolute -top-3 -right-4 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                            {{ $seentComment  }}
                        </span>
                        </div>
                    </a>
{{--                    <span class="text-sm text-gray-500">۴ ساعت پیش</span>--}}
                </li>

            </ul>
        </div>

    </main>
</div>



</body>
<script src="{{ asset('assets/js/main.js') }}"></script>

</html>
