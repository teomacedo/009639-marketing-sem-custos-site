@extends('web.geral.estrutura')
@section('capa')


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($categorias as $categoria)
        @if(count($categoria->artigos)>0)
        <div class="carousel-item {{$categoria->active}}">
            @include('web.geral.capa-categoria')
        </div>
        @endif
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


@endsection

@section('content')
<div class="secao">
    <div class="secao-involucro">
        @foreach($artigos as $row)
        @include('web.geral.miniatura-artigo-area')
        @endforeach
    </div>
</div>
@endsection
