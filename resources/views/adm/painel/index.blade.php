@extends('adm.geral.estrutura-painel')
@section('area-especifica')


<div class="card">
    <div class="card-body">
        <div class="jumbotron">
            <h1 class="display-4">Bem-vindo!</h1>
            <p class="lead">{{Auth::user()->name}}, este é o painel de gestão de conteúdo do site ({{$site}}).</p>
            <hr class="my-4">
            <p>Para ser direcionado à página principal do site, clique no botão abaixo.</p>
            <a class="btn btn-primary btn-lg" href="{{url('home')}}" role="button">IR PARA O SITE</a>
        </div>
    </div>
</div>



@endsection