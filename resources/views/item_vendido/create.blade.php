<body>
    <div class="container">
        <h1>Novo Item Vendido</h1>
        <form action="{{ route('item_vendido.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="item">Item:</label>
                <input type="number" name="item" min="1" />
            </div>
            <div class="form-group">
                <label for="venda">Venda:</label>
                <input type="number" name="venda" min="1" />
            </div>
            <div class="form-group">
                <label for="desconto">Desconto:</label>
                <input type="number" name="desconto" />
            </div>
            <div class="form-group">
                <label for="promocao">Promoção:</label>
                <input type="number" name="promocao" />
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('item_vendido.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
