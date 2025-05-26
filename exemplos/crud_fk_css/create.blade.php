<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Criar Avaliação</h1>

        <form action="{{ route('avaliacoes.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="disciplina_id">Disciplina</label>
                <select name="disciplina_id" id="disciplina_id" required>
                    <option value="">Selecione...</option>
                    @foreach($disciplinas as $disciplina)
                        <option value="{{ $disciplina->id }}" {{ old('disciplina_id') == $disciplina->id ? 'selected' : '' }}>
                            {{ $disciplina->nome }}
                        </option>
                    @endforeach
                </select>
                @error('disciplina_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" required>
                @error('titulo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" rows="4">{{ old('descricao') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</x-layouts.app>
