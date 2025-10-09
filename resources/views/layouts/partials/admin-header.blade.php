<header
    class="sticky top-0 z-30 bg-gradient-to-r from-white/90 via-white/80 to-gray-50/90 dark:from-gray-900/90 dark:via-gray-900/80 dark:to-gray-800/90 backdrop-blur-xl supports-[backdrop-filter]:bg-white/70 dark:supports-[backdrop-filter]:bg-gray-900/70 border-b border-gray-200/50 dark:border-gray-700/50 shadow-lg shadow-white/20 dark:shadow-gray-900/20">
    <div class="px-4 md:px-6 lg:px-8 h-14 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <button
                class="group inline-flex items-center justify-center w-10 h-10 rounded-xl text-blue-600 dark:text-blue-400 hover:bg-gradient-to-br from-blue-50/80 to-indigo-50/80 dark:hover:from-gray-700/50 dark:hover:to-gray-600/50 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/20 dark:hover:shadow-indigo-500/20"
                @click="sidebarOpen = !sidebarOpen" aria-label="Toggle Sidebar">
                <i class="fa-solid fa-bars text-sm transition-transform group-hover:scale-110"></i>
            </button>
        </div>

        <div class="flex items-center gap-3">
            {{-- Notifications dropdown --}}
            <div class="relative" x-data="{ open: false }" @keydown.escape.window="open=false">
                <button @click="open = !open"
                    class="relative flex items-center justify-center w-11 h-11 rounded-xl text-indigo-500 dark:text-indigo-400 hover:bg-gradient-to-br from-indigo-50/80 to-purple-50/80 dark:hover:from-gray-700/50 dark:hover:to-gray-600/50 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-indigo-400/30 dark:hover:shadow-purple-500/30"
                    aria-label="Notifications" id="notification-trigger">
                    <i class="fa-regular fa-bell text-xl transition-transform group-hover:scale-110"></i>

                    <!-- Badge hiển thị số thông báo -->
                    <span id="notification-badge"
                        class="absolute -top-1 -right-1 flex items-center justify-center min-w-[18px] h-[18px] px-1.5 text-[11px] font-bold text-white bg-red-500 rounded-full ring-2 ring-white dark:ring-gray-900 {{ auth()->user()->unreadNotifications()->count() ? '' : 'hidden' }}">
                        {{ auth()->user()->unreadNotifications()->count() }}
                    </span>
                </button>

                <!-- Dropdown danh sách -->
                <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 scale-95" @click.away="open=false"
                    class="absolute right-0 mt-2 w-80 max-w-[80vw] bg-white dark:bg-gray-800 backdrop-blur-xl border border-gray-200/50 dark:border-gray-700/50 rounded-2xl shadow-2xl overflow-hidden z-50 ring-1 ring-gray-200/20 dark:ring-gray-700/20">

                    <!-- Header -->
                    <div
                        class="px-5 py-4 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-gray-800 dark:to-gray-700 flex items-center justify-between">
                        <span class="font-semibold text-gray-900 dark:text-white text-lg tracking-wide">🔔 Thông
                            báo</span>
                    </div>

                    <!-- Danh sách -->
                    <ul id="notification-list"
                        class="max-h-80 overflow-y-auto divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse (auth()->user()->notifications()->latest()->take(10)->get() as $notification)
                            @php $data = $notification->data; @endphp
                            <li class="px-5 py-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200">
                                @if (!empty($data['link']))
                                    <a href="{{ $data['link'] }}"
                                        class="block text-sm text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                        {!! $data['message'] !!}
                                    </a>
                                @else
                                    <span
                                        class="text-sm text-gray-700 dark:text-gray-300">{!! $data['message'] !!}</span>
                                @endif
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center gap-1">
                                    <i class="fa-solid fa-clock text-xs text-indigo-500 dark:text-indigo-400"></i>
                                    {{ $notification->created_at->diffForHumans() }}
                                </div>
                            </li>
                        @empty
                            <li class="px-5 py-4 text-sm text-gray-500 dark:text-gray-400 text-center">
                                Không có thông báo mới
                            </li>
                        @endforelse
                    </ul>

                    <div class="px-4 py-3 border-t border-gray-200 dark:border-gray-700 text-center">
                        <a href="#" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Xem thông
                            báo trước đó
                        </a>
                    </div>
                </div>
            </div>


            {{-- User dropdown button --}}
            <div class="relative" x-data="{ open: false }" @keydown.escape.window="open=false">
                <button @click="open = !open"
                    class="group inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-indigo-500/10 to-purple-500/10 dark:from-indigo-500/20 dark:to-purple-500/20 text-gray-800 dark:text-gray-200 border border-indigo-200/50 dark:border-purple-800/50 hover:from-indigo-500/20 hover:to-purple-500/20 dark:hover:from-indigo-500/30 dark:hover:to-purple-500/30 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/20 dark:hover:shadow-purple-500/20 font-medium"
                    aria-label="User Menu">
                    <i
                        class="fa-regular fa-user text-sm text-purple-600 dark:text-purple-400 transition-transform group-hover:scale-110"></i>
                    <span class="hidden sm:block truncate max-w-32">{{ auth()->user()->name ?? 'User' }}</span>

                </button>
                {{-- User dropdown menu --}}
                <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 scale-95" @click.away="open=false"
                    class="absolute right-0 mt-2 w-48 bg-white/100 dark:bg-gray-800/95 backdrop-blur-xl border border-gray-200/50 dark:border-gray-700/50 rounded-2xl shadow-2xl shadow-gray-900/10 dark:shadow-gray-900/20 overflow-hidden z-40 ring-1 ring-gray-200/20 dark:ring-gray-700/20">
                    <div
                        class="px-4 py-3 border-b bg-gradient-to-r from-indigo-50/50 to-purple-50/50 dark:from-gray-800/50 dark:to-gray-700/50">
                        <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                            {{ auth()->user()->name ?? 'User' }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">user@example.com</p>
                    </div>
                    <ul class="py-1">
                        <li><a href="{{ route('home') }}"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-indigo-50/50 dark:hover:bg-gray-700/50 transition-colors duration-200 flex items-center gap-2"><i
                                    class="fa-solid fa-house text-blue-500 dark:text-blue-400"></i> Trang chủ</a></li>
                        <li><a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-indigo-50/50 dark:hover:bg-gray-700/50 transition-colors duration-200 flex items-center gap-2"><i
                                    class="fa-solid fa-gear text-green-500 dark:text-green-400"></i> Cài đặt</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-red-50/50 dark:hover:bg-red-900/50 transition-colors duration-200 flex items-center gap-2">
                                    <i class="fa-solid fa-arrow-right-from-bracket text-red-500 dark:text-red-400"></i>
                                    Đăng xuất
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const userMeta = document.querySelector('meta[name="user-id"]');
        if (!userMeta) return;
        const userId = userMeta.content;

        // 🔔 Badge & list DOM
        const badge = document.getElementById('notification-badge');
        const list = document.getElementById('notification-list');

        // Lắng nghe realtime
        if (window.Echo) {
            window.Echo.private('notifications.' + userId)
                .listen('.user.logged-in', (e) => {
                    // Append thông báo mới
                    const li = document.createElement('li');
                    li.className =
                        "px-5 py-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200";
                    li.innerHTML = `
                    <span class="text-sm text-gray-700 dark:text-gray-300">${e.message}</span>
                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-clock text-xs text-indigo-500 dark:text-indigo-400"></i> Vừa xong
                    </div>
                `;
                    list.prepend(li);

                    // Cập nhật badge
                    if (badge) {
                        let count = parseInt(badge.textContent || 0) + 1;
                        badge.textContent = count;
                        badge.classList.remove('hidden');
                    }
                });
        }

        // Thay đổi: Khi bấm nút chuông (notification-trigger) để mở dropdown
        const notificationTrigger = document.getElementById('notification-trigger');
        if (notificationTrigger) {
            notificationTrigger.addEventListener('click', () => {
                fetch(`{{ route('notifications.markRead') }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]')
                            .content,
                        'Accept': 'application/json',
                    },
                    credentials: 'same-origin'
                }).then(() => {
                    // Ẩn badge sau khi đánh dấu đã đọc thành công
                    if (badge) badge.classList.add('hidden');
                    if (badge) badge.textContent = '0';
                }).catch(() => {});
            });
        }
    });
</script>
