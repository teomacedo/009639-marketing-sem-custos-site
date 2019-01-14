<!-- Botão compartilhar Twitter -->
<a href="#" onclick="window.open('https://twitter.com/intent/tweet?original_referer={{'http://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}& text={{$artigo->titulo}}& url={{'https://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">Twitter</a>
<a href="https://twitter.com/intent/tweet?original_referer={{'http://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}&text={{$artigo->titulo}}&url={{'https://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}" rel="nofollow" target="_blank">Twitter</a>

<!-- Botão compartilhar WhatsApp -->
<a href="https://api.whatsapp.com/send?text={{$artigo->titulo.' '}}{{'http://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}" rel="nofollow" target="_blank">WhatsApp (Teste)</a>

<!-- Botão compartilhar Facebook -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
            return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div class="fb-share-button" data-href="{{'http://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{'http://'.$_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]}}}};src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
