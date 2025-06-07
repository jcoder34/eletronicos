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
        <input onchange=\"promocao(this)\" type=\"number\" name=\"promocao_"+ current.value + "\" step=\"0.01\" max=\"100\" data-item_id=\""+current.value+"\"/>\
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
