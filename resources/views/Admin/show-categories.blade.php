<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت مدرن</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-purple-100 min-h-screen">
<div class="flex h-screen">
    @include('Admin.Particels.nav')

    <main class="flex-1 p-8 overflow-y-auto">
        <h2 class="text-3xl font-bold mb-6 text-indigo-800">دسته بندی ها</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-right font-semibold">نام دسته بندی</th>
                    <th class="py-3 px-4 text-right font-semibold">تعداد محصولات موجود</th>
                    <th class="py-3 px-4 text-right font-semibold">عملیات</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($categories as $item)
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4 text-right">
                            <div class="flex items-center">
                                {{-- فاصله برای زیرمجموعه‌ها --}}
                                @if($level > 0)
                                    <span class="text-gray-400 ml-2">{{ str_repeat('— ', $level) }}</span>
                                @endif

                                <i class="{{ $item->icon ?? 'fas fa-folder' }} text-indigo-500 ml-3 text-lg w-6 text-center"></i>

                                <div>
                                    <span class="font-medium text-gray-800">{{ $item->title }}</span>
                                    <span class="text-gray-500 text-sm block ltr">({{ $item->name }})</span>
                                </div>
                            </div>
                        </td>

                        <td class="py-3 px-4 text-right text-gray-600">
                            {{ $item->products_count ?? 0 }} محصول
                        </td>

                        <td class="py-3 px-4 text-right">
                            <div class="flex items-center space-x-reverse space-x-2">
                                <a href="{{ route('admin.category.edit', $item->id) }}"
                                   class="flex items-center justify-center w-9 h-9 bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition-all duration-200"
                                   title="ویرایش">
                                    <i class="fas fa-pencil-alt text-sm"></i>
                                </a>

                                <form action="{{ route('admin.category.destroy', $item->id) }}" method="POST"
                                      onsubmit="return confirm('آیا از حذف این دسته مطمئن هستید؟');">
                                    @csrf
                                    <button type="submit"
                                            class="flex items-center justify-center w-9 h-9 bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition-all duration-200"
                                            title="حذف">
                                        <i class="fas fa-trash-alt text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                  
                    @if($item->children->count())
                        @include('Admin.category-row', [
                            'items' => $item->children,
                            'level' => $level + 1
                        ])
                    @endif
                @endforeach


                @if($categories->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center py-6 text-gray-500">
                            <i class="fas fa-box-open text-2xl mb-2"></i>
                            <p>هیچ دسته‌بندی برای نمایش وجود ندارد.</p>
                        </td>
                    </tr>
                @endif

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
