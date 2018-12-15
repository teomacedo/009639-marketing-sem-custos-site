@extends('web.geral.estrutura')

@section('content')


    <div class="secao-titulo">Fale Conosco</div>
    <div class="secao-subtitulo">Informe abaixo seu nome, e-mail e telefone para que um de nossos atendentes entre em contato.</div>
    {!!Form::open(['url' => [url('/email-fale-conosco')]])!!}
    <div class="row">
        <div class="form-group col-md-12">
            <label>Nome</label>
            {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
        </div>
        <div class="form-group col-md-6">
            <label>E-mail</label>
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => '' ])!!}
        </div>
        <div class="form-group col-md-6">
            <label>Telefone</label>
            {!! Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => '', 'onkeyup' => 'mascara(this, mtel);', 'maxlength' => '15'])!!}
        </div>
        <div class="form-group col-md-12">
            <label>Mensagem</label>
            {!! Form::textarea('mensagem', null, ['class' => 'form-control', 'rows' => '3',])!!}
        </div>
    </div>
    <button class='btn btn-outline-primary' type='submit' value='submit'>
        <i class="fas fa-check"></i> Enviar
    </button>
    {!! Form::close() !!}






@endsection
