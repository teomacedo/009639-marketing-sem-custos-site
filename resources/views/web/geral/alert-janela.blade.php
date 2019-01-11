<div class="mensagem-alerta-quadro border img-thumbnail">
    <button type="button" class="close" aria-label="Close" onclick="fecharJanela();">
        <span aria-hidden="true">&times;</span>
    </button>
    <div style="padding: 30px;">
        @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
        -{{ $error }}<br>
        @endforeach
        @endif

        @if (session('mensagemSucesso'))
        <span class="azul-texto">
        {!! session('mensagemSucesso') !!}
        </span>
        @endif

        @if (session('mensagemErro'))
        {!! session('mensagemErro') !!}
        @endif
    </div>
</div>

<script type="text/javascript">

function fecharJanela(){
    document.getElementById('mensagem-alerta-quadro').style.display = 'none';
}
</script>