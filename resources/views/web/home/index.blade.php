@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$seo[0]['meta_description']}}">

<meta property="og:type" content="website" />
<meta property="og:description" content="{{$seo[0]['meta_description']}}">
<meta property="og:image" content="{{ URL::asset('photos/shares/artigos/categoria-b/thumbnail.jpg') }}" />
@endsection

@section('capa')
@include('web.geral.slide') 
@endsection

@section('content')
@include('web.chamada-principal.index')
<hr>
@include('web.clientes.index')
<hr>
@include('web.recursos.conteudo')
<hr>
@include('web.cases.index')
<hr>
@include('web.faqs.conteudo')
@endsection
