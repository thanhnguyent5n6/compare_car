<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\User;
use Session;
class AdminController extends Controller
{
    //
    public function getIndex()
    {
        return view('server.index');
    }
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $req)
    {
        $email = $req->email;
        $password = $req->password;
        $credentials = array('email'=>$email,'password'=>$password);

        $check = User::all();

        foreach($check as $value)
        {
            
            if($value->email == $credentials['email'])
            {
                if(Hash::check($credentials['password'],$value->password))
                {
                    session()->put('user',$value);
                    return redirect()->route('admin.index');
                }
                else
                {
                    session()->flash('errors','Sai mật khẩu');
                    return redirect()->back();
                }
            }
            else
            {
                session()->flash('errors_tk','Sai tài khoản');
                return redirect()->back();
            }
        }
    }
    public function getLogout()
    {
        session()->forget('user');
        return redirect()->route('admin.get.login');
    }
}
