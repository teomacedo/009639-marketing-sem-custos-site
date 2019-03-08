<div class="form-group col-md-3">
    <label>Sequencia</label>
    {!! Form::number('sequencia', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
</div>
<div class="form-group col-md-3">
    <label>Cliente</label>
    {!! Form::select('cliente', $clientesLista, null, ['class' => 'form-control', 'placeholder' => 'Escolha uma opção']) !!}
</div>