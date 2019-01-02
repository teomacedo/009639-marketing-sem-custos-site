<div class="mensagem-alerta-area">
    @if (count($errors) > 0)
        @include('web.geral.alert-janela')
    @endif

    @if (session('mensagemSucesso'))
        @include('web.geral.alert-janela')
    @endif

    @if (session('mensagemErro'))
        @include('web.geral.alert-janela')
    @endif
</div>