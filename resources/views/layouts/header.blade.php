<header class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
    <div class="max-w-6xl mx-auto flex items-center justify-between py-4 px-4 sm:px-6 lg:px-8">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <i class="fas fa-feather-alt text-indigo-600 dark:text-indigo-400 text-xl"></i>
            <span class="font-semibold text-lg text-gray-800 dark:text-gray-100">
                TechWiz Blog
            </span>
        </a>

        <!-- Navigation -->
        <nav class="hidden md:flex items-center space-x-6 text-sm font-medium">
            <a href="{{ route('home') }}"
                class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                Trang chủ
            </a>
            <a href="#"
                class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                Bài viết
            </a>
            <a href="#"
                class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                Giới thiệu
            </a>
        </nav>

        <!-- Auth Section -->
        <div class="flex items-center space-x-4">
            @auth
                <!-- Notification Dropdown -->
                <x-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button class="relative focus:outline-none">
                            <i class="fas fa-bell text-gray-600 dark:text-gray-300 text-xl hover:text-indigo-500 transition"></i>
                            <!-- Badge -->
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">
                                3
                            </span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 font-semibold text-gray-700 dark:text-gray-200">
                            Thông báo
                        </div>
                        <div class="max-h-80 overflow-y-auto scrollbar-hide">
                            <div class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                Bình luận mới trên bài viết của bạn
                            </div>
                            <div class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                Ai đó đã thích bài viết của bạn
                            </div>
                            <div class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                Bài viết mới từ người theo dõi
                            </div>
                            <div class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                Bài viết mới từ người theo dõi
                            </div>
                            <div class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                Bài viết mới từ người theo dõi
                            </div>
                            <div class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                Bài viết mới từ người theo dõi
                            </div>
                            <div class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                Bài viết mới từ người theo dõi
                            </div>
                            <div class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                Bài viết mới từ người theo dõi
                            </div>
                            <div class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                Bài viết mới từ người theo dõi
                            </div>
                        </div>
                        <div class="px-4 py-2 text-center border-t border-gray-200 dark:border-gray-700">
                            <a href="#" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Xem thông báo trước đó</a>
                        </div>
                    </x-slot>
                </x-dropdown>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center focus:outline-none">
                            @if (Auth::user()->profile_photo_path)
                                <img src="{{ Auth::user()->profile_photo_path }}" alt="Avatar"
                                    class="w-9 h-9 rounded-full object-cover border-2 border-indigo-500 shadow-sm">
                            @else
                                <div
                                    class="w-9 h-9 flex items-center justify-center rounded-full bg-indigo-600 text-white font-semibold border-2 border-indigo-500 shadow-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-sm font-semibold text-gray-800 dark:text-gray-100">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fas fa-user-circle mr-2 text-indigo-500"></i> Hồ sơ cá nhân
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-2 text-red-500"></i> Đăng xuất
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <!-- Guest Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center focus:outline-none">
                            <div
                                class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-300 dark:bg-gray-600 border-2 border-gray-400 shadow-sm">
                                <i class="fas fa-user text-gray-700 dark:text-gray-200"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('login')">
                            <i class="fas fa-sign-in-alt mr-2 text-indigo-500"></i> Đăng nhập
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('register')">
                            <i class="fas fa-user-plus mr-2 text-green-500"></i> Đăng ký
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            @endauth
        </div>
    </div>
</header>
