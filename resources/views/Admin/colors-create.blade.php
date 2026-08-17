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
        }

    </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-purple-100 min-h-screen">
<div class="flex h-screen">
    @include('Admin.Particels.nav')

    <main class="flex-1 p-8 overflow-y-auto">
        <section class="max-w mx-auto glass-effect p-6 md:p-3 rounded-3xl shadow-2xl fade-in">

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


            <form action="{{ route('admin.color.store') }}" method="POST" enctype="multipart/form-data"
                  class="space-y-8" x-data="{ colorValue: '#000000' }">
                @csrf

                <!-- فرم دو ستونی -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- نام رنگ -->
                    <div class="group">
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="fas fa-heading text-blue-500 ml-2"></i>
                            نام رنگ
                        </label>
                        <input type="text" name="name"
                               class="w-full px-4 py-3 border-2 rounded-xl border-gray-200 focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                               placeholder="برای مثال: آبی"
                               required>
                        @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- انتخاب رنگ -->
                    <div class="group">
                        <label class="flex items-center mb-2 font-semibold text-gray-700">
                            <i class="fas fa-palette text-blue-500 ml-2"></i>
                            انتخاب رنگ
                        </label>

                        <div class="flex items-center gap-4">
                            <!-- ورودی رنگ -->
                            <input type="color" name="code"
                                   x-model="colorValue"
                                   class="w-16 h-16 rounded-xl border border-gray-300 cursor-pointer shadow-sm"
                                   required>

                            <!-- پیش نمایش بزرگ‌تر -->
                            <div class="w-16 h-16 rounded-xl border shadow-inner"
                                 :style="'background-color: ' + colorValue">
                            </div>
                        </div>

                        @error('code')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- دکمه ثبت -->
                <div class="text-center">
                    <button type="submit"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 shadow-lg transition-all duration-300">
                        <i class="fas fa-save ml-2"></i>
                        ذخیره رنگ
                    </button>
                </div>

            </form>
        </section>


        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-right font-semibold">نام رنگ</th>
                    <th class="py-3 px-4 text-right font-semibold">رنگ</th>
                    <th class="py-3 px-4 text-right font-semibold">عملیات</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($colors as $item)
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4 text-right">
                            <div class="flex items-center">
                                <div>
                                    <span class="font-medium text-gray-800">{{ $item->name }}</span>
                                </div>
                            </div>
                        </td>

                        <td class="py-3 px-4 text-right text-gray-600">
                            <span style="display:inline-block; width:20px; height:20px; border:1px solid #ccc; background-color: {{ $item->code }};"></span>
                        </td>


{{--                        <td class="py-3 px-4 text-right">--}}
{{--                            <div class="flex items-center space-x-reverse space-x-2">--}}
{{--                                <form action="{{ route('admin.brand.destroy', $item->id) }}" method="POST"--}}
{{--                                      onsubmit="return confirm('آیا از حذف این دسته مطمئن هستید؟');">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit"--}}
{{--                                            class="flex items-center justify-center w-9 h-9 bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition-all duration-200"--}}
{{--                                            title="حذف">--}}
{{--                                        <i class="fas fa-trash-alt text-sm"></i>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach



                </tbody>
            </table>
        </div>

        {{--        <div class="mt-6">--}}
        {{--            {{ $categories->links() }}--}}
        {{--        </div>--}}

    </main>
</div>


</body>
</html>
