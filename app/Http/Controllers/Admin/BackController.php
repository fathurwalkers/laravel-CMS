<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Login;
use Faker\Factory as Faker;
use Illuminate\Support\Arr as Randoms;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;

class BackController extends Controller
{
    public function postLogin(Request $request)
    {
        $data_login = Login::where('login_username', $request->login_username)->first();
        if ($data_login == null) {
            return redirect()->route('login-page')->with('fail_login', 'Username or Password was not Registered!');
        } else {
            $cek_password = Hash::check($request->login_password, $data_login['login_password']);
            if ($cek_password == true) {
                if ($request->remember_me !== null) {
                    $users = session(['data_login' => $data_login]);
                    Cookie::queue(Cookie::make('remember_me', $data_login, 60));
                    $users = session(['data_login' => $data_login]);
                    return redirect()->route('admin-index')->with('login_success', 'Anda telah Login!');
                } else {
                    $users = session(['data_login' => $data_login]);
                    return redirect()->route('admin-index')->with('login_success', 'Anda telah Login!');
                }
            } else {
                return redirect()->route('login-page')->with('fail_password', 'Password is incorect!');
            }
        }
    }

    public function postRegister(Request $request)
    {
        //
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Cookie::queue(Cookie::forget('remember_me'));
        return redirect()->route('login-page')->with('success_logout', 'Anda telah Logout!');
    }

    public function generateUser()
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 5; $i++) {
            $jeniskelamin               = ['L', 'P'];
            $detail                     = new Detail;
            $login                      = new Login;
            $saveDetail = $detail->create([
                'detail_nama'           => $faker->name,
                'detail_telepon'        => $faker->phoneNumber,
                'detail_alamat'         => $faker->address,
                'detail_jeniskelamin'   => Randoms::random($jeniskelamin),
                'created_at'            => now(),
                'updated_at'            => now()
            ]);
            $saveDetail->save();
            // --------------------------------------------------------------------------- //
            $username               = Str::random(5);
            $password               = Hash::make($username, [
                                            'rounds' => 12,
                                        ]);
            $email                  = strtolower($username);
            $email                 .= '@website.com';
            $level                  = ['guest', 'user'];
            $status                 = ['verified', 'unverified'];
            $token = Str::random(16);
            $saveLogin = $login->create([
                'login_username'    => $username,
                'login_password'    => $password,
                'login_email'       => $email,
                'login_token'       => $token,
                'login_level'       => Randoms::random($level),
                'login_status'      => Randoms::random($status),
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
            $saveLogin->detail()->associate($saveDetail->id);
            $saveLogin->save();
        }
        return redirect()->route('home-index')->with('generate_success', 'Generate Data Berhasil');
    }
}
