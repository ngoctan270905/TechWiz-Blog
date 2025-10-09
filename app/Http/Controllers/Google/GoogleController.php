<?php

namespace App\Http\Controllers\Google;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str; // Thêm thư viện này
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class GoogleController extends Controller
{
    // Bước 1: Chuyển hướng đến Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Bước 2: Google callback trả về
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $email = $googleUser->getEmail();
            $googleId = $googleUser->getId();

            // 1. Tìm người dùng dựa trên EMAIL để xử lý LIÊN KẾT TÀI KHOẢN
            $user = User::where('email', $email)->first();

            if ($user) {
                // Đã tồn tại: liên kết google_id nếu chưa có
                $user->google_id = $googleId;

                // Cập nhật ảnh đại diện nếu chưa có
                if (is_null($user->profile_photo_path)) {
                    $user->profile_photo_path = $googleUser->getAvatar();
                }

                // Xác minh email nếu chưa xác minh
                if (is_null($user->email_verified_at)) {
                    $user->email_verified_at = now();
                }

                $user->save();
            } else {
                // Tạo người dùng mới
                $user = User::create([
                    'google_id' => $googleId,
                    'name' => $googleUser->getName(),
                    'email' => $email,
                    'email_verified_at' => now(),
                    'profile_photo_path' => $googleUser->getAvatar(),
                    'role' => 'user', // Mặc định user
                    'password' => Hash::make(Str::random(16)),
                ]);
            }

            Auth::login($user);

            // ⚙️ Logic điều hướng theo role
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended(route('home'));
        } catch (\Exception $e) {
            \Log::error('Google login failed: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Đăng nhập Google thất bại! Vui lòng thử lại.');
        }
    }
}
