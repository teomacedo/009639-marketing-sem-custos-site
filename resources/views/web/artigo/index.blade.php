@extends('web.geral.estrutura')

@section('capa')
@include('web.geral.capa',['fotoCapa' => $artigo->imagem])
@endsection

@section('content')

<a href="{{url('categoria'.'/'.$artigo->categoria()->id)}}">
    <div class="categoria-botao">
        {!!$artigo->categoria()->nome!!}
    </div>
</a>
<div class="capa-desktop-titulo">
    {!!$artigo->titulo!!}
</div>
<div class="capa-desktop-subtitulo">
    {!!$artigo->subtitulo!!}
</div>

@include('web.geral.conteudo-composto')
<div class="artigo-autor-area">
    <div class="artigo-autor-area-foto" style="background-image: url('{{url(''.$artigo->autor->imagem)}}')"></div>
    <div class="artigo-autor-area-inf">
        <div class="artigo-autor-area-inf-nome">
            {{$artigo->autor->name}}
        </div>
        <div class="artigo-autor-area-inf-data">
            <i class="far fa-calendar-alt"></i> {{$artigo->updated_at->format('d/m/Y')}}
        </div>
        <div class="artigo-autor-area-inf-bio">
            {!!$artigo->autor->descricao!!}
        </div>
    </div>
</div>
@endsection
