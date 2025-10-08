<x-guest-layout>
    <div class="text-center mb-6 animate-fade-in-delayed">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
            {{ __('Chào mừng trở lại với TechWiz Blog!') }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Đăng nhập để chia sẻ bài viết, khám phá xu hướng công nghệ và kết nối cộng đồng lập trình viên.') }}
        </p>
    </div>

    <!-- Thông báo trạng thái -->
    <x-auth-session-status class="mb-4 text-center text-green-600 dark:text-green-400 font-medium" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email"
                class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                {{ __('Email đăng nhập') }}
            </x-input-label>
            <x-text-input id="email"
                class="block mt-1 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl 
                bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm placeholder-gray-500 dark:placeholder-gray-400 
                focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 ease-in-out 
                shadow-sm hover:shadow-md"
                type="email" name="email" :value="old('email')" autofocus autocomplete="username"
                placeholder="{{ __('Nhập email của bạn') }}" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

        <!-- Mật khẩu -->
        <div class="relative">
            <x-input-label for="password"
                class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <i class="fas fa-lock mr-2 text-indigo-500"></i>
                {{ __('Mật khẩu') }}
            </x-input-label>
            <input id="password"
                class="block mt-1 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl 
                bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm placeholder-gray-500 dark:placeholder-gray-400 
                focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 ease-in-out 
                shadow-sm hover:shadow-md"
                type="password" name="password" autocomplete="current-password"
                placeholder="{{ __('Nhập mật khẩu của bạn') }}" />
            <!-- Nút ẩn/hiện mật khẩu -->
            <button type="button" id="togglePassword"
                class="absolute right-4 top-[38px] text-gray-500 hover:text-indigo-500 transition-colors duration-200">
                <i class="fas fa-eye"></i>
            </button>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

        <!-- Ghi nhớ -->
        <div class="flex items-center justify-between mt-2">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 
                    focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ghi nhớ đăng nhập') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 transition-colors duration-200 underline decoration-1 underline-offset-2">
                    {{ __('Quên mật khẩu?') }}
                </a>
            @endif
        </div>

        <!-- Nút đăng nhập -->
        <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-700 dark:text-gray-300">
                {{ __('Chưa có tài khoản?') }}
                <a href="{{ route('register') }}"
                    class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 transition-colors duration-200 underline decoration-1 underline-offset-2">
                    {{ __('Đăng ký ngay') }}
                </a>
            </p>

            <x-primary-button
                class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 
                text-white font-medium py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform transition-all 
                duration-300 ease-in-out hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300 
                dark:focus:ring-purple-300 flex items-center">
                <i class="fas fa-sign-in-alt mr-2"></i>
                {{ __('Đăng nhập') }}
            </x-primary-button>
        </div>

        <!-- Đăng nhập bằng Google -->
        <div class="text-center mt-6">
            <div class="flex items-center my-6">
                <div class="flex-grow border-t border-gray-300 dark:border-gray-700"></div>
                <span class="mx-3 text-gray-500 dark:text-gray-400 text-sm">hoặc</span>
                <div class="flex-grow border-t border-gray-300 dark:border-gray-700"></div>
            </div>

            <a href="{{ route('google.redirect') }}"
                class="inline-flex items-center justify-center w-full bg-white dark:bg-gray-800 border border-gray-300 
                dark:border-gray-600 rounded-xl py-3 px-4 text-gray-700 dark:text-gray-200 font-medium shadow-sm 
                hover:shadow-md hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5 mr-2">
                {{ __('Đăng nhập bằng Google') }}
            </a>
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

    <script>
        // Toggle hiển thị mật khẩu
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePassword.innerHTML = type === 'password' ?
                '<i class="fas fa-eye"></i>' :
                '<i class="fas fa-eye-slash"></i>';
        });
    </script>
</x-guest-layout>
