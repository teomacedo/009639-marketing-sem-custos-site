@extends('web.geral.estrutura')
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
