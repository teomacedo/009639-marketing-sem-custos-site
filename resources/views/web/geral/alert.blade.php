<div style="position: fixed; z-index: 5; width: 100%">
    <div style="max-width: 390px; margin: 0 auto; box-shadow: -2px 2px 3px rgba(0,0,0,.1);">
        @if (count($errors) > 0)
        <div class="alerta alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            -{{ $error }}<br>
            @endforeach
        </div>
        @endif

        @if (session('mensagemSucesso'))
        <div class="alerta alert alert-success text-center">
            {!! session('mensagemSucesso') !!}
        </div>
        @endif

        @if (session('mensagemErro'))
        <div class="alerta alert alert-danger text-center">
            {!! session('mensagemErro') !!}
        </div>
        @endif
    </div>
</div>