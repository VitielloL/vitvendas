<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
/*
    precisa associar o cliente - select com clients deve mostrar os nomes
    precisa associar os produtos - select com produtos deve mostrar quantidade e valor
    deve mostrar o subtotal em algum local na tela
    forma de pagamento - select com formas de pagamento 
    escolher quantidade de parcelas
    cada parcela deve ter a data e o valor disponivel para alterar
    pode adicionar mais de 1 produto por venda
    e editar excluir os produtos dessa venda
    validar parcelas e datas podendo modificar e tendo q estar corretas antes de conseguir salvar
*/
}
