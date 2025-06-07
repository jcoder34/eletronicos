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

        $itens_id = $data['itens_id'];
        $desconto = array();
        $promocao = array();
        $total = 0;

        foreach ($itens_id as $item_id) {
            $item = Item::find($item_id);
            
            $desconto[$item_id] = $request['desconto_'.$item_id];
            $promocao[$item_id] = $request['promocao_'.$item_id];

            $total += ($item->preco_venda - ((array_key_exists($item_id, $promocao) and $promocao[$item_id] != '') ?
                                             ($item->preco_venda * $promocao[$item_id] / 100) : 0)) -
                       ((array_key_exists($item_id, $desconto) and $desconto[$item_id] != '') ?  $desconto[$item_id] : 0);

        }

        $data['total'] = $total;

        $venda = Venda::create($data);

        foreach ($itens_id as $item_id)
            ItemVendido::create([
                'item_id' => $item_id,
                'venda_id' => $venda->id,
                'desconto' => (array_key_exists($item_id, $desconto) and $desconto[$item_id] != '')? $desconto[$item_id] : null, 
                'promocao' => (array_key_exists($item_id, $promocao) and $promocao[$item_id] != '')? $promocao[$item_id] : null
            ]);

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
        $itens_vendidos = ItemVendido::select('item_id')->pluck('item_id')->toArray();
        $itens_id = ItemVendido::select('item_id')->where('venda_id', $venda->id)->pluck('item_id')->toArray();
        $itens = Item::all()->whereNotIn('id', array_diff($itens_vendidos, $itens_id));
        
        return view('venda.edit', compact('venda', 'clientes', 'funcionarios', 'itens', 'itens_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $venda = Venda::findOrFail($id);

        $data = $request->validate($this->validation_fields);

        $itens_id = $data['itens_id'];
        if (is_array($itens_id)) {
            $desconto = array();
            $promocao = array();
            $total = 0;
        
            foreach ($itens_id as $item_id) {
                $item = Item::find($item_id);
                
                $desconto[$item_id] = $request['desconto_'.$item_id];
                $promocao[$item_id] = $request['promocao_'.$item_id];

                $total += ($item->preco_venda - ((array_key_exists($item_id, $promocao) and $promocao[$item_id] != '') ?
                                                 ($item->preco_venda * $promocao[$item_id] / 100) : 0)) -
                           ((array_key_exists($item_id, $desconto) and $desconto[$item_id] != '') ?  $desconto[$item_id] : 0);

                ItemVendido::create([
                    'item_id' => $item_id,
                    'venda_id' => $venda->id,
                    'desconto' => (array_key_exists($item_id, $desconto) and $desconto[$item_id] != '')? $desconto[$item_id] : null, 
                    'promocao' => (array_key_exists($item_id, $promocao) and $promocao[$item_id] != '')? $promocao[$item_id] : null
                ]);
            }
            
            $data['total'] = $total;
        } else {
            unset($data['total']);
        }

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
