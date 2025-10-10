<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;


class NewUserRegistered extends Notification
{
    use Queueable;

    public $newUser;

    public function __construct($newUser)
    {
        $this->newUser = $newUser;
    }

    /**
     * Chỉ lưu notification vào database.
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Cấu trúc dữ liệu lưu trong bảng `notifications`.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => 'new_user_registered',
            'message' => 'Người dùng mới ' . $this->newUser->name . ' vừa đăng ký tài khoản.',
            'user_id' => $this->newUser->id,
            'user_email' => $this->newUser->email,
            // 'link' => route('admin.users.show', $this->newUser->id ?? 0), // tuỳ bạn đổi route
        ];
    }
}
