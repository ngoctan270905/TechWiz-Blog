<?php

namespace App\Providers;

// #1. Khai báo sử dụng các Class/Interface cần thiết
use Illuminate\Auth\Events\Login;        // Event mặc định của Laravel: kích hoạt khi đăng nhập thành công
use Illuminate\Support\ServiceProvider;  // Class nền tảng cho tất cả các Service Provider
use Illuminate\Support\Facades\Event;    // Facade để tương tác với hệ thống Event/Listener của Laravel
use App\Listeners\SendWelcomeNotification; // Listener mà chúng ta muốn đăng ký

/**
 * Class AppServiceProvider
 * # GIỚI THIỆU:
 * Service Provider mặc định dùng để đăng ký các dịch vụ (services)
 * và thực hiện các tác vụ khởi động (bootstrap) cho ứng dụng.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * # PHƯƠNG THỨC REGISTER
     * Dùng để đăng ký các bindings vào Service Container (các Service/Interface).
     * KHÔNG nên gọi các Service khác ở đây.
     */
    public function register(): void
    {
        // Hiện tại không đăng ký service container bindings nào.
    }

    /**
     * # PHƯƠNG THỨC BOOT
     * Được gọi SAU KHI TẤT CẢ các Service Provider khác đã được đăng ký.
     * Đây là nơi lý tưởng để đăng ký: Views, Composers, Routes, và Events/Listeners.
     */
    public function boot(): void
    {
        // # ĐĂNG KÝ EVENT-LISTENER
        
        // Sử dụng Facade Event để liên kết một Event (sự kiện xảy ra) với một Listener (hành động xử lý).
        Event::listen(
            // Tham số 1 (EVENT): Sự kiện đang được lắng nghe.
            Login::class, 
            
            // Tham số 2 (LISTENER): Lớp và phương thức sẽ xử lý sự kiện.
            [SendWelcomeNotification::class, 'handle']
        );



        /*
        # LUỒNG XỬ LÝ (Tóm tắt):
        Khi người dùng đăng nhập thành công -> Event 'Login' được kích hoạt.
        -> Laravel gọi phương thức 'handle' trong Listener 'SendWelcomeNotification' để xử lý
           (gửi Notification và Real-time Event).
        */
    }
}