
@if (count($errors) > 0)
<div id="mensagem-alerta-quadro" class="mensagem-alerta-area">
    @include('web.geral.alert-janela')
</div>
@endif

@if (session('mensagemSucesso'))
<div id="mensagem-alerta-quadro" class="mensagem-alerta-area">
    @include('web.geral.alert-janela')
</div>
@endif

@if (session('mensagemErro'))
<div id="mensagem-alerta-quadro" class="mensagem-alerta-area">
    @include('web.geral.alert-janela')
</div>
@endif
