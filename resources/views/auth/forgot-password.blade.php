<x-guest-layout>
    <!-- Tiêu đề & mô tả -->
    <div class="text-center mb-6 animate-fade-in-delayed px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-2">
            {{ __('Quên mật khẩu?') }}
        </h2>
        <p class="text-sm md:text-base text-gray-600 dark:text-gray-400 leading-relaxed">
            {{ __('Không sao cả! Hãy nhập địa chỉ email của bạn để nhận liên kết đặt lại mật khẩu.') }}
        </p>
    </div>

    <!-- Thông báo trạng thái -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form khôi phục mật khẩu -->
    <form method="POST" action="{{ route('password.email') }}" class="space-y-6 px-4 sm:px-0">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email"
                class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                {{ __('Địa chỉ Email') }}
            </x-input-label>

            <x-text-input id="email"
                class="block w-full px-3 py-2 md:px-4 md:py-3 border border-gray-300 dark:border-gray-600 rounded-lg md:rounded-xl 
                       bg-white/70 dark:bg-gray-700/50 backdrop-blur-sm placeholder-gray-500 dark:placeholder-gray-400 
                       focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 ease-in-out 
                       shadow-sm hover:shadow-md text-sm md:text-base"
                type="email" name="email" :value="old('email')" autofocus
                placeholder="{{ __('Nhập email của bạn') }}" />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

        <!-- Nút gửi -->
        <div
            class="flex flex-col sm:flex-row items-center justify-between gap-3 mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('login') }}"
                class="text-xs sm:text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 
              transition-colors duration-200 underline underline-offset-2 flex items-center">
                {{ __('Quay lại') }}
            </a>

            <x-primary-button
                class="w-full sm:w-auto justify-center bg-gradient-to-r from-indigo-600 to-purple-600 
               hover:from-indigo-700 hover:to-purple-700 text-white font-medium 
               py-2 sm:py-2.5 px-4 sm:px-5 rounded-lg 
               shadow-md hover:shadow-lg transform transition-all duration-300 ease-in-out 
               hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:focus:ring-purple-300 
               flex items-center text-xs sm:text-sm">
                <i class="fas fa-paper-plane mr-2 text-[10px] sm:text-xs"></i>
                {{ __('Gửi liên kết đặt lại mật khẩu') }}
            </x-primary-button>
        </div>

    </form>

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
