<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت مدرن</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>--}}
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
    <style>
        body {
            font-family: Vazirmatn, sans-serif;

            @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap');

            * {
                font-family: 'Vazirmatn', sans-serif;
            }

            .fade-in {
                animation: fadeIn 0.6s ease-in-out;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .hover-scale {
                transition: all 0.3s ease;
            }

            .hover-scale:hover {
                transform: scale(1.02);
            }

            .gradient-bg {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }

            .glass-effect {
                backdrop-filter: blur(10px);
                background: rgba(255, 255, 255, 0.9);
            }

            .image-preview {
                position: relative;
                overflow: hidden;
                border-radius: 12px;
                transition: all 0.3s ease;
            }

            .image-preview:hover {
                transform: scale(1.05);
            }

            .remove-image {
                position: absolute;
                top: 8px;
                right: 8px;
                background: rgba(239, 68, 68, 0.9);
                color: white;
                border: none;
                border-radius: 50%;
                width: 24px;
                height: 24px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 12px;
                transition: all 0.3s ease;
            }

            .remove-image:hover {
                background: rgba(239, 68, 68, 1);
                transform: scale(1.1);
            }

            .upload-area {
                border: 2px dashed #d1d5db;
                transition: all 0.3s ease;
            }

            .upload-area:hover {
                border-color: #8b5cf6;
                background-color: #f8fafc;
            }

            .upload-area.dragover {
                border-color: #8b5cf6;
                background-color: #ede9fe;
            }

            .input-focus {
                transition: all 0.3s ease;
            }

            .input-focus:focus {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(139, 92, 246, 0.15);
            }

            .icon-selector {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(60px, 1fr));
                gap: 12px;
                max-height: 300px;
                overflow-y: auto;
                padding: 16px;
                border: 2px solid #e5e7eb;
                border-radius: 12px;
                background: #f9fafb;
            }

            .icon-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 12px;
                border: 2px solid transparent;
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.3s ease;
                background: white;
            }

            .icon-item:hover {
                border-color: #8b5cf6;
                background: #ede9fe;
                transform: scale(1.05);
            }

            .icon-item.selected {
                border-color: #8b5cf6;
                background: #8b5cf6;
                color: white;
            }

            .icon-preview {
                width: 80px;
                height: 80px;
                border: 2px dashed #d1d5db;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #f9fafb;
                transition: all 0.3s ease;
            }

            .icon-preview.has-icon {
                border-color: #8b5cf6;
                background: #ede9fe;
            }

            .category-preview {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 16px;
                padding: 24px;
                color: white;
                text-align: center;
                margin-top: 20px;
            }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-purple-100 min-h-screen">
