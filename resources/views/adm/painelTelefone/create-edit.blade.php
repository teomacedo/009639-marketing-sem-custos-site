<div class="form-group col-md-3">
    <label>Sequencia</label>
    {!! Form::number('sequencia', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>

<div class="form-group col-md-6">
    <label>Número</label>
    {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => '', 'onkeyup' => 'mascara(this, mtel);', 'maxlength' => '15'])!!}
</div>

<div class="form-group col-md-6">
    <label>Icon</label>
    {!! Form::text('icon', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>