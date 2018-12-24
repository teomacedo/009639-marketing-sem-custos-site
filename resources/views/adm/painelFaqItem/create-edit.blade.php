<div class="form-group col-md-3">
    <label>Sequencia</label>
    {!! Form::number('sequencia', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>
<div class="form-group col-md-9">
   
</div>
<div class="form-group col-md-12">
    <label>Questão</label>
    {!! Form::textarea('questao', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-12">
    <label>Resposta</label>
    {!! Form::textarea('resposta', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>