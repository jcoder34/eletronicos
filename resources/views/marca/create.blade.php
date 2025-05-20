<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Nova Marca</h1>
        <form action="{{ route('marca.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" />
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('marca.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-layouts.app>
