<header class="sticky top-0 z-50 w-full bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <!-- Mobile Menu Button & Search (Mobile) -->
            <div class="flex items-center gap-4 lg:hidden">
                <button type="button" id="mobile-menu-btn" aria-label="Open menu" class="text-gray-600 hover:text-brand-600 transition">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <button type="button" aria-label="Search" class="text-gray-600 hover:text-brand-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>

            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="text-2xl font-black tracking-tighter uppercase text-slate-950 flex items-center gap-2">
                    <svg class="w-8 h-8 text-brand-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 22h20L12 2zm0 4.5l6.5 13h-13L12 6.5z"/>
                    </svg>
                    آورا <span class="text-brand-600">کتونی</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8 space-x-reverse">
                <a href="/" class="text-brand-600 font-semibold transition hover:text-brand-700">خانه</a>
                <a href="{{ route('shop') ?? '#' }}" class="text-gray-600 font-medium transition hover:text-brand-600">فروشگاه</a>
                <div class="relative group cursor-pointer">
                    <span class="text-gray-600 font-medium transition hover:text-brand-600 flex items-center gap-1">
                        دسته‌بندی‌ها
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                    <!-- Dropdown Category -->
                    <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-xl shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                        <div class="py-2">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-slate-50 hover:text-brand-600">مردانه</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-slate-50 hover:text-brand-600">زنانه</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-slate-50 hover:text-brand-600">ورزشی</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-slate-50 hover:text-brand-600">روزمره</a>
                        </div>
                    </div>
                </div>
                <a href="#new-arrivals" class="text-gray-600 font-medium transition hover:text-brand-600">جدیدترین‌ها</a>
                <a href="#special-offers" class="text-red-500 font-medium transition hover:text-red-600 flex items-center gap-1">
                    تخفیف ویژه
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </span>
                </a>
            </nav>

            <!-- Desktop Icons & Actions -->
            <div class="flex items-center space-x-6 space-x-reverse">
                <button type="button" aria-label="Search" class="hidden lg:block text-gray-600 hover:text-brand-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                <button type="button" aria-label="Account" class="hidden lg:block text-gray-600 hover:text-brand-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </button>

                <!-- Shopping Cart with Dropdown -->
                <div class="relative" id="cart-dropdown-wrapper">
                    <button type="button" id="cart-toggle-btn" aria-label="Shopping Cart" class="text-gray-600 hover:text-brand-600 transition relative flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>

                        <!-- Dynamic Cart Quantity Badge -->
                        @if($cartTotalQuantity > 0)
                            <span class="absolute -top-2 -right-2 bg-brand-600 text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full shadow-sm">
                                {{ $cartTotalQuantity }}
                            </span>
                        @endif
                    </button>

                    <!-- Cart Items Dropdown -->
                    <div id="cart-dropdown-panel" class="absolute left-0 mt-4 w-80 bg-white border border-gray-100 rounded-2xl shadow-xl opacity-0 invisible translate-y-2 transition-all duration-300 z-50">
                        <div class="p-4 border-b border-gray-50 flex justify-between items-center">
                            <h3 class="font-bold text-gray-800">سبد خرید شما</h3>
                            <span class="text-xs text-gray-500">{{ $cartTotalQuantity }} کالا</span>
                        </div>

                        <!-- Items List -->
                        <div class="max-h-64 overflow-y-auto p-4 space-y-4">
                            @forelse($cart as $id => $item)
                                <div class="flex items-center gap-3">
                                    <!-- اگر در سشن عکس ذخیره میکنی از $item['image'] استفاده کن وگرنه آدرس دیفالت بده -->
                                    <img src="{{ $item['image'] ?? asset('images/default-shoe.png') }}" alt="{{ $item['name'] ?? 'محصول' }}" class="w-16 h-16 object-cover rounded-lg bg-gray-50">
                                    <div class="flex-1">
                                        <h4 class="text-sm font-semibold text-gray-800 line-clamp-1">{{ $item['name'] ?? 'نام محصول' }}</h4>
                                        <div class="text-xs text-gray-500 mt-1">تعداد: {{ $item['quantity'] }}</div>
                                        <div class="text-sm font-bold text-brand-600 mt-1">
                                            @php
                                                $unitPrice = isset($item['discount']) && $item['discount'] < $item['price'] ? $item['discount'] : $item['price'];
                                            @endphp
                                            {{ number_format($unitPrice) }} تومان
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-6 text-gray-400 text-sm flex flex-col items-center">
                                    <svg class="w-10 h-10 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    سبد خرید شما خالی است
                                </div>
                            @endforelse
                        </div>

                        <!-- Footer / Total Price -->
                        @if($cartTotalQuantity > 0)
                            <div class="p-4 border-t border-gray-50 bg-gray-50/50 rounded-b-2xl">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-gray-600 text-sm font-medium">جمع کل:</span>
                                    <span class="text-lg font-black text-slate-900">{{ number_format($cartTotalPrice) }} تومان</span>
                                </div>
                                <a href="{{ route('cart.index') ?? '#' }}" class="block w-full text-center bg-brand-600 hover:bg-brand-700 text-white font-semibold py-2.5 rounded-xl transition-colors">
                                    مشاهده سبد و تسویه
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

<!-- اسکریپت جاوا اسکریپت برای باز و بسته شدن دراپ‌داون سبد خرید -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cartToggleBtn = document.getElementById('cart-toggle-btn');
        const cartDropdownPanel = document.getElementById('cart-dropdown-panel');

        cartToggleBtn.addEventListener('click', function(e) {
            e.stopPropagation(); // جلوگیری از بسته شدن فوری با کلیک

            // تاگل کردن کلاس ها برای نمایش/مخفی کردن
            cartDropdownPanel.classList.toggle('opacity-0');
            cartDropdownPanel.classList.toggle('invisible');
            cartDropdownPanel.classList.toggle('translate-y-2');
        });

        // کلیک در هر جای صفحه (غیر از خود سبد) باعث بسته شدن دراپ داون بشه
        document.addEventListener('click', function(e) {
            if (!cartDropdownPanel.contains(e.target) && !cartToggleBtn.contains(e.target)) {
                cartDropdownPanel.classList.add('opacity-0', 'invisible', 'translate-y-2');
            }
        });
    });
</script>
