<div class="form-group col-md-3">
    <label>Sequencia</label>
    {!! Form::number('sequencia', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-4">
    <label>Página/URL</label>
    {!! Form::text('pagina_url', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-5">
    <label>Página/Título</label>
    {!! Form::text('pagina_titulo', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-12">
    <label>Questão</label>
    {!! Form::textarea('questao', null, ['class' => 'form-control', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-12">
    <label>Resposta</label>
    {!! Form::textarea('resposta', null, ['class' => 'form-control', 'rows' => '3',])!!}
</div>