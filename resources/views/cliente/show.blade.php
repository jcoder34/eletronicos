<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Cliente - Detalhes</h1>

        <div class="card">
            <div class="card-section">
                <h2>Nome:</h2>
                <p>{{ $cliente->nome }}</p>
            </div>

            <div class="card-section">
                <h2>CPF:</h2>
                <p>{{ $cliente->cpf ?? '-'}}</p>
            </div>

            <div class="card-section">
                <h2>CEP:</h2>
                <p>{{ $cliente->cep ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Rua:</h2>
                <p>{{ $cliente->rua ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Bairro:</h2>
                <p>{{ $cliente->bairro ?? '-' }}</p>
            </div>
            
            <div class="card-section">
                <h2>Número:</h2>
                <p>{{ $cliente->numero ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Telefone:</h2>
                <p>{{ $cliente->telefone ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Email:</h2>
                <p>{{ $cliente->email ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Data de nascimento:</h2>
                <p>{{ $cliente->data_nascimento ?? '-' }}</p>
            </div>

            <div class="form-actions">
                <a href="{{ route('cliente.edit', $cliente) }}" class="btn yellow">Editar</a>
                <a href="{{ route('cliente.index') }}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>
