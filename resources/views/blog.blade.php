<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="./assets/image/fav.png">

  <link rel="stylesheet" href="./assets/css/main.css">

  <title>فروشگاه آنلاین دیجیتو</title>
</head>

<body class="max-w-[1700px] mx-auto">

  <!-- loading -->
  <div id="loading" class="z-50 fixed inset-0 flex flex-col items-center justify-center bg-gradient-to-bl from-zinc-50 to-zinc-100 transition-opacity duration-700">
    <div class="wrapper">
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="shadow"></div>
      <div class="shadow"></div>
      <div class="shadow"></div>
    </div>
    <div class="flex items-center gap-6 mt-10">
      <img class="max-w-20 md:max-w-36" src="./assets/image/logo.png" alt=""/>
      <div class="text-xl md:text-3xl font-yekanBakhExtraBold text-zinc-800">فروشگاه آنلاین دیجیتو</div>
    </div>
  </div>

  <!-- progress bar -->
  <div id="progressBar"></div>

  @include('header')

  <main class="mt-0 md:mt-8">
    <!-- new blogs slider -->
    <div class="md:mt-10 px-4 md:px-14">
      <!-- top blog -->
      <div class="flex gap-x-4 justify-between items-center mb-7">
        <div class="h-[1px] w-full bg-gradient-to-r from-white via-zinc-300 to-white">
        </div>
        <div class="w-48 min-w-fit text-zinc-700 md:font-yekanBakhBold md:text-lg">
          جدیدترین مطالب
        </div>
        <div class="h-[1px] w-full bg-gradient-to-r from-white via-zinc-300 to-white">
        </div>
      </div>
      <!-- main blog -->
      <div class="containerPSlider swiper">
        <div class="newBlogs">
          <div class="card-wrapper swiper-wrapper pb-10">
            <div class="card swiper-slide bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
              <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
                <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
              </a>
              <div class="p-2 mt-2">
                <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
                  ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
                </a>
                <div class="flex justify-between mt-8">
                  <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                    <svg
                      class="fill-zinc-400"
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill=""
                      viewBox="0 0 256 256">
                      <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                    </svg>
                    1403/08/04
                  </div>
                  <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                    ادامه مطلب
                    <svg
                      class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                      xmlns="http://www.w3.org/2000/svg"
                      width="14"
                      height="14"
                      fill=""
                      viewBox="0 0 256 256">
                      <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="card swiper-slide bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
              <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
                <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/3.png" alt="blog"/>
              </a>
              <div class="p-2 mt-2">
                <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
                  ۷ ترفند برای افزایش طیش طول عمر هدفون
                </a>
                <div class="flex justify-between mt-8">
                  <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                    <svg
                      class="fill-zinc-400"
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill=""
                      viewBox="0 0 256 256">
                      <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                    </svg>
                    1403/08/04
                  </div>
                  <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                    ادامه مطلب
                    <svg
                      class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                      xmlns="http://www.w3.org/2000/svg"
                      width="14"
                      height="14"
                      fill=""
                      viewBox="0 0 256 256">
                      <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="card swiper-slide bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
              <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
                <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/4.png" alt="blog"/>
              </a>
              <div class="p-2 mt-2">
                <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
                  ۷ ترفند برای افزایش طیش طول عمر هدفون
                </a>
                <div class="flex justify-between mt-8">
                  <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                    <svg
                      class="fill-zinc-400"
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill=""
                      viewBox="0 0 256 256">
                      <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                    </svg>
                    1403/08/04
                  </div>
                  <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                    ادامه مطلب
                    <svg
                      class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                      xmlns="http://www.w3.org/2000/svg"
                      width="14"
                      height="14"
                      fill=""
                      viewBox="0 0 256 256">
                      <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="card swiper-slide bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
              <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
                <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
              </a>
              <div class="p-2 mt-2">
                <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
                  ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
                </a>
                <div class="flex justify-between mt-8">
                  <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                    <svg
                      class="fill-zinc-400"
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill=""
                      viewBox="0 0 256 256">
                      <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                    </svg>
                    1403/08/04
                  </div>
                  <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                    ادامه مطلب
                    <svg
                      class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                      xmlns="http://www.w3.org/2000/svg"
                      width="14"
                      height="14"
                      fill=""
                      viewBox="0 0 256 256">
                      <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="card swiper-slide bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
              <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
                <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/3.png" alt="blog"/>
              </a>
              <div class="p-2 mt-2">
                <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
                  ۷ ترفند برای افزایش طیش طول عمر هدفون
                </a>
                <div class="flex justify-between mt-8">
                  <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                    <svg
                      class="fill-zinc-400"
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill=""
                      viewBox="0 0 256 256">
                      <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                    </svg>
                    1403/08/04
                  </div>
                  <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                    ادامه مطلب
                    <svg
                      class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                      xmlns="http://www.w3.org/2000/svg"
                      width="14"
                      height="14"
                      fill=""
                      viewBox="0 0 256 256">
                      <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- blogs and category -->
    <div class="flex flex-col lg:flex-row px-4 md:px-20 mt-10 gap-5 pb-20">
      <!-- category -->
      <div class="lg:w-3/12 border border-zinc-300 h-fit rounded-2xl p-3 space-y-2">
        <div>
          <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg">
            <div class="flex items-center gap-x-1">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="stroke-zinc-800" d="M15.25 2.75H8.75C7.09315 2.75 5.75 4.09315 5.75 5.75V18.25C5.75 19.9069 7.09315 21.25 8.75 21.25H15.25C16.9069 21.25 18.25 19.9069 18.25 18.25V5.75C18.25 4.09315 16.9069 2.75 15.25 2.75Z" stroke="#71717b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path class="stroke-zinc-800" d="M11 17.75H13" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span class="text-zinc-800">موبایل</span>
            </div>
            <img class="w-4 transition-transform opacity-80" src="./assets/image/icons/arrowDown.svg" alt="">
          </button>
          <ul class="submenu hidden pr-6 space-y-2">
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
          </ul>
        </div>
        <div>
          <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg">
            <div class="flex items-center gap-x-1">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="stroke-zinc-800" d="M15.25 2.75H8.75C7.09315 2.75 5.75 4.09315 5.75 5.75V18.25C5.75 19.9069 7.09315 21.25 8.75 21.25H15.25C16.9069 21.25 18.25 19.9069 18.25 18.25V5.75C18.25 4.09315 16.9069 2.75 15.25 2.75Z" stroke="#71717b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path class="stroke-zinc-800" d="M11 17.75H13" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span class="text-zinc-800">موبایل</span>
            </div>
            <img class="w-4 transition-transform opacity-80" src="./assets/image/icons/arrowDown.svg" alt="">
          </button>
          <ul class="submenu hidden pr-6 space-y-2">
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
          </ul>
        </div>
        <div>
          <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg">
            <div class="flex items-center gap-x-1">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="stroke-zinc-800" d="M15.25 2.75H8.75C7.09315 2.75 5.75 4.09315 5.75 5.75V18.25C5.75 19.9069 7.09315 21.25 8.75 21.25H15.25C16.9069 21.25 18.25 19.9069 18.25 18.25V5.75C18.25 4.09315 16.9069 2.75 15.25 2.75Z" stroke="#71717b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path class="stroke-zinc-800" d="M11 17.75H13" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span class="text-zinc-800">موبایل</span>
            </div>
            <img class="w-4 transition-transform opacity-80" src="./assets/image/icons/arrowDown.svg" alt="">
          </button>
          <ul class="submenu hidden pr-6 space-y-2">
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
          </ul>
        </div>
        <div>
          <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg">
            <div class="flex items-center gap-x-1">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="stroke-zinc-800" d="M15.25 2.75H8.75C7.09315 2.75 5.75 4.09315 5.75 5.75V18.25C5.75 19.9069 7.09315 21.25 8.75 21.25H15.25C16.9069 21.25 18.25 19.9069 18.25 18.25V5.75C18.25 4.09315 16.9069 2.75 15.25 2.75Z" stroke="#71717b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path class="stroke-zinc-800" d="M11 17.75H13" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span class="text-zinc-800">موبایل</span>
            </div>
            <img class="w-4 transition-transform opacity-80" src="./assets/image/icons/arrowDown.svg" alt="">
          </button>
          <ul class="submenu hidden pr-6 space-y-2">
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
          </ul>
        </div>
        <div>
          <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg">
            <div class="flex items-center gap-x-1">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="stroke-zinc-800" d="M15.25 2.75H8.75C7.09315 2.75 5.75 4.09315 5.75 5.75V18.25C5.75 19.9069 7.09315 21.25 8.75 21.25H15.25C16.9069 21.25 18.25 19.9069 18.25 18.25V5.75C18.25 4.09315 16.9069 2.75 15.25 2.75Z" stroke="#71717b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path class="stroke-zinc-800" d="M11 17.75H13" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span class="text-zinc-800">موبایل</span>
            </div>
            <img class="w-4 transition-transform opacity-80" src="./assets/image/icons/arrowDown.svg" alt="">
          </button>
          <ul class="submenu hidden pr-6 space-y-2">
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
          </ul>
        </div>
        <div>
          <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg">
            <div class="flex items-center gap-x-1">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="stroke-zinc-800" d="M15.25 2.75H8.75C7.09315 2.75 5.75 4.09315 5.75 5.75V18.25C5.75 19.9069 7.09315 21.25 8.75 21.25H15.25C16.9069 21.25 18.25 19.9069 18.25 18.25V5.75C18.25 4.09315 16.9069 2.75 15.25 2.75Z" stroke="#71717b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path class="stroke-zinc-800" d="M11 17.75H13" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span class="text-zinc-800">موبایل</span>
            </div>
            <img class="w-4 transition-transform opacity-80" src="./assets/image/icons/arrowDown.svg" alt="">
          </button>
          <ul class="submenu hidden pr-6 space-y-2">
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
          </ul>
        </div>
        <div>
          <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg">
            <div class="flex items-center gap-x-1">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="stroke-zinc-800" d="M15.25 2.75H8.75C7.09315 2.75 5.75 4.09315 5.75 5.75V18.25C5.75 19.9069 7.09315 21.25 8.75 21.25H15.25C16.9069 21.25 18.25 19.9069 18.25 18.25V5.75C18.25 4.09315 16.9069 2.75 15.25 2.75Z" stroke="#71717b" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path class="stroke-zinc-800" d="M11 17.75H13" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span class="text-zinc-800">موبایل</span>
            </div>
            <img class="w-4 transition-transform opacity-80" src="./assets/image/icons/arrowDown.svg" alt="">
          </button>
          <ul class="submenu hidden pr-6 space-y-2">
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
            <li>
              <button class="menu-toggle flex justify-between w-full py-3 px-4 hover:bg-gray-100 rounded-lg text-zinc-700 text-sm">
                <a href="">طراحی گرافیک</a>
              </button>
            </li>
          </ul>
        </div>
      </div>
      <!-- blogs -->
      <div class="lg:w-9/12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
        <div class="bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
          <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
            <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
          </a>
          <div class="p-2 mt-2">
            <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
              ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
            </a>
            <div class="flex justify-between mt-8">
              <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                <svg
                  class="fill-zinc-400"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                </svg>
                1403/08/04
              </div>
              <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                ادامه مطلب
                <svg
                  class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
          <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
            <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
          </a>
          <div class="p-2 mt-2">
            <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
              ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
            </a>
            <div class="flex justify-between mt-8">
              <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                <svg
                  class="fill-zinc-400"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                </svg>
                1403/08/04
              </div>
              <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                ادامه مطلب
                <svg
                  class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
          <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
            <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
          </a>
          <div class="p-2 mt-2">
            <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
              ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
            </a>
            <div class="flex justify-between mt-8">
              <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                <svg
                  class="fill-zinc-400"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                </svg>
                1403/08/04
              </div>
              <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                ادامه مطلب
                <svg
                  class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
          <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
            <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
          </a>
          <div class="p-2 mt-2">
            <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
              ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
            </a>
            <div class="flex justify-between mt-8">
              <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                <svg
                  class="fill-zinc-400"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                </svg>
                1403/08/04
              </div>
              <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                ادامه مطلب
                <svg
                  class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
          <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
            <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
          </a>
          <div class="p-2 mt-2">
            <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
              ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
            </a>
            <div class="flex justify-between mt-8">
              <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                <svg
                  class="fill-zinc-400"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                </svg>
                1403/08/04
              </div>
              <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                ادامه مطلب
                <svg
                  class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
          <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
            <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
          </a>
          <div class="p-2 mt-2">
            <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
              ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
            </a>
            <div class="flex justify-between mt-8">
              <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                <svg
                  class="fill-zinc-400"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                </svg>
                1403/08/04
              </div>
              <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                ادامه مطلب
                <svg
                  class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
          <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
            <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
          </a>
          <div class="p-2 mt-2">
            <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
              ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
            </a>
            <div class="flex justify-between mt-8">
              <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                <svg
                  class="fill-zinc-400"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                </svg>
                1403/08/04
              </div>
              <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                ادامه مطلب
                <svg
                  class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
          <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
            <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
          </a>
          <div class="p-2 mt-2">
            <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
              ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
            </a>
            <div class="flex justify-between mt-8">
              <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                <svg
                  class="fill-zinc-400"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                </svg>
                1403/08/04
              </div>
              <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                ادامه مطلب
                <svg
                  class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-3xl border hover:border-zinc-300 transition border-zinc-300 group p-2 md:p-3 hover:drop-shadow-lg">
          <a href="" class="image-box block overflow-hidden rounded-lg md:rounded-2xl">
            <img class="rounded-2xl w-full transition-transform duration-300 ease-in-out group-hover:rotate-3 group-hover:scale-110 lazyload" src="./assets/image/blog/2.png" alt="blog"/>
          </a>
          <div class="p-2 mt-2">
            <a href="./blog(single).html" class="text-xs md:text-sm font-normal md:font-semibold h-8 lg:h-10 line-clamp-2 text-zinc-700">
              ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون ۷ ترفند برای افزایش طیش طول عمر هدفون
            </a>
            <div class="flex justify-between mt-8">
              <div class="text-xs flex gap-x-1 items-center text-zinc-400">
                <svg
                  class="fill-zinc-400"
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                </svg>
                1403/08/04
              </div>
              <a href="" class="flex justify-center items-center gap-x-1 group w-fit text-xs md:text-sm transition text-zinc-600 group-hover:text-zinc-700">
                ادامه مطلب
                <svg
                  class="fill-zinc-600 transition group-hover:fill-zinc-700 size-2 md:size-4"
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="14"
                  fill=""
                  viewBox="0 0 256 256">
                  <path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- pagination -->
    <div class="flex justify-center mb-12">
      <a href="#" class="flex items-center justify-center px-3.5 md:px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md -scale-x-100 hover:bg-primary-500 hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 md:size-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
      <a href="#" class="border border-zinc-100 text-sm md:text-base px-3.5 md:px-4 py-2 mx-1 transition-colors duration-300 transform bg-primary-500 text-white rounded-md">
          1
      </a>
      <a href="#" class="border border-zinc-100 text-sm md:text-base px-3.5 md:px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md hover:bg-primary-500 hover:text-white">
          2
      </a>
      <a href="#" class="border border-zinc-100 text-sm md:text-base px-3.5 md:px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md hover:bg-primary-500 hover:text-white">
          ...
      </a>
      <a href="#" class="border border-zinc-100 text-sm md:text-base px-3.5 md:px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md hover:bg-primary-500 hover:text-white">
          9
      </a>
      <a href="#" class="border border-zinc-100 text-sm md:text-base px-3.5 md:px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md hover:bg-primary-500 hover:text-white">
          10
      </a>
      <a href="#" class="flex items-center justify-center px-3.5 md:px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md -scale-x-100 hover:bg-primary-500 hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 md:size-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>
  </main>

  @include('footer')
</body>

<script src="./assets/js/swiper.min.js"></script>
<script src="./assets/js/sliders.js"></script>
<script src="./assets/js/main.js"></script>

</html>
