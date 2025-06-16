<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Marca</h1>

        <div class="card">
            <div class="card-section">
                <h2>Nome:</h2> 
                <p>{{ $marca->nome }}</p>
            </div>

            <div class="form-actions">
                <a href="{{ route('marca.edit', $marca) }}" class="btn green">Editar</a>
                <a href="{{ route('marca.index')}}" class="btn gray">Voltar</a>
            </div>
    </div>
</x-layouts.app>
