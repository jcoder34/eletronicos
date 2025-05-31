<x-layouts.app :title="__('Funcionários')">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container-big">
        <div class="header">
            <h1>Funcionários</h1>
            <a href="{{ route('funcionario.create') }}" class="btn">Cadastrar Funcionário</a>
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
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Telefone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->cpf }}</td>
                        <td>{{ $funcionario->cep }}</td>
                        <td>{{ $funcionario->rua }}</td>
                        <td>{{ $funcionario->bairro }}</td>
                        <td>{{ $funcionario->telefone }}</td>
                        <td>{{ $funcionario->email }}</td>
                        <td>
                            <a href="{{ route('funcionario.show', $funcionario) }}" class="link blue">Ver</a>
                            <a href="{{ route('funcionario.edit', $funcionario) }}" class="link yellow">Editar</a>
                            <form action="{{ route('funcionario.destroy', $funcionario) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')                                
                                <button type="button" class="btn-excluir link red" data-nome="{{ $funcionario->nome }}">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhum funcionário cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
