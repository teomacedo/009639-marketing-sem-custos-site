@extends('web.geral.estrutura')

@section('head')
@if($seo[4]['meta_description'] == '')
<meta name="description" content="{{$seo[0]['meta_description']}}">
@else
<meta name="description" content="{{$seo[4]['meta_description']}}">
@endif
@endsection

@section('content')
@include('web.recursos.conteudo')
@endsection
