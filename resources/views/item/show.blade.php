<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Detalhes do Item</h1>

        <div class="card">
            <div class="card-section">
                <h2>Aparelho Elétrico:</h2>
                <p>{{ $item->aparelho_eletrico->nome }}</p>
            </div>

            <div class="card-section">
                <h2>Valor:</h2>
                <p>{{ $item->valor }}</p>
            </div>
    
            <div class="card-section">
                <h2>Data:</h2>
                <p>{{ $item->data }}</p>
            </div>

            <div class="form-actions">
                <a href="{{ route('item.edit', $item) }}" class="btn yellow">Editar</a>
                <a href="{{ route('item.index') }}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>
