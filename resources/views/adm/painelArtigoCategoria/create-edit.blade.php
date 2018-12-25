<div class="form-group col-md-12">
    @include('adm.geral.input-imagem', ['label' => 'Thumbnail', 'campoNome' => 'thumbnail', 'campoValor' => $dadosBase['model']->thumbnail, 'id' => 'b'])
    @include('adm.geral.label-small', ['texto' => 'Arquivo NÃO obrigatório. Caso esse arquivo não seja selecionado, será usado o arquivo selecionado no campo "Capa".'])
</div>

<div class="form-group col-md-3">
    <label>Sequencia</label>
    {!! Form::number('sequencia', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-9">
    <label>Nome</label>
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Página/URL</label>
    {!! Form::text('pagina_url', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Página/Título</label>
    {!! Form::text('pagina_titulo', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-12">
    <label>Subtítulo</label>
    {!! Form::textarea('subtitulo', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>





