<x-layouts.app :title="__('Aparelhos Elétricos')">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container-big">
        <div class="header">
            <h1>Aparelhos Elétricos</h1>
            <a href="{{ route('aparelho_eletrico.create') }}" class="btn">Cadastrar Aparelho Elétrico</a>
        </div>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Potência</th>
                    <th>Voltagem Mínima</th>
                    <th>Voltagem Máxima</th>
                    <th>Corrente Máxima de Entrada</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($aparelhos_eletricos as $aparelho_eletrico)
                    <tr>
                        <td>{{ $aparelho_eletrico->marca->nome }}</td>
                        <td>{{ $aparelho_eletrico->codigo }}</td>
                        <td>{{ $aparelho_eletrico->nome }}</td>
                        <td>{{ $aparelho_eletrico->potencia }}</td>
                        <td>{{ $aparelho_eletrico->voltagem_minima }}</td>
                        <td>{{ $aparelho_eletrico->voltagem_maxima }}</td>
                        <td>{{ $aparelho_eletrico->corrente_maxima_entrada }}</td>
                        <td>
                            <a href="{{ route('aparelho_eletrico.show', $aparelho_eletrico) }}" class="link blue">Ver</a>
                            <a href="{{ route('aparelho_eletrico.edit', $aparelho_eletrico) }}" class="link yellow">Editar</a>
                            <form action="{{ route('aparelho_eletrico.destroy', $aparelho_eletrico) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')                                
                                <button type="button" class="btn-excluir link red" data-nome="{{ $aparelho_eletrico->nome }}">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Nenhum aparelho elétrico cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
