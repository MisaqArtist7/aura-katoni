<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت محصول جدید</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/ajax.js') }}"></script>
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet">-->
    <!--<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>-->
    <script src="{{ asset('tiny/tinymce.min.js') }}"></script>

    <style>
        body { font-family: Vazirmatn, sans-serif; }
        .glass-effect { backdrop-filter: blur(10px); background: rgba(255,255,255,0.9); }
        .input-focus:focus { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(139,92,246,0.15); transition: all 0.3s; }
        .variant-card { transition: all 0.3s ease; border: 2px solid #f3f4f6; }
        .variant-card:hover { border-color: #a5b4fc; }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-purple-50 min-h-screen">
<div class="flex">
    @include('Admin.Particels.nav')
    <main class="flex-1 p-8">
        <section class="max-w-5xl mx-auto glass-effect p-8 rounded-3xl shadow-xl">
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-100 rounded-full mb-4">
                    <i class="fas fa-cart-plus text-indigo-600 text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-800">ثبت محصول و واریانت‌ها</h2>
            </div>
            @if($errors->any())
                <div class="bg-red-100 p-4 mb-4 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-600 text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div x-data="{show:true}" x-show="show"
                     class="mb-4 flex justify-between items-center rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3">

                    <div>
                        <strong class="font-bold">موفق!</strong>
                        <span>{{ session('success') }}</span>
                    </div>

                    <button @click="show=false" class="text-green-700 hover:text-green-900">
                        ✕
                    </button>
                </div>
            @endif


            @if(session('error'))
                <div x-data="{show:true}" x-show="show"
                     class="mb-4 flex justify-between items-center rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3">

                    <div>
                        <strong class="font-bold">خطا!</strong>
                        <span>{{ session('error') }}</span>
                    </div>

                    <button @click="show=false" class="text-red-700 hover:text-red-900">
                        ✕
                    </button>
                </div>
            @endif
            <form id="product-form" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- اضافه کردن فیلد مخفی برای نگهداری نام عکس‌های آپلود شده -->
                <input type="hidden" name="images" id="uploaded_images" value="">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="fas fa-shopping-bag text-indigo-500 ml-2"></i>نام محصول
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 border-2 rounded-xl border-gray-100 input-focus">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="fas fa-search text-indigo-500 ml-2"></i>عنوان سئو (Title Tag)
                        </label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-3 border-2 rounded-xl border-gray-100 input-focus">
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="fas fa-list-ul text-indigo-500 ml-2"></i>دسته‌بندی
                        </label>
                        <select name="category_id" class="w-full px-4 py-3 border-2 rounded-xl border-gray-100">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="fas fa-award text-indigo-500 ml-2"></i>برند
                        </label>
                        <select name="brand_id" class="w-full px-4 py-3 border-2 rounded-xl border-gray-100">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- بخش آپلود تصاویر با Ajax -->
                <div>
                    <label class="flex items-center mb-2 font-semibold text-gray-700">
                        <i class="fas fa-camera-retro text-indigo-500 ml-2"></i>گالری تصاویر
                    </label>

                    <!-- input انتخاب فایل -->
                    <input type="file" id="image-input" name="images[]" multiple accept="image/*" class="w-full px-4 py-3 border-2 border-dashed rounded-xl border-gray-200">

                    <!-- نمایش پیشرفت آپلود -->
                    <div id="upload-progress" class="mt-3 hidden">
                        <div class="flex items-center gap-2">
                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                <div id="progress-bar" class="bg-indigo-600 h-2 rounded-full transition-all" style="width: 0%"></div>
                            </div>
                            <span id="progress-text" class="text-sm text-gray-600">0%</span>
                        </div>
                        <p id="upload-status" class="text-xs text-gray-500 mt-1"></p>
                    </div>

                    <!-- نمایش تصاویر آپلود شده -->
                    <div id="image-preview-container" class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-3"></div>

                    @error('images') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- بخش تنوع و سایر فیلدها (همان‌هایی که قبلاً داشتی) -->
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                    <label class="flex items-center mb-6 font-bold text-gray-800 text-lg">
                        <i class="fas fa-tags text-amber-500 ml-2"></i>مدیریت تنوع قیمت و موجودی
                    </label>
                    <div id="variants-container" class="space-y-4">
                        @if(old('variants'))
                            @foreach(old('variants') as $index => $v)
                                <div class="variant-card bg-white p-5 rounded-xl grid grid-cols-1 md:grid-cols-4 gap-4 relative shadow-sm">
                                    <div><label class="text-xs text-gray-500">سایز</label><input type="text" name="variants[{{$index}}][size]" value="{{ $v['size'] }}" class="w-full border rounded-lg p-2 text-sm"></div>
                                    <div><label class="text-xs text-gray-500">رنگ</label><input type="text" name="variants[{{$index}}][color]" value="{{ $v['color'] }}" class="w-full border rounded-lg p-2 text-sm"></div>
                                    <div><label class="text-xs text-gray-500">قیمت (تومان)</label><input type="number" name="variants[{{$index}}][price]" value="{{ $v['price'] }}" class="w-full border rounded-lg p-2 text-sm"></div>
                                    <div class="flex items-center gap-2">
                                        <div class="flex-1"><label class="text-xs text-gray-500">موجودی</label><input type="number" name="variants[{{$index}}][stock]" value="{{ $v['stock'] }}" class="w-full border rounded-lg p-2 text-sm"></div>
                                        <button type="button" onclick="this.closest('.variant-card').remove()" class="mt-4 text-red-400 hover:text-red-600"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" onclick="addVariantRow()" class="mt-4 px-4 py-2 bg-white text-indigo-600 rounded-lg border border-indigo-200 hover:bg-indigo-50 transition-all">+ افزودن تنوع جدید</button>
                </div>

                <div>
                    <label class="flex items-center mb-2 font-semibold text-gray-700">ویژگی‌های محصول</label>
                    <div id="features-container" class="space-y-3"></div>
                    <button type="button" onclick="addFeatureRow()" class="mt-2 text-sm text-indigo-600 font-medium hover:underline">+ افزودن مشخصات فنی</button>
                </div>

                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">توضیحات</label>
                    <textarea id="content" name="description" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200">{{ old('body') }}</textarea>
                    @error('description')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>


                <div class="text-center pt-5">
                    <button type="submit" id="submit-btn" class="px-12 py-4 bg-indigo-600 text-white rounded-2xl shadow-lg transition-all font-bold text-lg opacity-50 cursor-not-allowed" disabled>
                        <i class="fas fa-cloud-upload-alt ml-2"></i> در انتظار آپلود عکس ها...
                    </button>
                </div>
            </form>

            <script>
                let uploadedImagesPaths = [];
                let isUploading = false;

                // تابع آپلود تصاویر
                document.getElementById('image-input').addEventListener('change', async function(e) {
                    const files = Array.from(e.target.files);
                    if (files.length === 0) return;

                    const formData = new FormData();
                    files.forEach(file => {
                        formData.append('images[]', file);
                    });

                    const progressDiv = document.getElementById('upload-progress');
                    const progressBar = document.getElementById('progress-bar');
                    const progressText = document.getElementById('progress-text');
                    const uploadStatus = document.getElementById('upload-status');

                    progressDiv.classList.remove('hidden');
                    progressBar.style.width = '0%';
                    progressText.textContent = '0%';
                    uploadStatus.textContent = 'در حال آپلود تصاویر...';

                    document.getElementById('image-input').disabled = true;
                    isUploading = true;

                    try {
                        const response = await fetch('{{ route("admin.product.uploadImages") }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                            credentials: 'same-origin',
                            body: formData
                        });

                        const result = await response.json();

                        if (result.success) {
                            uploadedImagesPaths = [...uploadedImagesPaths, ...result.paths];
                            displayUploadedImages(result.paths);

                            uploadStatus.textContent = '✅ آپلود با موفقیت انجام شد!';
                            progressBar.style.width = '100%';
                            progressText.textContent = '100%';
                            enableSubmitButton();

                            setTimeout(() => {
                                progressDiv.classList.add('hidden');
                            }, 2000);
                        } else {
                            throw new Error(result.message);
                        }
                    } catch (error) {
                        console.error('خطا:', error);
                        uploadStatus.textContent = '❌ خطا در آپلود: ' + error.message;
                        disableSubmitButton('خطا در آپلود، دوباره تلاش کنید');
                    } finally {
                        isUploading = false;
                        document.getElementById('image-input').disabled = false;
                        document.getElementById('image-input').value = '';
                    }
                });

                function displayUploadedImages(paths) {
                    const container = document.getElementById('image-preview-container');
                    paths.forEach((path, index) => {
                        const imageUrl = `/storage/${path}`;
                        const imageCard = document.createElement('div');
                        imageCard.className = 'relative group';
                        imageCard.innerHTML = `
                <img src="${imageUrl}" class="w-full h-24 object-cover rounded-lg border">
                <button type="button" onclick="removeImage('${path}', this)" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 text-xs opacity-0 group-hover:opacity-100">
                    ✕
                </button>
            `;
                        container.appendChild(imageCard);
                    });
                }

                window.removeImage = function(imagePath, buttonElement) {
                    const index = uploadedImagesPaths.indexOf(imagePath);
                    if (index > -1) {
                        uploadedImagesPaths.splice(index, 1);
                    }
                    buttonElement.closest('.relative').remove();

                    if (uploadedImagesPaths.length === 0) {
                        disableSubmitButton('لطفا حداقل یک تصویر آپلود کنید');
                    }
                };

                function enableSubmitButton() {
                    const btn = document.getElementById('submit-btn');
                    btn.disabled = false;
                    btn.classList.remove('opacity-50', 'cursor-not-allowed');
                    btn.innerHTML = '<i class="fas fa-check-circle ml-2"></i> ثبت و نهایی‌سازی محصول';
                }

                function disableSubmitButton(message) {
                    const btn = document.getElementById('submit-btn');
                    btn.disabled = true;
                    btn.classList.add('opacity-50', 'cursor-not-allowed');
                    btn.innerHTML = `<i class="fas fa-cloud-upload-alt ml-2"></i> ${message}`;
                }

                // ✅ مهم: قبل از ارسال فرم، فیلدهای مخفی درست کن
                document.getElementById('product-form').addEventListener('submit', function(e) {
                    if (uploadedImagesPaths.length === 0) {
                        e.preventDefault();
                        alert('لطفا حداقل یک تصویر را آپلود کنید.');
                        return false;
                    }

                    if (isUploading) {
                        e.preventDefault();
                        alert('لطفا صبر کنید تا آپلود تصاویر کامل شود.');
                        return false;
                    }

                    // حذف فیلدهای قبلی
                    document.querySelectorAll('.dynamic-image-field').forEach(el => el.remove());

                    // ✅ ساخت فیلدهای مخفی با نام images[] (آرایه)
                    uploadedImagesPaths.forEach((path, index) => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'images[]';  // ✅ به صورت آرایه ارسال میشه
                        input.value = path;
                        input.classList.add('dynamic-image-field');
                        this.appendChild(input);
                    });

                    // برای دیباگ
                    console.log('Submitting images:', uploadedImagesPaths);
                });

                // بقیه توابع کمکی (addVariantRow, addFeatureRow) به همان صورت قبلی
                let variantIndex = {{ count(old('variants', [])) }};
                function addVariantRow() {
                    const container = document.getElementById('variants-container');
                    const newDiv = document.createElement('div');
                    newDiv.className = 'variant-card bg-white p-5 rounded-xl grid grid-cols-1 md:grid-cols-4 gap-4 relative shadow-sm';
                    newDiv.innerHTML = `
            <div><label class="text-xs text-gray-500">سایز</label><input type="text" name="variants[${variantIndex}][size]" class="w-full border rounded-lg p-2 text-sm"></div>
            <div><label class="text-xs text-gray-500">رنگ</label><input type="text" name="variants[${variantIndex}][color]" class="w-full border rounded-lg p-2 text-sm"></div>
            <div><label class="text-xs text-gray-500">قیمت (تومان)</label><input type="number" name="variants[${variantIndex}][price]" class="w-full border rounded-lg p-2 text-sm"></div>
            <div class="flex items-center gap-2">
                <div class="flex-1"><label class="text-xs text-gray-500">موجودی</label><input type="number" name="variants[${variantIndex}][stock]" class="w-full border rounded-lg p-2 text-sm"></div>
                <button type="button" onclick="this.closest('.variant-card').remove()" class="mt-4 text-red-400 hover:text-red-600"><i class="fas fa-trash-alt"></i></button>
            </div>
        `;
                    container.appendChild(newDiv);
                    variantIndex++;
                }

                let featureIndex = {{ count(old('features', [])) }};
                function addFeatureRow() {
                    const container = document.getElementById('features-container');
                    const newDiv = document.createElement('div');
                    newDiv.className = 'flex gap-2';
                    newDiv.innerHTML = `
            <input type="text" name="features[${featureIndex}][name]" placeholder="عنوان ویژگی" class="flex-1 px-3 py-2 border rounded-lg">
            <input type="text" name="features[${featureIndex}][value]" placeholder="مقدار" class="flex-1 px-3 py-2 border rounded-lg">
            <button type="button" onclick="this.parentElement.remove()" class="text-red-500"><i class="fas fa-times"></i></button>
        `;
                    container.appendChild(newDiv);
                    featureIndex++;
                }
            </script>
        </section>
    </main>
