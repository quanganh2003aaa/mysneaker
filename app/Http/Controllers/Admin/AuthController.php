<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Http\Requests\Admin\Auth\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use \Hash;

class AuthController extends Controller
{
    public function getLogin(){
        return view('Admin.login');
    }

    public function postLogin(LoginRequest $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('admin.home')->with('success','Đăng nhập thành công');
        }
        else{
            return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function getRegister(){
        return view('Admin.register');
    }

    public function postRegister(RegisterRequest $request){
        $user = $request->only('name', 'email');
        $user['password']=Hash::make($request->password);
        User::create($user);
        return redirect()->route('get.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('get.login')->with('success','Đăng xuất thành công');
    }

    public function profile() {
        return view('Admin.profile');
    }

    public function updateProfile(ProfileRequest $request) {
        // dd($request->all());
        $data = $request->only('name', 'avatar');
        $data['updated_at'] = now();

        if(Auth::user()->update($data)){
            return redirect()->route('admin.profile')->with('success','Thay đổi profile thành công');
        }
        return redirect()->back()->with('error','Thay đổi profile thất bại');
    }


}
