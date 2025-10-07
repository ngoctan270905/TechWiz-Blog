<x-guest-layout>
    <!-- Tiêu đề & mô tả -->
    <div class="text-center mb-6 animate-fade-in-delayed">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
            {{ __('Xác nhận mật khẩu') }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
            {{ __('Đây là khu vực bảo mật của hệ thống. Vui lòng nhập lại mật khẩu của bạn để tiếp tục.') }}
        </p>
    </div>

    <!-- Form xác nhận mật khẩu -->
    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        <!-- Mật khẩu -->
        <div>
            <x-input-label for="password"
                class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <i class="fas fa-lock mr-2 text-indigo-500"></i>
                {{ __('Mật khẩu') }}
            </x-input-label>

            <div class="relative">
                <x-text-input id="password"
                    class="block mt-1 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl 
                           bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm 
                           placeholder-gray-500 dark:placeholder-gray-400 
                           focus:ring-2 focus:ring-indigo-500 focus:border-transparent 
                           transition-all duration-300 ease-in-out shadow-sm hover:shadow-md"
                    type="password" name="password" required autocomplete="current-password"
                    placeholder="{{ __('Nhập mật khẩu của bạn') }}" />

                <!-- Icon con mắt -->
                <button type="button" onclick="togglePasswordVisibility()"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-indigo-500">
                    <i id="togglePasswordIcon" class="fas fa-eye text-sm"></i>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

        <!-- Nút xác nhận (phiên bản nhỏ gọn) -->
        <div class="flex justify-end mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            <x-primary-button
                class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 
               text-white font-medium py-1.5 px-4 rounded-md shadow-sm hover:shadow-md 
               transform transition-all duration-300 ease-in-out 
               hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300 
               dark:focus:ring-purple-300 flex items-center text-xs md:text-sm">
                <i class="fas fa-check-circle mr-1 text-xs"></i>
                {{ __('Xác nhận') }}
            </x-primary-button>
        </div>

    </form>

    <!-- Script con mắt -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('togglePasswordIcon');
            const isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';
            icon.classList.toggle('fa-eye', !isHidden);
            icon.classList.toggle('fa-eye-slash', isHidden);
        }
    </script>

    <!-- Hiệu ứng fade-in -->
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
