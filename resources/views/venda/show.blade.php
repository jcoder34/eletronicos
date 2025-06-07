<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Detalhes da Venda</h1>

        <div class="card">
            <div class="card-section">
                <h2>Funcionário:</h2>
                <p>{{ $venda->funcionario->nome }}</p>
            </div>

            <div class="card-section">
                <h2>Cliente:</h2>
                <p>{{ $venda->cliente->nome }}</p>
            </div>
    
            <div class="card-section">
                <h2>Total:</h2>
                <p>{{ $venda->total }}</p>
            </div>

            <div class="card-section">
                <h2>Horário:</h2>
                <p>{{ $venda->created_at }}</p>
            </div>

            <div class="card-section">
                <h2>Itens Vendidos:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Desconto</th>
                            <th>Promoção</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itens_vendidos as $item_vendido)
                            <tr>
                                <td>{{ $item_vendido->item->codigo }}</td>
                                <td>{{ $item_vendido->desconto }}</td>
                                <td>{{ $item_vendido->promocao }}</td>
                                <td>{{ $item_vendido->item->preco_venda }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
            </div>

            <div class="form-actions">
                <a href="{{ route('venda.edit', $venda) }}" class="btn yellow">Editar</a>
                <a href="{{ route('venda.index') }}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>
