<x-layouts.app :title="__('Itens')">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <div class="header">
            <h1>Itens</h1>
            <a href="{{ route('item.create') }}" class="btn">Cadastrar Item</a>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Aparelho Elétrico</th>
                    <th>Valor</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($itens as $item)
                    <tr>
                        <td>{{ $item->aparelho_eletrico->nome }}</td>
                        <td>{{ $item->valor }}</td>
                        <td>{{ $item->data }}</td>
                        <td>
                            <a href="{{ route('item.show', $item) }}" class="link blue">Ver</a>
                            <a href="{{ route('item.edit', $item) }}" class="link yellow">Editar</a>
                            <form action="{{ route('item.destroy', $item) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')                                
                                <button type="button" class="btn-excluir link red">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhum item cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
