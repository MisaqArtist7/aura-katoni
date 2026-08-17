<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/fav.png') }}">

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
          آدرس های من
        </div>
        @if(!auth()->user()->address)
            <div class="flex justify-end items-center mb-4">
              <a href="#" data-modal="addAddress" class="open-modal text-xs md:text-sm bg-zinc-400 hover:opacity-90 hover:shadow-lg transition rounded-lg px-4 py-2.5 text-white">
                اضافه کردن آدرس
              </a>
            </div>
        @endif
        <!-- modal add address -->
        <div id="addAddress" class="modal fixed inset-0 bg-black/20 bg-opacity-50 flex items-center justify-center transition-opacity duration-300 z-50 hidden">
          <div class="modal-box bg-white p-2 rounded-xl shadow-lg w-11/12 md:w-6/12
            transition-transform duration-300 opacity-0 scale-90
            max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center p-4 border-b border-zinc-300">
              <h3 class="text-gray-700">اضافه کردن آدرس</h3>
            </div>
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
          </div>
        </div>


{{--          Address Section--}}
          @if(auth()->user()->address)
              <div class="space-y-5">
                  <div class="border border-zinc-300 rounded-md">
                      <div class="border-b border-b-zinc-400 p-3 text-zinc-800 text-sm flex justify-between items-center">
                          {{ auth()->user()->address->provinceRelation->title }} -  {{ auth()->user()->address->cityRelation->title }}
                          <a href="#" data-modal="editAddress1" class="open-modal text-zinc-50 cursor-pointer hover:text-zinc-100 transition bg-sky-500 hover:bg-sky-600 px-3 py-1 text-xs rounded-md">
                              ویرایش آدرس
                          </a>
                      </div>
                      <div class="px-5 py-4 text-zinc-600 space-y-4 text-sm">
                          <div class="flex gap-x-1 items-center">
                              📍 {{ auth()->user()->address->full_address }}
                          </div>
                          <div class="flex gap-x-1 items-center">
                              ✉️ {{ auth()->user()->address->postal_code }}
                          </div>
                          <div class="flex gap-x-1 items-center">
                              ☎️ {{ auth()->user()->address->telephone }}
                          </div>
                          <div class="flex gap-x-1 items-center">
                              👤 {{ auth()->user()->address->name }} {{ auth()->user()->address->family_name }}
                          </div>
                      </div>
                      <form action="{{ route('user.address.destroy', auth()->user()->address->id) }}" method="POST" class="w-fit mb-2 mr-5">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                                  class="text-zinc-50 hover:text-zinc-100 transition bg-red-500 hover:bg-red-600 px-3 py-1 block text-xs rounded-md">
                              حذف آدرس
                          </button>
                      </form>
                  </div>
              </div>
          @else
              <div class="border border-dashed border-zinc-300 rounded-md p-6 text-center text-zinc-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-3" width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                  </svg>
                  <p class="text-sm">شما هنوز هیچ آدرسی ثبت نکرده‌اید.</p>

              </div>
          @endif


          <!-- modal edit address -->
          <div id="editAddress1" class="modal fixed inset-0 bg-black/20 bg-opacity-50 flex items-center justify-center transition-opacity duration-300 z-50 hidden">
            <div class="modal-box bg-white p-2 rounded-xl shadow-lg w-11/12 md:w-6/12
              transition-transform duration-300 opacity-0 scale-90
              max-h-[90vh] overflow-y-auto">
              <div class="flex justify-between items-center p-4 border-b border-zinc-300">
                <h3 class="text-gray-700"> ویرایش آدرس</h3>
              </div>
                @if(auth()->user()->address)
                <form class="space-y-6 px-2 lg:px-8 pb-4 sm:pb-6 pt-4 text-xs md:text-base"
                      method="POST"
                      action="{{ route('user.address.update', auth()->user()->address->id) }}">
                    @csrf
                    @method('PUT')

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
        </div>
    </main>

  </div>
</body>

{{-- JQuery AJAX --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let modal = document.getElementById("addAddress");
            if (modal) {
                modal.classList.remove("hidden");
                let box = modal.querySelector(".modal-box");
                if (box) {
                    box.classList.add("opacity-100", "scale-100");
                    box.classList.remove("opacity-0", "scale-90");
                }
            }
        });
    </script>
@endif


<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/sliders.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</html>
