<x-layouts.app :title="__('Marcas')">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <div class="header">
            <h1>Marcas</h1>
            <a href="{{ route('marca.create') }}" class="btn">Nova Marca</a>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($marcas as $marca)
                    <tr>
                        <td>{{ $marca->nome }}</td>
                        <td>
                            <a href="{{ route('marca.edit', $marca) }}" class="link green">Editar</a>
                            <form action="{{ route('marca.destroy', $marca) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-excluir link red" data-nome="{{ $marca->nome }}">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Nenhuma marca.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
