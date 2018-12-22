<div class="form-group col-md-6">
    <label>Título</label>
    {!! Form::textarea('titulo', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-6">
    <label>Subtítulo</label>
    {!! Form::textarea('subtitulo', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-12">
    <label>Vídeo</label>
    {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-3">
    <label>Botão/Texto</label>
    {!! Form::text('botao_texto', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-9">
    <label>Botão/Link</label>
    {!! Form::text('botao_link', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>
