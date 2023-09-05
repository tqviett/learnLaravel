<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('admin.users.login',['title'=>'Đăng nhập']);
    }
    public function login(Request $request){
        //dd($request->input());
        $this->validate($request,
        [
            'email'=>'required|email:filter',
            'password'=> 'required',
        ]);
        if(Auth::attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ])){
            return redirect()->route('admin');
        }
        Session()->flash('error','Sai tên đăng nhập hoặc mật khẩu');
        return redirect()->back();
    }
}
