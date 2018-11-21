@extends('adm.geral.estrutura-painel')
@section('area-especifica')


@if (count($errors) > 0)
<div class="alert alert-danger alert-errors">
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
        @if(isset($model->created_at))
        <p class="card-text"><strong>Data Cadastro: </strong> {{ $model->created_at->format('d/m/Y H:i:s') }} - <strong>Data Atualização: </strong> {{ $model->updated_at->format('d/m/Y H:i:s') }}</p>
        @endif
        @if(isset($model))
        {!! Form::model($model, ['url' => [url($diretorio).'/'.$model->id], 'class' => 'form', 'method' => 'put'])!!}
        @else
        {!!Form::open(['url' => [url($diretorio)], 'class' => 'form'])!!}
        @endif

        @if($imagem['active'] == 'yes')
        <div class="row">
            <div class="form-group col-md-12">
                <label>{{$imagem['label']}}</label>
                <div class="input-group">
                    <span class="input-group-prepend">
                        <div id="lfm" data-input="thumbnail" style="height:40px; line-height:25px;" data-preview="holder" class="btn btn-primary">
                            <i class="fas fa-cloud-upload-alt"></i> Selecione o Arquivo
                        </div>
                    </span>
                    {!! Form::text('imagem', null, ['class' => 'form-control', 'placeholder' => '', 'readonly' => 'readonly', 'id' => 'thumbnail'])!!}
                </div>
                @if(isset($model->imagem))
                <img id="holder" src="{{ url($model->imagem)}}">
                @else
                <img id="holder" src="">
                @endif
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#lfm').filemanager('image');
            });
        </script>
        @endif

        
        <div class="row">
            @include('adm.'.$path.'.formulario')
        </div>

        <button class='btn btn-success' type='submit' value='submit'>
            <i class="fas fa-check-circle"></i> Salvar
        </button>
        {!! Form::close() !!}

    </div>
</div>
<br>
@if(isset($createEditInclude))
@foreach($createEditInclude as $row)
@if($row['active'] == 'yes')
<div class="card">
    <h5 class="card-header">{{$row['titulo'] ?? 'Seção'}}</h5>
    <div class="card-body">
        @include('adm.'.$path.'.'.$row['path'])
    </div>
</div>
<br>
@endif
@endforeach
@endif

<a href="{{ url($diretorio) }}">
    <button type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-left"></i> Voltar</button>
</a>

@endsection
