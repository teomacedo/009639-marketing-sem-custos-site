<div class="secao">
    <div class="secao-involucro">
        @if(!isset($exibirTituloSubtitulo))
        <div class="secao-titulo">
            {!!$chamadaFaq->titulo!!}
        </div>
        <div class="secao-subtitulo">
            {!!$chamadaFaq->subtitulo!!}
        </div>
        @endif
        <div class="faq-lista-area">
            @foreach($faqs as $row)
            <a href="{{url('faqs/'.$row->pagina_url)}}">
                <div class="faq-lista-area-item">
                    <div class="faq-lista-area-item-pergunta">
                        <div class="faq-lista-area-item-pergunta-sequencia">
                            {{$row->sequencia}}
                        </div>
                        <div class="faq-lista-area-item-pergunta-texto">
                            {{$row->questao}}
                        </div>
                    </div>
                    <div class="faq-lista-area-item-resposta">
                        {{$row->resposta}}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-center" style="width: 100%; margin-top: 30px;">
            <a href="{{url('')}}{{$botao['botao_link'] ?? '/'.$chamadaFaq->botao_link}}"><button type="button" class="btn btn-outline-primary">{{$botao['botao_texto'] ?? $chamadaFaq->botao_texto}}</button></a>
        </div>
    </div>
</div>

