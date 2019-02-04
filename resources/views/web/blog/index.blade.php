@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$seo[3]['meta_description']}}">

<!-- Compartilhamento Facebook e outras redes sociais sem protocolo definico -->
<meta property="og:type" content="website">
<meta property="og:description" content="{{$seo[3]['meta_description']}}">
<meta property="og:image" content="{{URL::asset(''.$seo[3]['imagem'])}}">

<!-- Compartilhamento Twitter -->
<meta property="twitter:description" content="{{$seo[3]['meta_description']}}">
<meta property="twitter:image" content="{{URL::asset(''.$seo[3]['imagem'])}}">
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
        <span class="sr-only">Previouss</span>
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
