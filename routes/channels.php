<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcasting Authorization Routes
|--------------------------------------------------------------------------
|
| Dòng dưới đây đăng ký endpoint '/broadcasting/auth' và áp dụng middleware
| xác thực. Hãy chọn middleware phù hợp với ứng dụng của bạn:
| - 'auth:web': Phổ biến nhất cho ứng dụng web sử dụng session.
| - 'auth:sanctum': Nếu bạn sử dụng Laravel Sanctum.
|
*/
Broadcast::routes(['middleware' => ['web', 'auth']]); // Đảm bảo có 'web' để session hoạt động

/*
|--------------------------------------------------------------------------
| Channel Authorization
|--------------------------------------------------------------------------
|
| Định nghĩa logic ủy quyền cho các kênh private và presence.
|
*/
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    // Logic này đảm bảo chỉ người dùng sở hữu ID đó mới có thể nghe kênh.
    return (int) $user->id === (int) $id;
});

Broadcast::channel('notifications.{userId}', function ($user, $userId) {
    // Chỉ cho phép người dùng có ID khớp với userId được tham gia kênh này
    return (int) $user->id === (int) $userId; 
});
// routes/channels.php
Broadcast::channel('admin.notifications', function ($user) {
    return $user->role === 'admin';
});

