<x-guest-layout>
    <div class="text-center mb-6 animate-fade-in-delayed">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
            {{ __('Chào mừng bạn đến với TechWiz Blog!') }}
        </h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Đăng ký để khám phá những bài viết công nghệ đỉnh cao, chia sẻ kiến thức và kết nối cộng đồng lập trình viên.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Tên -->
        <div>
            <x-input-label for="name"
                class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                {{-- Icon Tên (User) --}}
                <i class="fas fa-user mr-2 text-indigo-500"></i>
                {{ __('Tên người dùng') }}
            </x-input-label>
            <x-text-input id="name"
                class="block mt-1 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 ease-in-out shadow-sm hover:shadow-md"
                type="text" name="name" :value="old('name')" autofocus autocomplete="name"
                placeholder="{{ __('Nhập tên của bạn') }}" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email"
                class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                {{-- Icon Email (Envelope) --}}
                <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                {{ __('Email') }}
            </x-input-label>
            <x-text-input id="email"
                class="block mt-1 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 ease-in-out shadow-sm hover:shadow-md"
                type="email" name="email" :value="old('email')" autocomplete="username"
                placeholder="{{ __('Nhập email của bạn') }}" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
        </div>

       <!-- Mật khẩu -->
<div>
    <x-input-label for="password"
        class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center">
        <i class="fas fa-lock mr-2 text-indigo-500"></i>
        {{ __('Mật khẩu') }}
    </x-input-label>

    <div class="relative">
        <x-text-input id="password"
            class="block mt-1 w-full px-4 py-3 pr-10 border border-gray-300 dark:border-gray-600 rounded-xl 
                   bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm placeholder-gray-500 dark:placeholder-gray-400 
                   focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 ease-in-out 
                   shadow-sm hover:shadow-md"
            type="password" name="password" autocomplete="new-password"
            placeholder="{{ __('Nhập mật khẩu của bạn') }}" />

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
            class="block mt-1 w-full px-4 py-3 pr-10 border border-gray-300 dark:border-gray-600 rounded-xl 
                   bg-white/50 dark:bg-gray-700/50 backdrop-blur-sm placeholder-gray-500 dark:placeholder-gray-400 
                   focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 ease-in-out 
                   shadow-sm hover:shadow-md"
            type="password" name="password_confirmation" autocomplete="new-password"
            placeholder="{{ __('Xác nhận lại mật khẩu của bạn') }}" />

        <!-- Icon bật/tắt hiển thị -->
        <button type="button" 
                class="absolute inset-y-0 right-3 flex items-center text-gray-500 dark:text-gray-400 hover:text-indigo-500"
                onclick="togglePassword('password_confirmation', this)">
            <i class="fas fa-eye"></i>
        </button>
    </div>

    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
</div>


        <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            {{-- Đã có tài khoản? --}}
            <p class="text-sm text-gray-700 dark:text-gray-300">
                Đã có tài khoản?
                <a href="{{ route('login') }}"
                    class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 transition-colors duration-200 underline decoration-1 underline-offset-2">
                    Đăng nhập ngay
                </a>
            </p>

            {{-- Nút Đăng ký --}}
            <x-primary-button
                class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-300 ease-in-out hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:focus:ring-purple-300 flex items-center">
                {{-- Icon Đăng ký (User Plus) --}}
                <i class="fas fa-user-plus mr-2"></i>
                {{ __('Đăng ký') }}
            </x-primary-button>
        </div>

    </form>

    <style>
        /* Delayed fade-in cho phần giới thiệu */
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
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

