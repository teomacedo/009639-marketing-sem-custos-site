<div class="form-group col-md-6">
    <label>Atributo Alt</label>
    {!! Form::text('atributo_alt', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
    @include('adm.geral.label-small', ['texto' => '(caso haja imagem)'])
</div>

<div class="form-group col-md-6">
    <label>Atributo Title</label>
    {!! Form::text('atributo_title', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
    @include('adm.geral.label-small', ['texto' => '(caso haja imagem)'])
</div>

<div class="form-group col-md-3">
    <label>Sequencia</label>
    {!! Form::number('sequencia', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-12">
    <label>Título</label>
    {!! Form::textarea('titulo', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-12">
    <label>Subtítulo</label>
    {!! Form::textarea('subtitulo', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-12">
    <label>Trecho</label>
    {!! Form::textarea('trecho', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-12">
    <label>Vídeo</label>
    {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>




