<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\StoreContactPersonRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ContactPersonController extends Controller
{

    public function __construct()
    {
        // Проверка на права
        $this->middleware('can:Просмотр карточки контактного лица', ['only' => 'show']);
        $this->middleware('can:Создание контактного лица', ['only' => ['create', 'store']]);
        $this->middleware('can:Редактирование контактного лица', ['only' => ['edit', 'update']]);
        $this->middleware('can:Удаление контактного лица', ['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        redirect()->route('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactPersonRequest $request)
    {
        $company_id = Auth::user()->company_id;

        $user = User::create([
            'company_id' => $company_id,
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'position' => 'contact_person',
            'email' => $request->input('email'),
            'user_status' => 'client',
            'password' => Hash::make($request->password),
        ]);

        $user->syncPermissions([
            'Просмотр всех заявок',
            'Просмотр карточки заявки',
            ]);

        return redirect()->route('clients.show', ['client' => $request->input('client_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::where('id', $id)->get();

        return view('account.client-card', compact('data'));
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

        return view('account.client-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientRequest $request, $id)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'position' => $request->position,
        ]);

        return redirect()->route('clients.show', ['client' => $id]);
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

        return redirect()->route('clients.index');
    }
}
