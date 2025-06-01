<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\AparelhoEletrico;

class ItemController extends Controller
{
    private $validation_fields = [
        'aparelho_eletrico_id' => 'required',
        'codigo' => 'required|string|max:30',
        'valor' => 'required|decimal:2|gte:0',
        'data' => 'required|date'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itens = Item::with('aparelho_eletrico')->get();
        return view('item.index', compact('itens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aparelhos_eletricos = AparelhoEletrico::all();

        return view('item.create', compact('aparelhos_eletricos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validation_fields);

        $item = Item::create($data);

        return redirect()->route('item.show', $item)
                         ->with('success', 'Item criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $aparelhos_eletricos = AparelhoEletrico::all();

        return view('item.edit', compact('item', 'aparelhos_eletricos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $data = $request->validate($this->validation_fields);

        $item->update($data);

        return redirect()->route('item.show', $item)
                         ->with('success', 'Item atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Item::all()->findOrFail($id);
        $item->delete();

        return redirect()->route('item.index')
                         ->with('success', 'Item excluído com sucesso.');
    }
}
