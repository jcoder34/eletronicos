<x-layouts.app :title="__('Editar Venda')" :dark-mode="auth()->user()->pref_dark_mode">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Venda</h1>

        <form action="{{ route('venda.update', $venda) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="funcionario_id">Funcionário</label>
                <select name="funcionario_id" id="funcionario_id" required>
                    @foreach($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ $venda->funcionario_id == $funcionario->id ? 'selected' : '' }}>
                            {{ $funcionario->nome }}
                        </option>
                    @endforeach
                </select>
                @error('funcionario_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" id="cliente_id" required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $venda->cliente_id == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
                @error('cliente_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" name="total" id="total" step="0.01" value="{{ old('total', $venda->total) }}" required />
                @error('total') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <select onchange="selectItens()" multiple="multiple" name="itens_id[]" id="itens_id">
                @foreach($itens as $item)
                    @if (is_array($itens_id))
                        <option value="{{ $item->id }}"
                                data-codigo="{{$item->codigo}}"
                                data-preco_venda="{{$item->preco_venda}}"
                                @foreach($itens_id as $i)
                                    @if ($item->id == $i) selected="selected"
                                    @endif
                                @endforeach
                                >
                        {{ $item->codigo }}
                        </option>
                    @else
                        <option value="{{ $item->id }}"
                                data-codigo="{{$item->codigo}}"
                                data-preco_venda="{{$item->preco_venda}}">
                        {{$item->codigo }}
                        </option>
                    @endif
                @endforeach
                </select>
                @error('itens_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group" id="descontos"></div>

            <div class="form-group">
                <button type="submit">Atualizar</button>
                <a href="{{ route('venda.show', $venda) }}" class="btn gray">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/venda.js')}}" type="text/javascript"></script>
</x-layouts.app>
