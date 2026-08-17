<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/image/fav.png">
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <title>فروشگاه آنلاین دیجیتو |‌ تایید ورود</title>
</head>

<body class="max-w-[1700px] mx-auto bg-[#F3F4F6]">



<!-- progress bar -->
<div id="progressBar"></div>
<main>
    <section class="min-h-screen flex flex-col items-center justify-center">
        <div class="max-w-[369px] pt-5 pb-6 px-6 text-center bg-white rounded-xl">
            <div>
                <h4 class="font-semibold text-2xl mb-4 sm:mb-4.5 flex justify-center items-center gap-1">ورود با موبایل
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                </h4>
                <div class="flex flex-col items-start gap-4">
                    <span class="font-semibold">کد تایید را وارد کنید</span>
                    <p href="" class="text-sm text-gray-600">کد تایید برای شماره <span class="text-primary-500">{{ request('phone') }}</span> پیامک شد</p>
                </div>
                <form action="{{ route('verify.otp') }}" method="post" class="">
                    @csrf
                    <div class="flex flex-col items-center gap-4 w-full text-md my-6">
                        <div class="flex justify-between items-center w-full bg-[#F3F4F6] rounded-xl py-1 px-3">
                            <input type="hidden" name="phone" value="{{ request('phone') }}">
                            <input type="text" name="otp" placeholder="کد را وارد کنید" class=" py-3 px-2 rounded-md w-full outline-none" maxlength="6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        @error('otp')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="bg-gradient-to-bl from-primary-500 to-primary-400 hover:opacity-90 text-white py-3 px-4 rounded-xl w-full transition-colors duration-75 cursor-pointer">تایید</button>
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