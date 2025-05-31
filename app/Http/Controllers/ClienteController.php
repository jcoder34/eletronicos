<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    private $validation_fields = [
        'nome' => 'required|string|max:50',
        'cpf' => 'nullable|string|max:11|min:11',
        'cep' => 'nullable|string|max:8|min:8',
        'rua' => 'nullable|string|max:64',
        'bairro' => 'nullable|string|max:64',
        'numero' => 'nullable|string|max:5',
        'telefone' => 'nullable|string|max:11',
        'email' => 'nullable|email',
        'data_nascimento' => 'nullable|date'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validation_fields);
        
        $cliente = Cliente::create($data);

        return redirect()->route('cliente.show', $cliente)
                         ->with('success', 'Cliente cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $data = $request->validate($this->validation_fields);

        $cliente->update($data);

        return redirect()->route('cliente.show', $cliente)
                         ->with('success', 'Cadastro do cliente atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return redirect()->route('cliente.index')
                         ->with('success', 'Cliente excluído com sucesso.');
    }
}
