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
                <input type="number" name="total" id="total" step="0.01" value="0.00" required />
                @error('total') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <select onchange="itensVendidos.selectItens()" multiple="multiple" name="itens_id[]" id="itens_id">
                @foreach($itens as $item) 
                    <option value="{{ $item->id }}"
                            data-codigo="{{$item->codigo}}"
                            data-preco_venda="{{$item->preco_venda}}">
                    {{$item->codigo }}
                    </option>
                @endforeach
                </select>
                @error('itens_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group" id="descontos"></div>

            <div class="form-actions">
                <button type="submit">Salvar</button>
                <a href="{{ route('venda.index') }}" class="btn gray">Cancelar</a>
            </div>
        </form>
    </div>
    
    <script src="{{ asset('js/venda.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
    const itensVendidos = new ItensVendidos('itensVendidos')
    </script>
</x-layouts.app>
