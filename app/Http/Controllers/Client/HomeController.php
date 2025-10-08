<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Sau này có thể lấy bài viết nổi bật, danh mục, v.v.
        // $posts = Post::latest()->take(6)->get();

        return view('clients.home');
    }
}
