<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">

    <!-- استفاده از CDN رسمی Tailwind CSS -->
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <link rel="stylesheet" href="./assets/css/main.css">

    <!-- تنظیمات سفارشی برای رفع مشکل رنگ‌ها در مرورگرهای قدیمی -->


    <title>ورود - فروشگاه کیف و کفش نلی گالری</title>
</head>

<body class="max-w-[1700px] mx-auto bg-[#F3F4F6]">

<!-- progress bar -->
<div id="progressBar"></div>
<main>
    <section class="min-h-screen flex flex-col items-center justify-center">
        <div class="max-w-[369px] pt-5 pb-6 px-6 text-center bg-white rounded-xl">
            <div>
                <h4 class="font-semibold text-2xl mb-4 sm:mb-4.5 flex justify-center items-center gap-1">ورود با موبایل
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                </h4>
                <p class="flex items-center justify-center gap-1">
                    حساب کاربری ندارید؟
                    <a href="/register" class="font-semibold text-primary-500 hover:text-blue-600">ثبت نام کنید</a>
                </p>
                <form action="{{ route('login.sendOtp') }}" method="post">
                    @csrf
                    <div class="flex flex-col items-center gap-4 w-full text-md my-6">
                        <div class="flex justify-between items-center w-full bg-[#F3F4F6] rounded-xl py-1 px-3">
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="شماره موبایل" class="py-3 px-2 rounded-md w-full outline-none bg-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6 h-6 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                        </div>
                        @error('phone')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="bg-gradient-to-bl from-primary-500 to-primary-400 hover:opacity-90 text-white py-3 px-4 rounded-xl w-full transition-colors duration-75 cursor-pointer btn-fallback">
                        ورود
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>
</body>

<script src="./assets/js/swiper.min.js"></script>
<script src="./assets/js/sliders.js"></script>
<script src="./assets/js/main.js"></script>

</html>