<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AparelhoEletrico;
use App\Models\Marca;

class AparelhoEletricoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aparelhos_eletricos = AparelhoEletrico::with('marca')->get();
        return view('aparelho_eletrico.index', compact('aparelhos_eletricos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all();

        return view('aparelho_eletrico.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'marca_id' => 'required|exists:marca,id',
            'codigo' => 'required|string|max:30',
            'nome' => 'required|string',
            'potencia' => 'nullable',
            'voltagem_minima' => 'nullable',
            'voltagem_maxima' => 'nullable',
            'corrente_maxima_entrada' => 'nullable'
        ]);

        $aparelho_eletrico = AparelhoEletrico::create($data);

        return redirect()->route('aparelho_eletrico.show', $aparelho_eletrico)
                         ->with('success', 'Eletrônico criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aparelho_eletrico = AparelhoEletrico::all()->findOrFail($id);
        return view('aparelho_eletrico.show', compact('aparelho_eletrico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aparelho_eletrico = AparelhoEletrico::all()->findOrFail($id);
        $marcas = Marca::all();

        return view('aparelho_eletrico.edit', compact('aparelho_eletrico', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $aparelho_eletrico = AparelhoEletrico::findOrFail($id);
        $data = $request->validate([
            'marca_id' => 'required',
            'codigo' => 'required|string|max:30',
            'nome' => 'required|string',
            'potencia' => 'nullable',
            'voltagem_minima' => 'nullable',
            'voltagem_maxima' => 'nullable',
            'corrente_maxima_entrada' => 'nullable'
        ]);

        $aparelho_eletrico->update($data);

        return redirect()->route('aparelho_eletrico.show', $aparelho_eletrico)
                         ->with('success', 'Eletrônico atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aparelho_eletrico = AparelhoEletrico::all()->findOrFail($id);
        $aparelho_eletrico->delete();

        return redirect()->route('aparelho_eletrico.index')
                         ->with('success', 'Eletrônico excluído com sucesso.');
    }
}
