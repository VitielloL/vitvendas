// document.addEventListener('DOMContentLoaded', function() {
//     const quantidadeInput = document.getElementById('quantidade');
//     const valorUnitarioInput = document.getElementById('valor_unitario');
//     const subtotalInput = document.getElementById('subtotal');

//     quantidadeInput.addEventListener('input', calcularSubtotal);
//     valorUnitarioInput.addEventListener('input', calcularSubtotal);

//     function calcularSubtotal() {
//         const quantidade = parseFloat(quantidadeInput.value) || 0;
//         const valorUnitario = parseFloat(valorUnitarioInput.value) || 0;
//         const subtotal = quantidade * valorUnitario;
//         subtotalInput.value = subtotal.toFixed(2); // Arredondar para 2 casas decimais
//     }
// });

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