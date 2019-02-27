@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$seo[0]['meta_description']}}">

<!-- Compartilhamento Facebook e outras redes sociais sem protocolo definico -->
<meta property="og:type" content="website">
<meta property="og:description" content="{{$seo[0]['meta_description']}}">
<meta property="og:image" content="{{URL::asset(''.$seo[0]['imagem'])}}">

<!-- Compartilhamento Twitter -->
<meta property="twitter:description" content="{{$seo[0]['meta_description']}}">
<meta property="twitter:image" content="{{URL::asset(''.$seo[0]['imagem'])}}">
@endsection

@section('capa')
@include('web.geral.slide') 
@endsection

@section('content')
@include('web.chamada-principal.index')

@include('web.clientes.index')

@include('web.recursos.conteudo')

@include('web.cases.index')

@include('web.faqs.conteudo')
@endsection
