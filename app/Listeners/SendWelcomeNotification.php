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
        $user = $event->user;

        // Kiểm tra tính hợp lệ của đối tượng User. Nếu không phải, dừng xử lý.
        if (!$user instanceof User) {
            // Có thể giữ lại Log::warning nếu đây là mã nguồn quan trọng: Log::warning('...');
            return;
        }

        // --- Logic Gửi Database Notification (Chỉ 1 lần duy nhất) ---

        // Kiểm tra xem Database Notification loại 'WelcomeUser' đã TỪNG tồn tại cho tài khoản này chưa
        $hasWelcomeNotificationEver = $user->notifications()
            ->where('type', WelcomeUser::class)
            ->exists();

        // Nếu CHƯA TỪNG có thông báo chào mừng
        if (!$hasWelcomeNotificationEver) {
            // 1. Gửi Database Notification (chỉ tạo thông báo chào mừng LẦN ĐẦU)
            $user->notify(new WelcomeUser());
        }

        // --- Logic Gửi Real-time Event (Vẫn gửi mỗi lần đăng nhập) ---

        // 2. Gửi Real-time Broadcast (hiển thị ngay lập tức)
        event(new UserLoggedIn($user));
    }
}
