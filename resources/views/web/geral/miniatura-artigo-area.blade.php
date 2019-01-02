<div class="miniatura-artigo-area">
    <div class="miniatura-artigo-area-col-a">
        <a href="{{url('categoria'.'/'.$row->categoria()->pagina_url)}}">
            <div class="miniatura-artigo-area-nome-categoria">
                {{$row->categoria()->nome}}
            </div>
        </a>

        <a href="{{url($row->pagina_url)}}">
            <div class="miniatura-artigo-area-titulo">
                {!!$row->titulo!!}
            </div>
        </a>

        <div class="miniatura-artigo-area-nome-subtitulo">
            {!!substr($row->subtitulo, 0, 150)!!}
            @if(strlen($row->subtitulo) > 190)
            ...
            @endif
        </div>

        <div class="miniatura-artigo-area-nome-autor-data">
            {{$row->autor->name}}<br><b>{{$row->updated_at->format('d/m/Y')}}</b>
        </div>
    </div>
    <div class="miniatura-artigo-area-col-b">
        <a href="{{url($row->pagina_url)}}">
            @if($row->thumbnail == '')
            <div class="miniatura-artigo-area-imagem img-thumbnail" style="background-image: url('{{url(''.$row->imagem)}}')"></div>
            @else
            <div class="miniatura-artigo-area-imagem img-thumbnail" style="background-image: url('{{url(''.$row->thumbnail)}}')"></div>
            @endif
        </a>
    </div>
</div>