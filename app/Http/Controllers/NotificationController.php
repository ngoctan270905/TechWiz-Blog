<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
  /**
   * Đánh dấu tất cả thông báo chưa đọc thành đã đọc
   */
  public function markAllAsRead(Request $request)
  {
    $user = Auth::user();

    DatabaseNotification::where('notifiable_id', $user->id)
      ->where('notifiable_type', get_class($user))
      ->whereNull('read_at')
      ->update(['read_at' => now()]);

    return response()->json(['unread' => 0]);
  }
}
