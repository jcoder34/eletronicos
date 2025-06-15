class ItensVendidos {
    #totalEle;
    #itensEle;
    #descontosEle;
    #descontoItens;
    #promocaoItens;
    #nomeObj;

    constructor(nomeObj) {
        this.#totalEle = document.getElementById("total")
        this.#itensEle = document.getElementById("itens_id")
        this.#descontosEle = document.getElementById("descontos")
        this.#descontoItens = new Map()
        this.#promocaoItens = new Map()
        this.#nomeObj = nomeObj
    }
    
    get selected() {
        return Array.from(this.#itensEle.children).filter(x => x.selected)
    }

    #descontoInput(item_id, item_codigo) {
        return "<label for=\"desconto_" + item_id + "\">Desconto para " + item_codigo + ":</label>\
               <input onchange=\""+ this.#nomeObj +".desconto(this)\" type=\"number\" name=\"desconto_" + item_id + "\" step=\"0.01\" data-item_id=\"" + item_id + "\"" + (this.#descontoItens.has(item_id)? (" value=\""+ this.#descontoItens.get(item_id) +"\"") : "") + " />";
    }

    #promocaoInput(item_id, item_codigo) {
        return "<label for=\"promocao_" + item_id + "\">Promoção para " + item_codigo + " (%):</label>\
                <input onchange=\""+ this.#nomeObj +".promocao(this)\" type=\"number\" name=\"promocao_" + item_id + "\" step=\"0.01\" max=\"100\" data-item_id=\"" + item_id + "\"" + (this.#promocaoItens.has(item_id)? (" value=\""+ this.#promocaoItens.get(item_id) +"\"") : "") + " />";
    }

    updateTotal() {
        const total = this.selected.reduce((acc, current) =>
        acc + parseInt(parseFloat(current.dataset.preco_venda) * 100) - 
        (this.#promocaoItens.has(parseInt(current.value))? (this.#promocaoItens.get(parseInt(current.value)) * parseFloat(current.dataset.preco_venda)) : 0) -
        (this.#descontoItens.has(parseInt(current.value))? (this.#descontoItens.get(parseInt(current.value)) * 100) : 0), 0) / 100
    
        this.#totalEle.value = total.toFixed(2)
    }

    updateInputs() {
        this.#descontosEle.innerHTML = this.selected.reduce((acc, current) => acc +
                                                                        this.#descontoInput(parseInt(current.value),
                                                                                            current.dataset.codigo)
                                                                        +
                                                                        this.#promocaoInput(parseInt(current.value),
                                                                                            current.dataset.codigo),
                                                            "")
    }
    
    selectItens() {
        this.#totalEle.value = this.selected.reduce((acc, current) =>
                                                   acc + parseInt(parseFloat(current.dataset.preco_venda) * 100),
                                                   0) / 100
        this.updateInputs() 
    }

    addDesconto(item_id, value) {
        this.#descontoItens.set(parseInt(item_id), parseFloat(value))
    }
    
    desconto(ele) {
        this.addDesconto(ele.dataset.item_id, ele.value)
        this.updateTotal()
    }
    
    addPromocao(item_id, value) {
        this.#promocaoItens.set(parseInt(item_id), parseFloat(value))
    }

    promocao(ele) {
        this.addPromocao(ele.dataset.item_id, ele.value)
        this.updateTotal()
    }
}
