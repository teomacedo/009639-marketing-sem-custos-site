<div class="capa-desktop" style="background-image: url('{{url(''.$fotoCapa)}}')">
    @if(isset($nome))
    <div class="capa-desktop-pelicula">
        <div class="capa-desktop-pelicula-nuvem" style="background-image: url('{{url('/photos/shares/geral/nuvem.png')}}')">
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
    <div class="capa-desktop-pelicula-nuvem" style="background-image: url('{{url('/photos/shares/geral/nuvem.png')}}')"></div>
    @endif
</div>
@if(!isset($nome))
<div class="container">
    <div class="pagina-divisao-vertical">
        <div class="pagina-divisao-vertical-principal">
            <a href="{{url('categoria'.'/'.$categoriaId)}}">
                <div class="categoria-botao">
                    {!!$categoria!!}
                </div>
            </a>
            <div class="capa-desktop-titulo">
                {!!$titulo!!}
            </div>
            <div class="capa-desktop-subtitulo">
                {!!$subtitulo!!}
            </div>
        </div>
        <div class="pagina-divisao-vertical-secundario"></div>
    </div>
</div>
@endif