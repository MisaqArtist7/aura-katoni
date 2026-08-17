<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>


    <link rel="stylesheet" href="./assets/css/main.css">

    <title>ثبت نام -فروشگاه آنلاین کیف و کفش نلی گالری</title>
</head>

<body class="max-w-[1700px] mx-auto bg-[#F3F4F6]">



<!-- progress bar -->
<div id="progressBar"></div>
<main>
    <section class="min-h-screen flex flex-col items-center justify-center">
        <div class="max-w-[500px] border border-gray-100 shadow-md pt-5 pb-6 px-6 text-center bg-white rounded-xl">
            <div>
                <h4 class="font-semibold text-2xl mb-4 sm:mb-4.5 flex justify-center items-center gap-1">عضویت
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                </h4>
                <p class="flex items-center justify-center gap-1">
                    قبلا ثبت نام کرده اید؟
                    <a href="/login" class="font-semibold text-primary-500">وارد شوید </a>
                </p>
                <form  action="{{ route('register') }}"  method="post" class="">
                    @csrf
                    <div class="flex flex-col items-center gap-4 w-full text-md my-6">
                        <div class="flex justify-between items-center w-full bg-[#F3F4F6] border border-gray-200 rounded-xl py-1 px-3">
                            <input type="text" placeholder="نام و نام خانوادگی" name="name" value="{{ old('name') }}" class="py-3 px-2 rounded-md w-full outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                        <div class="flex justify-between items-center w-full bg-[#F3F4F6] border border-gray-200 rounded-xl py-1 px-3">
                            <input type="text" placeholder="شماره موبایل" name="phone" value="{{ old('phone') }}" class="py-3 px-2 rounded-md w-full outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                        </div>
                        @error('phone')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="bg-gradient-to-bl from-primary-500 to-primary-400 hover:opacity-90 text-white py-3 px-4 rounded-xl w-full transition-colors duration-75 cursor-pointer">ثبت نام</button>
                </form>
            </div>
        </div>
{{--        <div class="max-w-[330px] w-full mx-auto text-center mt-7 sm:mt-8 text-gray-600">--}}
{{--            با عضویت در سایت، تمامی قوانین و شرایط استفاده از خدمات--}}
{{--            <a href="/login" class="text-primary-500 font-semibold">اسمارت الکتریک</a> را پذیرفته اید.--}}
{{--        </div>--}}
    </section>
</main>
</body>

<script src="./assets/js/swiper.min.js"></script>
<script src="./assets/js/sliders.js"></script>
<script src="./assets/js/main.js"></script>

</html>
