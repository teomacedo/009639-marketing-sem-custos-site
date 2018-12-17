<div class="form-group col-md-12">
    @include('adm.geral.input-imagem', ['label' => 'Imagem para Small', 'campoNome' => 'imagem_small', 'campoValor' => $dadosBase['model']->imagem_small, 'id' => 'b'])
    @include('adm.geral.label-small', ['texto' => 'Arquivo NÃO obrigatório. Caso esse arquivo não seja selecionado, será usado o arquivo selecionado no campo "Imagem para Desktop".'])
</div>

<div class="form-group col-md-12">
    <label>Ativo</label>
    {!! Form::checkbox('ativo', '1')!!}
</div>


<div class="form-group col-md-6">
    <label>Nome para identificação interna</label>
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Sequencia</label>
    {!! Form::number('sequencia', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Inicio exibição</label>
    {!! Form::date('exibicao_inicio', null, ['class' => 'form-control'])!!}
</div>
<div class="form-group col-md-6">
    <label>Fim exibição</label>
    {!! Form::date('exibicao_fim', null, ['class' => 'form-control'])!!}
</div>

<div class="form-group col-md-6">
    <label>Título para Desktop</label>
    {!! Form::textarea('titulo_desktop', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-6">
    <label>Título para ser exibido em dispositivos móveis</label>
    {!! Form::textarea('titulo_small', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
    <small id="contato_whats" class="form-text text-muted">Preenchimento NÃO obrigatório. Caso esse campo não seja preenchido, será usado os dados informados no campo "Título para Desktop".</small>
</div>

<div class="form-group col-md-6">
    <label>Subtítulo para Desktop</label>
    {!! Form::textarea('subtitulo_desktop', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
</div>

<div class="form-group col-md-6">
    <label>Subtítulo para ser exibido em dispositivos móveis</label>
    {!! Form::textarea('subtitulo_small', null, ['class' => 'form-control tinymce', 'rows' => '3',])!!}
    <small id="contato_whats" class="form-text text-muted">Preenchimento NÃO obrigatório. Caso esse campo não seja preenchido, será usado os dados informados no campo "Subtítulo para Desktop".</small>
</div>

<div class="form-group col-md-6">
    <label>Botão - Texto</label>
    {!! Form::text('botao_texto', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Botão - Link</label>
    {!! Form::text('botao_link', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-12">
    @include('adm.geral.input-imagem', ['label' => 'Banner/Blog/Vertical', 'campoNome' => 'banner_blog_vertical', 'campoValor' => $dadosBase['model']->banner_blog_vertical, 'id' => 'c'])
</div>

<div class="form-group col-md-12">
    @include('adm.geral.input-imagem', ['label' => 'Banner/Blog/Horizontal', 'campoNome' => 'banner_blog_horizontal', 'campoValor' => $dadosBase['model']->banner_blog_horizontal, 'id' => 'd'])
</div>

<div class="form-group col-md-6">
    <label>Botão/Banner/Blog - Texto</label>
    {!! Form::text('banner_blog_botao_texto', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Botão/Banner/Blog - Link</label>
    {!! Form::text('banner_blog_botao_link', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>








