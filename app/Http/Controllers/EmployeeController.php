<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class EmployeeController extends Controller
{

    public function __construct()
    {
        // Проверка на права
        $this->middleware('can:Просмотр всех сотрудников', ['only' => 'index']);
        $this->middleware('can:Просмотр карточки сотрудника', ['only' => 'show']);
        $this->middleware('can:Создание сотрудника', ['only' => 'store']);
        $this->middleware('can:Редактирование сотрудника', ['only' => ['edit', 'update']]);
        $this->middleware('can:Удаление сотрудника', ['only' => 'destroy']);

    }

    public function index()
    {
        $company_id = Auth::user()->company_id;
        $data = User::where('company_id', $company_id)->where('user_status', 'employee')->get();

        return view('account.employees', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_id = Auth::user()->company_id;

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'position' => 'required',
            'email' => 'required|email|unique:users|unique:companies',
            'password' => 'required|confirmed|min:8|max:45'
        ]);

        $user = User::create([
            'company_id' => $company_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'user_status' => 'employee',
            'position' => $request->position,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $company_id = Auth::user()->company_id;
            $data = User::where('company_id', $company_id)->where('id', $id)->get();
            $user = User::where('company_id', $company_id)->find($id);
            $request = Permission::where('app', 'request')->get();
            $priceList = Permission::where('app', 'priceList')->get();
            $employee = Permission::where('app', 'employee')->get();
            $client = Permission::where('app', 'client')->get();
            $contact_person = Permission::where('app', 'contact_person')->get();
        } catch (\Exception $exception) {
            return abort(404);
        }

        return view('account.employee-card',
            compact('data', 'request', 'priceList', 'employee', 'client', 'user', 'contact_person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->get();
        $user = User::find($id);
        $request = Permission::where('app', 'request')->get();
        $priceList = Permission::where('app', 'priceList')->get();
        $employee = Permission::where('app', 'employee')->get();
        $client = Permission::where('app', 'client')->get();
        $contact_person = Permission::where('app', 'contact_person')->get();

        return view('account.employee-edit',
            compact('data', 'request', 'priceList', 'employee', 'client', 'user', 'contact_person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'permissions.*' => 'required|integer|exists:permissions,id'
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'position' => $request->position,
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $user = User::find($id);
        $user->syncPermissions($permissions);

        return redirect()->route('employees.show', ['employee' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('employees.index');
    }
}
