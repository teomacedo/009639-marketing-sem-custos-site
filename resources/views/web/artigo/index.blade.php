@extends('web.geral.estrutura')
@section('content')

@include('web.geral.capa',[
'categoria' => $artigo->categoria()->nome,
'categoriaId' => $artigo->categoria()->id,
'fotoCapa' => $artigo->imagem,
'titulo' => $artigo->titulo,
'subtitulo' => $artigo->subtitulo])
<div class="container">
    <div class="pagina-divisao-vertical">
        <div class="pagina-divisao-vertical-principal">
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
        </div>
        <div class="pagina-divisao-vertical-secundario">

        </div>
    </div>
</div>



@endsection
