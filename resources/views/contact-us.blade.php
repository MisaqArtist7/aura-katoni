<!DOCTYPE html>
<html lang="fa" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="./assets/css/main.css">

  <title>نلی گالری | خرید آنلاین کیف و کفش زنانه شیک و جدید </title>
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
    <!-- contact us -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-8 mx-4 md:mx-32 mb-8 md:my-12 border border-zinc-200 rounded-2xl p-4 md:p-8">
        <form method="post" action="{{ route('contact.store') }}">
            @csrf
            <div class="space-y-4 md:space-y-6">
                {{-- نام --}}
                <div>
                    <p class="text-xs text-zinc-600 pb-3 pr-2">
                        نام و نام خانوادگی:
                    </p>
                    <input name="name"
                           value="{{ old('name') }}"
                           class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5
                       placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300"
                           type="text" placeholder="نام و نام خانوادگی شما...">

                    @error('name')
                    <p class="text-xs text-red-500 mt-1 pr-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- شماره --}}
                <div>
                    <p class="text-xs text-zinc-600 pb-3 pr-2">
                        شماره تلفن:
                    </p>
                    <input name="number"
                           value="{{ old('number') }}"
                           class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5
                       placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300"
                           type="text" placeholder="شماره تلفن شما...">

                    @error('number')
                    <p class="text-xs text-red-500 mt-1 pr-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- پیام --}}
                <div>
                    <p class="text-xs text-zinc-600 pb-3 pr-2">
                        پیام شما:
                    </p>
                    <textarea name="message"
                              class="rounded-2xl rounded-tr-sm text-sm text-zinc-600 w-full bg-[#f0f0f0] px-5 py-3.5
                       placeholder:text-zinc-400 placeholder:text-xs focus:outline-1 focus:outline-zinc-300 resize-none"
                              placeholder="متن پیام شما..." cols="30" rows="5">{{ old('message') }}</textarea>

                    @error('message')
                    <p class="text-xs text-red-500 mt-1 pr-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="bg-gradient-to-bl from-primary-500 to-primary-400 hover:opacity-90 hover:shadow-lg
                   transition rounded-xl py-2.5 md:py-3 px-10 md:px-14 text-sm text-white">
                    ارسال
                </button>
            </div>
        </form>

        <div>
        <div class="text-zinc-600 text-sm md:text-base text-center border-b-2 border-b-primary-500 pb-1 w-fit mx-auto">
          اطلاعات تماس
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-2 gap-y-6 mt-6 mb-10">
          <p class="flex gap-x-2 text-xs md:text-sm text-zinc-700">
            <svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="fill-zinc-600" fill-rule="evenodd" clip-rule="evenodd" d="M14.95 3.684L8.637 8.912C8.45761 9.06063 8.23196 9.14196 7.999 9.14196C7.76604 9.14196 7.54039 9.06063 7.361 8.912L1.051 3.684C1.01714 3.78591 0.999922 3.89261 1 4V12C1 12.2652 1.10536 12.5196 1.29289 12.7071C1.48043 12.8946 1.73478 13 2 13H14C14.2652 13 14.5196 12.8946 14.7071 12.7071C14.8946 12.5196 15 12.2652 15 12V4C15.0004 3.89267 14.9835 3.78597 14.95 3.684ZM2 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V12C16 12.5304 15.7893 13.0391 15.4142 13.4142C15.0391 13.7893 14.5304 14 14 14H2C1.46957 14 0.960859 13.7893 0.585786 13.4142C0.210714 13.0391 0 12.5304 0 12V4C0 3.46957 0.210714 2.96086 0.585786 2.58579C0.960859 2.21071 1.46957 2 2 2ZM1.79 3L7.366 7.603C7.54459 7.75051 7.76884 7.83144 8.00046 7.83199C8.23209 7.83254 8.45672 7.75266 8.636 7.606L14.268 3H1.79Z" fill="black"/>
            </svg>
            ایمیل: info@neli-gallery.ir
          </p>
          <p class="flex gap-x-2 text-xs md:text-sm text-zinc-700">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="fill-zinc-600" d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM12.5 7H11V13L16.2 16.2L17 14.9L12.5 12.2V7Z" fill="black"/>
            </svg>
            ساعت کاری: 9 تا 20
          </p>
          <p class="flex gap-x-2 text-xs md:text-sm text-zinc-700">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="stroke-zinc-600" d="M15.5 11C15.5 11.4596 15.4095 11.9148 15.2336 12.3394C15.0577 12.764 14.7999 13.1499 14.4749 13.4749C14.1499 13.7999 13.764 14.0577 13.3394 14.2336C12.9148 14.4095 12.4596 14.5 12 14.5C11.5404 14.5 11.0852 14.4095 10.6606 14.2336C10.236 14.0577 9.85013 13.7999 9.52513 13.4749C9.20012 13.1499 8.94231 12.764 8.76642 12.3394C8.59053 11.9148 8.5 11.4596 8.5 11C8.5 10.0717 8.86875 9.1815 9.52513 8.52513C10.1815 7.86875 11.0717 7.5 12 7.5C12.9283 7.5 13.8185 7.86875 14.4749 8.52513C15.1313 9.1815 15.5 10.0717 15.5 11Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path class="stroke-zinc-600" d="M12 2C16.87 2 21 6.033 21 10.926C21 15.896 16.803 19.385 12.927 21.756C12.644 21.9153 12.3247 21.999 12 21.999C11.6753 21.999 11.356 21.9153 11.073 21.756C7.203 19.363 3 15.915 3 10.927C3 6.033 7.13 2 12 2Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
           آدرس : تهران - دماوند - گیلاوند - بلوار بهشتی - مجتمع تجاری یوتا - طبقه همکف -واحد ۲۱
          </p>

        </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d480.5065514213234!2d52.0333709966399!3d35.6856163802367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sfa!2s!4v1772027808889!5m2!1sfa!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>      </div>
    </div>

  </main>

    @include('footer')
</body>

<script src="./assets/js/swiper.min.js"></script>
<script src="./assets/js/sliders.js"></script>
<script src="./assets/js/main.js"></script>

</html>
