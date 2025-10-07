<x-guest-layout>
    <!-- Tiêu đề & mô tả -->
    <div class="text-center mb-6 animate-fade-in-delayed">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
            {{ __('Đặt lại mật khẩu') }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Nhập lại email và mật khẩu mới của bạn để khôi phục quyền truy cập.') }}
        </p>
    </div>

    <!-- Form đặt lại mật khẩu -->
    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
        @csrf

        <!-- Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div>
            <x-input-label for="email"
                class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                {{ __('Địa chỉ Email') }}
            </x-input-label>
            <x-text-input id="email"
                class="block mt-1 w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-xl 
                        bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm placeholder-gray-500 dark:placeholder-gray-400 
                        focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 ease-in-out 
                        shadow-sm hover:shadow-md text-sm"
                type="email" name="email" :value="old('email', $request->email)" autofocus autocomplete="username"
                placeholder="{{ __('Nhập email của bạn') }}" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

        <!-- Mật khẩu mới -->
        <div>
            <x-input-label for="password"
                class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <i class="fas fa-lock mr-2 text-indigo-500"></i>
                {{ __('Mật khẩu mới') }}
            </x-input-label>

            <div class="relative">
                <x-text-input id="password"
                    class="block mt-1 w-full px-4 py-2.5 **pr-10** border border-gray-300 dark:border-gray-600 rounded-xl 
                            bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm placeholder-gray-500 dark:placeholder-gray-400 
                            focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 ease-in-out 
                            shadow-sm hover:shadow-md text-sm"
                    type="password" name="password" autocomplete="new-password"
                    placeholder="{{ __('Nhập mật khẩu mới') }}" />
                <!-- Icon bật/tắt hiển thị -->
                <button type="button"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-500 dark:text-gray-400 hover:text-indigo-500"
                    onclick="togglePassword('password', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

        <!-- Xác nhận mật khẩu -->
        <div>
            <x-input-label for="password_confirmation"
                class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <i class="fas fa-shield-alt mr-2 text-indigo-500"></i>
                {{ __('Xác nhận mật khẩu') }}
            </x-input-label>

            <div class="relative">
                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full px-4 py-2.5 **pr-10** border border-gray-300 dark:border-gray-600 rounded-xl 
                            bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm placeholder-gray-500 dark:placeholder-gray-400 
                            focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 ease-in-out 
                            shadow-sm hover:shadow-md text-sm"
                    type="password" name="password_confirmation" autocomplete="new-password"
                    placeholder="{{ __('Nhập lại mật khẩu mới') }}" />
                <!-- Icon bật/tắt hiển thị -->
                <button type="button"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-500 dark:text-gray-400 hover:text-indigo-500"
                    onclick="togglePassword('password_confirmation', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

        <!-- Nút gửi -->
        <div
            class="flex flex-col sm:flex-row items-center justify-between gap-3 mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('login') }}"
                class="text-xs sm:text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 
                       transition-colors duration-200 underline underline-offset-2 flex items-center">
                {{ __('Quay lại đăng nhập') }}
            </a>

            <x-primary-button
                class="w-full sm:w-auto justify-center bg-gradient-to-r from-indigo-600 to-purple-600 
                        hover:from-indigo-700 hover:to-purple-700 text-white font-medium 
                        py-2 sm:py-2.5 px-4 sm:px-5 rounded-lg 
                        shadow-md hover:shadow-lg transform transition-all duration-300 ease-in-out 
                        hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:focus:ring-purple-300 
                        flex items-center text-xs sm:text-sm">
                <i class="fas fa-sync-alt mr-2 text-[10px] sm:text-xs"></i>
                {{ __('Đặt lại mật khẩu') }}
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

<script>
    function togglePassword(id, el) {
        const input = document.getElementById(id);
        const icon = el.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            // Thay icon: từ mắt mở (fa-eye) sang mắt đóng (fa-eye-slash)
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            // Thay icon: từ mắt đóng (fa-eye-slash) sang mắt mở (fa-eye)
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
