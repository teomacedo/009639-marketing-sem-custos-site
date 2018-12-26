<div class="secao">
    <div class="secao-involucro">
        <div class="secao-titulo">
            {!!$chamadaCase->titulo!!}
        </div>
        <div class="secao-subtitulo">
            {!!$chamadaCase->subtitulo!!}
        </div>

        <div class="d-flex justify-content-center" style="width: 100%; margin-top: 30px;">
            <a href="{{$chamadaCase->botao_link}}"><button type="button" class="btn btn-outline-primary">{{$chamadaCase->botao_texto}}</button></a>
        </div>
    </div>
</div>

