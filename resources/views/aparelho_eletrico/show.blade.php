<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Detalhes do Aparelho Elétrico</h1>

        <div class="card">
            <div class="card-section">
                <h2>Marca:</h2>
                <p>{{ $aparelho_eletrico->marca->nome }}</p>
            </div>

            <div class="card-section">
                <h2>Código:</h2>
                <p>{{ $aparelho_eletrico->codigo }}</p>
            </div>

            <div class="card-section">
                <h2>Nome:</h2>
                <p>{{ $aparelho_eletrico->nome }}</p>
            </div>

            <div class="card-section">
                <h2>Potência (W):</h2>
                <p>{{ $aparelho_eletrico->potencia ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Consumo (KW/h):</h2>
                <p>{{ $aparelho_eletrico->consumo ?? '-' }}</p>
            </div>
            
            <div class="card-section">
                <h2>Voltagem Mínima:</h2>
                <p>{{ $aparelho_eletrico->voltagem_minima ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Voltagem Máxima:</h2>
                <p>{{ $aparelho_eletrico->voltagem_maxima ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Largura (mm):</h2>
                <p>{{ $aparelho_eletrico->largura ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Altura (mm):</h2>
                <p>{{ $aparelho_eletrico->altura ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Profundidade (mm):</h2>
                <p>{{ $aparelho_eletrico->profundidade ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Peso (g):</h2>
                <p>{{ $aparelho_eletrico->peso ?? '-' }}</p>
            </div>

            <div class="card-section">
                <h2>Corrente Máxima de Entrada (A):</h2>
                <p>{{ $aparelho_eletrico->corrente_maxima_entrada ?? '-' }}</p>
            </div>

            <div class="form-actions">
                <a href="{{ route('aparelho_eletrico.edit', $aparelho_eletrico) }}" class="btn yellow">Editar</a>
                <a href="{{ route('aparelho_eletrico.index') }}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>
