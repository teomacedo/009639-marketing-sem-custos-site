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

<!-- Plugin ne rolagem -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

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
