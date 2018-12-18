<div class="small-off">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($slides as $row)
            @if($row->ativo != 0)
            <div class="carousel-item {{$row->active}}">
                <div class="slide-desktop small-off" style="background-image: url('{{url(''.$row->imagem)}}')">
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
            </div>
            @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="desktop-off">
    <div id="carouselExampleControlsSmall" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($slides as $row)
            <div class="carousel-item {{$row->active}}" style="background-image: url('{{url(''.$row->imagem_small)}}')">
                <div class="slide-small-pelicula">
                    <div class="slide-small-foto-principal" style="background-image: url('{{url(''.$row->imagem_small)}}')"></div>
                    <div class="slide-small-texto-area-conteudo">
                        <div class="slide-small-texto-area-conteudo-titulo">
                            {!!$row->titulo_small!!}
                            <div class="slide-small-texto-area-conteudo-titulo-divisao"></div>
                        </div>
                        <div class="slide-small-texto-area-conteudo-subtitulo">
                            {!!$row->subtitulo_small!!}
                        </div>
                        <a href="{{$row->botao_link}}">
                            <div class="slide-small-texto-area-conteudo-botao">
                                <div class="slide-small-texto-area-conteudo-botao-circulo">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControlsSmall" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControlsSmall" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>