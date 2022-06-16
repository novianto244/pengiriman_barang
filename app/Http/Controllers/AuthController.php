<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            $bulan = date('m');
            $tahun = date('Y');
            return redirect()->route('dashboard-'.$bulan.','.$tahun);
        }
        return view('login');
    }
 
    public function login(Request $request)
    {
        $rules = [
            'username'              => 'required|string',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'username.required'        => 'Username is required',
            'username.string'           => 'Username must be a string',
            'password.required'     => 'Password is required',
            'password.string'       => 'password must be a string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $username = $request->input('username');
        $password = md5($request->input('password'));

        $sqlQuery = "SELECT * FROM drc.t_user WHERE username='".$username."' AND password='".$password."'";
        $search = getOne($sqlQuery);
 
        if($search){
            // Clear Session
            $request->session()->flush();

            // Input to session
            $request->session()->push('login', ['username'=>$search['username'], 'div_user'=>$search['div_user']]);

            // Create Log
            create_log('LOGIN', 'SELECT', $sqlQuery, $search['username']);

            return redirect('dashboard-'.'dashboard,'.$search['NIK']);
        }else{
            Session::flash('error', 'Username atau password salah');
            return redirect()->route('login');
        }
    }
 
    public function showFormRegister()
    {
        return view('register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'username'              => 'required|string',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'username.required'     => 'Username wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $username = strtolower($request->username);
        $password = md5($request->password);

        User::updateOrCreate(
            ['username'=>$username],
            [
                'password'=>$password,
                'user_created_date'=>now(),
                'div_user'=>'IT'
            ]);

            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
    }
     
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

}