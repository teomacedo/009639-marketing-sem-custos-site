<div class="secao">
    <div class="secao-involucro">
        <div class="secao-titulo">
            {!!$chamadaFaq->titulo!!}
        </div>
        <div class="secao-subtitulo">
            {!!$chamadaFaq->subtitulo!!}
        </div>

        <div class="d-flex justify-content-center" style="width: 100%; margin-top: 30px;">
            <a href="{{$chamadaFaq->botao_link}}"><button type="button" class="btn btn-outline-primary">{{$chamadaFaq->botao_texto}}</button></a>
        </div>
    </div>
</div>

