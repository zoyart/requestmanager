<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function store(StoreRegistrationRequest $request)
    {
        $company = Company::create([
            'name' => $request->companyName,
            'email' => $request->email,
        ]);

        $company_id = Company::where('email', $request->email)->value('id');

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'company_id' => $company_id,
            'user_status' => 'owner',
            'position' => 'owner',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $user->syncPermissions('Владелец');

        Auth::login($user);


        return redirect()->route('requests.index');
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function auth(StoreLoginRequest $request)
    {
        $rememberMe =  ($request->input('rememberMe') === "1") ? 1 : 0;

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $rememberMe)) {
            return redirect()->route('requests.index');
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
