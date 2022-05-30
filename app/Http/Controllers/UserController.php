<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register()
    {
        return view('user.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'companyName' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users|unique:companies',
            'password' => 'required|confirmed'
        ]);

        $company = Company::create([
            'name' => $request->companyName,
            'email' => $request->email,
        ]);

        $companyId = Company::where('email', $request->email)->value('id');

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'company_id' => $companyId,
            'user_status' => 'owner',
            'position' => 'owner',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('requests.index', Auth::user()->company_id);
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('requests.index', Auth::user()->company_id);
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
