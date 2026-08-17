<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="./assets/image/fav.png">

  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
{{--    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}

  <title>فروشگاه آنلاین دیجیتو</title>
</head>

<body class="max-w-[1700px] mx-auto">

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
  <!-- progress bar -->
  <div id="progressBar"></div>

  @include('header')

  <main class="mt-0 md:mt-8">
    <nav class="flex items-center gap-1 md:gap-5 w-full md:w-10/12 md:mx-auto">
      <a class="flex flex-col md:flex-row items-center w-fit min-w-24 md:min-w-32 gap-1 text-green-500 text-sm" href="cart.blade.php">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="fill-green-600" fill-rule="evenodd" clip-rule="evenodd" d="M3.03998 2.292C2.85221 2.22609 2.64595 2.23748 2.46657 2.32365C2.28719 2.40982 2.14939 2.56373 2.08348 2.7515C2.01758 2.93927 2.02896 3.14554 2.11513 3.32491C2.20131 3.50429 2.35521 3.64209 2.54298 3.708L2.80398 3.799C3.47198 4.034 3.91098 4.189 4.23398 4.348C4.53698 4.497 4.66998 4.618 4.75798 4.746C4.84798 4.878 4.91798 5.06 4.95798 5.423C4.99798 5.803 4.99998 6.298 4.99998 7.038V9.64C4.99998 12.582 5.06298 13.552 5.92998 14.466C6.79598 15.38 8.18998 15.38 10.98 15.38H16.282C17.843 15.38 18.624 15.38 19.175 14.93C19.727 14.48 19.885 13.716 20.2 12.188L20.7 9.763C21.047 8.023 21.22 7.154 20.776 6.577C20.332 6 18.816 6 17.131 6H6.49198C6.48776 5.75351 6.47342 5.50731 6.44898 5.262C6.39498 4.765 6.27898 4.312 5.99698 3.9C5.71298 3.484 5.33498 3.218 4.89398 3.001C4.48198 2.799 3.95798 2.615 3.34198 2.398L3.03998 2.292ZM15.517 8.457C15.817 8.743 15.829 9.217 15.543 9.517L12.686 12.517C12.6159 12.5905 12.5317 12.649 12.4384 12.689C12.345 12.729 12.2445 12.7496 12.143 12.7496C12.0414 12.7496 11.9409 12.729 11.8476 12.689C11.7543 12.649 11.67 12.5905 11.6 12.517L10.457 11.317C10.3861 11.2463 10.3302 11.1621 10.2924 11.0694C10.2546 10.9767 10.2357 10.8774 10.2369 10.7773C10.2381 10.6773 10.2593 10.5784 10.2993 10.4867C10.3393 10.3949 10.3972 10.3121 10.4697 10.243C10.5422 10.174 10.6278 10.1202 10.7214 10.0848C10.815 10.0494 10.9147 10.033 11.0148 10.0367C11.1148 10.0405 11.2131 10.0642 11.3038 10.1065C11.3945 10.1488 11.4758 10.2088 11.543 10.283L12.143 10.913L14.457 8.483C14.5941 8.33904 14.7828 8.25544 14.9816 8.25057C15.1804 8.24569 15.3729 8.31994 15.517 8.457Z" fill="black"/>
          <path class="fill-green-600" d="M7.5 18C7.89782 18 8.27936 18.158 8.56066 18.4393C8.84196 18.7206 9 19.1022 9 19.5C9 19.8978 8.84196 20.2794 8.56066 20.5607C8.27936 20.842 7.89782 21 7.5 21C7.10218 21 6.72064 20.842 6.43934 20.5607C6.15804 20.2794 6 19.8978 6 19.5C6 19.1022 6.15804 18.7206 6.43934 18.4393C6.72064 18.158 7.10218 18 7.5 18ZM16.5 18C16.8978 18 17.2794 18.158 17.5607 18.4393C17.842 18.7206 18 19.1022 18 19.5C18 19.8978 17.842 20.2794 17.5607 20.5607C17.2794 20.842 16.8978 21 16.5 21C16.1022 21 15.7206 20.842 15.4393 20.5607C15.158 20.2794 15 19.8978 15 19.5C15 19.1022 15.158 18.7206 15.4393 18.4393C15.7206 18.158 16.1022 18 16.5 18Z" fill="black"/>
        </svg>
        سبدخرید
      </a>
      <div class="h-0.5 w-full bg-gradient-to-r from-white via-zinc-300 to-white"></div>
      <a class="flex flex-col md:flex-row items-center w-fit min-w-24 md:min-w-32 gap-1 text-primary-500 text-sm" href="cart.blade.php">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="fill-primary-700" d="M12 10C14.2091 10 16 8.20914 16 6C16 3.79086 14.2091 2 12 2C9.79086 2 8 3.79086 8 6C8 8.20914 9.79086 10 12 10Z" fill="black"/>
          <path class="fill-primary-700" d="M20 17.5C20 19.985 20 22 12 22C4 22 4 19.985 4 17.5C4 15.015 7.582 13 12 13C16.418 13 20 15.015 20 17.5Z" fill="black"/>
        </svg>
        اطلاعات پرداخت
      </a>
      <div class="h-0.5 w-full bg-gradient-to-r from-white via-zinc-300 to-white"></div>
      <a class="flex flex-col md:flex-row items-center w-fit min-w-24 md:min-w-32 gap-1 text-zinc-700 text-sm" href="cart.blade.php">
        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="stroke-zinc-700" d="M20.5312 5.625H6.46875C4.60479 5.625 3.09375 7.13604 3.09375 9V18C3.09375 19.864 4.60479 21.375 6.46875 21.375H20.5312C22.3952 21.375 23.9062 19.864 23.9062 18V9C23.9062 7.13604 22.3952 5.625 20.5312 5.625Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path class="stroke-zinc-700" d="M3.09375 10.6875H23.9062" stroke="black" stroke-width="1.5"/>
          <path class="stroke-zinc-700" d="M16.5938 16.0312H19.9688" stroke="black" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        اتمام خرید
      </a>
    </nav>
    <div class="flex flex-col lg:flex-row px-4 md:px-20 mt-10 gap-5 pb-20">
      <div class="lg:w-9/12 border border-zinc-200 rounded-xl p-5">
        <div class="flex justify-end items-center">

        </div>
        <!-- modal for edit -->
        <div id="modal2" class="modal fixed inset-0 bg-black/20 bg-opacity-50 hidden flex items-center justify-center transition-opacity duration-300 z-50">
            <div class="modal-box bg-white p-2 rounded-xl shadow-lg w-11/12 md:w-6/12
              transition-transform duration-300 opacity-0 scale-90
              max-h-[90vh] overflow-y-auto">
                <div class="flex justify-between items-center p-4 border-b border-zinc-300">
                    <h3 class="text-gray-700">
                        ویرایش آدرس</h3>
                </div>
                @if(auth()->user()->address)
                    <form class="space-y-6 px-2 lg:px-8 pb-4 sm:pb-6 pt-4 text-xs md:text-base"
                          method="POST"
                          action="{{ route('user.address.update', auth()->user()->address->id) }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="sm:flex gap-x-5">
                            <div class="sm:w-1/2 mb-2 sm:mb-0 flex flex-col gap-y-1">
                                <label class="text-zinc-700 flex">
                                    نام
                                    <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                                </label>
                                <input class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0]
            px-5 py-3.5 placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300"
                                       type="text"
                                       name="name"
                                       value="{{ old('name', auth()->user()->address->name) }}"
                                       placeholder="نام">
                                @error('name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="sm:w-1/2 flex flex-col gap-y-1">
                                <label class="text-zinc-700 flex">
                                    نام خانوادگی
                                    <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                                </label>
                                <input class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0]
            px-5 py-3.5 placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300"
                                       type="text"
                                       name="family_name"
                                       value="{{ old('family_name', auth()->user()->address->family_name) }}"
                                       placeholder="نام خانوادگی">
                                @error('family_name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:flex gap-x-5 mt-7">
                            {{-- استان --}}
                            <div class="sm:w-1/2 mb-2 sm:mb-0 flex flex-col gap-y-1">
                                <label class="text-zinc-700 flex items-center gap-1">
                                    استان
                                    <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 256 256">
                                        <path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path>
                                    </svg>
                                </label>
                                <select id="province" name="province" class="appearance-none rounded-2xl text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5 placeholder:text-zinc-400 focus:outline-1 focus:outline-zinc-300">
                                    <option value="">انتخاب استان</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->title }}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- شهر --}}
                            <div class="sm:w-1/2 flex flex-col gap-y-1">
                                <label class="text-zinc-700 flex items-center gap-1">
                                    شهر
                                    <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 256 256">
                                        <path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path>
                                    </svg>
                                </label>
                                <select id="city" name="city" class="appearance-none rounded-2xl text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5 placeholder:text-zinc-400 focus:outline-1 focus:outline-zinc-300">
                                    <option value="">لطفا ابتدا استان را انتخاب کنید</option>
                                </select>
                                @error('city')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-7 flex flex-col gap-y-1">
                            <label class="text-zinc-700 flex">آدرس کامل</label>
                            <input type="text" name="full_address"
                                   value="{{ old('full_address', auth()->user()->address->full_address) }}"
                                   class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5 focus:outline-1 focus:outline-zinc-300"
                                   placeholder="خیابان، کوچه، پلاک، واحد">
                            @error('full_address')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:flex gap-x-5 mt-5">
                            <div class="sm:w-1/2 flex flex-col gap-y-1">
                                <label class="text-zinc-700 flex">تلفن</label>
                                <input type="text" name="telephone"
                                       value="{{ old('telephone', auth()->user()->address->telephone) }}"
                                       class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5 focus:outline-1 focus:outline-zinc-300"
                                       placeholder="تلفن همراه">
                                @error('telephone')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="sm:w-1/2 flex flex-col gap-y-1">
                                <label class="text-zinc-700 flex">کد پستی</label>
                                <input type="text" name="postal_code"
                                       value="{{ old('postal_code', auth()->user()->address->postal_code) }}"
                                       class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5 focus:outline-1 focus:outline-zinc-300"
                                       placeholder="کد پستی">
                                @error('postal_code')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-5 flex flex-col gap-y-1">
                            <label class="text-zinc-700 flex">توضیحات اضافه</label>
                            <textarea
                                name="description"
                                cols="30"
                                rows="4"
                                class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5 focus:outline-1 focus:outline-zinc-300"
                                placeholder="توضیحات اضافی">{{ old('description', auth()->user()->address->description) }}</textarea>
                            @error('description')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-7">
                            <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-3 rounded-2xl transition-all">
                                بروزرسانی آدرس
                            </button>
                        </div>
                    </form>


                @endif

            </div>
        </div>
          @if(auth()->user()->address)
              <div class="bg-white  rounded-xl shadow-lg ">
                  <div class="flex justify-between items-center p-4 border-b border-zinc-300">
                      <h3 class="text-gray-700"> آدرس</h3>
                  </div>
                  <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 pt-4">
                      <div class="space-y-5">
                          <ul class="w-full flex flex-col gap-3">
                              <li>
                                  <input type="radio" id="16" name="pey" value="16" class="hidden peer" requiblue="">
                                  <label for="16" class="block w-full p-2 text-gray-600 bg-white  rounded-lg
                                  cursor-pointer peer-checked:border-zinc-500 peer-checked:border-2 peer-checked:text-zinc-600 opacity-70 peer-checked:opacity-100">
                                      <div>
                                          <div class="border-b border-b-zinc-400 p-3 text-zinc-800 text-sm flex justify-between items-center">
                                              {{ auth()->user()->address->provinceRelation->title }} -  {{ auth()->user()->address->cityRelation->title }}
                                          </div>
                                          <div class="px-5 py-4 text-zinc-600 space-y-4 text-sm">
                                              <div class="flex gap-x-1 items-center">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z"></path></svg>
                                                  {{ auth()->user()->address->full_address }}
                                              </div>
                                              <div class="flex gap-x-1 items-center">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M228.44,89.34l-96-64a8,8,0,0,0-8.88,0l-96,64A8,8,0,0,0,24,96V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V96A8,8,0,0,0,228.44,89.34ZM96.72,152,40,192V111.53Zm16.37,8h29.82l56.63,40H56.46Zm46.19-8L216,111.53V192ZM128,41.61l81.91,54.61-67,47.78H113.11l-67-47.78Z"></path></svg>
                                                  {{ auth()->user()->address->postal_code }}
                                              </div>
                                              <div class="flex gap-x-1 items-center">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160c-15.42-7.49-31.34-23.29-38.83-38.51l20.78-24.71c.2-.25.39-.5.57-.77a16,16,0,0,0,1.32-15.06l0-.12L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47L83.2,111.86a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.06,18.53,27.73,37.06,46.46,46.11a16,16,0,0,0,15.75-1.14,8.44,8.44,0,0,0,.74-.56L168.89,152l47,21.05h0s.08,0,.11,0A40.21,40.21,0,0,1,176,208Z"></path></svg>
                                                  {{ auth()->user()->address->telephone }}
                                              </div>
                                              <div class="flex gap-x-1 items-center">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                                                  {{ auth()->user()->address->name }} {{ auth()->user()->address->family_name }}
                                              </div>
                                          </div>
                                      </div>
                                  </label>
                              </li>
                          </ul>
                      </div>

                      <a href="#" data-modal="modal2" class="open-modal block bg-primary-500 hover:bg-primary-400 text-white text-center w-8/12 mx-auto mt-10 px-5 py-3 rounded-xl shadow-lg transition-all font-yekanBakhBold">
                          ویرایش آدرس
                      </a>
                  </form>
              </div>
          @else
              <form class="space-y-6 px-2 lg:px-8 pb-4 sm:pb-6 pt-4 text-xs md:text-base" method="post" action="{{ route('user.address.store') }}">
                  @csrf
                  <div class="sm:flex gap-x-5">
                      <div class="sm:w-1/2 mb-2 sm:mb-0 flex flex-col gap-y-1">
                          <label class="text-zinc-700 flex">
                              نام
                              <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                          </label>
                          <input class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0]
                   px-5 py-3.5 placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300" type="text" name="name" value="{{ old('name') }}" placeholder="نام">
                          @error('name')
                          <span class="text-red-500 text-xs">{{ $message }}</span>
                          @enderror

                      </div>
                      <div class="sm:w-1/2 flex flex-col gap-y-1">
                          <label class="text-zinc-700 flex">
                              نام خانوادگی
                              <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                          </label>
                          <input class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0]
                   px-5 py-3.5 placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300" type="text" name="family_name" value="{{ old('family_name') }}" placeholder="نام حانوادگی">
                          @error('family_name')
                          <span class="text-red-500 text-xs">{{ $message }}</span>
                          @enderror

                      </div>
                  </div>
                  <div class="sm:flex gap-x-5 mt-7">
                      {{-- استان --}}
                      <div class="sm:w-1/2 mb-2 sm:mb-0 flex flex-col gap-y-1">
                          <label class="text-zinc-700 flex items-center gap-1">
                              استان
                              <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 256 256">
                                  <path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path>
                              </svg>
                          </label>
                          <select id="province" name="province" class="appearance-none rounded-2xl text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5 placeholder:text-zinc-400 focus:outline-1 focus:outline-zinc-300">
                              <option value="">انتخاب استان</option>
                              @foreach($provinces as $province)
                                  <option value="{{ $province->id }}">{{ $province->title }}</option>
                              @endforeach
                          </select>
                          @error('province')
                          <span class="text-red-500 text-xs">{{ $message }}</span>
                          @enderror
                      </div>

                      {{-- شهر --}}
                      <div class="sm:w-1/2 flex flex-col gap-y-1">
                          <label class="text-zinc-700 flex items-center gap-1">
                              شهر
                              <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 256 256">
                                  <path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path>
                              </svg>
                          </label>
                          <select id="city" name="city" class="appearance-none rounded-2xl text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5 placeholder:text-zinc-400 focus:outline-1 focus:outline-zinc-300">
                              <option value="">لطفا ابتدا استان را انتخاب کنید</option>
                          </select>
                          @error('city')
                          <span class="text-red-500 text-xs">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="mt-7">
                      <div class="flex flex-col gap-y-1">
                          <label class="text-zinc-700 flex">
                              خیابان و کوچه و شماره پلاک و واحد
                              <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                          </label>
                          <input class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0]
                  px-5 py-3.5 placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300" type="text" name="full_address" value="{{ old('full_address') }}" placeholder="اطلاعات دقیق محل تحویل">
                          @error('full_address')
                          <span class="text-red-500 text-xs">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="sm:flex gap-x-5 mt-5">
                      <div class="sm:w-1/2 mb-2 sm:mb-0 flex flex-col gap-y-1">
                          <label class="text-zinc-700 flex">
                              تلفن
                              <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                          </label>
                          <input class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0]
                   px-5 py-3.5 placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300" type="text" name="telephone" value="{{ old('telephone') }}" placeholder="تلفن همراه">
                          @error('telephone')
                          <span class="text-red-500 text-xs">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="sm:w-1/2 flex flex-col gap-y-1">
                          <label class="text-zinc-700 flex">
                              کد پستی
                              <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4d4d4d" viewBox="0 0 256 256"><path d="M210.23,101.57l-72.6,29,51.11,65.71a6,6,0,0,1-9.48,7.36L128,137.77,76.74,203.68a6,6,0,1,1-9.48-7.36l51.11-65.71-72.6-29a6,6,0,1,1,4.46-11.14L122,119.14V40a6,6,0,0,1,12,0v79.14l71.77-28.71a6,6,0,1,1,4.46,11.14Z"></path></svg>
                          </label>
                          <input class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0]
                  px-5 py-3.5 placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300" type="text" name="postal_code" value="{{ old('postal_code') }}" placeholder="کد پستی محل تحویل">
                          @error('postal_code')
                          <span class="text-red-500 text-xs">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="mt-5">
                      <div class="flex flex-col gap-y-1">
                          <label class="text-zinc-700 flex">
                              توضیحات اضافه
                          </label>
                          <textarea placeholder="نکات مهم درباره تحویل محصول" name="description" cols="30" rows="7" class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0]
                   px-5 py-3.5 placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300">{{ old('description') }}</textarea>
                          @error('description')
                          <span class="text-red-500 text-xs">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>

                  <input type="hidden"  name="user_id" value="{{ auth()->user()->id }}">
                  <button type="submit" href="#" class="block bg-primary-500 hover:bg-primary-400 text-white text-center w-8/12 mx-auto mt-10 px-5 py-3 rounded-xl shadow-lg transition-all font-yekanBakhBold">
                      ثبت آدرس
                  </button>

                  @error('user_id')
                  <span class="text-red-500 text-xs">{{ $message }}</span>
                  @enderror
              </form>

          @endif

