<?php

namespace App\Notifications;

// Khai báo sử dụng các Class/Interface cần thiết
use Illuminate\Bus\Queueable; // Trait để cho phép đưa Notification vào hàng đợi (Queue)
use Illuminate\Notifications\Notification; // Base class cho tất cả Notifications
use Illuminate\Contracts\Queue\ShouldQueue; // Interface để đánh dấu Notification có thể đưa vào Queue
use Illuminate\Notifications\Messages\DatabaseMessage; // Class mô tả cấu trúc cho Database Notification (Thường không cần import)
use Illuminate\Notifications\Messages\MailMessage; // Class mô tả cấu trúc cho Email (Không dùng trong ví dụ này, có thể xóa)

/**
 * Class WelcomeUser
 * Notification này được dùng để gửi thông báo chào mừng người dùng
 * và lưu trữ thông báo đó vào cơ sở dữ liệu (Database Notification).
 */
class WelcomeUser extends Notification
{
    use Queueable; // Sử dụng Queueable trait, cho phép Notification này được xử lý bất đồng bộ nếu cần

    /**
     * Xác định (các) kênh mà Notification sẽ được gửi qua.
     *
     * @param object $notifiable Đối tượng nhận thông báo (thường là instance của App\Models\User).
     * @return array Mảng các kênh, ví dụ: ['mail', 'database', 'broadcast'].
     */
    public function via(object $notifiable): array
    {
        // Notification này chỉ được gửi qua kênh 'database'.
        return ['database'];
    }

    /**
     * Lấy cấu trúc biểu diễn Notification cho kênh 'database'.
     *
     * @param object $notifiable Đối tượng nhận thông báo.
     * @return array Mảng dữ liệu sẽ được chuyển đổi thành JSON và lưu vào cột `data`.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            // Dữ liệu này sẽ được lưu vào cột `data` trong bảng `notifications`
            'message' => 'Chào mừng ' . $notifiable->name . ' đã đăng nhập vào hệ thống!',
            'type' => 'welcome',
            'link' => route('home'),
        ];
    }
}
