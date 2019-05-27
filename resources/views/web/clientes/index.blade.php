<section>
    <div class="secao border img-thumbnail shadow-sm">
        <div class="secao-involucro">
            <div class="clientes-area">
                <h2 class="secao-titulo">
                    Faça como {{@count($clientes)}} clientes pelo Brasil que utilizam nossa solução!
                </h2>

                <div class="map" id="map">
                    <div class="mapa-clientes">
                        <div class="map__image">
                            <!-- (c) ammap.com | SVG map of Brazil - Low -->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:amcharts="http://amcharts.com/ammap" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 612 638">

                                <g>
                                    @foreach($estadosLista as $row)
                                    <a data-toggle="modal" data-target="#modal-uf-{{$row->codigo_estado}}" onmouseover="destaque('{{$row->uf}}')" onmouseout="destaqueRemove('{{$row->uf}}')" class="cor-estado-{{$row->uf}}" xlink:title="{{$row->nome}}"><path id="regiao-{{$row->uf}}" d="{{$row->path}}"/></a>
                                    @endforeach

                                </g>
                            </svg>
                        </div>
                        <div class="mapa-clientes-lista">
                            <hr class="desktop-off">
                            <div class="aba-assinautra-area-titulo-pequeno clientes-lista-chamada">ESSES SÃO ALGUNS DOS NOSSOS CLIENTES</div>
                            <div class="responsive responsive-clientes-lista">
                                @include('web.clientes.lista')
                            </div>
                        </div>
                    </div>
                    <div class="estado-area small-off">
                        <hr>
                        @foreach($estadosLista as $rowEstado)
                        @foreach($estados as $row)
                        @if($rowEstado->codigo_estado == $row->codigo_estado)
                        <div id="quadro-{{$rowEstado->uf}}" class="estado-item" onmouseover="destaqueMapa('{{$rowEstado->uf}}')" onmouseout="destaqueMapaRemove('{{$rowEstado->uf}}')">
                            <div class="estado-quant"><i class="fas fa-map-marker-alt"></i></div> {{$rowEstado->nome}}
                        </div>
                        <style type="text/css">
                            .cor-estado-{{strtolower($rowEstado->uf)}}  path{ fill: #4181c2; cursor: pointer; }
                        </style>
                        <style type="text/css">
                            .cor-estado-{{strtolower($rowEstado->uf)}}:hover  path{ fill: #ffff00; }
                        </style>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function destaque(uf){
    document.getElementById('quadro-' + uf).classList.toggle("estado-destaque");
    }

    function destaqueRemove(uf){
    document.getElementById('quadro-' + uf).classList.toggle("estado-destaque");
    }

    function destaqueMapa(uf){
    document.getElementById('regiao-' + uf).classList.toggle("mapa-destaque");
    }

    function destaqueMapaRemove(uf){
    document.getElementById('regiao-' + uf).classList.toggle("mapa-destaque");
    }
</script>