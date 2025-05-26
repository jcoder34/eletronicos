<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <div class="header">
            <h1>Avaliações</h1>
            <a href="{{ route('avaliacoes.create') }}" class="btn">Nova Avaliação</a>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Disciplina</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($avaliacoes as $avaliacao)
                    <tr>
                        <td>{{ $avaliacao->titulo }}</td>
                        <td>{{ $avaliacao->disciplina->nome ?? '-' }}</td>
                        <td>
                            <a href="{{ route('avaliacoes.show', $avaliacao) }}" class="link blue">Ver</a>
                            <a href="{{ route('avaliacoes.edit', $avaliacao) }}" class="link yellow">Editar</a>
                            <form action="{{ route('avaliacoes.destroy', $avaliacao) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="link red" onclick="return confirm('Deseja excluir esta avaliação?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhuma avaliação cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
