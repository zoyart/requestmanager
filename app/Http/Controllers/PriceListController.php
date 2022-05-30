<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PriceListObject;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::user()->company_id;
        $data = PriceList::where('company_id', $company_id)->get();

        return view('priceList.priceList', compact('company_id', 'data'));
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
        $author = Auth::user()->name;
        $priceListName = $request->name;

        PriceList::create([
            'company_id' => $company_id,
            'name' => $priceListName,
            'author' => $author,
        ]);

        return redirect()->route('price-list.index', compact('company_id'));
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $company_id, $id)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company_id, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteFew(Request $request, $company_id)
    {
        $request_array = $request->all();
//      ID всех отмеченных чекбоксов
        $ids = array_slice($request_array, 2);

        foreach ($ids as $item) {
            PriceList::where('company_id', $company_id)->where('id', $item)->delete();
        }

        return redirect()->route('price-list.index', compact('company_id'));
    }
}
