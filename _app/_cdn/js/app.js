$(function () {

    // $("html:not(.legacy) table").stickyTableHeaders();
    $('#socio').dataTable({
        //"paging": false,
        //"searching": false,

        "info": false,

        "lengthMenu": [[20, -1], [20, "Todos"]],
//                    dom: 'Blfrtip',
//                    buttons: [{
//                            title: 'Relat�rio de Memorandos',
//                            extend: 'pdfHtml5',
//                            text: '<i class="text-danger fa fa-file-pdf-o"></i>',
//                            titleAttr: 'PDF',
//                            orientation: 'landscape',
//                            pageSize: 'A4',
//                            className: 'btn btn-sm btn-default text-red pull-right',
//                            exportOptions: {
//                                columns: [0, 1, 2, 3, 4]
//                            }
//                        }
//                    ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });

    //Rotina para inclus�o dos s�cios.
    $("#btnGravar").on('click', function (e) {

        var url = "_app/ajax/socio.php";
        var form = $("form").serialize();

        if ($("#acao").val() === "incluir" || $("#acao").val() === "incluirRegistro") {
            var acaoText = "Gravar";
        } else {
            var acaoText = "Atualizar";
        }

        $(this).attr("disabled", true).text("Aguarde...");

        console.log(form);

        $.ajax({
            //Caminho(url) - method(type -> post) - Formato de troca de dados(dataType -> json) - Dados do html(data)
            url: url,
            type: 'post',
            dataType: 'json',
            data: form,
            success: function (data) {
                //Caso o retorno seja do tipo success
                if (data.resposta["success"]) {
                    $('#msg').append(data.resposta["success"])
                    $('#msg').slideDown();
                    $('#msg').last().addClass('alert-success');

                    setTimeout(function () {
                        $("#btnGravar").attr("disabled", false).text(acaoText);

                        $('#msg').slideUp();
                        $('#msg').empty();
                        $('#msg').removeClass('alert-success');
                        window.location.href = "index.php";
                    }, 2000);
                } else if (data.resposta["warning"]) {
                    $('#msg').slideDown();
                    $('#msg').append(data.resposta["warning"])
                    $('#msg').last().addClass('alert-warning');

                    setTimeout(function () {
                        $("#btnGravar").attr("disabled", false).text(acaoText);

                        $('#msg').slideUp();
                        $('#msg').empty();
                        $('#msg').removeClass('alert-warning');
                    }, 2000);
                } else {
                    $('#msg').append(data.resposta["danger"])
                    $('#msg').last().addClass('alert-danger');
                    setTimeout(function () {
                        $("#btnGravar").attr("disabled", false).text(acaoText);

                        $('#msg').slideUp();
                        $('#msg').empty();
                        $('#msg').removeClass('alert-danger');
                    }, 2000);
                }
            }
        });
    });

    //Rotina para alteração dos sócios.
    $(".btnAlterar").on('click', function () {
        var acao = "alterar";
        var id = $(this).attr("data-id");
        var nome = $(this).attr("data-nome");

        $("input[name='id']").val(id);
        $("input[name='nome']").val(nome);
        $("input[name='acao']").val(acao);
        $("button[name='grava']").text("Atualizar");
    });

    //Rotina para cancelar o cadastro
    $("#btnCancelar").on('click', function () {
        var acao = "incluir";

        $("input[name='id']").val("");
        $("input[name='nome']").val("");
        $("input[name='acao']").val(acao);
    });

    //Rotina para exclus�o dos s�cios.
    $(".btnExcluir").on('click', function () {

        var url = "_app/ajax/socio.php";
        var acao = "desativar";
        var id = $(this).attr("data-id");

        $.ajax({
            //Caminho(url) - method(type -> post) - Formato de troca de dados(dataType -> json) - Dados do html(data)
            url: url,
            type: 'post',
            dataType: 'json',
            data: {id: id, acao: acao},
            success: function (data) {
                //Caso o retorno seja do tipo success
                if (data.resposta["success"]) {
                    $('#msg').slideDown();
                    $('#msg').append(data.resposta["success"])
                    $('#msg').last().addClass('alert-success');
                    // $('.modal').slideUp();
                    $('#modalExcluir' + id).modal('hide')
                    setTimeout(function () {
                        $('#msg').slideUp();
                        $('#msg').empty();
                        $('#msg').removeClass('alert-success');
                        window.location.href = "index.php";
                    }, 2000);
                } else if (data.resposta["warning"]) {
                    $('#msg').slideDown();
                    $('#msg').append(data.resposta["warning"])
                    $('#msg').last().addClass('alert-warning');

                    setTimeout(function () {
                        $("#btnGravar").attr("disabled", false).text(acaoText);

                        $('#msg').slideUp();
                        $('#msg').empty();
                        $('#msg').removeClass('alert-warning');
                    }, 2000);
                } else {
                    $('#msg').append(data.resposta["danger"])
                    $('#msg').last().addClass('alert-danger');
                    setTimeout(function () {
                        $("#btnGravar").attr("disabled", false).text(acaoText);

                        $('#msg').slideUp();
                        $('#msg').empty();
                        $('#msg').removeClass('alert-danger');
                    }, 2000);
                }
            }
        });
    });
});


// SEARCH ZIPCODE
if ($('.zip_code_search').val() != '') {
    $('form[name=form-cart-shipping]').find('input[name="action"]').val('calc-shipping');
}

$('.zip_code_search').blur(function () {

    function emptyForm() {
        $(".street").val("");
        $(".teste").val("");
        $(".neighborhood").val("");
        $(".city").val("");
        $(".state").val("");
    }

    var zip_code = $(this).val().replace(/\D/g, '');
    var validate_zip_code = /^[0-9]{8}$/;

    if (zip_code.length > 5) {
        if (zip_code != "" && validate_zip_code.test(zip_code)) {

            $(".street").val("");
            $(".neighborhood").val("");
            $(".city").val("");
            $(".state").val("");

            $.getJSON("https://viacep.com.br/ws/" + zip_code + "/json/?callback=?", function (data) {

                if (!("erro" in data)) {
                    $().val(data.logradouro);
                    $(".neighborhood").val(data.bairro);
                    $(".city").val(data.localidade);
                    $(".state").val(data.uf);

                    $('form[name=form-cart-shipping]').find('input[name="action"]').val('calc-shipping');
                } else {
                    emptyForm();
                    // ajaxMessage("CEP não encontrado.", 3);
                    alert("CEP não encontrado.");
                }
            });
        } else {
            emptyForm();
            // message = "<div class='message error'>CEP não encontrado!</div>";
            // ajaxMessage(message, 3);
            alert("Formato de CEP inválido.");
        }
    }
});