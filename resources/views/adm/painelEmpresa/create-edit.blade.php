<div class="form-group col-md-12">
@include('adm.geral.input-imagem', ['label' => 'Icon', 'campoNome' => 'icon', 'campoValor' => $dadosBase['model']->icon, 'id' => 'b'])
</div>

<div class="form-group col-md-6">
    <label>Nome</label>
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>WhatsApp</label>
    {!! Form::number('whatsapp', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>
