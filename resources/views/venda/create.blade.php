<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Nova Venda</h1>

        <form action="{{ route('venda.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="funcionario_id">Funcionário:</label>
                <select name="funcionario_id" id="funcionario_id" required>
                    <option value="">Selecione...</option>
                    @foreach($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ old('funcionario_id') == $funcionario->id ? 'selected' : '' }}>
                            {{ $funcionario->nome }}
                        </option>
                    @endforeach
                </select>
                @error('funcionario_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cliente_id">Cliente:</label>
                <select name="cliente_id" id="cliente_id" required>
                    <option value="">Selecione...</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
                @error('cliente_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" name="total" step="0.01" required />
                @error('total') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <select multiple="multiple" name="itens_id[]" id="itens_id">
                @foreach($itens as $item) 
                    @if (is_array(old('itens_id')))
                        <option value="{{ $item->id }}"
                        @foreach(old('itens_id') as $i)
                            @if($item->id == $i->id) selected="selected"
                            @endif
                        @endforeach
                        >{{ $item->codigo }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->codigo }}</option>
                    @endif
                @endforeach
                </select>
                @error('itens_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Salvar</button>
                <a href="{{ route('venda.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