<div class="flex h-screen">
    <!-- Sidebar -->
    @include('Admin.Particels.nav')
    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <section class="max-w-4xl mx-auto glass-effect p-6 md:p-8 rounded-3xl shadow-2xl fade-in">
            <div class="mb-4">
                <a href="{{ route('admin.categories.index') }}"
                   class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-indigo-700 transition-colors duration-200">
                    <i class="fas fa-arrow-right ml-2"></i>
                    بازگشت به لیست دسته‌بندی‌ها
                </a>
            </div>

            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                    <i class="fas fa-folder-plus text-blue-600 text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">ثبت دسته‌بندی جدید</h2>
                <p class="text-gray-600">اطلاعات دسته‌بندی خود را با دقت وارد کنید</p>
                <div class="max-w-4xl mx-auto mb-6 fade-in">

                    @if(session('success'))
                        <div class="flex items-center p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-md transition-all duration-300">
                            <i class="fas fa-check-circle text-xl ml-3"></i>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="flex items-center p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md transition-all duration-300">
                            <i class="fas fa-exclamation-triangle text-xl ml-3"></i>
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    @endif

                    {{-- نمایش خطاهای اعتبارسنجی (Validation Errors) --}}
                    @if ($errors->any())
                        <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md">
                            <h5 class="font-bold mb-2 flex items-center">
                                <i class="fas fa-times-circle text-lg ml-2"></i>
                                خطاهایی در فرم وجود دارد:
                            </h5>
                            <ul class="list-disc pr-5 space-y-1 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                <!-- عنوان دسته‌بندی -->
                <div class="group">
                    <label class="flex items-center mb-3 font-semibold text-gray-700">
                        <i class="fas fa-heading text-blue-500 ml-2"></i>
                        عنوان دسته‌بندی
                    </label>
                    <input type="text" name="title" id="categoryTitle"
                           class="w-full px-4 py-3 border-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all duration-300"
                           placeholder="عنوان دسته‌بندی را وارد کنید..."
                           value="{{ old('title') }}"
                           onchange="updatePreview()" required>
                    @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- دسته والد -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        دسته والد (در صورت نیاز)
                    </label>
                    <select name="parent_id"
                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 text-sm">
                        <option value="">— دسته اصلی —</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('parent_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>

                            @if($cat->children->count())
                                @foreach($cat->children as $child)
                                    <option value="{{ $child->id }}" {{ old('parent_id') == $child->id ? 'selected' : '' }}>
                                        — {{ $child->name }}
                                    </option>
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>

                <!-- نام دسته‌بندی -->
                <div class="group">
                    <label class="flex items-center mb-3 font-semibold text-gray-700">
                        <i class="fas fa-tag text-blue-500 ml-2"></i>
                        نام دسته‌بندی
                    </label>
                    <input type="text" name="name" id="categoryName"
                           class="w-full px-4 py-3 border-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all duration-300"
                           placeholder="category-name"
                           value="{{ old('name') }}"
                           onchange="updatePreview()" required>
                    <p class="text-sm text-gray-500 mt-1">نام انگلیسی برای URL استفاده می‌شود (مثل: electronics)</p>
                    @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- توضیحات -->
                <div class="group">
                    <label class="flex items-center mb-3 font-semibold text-gray-700">
                        <i class="fas fa-align-left text-blue-500 ml-2"></i>
                        توضیحات دسته‌بندی
                    </label>
                    <textarea name="description" id="categoryDescription"
                              class="w-full px-4 py-3 border-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 min-h-24"
                              placeholder="توضیحات کوتاهی درباره این دسته‌بندی..."
                              onchange="updatePreview()">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- انتخاب آیکن -->
                <div class="group">
                    <label class="flex items-center mb-3 font-semibold text-gray-700">
                        <i class="fas fa-icons text-blue-500 ml-2"></i>
                        آیکن دسته‌بندی
                    </label>

                    <div class="flex items-center gap-4 mb-4">
                        <div class="icon-preview" id="iconPreview">
                            <i class="{{ old('icon', 'fas fa-question') }} text-2xl text-gray-400"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-700">آیکن انتخابی</p>
                            <p class="text-sm text-gray-500">روی آیکن مورد نظر کلیک کنید</p>
                        </div>
                    </div>

                    <input type="hidden" name="icon" id="selectedIcon" value="{{ old('icon') }}">
                    @error('icon')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- تصویر دسته‌بندی -->
                <div class="group">
                    <label class="flex items-center mb-3 font-semibold text-gray-700">
                        <i class="fas fa-image text-blue-500 ml-2"></i>
                        تصویر دسته‌بندی
                    </label>

                    <div class="upload-area border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer"
                         onclick="document.getElementById('imageInput').click()"
                         ondrop="handleDrop(event)"
                         ondragover="handleDragOver(event)"
                         ondragleave="handleDragLeave(event)">
                        <div class="mb-4">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-600 font-medium">تصویر دسته‌بندی را اینجا بکشید یا کلیک کنید</p>
                            <p class="text-sm text-gray-500 mt-1">فرمت‌های مجاز: JPG, PNG, GIF (حداکثر 2MB)</p>
                        </div>
                    </div>

                    <input type="file" id="imageInput" name="image" accept="image/*"
                           class="hidden" onchange="handleFileSelect(event)">
                    @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- پیش‌نمایش تصویر -->
                    <div id="imagePreview" class="mt-6 hidden">
                        <div class="image-preview relative inline-block">
                            <img id="previewImg" src="/placeholder.svg" alt="پیش‌نمایش" class="w-48 h-32 object-cover rounded-lg">
                            <button type="button" class="remove-image" onclick="removeImage()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- پیش‌نمایش دسته‌بندی -->
                <div class="group">
                    <label class="flex items-center mb-3 font-semibold text-gray-700">
                        <i class="fas fa-eye text-blue-500 ml-2"></i>
                        پیش‌نمایش دسته‌بندی
                    </label>

                    <div class="category-preview" id="categoryPreview">
                        <div class="flex items-center justify-center mb-3">
                            <i id="previewIcon" class="{{ old('icon', 'fas fa-question') }} text-3xl"></i>
                        </div>
                        <h3 id="previewTitle" class="text-xl font-bold mb-2">{{ old('title', 'عنوان دسته‌بندی') }}</h3>
                        <p id="previewDescription" class="text-sm opacity-90">{{ old('description', 'توضیحات دسته‌بندی اینجا نمایش داده می‌شود') }}</p>
                    </div>
                </div>

                <!-- دکمه ثبت -->
                <div class="text-center pt-6">
                    <button type="submit"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 hover-scale shadow-lg transition-all duration-300">
                        <i class="fas fa-save ml-2"></i>
                        ذخیره دسته‌بندی
                    </button>
                </div>
            </form>

            <script>
                // اجرای تابع آپدیت پیش‌نمایش در زمان لود صفحه (برای زمانی که مقادیر از طریق old برگشته‌اند)
                document.addEventListener("DOMContentLoaded", function() {
                    if(typeof updatePreview === "function") {
                        updatePreview();
                    }
                });
            </script>        </section>

    </main>
</div>


<script>
    // متغیرهای سراسری
    let selectedFile = null;
    let selectedIconClass = '';

    // مدیریت آپلود تصویر
    function handleFileSelect(event) {
        const file = event.target.files[0];
        if (file) {
            // بررسی سایز فایل (2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('حجم فایل نباید بیشتر از 2 مگابایت باشد');
                return;
            }

            selectedFile = file;
            displayImagePreview(file);
        }
    }

    function handleDrop(event) {
        event.preventDefault();
        event.stopPropagation();

        const uploadArea = event.currentTarget;
        uploadArea.classList.remove('dragover');

        const file = event.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            if (file.size > 2 * 1024 * 1024) {
                alert('حجم فایل نباید بیشتر از 2 مگابایت باشد');
                return;
            }

            selectedFile = file;
            displayImagePreview(file);
        }
    }

    function handleDragOver(event) {
        event.preventDefault();
        event.stopPropagation();
        event.currentTarget.classList.add('dragover');
    }

    function handleDragLeave(event) {
        event.preventDefault();
        event.stopPropagation();
        event.currentTarget.classList.remove('dragover');
    }

    function displayImagePreview(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewContainer = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');

            previewImg.src = e.target.result;
            previewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }

    function removeImage() {
        selectedFile = null;
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('imageInput').value = '';
    }

    // مدیریت انتخاب آیکن
    function selectIcon(iconClass, element) {
        // حذف انتخاب قبلی
        document.querySelectorAll('.icon-item').forEach(item => {
            item.classList.remove('selected');
        });

        // انتخاب آیکن جدید
        element.classList.add('selected');
        selectedIconClass = iconClass;

        // به‌روزرسانی پیش‌نمایش آیکن
        const iconPreview = document.getElementById('iconPreview');
        iconPreview.innerHTML = `<i class="${iconClass} text-2xl text-blue-600"></i>`;
        iconPreview.classList.add('has-icon');

        // ذخیره در input مخفی
        document.getElementById('selectedIcon').value = iconClass;

        // به‌روزرسانی پیش‌نمایش
        updatePreview();
    }

    // به‌روزرسانی پیش‌نمایش دسته‌بندی
    function updatePreview() {
        const title = document.getElementById('categoryTitle').value || 'عنوان دسته‌بندی';
        const description = document.getElementById('categoryDescription').value || 'توضیحات دسته‌بندی اینجا نمایش داده می‌شود';
        const iconClass = selectedIconClass || 'fas fa-question';

        document.getElementById('previewTitle').textContent = title;
        document.getElementById('previewDescription').textContent = description;
        document.getElementById('previewIcon').className = iconClass + ' text-3xl';
    }

    // تولید خودکار نام انگلیسی از عنوان فارسی
    document.getElementById('categoryTitle').addEventListener('input', function() {
        const title = this.value;
        const nameInput = document.getElementById('categoryName');

        // تبدیل ساده عنوان فارسی به نام انگلیسی
        if (title && !nameInput.value) {
            const englishName = title
                .replace(/[^\w\s]/gi, '')
                .replace(/\s+/g, '-')
                .toLowerCase();
            nameInput.value = englishName;
        }

        updatePreview();
    });

    // افزودن انیمیشن به فرم
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('scale-105');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('scale-105');
            });
        });

        // پیش‌نمایش اولیه
        updatePreview();
    });
</script>

</body>
</html>
