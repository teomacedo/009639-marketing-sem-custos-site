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

@if(!isset($dadosBase['model']->id))
<div class="form-group col-md-3">
    <label>Password</label>
    {!! Form::password('password', ['class' => 'form-control' ])!!}
</div>
@else
{!! Form::hidden('password', null)!!}
@endif

<div class="form-group col-md-12">
    <label>Descrição</label>
    {!! Form::textarea('descricao', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>



