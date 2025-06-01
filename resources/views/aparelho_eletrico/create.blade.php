<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Novo Aparelho Elétrico</h1>
        
        <form action="{{ route('aparelho_eletrico.store') }}" method="POST">
            @csrf
        
            <div class="form-group">
                <label for="marca_id">Marca:</label>
                <select name="marca_id" id="marca_id" required>
                    <option value="">Selecione...</option>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nome }}
                        </option>
                    @endforeach
                </select>
                @error('marca_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required/>
                @error('nome') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="potencia">Potência (W):</label>
                <input type="number" name="potencia" />
            </div>
            <div class="form-group">
                <label for="consumo">Consumo (KW/h):</label>
                <input type="number" name="consumo" step="0.001"/>
            </div>
            <div class="form-group">
                <label for="voltagem_minima">Voltagem mínima:</label>
                <input type="number" name="voltagem_minima" />
            </div>
            <div class="form-group">
                <label for="voltagem_maxima">Voltagem máxima:</label>
                <input type="number" name="voltagem_maxima" />
            </div>
            <div class="form-group">
                <label for="largura">Largura (mm):</label>
                <input type="number" name="largura" />
            </div>
            <div class="form-group">
                <label for="altura">Altura (mm):</label>
                <input type="number" name="altura" />
            </div>
            <div class="form-group">
                <label for="profundidade">Profundidade (mm):</label>
                <input type="number" name="profundidade" />
            </div>
            <div class="form-group">
                <label for="peso">Peso (g):</label>
                <input type="number" name="peso" />
            </div>
            <div class="form-group">
                <label for="corrente_maxima_entrada">Corrente máxima de entrada (A):</label>
                <input type="number" name="corrente_maxima_entrada" step="0.01"/>
            </div>

            <div class="form-actions">
                <button type="submit">Salvar</button>
                <a href="{{ route('aparelho_eletrico.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
