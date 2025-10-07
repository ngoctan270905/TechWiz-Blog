<x-guest-layout>
    <!-- Tiêu đề & mô tả -->
    <div class="text-center mb-6 animate-fade-in-delayed">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
            {{ __('Xác minh địa chỉ Email của bạn') }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
            {{ __('Cảm ơn bạn đã đăng ký! Trước khi bắt đầu, vui lòng xác minh địa chỉ email của bạn bằng cách nhấp vào liên kết mà chúng tôi đã gửi qua email.') }}
            <br>
            {{ __('Nếu bạn chưa nhận được email, bạn có thể yêu cầu gửi lại bên dưới.') }}
        </p>
    </div>

    <!-- Thông báo trạng thái -->
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/30 border border-green-300 dark:border-green-700 rounded-lg p-3 text-center shadow-sm">
            <i class="fas fa-check-circle mr-2"></i>
            {{ __('Liên kết xác minh mới đã được gửi đến email bạn đã đăng ký.') }}
        </div>
    @endif

    <!-- Hành động -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-3 mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
        <!-- Nút gửi lại email -->
        <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
            @csrf
            <x-primary-button
                class="w-full sm:w-auto justify-center bg-gradient-to-r from-indigo-600 to-purple-600 
                       hover:from-indigo-700 hover:to-purple-700 text-white font-medium 
                       py-2 px-4 md:py-2.5 md:px-5 rounded-md md:rounded-lg 
                       shadow-md hover:shadow-lg transform transition-all duration-300 ease-in-out 
                       hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:focus:ring-purple-300 
                       flex items-center text-xs md:text-sm">
                <i class="fas fa-paper-plane mr-2"></i>
                {{ __('Gửi lại Email xác minh') }}
            </x-primary-button>
        </form>

        <!-- Nút đăng xuất -->
        <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
            @csrf
            <button type="submit"
                class="w-full sm:w-auto text-xs md:text-sm text-gray-600 dark:text-gray-400 
                       hover:text-gray-900 dark:hover:text-gray-100 underline underline-offset-2 
                       transition-colors duration-200 py-2 px-3 rounded-md focus:outline-none 
                       focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 
                       flex items-center justify-center gap-2">
                {{ __('Đăng xuất') }}
            </button>
        </form>
    </div>

    <style>
        @keyframes fade-in-delayed {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-delayed {
            animation: fade-in-delayed 0.8s ease-out 0.2s both;
        }
    </style>
</x-guest-layout>
