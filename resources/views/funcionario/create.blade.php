<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Novo Funcionário</h1>

        <form action="{{ route('funcionario.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" maxlength="50" />
                @error('nome') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" maxlength="11" />
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" maxlength="8" />
            </div>
            <div class="form-group">
                <label for="rua">Rua:</label>
                <input type="text" name="rua" maxlength="64" />
            </div>
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro" maxlength="64" />
            </div>
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" name="numero" maxlength="5" />
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" name="telefone" /><!--pattern="\d{2} 9?\d{4}-\d{4}"--> 
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" />
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de nascimento:</label>
                <input type="date" name="data_nascimento" />
            </div>

            <div class="form-actions">
                <button type="submit">Salvar</button>
                <a href="{{ route('funcionario.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>
