@extends('layout.nav')

@section('conteudo')
    <div class="container my-4">
        @if (!empty($dado))
            @foreach ( $dado as $d )
                <h2 class="fw-bold text-uppercase" style="margin-bottom: 15px; padding-top:15px;">{{$d->titulo}}</h2>

                <form>
                    <p class="text-center bg-info text-white fw-bold">Dados do Produto</p>
    
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label class="form-label" for="valor">Valor: </label>
                            <input type="text" class="form-control" id="valor" value="{{$d->valor}}" disabled>
                        </div>
                        <div class="col-md-10">
                            <label class="form-label" for="descricao">Descrição: </label>
                            <input type="text" class="form-control" id="descricao" value="{{$d->descricao}}" disabled>
                        </div>
                    </div>

                    <div class="mt-4 text-left">
                        <a href="{{route('produto')}}" class="btn btn-secondary">Voltar</a>
                    </div>
                </form>
            @endforeach
        @endif
    </div>
@endsection