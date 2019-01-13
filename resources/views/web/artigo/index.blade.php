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
                <!-- Botão compartilhar Twitter -->
                <a href="https://twitter.com/intent/tweet?original_referer={{'http://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}&text={{$artigo->titulo}}&url={{'https://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}" rel="nofollow" target="_blank">Twitter</a>
                <!-- Botão compartilhar WhatsApp -->
                <a href="https://api.whatsapp.com/send?text={{$artigo->titulo.' '}}{{'http://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}" rel="nofollow" target="_blank">WhatsApp (Teste)</a>

                <!-- Botão compartilhar Facebook -->
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="fb-share-button" data-href="{{'http://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{'http://.'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}}};src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>





                <h2 class="capa-titulo">                
                    {!!$artigo->titulo!!}
                </h2>
                <div class="capa-subtit       ulo">
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
