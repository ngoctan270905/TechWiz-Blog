<?php

namespace App\Events;

// #1. Khai báo sử dụng các Class/Interface cần thiết
use Illuminate\Broadcasting\PrivateChannel;     // Dùng để tạo kênh broadcast riêng tư (cần xác thực)
use Illuminate\Broadcasting\InteractsWithSockets; // Trait cho phép event giao tiếp với Socket (Websockets)
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow; // Interface quan trọng, đánh dấu Event này cần được broadcast ngay lập tức
use Illuminate\Foundation\Events\Dispatchable;  // Trait cho phép gọi Event bằng cú pháp Event::dispatch(new Event())
use Illuminate\Queue\SerializesModels;         // Trait để serialize (chuyển đổi) các Eloquent model khi đưa vào queue (hàng đợi)
use App\Models\User;                           // Model User

/**
 * Class UserLoggedIn
 * # MỤC ĐÍCH:
 * Đây là một Real-time Event được kích hoạt khi người dùng đăng nhập.
 * Nó thực hiện broadcast ngay lập tức (ShouldBroadcastNow) đến kênh riêng tư (Private Channel)
 * của chính người dùng đó, cho phép frontend nhận được thông báo ngay lập tức.
 */
class UserLoggedIn implements ShouldBroadcastNow
{
    // #2. Sử dụng các Traits
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Models\User $user 
     * Thông tin đối tượng User sẽ được truyền kèm theo Event.
     * Thuộc tính public sẽ tự động được gửi (broadcast) dưới dạng payload.
     */
    public $user; 

    /**
     * # CONSTRUCTOR
     * Khởi tạo Event.
     *
     * @param User $user Đối tượng User vừa đăng nhập.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * # KÊNH BROADCAST (broadcastOn)
     * Xác định (các) kênh mà Event này sẽ broadcast đến.
     *
     * @return array|\Illuminate\Broadcasting\Channel|\Illuminate\Broadcasting\Channel[]
     */
    public function broadcastOn(): PrivateChannel
    {
        // Trả về một Private Channel (Kênh Riêng Tư).
        // Tên kênh: 'notifications.' + ID của User. 
        // Ví dụ: 'notifications.123'
        // Chỉ User có ID 123 mới có quyền truy cập kênh này (cần authorization qua routes/channels.php).
        return new PrivateChannel('notifications.' . $this->user->id);
    }

    /**
     * # TÊN SỰ KIỆN KHI BROADCAST (broadcastAs)
     * Xác định tên tùy chỉnh của Event khi nó được gửi đến client (frontend).
     *
     * @return string
     */
    public function broadcastAs(): string
    {
        // Frontend (Laravel Echo) sẽ lắng nghe event với tên này trên kênh đã định nghĩa.
        // Ví dụ: Echo.private('notifications.123').listen('.user.logged-in', ...);
        return 'user.logged-in';
    }
}