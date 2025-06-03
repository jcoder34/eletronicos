<x-layouts.app :title="__('Editar Aparelho Elétrico')" :dark-mode="auth()->user()->pref_dark_mode">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Aparelho Elétrico</h1>

        <form action="{{ route('aparelho_eletrico.update', $aparelho_eletrico) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="marca_id">Marca</label><br>
                <select name="marca_id" id="marca_id" required>
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ $aparelho_eletrico->marca_id == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nome }}
                        </option>
                    @endforeach
                </select>
                @error('marca_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nome">Nome</label><br>
                <input
                    type="text"
                    name="nome"
                    id="nome"
                    value="{{ old('nome', $aparelho_eletrico->nome) }}"
                    required
                >
                @error('nome') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="potencia">Potência (W)</label><br>
                <input
                    type="number"
                    name="potencia"
                    id="potencia"
                    value="{{ old('potencia', $aparelho_eletrico->potencia) }}"
                >
            </div>

            <div class="form-group">
                <label for="consumo">Consumo (KW/h)</label><br>
                <input
                    type="number"
                    name="consumo"
                    id="consumo"
                    step="0.001"
                    value="{{ old('consumo', $aparelho_eletrico->consumo) }}"
                >
            </div>

            <div class="form-group">
                <label for="voltagem_minima">Voltagem Mínima</label><br>
                <input
                    type="number"
                    name="voltagem_minima"
                    id="voltagem_minima"
                    value="{{ old('voltagem_minima', $aparelho_eletrico->voltagem_minima) }}"
                >
            </div>

            <div class="form-group">
                <label for="voltagem_maxima">Voltagem Máxima</label><br>
                <input
                    type="number"
                    name="voltagem_maxima"
                    id="voltagem_maxima"
                    value="{{ old('voltagem_maxima', $aparelho_eletrico->voltagem_maxima) }}"
                >
            </div>

            <div class="form-group">
                <label for="largura">Largura (mm)</label><br>
                <input
                    type="number"
                    name="largura"
                    id="largura"
                    value="{{ old('largura', $aparelho_eletrico->largura) }}"
                >
            </div>

            <div class="form-group">
                <label for="altura">Altura (mm)</label><br>
                <input
                    type="number"
                    name="altura"
                    id="altura"
                    value="{{ old('altura', $aparelho_eletrico->altura) }}"
                >
            </div>

            <div class="form-group">
                <label for="profundidade">Profundidade (mm)</label><br>
                <input
                    type="number"
                    name="profundidade"
                    id="profundidade"
                    value="{{ old('profundidade', $aparelho_eletrico->profundidade) }}"
                >
            </div>

            <div class="form-group">
                <label for="peso">Peso (g)</label><br>
                <input
                    type="number"
                    name="peso"
                    id="peso"
                    value="{{ old('peso', $aparelho_eletrico->peso) }}"
                >
            </div>

            <div class="form-group">
                <label for="corrente_maxima_entrada">Corrente Máxima de Entrada (A)</label><br>
                <input
                    type="number"
                    name="corrente_maxima_entrada"
                    id="corrente_maxima_entrada"
                    step="0.01"
                    value="{{ old('corrente_maxima_entrada', $aparelho_eletrico->corrente_maxima_entrada) }}"
                >
            </div>

            <div class="form-group">
                <button type="submit">Atualizar</button>
                <a href="{{ route('aparelho_eletrico.show', $aparelho_eletrico) }}" class="btn gray">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
