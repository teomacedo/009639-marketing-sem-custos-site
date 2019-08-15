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
@include('web.geral.slide') 
@endsection

@section('content')
<section>
    <div class="secao border img-thumbnail shadow-sm">
        <div class="secao-involucro">
            @foreach($artigos as $row)
            @include('web.geral.miniatura-artigo-area')
            @endforeach
        </div>
    </div>
</section>
@endsection
