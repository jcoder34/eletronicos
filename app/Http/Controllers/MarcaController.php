<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('marca.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marca.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string'
        ]);
        
        $marca = Marca::create($data);

        return redirect()->route('marca.show', $marca)
                         ->with('success', 'Marca cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $marca = Marca::findOrFail($id);
        return view('marca.show', ['marca' => $marca]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $marca = Marca::findOrFail($id);
        return view('marca.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $marca = Marca::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required|string'
        ]);

        $marca->update($data);

        return redirect()->route('marca.show', $marca)
                         ->with('success', 'O nome da marca foi atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);

        $marca->delete();

        return redirect()->route('marca.index')
                         ->with('success', 'Marca excluída com sucesso.');
    }
}
