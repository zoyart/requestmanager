<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use App\Models\PriceListObject;
use Illuminate\Http\Request;

class PriceListMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $company_id, $id)
    {
        PriceListObject::create([
            'price_list_id' => $request->priceListId,
            'name' => $request->name,
            'category' => $request->category,
            'vat' => $request->vat,
            'price' => $request->price,
            'type' => $request->type,
        ]);

        return redirect()->route('material.show', compact('company_id', 'id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company_id, $id)
    {
        $data = PriceListObject::where('price_list_id', $id)->where('type', 'material')->get();
        $priceListData = PriceList::where('id', $id)->get();

        return view('priceList.materials', compact('data', 'company_id', 'id', 'priceListData'));
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
    public function destroy($id)
    {
        //
    }

    public function deleteFew($company_id, Request $request, $id)
    {
        $request_array = $request->all();
//      ID всех отмеченных чекбоксов
        $ids = array_slice($request_array, 2);

        foreach ($ids as $item) {
            PriceListObject::where('price_list_id', $id)->where('id', $item)->delete();
        }

        return redirect()->route('material.show', compact('company_id', 'id'));
    }
}
