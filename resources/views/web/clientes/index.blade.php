<section>
    <div class="secao">
        <div class="secao-involucro">
            <div class="clientes-area">
                <h2 class="secao-titulo">
                    {!!$chamadaCliente->titulo!!}
                </h2>

                <div class="map" id="map">
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
                    <div class="estado-area">
                        <?php $cont = 0; ?>
                        @foreach($estadosLista as $rowEstado)
                        @foreach($estados as $row)
                        @if($rowEstado->codigo_estado == $row->codigo_estado)
                        <!-- Modal -->
                        <div class="modal fade" id="modal-uf-{{$row->codigo_estado}}" tabindex="-1" role="dialog" aria-labelledby="modal-uf-{{$row->codigo_estado}}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modal-uf-{{$row->codigo_estado}}Label">{{$rowEstado->nome}}</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($clientes as $rowClientes)
                                        @if($rowClientes->codigo_estado == $row->codigo_estado)
                                        <div class="lista-cliente-item">
                                            <div class="lista-cliente-item-nome">
                                                {{$rowClientes->nome}}
                                            </div>
                                            <div class="lista-cliente-item-site">
                                                <a href="{{'http://'.$rowClientes->url}}">{{$rowClientes->url}}</a>
                                            </div>
                                            <?php $cont++; ?>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="quadro-{{$rowEstado->uf}}" class="estado-item" data-toggle="modal" data-target="#modal-uf-{{$row->codigo_estado}}" onmouseover="destaqueMapa('{{$rowEstado->uf}}')" onmouseout="destaqueMapaRemove('{{$rowEstado->uf}}')">
                            <div class="estado-quant">{{$cont}}</div> {{$rowEstado->nome}}
                            <?php $cont = 0; ?>
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