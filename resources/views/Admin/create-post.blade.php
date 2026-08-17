<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت مدرن</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#content',
            language: 'fa',
            directionality: 'rtl',
            plugins: 'link image lists table code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image table | code',
            height: 300
        });
    </script>
    <style>
        body {
            font-family: Vazirmatn, sans-serif;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-purple-100 min-h-screen">
<div class="flex h-screen">
    <!-- Sidebar -->
    @include('Admin.Particels.nav')
    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <!-- فرم ذخیره پست -->
        <div class="bg-white p-8 rounded-3xl shadow-lg hover-scale fade-in mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">ایجاد پست جدید</h2>
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">عنوان پست</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200">
                    @error('title')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">توضیحات </label>
                    <textarea  name="description" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">محتوای پست</label>
                    <textarea id="content" name="body" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200">{{ old('body') }}</textarea>
                    @error('body')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">تصویر پست</label>
                    <input type="file" id="image" name="image" accept="image/*"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200">
                    @error('image')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">دسته‌بندی</label>
                    <select id="category" name="category"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200">
                        <option disabled>انتخاب کنید</option>
                        <option value="blog" {{ old('category') == 'blog' ? 'selected' : '' }}>وبلاگ</option>
                        <option value="service" {{ old('category') == 'service' ? 'selected' : '' }}>خدمات</option>
                        <option value="worksample" {{ old('category') == 'worksample' ? 'selected' : '' }}>نمونه کار</option>
                    </select>
                    @error('category')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">لینک ویدیو</label>
                    <input type="text" id="tags" name="tags" value="{{ old('tags') }}"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition duration-200">
                    @error('tags')
                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                        ذخیره پست
                    </button>
                </div>
            </form>
        </div>

    </main>
</div>
</body>
</html>
