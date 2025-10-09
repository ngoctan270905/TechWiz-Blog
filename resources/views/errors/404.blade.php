<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 | Lạc lối</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Tùy chỉnh nhẹ cho Dark Mode nếu cần */
        :root {
            color-scheme: light dark;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased">

    <div class="flex items-center justify-center min-h-screen p-4 sm:p-8">
        <div class="text-center max-w-xl w-full">

            <div class="relative mb-8">
                <p
                    class="text-[12rem] sm:text-[15rem] font-black text-transparent bg-clip-text 
                   bg-gradient-to-r from-indigo-500 to-purple-600 
                   dark:from-indigo-400 dark:to-purple-500 leading-none opacity-90 transition-opacity duration-300">
                    404
                </p>
                <div class="absolute inset-0 flex items-center justify-center -translate-y-1/2">
                    <p class="text-4xl sm:text-5xl font-extrabold text-gray-800 dark:text-gray-100 tracking-tight">
                        Oops!
                    </p>
                </div>
            </div>

            <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-gray-100 mb-3">
                Không tìm thấy trang này
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-10">
                Đường dẫn bạn tìm kiếm có thể đã bị xóa, đổi tên, hoặc không tồn tại.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('home') }}"
                    class="w-full sm:w-auto px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-lg 
                           text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50 
                           transition transform hover:scale-[1.02] duration-300 ease-in-out">
                    <i class="fas fa-home mr-2"></i> Quay về Trang chủ
                </a>

                <button onclick="history.back()"
                    class="w-full sm:w-auto px-6 py-3 border border-gray-300 dark:border-gray-700 text-base font-medium rounded-xl 
                           shadow-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 
                           focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50 transition transform hover:scale-[1.02] duration-300 ease-in-out">
                    <i class="fas fa-arrow-left mr-2"></i> Trở lại trang trước
                </button>
            </div>

        </div>
    </div>

</body>

</html>
