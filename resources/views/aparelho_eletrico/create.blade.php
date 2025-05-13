<body>
    <div class="container">
        <h1>Novo Aparelho Elétrico</h1>
        <form action="{{ route('aparelho_eletrico.store') }}" method="POST">
            <!-- Token CSRF para proteção contra ataques CSRF -->
            @csrf
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="number" name="marca">
            </div>
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input type="text" name="codigo">
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome">
            </div>
            <div class="form-group">
                <label for="potencia">Potência:</label>
                <input type="number" name="potencia">
            </div>
            <div class="form-group">
                <label for="voltagem_minima">Voltagem Mínima:</label>
                <input type="number" name="voltagem_minima">
            </div>
            <div class="form-group">
                <label for="voltagem_maxima">Voltagem Máxima:</label>
                <input type="number" name="voltagem_maxima">
            </div>
            <div class="form-group">
                <label for="corrente_maxima_entrada">Voltagem Máxima:</label>
                <input type="number" name="corrente_maxima_entrada">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>