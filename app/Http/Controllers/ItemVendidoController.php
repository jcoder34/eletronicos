<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemVendido;

class ItemVendidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itens_vendidos = ItemVendido::all();
        return view('item_vendido.index', compact('itens_vendidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item_vendido.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item_vendido = new ItemVendido([
            'item' => $request->input('item'),
            'venda' => $request->input('venda'),
            'desconto' => $request->input('desconto'),
            'promocao' => $request->input('promocao')
        ]);

        $item_vendido->save();

        return redirect()->route('item_vendido.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
