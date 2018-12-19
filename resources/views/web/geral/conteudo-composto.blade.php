@foreach($conteudo as $row)
<div class="conteudo-composto small-off">
    @if(($row->imagem) != '')
    <div class="conteudo-composto-foto img-thumbnail" style="{{$row->img_altura}} {{$row->onlyimg}} background-image: url('{{url(''.$row->imagem)}}')">

    </div>
    @endif
    <div class="conteudo-composto-texto" style="{{$row->order}} {{$row->padding}} {{$row->noimg}}">
        <div>
            @if(($row->titulo) != '')
            <div class="conteudo-composto-texto-titulo">
                {!!$row->titulo!!}
            </div>
            @endif
            @if(($row->subtitulo) != '')
            <div class="conteudo-composto-texto-subtitulo">
                {!!$row->subtitulo!!}
            </div>
            @endif
            <div class="conteudo-composto-texto-descricao">
                {!!$row->conteudo!!}
            </div>
        </div>
    </div>
</div>

<div class="conteudo-composto desktop-off">
    @if(($row->imagem) != '')
    <div class="conteudo-composto-foto img-thumbnail" style="{{$row->img_altura}} background-image: url('{{url(''.$row->imagem)}}')"></div>
    @endif
    <div class="conteudo-composto-texto">
        <div>
            @if(($row->titulo) != '')
            <div class="conteudo-composto-texto-titulo">
                {!!$row->titulo!!}
            </div>
            @endif
            @if(($row->subtitulo) != '')
            <div class="conteudo-composto-texto-subtitulo">
                {!!$row->subtitulo!!}
            </div>
            @endif
            <div class="conteudo-composto-texto-descricao">
                {!!$row->conteudo!!}
            </div>
        </div>
    </div>
</div>
@endforeach