<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TechWiz') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Font Awesome 5.15.4 (Dùng cho icon) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" xintegrity="sha512-R5P+B2M/0hXn5pYp6F7s+9z8z0e7+Xv7t2t8Z7t+H5D7w9Lp4pG2u5f7/k5lP6t+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Load Tailwind CSS (Cần thiết cho môi trường Preview) -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-purple-50 via-blue-50 to-indigo-100 dark:from-gray-900 dark:via-gray-800 dark:to-slate-900 min-h-screen relative">
        
        <!-- Sparkle Background Effect Container -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div id="diamond-sparkles" class="w-full h-full"></div>
        </div>

        <!-- Cập nhật: Thêm 'justify-center' để căn giữa dọc trên MỌI kích thước màn hình (kể cả mobile) -->
        <!-- Thêm px-4 để đảm bảo khoảng đệm hai bên trên mobile -->
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8 relative z-10">
            <!-- Loại bỏ mt-6 để căn giữa hoàn toàn theo chiều dọc, giữ lại px-6 py-8 cho padding nội dung bên trong -->
            <div class="w-full sm:max-w-md px-6 py-8 bg-white/80 dark:bg-gray-800/80 backdrop-blur-md shadow-xl rounded-2xl border border-white/20 dark:border-gray-700/50 overflow-hidden transform transition-all duration-700 animate-slide-in">
                {{ $slot }}
            </div>
        </div>

        <style>
            /* * CSS cho Hiệu ứng Diamond Sparkle */
            
            /* Keyframes cho hiệu ứng nhấp nháy (twinkling) */
            @keyframes twinkle-diamond {
                0%, 100% { 
                    opacity: 0.2; 
                    transform: rotate(45deg) scale(0.6); 
                }
                50% { 
                    opacity: 1; 
                    transform: rotate(45deg) scale(1.2); 
                }
            }

            /* Keyframes cho hiệu ứng trôi nổi nhẹ (drift) */
            @keyframes drift {
                0% { transform: translate(0, 0); }
                100% { transform: translate(5vw, 5vh); }
            }

            /* Định nghĩa hình dáng Ngôi sao/Kim cương nhỏ */
            .sparkle-diamond {
                position: absolute;
                width: 2px;
                height: 2px;
                /* Màu trắng và phát sáng nhẹ cho nền tối */
                background-color: #ffffff; 
                box-shadow: 0 0 5px 1px rgba(255, 255, 255, 0.7); 
                
                /* Tự động xoay 45deg để tạo hình kim cương/star */
                transform: rotate(45deg); 
                will-change: transform, opacity;
            }

            /* Điều chỉnh màu sắc cho Chế độ Sáng (nếu không có class .dark) */
            .sparkle-diamond {
                background-color: #a855f7; /* Màu tím đậm hơn cho nền sáng */
                box-shadow: 0 0 4px 0.5px rgba(168, 85, 247, 0.6);
            }

            /* Slide-in Animation (Giữ lại từ code gốc) */
            @keyframes slide-in {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-slide-in {
                animation: slide-in 0.6s ease-out;
            }
        </style>

        <script>
            /**
             * JavaScript để tạo ra 120 điểm sáng ngẫu nhiên
             */
            document.addEventListener('DOMContentLoaded', () => {
                const sparkleContainer = document.getElementById('diamond-sparkles');
                const numSparkles = 120; // Số lượng điểm sáng

                for (let i = 0; i < numSparkles; i++) {
                    const dot = document.createElement('div');
                    dot.className = 'sparkle-diamond';

                    // Vị trí ngẫu nhiên trên toàn bộ viewport
                    const x = Math.random() * 100; // % viewport width
                    const y = Math.random() * 100; // % viewport height
                    
                    // Kích thước ngẫu nhiên (chỉ dùng để tạo sự khác biệt nhỏ)
                    const size = Math.random() * 1.5 + 1; // 1px - 2.5px

                    // Tùy chỉnh Animation ngẫu nhiên
                    const twinkleDuration = Math.random() * 3 + 1.5; // 1.5s - 4.5s
                    const driftDuration = Math.random() * 80 + 60; // 60s - 140s (trôi rất chậm)
                    const delay = Math.random() * 5; // Độ trễ animation 0s - 5s
                    
                    dot.style.left = `${x}vw`;
                    dot.style.top = `${y}vh`;
                    dot.style.width = `${size}px`;
                    dot.style.height = `${size}px`;
                    dot.style.animation = `
                        twinkle-diamond ${twinkleDuration}s infinite alternate ease-in-out ${delay}s, 
                        drift ${driftDuration}s infinite linear alternate
                    `;

                    sparkleContainer.appendChild(dot);
                }
            });
        </script>
    </body>
</html>
