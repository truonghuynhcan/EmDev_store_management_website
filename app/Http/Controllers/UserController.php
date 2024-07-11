<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function login(){

    //     return view('page.login');
    // }
    function login(){
        return view('page.login');
    }
    function login_(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'password.required' => 'Vui lòng nhập password'
        ]);
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->witherrors('Sai email hoặc password');
        }
    }
    function register()
    {
        return view('page.register');
        
    }
    function register_(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'repeatPassword' => 'required|same:password|min:6'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.unique' => 'Email đã được đăng kí',
            'password.required' => 'Vui lòng nhập password',
            'repeatPassword.required' => 'Vui lòng nhập lại password',
            'repeatPassword.same' => 'Nhập lại mật khẩu không khớp'
        ]);
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();
        // $user = User::insert([
        //     'name' => $req->name,
        //     'email' => $req->email,
        //     'password' => bcrypt($req->password),
        // ]);
        Auth::login($user);
        return redirect()->route('home');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
