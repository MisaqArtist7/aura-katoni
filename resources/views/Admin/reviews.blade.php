

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
    <!-- Sidebar -->
    @include('Admin.Particels.nav')
    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <h2 class="text-3xl font-bold mb-6 text-indigo-800">نظرات کاربران</h2>
        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                {{ session('error') }}
            </div>
        @endif


        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-right font-semibold">وضعیت</th>
                    <th class="py-3 px-4 text-right font-semibold">متن پیام</th>
                    <th class="py-3 px-4 text-right font-semibold">پیشنهاد میشود ؟</th>
                    <th class="py-3 px-4 text-right font-semibold">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datas as $data)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-right">
                            @switch($data->approved)
                                @case('0')
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                   در انتظار تایید
                                </span>
                                    @break

                                @case('1')
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
تایید شده
                                    </span>
                                    @break
                            @endswitch
                        </td>

                        <td class="py-3 px-4 text-right">{{ $data->comment }}</td>

                        <td class="py-3 px-4 text-right">
                            @switch($data->rating)
                                @case('yes')
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    بله
                                </span>
                                    @break
                                @case('no')
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                  خیر
                                </span>
                                    @break
                            @endswitch
                        </td>
                        <td class="py-3 px-4 text-right flex">
                            <form method="post" action="{{ route('admin.review.approve', $data->id) }}">
                                @csrf
                                <button type="submit" class="text-indigo-600 hover:text-indigo-800 font-medium">تایید نظر</button>
                            </form>
                                |
                            <form method="post" action="{{ route('admin.review.destroy', $data->id) }}">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-indigo-800 font-medium">حذف نظر</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </main>
</div>



</body>
</html>
