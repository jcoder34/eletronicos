<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Avaliacao;
use App\Models\Disciplina;

class AvaliacaoController extends Controller
{

    public function index()
    {
        $avaliacoes = Avaliacao::where('created_by', Auth::id())->with('disciplina')->get();
        return view('avaliacoes.index', compact('avaliacoes'));
    }

    public function create()
    {
        $disciplinas = Disciplina::where('created_by', Auth::id())->get();
        return view('avaliacoes.create', compact('disciplinas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'disciplina_id' => 'required|exists:disciplinas,id',
            'titulo'        => 'required|string|max:255',
            'descricao'     => 'nullable|string',
        ]);

        $data['created_by'] = Auth::id();

        $avaliacao = Avaliacao::create($data);

        return redirect()
            ->route('avaliacoes.show', $avaliacao)
            ->with('success', 'Avaliação criada com sucesso!');
    }

    public function show(string $id)
    {
        $avaliacao = Avaliacao::where('created_by', Auth::id())->findOrFail($id);
        return view('avaliacoes.show', compact('avaliacao'));
    }

    public function edit(string $id)
    {
        $avaliacao = Avaliacao::where('created_by', Auth::id())->findOrFail($id);
        $disciplinas = Disciplina::where('created_by', Auth::id())->get();

        return view('avaliacoes.edit', compact('avaliacao', 'disciplinas'));
    }

    public function update(Request $request, string $id)
    {
        $avaliacao = Avaliacao::where('created_by', Auth::id())->findOrFail($id);

        $data = $request->validate([
            'disciplina_id' => 'required|exists:disciplinas,id',
            'titulo'        => 'required|string|max:255',
            'descricao'     => 'nullable|string',
        ]);

        $avaliacao->update($data);

        return redirect()
            ->route('avaliacoes.show', $avaliacao)
            ->with('success', 'Avaliação atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $avaliacao = Avaliacao::where('created_by', Auth::id())->findOrFail($id);
        $avaliacao->delete();

        return redirect()
            ->route('avaliacoes.index')
            ->with('success', 'Avaliação excluída com sucesso!');
    }
}
