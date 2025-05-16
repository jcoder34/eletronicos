<body>
    <div class="container">
        <h1>Nova Venda</h1>
        <form action="{{ route('venda.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="funcionario">Funcionário:</label>
                <input type="number" name="funcionario" min="1" />
            </div>
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <input type="number" name="cliente" min="1" />
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" name="total" />
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('venda.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
