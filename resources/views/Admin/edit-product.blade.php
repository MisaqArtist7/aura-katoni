<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش محصول: {{ $product->name }}</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/ajax.js') }}"></script>
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 rounded-full mb-4">
                    <i class="fas fa-edit text-amber-600 text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-800">ویرایش محصول و تنوع‌ها</h2>
                <p class="text-gray-500 mt-2">ID محصول: {{ $product->id }}</p>
            </div>

            @if($errors->any())
                <div class="bg-red-100 p-4 mb-4 rounded-xl border border-red-200">
                    <ul class="list-inside text-red-600 text-sm">
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
                    <button @click="show=false" class="text-green-700 hover:text-green-900">✕</button>
                </div>
            @endif

            @if(session('error'))
                <div x-data="{show:true}" x-show="show"
                     class="mb-4 flex justify-between items-center rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3">
                    <div>
                        <strong class="font-bold">خطا!</strong>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button @click="show=false" class="text-red-700 hover:text-red-900">✕</button>
                </div>
            @endif

            <form id="product-form" action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <input type="hidden" name="images" id="uploaded_images" value="">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="fas fa-shopping-bag text-indigo-500 ml-2"></i>نام محصول
                        </label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full px-4 py-3 border-2 rounded-xl border-gray-100 input-focus">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="fas fa-search text-indigo-500 ml-2"></i>عنوان سئو (Title Tag)
                        </label>
                        <input type="text" name="title" value="{{ old('title', $product->title) }}" class="w-full px-4 py-3 border-2 rounded-xl border-gray-100 input-focus">
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
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="fas fa-award text-indigo-500 ml-2"></i>برند
                        </label>
                        <select name="brand_id" class="w-full px-4 py-3 border-2 rounded-xl border-gray-100">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="flex items-center mb-2 font-semibold text-gray-700">
                        <i class="fas fa-camera-retro text-indigo-500 ml-2"></i>گالری تصاویر محصول
                    </label>

                    <div class="flex flex-wrap gap-4 mb-4">
                        @foreach($product->images as $img)
                            <div class="relative group">
                                <img src="{{ asset('storage/'.$img) }}" class="w-24 h-24 object-cover rounded-xl border">
                                <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity rounded-xl flex items-center justify-center">
                                    <span class="text-white text-[10px]">تصویر فعلی</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <input type="file" id="image-input" name="images[]" multiple accept="image/*" class="w-full px-4 py-3 border-2 border-dashed rounded-xl border-gray-200">
                    <p class="text-xs text-gray-400 mt-2">در صورت آپلود فایل‌های جدید، این تصاویر به عنوان تصاویر جدید ثبت خواهند شد.</p>

                    <div id="upload-progress" class="mt-3 hidden">
                        <div class="flex items-center gap-2">
                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                <div id="progress-bar" class="bg-indigo-600 h-2 rounded-full transition-all" style="width: 0%"></div>
                            </div>
                            <span id="progress-text" class="text-sm text-gray-600">0%</span>
                        </div>
                        <p id="upload-status" class="text-xs text-gray-500 mt-1"></p>
                    </div>

                    <div id="image-preview-container" class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-3"></div>

                    @error('images') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="flex items-center mb-2 font-semibold text-gray-700">
                        <i class="fas fa-list-check text-indigo-500 ml-2"></i>ویژگی‌های محصول
                    </label>
                    <div id="features-container" class="space-y-3">
                        @php
                            $featuresData = old('features', $product->features ?? []);
                            if (is_string($featuresData)) {
                                $featuresData = json_decode($featuresData, true) ?? [];
                            }
                        @endphp
                        @foreach($featuresData as $idx => $f)
                            <div class="flex gap-2 items-center animate-fade-in">
                                <input type="text" name="features[{{$idx}}][name]" value="{{ $f['name'] }}" class="flex-1 border rounded-lg p-2 text-sm">
                                <input type="text" name="features[{{$idx}}][value]" value="{{ $f['value'] }}" class="flex-1 border rounded-lg p-2 text-sm">
                                <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600"><i class="fas fa-minus-circle"></i></button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" onclick="addFeatureRow()" class="mt-2 text-sm text-indigo-600 font-medium hover:underline">+ افزودن مشخصات فنی</button>
                </div>

                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">توضیحات تکمیلی</label>
                    <textarea id="content" name="description" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center pt-5">
                    <button type="submit" id="submit-btn" class="px-12 py-4 bg-amber-500 text-white rounded-2xl hover:bg-amber-600 shadow-lg shadow-amber-100 transition-all font-bold text-lg">
                        <i class="fas fa-save ml-2"></i> بروزرسانی اطلاعات محصول
                    </button>
                </div>
            </form>

            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 mt-12">
                <label class="flex items-center mb-6 font-bold text-gray-800 text-lg">
                    <i class="fas fa-tags text-amber-500 ml-2"></i>مدیریت تنوع‌ها (قیمت و موجودی)
                </label>

                <div class="space-y-4" style="padding-bottom: 50px;">
                    <form method="post" action="{{ route('admin.product.create.variant') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="variant-card bg-white p-5 rounded-xl grid grid-cols-1 md:grid-cols-5 gap-4 relative shadow-sm">
                            <div>
                                <label class="text-xs text-gray-500">سایز</label>
                                <input type="text" name="size" class="w-full border rounded-lg p-2 text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">رنگ/کد رنگ</label>
                                <select name="color" class="w-full border rounded-lg p-2 text-sm">
                                    @foreach($colors as $color)
                                        <option value="{{ $color->code }}" style="background: {{$color->code}};" >{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">قیمت (تومان)</label>
                                <input type="number" name="price" class="w-full border rounded-lg p-2 text-sm">
                            </div>
                            <div>
                                <label class="text-xs text-gray-500">قیمت تخفیفی (تومان)</label>
                                <input type="number" name="discount_price" class="w-full border rounded-lg p-2 text-sm">
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="flex-1">
                                    <label class="text-xs text-gray-500">موجودی</label>
                                    <input type="number" name="stock" class="w-full border rounded-lg p-2 text-sm">
                                </div>
                                <button type="submit" class="mt-4 px-4 py-2 rounded-lg bg-green-500 text-white font-medium hover:bg-green-600 transition duration-200 shadow-sm">ثبت</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="variants-container" class="space-y-4">
                    @php $existingVariants = old('variants', $product->variants); @endphp
                    @foreach($existingVariants as $index => $v)
                        <div class="variant-card bg-white p-5 rounded-xl grid grid-cols-1 md:grid-cols-4 gap-4 relative shadow-sm">

                            <form method="POST" action="{{ route('admin.product.update.variant', $v->id) }}" class="contents">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">

                                <div>
                                    <label class="text-xs text-gray-500">سایز</label>
                                    <input type="text" name="size" value="{{ is_array($v) ? $v['size'] : $v->size }}" class="w-full border rounded-lg p-2 text-sm">
                                </div>

                                <div>
                                    <label class="text-xs text-gray-500">رنگ/کد رنگ</label>
                                    <select name="color" class="w-full border rounded-lg p-2 text-sm">
                                        <option selected value="{{$v->color}}">{{$v->colorRelation->name ?? $v->color}}</option>
                                        @foreach($colors as $color)
                                            <option value="{{ $color->code }}" style="background: {{$color->code}};" >{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="text-xs text-gray-500">قیمت (تومان)</label>
                                    <input type="number" name="price" value="{{ is_array($v) ? $v['price'] : $v->price }}" class="w-full border rounded-lg p-2 text-sm">
                                </div>

                                <div>
                                    <label class="text-xs text-gray-500">قیمت تخفیف (تومان)</label>
                                    <input type="number" name="discount_price" value="{{ is_array($v) ? $v['discount_price'] : $v->discount_price }}" class="w-full border rounded-lg p-2 text-sm">
                                </div>

                                <div class="flex items-end gap-2 col-span-1 md:col-span-4">
                                    <div class="flex-1">
                                        <label class="text-xs text-gray-500">موجودی</label>
                                        <input type="number" name="stock" value="{{ is_array($v) ? $v['stock'] : $v->stock }}" class="w-full border rounded-lg p-2 text-sm">
                                    </div>
                                    <button type="submit" class="px-4 py-2 rounded-lg bg-green-500 text-white font-medium hover:bg-green-600 transition shadow-sm">بروزرسانی</button>
                                </div>
                            </form>

                            @if(count($existingVariants) > 1)
                                <form action="{{ route('admin.product.delete.variant', $v->id) }}" method="POST" onsubmit="return confirm('آیا از حذف این محصول اطمینان دارید؟')" class="absolute top-4 right-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 rounded-lg bg-red-500 text-white text-sm hover:bg-red-600 transition shadow-sm">حذف</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof tinymce !== 'undefined') {
            tinymce.init({
                selector: '#content',
                license_key: 'gpl',
                directionality: 'ltr',
                plugins: 'link image lists table code',
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image table | code',
                height: 300,
                branding: false,
                menubar: true,
                skin: 'oxide',
                content_css: 'default'
            });
        } else {
            console.error('TinyMCE بارگذاری نشد!');
        }
    });

    let uploadedImagesPaths = [];
    let isUploading = false;

    // پردازش آپلود تصاویر با Ajax
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
        uploadStatus.textContent = 'در حال آپلود تصاویر جدید...';

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
        } finally {
            isUploading = false;
            document.getElementById('image-input').disabled = false;
            document.getElementById('image-input').value = '';
        }
    });

    function displayUploadedImages(paths) {
        const container = document.getElementById('image-preview-container');
        paths.forEach((path) => {
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
    };

    function enableSubmitButton() {
        const btn = document.getElementById('submit-btn');
        btn.disabled = false;
        btn.classList.remove('opacity-50', 'cursor-not-allowed');
        btn.innerHTML = '<i class="fas fa-save ml-2"></i> بروزرسانی اطلاعات محصول';
    }

    // تزریق فیلدهای مخفی آرایه‌ای قبل از ارسال فرم نهایی محصول
    document.getElementById('product-form').addEventListener('submit', function(e) {
        if (isUploading) {
            e.preventDefault();
            alert('لطفا صبر کنید تا آپلود تصاویر کامل شود.');
            return false;
        }

        document.querySelectorAll('.dynamic-image-field').forEach(el => el.remove());

        uploadedImagesPaths.forEach((path) => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'images[]';
            input.value = path;
            input.classList.add('dynamic-image-field');
            this.appendChild(input);
        });
    });

    // مدیریت داینامیک ویژگی‌ها
    let fIndex = {{ count($featuresData) }};
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
</script>
</body>
</html>