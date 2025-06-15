<x-layouts.app :title="__('Clientes')">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <div class="header">
            <h1>Clientes</h1>
            <a href="{{ route('cliente.create') }}" class="btn">Cadastrar Cliente</a>
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
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf ?? '-' }}</td>
                        <td>{{ $cliente->telefone ?? '-' }}</td>
                        <td>{{ $cliente->email ?? '-' }}</td>
                        <td>
                            <a href="{{ route('cliente.show', $cliente) }}" class="link blue">Ver</a>
                            <a href="{{ route('cliente.edit', $cliente) }}" class="link yellow">Editar</a>
                            <form action="{{ route('cliente.destroy', $cliente) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')                                
                                <button type="button" class="btn-excluir link red" data-nome="{{ $cliente->nome }}">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhum cliente cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
