<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)
    {
        $data = Client::where('company_id', $company_id)->get();

        return view('clients.clients', compact('data', 'company_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
        return view('clients.create', compact('company_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($company_id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        Client::create([
            'company_id' => $company_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'address' => $request->address,
            'working_conditions' => $request->working_conditions,
        ]);

        return redirect()->route('clients.index', compact('company_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company_id, $id)
    {
        $data = Client::where('id', $id)->get();
        // Добавить contact person тут
        return view('clients.card', compact('data', 'company_id'));
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

        return view('clients.client-edit', compact('data', 'company_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($company_id, Request $request, $id)
    {
        //        Сделать валидацию
        User::where('id', $id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'position' => $request->position,
        ]);

        return redirect()->route('clients.show', ['company_id' => $company_id, 'client' => $id]);
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

        return redirect()->route('clients.index', compact('company_id'));
    }
}
