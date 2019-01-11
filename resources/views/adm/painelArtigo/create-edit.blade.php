<div class="form-group col-md-12">
    @include('adm.geral.input-imagem', ['label' => 'Thumbnail', 'campoNome' => 'thumbnail', 'campoValor' => $dadosBase['model']->thumbnail, 'id' => 'b'])
    @include('adm.geral.label-small', ['texto' => 'Arquivo NÃO obrigatório. Caso esse arquivo não seja selecionado, será usado o arquivo selecionado no campo "Capa".'])
    
</div>
<div class="form-group col-md-3">
    <label>Categoria</label>
    {!! Form::select('categoria', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Escolha uma opção']) !!}
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
    <label>Título</label>
    {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-12">
    <label>Subtítulo</label>
    {!! Form::text('subtitulo', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-12">
    <label>Meta Description</label>
    {!! Form::text('meta_description', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>


<input type="hidden" name="user_id" value="{{Auth::user()->id}}">




