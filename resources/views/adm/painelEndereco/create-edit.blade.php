<div class="form-group col-md-3">
    <label>Sequencia</label>
    {!! Form::number('sequencia', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-5">
    <label>Cidade</label>
    {!! Form::text('cidade', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-4">
    <label>Estado</label>
    {!! Form::select('estado', $estadosUfs, null, ['class' => 'form-control', 'placeholder' => 'Escolha uma opção']) !!}
</div>

<div class="form-group col-md-6">
    <label>Bairro</label>
    {!! Form::text('bairro', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Endereço</label>
    {!! Form::text('endereco', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-3">
    <label>Número</label>
    {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-3">
    <label>Cep</label>
    {!! Form::text('cep', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>
