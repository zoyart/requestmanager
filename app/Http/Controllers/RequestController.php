<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::user()->company_id;
        $user_status = Auth::user()->user_status;

        if ($user_status === 'client') {
//            Тут доделать
//            $data = \App\Models\Request::where('company_id', $company_id)->where()->get();
        } else {
            $data = \App\Models\Request::where('company_id', $company_id)->get();
        }

        return view('requests.requests', compact('data', 'company_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_id = (int) Auth::user()->company_id;

        \App\Models\Request::create([
            'company_id' => $company_id,
            'title' => $request->title,
            'description' => $request->description,
            'urgency' => $request->urgency,
        ]);

        return redirect()->route('requests.index', $company_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company_id, $id)
    {
        $data = \App\Models\Request::where('company_id', $company_id)->where('id', $id)->get()[0];

        return view('requests.card', compact('data', 'company_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id, $id)
    {
        $data = \App\Models\Request::where('company_id', $company_id)->where('id', $id)->get()[0];

        return view('requests.edit', compact('data', 'company_id'));
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
        \App\Models\Request::where('id', $id)->update([
            'title' => $request->title,
        ]);

        $data = \App\Models\Request::where('company_id', $company_id)->get();

        return view('requests.requests', compact('data', 'company_id'));
    }

    /**
     * Update status
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($company_id, $id, Request $request)
    {
        \App\Models\Request::where('id', $id)->update([
            'status' => $request->status,
        ]);

        return redirect()->route('requests.show', ['company_id' => $company_id, 'request' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id, $id)
    {
        \App\Models\Request::where('company_id', $company_id)->where('id', $id)->delete();

        return redirect()->route('requests.index', $company_id);
    }

    public function deleteFew($company_id, Request $request)
    {
        $request_array = $request->all();
//      ID всех отмеченных чекбоксов
        $ids = array_slice($request_array, 2);

        foreach ($ids as $item) {
            \App\Models\Request::where('company_id', $company_id)->where('id', $item)->delete();
        }

        return redirect()->route('requests.index', $company_id);
    }
}
