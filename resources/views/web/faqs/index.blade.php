@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$seo[5]['meta_description']}}">

<!-- Compartilhamento Facebook e outras redes sociais sem protocolo definico -->
<meta property="og:type" content="website">
<meta property="og:description" content="{{$seo[5]['meta_description']}}">
<meta property="og:image" content="{{URL::asset(''.$seo[5]['imagem'])}}">

<!-- Compartilhamento Twitter -->
<meta property="twitter:description" content="{{$seo[5]['meta_description']}}">
<meta property="twitter:image" content="{{URL::asset(''.$seo[5]['imagem'])}}">
@endsection

@section('content')
@include('web.faqs.conteudo')
@endsection