<aside class="relative">
    <div class="fixed inset-y-0 left-0 z-40 w-64 transform bg-white/95 dark:bg-gray-900/95 backdrop-blur-xl border-r border-gray-200/50 dark:border-gray-700/50 shadow-2xl shadow-white/20 dark:shadow-gray-900/20 transition-all duration-300 ease-in-out"
        :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
        <div
            class="h-14 flex items-center justify-center px-4 md:px-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-white/90 via-white/80 to-gray-50/90 dark:from-gray-900/90 dark:via-gray-900/80 dark:to-gray-800/90">
            <a href="{{ route('admin.dashboard') }}"
                class="group flex items-center gap-2 font-bold text-lg md:text-xl transition-all duration-300 hover:scale-[1.02] rounded-lg px-2 py-1 mx-1">
                <span
                    class="tracking-wide bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 bg-clip-text text-transparent">
                    TechWiz Admin
                </span>
            </a>
        </div>

        <nav class="p-3 space-y-1 overflow-y-auto h-[calc(100vh-3.5rem)]">
            <a href="{{ route('admin.dashboard') }}"
                class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-indigo-50/80 hover:to-purple-50/80 dark:hover:from-gray-700/50 dark:hover:to-gray-600/50 hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/20 dark:hover:shadow-purple-500/20">
                <i
                    class="fa-solid fa-gauge-high text-blue-600 dark:text-blue-400 text-sm transition-transform group-hover:scale-110"></i>
                <span>Dashboard</span>
            </a>
            <a href="#"
                class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-indigo-50/80 hover:to-purple-50/80 dark:hover:from-gray-700/50 dark:hover:to-gray-600/50 hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/20 dark:hover:shadow-purple-500/20">
                <i
                    class="fa-regular fa-newspaper text-green-600 dark:text-green-400 text-sm transition-transform group-hover:scale-110"></i>
                <span>Bài viết</span>
            </a>
            <a href="#"
                class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-indigo-50/80 hover:to-purple-50/80 dark:hover:from-gray-700/50 dark:hover:to-gray-600/50 hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/20 dark:hover:shadow-purple-500/20">
                <i
                    class="fa-regular fa-folder text-orange-600 dark:text-orange-400 text-sm transition-transform group-hover:scale-110"></i>
                <span>Danh mục</span>
            </a>
            <a href="#"
                class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-indigo-50/80 hover:to-purple-50/80 dark:hover:from-gray-700/50 dark:hover:to-gray-600/50 hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/20 dark:hover:shadow-purple-500/20">
                <i
                    class="fa-regular fa-comments text-purple-600 dark:text-purple-400 text-sm transition-transform group-hover:scale-110"></i>
                <span>Bình luận</span>
            </a>
            <a href="#"
                class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:bg-gradient-to-r hover:from-indigo-50/80 hover:to-purple-50/80 dark:hover:from-gray-700/50 dark:hover:to-gray-600/50 hover:scale-105 hover:shadow-lg hover:shadow-indigo-500/20 dark:hover:shadow-purple-500/20">
                <i
                    class="fa-regular fa-bell text-red-600 dark:text-red-400 text-sm transition-transform group-hover:scale-110"></i>
                <span>Thông báo</span>
            </a>
        </nav>
    </div>
</aside>
