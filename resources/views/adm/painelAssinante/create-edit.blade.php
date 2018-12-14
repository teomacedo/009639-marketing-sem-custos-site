<div class="form-group col-md-6">
    <label>Nome</label>
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>E-mail</label>
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Continuar notificando</label>
    {!! Form::checkbox('notificar', '1')!!}
</div>