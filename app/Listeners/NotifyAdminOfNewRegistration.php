<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Events\NewUserRegisteredEvent;  //  Event realtime để broadcast
use App\Notifications\NewUserRegistered; //  Notification gửi cho admin
// use Illuminate\Auth\Events\Registered; //  Event mặc định khi người dùng đăng ký


/**
 * Class NotifyAdminOfNewRegistration
 *
 * Listener này lắng nghe event 'Illuminate\Auth\Events\Registered'
 * và thực hiện các hành động sau khi có người dùng mới đăng ký:
 * - Gửi thông báo DB tới admin
 * - Gửi realtime event cho admin dashboard (qua broadcasting)
 */
class NotifyAdminOfNewRegistration
{
    /**
     * Xử lý logic khi event 'Registered' được kích hoạt.
     *
     * @param Registered $event
     * @return void
     */
    public function handle(NewUserRegisteredEvent $event): void
    {
        Log::info('New user registered event triggered.');


        // 1️⃣ Lấy thông tin user mới đăng ký
        $newUser = $event->user;

        // 2️⃣ Lấy danh sách admin
        $admins = User::where('role', 'admin')->get();

        if ($admins->isEmpty()) {
            return; // Không có admin để gửi
        }

        // 3️⃣ Gửi thông báo đến admin (lưu vào database)
        Notification::send($admins, new NewUserRegistered($newUser));

        // // 4️⃣ Gửi realtime event để cập nhật UI admin ngay lập tức
        // event(new NewUserRegisteredEvent($newUser));

        Log::info('Admin notified of new user registration: ' . $newUser->email);
    }
}
