<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Novo Item</h1>

        <form action="{{ route('item.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="aparelho_eletrico_id">Aparelho Elétrico:</label>
                <select name="aparelho_eletrico_id" id="aparelho_eletrico_id" required>
                    <option value="">Selecione...</option>
                    @foreach($aparelhos_eletricos as $aparelho_eletrico)
                        <option value="{{ $aparelho_eletrico->id }}" {{ old('aparelho_eletrico_id') == $aparelho_eletrico->id ? 'selected' : '' }}>
                            {{ $aparelho_eletrico->nome }}
                        </option>
                    @endforeach
                </select>
                @error('aparelho_eletrico_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input type="text" name="codigo" maxlength="30" required/>
                @error('codigo') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" name="valor" step="0.01" required />
                @error('valor') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" name="data" required />
                @error('data') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-actions">
                <button type="submit">Salvar</button>
                <a href="{{ route('item.index') }}" class="btn gray">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
