<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت مدرن</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
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
        <!-- مدیریت پست‌های وبلاگ -->
        <div class="bg-white p-8 rounded-3xl shadow-lg hover-scale fade-in">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">مدیریت نمونه کار ها</h1>
                <button class="bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                    <a href="{{ route('admin.posts.create')  }}">افزودن پست جدید</a>
                </button>
            </div>
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

            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-gray-800">
                    <thead>
                    <tr class="bg-gray-50">
                        <th class="p-3 text-right">#</th>
                        <th class="p-3 text-right">عکس پست</th>
                        <th class="p-3 text-right">عنوان</th>
                        <th class="p-3 text-right">تعداد بازدید</th>
                        <th class="p-3 text-right">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workSamples as $key => $post)
                        <tr class="hover:bg-gray-50 transition duration-200">
                            <td class="p-3 text-center">{{ $key+1  }}</td>
                            <td class="p-3 text-center">
                                <img src="{{ asset('storage/'.$post->image)  }}" alt="عکس پست" class="w-16 h-16 object-cover rounded-lg mx-auto shadow">
                            </td>
                            <td class="p-3 text-center relative group">
                                <span class="truncate w-40 inline-block"
                                      onmouseover="showTooltip(event, '{{ $post->title }}')"
                                      onmousemove="moveTooltip(event)"
                                      onmouseout="hideTooltip()">
                                    {{ \Illuminate\Support\Str::limit($post->title, 40, '...') }}
                                </span>
                            </td>
                            <div id="tooltip" class="hidden absolute bg-gray-800 text-white text-sm rounded-lg p-2 shadow-lg w-64 max-w-xs break-words whitespace-normal px-3 py-2"></div>
                            <td class="p-3 text-center">0</td>
                            <td class="p-3 text-center">
                                <!-- دکمه ویرایش -->
                                <a
                                    href="{{ route('admin.posts.edit', ['id' => $post->id]) }}"
                                    class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 transition duration-300 mr-2 inline-block"
                                >
                                    ویرایش
                                </a>

                                <form
                                    action="{{ route('admin.posts.destroy', $post->id) }}"
                                    method="post"
                                    class="inline-block"
                                    onsubmit="return confirm('آیا از حذف اطمینان دارید؟');"
                                >
                                    @csrf
                                    <button
                                        type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition duration-300"
                                    >
                                        حذف
                                    </button>
                                </form>
                            </td>

                        </tr>


                    @endforeach

                    </tbody>
                </table>

                {{ $workSamples->links()  }}
            </div>
        </div>


    </main>
</div>

<script>
    const tooltip = document.getElementById("tooltip");

    function showTooltip(event, text) {
        tooltip.textContent = text;
        tooltip.classList.remove("hidden");
    }

    function moveTooltip(event) {
        const mouseX = event.pageX + 15; // فاصله 15px از ماوس
        const mouseY = event.pageY + 15;

        tooltip.style.left = `${mouseX}px`;
        tooltip.style.top = `${mouseY}px`;
    }

    function hideTooltip() {
        tooltip.classList.add("hidden");
    }
</script>
</body>
</html>

