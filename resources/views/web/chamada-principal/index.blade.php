<div class="small-off" style="width: 100px; height: 60px"></div>
<section>
    <div class="secao border img-thumbnail shadow-sm">
        <div class="secao-involucro">
            <h2 class="secao-titulo">
                {!!$chamadaPrincipal->titulo!!}
            </h2>
            <p class="secao-subtitulo">
                {!!$chamadaPrincipal->subtitulo!!}
            </p>
            <div class="embed-responsive embed-responsive-16by9 img-thumbnail shadow-sm" style="padding: 10px;">
                <iframe class="embed-responsive-item" src="{{$chamadaPrincipal->video}}" allowfullscreen></iframe>
            </div>
            <div class="d-flex justify-content-center" style="width: 100%; margin-top: 30px;">
                <a href="{{$chamadaPrincipal->botao_link}}"><button type="button" class="btn btn-outline-primary">{{$chamadaPrincipal->botao_texto}}</button></a>
            </div>
        </div>
    </div>
</section>

