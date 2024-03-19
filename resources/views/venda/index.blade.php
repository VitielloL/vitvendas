@extends('layout.nav')

@section('conteudo')
    <div class="container my-4">
        <div style="margin-bottom:15px; padding-top:15px; display:flex; justify-content:space-between; align-items:center">
            <h2>Lista de Vendas</h2>
            <a href='{{route('venda.novo')}}' class='btn btn-success' style="height: 40px;">Cadastrar</a>
        </div>

        @if (!empty($dados))
            <table class="table table-light table-striped">
                <thead class="table-info">
                    <tr>
                        <td>Numero da Venda</td>
                        <td>Nome do Cliente</td>
                        <td>Forma de Pagamento</td>
                        <td>Data da Venda</td>
                        <td>Valor da Venda</td>
                        <td>Ações</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $dados as $dado )
                        @php
                            $linkReadMore = url('/venda/' . $dado->id);
                            $linkEditItem = url ('/venda/editar/' . $dado->id);
                            $linkRemoveItem = url ('/venda/remover/' . $dado->id);
                        @endphp
                        <tr>
                            <td style="vertical-align:middle">{{$dado->id}}</td>
                            <td style="vertical-align:middle"><span class="text-success" style="font-weight:bold"></span>{{$dado->cliente->nome}}</td>
                            <td style="vertical-align:middle">{{$dado->forma_de_pagamento}}</td>
                            <td style="vertical-align:middle">{{$dado->data_venda}}</td>
                            <td style="vertical-align:middle">{{$dado->total_venda}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href={{$linkReadMore}} class="btn btn-info mr-2"><i class="fa fa-eye mr-1 mb-0" aria-hidden="true"></i> Ver Mais</a>
                                    <a href={{$linkEditItem}} class="btn btn-warning mr-2" style="color:white"><i class="fa fa-pen mr-1 mb-0" aria-hidden="true"></i>Editar</a>
                                    <a href={{$linkRemoveItem}} class="btn btn-danger mr-2"><i class="fa fa-trash mr-1 mb-0" aria-hidden="true"></i>Excluir</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection