<x-layouts.app :title="__('Editar Marca')" :dark-mode="auth()->user()->pref_dark_mode">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Mudar o nome da Marca</h1>

        <form action="{{ route('marca.update', $marca) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label><br>
                <input
                    type="text"
                    name="nome"
                    id="nome"
                    value="{{ old('nome', $marca->nome) }}"
                    required
                >
                @error('nome') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Atualizar</button>
                <a href="{{ route('marca.show', $marca) }}">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
