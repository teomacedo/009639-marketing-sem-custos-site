<div class="lista-cliente-item">
<?php $i = 0; ?>
@foreach($clienteExibivel as $itemExibivel)
<div class="lista-cliente-item-area">
    <div class="lista-cliente-item-area-foto small-off">
        <img src="http://nucserver.com.br/{{json_decode($clientes[$itemExibivel->cliente-1]->configuracoes)->avatar}}" alt="" title="" width="65px" class="img-fluid img-thumbnail">
    </div>
    <div class="lista-cliente-item-area-texto">
        <div class="lista-cliente-item-nome">
            {{$clientes[$itemExibivel->cliente-1]->nome}}
            
        </div>
        <div class="lista-cliente-item-site">
            <a class="link-externo" href="{{'http://'.$clientes[$itemExibivel->cliente-1]->url}}">{{$clientes[$itemExibivel->cliente-1]->url}}</a>
        </div>
    </div>
</div>
@if(++$i%3 == 0)
</div>
<div class="lista-cliente-item">
@endif
@endforeach
</div>