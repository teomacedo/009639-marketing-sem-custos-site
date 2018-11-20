@if(isset($model))
{!! Form::model($model, ['route' => ['usuario.update', $model->id], 'class' => 'form', 'method' => 'put'])!!}

<div class="row">
    {!! Form::hidden('name', null)!!}
    {!! Form::hidden('email', null)!!}
    {!! Form::hidden('funcao', null)!!}
    <div class="form-group col-md-3">
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Nova Senha' ])!!}
    </div>
    <div class="form-group col-md-6">
        <button class='btn btn-success' type='submit' value='submit'>
            <i class="fas fa-check-circle"></i> Salvar
        </button>
    </div>
</div>


{!! Form::close() !!}
@endif





