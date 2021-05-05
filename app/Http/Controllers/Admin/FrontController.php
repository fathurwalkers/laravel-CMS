<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Login;
use App\Models\Detail;

class FrontController extends Controller
{
    public function index()
    {
        $users = session('data_login');
        return view('admin.index', [
            'users' => $users
        ]);
    }

    // -------------------- USER MANAGEMENT -------------------- //
    public function getUserProfile(Login $id)
    {
        $users = session('data_login');
        return view('admin.users.profile', [
            'users' => $users
            ]);
    }

    public function getUserSettings(Login $id)
    {
        $users = session('data_login');
        return view('admin.users.settings', [
            'users' => $users
            ]);
    }

    // -------------------- FRONT PAGE BEFORE LOGIN DASHBOARD PANEL -------------------- //
    public function login()
    {
        return view('login');
    }
    
    public function register()
    {
        return view('register');
    }
}
