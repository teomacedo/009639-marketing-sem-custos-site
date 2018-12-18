<style type="text/css">
    .aba-assinautra-area-margin-top{
        margin-top: -390px;
    }
</style>
<div class="capa-desktop small-off" style="background-image: url('{{url(''.$fotoCapa)}}')">
    @if(isset($nome))
    <div class="capa-desktop-pelicula">
        <div class="capa-desktop-pelicula-nuvem" style="background-image: url('{{url('/photos/shares/geral/tarja-decor.png')}}')">
            <div class="container">
                <div class="capa-desktop-nome">
                    {!!$nome!!}
                </div>
                @if(isset($subtitulo))
                <div class="capa-desktop-subtitulo-categoria">
                    {!!$subtitulo!!}
                </div>
                @endif
                @if(isset($descricao))
                <div class="capa-desktop-descricao">
                    {!!$descricao!!}
                </div>
                @endif
            </div>
        </div>
    </div>
    @else
    <div class="capa-desktop-pelicula-nuvem" style="background-image: url('{{url('/photos/shares/geral/tarja-decor.png')}}')"></div>
    @endif
</div>
