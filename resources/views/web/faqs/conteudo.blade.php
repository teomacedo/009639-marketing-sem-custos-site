<section>
    <div class="secao border img-thumbnail shadow-sm">
        <div class="secao-involucro">
            @if(!isset($exibirTituloSubtitulo))
            <h2 class="secao-titulo">
                {!!$chamadaFaq->titulo!!}
            </h2>
            <p class="secao-subtitulo">
                {!!$chamadaFaq->subtitulo!!}
            </p>
            @endif
            <div class="faq-lista-area">
                @foreach($faqs as $row)
                <a href="{{url('faqs/'.$row->pagina_url)}}">
                    <div class="faq-lista-area-item fundo-cinza-claro">
                        <div class="faq-lista-area-item-cabecalho">

                            <div class="faq-lista-area-item-pergunta-sequencia">
                                {{$row->sequencia}}
                            </div>

                            <h3 class="faq-lista-area-item-pergunta-texto">
                                {{$row->questao}}
                            </h3>
                        </div>
                        <p class="faq-lista-area-item-resposta">
                            {{$row->resposta}}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="d-flex justify-content-center" style="width: 100%; margin-top: 30px;">
                <a href="{{url('')}}{{$botao['botao_link'] ?? '/'.$chamadaFaq->botao_link}}"><button type="button" class="btn btn-outline-primary">{{$botao['botao_texto'] ?? $chamadaFaq->botao_texto}}</button></a>
            </div>
        </div>
    </div>
</section>
