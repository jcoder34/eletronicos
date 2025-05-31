<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Funcionário - Detalhes</h1>

        <div class="card">
            <div class="card-section">
                <h2>Nome:</h2>
                <p>{{ $funcionario->nome }}</p>
            </div>

            <div class="card-section">
                <h2>CPF:</h2>
                <p>{{ $funcionario->cpf ?? '-'}}</p>
            </div>

            <div class="card-section">
                <h2>CEP:</h2>
                <p>{{ $funcionario->cep ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Rua:</h2>
                <p>{{ $funcionario->rua ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Bairro:</h2>
                <p>{{ $funcionario->bairro ?? '-' }}</p>
            </div>
            
            <div class="card-section">
                <h2>Número:</h2>
                <p>{{ $funcionario->numero ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Telefone:</h2>
                <p>{{ $funcionario->telefone ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Email:</h2>
                <p>{{ $funcionario->email ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Data de nascimento:</h2>
                <p>{{ $funcionario->data_nascimento ?? '-' }}</p>
            </div>

            <div class="form-actions">
                <a href="{{ route('funcionario.edit', $funcionario) }}" class="btn yellow">Editar</a>
                <a href="{{ route('funcionario.index') }}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>
