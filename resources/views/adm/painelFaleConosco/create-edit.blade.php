<div class="form-group col-md-4">
    <label>Nome</label>
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => '', 'readonly' => 'true'])!!}
</div>

<div class="form-group col-md-4">
    <label>E-mail</label>
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => '', 'readonly' => 'true'])!!}
</div>

<div class="form-group col-md-4">
    <label>Telefone</label>
    {!! Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => '', 'readonly' => 'true'])!!}
</div>

<div class="form-group col-md-12">
    <label>Mensagem</label>
    {!! Form::textarea('mensagem', null, ['class' => 'form-control', 'rows' => '5', 'readonly' => 'true'])!!}
</div>

<div class="form-group col-md-3">
    <label>Status</label>
    {!! Form::select('status', ['Aguardando' => 'Aguardando', 'Respondido' => 'Respondido'], null, ['class' => 'form-control']) !!}
</div>