{{--        <div class="mb-5 mt-10">--}}
{{--          <div class="flex gap-x-1 items-center text-zinc-700 border-b pb-2 mb-4">--}}
{{--            نوع ارسال--}}
{{--          </div>--}}
{{--          <ul class="flex flex-col md:flex-row w-full gap-5">--}}
{{--            <li class="w-full">--}}
{{--              <input type="radio" id="4" name="send" value="4" class="hidden peer" requiblue="" checked>--}}
{{--              <label for="4" class="flex items-center justify-center gap-x-2 w-full p-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-primary-400 peer-checked:text-primary-400 peer-checked:shadow-md hover:bg-gray-100">--}}
{{--                <div class="text-center">--}}
{{--                  <span class="text-sm">پست معمولی :</span>--}}
{{--                  <span class="text-sm">19,000 تومان</span>--}}
{{--                </div>--}}
{{--              </label>--}}
{{--            </li>--}}
{{--            <li class="w-full">--}}
{{--              <input type="radio" id="5" name="send" value="5" class="hidden peer" requiblue="">--}}
{{--              <label for="5" class="flex items-center justify-center gap-x-2 w-full p-3 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-primary-400 peer-checked:text-primary-400 peer-checked:shadow-md hover:bg-gray-100">--}}
{{--                <div class="text-center">--}}
{{--                  <span class="text-sm">پست پیشتاز :</span>--}}
{{--                  <span class="text-sm">32,000 تومان</span>--}}
{{--                </div>--}}
{{--              </label>--}}
{{--            </li>--}}
{{--          </ul>--}}
{{--        </div>--}}
      </div>

      <div class="lg:w-3/12 lg:pt-5 my-10 lg:my-0">
          <form action="{{ route('pay.start') }}" method="post">
              @csrf
              <input type="hidden" value="{{ $order->id }}" name="order_id">
              @if(auth()->user()->address)
                  <input type="hidden" value="{{ auth()->user()->address->id }}" name="address">
              @endif

              <div class="flex justify-between items-center text-primary-500">
                  <div>جمع مبلغ نهایی</div>
                  <div class="flex">
                      <div class="text-2xl md:text-4xl font-yekanBakhBold">{{ number_format($order->total_price) }}</div>
                      <div class="-rotate-90 text-xs">تومان</div>
                  </div>
              </div>

              <div class="flex justify-between items-center text-zinc-600 mt-5">
                  <div class="text-sm">جمع مبلغ کل</div>
                  <div class="flex">
                      <div class="md:text-xl">{{ number_format($order->total_price) }}</div>
                      <div class="-rotate-90 text-[0.6rem]">تومان</div>
                  </div>
              </div>

              <div class="flex justify-between items-center text-zinc-600 mt-5">
                  <div class="text-sm">هزینه ارسال</div>
                  <div class="flex">
                      <div class="md:text-xl">پرداخت در محل</div>
{{--                      <div class="-rotate-90 text-[0.6rem]">تومان</div>--}}
                  </div>
              </div>

              <button type="submit" class="block bg-primary-500 hover:bg-primary-400 text-white text-center mt-10 px-5 md:px-2.5 py-3 md:py-4 rounded-xl shadow-lg transition-all font-yekanBakhBold md:text-lg">
                  ثبت و پرداخت
              </button>
          </form>


    </div>
  </main>

    @include('footer')
</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script>
    $('#province').on('change', function() {
        let provinceId = $(this).val();
        let citySelect = $('#city');
        citySelect.empty(); // پاک کردن لیست قبلی

        if(provinceId) {
            $.ajax({
                url: '/cities/' + provinceId, // مسیر کنترلری که شهرها رو میده
                type: 'GET',
                success: function(data) {
                    citySelect.append('<option value="">انتخاب شهر</option>');
                    $.each(data, function(key, city) {
                        citySelect.append('<option value="'+ city.id +'">'+ city.title +'</option>');
                    });
                }
            });
        } else {
            citySelect.append('<option value="">لطفا ابتدا استان را انتخاب کنید</option>');
        }
    });
</script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/sliders.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</html>
