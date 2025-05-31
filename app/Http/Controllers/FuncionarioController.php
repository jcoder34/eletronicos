<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
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
        $funcionarios = Funcionario::all();
        return view('funcionario.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validation_fields);

        $funcionario = Funcionario::create($data);

        return redirect()->route('funcionario.show', $funcionario)
                         ->with('success', 'Funcionário cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionario.show', ['funcionario' => $funcionario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionario.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $data = $request->validate($this->validation_fields);

        $funcionario->update($data);

        return redirect()->route('funcionario.show', $funcionario)
                         ->with('success', 'Cadastro do funcionário atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);

        $funcionario->delete();

        return redirect()->route('funcionario.index')
                         ->with('success', 'Funcionário excluído com sucesso.');
    }
}
