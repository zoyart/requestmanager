<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $company_id = Auth::user()->company_id;

        try {
            $request = \App\Models\Request::where('company_id', $company_id)->find($id);
            $data = $request->messages()->orderBy('created_at', 'desc')->get();
        } catch (\Exception $exception) {
            return abort(404);
        }

        return view('messages.messages', compact('id', 'data'));
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
    public function store($id, Request $request)
    {
        $request->validate([
            'message' => 'required',
            'file' => 'nullable|image',
        ]);

        if ($request->hasFile('file')) {
            $folder = date('Y-m-d');
            $file = $request->file('file')->store("images/{$folder}", 'public');
        }
        $author = Auth::user()->name;

        Message::create([
            'request_id' => $id,
            'message' => $request->message,
            'author' => $author,
            'file' => $file ?? null,
        ]);

        return redirect()->route('messages.index', compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $message)
    {
        Message::where('request_id', $id)->find($message)->delete();

        return redirect()->back();
    }

    public function changeStatus(Request $request, $id)
    {
        Message::where('id', $id)->update([
            'status' => $request->status,
        ]);

        return redirect()->back();
    }
}
