@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$seo[1]['meta_description']}}">

<!-- Compartilhamento Facebook e outras redes sociais sem protocolo definico -->
<meta property="og:type" content="website">
<meta property="og:description" content="{{$seo[1]['meta_description']}}">
<meta property="og:image" content="{{URL::asset(''.$seo[1]['imagem'])}}">

<!-- Compartilhamento Twitter -->
<meta property="twitter:description" content="{{$seo[1]['meta_description']}}">
<meta property="twitter:image" content="{{URL::asset(''.$seo[1]['imagem'])}}">
@endsection

@section('content')
<div class="small-off" style="width: 100px; height: 60px"></div>
<section>
    <div class="secao border img-thumbnail shadow-sm">
        <div class="secao-involucro">
            @include('web.fale-conosco.conteudo')
        </div>
    </div>
</section>

@endsection
