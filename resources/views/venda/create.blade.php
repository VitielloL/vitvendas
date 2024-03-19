@extends('layout.nav')

@section('conteudo')
<div class="container my-4">
        <h2 style="margin-bottom:15px; padding-top:15px;"> Nova Venda </h2>

        <form action='{{route('venda.store')}}' method="POST">
            @csrf
            <p class="text-center bg-info text-white fw-bold">Dados da venda</p>

            <div class="form-group row">
                <div class="col-md-4">
                    <label class="form-label" for="titulo">Cliente: </label>
                    <select class="custom-select custom-select-md mb-3" name="cliente" id="cliente" required>
                        @foreach ( $dados['cliente'] as $dado )
                          <option value="{{$dado->id}}">{{$dado->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="valor">Produto: </label>
                    <select class="custom-select custom-select-md mb-3" name="produto" id="produto" required>
                        @foreach ( $dados['produto'] as $dado )
                          <option value="{{$dado->id}}">{{$dado->titulo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="descricao">Quantidade: </label>
                    <input type="text" class="form-control" id="quantidade" name="quantidade" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label class="form-label" for="titulo">Valor Unitario: </label>
                    <input type="text" class="form-control" id="valor_unitario" name="valor_unitario" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="valor">Subtotal: </label>
                    <input type="text" class="form-control" id="subtotal" name="subtotal" required>
                </div>
                <div class="col-md-2" style="margin-top:2%">
                    <button type ="submit "class="btn btn-success" id="adicionarProduto">+</button>
                </div>
            </div>

            <ul id="listaProdutos"></ul>

            <div class="mt-4 text-end">
                <button type ="submit "class="btn btn-success">Cadastrar</button>
                <a href="{{route('venda')}}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

@vite(['resources/js/venda.js'])