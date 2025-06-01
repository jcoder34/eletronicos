<x-layouts.app :title="__('Editar Item')" :dark-mode="auth()->user()->pref_dark_mode">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Item</h1>

        <form action="{{ route('item.update', $item) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="aparelho_eletrico_id">Aparelho Elétrico:</label>
                <select name="aparelho_eletrico_id" id="aparelho_eletrico_id" required>
                    <option value="">Selecione...</option>
                    @foreach($aparelhos_eletricos as $aparelho_eletrico)
                        <option value="{{ $aparelho_eletrico->id }}" {{ $item->aparelho_eletrico_id == $aparelho_eletrico->id ? 'selected' : '' }}>
                            {{ $aparelho_eletrico->nome }}
                        </option>
                    @endforeach
                </select>
                @error('aparelho_eletrico_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="codigo">Código</label><br>
                <input
                    type="text"
                    name="codigo"
                    id="codigo"
                    maxlength="30"
                    value="{{ old('codigo', $item->codigo) }}"
                    required
                >
                @error('codigo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="valor">Valor</label><br>
                <input
                    type="number"
                    name="valor"
                    id="valor"
                    step="0.01" 
                    value="{{ old('valor', $item->valor) }}"
                    required
                >
                @error('valor') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="data">Data</label><br>
                <input
                    type="text"
                    name="data"
                    id="data"
                    value="{{ old('data', $item->data) }}"
                    required
                >
                @error('data') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <button type="submit">Atualizar</button>
                <a href="{{ route('item.show', $item) }}">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
