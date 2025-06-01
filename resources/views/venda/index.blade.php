<x-layouts.app :title="__('Vendas')">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <div class="header">
            <h1>Vendas</h1>
            <a href="{{ route('venda.create') }}" class="btn">Registrar Venda</a>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Funcionário</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Horário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vendas as $venda)
                    <tr>
                        <td>{{ $venda->funcionario->nome }}</td>
                        <td>{{ $venda->cliente->nome }}</td>
                        <td>{{ $venda->total }}</td>
                        <td>{{ $venda->created_at }}</td>
                        <td>
                            <a href="{{ route('venda.show', $venda) }}" class="link blue">Ver</a>
                            <a href="{{ route('venda.edit', $venda) }}" class="link yellow">Editar</a>
                            <form action="{{ route('venda.destroy', $venda) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')                                
                                <button type="button" class="btn-excluir link red">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhuma venda registrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
