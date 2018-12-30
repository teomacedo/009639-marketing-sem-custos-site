<div class="secao">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <div class="secao-involucro">
        <div class="secao-titulo">
            {!!$chamadaCase->titulo!!}
        </div>
        <div class="secao-subtitulo">
            {!!$chamadaCase->subtitulo!!}
        </div>
        <div class="cases-area">

            <div class="responsive">
                @foreach($cases as $row)
                <div class="border img-thumbnail shadow-sm">
                    <div class="cases-item">
                        <div class="cases-item-coluna-a">
                            @if($row->video != '')
                            <div class="embed-responsive embed-responsive-16by9 img-thumbnail shadow-sm">
                                <iframe class="embed-responsive-item" src="{{$row->video}}"></iframe>
                            </div>
                            <div class="conteudo-composto-texto-subtitulo small-off" style="margin-top: 13px;"><h4>{!!$row->titulo!!}</h4></div>
                            @else
                            <div class="conteudo-composto-texto-subtitulo"><h4>{!!$row->titulo!!}</h4></div>
                            <div class="faq-lista-area-item-resposta">{!!$row->citacao!!}</div>
                            @endif
                        </div>
                        <div class="cases-item-coluna-b border img-thumbnail shadow-sm">
                            <div class="d-flex justify-content-center" style="width: 100%;">
                                <div class="cases-item-foto shadow-sm" style="background-image: url('{{url(''.$row->imagem)}}')"></div>
                            </div>
                            <div class="faq-lista-area-item-resposta cases-item-nome">
                                {{$row->nome_cliente}}
                            </div>
                            <div class="d-flex justify-content-center" style="width: 100%">
                                @if($row->link_artigo != '')
                                <a href="{{$row->link_artigo}}"><button type="button" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> Detalhes</a></button></a>
                                @else
                                <a href="{{$row->link_loja}}"><button type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-right"></i> {{$row->nome_loja}}</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>

</div>



<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
$('.responsive').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
</script>

<style type="text/css">
    .slick-prev.slick-arrow:before, .slick-next.slick-arrow:before{
        color: #4181C2;

    }


    .slick-next, .slick-prev {
        z-index: 4;
    }

    @media (max-width: 992px) {
        .slick-next {
            right: -7px;
        }

        .slick-prev {
            left: -7px;
        }
    }
</style>
