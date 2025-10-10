<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use App\Events\NewUserRegisteredEvent;
use Illuminate\Auth\Events\Registered;

use App\Listeners\SendWelcomeNotification;
use App\Listeners\NotifyAdminOfNewRegistration;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Đăng ký các Event và Listener.
     *
     * Khi event được kích hoạt, Laravel sẽ tự động gọi listener tương ứng.
     */
    protected $listen = [
        // Khi người dùng đăng nhập
        Login::class => [
            SendWelcomeNotification::class,
        ],

        // Khi người dùng đăng ký tài khoản mới
        NewUserRegisteredEvent::class => [
            NotifyAdminOfNewRegistration::class,
        ],
    ];

    /**
     * Bootstrap mọi event cho ứng dụng.
     */
    public function boot(): void
    {
        parent::boot();
        // Không cần Event::listen() thủ công ở đây nữa.
    }
}
