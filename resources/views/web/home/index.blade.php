@extends('web.geral.estrutura')
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
