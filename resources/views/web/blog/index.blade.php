@extends('web.geral.estrutura')

@section('head')
@if($seo[3]['meta_description'] == '')
<meta name="description" content="{{$seo[0]['meta_description']}}">
@else
<meta name="description" content="{{$seo[3]['meta_description']}}">
@endif
@endsection

@section('capa')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($categorias as $categoria)
        @if(count($categoria->artigos)>0)
        <div class="carousel-item {{$categoria->active}}">
            <a href="{{url('categoria'.'/'.$categoria->pagina_url)}}">
                @include('web.geral.capa-categoria')
            </a>
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
<section>
    <div class="secao">
        <div class="secao-involucro">
            @foreach($artigos as $row)
            @include('web.geral.miniatura-artigo-area')
            @endforeach
        </div>
    </div>
</section>
@endsection
