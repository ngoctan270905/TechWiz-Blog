<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * Dùng để đăng ký các service bindings và tác vụ khởi động ứng dụng.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Đăng ký service container bindings.
     */
    public function register(): void
    {
        //
    }

    /**
     * Thực hiện các tác vụ khởi động ứng dụng.
     */
    public function boot(): void
    {
        //
        // Không đăng ký Event hoặc Listener ở đây nữa.
    }
}
