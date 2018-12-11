<div class="form-group col-md-12">
    @include('adm.geral.input-imagem', ['label' => 'Thumbnail', 'campoNome' => 'thumbnail', 'campoValor' => $dadosBase['model']->thumbnail, 'id' => 'b'])
    @include('adm.geral.label-small', ['texto' => 'Arquivo NÃO obrigatório. Caso esse arquivo não seja selecionado, será usado o arquivo selecionado no campo "Capa".'])
    
</div>
<div class="form-group col-md-6">
    <label>Categoria</label>
    {!! Form::select('categoria', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Escolha uma opção']) !!}
</div>

<div class="form-group col-md-12">
    <label>Título</label>
    {!! Form::textarea('titulo', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-12">
    <label>Subtítulo</label>
    {!! Form::textarea('subtitulo', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<input type="hidden" name="user_id" value="{{Auth::user()->id}}">




