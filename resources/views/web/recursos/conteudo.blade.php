<section>
<div class="secao">
    <div class="secao-involucro">
        <h2 class="secao-titulo">
            {!!$chamadaRecurso->titulo!!}
        </h2>
        <p class="secao-subtitulo">
            {!!$chamadaRecurso->subtitulo!!}
        </p>

        <div class="recursos-area">
            @foreach($recuros as $row)

            <div class="recursos-item border img-thumbnail shadow-sm">
                <div class="d-flex justify-content-center" style="width: 100%;">
                    @php $icons = explode('#', $row->icons);
                    $i = count($icons);
                    @endphp

                    @while($i-- > 0)
                    <div class="icons-circle">{!!$icons[$i]!!}</div>
                    @endwhile
                </div>
                <h3 class="conteudo-composto-texto-subtitulo">{!!$row->titulo!!}</h3>
                <p class="conteudo-composto-texto-descricao">{!!$row->subtitulo!!}</p>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center" style="width: 100%; margin-top: 30px;">
            <a href="{{url('')}}{{$botao['botao_link'] ?? '/'.$chamadaRecurso->botao_link}}"><button type="button" class="btn btn-outline-primary">{{$botao['botao_texto'] ?? $chamadaRecurso->botao_texto}}</button></a>
        </div>
    </div>
</div>
</section>
