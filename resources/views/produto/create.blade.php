@extends('layout.nav')

@section('conteudo')
<div class="container my-4">
        <h2 style="margin-bottom:15px; padding-top:15px;"> Novo Produto </h2>

        <form action='{{route('produto.store')}}' method="POST">
            @csrf
            <p class="text-center bg-info text-white fw-bold">Dados do Produto</p>

            <div class="form-group row">
                <div class="col-md-5">
                    <label class="form-label" for="titulo">Título: </label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="valor">Valor: </label>
                    <input type="text" class="form-control" id="valor" name ="valor" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="descricao">Descrição: </label>
                    <input type="text" class="form-control" id="descricao" name="descricao" required>
                </div>
            </div>

            <div class="mt-4 text-end">
                <button type ="submit "class="btn btn-success">Cadastrar</button>
                <a href="{{route('produto')}}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection