@extends('layout.nav')

@section('conteudo')
    <div class="container my-4">
        <h2 style="margin-bottom: 15px; padding-top:15px;"> Editar Produto </h2>

        <form  action="<?= url('/produto/update',['id' => $dado->id]);?>" method="post">
            @csrf
            @method('PUT')

            <p class="text-center bg-info text-white fw-bold">Dados do Produto</p>

            <div class="form-group row">
                <div class="col-md-5">
                    <label class="form-label" for="titulo">Título: </label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{$dado->titulo}}">
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="valor">Valor: </label>
                    <input type="text" class="form-control" id="valor" name="valor" value="{{$dado->valor}}">
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="descricao">Descrição: </label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="{{$dado->descricao}}">
                </div>
            </div>

            <div class="mt-4 text-left">
                <button type="submit" class="btn btn-success text-white">Salvar</button>
                <a href="{{route('produto')}}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
@endsection