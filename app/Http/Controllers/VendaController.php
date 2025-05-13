<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = Venda::all();
        return view('venda.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('venda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venda = new Venda([
            'funcionario' => $request->input('funcionario'),
            'cliente' => $request->input('cliente'),
            'total' => $request->input('total')
        ]);

        $venda->save();

        return redirect()->route('venda.index');
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
