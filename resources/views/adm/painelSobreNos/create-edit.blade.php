<div class="form-group col-md-5">
    <label>Altura da imagem em pixels</label>
    {!! Form::number('imagem_altura', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
    @include('adm.geral.label-small', ['texto' => 'Informação NÃO obrigatória. Caso esse dado não seja selecionado, será usado o seguinte valor padrão: 400px.'])
</div>
<div class="form-group col-md-7"></div>

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



