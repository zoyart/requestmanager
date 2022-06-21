<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReqRequest;
use App\Models\Client;
use App\Models\Company;
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
        $company_id = (int)Auth::user()->company_id;
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $requests = $user->requests;

        return view('requests.requests', compact('requests'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_id = (int)Auth::user()->company_id;
        $clients = Company::find($company_id)->clients()->get();
        $employees = Company::find($company_id)->users()->where('user_status', 'employee')->get();
        $contactPersons = Company::find($company_id)->users()->where('user_status', 'client')->get();

        return view('requests.create', compact('clients', 'employees', 'contactPersons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReqRequest $request)
    {
        $company_id = (int)Auth::user()->company_id;
        $userId = $request->user_id;
        $contactPerson = $request->contact_person;

        $request = \App\Models\Request::create([
            'company_id' => $company_id,
            'title' => $request->title,
            'description' => $request->description,
            'urgency' => $request->urgency,
        ]);

        // Добавление пользователей к заявке
        if (Auth::user()->id == $userId) {
            $request->user()->attach($userId);
            if ($contactPerson != 0) {
                $request->user()->attach($contactPerson);
            }
        } else {
            $request->user()->attach($userId);
            $owner = Company::find($company_id)->users()->where('user_status', 'owner')->get('id');
            $request->user()->attach($owner);
            if ($contactPerson != 0) {
                $request->user()->attach($contactPerson);
            }
        }

        return redirect()->route('requests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $company_id = Auth::user()->company_id;
            $request = \App\Models\Request::where('company_id', $company_id)->find($id);
            $userInfo = $request->user()->get();
        } catch (\Exception $exception) {
            return abort(404);
        }


        return view('requests.card', compact('request', 'userInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_id = (int)Auth::user()->company_id;
        $request = \App\Models\Request::where('company_id', $company_id)->find($id);

        return view('requests.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReqRequest $request, $id)
    {
        $validate = $request->validate([
            'inventory_number' => 'numeric',
            'serial_number' => 'numeric',
        ]);

        $company_id = (int)Auth::user()->company_id;

        \App\Models\Request::where('company_id', $company_id)->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'inventory_number' => $request->inventory_number,
            'serial_number' => $request->serial_number,
            'is_paid' => $request->is_paid,
            'urgency' => $request->urgency,
            'status' => $request->status,
            'object_address' => $request->object_address,
            'request_type' => $request->request_type,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('requests.show', ['request' => $id]);
    }

    /**
     * Update status
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id, Request $request)
    {
        $companyId = Auth::user()->company_id;

        \App\Models\Request::where('company_id', $companyId)->where('id', $id)->update([
            'status' => $request->status,
        ]);

        return redirect()->route('requests.show', ['request' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company_id = (int)Auth::user()->company_id;

        \App\Models\Request::find($id)->user()->detach();
        \App\Models\Request::where('company_id', $company_id)->where('id', $id)->delete();

        return redirect()->route('requests.index');
    }

    public function deleteFew(Request $request)
    {
        $company_id = (int)Auth::user()->company_id;
        $request_array = $request->all();

//      ID всех отмеченных чекбоксов
        $ids = array_slice($request_array, 2);

        foreach ($ids as $item) {
            \App\Models\Request::find($item)->user()->detach();
            \App\Models\Request::where('company_id', $company_id)->where('id', $item)->delete();
        }

        return redirect()->route('requests.index');
    }
}
