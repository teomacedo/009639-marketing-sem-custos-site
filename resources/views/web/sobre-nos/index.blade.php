@extends('web.geral.estrutura')
@section('head')
@if($seo[1]['meta_description'] == '')
<meta name="description" content="{{$seo[0]['meta_description']}}">
@else
<meta name="description" content="{{$seo[1]['meta_description']}}">
@endif
@endsection

@section('content')
<section>
    <div class="secao">
        <div class="secao-involucro">
            @include('web.geral.conteudo-composto')
        </div>
    </div>
</section>
@endsection
