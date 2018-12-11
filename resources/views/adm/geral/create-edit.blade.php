@extends('adm.geral.estrutura-painel')
@section('area-especifica')


@if (count($errors) > 0)

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

﻿@include('adm.geral.tinymce', ['selector' => '.tinymce'])


<div class="card">
    <h5 class="card-header">{{$titulo ?? 'Formulário'}}</h5>
    <div class="card-body">
        @if(isset($dadosBase['model']->created_at))
        <p class="card-text"><strong>Data Cadastro: </strong> {{ $dadosBase['model']->created_at->format('d/m/Y H:i:s') }} - <strong>Data Atualização: </strong> {{ $dadosBase['model']->updated_at->format('d/m/Y H:i:s') }}</p>
        @endif
        @if(isset($dadosBase['model']->id))
        {!! Form::model($dadosBase['model'], ['url' => [url($dadosBase['diretorio']).'/'.$dadosBase['model']->id], 'class' => 'form', 'method' => 'put'])!!}
        @else
        {!!Form::open(['url' => [url($dadosBase['diretorio'])], 'class' => 'form'])!!}
        @endif

        @if($dadosBase['imagem']['active'] == 'yes')
        @include('adm.geral.input-imagem', ['label' => $dadosBase['imagem']['label'], 'campoNome' => 'imagem', 'campoValor' => $dadosBase['model']->imagem, 'id' => 'a'])
        @endif


        <div class="row">
            @include('adm.'.$dadosBase['nomeClasse'].'.create-edit')
        </div>
        <input type="hidden" name="foreign" value="{{$foreign ?? ''}}">

        <button class='btn btn-success' type='submit' value='submit'>
            <i class="fas fa-check-circle"></i> Salvar
        </button>
        {!! Form::close() !!}

    </div>
</div>
<br>

@foreach($dadosBase['createEditInclude'] as $row)
@if($row['active'] == 'yes')
<div class="card">
    <h5 class="card-header">{{$row['titulo'] ?? 'Seção'}}</h5>
    <div class="card-body">
        @include('adm.'.$dadosBase['nomeClasse'].'.'.$row['path'])
    </div>
</div>
<br>
@endif
@endforeach

<a href="{{ url($dadosBase['diretorio']) }}@if(isset($foreign))/{{$foreign}}@endif">
    <button type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-left"></i> Voltar</button>
</a>

@endsection
