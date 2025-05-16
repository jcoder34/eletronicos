<body>
    <div class="container">
        <h1>Novo Item</h1>
        <form action="{{ route('item.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="aparelho_eletrico">Aparelho Elétrico:</label>
                <input type="number" name="aparelho_eletrico" min="1" />
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" name="valor" />
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" name="data" />
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('item.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
