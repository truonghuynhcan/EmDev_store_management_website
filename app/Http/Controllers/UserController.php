<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id','name','email')->get();
        return view('page.user', compact('users'));
    }
    function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.unique' => 'Email đã được đăng kí',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Vui lòng nhập mật khẩu ít nhất 6 ký tự',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user')->with('success', 'Thêm tài khoản thành công');
    }
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('page.edituser', compact('user'));
    }
    function update(Request $request,$id)
    {
        
        $user = User::findorfail($id);
        $request->validate([
            'name' => 'required',
            'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore($user->id),
        ],
            'password' => 'nullable|min:6',
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.unique' => 'Email đã được đăng kí',
            'password.min' => 'Vui lòng nhập mật khẩu ít nhất 6 ký tự',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('user')->with('success', 'Sửa tài khoản thành công');
    }
    public function delete($id)
    {
        $user = User::findorfail($id);
        $user->delete();
        return redirect()->route('user')->with('success', 'Xoá tài khoản thành công');
    }
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
