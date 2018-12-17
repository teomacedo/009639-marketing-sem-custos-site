function alertSucess(div, msg, url) {

    $(div).html("<div class='alert alert-success'>" + msg + "</div>");
    window.location.href = url;

}
function alertErros(div, erros) {
    var erro = '';
    //--- Remover todos
    $('div').removeClass("has-danger");

    $.each(erros, function (i, val) {
        /*---- Mostra mensagem de Erro */
        erro += '<div class="alert alert-danger" role="alert">' + val[0] + '</div>';
        /*---- Marca Campo no formulário */
        $("[name='" + val[1] + "']").closest('.form-group').addClass("has-danger");

    });

    $(div).html(erro);
}
function ddf(dados) {
    if (dados == undefined || dados == null) {
        return "";
    } else {
        return dados;
    }
}
function deletarDefault(url) {
    $.modalalert(
            {
                'titulo': 'Atenção',
                'mensagem': 'Deseja realmente deletar?',
                'acoes': [["deletar", "Deletar!", "danger"]],
                'cancel': 'Cancelar'
            }, function (retorno) {
        if (retorno == 'deletar') {
            window.location.href = url;
        }
    }
    );
    return false;
}
//-------- Função para enviar formularios
(function ($) {
    $.enviaformulario = function (settings, funcao) {
        //----| Variaveis
        var dados = '';
        var text = '';
        //----| Variaveis da função
        var config = {
            'formularios': '',
            'dados': '',
            'tipo': 'POST',
            'url': '',

            'dataType': 'json'
        };
        if (settings) {
            $.extend(config, settings);
        }

        //---| Recebe formularios
        if (config.formularios.length > 0) {
            for (index = 0; index < config.formularios.length; index++) {
                dados += jQuery(config.formularios[index]).serialize() + '&';
            }
        }
        if (config.dados != null && config.dados != '') {
            dados += jQuery.param(config.dados);
        }
        if (config.retorno != null && config.retorno != '') {
            if (config.carregar != null && config.carregar != '') {
                $(config.retorno).html(config.carregar);
            }
        }

        jQuery.ajax({
            type: config.tipo,
            url: config.url,
            data: dados,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            dataType: config.dataType,
            success: function (retorno) {
                funcao(retorno);
            }
        });
    };
    $.modalalert = function (settings, funcao) {

        $("#modal-alert").remove();

        var html = '';
        html += '<div id="modal-alert" class="modal fade">';
        html += '  <div class="modal-dialog" role="document">';
        html += '    <div class="modal-content">';
        html += '      <div class="modal-header">';
        html += '        <h5 class="modal-title">' + settings.titulo + '</h5>';
        html += '      </div>';
        html += '      <div class="modal-body">';
        html += '        <p>' + settings.mensagem + '</p>';
        html += '      </div>';
        html += '      <div class="modal-footer">';
        $.each(settings.acoes, function (i, val) {
            html += "     <button type='button' data-bb-handler='" + val[0] + "' class='btn btn-" + val[2] + "'>" + val[1] + "</button>";
        });
        html += '        <button type="button" class="btn btn-secondary" data-dismiss="modal">' + settings.cancel + '</button>';
        html += '      </div>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';

        $("body").append(html);
        $("#modal-alert").modal('show');
        //---- Processa CallBack Button;
        $("#modal-alert").on("click", ".modal-footer button", function (e) {
            var callbackKey = $(this).data("bb-handler");
            funcao(callbackKey);
        });

    }

    $.modalgeral = function (settings) {
        $("#modal-nuc").remove();
        var html = '';
        html += '<div id="modal-nuc" class="modal fade">';
        html += '  <div class="modal-dialog modal-lg" role="document">';
        html += '    <div class="modal-content">';

        html += '      <div  id="modal-nuc-conteudo">';
        html += '      </div>';

        html += '    </div>';
        html += '  </div>';
        html += '</div>';

        $("body").append(html);
        $("#modal-nuc").modal('show');

        $("#modal-nuc-conteudo").html('Carregando...');
        $("#modal-nuc-conteudo").load(settings.url, function (result) {});
    }


})(jQuery);


//-------- Função para preload
window.addEventListener("load", function () {
    var load_screen = document.getElementById("loading-bar");
    load_screen.classList.remove("loading-bar-off");
});
