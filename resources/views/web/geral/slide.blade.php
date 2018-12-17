<div class="slide-desktop" style="background-image: url('{{url(''.$row->imagem)}}')">

    <div class="slide-desktop-pelicula">
        <div class="container">
            <div class="slide-desktop-conteudo">
                <div class="slide-desktop-conteudo-titulo">
                    {!!$row->titulo_desktop!!}
                </div>
                <div class="slide-desktop-conteudo-subtitulo">
                    {!!$row->subtitulo_desktop!!}
                </div>
                @if($row->botao_texto != '')
                <a href="{{$row->botao_link}}">
                    <div class="slide-desktop-conteudo-botao">
                        <div>{{$row->botao_texto}}</div>
                    </div>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
