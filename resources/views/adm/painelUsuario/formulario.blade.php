<div class="form-group col-md-6">
    <label>Nome</label>
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>
<div class="form-group col-md-6">
    <label>E-mail</label>
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>
<div class="form-group col-md-6">
    <label>Função</label>
    {!! Form::select('funcao', $funcoes, null, ['class' => 'form-control', 'placeholder' => 'Escolha uma opção']) !!}
</div>
@if(!isset($model))
<div class="form-group col-md-3">
    <label>Password</label>
    {!! Form::password('password', ['class' => 'form-control' ])!!}
</div>
@else
{!! Form::hidden('password', null)!!}
@endif





