@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$categoria->meta_description}}">
@endsection

@section('capa')
@include('web.geral.capa-categoria')
@endsection

@section('content')
<section>
    <div class="secao">
        <div class="secao-involucro">
            @foreach($artigos as $row)
            @include('web.geral.miniatura-artigo-area')
            @endforeach
        </div>
    </div>
</section>
@endsection
