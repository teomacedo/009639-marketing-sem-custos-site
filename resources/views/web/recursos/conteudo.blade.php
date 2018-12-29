<div class="secao">
    <div class="secao-involucro">
        <div class="secao-titulo">
            {!!$chamadaRecurso->titulo!!}
        </div>
        <div class="secao-subtitulo">
            {!!$chamadaRecurso->subtitulo!!}
        </div>

        <div class="recursos-area">
            @foreach($recuros as $row)

            <div class="recursos-item border img-thumbnail shadow-sm">
                <div class="d-flex justify-content-center" style="width: 100%;">
                    @php $icons = explode('#', $row->icons);
                    $i = count($icons);
                    @endphp

                    @while($i-- > 0)
                    <div class="icons-circle shadow-sm border">{!!$icons[$i]!!}</div>
                    @endwhile
                </div>
                <div class="conteudo-composto-texto-subtitulo"><h4>{!!$row->titulo!!}</h4></div>
                <div class="conteudo-composto-texto-descricao">{!!$row->subtitulo!!}</div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center" style="width: 100%; margin-top: 30px;">
            <a href="{{url('')}}{{$botao['botao_link'] ?? '/'.$chamadaRecurso->botao_link}}"><button type="button" class="btn btn-outline-primary">{{$botao['botao_texto'] ?? $chamadaRecurso->botao_texto}}</button></a>
        </div>
    </div>
</div>

