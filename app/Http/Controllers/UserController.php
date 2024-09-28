<?php

namespace App\Http\Controllers;

use App\Models\User; // Đảm bảo đã import model User
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserCount()
    {
        $userCount = User::count(); // Đếm số lượng người dùng
        return response()->json($userCount); // Trả về số lượng dưới dạng JSON
    }
}

