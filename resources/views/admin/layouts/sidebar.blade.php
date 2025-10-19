<!-- Mobile Overlay -->
<div id="mobile-overlay" class="hidden fixed inset-0 z-40 bg-black bg-opacity-50 backdrop-blur-sm lg:hidden"></div>
<div class="flex min-h-screen">
    <div id="sidebar"
        class="overflow-auto fixed inset-y-0 left-0 z-50 w-80 bg-gradient-to-br from-blue-500 to-purple-600 shadow-xl -translate-x-full lg:relative lg:w-72 lg:translate-x-0 sidebar">

        <!-- Sidebar Header -->
        <div class="flex justify-between items-center p-5 border-b sidebar-header border-white/10">
            <div>
                <h3 class="m-0 text-2xl font-bold text-white">Admin Panel</h3>
                <p class="mt-1 text-sm text-white/80">Welcome back! </p>
            </div>
            <!-- Close button for mobile -->
            <button id="sidebar-close" class="p-2 rounded-md transition-colors lg:hidden hover:bg-white/10">
                <i class="text-xl text-white fas fa-times"></i>
            </button>
        </div>

        <div
            class="overflow-y-auto flex-1 py-5 scrollbar-thin scrollbar-track-transparent scrollbar-thumb-white/30 sidebar-menu">

            <!-- Dashboard -->
            <div class="mb-1.5 menu-item">
                <a href="{{ route('admin.dashboard.index') }}"
                    class="flex items-center px-5 py-3 transition-all duration-300 menu-link active text-white/90 hover:bg-white/10 hover:text-white group">
                    <i
                        class="mr-3 w-5 text-base text-center transition-transform fas fa-tachometer-alt group-hover:scale-110"></i>
                    <span class="font-medium menu-text">Dashboard</span>
                </a>
            </div>

            <!-- Ebooks Dropdown -->
            <div class="mb-1.5 menu-item">
                <button
                    class="menu-link dropdown-toggle flex items-center px-5 py-3 text-white/90 no-underline transition-all duration-300 cursor-pointer border-0 bg-transparent w-full text-left hover:bg-white/10 hover:text-white hover:translate-x-1.5 {{ request()->routeIs('admin.ebook.*') ? 'active bg-white/15 text-white border-r-4 border-white' : '' }}"
                    data-target="ebooks-submenu">
                    <i class="mr-3 w-5 text-base text-center fas fa-book"></i>
                    <span class="flex-grow font-medium menu-text">Ebooks</span>
                    <i
                        class="fas fa-chevron-down dropdown-arrow text-xs transition-transform duration-300 {{ request()->routeIs('admin.ebook.*') ? 'rotated transform rotate-180' : '' }}"></i>
                </button>
                <div class="submenu bg-black/10 max-h-0 overflow-hidden transition-all duration-300 {{ request()->routeIs('admin.ebook.*') ? 'open max-h-96 py-2.5' : '' }}"
                    id="ebooks-submenu">
                    <a href="{{ route('admin.ebook.index') }}"
                        class="submenu-item py-2 px-5 pl-13 text-white/80 no-underline block transition-all duration-300 text-sm hover:bg-white/8 hover:text-white hover:pl-15 {{ request()->routeIs('admin.ebook.index') ? 'active bg-white/12 text-white border-l-3 border-white' : '' }}">All
                        Ebooks</a>
                    <a href="{{ route('admin.ebook.create') }}"
                        class="submenu-item py-2 px-5 pl-13 text-white/80 no-underline block transition-all duration-300 text-sm hover:bg-white/8 hover:text-white hover:pl-15 {{ request()->routeIs('admin.ebook.create') ? 'active bg-white/12 text-white border-l-3 border-white' : '' }}">Add
                        New Ebook</a>
                </div>
            </div>



            <!-- Categories Dropdown -->
            <div class="mb-1.5 menu-item">
                <button
                    class="menu-link dropdown-toggle flex items-center px-5 py-3 text-white/90 no-underline transition-all duration-300 cursor-pointer border-0 bg-transparent w-full text-left hover:bg-white/10 hover:text-white hover:translate-x-1.5 {{ request()->routeIs('admin.category.*') ? 'active bg-white/15 text-white border-r-4 border-white' : '' }}"
                    data-target="categories-submenu">
                    <i class="mr-3 w-5 text-base text-center fas fa-tags"></i>
                    <span class="flex-grow font-medium menu-text">Categories</span>
                    <i class="text-xs transition-transform duration-300 fas fa-chevron-down dropdown-arrow"></i>
                </button>
                <div class="submenu bg-black/10 max-h-0 overflow-hidden transition-all duration-300 {{ request()->routeIs('admin.category.*') ? 'open max-h-96 py-2.5' : '' }}"
                    id="categories-submenu">
                    <a href="{{ route('admin.category.index') }}"
                        class="submenu-item py-2 px-5 pl-13 text-white/80 no-underline block transition-all duration-300 text-sm hover:bg-white/8 hover:text-white hover:pl-15 {{ request()->routeIs('admin.category.index') ? 'active bg-white/12 text-white border-l-3 border-white' : '' }}">All
                        Categories</a>
                </div>
            </div>



            <!-- Settings Dropdown -->
            <div class="mb-1.5 menu-item">
                <button
                    class="menu-link dropdown-toggle flex items-center px-5 py-3 text-white/90 no-underline transition-all duration-300 cursor-pointer border-0 bg-transparent w-full text-left hover:bg-white/10 hover:text-white hover:translate-x-1.5 {{ request()->routeIs('admin.setting.*') || request()->routeIs('admin.paypal-settings.*') || request()->routeIs('admin.stripe-settings.*') ? 'active bg-white/15 text-white border-r-4 border-white' : '' }}"
                    data-target="settings-submenu">
                    <i class="mr-3 w-5 text-base text-center fas fa-cogs"></i>
                    <span class="flex-grow font-medium menu-text">Settings</span>
                    <i
                        class="fas fa-chevron-down dropdown-arrow text-xs transition-transform duration-300 {{ request()->routeIs('admin.setting.*') || request()->routeIs('admin.paypal-settings.*') || request()->routeIs('admin.stripe-settings.*') ? 'rotated transform rotate-180' : '' }}"></i>
                </button>
                <div class="submenu bg-black/10 max-h-0 overflow-hidden transition-all duration-300 {{ request()->routeIs('admin.setting.*') || request()->routeIs('admin.paypal-settings.*') || request()->routeIs('admin.stripe-settings.*') ? 'open max-h-96 py-2.5' : '' }}"
                    id="settings-submenu">
                    <a href=""
                        class="submenu-item py-2 px-5 pl-13 text-white/80 no-underline block transition-all duration-300 text-sm hover:bg-white/8 hover:text-white hover:pl-15 {{ request()->routeIs('admin.setting.*') ? 'active bg-white/12 text-white border-l-3 border-white' : '' }}">General
                        Settings</a>
                    <a href=""
                        class="submenu-item py-2 px-5 pl-13 text-white/80 no-underline block transition-all duration-300 text-sm hover:bg-white/8 hover:text-white hover:pl-15 {{ request()->routeIs('admin.paypal-settings.*') ? 'active bg-white/12 text-white border-l-3 border-white' : '' }}">PayPal
                        Settings</a>
                    <a href=""
                        class="submenu-item py-2 px-5 pl-13 text-white/80 no-underline block transition-all duration-300 text-sm hover:bg-white/8 hover:text-white hover:pl-15 {{ request()->routeIs('admin.stripe-settings.*') ? 'active bg-white/12 text-white border-l-3 border-white' : '' }}">Stripe
                        Settings</a>
                    <a href=""
                        class="submenu-item py-2 px-5 pl-13 text-white/80 no-underline block transition-all duration-300 text-sm hover:bg-white/8 hover:text-white hover:pl-15 {{ request()->routeIs('admin.razorpay-settings.*') ? 'active bg-white/12 text-white border-l-3 border-white' : '' }}">Razorpay
                        Settings</a>
                    <a href=""
                        class="submenu-item py-2 px-5 pl-13 text-white/80 no-underline block
                         transition-all duration-300 text-sm hover:bg-white/8 hover:text-white hover:pl-15
                         {{ request()->routeIs('admin.pusher-settings.*') ? 'active bg-white/12
                          text-white border-l-3 border-white' : '' }}">Pusher
                        Settings</a>
                </div>
            </div>
            <!-- Users Dropdown -->
            <div class="mb-1.5 menu-item">
                <button
                    class="flex items-center px-5 py-3 w-full text-left no-underline bg-transparent border-0 transition-all duration-300 cursor-pointer menu-link dropdown-toggle text-white/90 hover:bg-white/10 hover:text-white hover:translate-x-1.5"
                    data-target="users-submenu">
                    <i class="mr-3 w-5 text-base text-center fas fa-users"></i>
                    <span class="flex-grow font-medium menu-text">Users</span>
                    <span
                        class="px-2 py-0.5 ml-auto text-xs font-semibold text-white rounded-full badge bg-white/20">24</span>
                    <i class="text-xs transition-transform duration-300 fas fa-chevron-down dropdown-arrow"></i>
                </button>
                <div class="overflow-hidden max-h-0 transition-all duration-300 submenu bg-black/10"
                    id="users-submenu">
                    <a href="#"
                        class="block px-5 py-2 text-sm no-underline transition-all duration-300 submenu-item pl-13 text-white/80 hover:bg-white/8 hover:text-white hover:pl-15">All
                        Users</a>
                    <a href="#"
                        class="block px-5 py-2 text-sm no-underline transition-all duration-300 submenu-item pl-13 text-white/80 hover:bg-white/8 hover:text-white hover:pl-15">Active
                        Users</a>
                    <a href="#"
                        class="block px-5 py-2 text-sm no-underline transition-all duration-300 submenu-item pl-13 text-white/80 hover:bg-white/8 hover:text-white hover:pl-15">Banned
                        Users</a>
                    <a href="#"
                        class="block px-5 py-2 text-sm no-underline transition-all duration-300 submenu-item pl-13 text-white/80 hover:bg-white/8 hover:text-white hover:pl-15">User
                        Roles</a>
                    <a href="#"
                        class="block px-5 py-2 text-sm no-underline transition-all duration-300 submenu-item pl-13 text-white/80 hover:bg-white/8 hover:text-white hover:pl-15">Add
                        New User</a>
                </div>
            </div>



            <!-- Analytics Dropdown -->
            <div class="mb-1.5 menu-item">
                <button
                    class="flex items-center px-5 py-3 w-full text-left no-underline bg-transparent border-0 transition-all duration-300 cursor-pointer menu-link dropdown-toggle text-white/90 hover:bg-white/10 hover:text-white hover:translate-x-1.5"
                    data-target="analytics-submenu">
                    <i class="mr-3 w-5 text-base text-center fas fa-chart-bar"></i>
                    <span class="flex-grow font-medium menu-text">Analytics</span>
                    <i class="text-xs transition-transform duration-300 fas fa-chevron-down dropdown-arrow"></i>
                </button>
                <div class="overflow-hidden max-h-0 transition-all duration-300 submenu bg-black/10"
                    id="analytics-submenu">
                    <a href="#"
                        class="block px-5 py-2 text-sm no-underline transition-all duration-300 submenu-item pl-13 text-white/80 hover:bg-white/8 hover:text-white hover:pl-15">Overview</a>
                    <a href="#"
                        class="block px-5 py-2 text-sm no-underline transition-all duration-300 submenu-item pl-13 text-white/80 hover:bg-white/8 hover:text-white hover:pl-15">Sales
                        Report</a>
                    <a href="#"
                        class="block px-5 py-2 text-sm no-underline transition-all duration-300 submenu-item pl-13 text-white/80 hover:bg-white/8 hover:text-white hover:pl-15">User
                        Activity</a>
                    <a href="#"
                        class="block px-5 py-2 text-sm no-underline transition-all duration-300 submenu-item pl-13 text-white/80 hover:bg-white/8 hover:text-white hover:pl-15">Traffic
                        Sources</a>
                </div>
            </div>


            <!-- Support -->
            <div class="mb-1.5 menu-item">
                <a href="#"
                    class="flex items-center px-5 py-3 w-full text-left no-underline bg-transparent border-0 transition-all duration-300 cursor-pointer menu-link text-white/90 hover:bg-white/10 hover:text-white hover:translate-x-1.5">
                    <i class="mr-3 w-5 text-base text-center fas fa-life-ring"></i>
                    <span class="flex-grow font-medium menu-text">Support</span>
                </a>
            </div>

            <!-- Logout -->
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center px-5 py-3 w-full text-left no-underline bg-transparent border-0 transition-all duration-300 cursor-pointer menu-link text-white/90 hover:bg-white/10 hover:text-white hover:translate-x-1.5">
                    <i class="mr-3 w-5 text-base text-center fas fa-sign-out-alt"></i>
                    <span class="flex-grow font-medium menu-text">Logout</span>
                </button>

                {{--    <div class="mb-1.5 menu-item">
              <a href="#"
              class="flex items-center px-5 py-3 w-full text-left no-underline bg-transparent border-0 transition-all duration-300 cursor-pointer menu-link text-white/90 hover:bg-white/10 hover:text-white hover:translate-x-1.5">
                  <i class="mr-3 w-5 text-base text-center fas fa-sign-out-alt"></i>
                  <span class="flex-grow font-medium menu-text">Logout</span>
              </a>
          </div> --}}
            </form>

        </div>
    </div>
</div>
