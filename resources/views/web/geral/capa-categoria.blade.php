<style type="text/css">
    .aba-assinautra-area-margin-top{
        margin-top: -390px;
    }

    @media (max-width: 992px) {
        .aba-assinautra-area-margin-top{
            margin-top: 0px;
        }
    }
</style>
<div class="capa" style="background-image: url('{{url(''.$categoria->thumbnail)}}')">
    <div class="capa-pelicula">
        <div class="capa-pelicula-nuvem" style="background-image: url('{{url('/photos/shares/geral/tarja-decor.png')}}')">
            <div class="container">
                <div class="capa-nome">
                    {!!$categoria->nome!!}
                </div>
                @if($categoria->subtitulo != '')
                <div class="capa-subtitulo-categoria">
                    {!!$categoria->subtitulo!!}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
