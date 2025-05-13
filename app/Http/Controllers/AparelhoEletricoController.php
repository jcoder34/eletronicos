<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AparelhoEletrico;

class AparelhoEletricoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aparelhos_eletricos = AparelhoEletrico::all();
        return view('aparelho_eletrico.index', compact('aparelhos_eletricos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aparelho_eletrico.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aparelho_eletrico = new AparelhoEletrico([
            'marca' => $request->input('marca'),
            'codigo' => $request->input('codigo'),
            'nome' => $request->input('nome'),
            'potencia' => $request->input('potencia'),
            'voltagem_minima' => $request->input('voltagem_minima'),
            'voltagem_maxima' => $request->input('voltagem_maxima'),
            'corrente_maxima_entrada' => $request->input('corrente_maxima_entrada')
        ]);

        $aparelho_eletrico->save();

        return redirect()->route('aparelho_eletrico.index');
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
