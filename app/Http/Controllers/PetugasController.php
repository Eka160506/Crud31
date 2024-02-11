<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PetugasController extends Controller
{
    /**
     * Display the petugas dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Here you can add specific logic for the petugas dashboard
        // For example, fetching statistics data, user lists, or other administrative actions

        // Example: Get user list
        $users = User::where('role', '!=', 'petugas')->get(); // Get all users except petugas

        // Then send data to the dashboard view
        return view('petugas.dashboard', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('petugas.create_user');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate user input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:user,petugas,admin'
        ]);

        // Save the user to the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        return redirect()->back()->with('success', 'User successfully created.');
    }

    /**
     * Show all users grouped by role.
     *
     * @return \Illuminate\View\View
     */
    public function showRoles()
    {
        // Get all user roles from the database
        $usersByRole = User::all()->groupBy('role');

        return view('petugas.view_user', compact('usersByRole'));
    }
}
