<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت مدرن</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>--}}
{{--    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}
    <style>
        body {
            font-family: Vazirmatn, sans-serif;
        }
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
        .table-row {
            transition: all 0.3s ease;
        }
        .table-row:hover {
            background-color: #f8fafc;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .action-btn {
            transition: all 0.3s ease;
        }
        .action-btn:hover {
            transform: scale(1.1);
        }
        .quantity-input {
            width: 80px;
            text-align: center;
        }
        .discount-input {
            width: 120px;
        }
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-available {
            background-color: #dcfce7;
            color: #166534;
        }
        .status-out-of-stock {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .filter-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 24px;
            color: white;
        }
        .table-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .table-header {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            font-weight: 600;
            color: #374151;
        }
        .sidebar {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            width: 280px;
            min-height: 100vh;
            padding: 24px;
            color: white;
        }
        .sidebar-item {
            padding: 12px 16px;
            margin: 8px 0;
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(4px);
        }
        .sidebar-item.active {
            background: rgba(139, 92, 246, 0.3);
            border-right: 4px solid #8b5cf6;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-purple-100 min-h-screen">
<div class="flex h-screen">
    <!-- Sidebar -->
   @include('Admin.Particels.nav')

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">مدیریت محصولات</h1>
            <p class="text-gray-600">مدیریت و ویرایش محصولات فروشگاه</p>
        </div>

        <!-- Filter Section -->
{{--        <div class="filter-section fade-in">--}}
{{--            <div class="flex flex-col md:flex-row gap-4 items-center">--}}
{{--                <div class="flex-1">--}}
{{--                    <label class="block text-sm font-medium mb-2">--}}
{{--                        <i class="fas fa-filter ml-2"></i>--}}
{{--                        فیلتر بر اساس دسته‌بندی--}}
{{--                    </label>--}}
{{--                    <select id="categoryFilter" class="w-full px-4 py-2 rounded-lg border-0 text-gray-800 focus:ring-2 focus:ring-white" onchange="filterProducts()">--}}
{{--                        <option value="">همه دسته‌بندی‌ها</option>--}}
{{--                        <option value="electronics">الکترونیک</option>--}}
{{--                        <option value="clothing">پوشاک</option>--}}
{{--                        <option value="home">خانه و آشپزخانه</option>--}}
{{--                        <option value="books">کتاب</option>--}}
{{--                        <option value="sports">ورزش</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="flex gap-2 mt-6 md:mt-0">--}}
{{--                    <a  href="{{ route('admin.product.create') }}" class="px-6 py-2 bg-white text-purple-600 rounded-lg hover:bg-gray-100 transition-colors duration-300">--}}
{{--                        <i class="fas fa-plus ml-2"></i>--}}
{{--                        افزودن محصول--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Products Table -->
        <div class="table-container fade-in">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="table-header">
                    <tr>
                        <th class="px-6 py-4 text-right">تصویر</th>
                        <th class="px-6 py-4 text-right">نام محصول</th>
                        <th class="px-6 py-4 text-right">دسته‌بندی</th>
                        <th class="px-6 py-4 text-right">برند</th>
                        <th class="px-6 py-4 text-right">موجودی کل</th> {{-- تغییر کرد --}}
                        <th class="px-6 py-4 text-right">عملیات</th>
                    </tr>
                    </thead>
                    <tbody id="productsTableBody">
                    @foreach($products as $product)
                        @php
                            // اصلاح مشکل Explode: چون Cast آرایه است، مستقیم از اولین ایندکس استفاده می‌کنیم
                            $images = $product->images;
                            $mainImage = (is_array($images) && count($images) > 0) ? $images[0] : 'defaults/no-image.png';

                            // محاسبه مجموع موجودی تمام واریانت‌ها برای نمایش در جدول
                            $totalStock = $product->variants->sum('stock');
                        @endphp
                        <tr class="table-row border-b border-gray-100" data-category="{{ $product->category->name ?? 'نامشخص' }}">
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $mainImage) }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-lg object-cover">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-800">{{ $product->name }}</div>
                                <div class="text-xs text-gray-400">شناسه: {{ $product->id }}</div>
                            </td>
                            <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                            {{ $product->category->name ?? 'بدون دسته' }}
                        </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->brand->name ?? 'بدون برند' }}
                            </td>

                            {{-- نمایش موجودی کل --}}
                            <td class="px-6 py-4 font-bold {{ $totalStock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $totalStock }} عدد
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex gap-2">


                                    <a title="ویرایش محصول" href="{{ route('admin.product.edit', $product->id) }}" class="action-btn px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
{{--                                        <i class="fas fa-edit"></i>--}}
                                        ویرایش
                                    </a>

                                    {{-- دکمه حذف با فرم (امن‌تر از تگ a) --}}
                                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('آیا از حذف این محصول اطمینان دارید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
{{--                                            <i class="fas fa-trash"></i>--}}
                                            حذف
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6">
            {{ $products->links() }}
        </div>
    </main>
</div>

<script>
    // فیلتر محصولات بر اساس دسته‌بندی
    function filterProducts() {
        const selectedCategory = document.getElementById('categoryFilter').value;
        const rows = document.querySelectorAll('#productsTableBody tr');

        rows.forEach(row => {
            const category = row.getAttribute('data-category');
            if (selectedCategory === '' || category === selectedCategory) {
                row.style.display = '';
                row.classList.add('fade-in');
            } else {
                row.style.display = 'none';
            }
        });
    }

    // جستجو در محصولات
    function searchProducts() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#productsTableBody tr');

        rows.forEach(row => {
            const productName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (productName.includes(searchTerm)) {
                row.style.display = '';
                row.classList.add('fade-in');
            } else {
                row.style.display = 'none';
            }
        });
    }

    // به‌روزرسانی موجودی محصول
    function updateQuantity(productId) {
        const row = document.querySelector(`#productsTableBody tr:nth-child(${productId})`);
        const quantityInput = row.querySelector('.quantity-input');
        const newQuantity = parseInt(quantityInput.value);

        // به‌روزرسانی موجودی در ستون موجودی
        const stockCell = row.querySelector('td:nth-child(6) span');
        stockCell.textContent = newQuantity;

        // به‌روزرسانی وضعیت
        const statusCell = row.querySelector('td:nth-child(7) span');
        if (newQuantity > 0) {
            statusCell.textContent = 'موجود';
            statusCell.className = 'status-badge status-available';
            stockCell.className = 'font-semibold text-gray-800';
        } else {
            statusCell.textContent = 'ناموجود';
            statusCell.className = 'status-badge status-out-of-stock';
            stockCell.className = 'font-semibold text-red-600';
        }

        // نمایش پیام موفقیت
        showNotification('موجودی محصول با موفقیت به‌روزرسانی شد', 'success');
    }

    // اعمال قیمت تخفیف
    function applyDiscount(productId) {
        const row = document.querySelector(`#productsTableBody tr:nth-child(${productId})`);
        const discountInput = row.querySelector('.discount-input');
        const discountPrice = parseInt(discountInput.value);

        if (discountPrice && discountPrice > 0) {
            const priceCell = row.querySelector('td:nth-child(5)');
            const currentPriceElement = priceCell.querySelector('.font-semibold');
            const currentPrice = currentPriceElement.textContent;

            // اضافه کردن قیمت اصلی با خط خورده
            let originalPriceElement = priceCell.querySelector('.line-through');
            if (!originalPriceElement) {
                originalPriceElement = document.createElement('div');
                originalPriceElement.className = 'text-sm text-red-500 line-through';
                originalPriceElement.textContent = currentPrice;
                priceCell.appendChild(originalPriceElement);
            }

            // به‌روزرسانی قیمت جدید
            currentPriceElement.textContent = discountPrice.toLocaleString() + ' تومان';

            // نمایش پیام موفقیت
            showNotification('قیمت تخفیف با موفقیت اعمال شد', 'success');
        } else {
            showNotification('لطفا قیمت تخفیف معتبر وارد کنید', 'error');
        }
    }

    // ویرایش محصول
    function editProduct(productId) {
        showNotification(`ویرایش محصول ${productId}`, 'info');
        // اینجا می‌توانید کد مربوط به باز کردن فرم ویرایش را اضافه کنید
    }

    // حذف محصول
    function deleteProduct(productId) {
        if (confirm('آیا از حذف این محصول اطمینان دارید؟')) {
            const row = document.querySelector(`#productsTableBody tr:nth-child(${productId})`);
            row.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => {
                row.remove();
                showNotification('محصول با موفقیت حذف شد', 'success');
            }, 300);
        }
    }

    // نمایش اعلان
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 left-4 px-6 py-3 rounded-lg text-white z-50 transition-all duration-300 ${
            type === 'success' ? 'bg-green-500' :
                type === 'error' ? 'bg-red-500' : 'bg-blue-500'
        }`;
        notification.textContent = message;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // انیمیشن fadeOut
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(-20px); }
        }
    `;
    document.head.appendChild(style);

    // اضافه کردن انیمیشن به صفحه
    document.addEventListener('DOMContentLoaded', function() {
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach((element, index) => {
            element.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>
</body>
</html>
