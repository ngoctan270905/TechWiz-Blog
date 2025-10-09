<?php

namespace App\Listeners;

// Khai báo sử dụng các Class/Interface cần thiết từ Laravel và ứng dụng
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserLoggedIn;        // Event Real-time
use App\Notifications\WelcomeUser;  // Notification Database
use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 * Class SendWelcomeNotification
 * Listener này lắng nghe Event 'Illuminate\Auth\Events\Login'
 * và thực hiện các hành động chào mừng sau khi người dùng đăng nhập thành công.
 */
class SendWelcomeNotification
{
    /**
     * Phương thức 'handle' là nơi chứa logic xử lý khi Event 'Login' được kích hoạt.
     *
     * @param Login $event Object chứa thông tin Event, bao gồm thuộc tính 'user'.
     * @return void
     */
    public function handle(Login $event): void
    {
        // Lấy đối tượng user từ Event
        $rawUser = $event->user;

        // Kiểm tra tính hợp lệ của đối tượng User
        if (!$rawUser instanceof User) {
            // Log cảnh báo được giữ lại để phát hiện lỗi nghiêm trọng trong môi trường Production
            Log::warning('SendWelcomeNotification: user is not App\\Models\\User', [
                'actual_class' => is_object($rawUser) ? get_class($rawUser) : gettype($rawUser),
            ]);
            return;
        }
        
        $user = $rawUser;
        
        // --- Logic Chặn trùng lặp cho Database Notification ---
        
        // Kiểm tra xem Database Notification loại 'WelcomeUser' đã tồn tại 
        // và được tạo trong vòng 1 phút gần nhất hay chưa
        $hasRecentWelcome = $user->notifications()
            ->where('type', WelcomeUser::class)
            ->where('created_at', '>=', now()->subMinute())
            ->exists();

        if (!$hasRecentWelcome) {
            // 1. Gửi Database Notification (chỉ một lần)
            $user->notify(new WelcomeUser());
        }

        // --- Logic Gửi Real-time Event ---

        // 2. Gửi Real-time Broadcast (hiển thị ngay lập tức)
        event(new UserLoggedIn($user));
    }
}