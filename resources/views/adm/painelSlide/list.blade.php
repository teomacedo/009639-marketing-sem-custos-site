<td>{{$row->sequencia}}</th>
<td>{{$row->nome}}</th>
<td>
    <img id="holder" src="{{ url($row->imagem)}}" style="max-width: 200px">
</th>
<td>@if($row->ativo == 1){{'Ativo'}} @else {{'Inativo'}} @endif</th>





