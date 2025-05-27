<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\AparelhoEletrico;

use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
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
        $data = $request->validate([
            'aparelho_eletrico_id' => 'required',
            'valor' => 'required|string',
            'data' => 'required'
        ]);

        $item = Item::create($data);

        return redirect()->route('item.show', $item)
                         ->with('success', 'Item criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Item::all()->findOrFail($id);
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
