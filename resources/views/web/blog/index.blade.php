@extends('web.geral.estrutura')
@section('capa')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php $active = 'active'; ?>
        @foreach($categorias as $row)
        @if(count($row->artigos)>0)
        <div class="carousel-item {{$active}}">
            <a href="{{url('categoria'.'/'.$row->id)}}">
                @include('web.geral.capa',[
                'fotoCapa' => $row->imagem,
                'nome' => $row->nome,
                'subtitulo' => $row->subtitulo,
                'descricao' => $row->descricao])
            </a>
        </div>
        <?php $active = ''; ?>
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
