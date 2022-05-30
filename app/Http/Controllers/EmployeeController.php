<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)
    {

        $data = User::where('company_id', $company_id)->where('user_status', 'employee')->get();

        return view('account.employees', compact('data', 'company_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $company_id)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'position' => 'required',
            'email' => 'required|email|unique:users|unique:companies',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'company_id' => $company_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'user_status' => 'employee',
            'position' => $request->position,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employees.index', compact('company_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company_id, $id)
    {
        $data = User::where('id', $id)->get();

        return view('account.employee-card', compact('data', 'company_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id, $id)
    {
        $data = User::where('id', $id)->get();

        return view('account.employee-edit', compact('data', 'company_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($company_id, $id, Request $request)
    {
//        Сделать валидацию
        User::where('id', $id)->update([
           'name' => $request->name,
            'surname' => $request->surname,
            'position' => $request->position,
        ]);

        return redirect()->route('employees.show', ['company_id' => $company_id, 'employee' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id, $id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('employees.index', compact('company_id'));
    }
}
