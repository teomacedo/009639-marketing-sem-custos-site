@extends('web.geral.estrutura')

@section('head')
<meta name="description" content="{{$seo[1]['meta_description']}}">

<!-- Compartilhamento Facebook e outras redes sociais sem protocolo definico -->
<meta property="og:type" content="website">
<meta property="og:description" content="{{$seo[1]['meta_description']}}">
<meta property="og:image" content="{{URL::asset(''.$seo[1]['imagem'])}}">

<!-- Compartilhamento Twitter -->
<meta property="twitter:description" content="{{$seo[1]['meta_description']}}">
<meta property="twitter:image" content="{{URL::asset(''.$seo[1]['imagem'])}}">
@endsection

@section('content')
<div class="small-off" style="width: 100px; height: 60px"></div>
<section>
<div class="secao border img-thumbnail shadow-sm">
    <div class="secao-involucro">

        <h2 class="secao-titulo">Fale Conosco</h2>
        <p class="secao-subtitulo">Informe abaixo seu nome, e-mail e telefone para que um de nossos atendentes entre em contato.</p>
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



    </div>
</div>
</section>

@endsection
