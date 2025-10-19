{{-- @extends('admin.admin_master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @php
            $categories = App\Models\Category::latest()->get();
            //var_dump($categories);
            $authors = App\Models\Author::latest()->get();

            $ebooks = App\Models\Ebook::latest()->get();

        @endphp
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fe-box float-right"></i>
                    <h5 class="text-muted text-uppercase mb-3 mt-0">Categories</h5>
                    <h3 class="mb-3">{{ count($categories) }}</h3>
                    <span class="badge badge-primary"> +11% </span>
                    <span class="text-muted ml-2 vertical-middle">From
                        previous period</span>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fe-layers float-right"></i>
                    <h5 class="text-muted text-uppercase mb-3 mt-0">Authors</h5>
                    <h3 class="mb-3">{{ count($authors) }}</h3>
                    <span class="badge badge-primary"> -29% </span> <span class="text-muted ml-2 vertical-middle">From
                        previous period</span>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fe-tag float-right"></i>
                    <h5 class="text-muted text-uppercase mb-3 mt-0">Ebook</h5>
                    <h3 class="mb-3">{{ count($ebooks) }}</h3>
                    <span class="badge badge-primary"> 0% </span> <span class="text-muted ml-2 vertical-middle">From
                        previous period</span>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fe-briefcase float-right"></i>
                    <h5 class="text-muted text-uppercase mb-3 mt-0">Product Sold</h5>
                    <h3 class="mb-3" data-plugin="counterup">1,890</h3>
                    <span class="badge badge-primary"> +89% </span> <span class="text-muted ml-2 vertical-middle">Last
                        year</span>
                </div>
            </div>
        </div>




    </div> <!-- end container-fluid -->
@endsection
 --}}
@extends('admin.layouts.master')
@section('content')
    <!-- Main Content -->
    <div class="flex-1 lg:ml-0">
        <!-- Top Navigation -->
        <div class="hidden justify-between items-center px-6 py-4 bg-white border-b border-gray-200 shadow-sm lg:flex">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                <p class="text-gray-600">Welcome to your admin panel</p>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <div class="relative">
                    <input type="text" placeholder="Search..."
                        class="py-2 pr-4 pl-10 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <i class="absolute left-3 top-1/2 text-gray-400 transform -translate-y-1/2 fas fa-search"></i>
                </div>
                <!-- Notifications -->
                <button
                    class="relative p-2 text-gray-600 rounded-lg transition-colors hover:text-gray-800 hover:bg-gray-100">
                    <i class="text-xl fas fa-bell"></i>
                    <span
                        class="flex absolute -top-1 -right-1 justify-center items-center w-5 h-5 text-xs text-white bg-red-500 rounded-full">3</span>
                </button>
                <!-- Profile -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('uploads' . Auth::user()->avatar) }}" alt="Profile" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-600">{{ Auth::user()->user_type == 'admin' ? 'Administrator' : null }}
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- Dashboard Content -->
    <div class="p-4 lg:p-8">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
            <div
                class="p-6 text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-lg transition-transform duration-200 transform hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="text-3xl font-bold">120</div>
                        <div class="text-blue-100">Total Admin</div>
                    </div>
                    <i class="text-3xl text-blue-200 fas fa-users"></i>
                </div>
            </div>

            <div
                class="p-6 text-white bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-lg transition-transform duration-200 transform hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="text-3xl font-bold">34</div>
                        <div class="text-purple-100">News</div>
                    </div>
                    <i class="text-3xl text-purple-200 fas fa-newspaper"></i>
                </div>
            </div>

            <div
                class="p-6 text-white bg-gradient-to-r from-green-500 to-green-600 rounded-xl shadow-lg transition-transform duration-200 transform hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="text-3xl font-bold">7</div>
                        <div class="text-green-100">Reports</div>
                    </div>
                    <i class="text-3xl text-green-200 fas fa-chart-line"></i>
                </div>
            </div>

            <div
                class="p-6 text-white bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl shadow-lg transition-transform duration-200 transform hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="text-3xl font-bold">5</div>
                        <div class="text-yellow-100">Online Users</div>
                    </div>
                    <i class="text-3xl text-yellow-200 fas fa-user-friends"></i>
                </div>
            </div>
        </div>

        <!-- Additional Stats Row -->
        <div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
            <div
                class="p-6 text-white bg-gradient-to-r from-red-500 to-red-600 rounded-xl shadow-lg transition-transform duration-200 transform hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="text-3xl font-bold">892</div>
                        <div class="text-red-100">Total Orders</div>
                    </div>
                    <i class="text-3xl text-red-200 fas fa-shopping-cart"></i>
                </div>
            </div>

            <div
                class="p-6 text-white bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-xl shadow-lg transition-transform duration-200 transform hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="text-3xl font-bold">$24,500</div>
                        <div class="text-indigo-100">Revenue</div>
                    </div>
                    <i class="text-3xl text-indigo-200 fas fa-dollar-sign"></i>
                </div>
            </div>

            <div
                class="p-6 text-white bg-gradient-to-r from-pink-500 to-pink-600 rounded-xl shadow-lg transition-transform duration-200 transform hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="text-3xl font-bold">156</div>
                        <div class="text-pink-100">Products</div>
                    </div>
                    <i class="text-3xl text-pink-200 fas fa-box"></i>
                </div>
            </div>

            <div
                class="p-6 text-white bg-gradient-to-r from-teal-500 to-teal-600 rounded-xl shadow-lg transition-transform duration-200 transform hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="text-3xl font-bold">98%</div>
                        <div class="text-teal-100">Satisfaction</div>
                    </div>
                    <i class="text-3xl text-teal-200 fas fa-heart"></i>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 gap-6 mb-8 lg:grid-cols-2">
            <!-- Recent Activity -->
            <div class="p-6 bg-white rounded-xl shadow-lg">
                <h3 class="mb-4 text-lg font-semibold text-gray-800">Recent Activity</h3>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="flex justify-center items-center w-8 h-8 bg-blue-100 rounded-full">
                            <i class="text-sm text-blue-600 fas fa-user"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">New user registered</p>
                            <p class="text-xs text-gray-500">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex justify-center items-center w-8 h-8 bg-green-100 rounded-full">
                            <i class="text-sm text-green-600 fas fa-shopping-cart"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">New order received</p>
                            <p class="text-xs text-gray-500">5 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex justify-center items-center w-8 h-8 bg-purple-100 rounded-full">
                            <i class="text-sm text-purple-600 fas fa-chart-line"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">Monthly report generated</p>
                            <p class="text-xs text-gray-500">1 hour ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="p-6 bg-white rounded-xl shadow-lg">
                <h3 class="mb-4 text-lg font-semibold text-gray-800">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-4">
                    <button
                        class="p-4 rounded-lg border-2 border-gray-300 border-dashed transition-colors hover:border-blue-400 hover:bg-blue-50 group">
                        <i class="mb-2 text-2xl text-gray-400 fas fa-plus group-hover:text-blue-600"></i>
                        <p class="text-sm text-gray-600 group-hover:text-blue-600">Add Product</p>
                    </button>
                    <button
                        class="p-4 rounded-lg border-2 border-gray-300 border-dashed transition-colors hover:border-green-400 hover:bg-green-50 group">
                        <i class="mb-2 text-2xl text-gray-400 fas fa-users group-hover:text-green-600"></i>
                        <p class="text-sm text-gray-600 group-hover:text-green-600">Add User</p>
                    </button>
                    <button
                        class="p-4 rounded-lg border-2 border-gray-300 border-dashed transition-colors hover:border-purple-400 hover:bg-purple-50 group">
                        <i class="mb-2 text-2xl text-gray-400 fas fa-file-alt group-hover:text-purple-600"></i>
                        <p class="text-sm text-gray-600 group-hover:text-purple-600">Generate Report</p>
                    </button>
                    <button
                        class="p-4 rounded-lg border-2 border-gray-300 border-dashed transition-colors hover:border-orange-400 hover:bg-orange-50 group">
                        <i class="mb-2 text-2xl text-gray-400 fas fa-cog group-hover:text-orange-600"></i>
                        <p class="text-sm text-gray-600 group-hover:text-orange-600">Settings</p>
                    </button>
                </div>
            </div>
        </div>

        <!-- Data Tables -->
        <div class="overflow-hidden bg-white rounded-xl shadow-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Recent Orders</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Order ID</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Customer</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Amount</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Status</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">#12345</td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">John Smith</td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">$299.00</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Completed</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">2024-01-15</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">#12346</td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">Jane Doe</td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">$149.00</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">Pending</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">2024-01-14</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">#12347</td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">Mike Johnson</td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">$89.00</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Cancelled</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">2024-01-13</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
