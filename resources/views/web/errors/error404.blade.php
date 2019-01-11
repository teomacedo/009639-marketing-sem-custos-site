@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$seo[0]['meta_description']}}">
@endsection

@section('content')
<style type="text/css">
    body{
        background-color: #fbfbfb;
    }
</style>
<section>
<div class="secao">
    <div class="secao-involucro">
        <h2 class="secao-titulo">Erro 404</h2>
        <p class="secao-subtitulo">
            Página não encontrada.<br><br>
            <img src="{{url('/photos/shares/geral/error-404.gif')}}" alt="John Travolta Meme" title="John Travolta Meme">
        </p>
        
    </div>
</div>
</section>

@endsection
