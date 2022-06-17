<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReqRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class RequestController extends Controller
{

    public function __construct()
    {
        // Проверка на права
        $this->middleware('can:Просмотр всех заявок', ['only' => 'index']);
        $this->middleware('can:Просмотр карточки заявки', ['only' => 'show']);
        $this->middleware('can:Создание заявки', ['only' => ['create', 'store']]);
        $this->middleware('can:Редактирование заявки', ['only' => ['edit', 'update', 'changeStatus']]);
        $this->middleware('can:Удаление заявки', ['only' => ['destroy', 'deleteFew']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = (int) Auth::user()->company_id;

        if (Auth::user()->user_status === 'owner') {
            $requests = \App\Models\Request::where('company_id', $company_id)->get();
        } else {
            $user = User::find(Auth::user()->id);
            $requests = $user->requests;
        }

        return view('requests.requests', compact('requests'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_id = (int) Auth::user()->company_id;
        $clients = Client::where('company_id', $company_id)->get();
        $employees = User::where('company_id', $company_id)->where('user_status', 'employee')->get();

        return view('requests.create', compact('clients', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReqRequest $request)
    {
        $company_id = (int) Auth::user()->company_id;

        \App\Models\Request::create([
            'company_id' => $company_id,
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'urgency' => $request->urgency,
        ]);

        return redirect()->route('requests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = \App\Models\Request::find($id);
        $userInfo = $request->user;

        return view('requests.card', compact('request', 'userInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_id = (int) Auth::user()->company_id;
        $data = \App\Models\Request::where('company_id', $company_id)->where('id', $id)->get()[0];

        return view('requests.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company_id = (int) Auth::user()->company_id;

        \App\Models\Request::where('id', $id)->update([
            'title' => $request->title,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        $requests = \App\Models\Request::where('company_id', $company_id)->get();

        return view('requests.requests', compact('requests'));
    }

    /**
     * Update status
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id, Request $request)
    {
        \App\Models\Request::where('id', $id)->update([
            'status' => $request->status,
        ]);

        return redirect()->route('requests.show', ['request' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company_id = (int) Auth::user()->company_id;
        \App\Models\Request::where('company_id', $company_id)->where('id', $id)->delete();

        return redirect()->route('requests.index');
    }

    public function deleteFew(Request $request)
    {
        $company_id = (int) Auth::user()->company_id;
        $request_array = $request->all();
//      ID всех отмеченных чекбоксов
        $ids = array_slice($request_array, 2);

        foreach ($ids as $item) {
            \App\Models\Request::where('company_id', $company_id)->where('id', $item)->delete();
        }

        return redirect()->route('requests.index');
    }
}
