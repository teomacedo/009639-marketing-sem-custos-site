@foreach($conteudo as $row)
<div class="conteudo-composto-area">
    <div class="conteudo-composto">
        @if($row->imagem != '')
        <div class="conteudo-composto-img">
            <img src="{{url(''.$row->imagem)}}" class="img-thumbnail" width="100%" alt="{{$row->atributo_alt}}" title="{{$row->atributo_title}}">
        </div>
        @endif

        @if(($row->titulo != '') || ($row->subtitulo != '') || ($row->trecho != ''))
        <div class="conteudo-composto-texto">
            <div>
                @if(($row->titulo) != '')
                <h3 class="conteudo-composto-texto-titulo">
                    {!!$row->titulo!!}
                </h3>
                @endif
                @if(($row->subtitulo) != '')
                <p class="conteudo-composto-texto-subtitulo">
                    {!!$row->subtitulo!!}
                </p>
                @endif
                <p class="conteudo-composto-texto-descricao">
                    {!!$row->trecho!!}
                </p>
            </div>
        </div>
        @endif
    </div>
    @if($row->video != '')
    <div class="conteudo-composto-video">
        <div class='embed-responsive embed-responsive-16by9'>
            <iframe class='embed-responsive-item' src='{{$row->video}}' allowfullscreen></iframe>
        </div>
    </div>
    @endif
</div>
@endforeach
