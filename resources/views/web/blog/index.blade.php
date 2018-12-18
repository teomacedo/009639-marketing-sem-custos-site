@extends('web.geral.estrutura')
@section('capa')
@include('web.geral.slide') 

@endsection

@section('content')
@foreach($artigos as $row)
<div class="miniatura-artigo-area">
    <a href="{{url('categoria'.'/'.$row->categoria()->id)}}">
        <div class="miniatura-artigo-area-nome-categoria">
            {{$row->categoria()->nome}}
        </div>
    </a>

    <a href="{{url('artigo'.'/'.$row->id)}}">
        <div class="miniatura-artigo-area-titulo">
            {!!$row->titulo!!}
        </div>
    </a>

    <a href="{{url('artigo'.'/'.$row->id)}}">
        @if($row->thumbnail == '')
        <div class="miniatura-artigo-area-imagem img-thumbnail" style="background-image: url('{{url(''.$row->imagem)}}')"></div>
        @else
        <div class="miniatura-artigo-area-imagem img-thumbnail" style="background-image: url('{{url(''.$row->thumbnail)}}')"></div>
        @endif
    </a>

    <div class="miniatura-artigo-area-nome-subtitulo">
        {!!substr($row->subtitulo, 0, 150)!!}
        @if(strlen($row->subtitulo) > 190)
        ...
        @endif
    </div>

    <div class="miniatura-artigo-area-nome-autor-data">
        {{$row->autor->name}} <b>{{$row->updated_at->format('d/m/Y')}}</b>
    </div>
</div>
@endforeach

@endsection
