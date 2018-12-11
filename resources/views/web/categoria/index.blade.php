@extends('web.geral.estrutura')
@section('content')

@include('web.geral.capa',[
'fotoCapa' => $categoria->imagem,
'nome' => $categoria->nome,
'subtitulo' => $categoria->subtitulo,
'descricao' => $categoria->descricao])

<div class="container">
    <div class="pagina-divisao-vertical">
        <div class="pagina-divisao-vertical-principal">
            <div style="display: flex; flex-wrap: wrap;">
                @foreach($artigos as $row)
                <div class="miniatura-artigo-area">
                    <a href="{{url('categoria'.'/'.$row->id)}}">
                        <div class="miniatura-artigo-area-nome-categoria">
                            {{$row->categoria()->nome}}
                        </div>
                    </a>
                    
                    <a href="{{url('artigo'.'/'.$row->categoria()->id)}}">
                        <div class="miniatura-artigo-area-titulo">
                            {!!$row->titulo!!}
                        </div>
                    </a>

                    <a href="{{url('artigo'.'/'.$row->categoria()->id)}}">
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
            </div>
        </div>
        <div class="pagina-divisao-vertical-secundario">

        </div>
    </div>
</div>

@endsection
