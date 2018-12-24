<div class="form-group col-md-3">
    <label>Sequencia</label>
    {!! Form::number('sequencia', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-7"></div>

<div class="form-group col-md-12">
    <label>Título</label>
    {!! Form::textarea('titulo', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-12">
    <label>Citação</label>
    {!! Form::textarea('citacao', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-6">
    <label>Nome do Cliente</label>
    {!! Form::text('nome_cliente', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Nome da Loja</label>
    {!! Form::text('nome_loja', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Link da Loja</label>
    {!! Form::text('link_loja', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Link do artigo (Se existir)</label>
    {!! Form::text('link_artigo', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-12">
    <label>Vídeo (Se existir)</label>
    {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>




