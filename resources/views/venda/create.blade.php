<x-layouts.app>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Nova Venda</h1>

        <form action="{{ route('venda.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="funcionario_id">Funcionário:</label>
                <select name="funcionario_id" id="funcionario_id" required>
                    <option value="">Selecione...</option>
                    @foreach($funcionarios as $funcionario)
                        <option value="{{ $funcionario->id }}" {{ old('funcionario_id') == $funcionario->id ? 'selected' : '' }}>
                            {{ $funcionario->nome }}
                        </option>
                    @endforeach
                </select>
                @error('funcionario_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cliente_id">Cliente:</label>
                <select name="cliente_id" id="cliente_id" required>
                    <option value="">Selecione...</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
                @error('cliente_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" name="total" id="total" step="0.01" value="0.00" required />
                @error('total') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <select onchange="selectItens()" multiple="multiple" name="itens_id[]" id="itens_id">
                @foreach($itens as $item) 
                    <option value="{{ $item->id }}"
                            data-codigo="{{$item->codigo}}"
                            data-preco_venda="{{$item->preco_venda}}">
                    {{$item->codigo }}
                    </option>
                @endforeach
                </select>
                @error('itens_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group" id="descontos"></div>

            <div class="form-actions">
                <button type="submit">Salvar</button>
                <a href="{{ route('venda.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
    
<script type="text/javascript">

const totalEle = document.getElementById("total")
const itensEle = document.getElementById("itens_id")
const descontosEle = document.getElementById("descontos")
var desconto_itens = new Map()
var promocao_itens = new Map()

function updateTotal() {
    const selected = Array.from(itensEle.children).filter(x => x.selected)
    
    const total = selected.reduce((acc, current) =>
    acc + parseInt(parseFloat(current.dataset.preco_venda) * 100) - 
    (promocao_itens.has(current.value)? (promocao_itens.get(current.value) * parseFloat(current.dataset.preco_venda)) : 0) -
    (desconto_itens.has(current.value)? (desconto_itens.get(current.value) * 100) : 0), 0) / 100

    totalEle.value = total.toFixed(2)
}

function selectItens() {
    const selected = Array.from(itensEle.children).filter(x => x.selected)

    totalEle.value = selected.reduce((acc, current) =>
                                     acc + parseInt(parseFloat(current.dataset.preco_venda) * 100),
                                     0) / 100
    
    descontosEle.innerHTML = selected.reduce((acc, current) => acc +
        "\
        <label for=\"desconto_" + current.value + "\">Desconto para " + current.dataset.codigo + ":</label>\
        <input onchange=\"desconto(this)\" type=\"number\" name=\"desconto_"+ current.value + "\" step=\"0.01\" data-item_id=\""+current.value+"\"/>\
        \
        <label for=\"promocao_" + current.value + "\">Promoção para " + current.dataset.codigo + ":</label>\
        <input onchange=\"promocao(this)\" type=\"number\" name=\"promocao_"+ current.value + "\" step=\"0.01\" data-item_id=\""+current.value+"\"/>\
        ", "")
}

function desconto(ele) {
    desconto_itens.set(ele.dataset.item_id, parseFloat(ele.value))
    updateTotal()    
}

function promocao(ele) {
    promocao_itens.set(ele.dataset.item_id, parseFloat(ele.value))
    updateTotal()    
}

</script>

</x-layouts.app>
