@extends('web.geral.estrutura')

@section('capa')
@include('web.geral.capa-categoria')
@endsection

@section('content')
<div class="secao">
    <div class="secao-involucro">
        @foreach($artigos as $row)
        @include('web.geral.miniatura-artigo-area')
        @endforeach
    </div>
</div>
@endsection
