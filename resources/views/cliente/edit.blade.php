<x-layouts.app :title="__('Editar Cliente')" :dark-mode="auth()->user()->pref_dark_mode">
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar Cliente</h1>

        <form action="{{ route('cliente.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label><br>
                <input
                    type="text"
                    name="nome"
                    id="nome"
                    maxlength="50"
                    value="{{ old('nome', $cliente->nome) }}"
                    required
                >
                @error('nome') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label><br>
                <input
                    type="text"
                    name="cpf"
                    id="cpf"
                    maxlength="11"
                    value="{{ old('cpf', $cliente->cpf) }}"
                >
            </div>

            <div class="form-group">
                <label for="cep">CEP</label><br>
                <input
                    type="text"
                    name="cep"
                    id="cep"
                    maxlength="8"
                    value="{{ old('cep', $cliente->cep) }}"
                >
            </div>

            <div class="form-group">
                <label for="rua">Rua</label><br>
                <input
                    type="text"
                    name="rua"
                    id="rua"
                    maxlength="64"
                    value="{{ old('rua', $cliente->rua) }}"
                >
            </div>

            <div class="form-group">
                <label for="bairro">Bairro</label><br>
                <input
                    type="text"
                    name="bairro"
                    id="bairro"
                    maxlength="64"
                    value="{{ old('bairro', $cliente->bairro) }}"
                >
            </div>

            <div class="form-group">
                <label for="numero">Número</label><br>
                <input
                    type="text"
                    name="numero"
                    id="numero"
                    maxlength="5"
                    value="{{ old('numero', $cliente->numero) }}"
                >
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label><br>
                <input
                    type="tel"
                    name="telefone"
                    id="telefone"
                    value="{{ old('telefone', $cliente->telefone) }}"
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label><br>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $cliente->email) }}"
                >
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de nascimento</label><br>
                <input
                    type="date"
                    name="data_nascimento"
                    id="data_nascimento"
                    value="{{ old('data_nascimento', $cliente->data_nascimento) }}"
                >
            </div>

            <div class="form-actions">
                <button type="submit">Atualizar</button>
                <a href="{{ route('cliente.show', $cliente) }}">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
