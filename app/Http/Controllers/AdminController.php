<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{   
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Here you can add specific logic for the admin dashboard
        // For example, fetching statistics, user lists, or other administrative actions
        
        // Example: Fetching user list
        $users = User::where('role', '!=', 'admin')->get(); // Fetch all users except admin
        
        // Then pass the data to the dashboard view
        return view('admin.dashboard', compact('users'));
    }
}
