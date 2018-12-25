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
                <h3>{!!$row->titulo!!}</h3>
            </div>
            @endif
            @if(($row->subtitulo) != '')
            <div class="conteudo-composto-texto-subtitulo">
                <h4>{!!$row->subtitulo!!}</h4>
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
    {!!$row->imagem_altura_mobile!!}
    <div class="conteudo-composto-foto img-thumbnail {{$row->class_img_altura_smal}}" style="{{$row->img_altura}} background-image: url('{{url(''.$row->imagem)}}')"></div>
    @endif
    <div class="conteudo-composto-texto">
        <div>
            @if(($row->titulo) != '')
            <div class="conteudo-composto-texto-titulo">
                <h3>{!!$row->titulo!!}</h3>
            </div>
            @endif
            @if(($row->subtitulo) != '')
            <div class="conteudo-composto-texto-subtitulo">
                <h4>{!!$row->subtitulo!!}</h4>
            </div>
            @endif
            <div class="conteudo-composto-texto-descricao">
                {!!$row->conteudo!!}
            </div>
        </div>
    </div>
</div>
@if(($row->video) != '')
<div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='{{$row->video}}' allowfullscreen></iframe>
</div>
@endif
@endforeach