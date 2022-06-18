<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function __construct()
    {
        // Проверка на права
        $this->middleware('can:Просмотр склада', ['only' => 'index']);
        $this->middleware('can:Добавление предмета на склад', ['only' => ['create', 'store']]);
        $this->middleware('can:Редактирование предмета на складе', ['only' => ['edit', 'update']]);
        $this->middleware('can:Удаление предмета на складе', ['only' => ['destroy', 'deleteFew']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::user()->company_id;
        $data = Inventory::where('company_id', $company_id)->get();

        return view('inventory.inventory', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryRequest $request)
    {
        $company_id = Auth::user()->company_id;

        Inventory::create([
            'company_id' => $company_id,
            'name' => $request->input('name'),
            'count' => $request->input('count'),
            'price' => $request->input('price'),
            'cost_price' => $request->input('cost_price'),
            'article_number' => $request->input('article_number'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('inventory.index');
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

        try {
            $data = Inventory::where('company_id', $company_id)->find($id)->get();
        } catch (\Exception $exception) {
            echo $exception->getCode();
        }

        return view('inventory.card', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Inventory::find($id)->get();

        return view('inventory.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInventoryRequest $request, $id)
    {
        Inventory::where('id', $id)->update([
            'name' => $request->input('name'),
            'count' => $request->input('count'),
            'price' => $request->input('price'),
            'cost_price' => $request->input('cost_price'),
            'article_number' => $request->input('article_number'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('inventory.show', ['inventory' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventory::find($id)->delete();

        return redirect()->route('inventory.index');
    }

    public function deleteFew(Request $request)
    {
        $company_id = (int) Auth::user()->company_id;
        $request_array = $request->all();
//      ID всех отмеченных чекбоксов
        $ids = array_slice($request_array, 2);

        foreach ($ids as $item) {
            \App\Models\Inventory::where('company_id', $company_id)->where('id', $item)->delete();
        }

        return redirect()->route('inventory.index');
    }
}
