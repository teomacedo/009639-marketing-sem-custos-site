<div class="form-group col-md-12">
    <label>Titulo</label>
    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-12">
    <label>Texto</label>
    {!! Form::textarea('texto', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>