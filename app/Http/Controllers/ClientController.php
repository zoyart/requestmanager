<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\ContactPerson;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::user()->company_id;
        $data = Client::where('company_id', $company_id)->get();

        return view('clients.clients', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $company_id = Auth::user()->company_id;

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

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company_id = Auth::user()->company_id;
        $data = Client::where('id', $id)->get();
        $dataContactPerson = User::where('company_id', $company_id)->where('user_status', 'client')->get();

        return view('clients.card', compact('data', 'dataContactPerson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Client::where('id', $id)->get();

        return view('clients.edit', compact('data'));
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
        Client::where('id', $id)->delete();

        return redirect()->route('clients.index');
    }
}
