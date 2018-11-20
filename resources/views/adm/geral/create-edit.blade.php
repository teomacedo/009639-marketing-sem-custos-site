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
@if(isset($include))
@foreach($include as $row)
<div class="card">
    <h5 class="card-header">{{$row['titulo'] ?? 'Seção'}}</h5>
    <div class="card-body">
        @include('adm.'.$path.'.'.$row['path'])
    </div>
</div>
<br>
@endforeach
@endif

<a href="{{ url($diretorio) }}">
    <button type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-left"></i> Voltar</button>
</a>

@endsection
