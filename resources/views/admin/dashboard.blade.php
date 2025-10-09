@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="p-5 rounded-xl bg-white dark:bg-gray-800 shadow-sm">
            <div class="text-sm text-gray-500 dark:text-gray-400">Tổng bài viết</div>
            <div class="mt-2 text-3xl font-semibold text-gray-900 dark:text-white">123</div>
        </div>
        <div class="p-5 rounded-xl bg-white dark:bg-gray-800 shadow-sm">
            <div class="text-sm text-gray-500 dark:text-gray-400">Lượt xem hôm nay</div>
            <div class="mt-2 text-3xl font-semibold text-gray-900 dark:text-white">2,345</div>
        </div>
        <div class="p-5 rounded-xl bg-white dark:bg-gray-800 shadow-sm">
            <div class="text-sm text-gray-500 dark:text-gray-400">Bình luận mới</div>
            <div class="mt-2 text-3xl font-semibold text-gray-900 dark:text-white">18</div>
        </div>
        <div class="p-5 rounded-xl bg-white dark:bg-gray-800 shadow-sm">
            <div class="text-sm text-gray-500 dark:text-gray-400">Người dùng mới</div>
            <div class="mt-2 text-3xl font-semibold text-gray-900 dark:text-white">7</div>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-2 p-5 rounded-xl bg-white dark:bg-gray-800 shadow-sm">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Hiệu suất</h3>
                <span class="text-sm text-gray-500">7 ngày qua</span>
            </div>
            <div class="mt-6 h-64 bg-gradient-to-b from-gray-100 to-white dark:from-gray-700 dark:to-gray-800 rounded-lg">
            </div>
        </div>
        <div class="p-5 rounded-xl bg-white dark:bg-gray-800 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Hoạt động gần đây</h3>
            <ul class="mt-4 space-y-3 text-sm text-gray-700 dark:text-gray-300">
                <li class="flex items-center gap-2"><i class="fa-regular fa-file-lines text-gray-400"></i> Bài viết mới được
                    xuất bản</li>
                <li class="flex items-center gap-2"><i class="fa-regular fa-message text-gray-400"></i> Có 3 bình luận mới
                </li>
                <li class="flex items-center gap-2"><i class="fa-regular fa-user text-gray-400"></i> Người dùng A vừa đăng
                    ký</li>
            </ul>
        </div>
    </div>
@endsection
