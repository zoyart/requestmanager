<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use App\Models\PriceListObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PriceListWorkController extends Controller
{
    public function __construct()
    {
        // Проверка на права
        $this->middleware('can:Просмотр работ прайс-листа', ['only' => 'show']);
        $this->middleware('can:Удаление работ', ['only' => 'deleteFew']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        PriceListObject::create([
            'price_list_id' => $request->priceListId,
            'name' => $request->name,
            'category' => $request->category,
            'vat' => $request->vat,
            'price' => $request->price,
            'type' => $request->type,
        ]);

        return redirect()->route('work.show', compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PriceListObject::where('price_list_id', $id)->where('type', 'work')->get();
        $priceListData = PriceList::where('id', $id)->get();

        return view('priceList.work', compact('data','id', 'priceListData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        redirect()->route('index');
    }

    public function deleteFew(Request $request, $id)
    {
        $company_id = Auth::user()->company_id;
        $request_array = $request->all();

//      ID всех отмеченных чекбоксов
        $ids = array_slice($request_array, 2);

        foreach ($ids as $item) {
            PriceListObject::where('price_list_id', $id)->where('id', $item)->delete();
        }

        return redirect()->route('work.show', compact('company_id', 'id'));
    }
}
