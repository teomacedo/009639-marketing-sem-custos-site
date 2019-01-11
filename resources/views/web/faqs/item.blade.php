@extends('web.geral.estrutura')

@section('head')
@if($seo[5]['meta_description'] == '')
<meta name="description" content="{{$seo[0]['meta_description']}}">
@else
<meta name="description" content="{{$seo[5]['meta_description']}}">
@endif
@endsection

@section('content')
@include('web.faqs.conteudo')
@endsection