</div>
<script>
    // منتظر می‌مانیم تا DOM کامل بارگذاری شود
    document.addEventListener('DOMContentLoaded', function() {
        // بررسی می‌کنیم که tinymce بارگذاری شده باشد
        if (typeof tinymce !== 'undefined') {
            tinymce.init({
                selector: '#content',
                license_key: 'gpl',

                directionality: 'ltr',
                plugins: 'link image lists table code',
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image table | code',
                height: 300,
                // تنظیمات اضافی برای اطمینان از کارکرد
                branding: false,
                menubar: true,
                // اگر با مشکل دکمه‌ها مواجه شدید، این خط را اضافه کنید
                skin: 'oxide',
                content_css: 'default'
            });
        } else {
            console.error('TinyMCE بارگذاری نشد! مسیر فایل را بررسی کنید.');
        }
    });
</script>

<script>
    const colorOptions = `
        @foreach ($colors as $color)
            <option value="{{ $color->code }}" class="color-option" style=" background-color:{{$color->code}};">
                        {{ $color->name }}
            </option>
        @endforeach
    `;
    // CKEditor
   

    // مدیریت واریانت‌ها

        let vIndex = {{ old('variants') ? count(old('variants')) : 0 }};

        function addVariantRow() {
        const container = document.getElementById('variants-container');

        const html = `
            <div class="variant-card bg-white p-5 rounded-xl grid grid-cols-1 md:grid-cols-4 gap-4 shadow-sm border-2 border-gray-50">

                <div>
                    <label class="text-xs text-gray-500">سایز</label>
                    <input type="text" name="variants[${vIndex}][size]" class="w-full border rounded-lg p-2 text-sm" placeholder="مثلا: 40">
                </div>

                <div>
                    <label class="text-xs text-gray-500">رنگ</label>
                    <select name="variants[${vIndex}][color]" class="w-full border rounded-lg p-2 text-sm">
                        <option value="" disabled selected>انتخاب رنگ</option>
                        ${colorOptions}
                    </select>
                </div>

                <div>
                    <label class="text-xs text-gray-500">قیمت (تومان)</label>
                    <input type="number" name="variants[${vIndex}][price]" class="w-full border rounded-lg p-2 text-sm" required>
                </div>

                <div class="flex items-center gap-2">
                    <div class="flex-1">
                        <label class="text-xs text-gray-500">موجودی</label>
                        <input type="number" name="variants[${vIndex}][stock]" class="w-full border rounded-lg p-2 text-sm" required>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove()"
                        class="mt-4 text-red-400 hover:text-red-600">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>

            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
        vIndex++;
    }



    // مدیریت ویژگی‌ها
    let fIndex = 0; // یک متغیر برای ایندکس ویژگی‌ها تعریف کنید
    function addFeatureRow() {
        const container = document.getElementById('features-container');
        const html = `
        <div class="flex gap-2 items-center animate-fade-in">
            <input type="text" name="features[${fIndex}][name]" placeholder="نام" class="flex-1 border rounded-lg p-2 text-sm">
            <input type="text" name="features[${fIndex}][value]" placeholder="مقدار" class="flex-1 border rounded-lg p-2 text-sm">
            <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600"><i class="fas fa-minus-circle"></i></button>
        </div>`;
        container.insertAdjacentHTML('beforeend', html);
        fIndex++;
    }
    // لود کردن اولین ردیف در صورت خالی بودن
    @if(!old('variants')) addVariantRow(); @endif
     ClassicEditor.create(document.querySelector('#editor')).catch(error => console.error(error));
</script>
</body>
</html>
