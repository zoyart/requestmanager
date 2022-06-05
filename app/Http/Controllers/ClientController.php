<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\ContactPerson;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function store($company_id, StoreClientRequest $request)
    {
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
        $dataContactPerson = ContactPerson::where('client_id', $id)->get();

        return view('clients.card', compact('data', 'company_id', 'dataContactPerson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id, $id)
    {
        $data = Client::where('id', $id)->get();

        return view('clients.edit', compact('data', 'company_id'));
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
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'email',
        ]);

        Client::where('id', $id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'working_conditions' => $request->working_conditions,
            'email' => $request->email,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'phone_number' => $request->phone_number,
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
        Client::where('id', $id)->delete();

        return redirect()->route('clients.index', compact('company_id'));
    }
}
