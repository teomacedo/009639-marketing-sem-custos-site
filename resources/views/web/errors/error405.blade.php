@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$seo[6]['meta_description']}}">

<!-- Compartilhamento Facebook e outras redes sociais sem protocolo definico -->
<meta property="og:type" content="website">
<meta property="og:description" content="{{$seo[6]['meta_description']}}">
<meta property="og:image" content="{{URL::asset(''.$seo[6]['imagem'])}}">

<!-- Compartilhamento Twitter -->
<meta property="twitter:description" content="{{$seo[6]['meta_description']}}">
<meta property="twitter:image" content="{{URL::asset(''.$seo[6]['imagem'])}}">
@endsection

@section('content')
<style type="text/css">
    body{
        background-color: #fbfbfb !important;
    }
    .secao{
        background-color: #fbfbfb !important;
    }
</style>
<section>
<div class="secao">
    <div class="secao-involucro">
        <h2 class="secao-titulo">Erro 405</h2>
        <p class="secao-subtitulo">
            Algo errado não está certo :(.<br><br>
            <img src="{{url('/photos/shares/geral/error-404.gif')}}" alt="John Travolta Meme" title="John Travolta Meme">
        </p>
        
    </div>
</div>
</section>

@endsection
