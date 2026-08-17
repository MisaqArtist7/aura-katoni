<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Admin Panel</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#64748b',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
<!-- Sidebar -->
<div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-in-out" id="sidebar">
    <div class="flex items-center justify-center h-16 bg-primary">
        <h1 class="text-white text-xl font-bold">Store Admin</h1>
    </div>

    <nav class="mt-8">
        <div class="px-4 space-y-2">
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors" onclick="showSection('dashboard')">
                <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors" onclick="showSection('products')">
                <i data-lucide="package" class="w-5 h-5 mr-3"></i>
                Products
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors" onclick="showSection('orders')">
                <i data-lucide="shopping-cart" class="w-5 h-5 mr-3"></i>
                Orders
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors" onclick="showSection('customers')">
                <i data-lucide="users" class="w-5 h-5 mr-3"></i>
                Customers
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors" onclick="showSection('analytics')">
                <i data-lucide="bar-chart-3" class="w-5 h-5 mr-3"></i>
                Analytics
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors" onclick="showSection('settings')">
                <i data-lucide="settings" class="w-5 h-5 mr-3"></i>
                Settings
            </a>
        </div>
    </nav>
</div>

<!-- Main Content -->
<div class="lg:ml-64">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="flex items-center justify-between px-6 py-4">
            <div class="flex items-center">
                <button class="lg:hidden mr-4" onclick="toggleSidebar()">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <h2 class="text-xl font-semibold text-gray-800" id="page-title">Dashboard</h2>
            </div>

            <div class="flex items-center space-x-4">
                <button class="relative p-2 text-gray-600 hover:text-gray-800">
                    <i data-lucide="bell" class="w-6 h-6"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                <div class="flex items-center space-x-3">
                    <img src="/placeholder.svg?height=32&width=32" alt="Admin" class="w-8 h-8 rounded-full">
                    <div class="hidden md:block">
                        <p class="text-sm font-medium text-gray-700">Admin User</p>
                        <p class="text-xs text-gray-500">admin@store.com</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Dashboard Section -->
    <div id="dashboard-section" class="p-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                        <p class="text-3xl font-bold text-gray-900">$45,231</p>
                        <p class="text-sm text-green-600">+12% from last month</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <i data-lucide="dollar-sign" class="w-6 h-6 text-green-600"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Orders</p>
                        <p class="text-3xl font-bold text-gray-900">1,234</p>
                        <p class="text-sm text-blue-600">+8% from last month</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <i data-lucide="shopping-bag" class="w-6 h-6 text-blue-600"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Products</p>
                        <p class="text-3xl font-bold text-gray-900">567</p>
                        <p class="text-sm text-purple-600">+3 new this week</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full">
                        <i data-lucide="package" class="w-6 h-6 text-purple-600"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Customers</p>
                        <p class="text-3xl font-bold text-gray-900">2,345</p>
                        <p class="text-sm text-orange-600">+15% from last month</p>
                    </div>
                    <div class="p-3 bg-orange-100 rounded-full">
                        <i data-lucide="users" class="w-6 h-6 text-orange-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Recent Orders</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12345</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">John Doe</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$299.00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-01-15</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12346</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jane Smith</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$149.00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-01-14</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12347</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Mike Johnson</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$89.00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Processing</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-01-13</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div id="products-section" class="p-6 hidden">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-900">Products</h3>
            <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                <i data-lucide="plus" class="w-4 h-4 inline mr-2"></i>
                Add Product
            </button>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <img class="h-10 w-10 rounded-lg" src="/placeholder.svg?height=40&width=40" alt="">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Wireless Headphones</div>
                                    <div class="text-sm text-gray-500">Premium Audio</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Electronics</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$199.99</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">45</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <img class="h-10 w-10 rounded-lg" src="/placeholder.svg?height=40&width=40" alt="">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Smartphone Pro</div>
                                    <div class="text-sm text-gray-500">Latest Model</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Electronics</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$899.99</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">23</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                            <button class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Orders Section -->
    <div id="orders-section" class="p-6 hidden">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-900">Orders</h3>
            <div class="flex space-x-2">
                <select class="border border-gray-300 rounded-lg px-3 py-2">
                    <option>All Status</option>
                    <option>Pending</option>
                    <option>Processing</option>
                    <option>Completed</option>
                    <option>Cancelled</option>
                </select>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Products</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12345</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                            <div class="text-sm text-gray-500">john@example.com</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3 items</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$299.00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-01-15</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">View</button>
                            <button class="text-gray-600 hover:text-gray-900">Print</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Customers Section -->
    <div id="customers-section" class="p-6 hidden">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-900">Customers</h3>
            <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                <i data-lucide="user-plus" class="w-4 h-4 inline mr-2"></i>
                Add Customer
            </button>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Spent</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Join Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <img class="h-10 w-10 rounded-full" src="/placeholder.svg?height=40&width=40" alt="">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">John Doe</div>
                                    <div class="text-sm text-gray-500">Premium Customer</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">john@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">12</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$2,340.00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-15</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">View</button>
                            <button class="text-gray-600 hover:text-gray-900">Edit</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Analytics Section -->
    <div id="analytics-section" class="p-6 hidden">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Analytics</h3>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Sales Overview</h4>
                <div class="h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                    <p class="text-gray-500">Chart placeholder - Sales data visualization</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Top Products</h4>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Wireless Headphones</span>
                        <span class="text-sm font-medium">$12,450</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Smartphone Pro</span>
                        <span class="text-sm font-medium">$8,900</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Laptop Ultra</span>
                        <span class="text-sm font-medium">$6,750</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Section -->
    <div id="settings-section" class="p-6 hidden">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Settings</h3>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Store Settings</h4>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Store Name</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="My Online Store">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Store Email</label>
                        <input type="email" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="store@example.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Currency</label>
                        <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option>USD ($)</option>
                            <option>EUR (€)</option>
                            <option>GBP (£)</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                        Save Settings
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Sidebar Overlay -->
<div class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden hidden" id="sidebar-overlay" onclick="toggleSidebar()"></div>

<script>
    // Initialize Lucide icons
    lucide.createIcons();

    // Sidebar toggle functionality
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }

    // Section navigation
    function showSection(sectionName) {
        // Hide all sections
        const sections = ['dashboard', 'products', 'orders', 'customers', 'analytics', 'settings'];
        sections.forEach(section => {
            document.getElementById(section + '-section').classList.add('hidden');
        });

        // Show selected section
        document.getElementById(sectionName + '-section').classList.remove('hidden');

        // Update page title
        const titles = {
            'dashboard': 'Dashboard',
            'products': 'Products',
            'orders': 'Orders',
            'customers': 'Customers',
            'analytics': 'Analytics',
            'settings': 'Settings'
        };
        document.getElementById('page-title').textContent = titles[sectionName];

        // Update active nav item
        const navLinks = document.querySelectorAll('nav a');
        navLinks.forEach(link => {
            link.classList.remove('bg-gray-100');
            link.classList.add('hover:bg-gray-100');
        });

        event.target.classList.add('bg-gray-100');
        event.target.classList.remove('hover:bg-gray-100');

        // Close sidebar on mobile after selection
        if (window.innerWidth < 1024) {
            toggleSidebar();
        }
    }

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.querySelector('[onclick="toggleSidebar()"]');

        if (window.innerWidth < 1024 &&
            !sidebar.contains(event.target) &&
            !sidebarToggle.contains(event.target) &&
            !sidebar.classList.contains('-translate-x-full')) {
            toggleSidebar();
        }
    });
</script>
</body>
</html>
