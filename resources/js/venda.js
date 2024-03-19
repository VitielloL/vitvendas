document.addEventListener('DOMContentLoaded', function() {
    const quantidadeInput = document.getElementById('quantidade');
    const valorUnitarioInput = document.getElementById('valor_unitario');
    const subtotalInput = document.getElementById('subtotal');
    const produtoSelect = document.getElementById('produto');
    const listaProdutos = document.getElementById('listaProdutos');

    quantidadeInput.addEventListener('input', calcularSubtotal);
    valorUnitarioInput.addEventListener('input', calcularSubtotal);

    document.getElementById('adicionarProduto').addEventListener('click', function(event) {
        event.preventDefault();
        
        const quantidade = parseFloat(quantidadeInput.value) || 0;
        const valorUnitario = parseFloat(valorUnitarioInput.value) || 0;
        const subtotal = parseFloat(subtotalInput.value) || 0;

        const produtoSelecionado = produtoSelect.options[produtoSelect.selectedIndex].text;

        if (quantidade > 0 && valorUnitario > 0) {
            const itemLista = document.createElement('li');
            itemLista.textContent = `${quantidade} x ${produtoSelecionado} - Subtotal: R$ ${subtotal.toFixed(2)}`;
            listaProdutos.appendChild(itemLista);

            // Limpar campos após adicionar o produto à lista
            quantidadeInput.value = '';
            valorUnitarioInput.value = '';
            subtotalInput.value = '';
            produtoSelect.selectedIndex = 0;
        } else {
            alert('Por favor, preencha a quantidade e o valor unitário corretamente.');
        }
    });

    function calcularSubtotal() {
        const quantidade = parseFloat(quantidadeInput.value) || 0;
        const valorUnitario = parseFloat(valorUnitarioInput.value) || 0;
        const subtotal = quantidade * valorUnitario;
        subtotalInput.value = subtotal.toFixed(2); // Arredondar para 2 casas decimais
    }
});

document.getElementById('parcelas').addEventListener('input', function() {
    const numParcelas = parseInt(this.value);
    if (numParcelas > 12) {
        alert('O número máximo de parcelas é 12.');
        this.value = 12; // Define o valor máximo como 12 se exceder
        return;
    }

    const subtotal = parseFloat(document.getElementById('subtotal').value) || 0;
    const camposParcelas = document.getElementById('camposParcelas');

    // Limpa os campos de parcelas anteriores
    camposParcelas.innerHTML = '';

    // Cria novos campos de parcelas
    for (let i = 1; i <= numParcelas; i += 4) {
        const divLinha = document.createElement('div');
        divLinha.classList.add('form-row', 'mb-2', 'col-md-12');

        for (let j = i; j <= i + 3; j++) {
            if (j <= numParcelas) {
                const divParcela = document.createElement('div');
                divParcela.classList.add('col-md-3');

                const labelParcela = document.createElement('label');
                labelParcela.classList.add('form-label');
                labelParcela.textContent = `Parcela ${j}: `;
                divParcela.appendChild(labelParcela);

                const valorParcela = subtotal / numParcelas;
                const divValorParcela = document.createElement('div');
                divValorParcela.classList.add('form-group');
                const inputValorParcela = document.createElement('input');
                inputValorParcela.type = 'text';
                inputValorParcela.classList.add('form-control');
                inputValorParcela.name = `valor_parcela_${j}`;
                inputValorParcela.placeholder = 'Valor da Parcela';
                inputValorParcela.value = valorParcela.toFixed(2);
                inputValorParcela.addEventListener('input', function() {
                    const valorAtual = parseFloat(this.value) || 0;
                    const valorRestante = subtotal - valorAtual;
                    const numParcelasRestantes = numParcelas - j;
                    const valorParcelasRestantes = valorRestante / numParcelasRestantes;
                    for (let k = j + 1; k <= numParcelas; k++) {
                        const inputParcela = document.getElementsByName(`valor_parcela_${k}`)[0];
                        inputParcela.value = valorParcelasRestantes.toFixed(2);
                    }
                });
                divValorParcela.appendChild(inputValorParcela);
                divParcela.appendChild(divValorParcela);

                const divDataParcela = document.createElement('div');
                divDataParcela.classList.add('form-group');
                const inputDataParcela = document.createElement('input');
                inputDataParcela.type = 'date';
                inputDataParcela.classList.add('form-control');
                inputDataParcela.name = `data_parcela_${j}`;
                inputDataParcela.placeholder = 'Data de Vencimento';
                divDataParcela.appendChild(inputDataParcela);
                divParcela.appendChild(divDataParcela);

                divLinha.appendChild(divParcela);
            }
        }

        camposParcelas.appendChild(divLinha);
    }
});