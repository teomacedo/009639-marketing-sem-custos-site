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
                <div class="cases-item border img-thumbnail shadow-sm">
                    <div class="conteudo-composto-texto-subtitulo" style="min-height: 55px"><h4>{!!$row->titulo!!}</h4></div>
                    <div style="min-height: 190px;">
                        @if($row->video != '')
                        <div class="embed-responsive embed-responsive-16by9 img-thumbnail shadow-sm" style="padding: 10px;">
                            <iframe class="embed-responsive-item" src="{{$row->video}}" allowfullscreen></iframe>
                        </div>
                        @else
                        <div class="conteudo-composto-texto-descricao">{!!$row->citacao!!}</div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center" style="width: 100%; margin-top: 30px;">
                        <div class="cases-item-foto shadow-sm border" style="background-image: url('{{url(''.$row->imagem)}}')"></div>
                    </div>
                    <div class="cases-item-nome">
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
                @endforeach
            </div>

        </div>

    </div>
    <div class="d-flex justify-content-center" style="width: 100%; margin-top: 30px;">
        <a href="{{$chamadaCase->botao_link}}"><button type="button" class="btn btn-outline-primary">{{$chamadaCase->botao_texto}}</button></a>
    </div>
</div>



<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
$('.responsive').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
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

    .slick-slide{
        min-height: 500px;
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
