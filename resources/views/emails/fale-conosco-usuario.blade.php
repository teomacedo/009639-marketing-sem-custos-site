Olá, {{$dataForm['nome']}}!<br><br>
Obrigado por nos contactar através do nosso canal de "Fale Conosco".<br>
Por favor, aguarde que alguém da nossa equipe irá retornar o seu contato o mais rápido possível.
<br><br>
Caso queira, também é possível nos contactar pelos seguintes canais de atendimento:<br>
<b>Telefones</b><br>
@foreach($telefones as $row)
{{$row->numero}}<br>
@endforeach
<br>
<b>E-mails</b><br>
@foreach($emails as $row)
{{$row->email}}<br>
@endforeach
<br><br>
Você também pode esclarecer várias de suas dúvidas através da seção <a href="http://nuctecnologia.com.br/perguntas-frequentes">"Dúvidas Mais Frequentes" de nosso site</a>.<br><br>
Atenciosamente<br>
Equipe/{{$equipe}}