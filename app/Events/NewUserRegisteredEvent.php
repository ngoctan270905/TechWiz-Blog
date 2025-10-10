<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Event được bắn ra khi có người dùng mới đăng ký.
 * Nó sẽ broadcast ngay lập tức đến kênh "admin.notifications"
 * để admin nhận được thông báo real-time.
 */
class NewUserRegisteredEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var User */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function broadcastOn(): PrivateChannel
    {
        // Tất cả admin đều có thể join kênh này
        return new PrivateChannel('admin.notifications');
    }

    public function broadcastAs(): string
    {
        return 'user.registered';
    }

}
