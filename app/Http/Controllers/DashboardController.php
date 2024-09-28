<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model

class DashboardController extends Controller
{
    public function index()
    {
        // Count the number of users
        $newMembersCount = User::count();

        // Pass the count to the view
        return view('admin.dashboard', compact('newMembersCount'));
    }
}
