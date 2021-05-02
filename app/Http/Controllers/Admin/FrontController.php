<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class FrontController extends Controller
{
    public function index()
    {
        $users = session('data_login');
        return view('admin.index', [
            'users' => $users
        ]);
    }

    public function login()
    {
        return view('login');
    }
    
    public function register()
    {
        return view('register');
    }
}
