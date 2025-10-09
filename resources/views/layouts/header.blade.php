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
                <x-dropdown align="right" width="72">
                    <x-slot name="trigger">
                        <button class="relative focus:outline-none" id="notification-trigger">
                            <i
                                class="fas fa-bell text-gray-600 dark:text-gray-300 text-xl hover:text-indigo-500 transition"></i>
                            <span id="notification-badge"
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center {{ auth()->user()->unreadNotifications()->count() ? '' : 'hidden' }}">
                                {{ auth()->user()->unreadNotifications()->count() }}
                            </span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div
                            class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 font-semibold text-gray-700 dark:text-gray-200">
                            Thông báo
                        </div>
                        <div id="notification-list" class="max-h-80 overflow-y-auto scrollbar-hide">
                            @foreach (auth()->user()->notifications()->latest()->take(10)->get() as $notification)
                                @php
                                    $data = $notification->data;
                                @endphp

                                <div class="px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700">
                                    @if (!empty($data['link']))
                                        <a href="{{ $data['link'] }}"
                                            class="block text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                            {!! $data['message'] !!}
                                        </a>
                                    @else
                                        <span class="text-gray-600 dark:text-gray-300">
                                            {!! $data['message'] !!}
                                        </span>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                        <div class="px-4 py-2 text-center border-t border-gray-200 dark:border-gray-700">
                            <a href="#" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Xem thông
                                báo trước đó</a>
                        </div>
                    </x-slot>
                </x-dropdown>

                <x-dropdown align="right" width="52">
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

                        {{-- KIỂM TRA QUYỀN ADMIN --}}
                        @if (Auth::user()->role === 'admin')
                            <x-dropdown-link :href="route('admin.dashboard')">
                                <i class="fas fa-tools mr-2 text-orange-500"></i> Truy cập trang quản trị
                            </x-dropdown-link>
                        @endif

                        {{-- KẾT THÚC KIỂM TRA QUYỀN ADMIN --}}

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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Lấy userId từ meta
        const userMeta = document.querySelector('meta[name="user-id"]');
        if (!userMeta) return;
        const userId = userMeta.content;

        // Kiểm tra Echo đã load chưa
        if (!window.Echo) {
            return;
        }

        // Lắng nghe kênh private
        window.Echo.private('notifications.' + userId)
            .subscribed(() => {
                // ...
            })
            .listen('.user.logged-in', (e) => {
                // Xử lý khi nhận được event Real-time
                // Ví dụ: Cập nhật badge đếm thông báo hoặc reload danh sách thông báo.
            });

        // Khi người dùng mở dropdown thông báo → mark as read và ẩn badge
        const trigger = document.getElementById('notification-trigger');
        if (trigger) {
            trigger.addEventListener('click', () => {
                fetch(`{{ route('notifications.markRead') }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]')
                            .content,
                        'Accept': 'application/json',
                    },
                    credentials: 'same-origin'
                }).then(() => {
                    const badge = document.getElementById('notification-badge');
                    if (badge) {
                        badge.textContent = '0';
                        badge.classList.add('hidden');
                    }
                }).catch(() => {});
            });
        }
    });
</script>
