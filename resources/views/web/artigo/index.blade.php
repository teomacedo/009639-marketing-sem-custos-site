@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$artigo->meta_description}}">

<!-- Compartilhamento Facebook e outras redes sociais sem protocolo definico -->
<meta property="og:type" content="article">
<meta property="og:description" content="{{$artigo->meta_description}}">
<meta property="og:image" content="{{url($artigo->imagem)}}">

<meta property="article:published_time" content="{{$artigo->updated_at->format('d/m/Y')}}">
<meta property="article:author" content="{{$artigo->autor->name}}">
<meta property="article:section" content="{!!$artigo->categoria()->nome!!}">

<!-- Compartilhamento Twitter -->
<meta property="twitter:description" content="{{$artigo->meta_description}}">
<meta property="twitter:image" content="{{url($artigo->imagem)}}">

@endsection

@section('capa')
@include('web.geral.capa-artigo')
@endsection

@section('content')
<section>
    <article class="secao">
        <div class="secao-involucro">
            <div class="artigo-cabecalho">
                <a href="{{url('categoria'.'/'.$artigo->categoria()->pagina_url)}}">
                    <div class="categoria-botao">
                        {!!$artigo->categoria()->nome!!}
                    </div>
                </a>
                <h2 class="capa-titulo">
                    {!!$artigo->titulo!!}
                </h2>
                <div class="capa-subtitulo">
                    <p>{!!$artigo->subtitulo!!}</p>
                </div>
                @if($banner->ativo != 0)
                @if($banner->banner_blog_horizontal != '')                            
                <a href="{{$banner->botao_link}}">
                    <img src="{{ url(''.$banner->banner_blog_horizontal)}}" width="100%" class="banner-blog-horizontal" alt="{!!strip_tags($banner->titulo_desktop)!!}" title="{!!strip_tags($banner->titulo_desktop)!!}">
                </a>
                @endif
                @endif
            </div>
            @include('web.geral.conteudo-composto')
        </div>
    </article>
</section>
<section>
    <div class="secao">
        <div class="secao-involucro">
            <div class="artigo-rodape">
                <div class="artigo-autor-area">
                    <div class="artigo-autor-area-foto" style="background-image: url('{{url(''.$artigo->autor->imagem)}}')"></div>
                    <div class="artigo-autor-area-inf">
                        <h2 class="artigo-autor-area-inf-nome">
                            {{'Autor: '.$artigo->autor->name}}
                        </h2>
                        <div class="artigo-autor-area-inf-data">
                            <i class="far fa-calendar-alt"></i> {{$artigo->updated_at->format('d/m/Y')}}
                        </div>
                    </div>
                </div>
                <div class="artigo-autor-area-inf-bio">
                    <p>{!!$artigo->autor->descricao!!}</p>
                </div>

                @if($banner->ativo != 0)
                @if($banner->banner_blog_horizontal != '')
                <a href="{{$banner->botao_link}}">
                    <img src="{{ url(''.$banner->banner_blog_horizontal)}}" width="100%" class="banner-blog-horizontal" alt="{!!strip_tags($banner->titulo_desktop)!!}" title="{!!strip_tags($banner->titulo_desktop)!!}">
                </a>
                @endif
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
