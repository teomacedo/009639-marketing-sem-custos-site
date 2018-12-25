@extends('web.geral.estrutura')
@section('capa')


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($categorias as $categoria)
        @if(count($categoria->artigos)>0)
        <div class="carousel-item {{$categoria->active}}">
            @include('web.geral.capa-categoria')
        </div>
        @endif
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


@endsection

@section('content')
@foreach($artigos as $row)
<div class="miniatura-artigo-area">
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

    <a href="{{url($row->pagina_url)}}">
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
