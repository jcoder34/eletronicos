<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AparelhoEletrico;
use App\Models\Marca;

use Illuminate\Support\Facades\Storage;

class AparelhoEletricoController extends Controller
{
    private $validation_fields = [
        'marca_id' => 'exists:marca,id',
        'nome' => 'required|string',
        'potencia' => 'nullable|integer|gte:0',
        'consumo' => 'nullable',
        'voltagem_minima' => 'nullable|integer|gte:0',
        'voltagem_maxima' => 'nullable|integer|gte:0',
        'largura' => 'nullable|integer|gte:0',
        'altura' => 'nullable|integer|gte:0',
        'profundidade' => 'nullable|integer|gte:0',
        'peso' => 'nullable|integer|gte:0',
        'corrente_maxima_entrada' => 'nullable',
        # Arquivos de até 2 MB.
        'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
    ];

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
        $data = $request->validate($this->validation_fields);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('aparelho_eletrico');
            $data['imagem'] = $path;
        }

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
        
        $data = $request->validate($this->validation_fields);
        
        if ($request->hasFile('imagem')) {
            if ($aparelho_eletrico->imagem)
                Storage::delete($aparelho_eletrico->imagem);
            $path = $request->file('imagem')->store('aparelho_eletrico');
            $data['imagem'] = $path;
        }
        
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
        
        if ($aparelho_eletrico->imagem)
            Storage::delete($aparelho_eletrico->imagem);

        $aparelho_eletrico->delete();

        return redirect()->route('aparelho_eletrico.index')
                         ->with('success', 'Eletrônico excluído com sucesso.');
    }
}
