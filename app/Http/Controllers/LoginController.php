<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function registrar(){
        return view('login.registrar');
    }

    public function auth(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'O E-mail é obrigatório',
            'password.required' => 'A Senha é obrigatório'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('venda');
        }
        else{
            return redirect()->back()->with('danger','Email ou senha incorretos');
        }
    }

    public function store(Request $request)
    {
        $property = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        DB::table('users')->insert($property);
        return redirect()->route('venda');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}