<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Funcionario;
use App\Models\Cliente;
use App\Models\Item;
use App\Models\ItemVendido;

use Illuminate\Support\Facades\Log;

class VendaController extends Controller
{
    private $validation_fields = [
        'funcionario_id' => 'required|exists:funcionario,id',
        'cliente_id' => 'required|exists:cliente,id',
        'total' => 'required|decimal:2|gte:0',
        'itens_id' => 'required|array'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = Venda::with('funcionario', 'cliente')->get();
        return view('venda.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();
        $itens_vendidos = ItemVendido::select('item_id')->pluck('item_id');
        $itens = Item::all()->whereNotIn('id', $itens_vendidos);

        return view('venda.create', compact('clientes', 'funcionarios', 'itens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validation_fields);

        $venda = Venda::create($data);

        foreach ($data['itens_id'] as $item) {
            ItemVendido::create([
                'item_id' => $item,
                'venda_id' => $venda->id
            ]);
        }

        return redirect()
            ->route('venda.show', $venda)
            ->with('success', 'Venda registrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $venda = Venda::findOrFail($id);
        $itens_vendidos = ItemVendido::where('venda_id', $id)->with('item')->get();

        Log::info($itens_vendidos);

        return view('venda.show', compact('venda', 'itens_vendidos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $venda = Venda::findOrFail($id);
        $clientes = Cliente::all();
        $funcionarios = Funcionario::all();

        return view('venda.edit', compact('clientes', 'funcionarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $venda = Venda::findOrFail($id);
        $data = $request->validate($this->validation_fields);

        $venda->update($data);
        
        return redirect()->route('venda.show', $venda)
                         ->with('success', 'Venda atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $venda = Venda::findOrFail($id);
        $venda->delete();

        return redirect()->route('venda.index')
                         ->with('success', 'Venda excluída com sucesso.');
    }
}
