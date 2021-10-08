window.mobileAndTabletCheck = function () {
  let check = false;
  (function (a) {
    if (
      /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(
        a
      ) ||
      /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
        a.substr(0, 4)
      )
    )
      check = true;
  })(navigator.userAgent || navigator.vendor || window.opera);
  return check;
};

window.mobileCheck = function () {
  let check = false;
  (function (a) {
    if (
      /(android|ipad|iphone|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(
        a
      ) ||
      /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
        a.substr(0, 4)
      )
    )
      check = true;
  })(navigator.userAgent || navigator.vendor || window.opera);
  return check;
};

$(document).ready(function () {
  var fullUrl = window.location.href;
  var pathname = window.location.pathname;

  const date = new Date();
  const dateTimeFormat = new Intl.DateTimeFormat("en", {
    year: "numeric",
    month: "short",
    day: "2-digit"
  });
  const [
    { value: month },
    ,
    { value: day },
    ,
    { value: year }
  ] = dateTimeFormat.formatToParts(date);
  $("input").attr("autocomplete", day + "" + month + "" + year + "_input");
  $("input").attr("required", "required");
  $("select").attr("required", "required");
  $('[data-toggle="tooltip"]').tooltip();

  var pages = {
    "1": "index.php",
    "2": "2_escolha_seu_plano",
    "3": "3_mps",
    "4": "4_incluir_dependentes",
    "5": "5_ficha_titular",
    "6": "6_resumo",
    "7": "7_validacao",
    "8": "8_ficha_dependentes",
    "9": "9_fichas_anexos",
    "10": "10_fichas_enviadas",
    "11": "11_ds",
    "12": "12_ds_enviada",
    "13": "13_rascunho",
    "14": "14_gerar_proposta",
    "15": "15_finalizar",
    "16": "16_fim"
  };

  $("#btnCancelaCart").click(function () {
    $.confirm({
      title: "Tem certeza?",
      theme: "modern",
      content: "Você deseja cancelar este processo?",
      buttons: {
        Sim: function () {
          localStorage.clear();
          setTimeout(() => {
            window.location.href = "index.php";
          }, 500);
        },
        Não: function () {}
      }
    });
  });

  /**
   * safari trick
   */
  $(".btn").mouseup(function (e) {
    e.preventDefault();
  });

  // var availableTags = [
  //   "Administrador",
  //   "Advogado",
  //   "Aeronauta",
  //   "Aeroviário",
  //   "Agronomo",
  //   "Arquiteto",
  //   "Arquivista",
  //   "Artista",
  //   "Assistente Social",
  //   "Atleta Profissional",
  //   "Atuário",
  //   "Autônomo",
  //   "Auxiliar de Enfermagem",
  //   "Bacharel em Letras",
  //   "Bibliotecário",
  //   "Biólogo",
  //   "Biomédico",
  //   "Contabilista",
  //   "Corretor de Imóveis",
  //   "Corretor de Seguros",
  //   "Desenhista Industrial",
  //   "Designer",
  //   "Despachante aduaneiro",
  //   "Economista",
  //   "Educador Fisico",
  //   "Enfermeiro",
  //   "Engenheiro",
  //   "Estatístico",
  //   "Estudante",
  //   "Farmacêutico",
  //   "Filósofo",
  //   "Físico",
  //   "Fisioterapeuta",
  //   "Fonoaudiólogo",
  //   "Fotógrafo",
  //   "Funcionário do comércio",
  //   "Gastrônomo",
  //   "Geólogo",
  //   "Historiador",
  //   "Hotelaria",
  //   "Jornalista",
  //   "Marketeiro",
  //   "Matemático",
  //   "Médico",
  //   "Médico Veterinário",
  //   "Músico",
  //   "Nutricionista",
  //   "Odontólogo",
  //   "Pedagogo",
  //   "Professor",
  //   "Profissional de Finanças",
  //   "Profissional de Informática",
  //   "Profissional de Logística",
  //   "Profissional de Recursos Humanos",
  //   "Profissional de Segurança do Trabalho",
  //   "Profissional de segurança privada",
  //   "Profissional de Tecnologia da Informação",
  //   "Psicólogo",
  //   "Publicitário",
  //   "Químico",
  //   "Radialista",
  //   "Radiologista",
  //   "Relações Públicas e Internacionais",
  //   "Representante Comercial",
  //   "Secretário",
  //   "Servidor Público Estadual",
  //   "Servidor público Federal",
  //   "Servidor Público Municipal",
  //   "Sociólogo",
  //   "técnico de enfermangem",
  //   "Técnico em contabilidade",
  //   "Técnico Industrial",
  //   "Teólogo",
  //   "Tradutor",
  //   "Turismólogo",
  //   "Vendedor"
  // ];

  var availableProfissoes = [];

  //seta pagina atual
  if (fullUrl.indexOf("2_") != -1) {
    localStorage.setItem("currentPage", 2);
  } else if (
    fullUrl.indexOf("index") != -1 ||
    pathname[pathname.length - 1] === "/"
  ) {
    localStorage.setItem("currentPage", 1);
    // $("#profissao").select2({
    //   data: availableTags,
    //   dropdownAutoWidth: true
    // });
    // $(".select2").addClass("form-control");
  } else if (fullUrl.indexOf("3_mps") != -1) {
    localStorage.setItem("currentPage", 3);
  } else if (fullUrl.indexOf("4_incluir") != -1) {
    localStorage.setItem("currentPage", 4);
  } else if (fullUrl.indexOf("5_ficha") != -1) {
    localStorage.setItem("currentPage", 5);
  } else if (fullUrl.indexOf("6_resumo") != -1) {
    localStorage.setItem("currentPage", 6);
  } else if (fullUrl.indexOf("7_") != -1) {
    localStorage.setItem("currentPage", 7);
  } else if (fullUrl.indexOf("8_") != -1) {
    localStorage.setItem("currentPage", 8);
  } else if (fullUrl.indexOf("9_") != -1) {
    localStorage.setItem("currentPage", 9);
  } else if (fullUrl.indexOf("10_") != -1) {
    localStorage.setItem("currentPage", 10);
  } else if (fullUrl.indexOf("11_") != -1) {
    localStorage.setItem("currentPage", 11);
  } else if (fullUrl.indexOf("12_") != -1) {
    localStorage.setItem("currentPage", 12);
  } else if (fullUrl.indexOf("13_") != -1) {
    localStorage.setItem("currentPage", 13);
  } else if (fullUrl.indexOf("14_") != -1) {
    localStorage.setItem("currentPage", 14);
  } else if (fullUrl.indexOf("15_") != -1) {
    localStorage.setItem("currentPage", 15);
  } else if (fullUrl.indexOf("16_") != -1) {
    localStorage.setItem("currentPage", 16);
  }
  //fim seta pagina

  //checa se tem processo
  if (localStorage.getItem("currentStep") !== null) {
    if (
      localStorage.getItem("currentStep") != localStorage.getItem("currentPage")
    ) {
      $.confirm({
        title: "Alerta!",
        theme: "modern",
        content:
          "Vi que você já tem um processo em andamento, deseja continuar de onde parou?",
        buttons: {
          Sim: function () {
            window.location.href =
              pages[localStorage.getItem("currentStep")] + ".php";
          },
          Não: function () {
            $.confirm({
              title: "Tem certeza?",
              theme: "modern",
              content: "Você deseja apagar todo o processo?",
              buttons: {
                Sim: function () {
                  localStorage.clear();
                  setTimeout(() => {
                    window.location.href = "index.php";
                  }, 500);
                },
                Não: function () {
                  window.location.href =
                    pages[localStorage.getItem("currentStep")] + ".php";
                }
              }
            });
          }
        }
      });
    }
  } else {
    if (localStorage.getItem("currentPage") !== "1") {
      localStorage.clear();
      window.location.href = "index.php";
    }
  }
  //fim checa

  $(".filter-button").click(function () {
    var value = $(this).attr("data-filter");

    if (value == "all") {
      $(".filter").show("1000");
    } else {
      $(".filter")
        .not("." + value)
        .hide("3000");
      $(".filter")
        .filter("." + value)
        .show("3000");
    }
  });

  //actions etapa 1
  $("#btnE1").click(function (e) {
    $(".erro-msg").text("");
    if ($(this).hasClass("able")) {
      e.stopPropagation();
      return;
    }
    $(".erro-msg").addClass("loader");
    var available = ["rn", "pe", "rj", "sp"];
    var valida = validaCamposE1();

    if (valida !== false) {
      if (available.includes(valida.uf.toLowerCase())) {
        $.confirm({
          title: "Busca Profissão",
          theme: "modern",
          columnClass: "col-md-8 col-md-offset-3",
          content:
            "" +
            '<form action="" class="formProfissaoK col-md-12">' +
            '<div class="row">\
              <span class="texto1">Ótimo, temos cobertura para a sua localidade, agora precisamos saber se sua profissão está disponível para contratação em sua localidade nessa modalidade de plano por adesão.</span>\
              <br>\
            </div>' +
            '<div class="form-row align-items-center">\
              <div class="col-sm-12 my-1 divBuscaP">\
                <label class="sr-only" for="inlineFormInputGroupProfissao">Profissão</label>\
                <div class="input-group">\
                  <div class="input-group-prepend">\
                    <div class="input-group-text"><i class="fa fa-briefcase" style="width:20px;"></i></div>\
                  </div>\
                  <input autocomplete="off1112233" type="text" name="txtBuscaProfissao" class="form-control" id="inlineFormInputGroupProfissao" placeholder="Informe o nome ou parte do nome...">\
                </div>\
              </div>\
              <div class="col-sm-12 my-1 divResultP" style="display:none">\
                <label class="sr-only" for="inlineFormInputGroupProfissao">Profissão</label>\
                <div class="input-group">\
                  <div class="input-group-prepend">\
                    <div class="input-group-text"><i class="fa fa-briefcase" style="width:20px;"></i></div>\
                  </div>\
                  <select class="form-control" id="profissao" title="Sua Profissão, exemplo: Advogado">\
                    <option value="false">Informe sua profissão</option>\
                  </select>\
                </div>\
                <div align="center"><br><button type="button" id="btnSalvaProfissao" class="btn btn-success btn-sm">Salvar</button></div>\
              </div>\
            </div>' +
            "</form>",
          buttons: {
            formSubmit: {
              text: "Continuar",
              isDisabled: false,
              btnClass: "btn-blue",
              action: function () {
                var _profissoes;
                var jc = this;
                var name = this.$content
                  .find('input[name^="txtBuscaProfissao"]')
                  .val();
                if (name !== "") {
                  var data = new FormData();
                  var infoCustomer = JSON.parse(
                    localStorage.getItem("infoCustomer")
                  );
                  data.append("frmType", "buscaProfissoes");
                  data.append("uf", infoCustomer.UF_CRM_1582805357);
                  data.append("profissao", $.trim(name));
                  $.ajax({
                    type: "POST",
                    enctype: "multipart/form-data",
                    url: "api.php",
                    data: data,
                    async: true,
                    processData: false, // impedir que o jQuery tranforma a "data" em querystring
                    contentType: false, // desabilitar o cabeçalho "Content-Type"
                    cache: false, // desabilitar o "cache"
                    dataType: "json",
                    success: function (retorno) {
                      if (retorno.profissoes === "") {
                        $.alert(
                          "Infelizmente não localizei nenhum registro para a sua profissão."
                        );

                        jc.$content
                          .find('input[name^="txtBuscaProfissao"]')
                          .val("")
                          .focus();
                      } else {
                        _profissoes = retorno.profissoes;
                        availableProfissoes = [];
                        $.each(_profissoes, function () {
                          var t = new Object();
                          t.id = JSON.stringify(this);
                          t.text = this.NAME;
                          availableProfissoes.push(t);
                        });

                        $("#profissao").select2({
                          data: availableProfissoes,
                          dropdownAutoWidth: true
                        });
                        $(".select2").addClass("form-control");

                        jc.$content.find(".divBuscaP").hide();
                        jc.buttons.formSubmit.disable();
                        jc.$content.find(".divResultP").show();
                      }
                    }
                  });
                }
                // $.each(_profissoes.result, function () {
                //   console.log(this);
                // });
                return false;
              }
            },
            Cancelar: function () {
              $(".erro-msg").removeClass("loader");
            }
          },
          onContentReady: function () {
            var jc = this;
            //evento busca profissao
            this.$content.find("#btnSalvaProfissao").click(function () {
              var _prof = $("#profissao option:selected").val();
              if (_prof === "false") {
                $.alert("Você deve escolher uma opção.");
              } else {
                $(this).attr("disabled", "disabled");
                $(this).html('<img src="assets/img/carregando.gif" /> Aguarde');
                _prof = JSON.parse(_prof);
                var infoCustomer = JSON.parse(
                  localStorage.getItem("infoCustomer")
                );
                infoCustomer.UF_CRM_1578521646 = _prof.NAME;
                infoCustomer.PROFISSAO = _prof;
                localStorage.setItem(
                  "infoCustomer",
                  JSON.stringify(infoCustomer)
                );
                setTimeout(() => {
                  var add_lead = geraLead();
                  if (!add_lead) {
                    alert("Houve um erro, você será redirecionado.");
                    window.location.href = "index.php";
                  }
                  $(".erro-msg").removeClass("loader");
                }, 500);
                localStorage.setItem("currentStep", 2);
                setTimeout(() => {
                  window.location.href = "2_escolha_seu_plano.php";
                }, 500);
              }
            });
            //fim busca
            this.$content.find(".formProfissaoK").on("submit", function (e) {
              // if the user submits the form by pressing enter in the field.
              e.preventDefault();
              jc.$$formSubmit.trigger("click"); // reference the button and click it
            });
          }
        });

        // setTimeout(() => {
        //   var add_lead = geraLead();
        //   if (!add_lead) {
        //     alert("Houve um erro, você será redirecionado.");
        //     window.location.href = "index.php";
        //   }
        //   $(".erro-msg").removeClass("loader");
        // }, 500);
        // localStorage.setItem("currentStep", 2);
        // setTimeout(() => {
        //   window.location.href = "2_escolha_seu_plano.php";
        // }, 500);
        //window.location.href = "2_escolha_seu_plano.php";
      } else {
        //alert("No momento não estamos com planos para a sua cidade.");
        $(".erro-msg").removeClass("loader");

        $("#btnE1").hide();
        $("#enviaForaAbragencia").show();

        $(".erro-msg").text(
          "No momento, não temos opções para sua região. 😔 \nVocê deseja enviar os dados já preenchidos para que na abertura de pontos em sua região, possamos avisá-lo?"
        );
      }
    } else {
      $(".erro-msg").removeClass("loader");
      $(".erro-msg").text("Verifique e preencha os campos corretamente.");
    }
    //console.log("click: " + valida);
    /* if (valida === false) {
      //alert("Por favor, preencha os campos corretamente");
    } else {
      //alert($.trim($("#data_nascimento").val()));
    } */
  });

  function validaCamposE1() {
    var nome = $.trim($("#nome").val());
    var cep = $.trim($("#cep").val());
    var data_nascimento = $.trim($("#data_nascimento").val());
    var cel = $("#cel").val();
    //var profissao = $.trim($("#profissao").val());
    var email = $.trim($("#email").val());
    var utm_source = $("#utm_source").val();
    var utm_medium = $("#utm_medium").val();
    var utm_campaign = $("#utm_campaign").val();
    var utm_content = $("#utm_content").val();
    var utm_term = $("#utm_term").val();

    var continua = true;
    if (isEmpty(nome) || isBlank(nome)) continua = false;
    if (isEmpty(cep) || isBlank(cep) || cep.length !== 8) continua = false;
    if (
      isEmpty(data_nascimento) ||
      isBlank(data_nascimento) ||
      data_nascimento.length !== 10
    )
      continua = false;
    if (isEmpty(cel) || isBlank(cel) || cel.length !== 15) continua = false;
    //if (isEmpty(profissao) || profissao === "false" || isBlank(profissao))
    //continua = false;
    if (isEmpty(email) || isBlank(email) || !isEmail(email)) continua = false;

    //console.log("ini: " + continua);

    var retorno = null;
    if (continua) {
      //if continua busca cep
      var data = new FormData();
      data.append("frmType", "buscaCep");
      data.append("frmCep", cep);
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "api.php",
        data: data,
        async: false,
        processData: false, // impedir que o jQuery tranforma a "data" em querystring
        contentType: false, // desabilitar o cabeçalho "Content-Type"
        cache: false, // desabilitar o "cache"
        dataType: "json",
        success: function (result) {
          retorno = result;
        }
      });
    }

    //infoCustomer object
    var infoCustomer = new Object();

    if (retorno != null) {
      if (retorno.error === "true") {
        $(".erro-cep").text("Verifique o cep.");
        continua = false;
      } else {
        $(".erro-cep").text("");
        continua = retorno;
        //append dados localidade
        infoCustomer.UF_CRM_1578511012 = retorno.localidade.toUpperCase();
        infoCustomer.UF_CRM_1582805357 = retorno.uf.toUpperCase();
        infoCustomer.UF_CRM_1578510989 = retorno.bairro.toUpperCase();
        infoCustomer.UF_CRM_1578510781 = retorno.logradouro.toUpperCase();
      }
    }

    //salva tmp
    infoCustomer.NAME = nome;
    infoCustomer.UF_CRM_1578521856 = data_nascimento;
    infoCustomer.UF_CRM_1578510751 = cep;
    infoCustomer.PHONE = cel;
    //infoCustomer.UF_CRM_1578521646 = profissao.toUpperCase();
    infoCustomer.EMAIL = email;
    infoCustomer.UTM_SOURCE = utm_source;
    infoCustomer.UTM_MEDIUM = utm_medium;
    infoCustomer.UTM_CAMPAIGN = utm_campaign;
    infoCustomer.UTM_CONTENT = utm_content;
    infoCustomer.UTM_TERM = utm_term;
    //calcula idade
    infoCustomer.IDADE = CalcularIdade(data_nascimento);

    localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));
    //salva tmp

    return continua;
  }
  //fim etapa 1

  //actions sem cobertura
  $("#enviaForaAbragencia").click(function () {
    $(".erro-msg").text("");
    $(".erro-msg").addClass("loader");
    var data = new FormData();
    data.append("frmType", "gravaLead");
    data.append("cobertura", "n");
    data.append("payload", localStorage.getItem("infoCustomer"));
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "api.php",
      data: data,
      async: false,
      processData: false, // impedir que o jQuery tranforma a "data" em querystring
      contentType: false, // desabilitar o cabeçalho "Content-Type"
      cache: false, // desabilitar o "cache"
      dataType: "json",
      success: function (result) {
        $(".erro-msg").removeClass("loader");
        $(".success-msg").text("Obrigado! Seu contato foi enviado.");
        $("#enviaForaAbragencia").hide();
        localStorage.clear();
        setTimeout(() => {
          window.location.reload();
        }, 4000);
      }
    });
  });
  //fim actions sem cobertura

  //gera lead fluxo
  function geraLead() {
    var data = new FormData();
    var retorno = true;
    data.append("frmType", "gravaLead");
    data.append("cobertura", "s");
    data.append("payload", localStorage.getItem("infoCustomer"));
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "api.php",
      data: data,
      async: false,
      processData: false, // impedir que o jQuery tranforma a "data" em querystring
      contentType: false, // desabilitar o cabeçalho "Content-Type"
      cache: false, // desabilitar o "cache"
      dataType: "json",
      success: function (result) {
        if (result.error === "false") {
          //console.log(result);
          var lead_id = result.lead_id;
          localStorage.setItem("lead_id", lead_id);
        } else {
          retorno = false;
        }
      }
    });
    return retorno;
  }
  //fim gera lead fluxo

  //carrega planos
  function carregaPlanos() {
    if (
      !(
        localStorage.getItem("currentStep") !== null &&
        localStorage.getItem("currentStep") === "2" &&
        localStorage.getItem("infoCustomer") !== null
      )
    ) {
      console.log("erro");
      alert(
        "Há algo errado com sua solicitação! Vou redirecionar você para a página inicial."
      );
      window.location.href = "index.php";
    }

    var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
    $(".nomeTit").text(infoCustomer.NAME);

    var data = new FormData();
    var retorno = true;
    data.append("frmType", "buscaPlanos");
    data.append("payload", localStorage.getItem("infoCustomer"));
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "api.php",
      data: data,
      async: false,
      processData: false, // impedir que o jQuery tranforma a "data" em querystring
      contentType: false, // desabilitar o cabeçalho "Content-Type"
      cache: false, // desabilitar o "cache"
      dataType: "json",
      success: function (result) {
        if (result.error === "false") {
          // console.log(result.data);
          // console.log("");
          // console.log(JSON.parse(result.payloadUsed));
          $("#planosToShow").html(result.data);
          //mostrar();
        } else {
          retorno = false;
        }
      }
    });
    $("#loading").hide();
  }
  //fim carrega planos

  //funções
  function isEmpty(str) {
    return !str || 0 === str.length;
  }

  function validaCpf(cpf) {
    cpf = cpf.replace(/\D/g, "");
    if (cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
    var result = true;
    [9, 10].forEach(function (j) {
      var soma = 0,
        r;
      cpf
        .split(/(?=)/)
        .splice(0, j)
        .forEach(function (e, i) {
          soma += parseInt(e) * (j + 2 - (i + 1));
        });
      r = soma % 11;
      r = r < 2 ? 0 : 11 - r;
      if (r != cpf.substring(j, j + 1)) result = false;
    });
    return result;
  }

  function getBase64(file) {
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {
      //console.log(reader.result);
      localStorage.setItem("proofEntityAttachment", reader.result);
    };
    reader.onerror = function (error) {
      //console.log("Error: ", error);
      localStorage.setItem("proofEntityAttachment", false);
    };
  }

  function isBlank(str) {
    return !str || /^\s*$/.test(str);
  }

  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }

  function CalcularIdade(dataNasc) {
    var dataAtual = new Date();
    var anoAtual = dataAtual.getFullYear();
    var anoNascParts = dataNasc.split("-");
    var diaNasc = anoNascParts[2];
    var mesNasc = anoNascParts[1];
    var anoNasc = anoNascParts[0];
    var idade = anoAtual - anoNasc;
    var mesAtual = dataAtual.getMonth() + 1;

    if (mesAtual < mesNasc) {
      idade--;
    } else {
      if (mesAtual == mesNasc) {
        if (dataAtual.getDate() < diaNasc) {
          idade--;
        }
      }
    }
    return idade;
  }

  function montaFileUploadDeps(dep) {
    var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
    var inputNames = {
      cnhDep1: "UF_CRM_1589308786",
      certidaoDep1: "UF_CRM_1589308735",
      casamentoDep1: "UF_CRM_1589308754",
      rgfDep1: "UF_CRM_1589308664",
      rgvDep1: "UF_CRM_1589308681",
      cpffDep1: "UF_CRM_1589308705",
      cpfvDep1: "UF_CRM_1589308718",
      cnhDep2: "UF_CRM_1589308815",
      certidaoDep2: "UF_CRM_1589308901",
      casamentoDep2: "UF_CRM_1589308918",
      rgfDep2: "UF_CRM_1589308830",
      rgvDep2: "UF_CRM_1589308841",
      cpffDep2: "UF_CRM_1589308861",
      cpfvDep2: "UF_CRM_1589308876",
      cnhDep3: "UF_CRM_1589309362",
      certidaoDep3: "UF_CRM_1589309385",
      casamentoDep3: "UF_CRM_1589309407",
      rgfDep3: "UF_CRM_1589309429",
      rgvDep3: "UF_CRM_1589309446",
      cpffDep3: "UF_CRM_1589309469",
      cpfvDep3: "UF_CRM_1589309486",
      cnhDep4: "UF_CRM_1589309521",
      certidaoDep4: "UF_CRM_1589309565",
      casamentoDep4: "UF_CRM_1589309550",
      rgfDep4: "UF_CRM_1589309581",
      rgvDep4: "UF_CRM_1589309606",
      cpffDep4: "UF_CRM_1589309637",
      cpfvDep4: "UF_CRM_1589309651",
      cnhDep5: "UF_CRM_1589309766",
      certidaoDep5: "UF_CRM_1589309806",
      casamentoDep5: "UF_CRM_1589309825",
      rgfDep5: "UF_CRM_1589309847",
      rgvDep5: "UF_CRM_1589309868",
      cpffDep5: "UF_CRM_1589309881",
      cpfvDep5: "UF_CRM_1589309898"
    };

    var arrConjuge = [396, 416, 438, 460, 482];

    var html_output = `
      <div class="card">
      <div class="card-header" id="headingOne${dep}">
        <h5 class="mb-0">
          <button type="button" class="btn btn-link collapsed acdDep${dep}" data-toggle="collapse" data-target="#collapseOne${dep}" aria-expanded="true" aria-controls="collapseOne${dep}">
            Documentação Dependente ${dep} - ${
      infoCustomer.dependentes[dep].NAME
    }
          </button>
        </h5>
      </div>

      <div id="collapseOne${dep}" class="collapse" aria-labelledby="headingOne${dep}" data-parent="#accordion">
        <div class="card-body docsDep${dep}">
          <div class="row col-md-12">
            <p class="texto1">
            <span class="texto1">
            Atentar para o envio dos seguintes arquivos de acordo com as regras:<br>
            - CNH ou RG frente e verso+CPF
            - Dependente até 12 anos, subir rg ou certidão de nascimento<br>
            - Se Cônjuge além de CNH ou RG frente e verso+CPF, subir certidão de casamento ou declaração de união estável<br>
            <br>Lembre-se que sem os devidos documentos anexados o seu plano pode demorar para ser liberado.
            </span>
            <br>
            </p>
          </div>
          <div class="row col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label for="cnh">CNH</label>
                <input type="file" class="form-control-file" name="${
                  inputNames["cnhDep" + dep.toString()]
                }" id="cnhDep${dep}" ${
      infoCustomer.dependentes[dep].idade < 18 ? "disabled" : ""
    }>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="comprovante">Certidão de Nascimento(Apenas para até 12 anos)</label>
                <input type="file" class="form-control-file" name="${
                  inputNames["certidaoDep" + dep.toString()]
                }" id="certidaoDep${dep}" ${
      infoCustomer.dependentes[dep].idade <= 12 ? "" : "disabled"
    } >
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="comprovante">Certidão de Casamento (Se Cônjuge)</label>
                <input type="file" class="form-control-file" name="${
                  inputNames["casamentoDep" + dep.toString()]
                }" id="casamentoDep${dep}" ${
      arrConjuge.includes(parseInt(infoCustomer.dependentes[dep].GRAU))
        ? ""
        : "disabled"
    } >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="rgf">RG Frente</label>
                <input type="file" class="form-control-file" name="${
                  inputNames["rgfDep" + dep.toString()]
                }" id="rgfDep${dep}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="rgv">RG Verso</label>
                <input type="file" class="form-control-file" name="${
                  inputNames["rgvDep" + dep.toString()]
                }" id="rgvDep${dep}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="cpff">CPF Frente</label>
                <input type="file" class="form-control-file" name="${
                  inputNames["cpffDep" + dep.toString()]
                }" id="cpffDep${dep}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="cpfv">CPF Verso</label>
                <input type="file" class="form-control-file" name="${
                  inputNames["cpfvDep" + dep.toString()]
                }" id="cpfvDep${dep}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    `;

    return html_output;
  }
  //fim funções

  //funções etapa 2
  if (localStorage.getItem("currentPage") === "2") {
    carregaPlanos();
    setTimeout(() => {
      $("#loading").hide();
    }, 2000);

    //escolha plano
    $("#planosToShow").on("click", ".choosePlan", function (e) {
      var plano = JSON.parse($(this).attr("data-plano"));

      $(".nomePlan").text(plano.NAME);
      $(".precoPlan").text(plano.PRICE);
      $(".picture-plan").attr("src", plano.imgSrc);

      localStorage.setItem("plano", JSON.stringify(plano));

      $(this).removeClass("btn-primary");
      setTimeout(() => {
        $(this).addClass("btn-success");
        mostrar2();
      }, 500);
      $("#btnE2").removeAttr("disabled");
      if (window.mobileCheck) {
        $("#planos").hide();
      }
    });

    $("#alteraPlano").click(function () {
      localStorage.removeItem("plano");
      $("#planos2").hide();
      $("#btnE2").attr("disabled", "disabled");
      $("#loading").show();
      setTimeout(() => {
        carregaPlanos();
      }, 200);
      if (window.mobileCheck) {
        $("#planos").show();
      }
    });

    $("#btnE2").click(function () {
      var plano = JSON.parse(localStorage.getItem("plano"));
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      infoCustomer.PLANO_ESCOLHIDO = plano;
      localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));
      localStorage.setItem("currentStep", "3");
      localStorage.removeItem("plano");
      window.location.href = "3_mps.php";
    });
  }
  //fim etapa 2

  //funções etapa 3
  if (localStorage.getItem("currentPage") === "3") {
    function carregaPlano() {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      var plano = infoCustomer.PLANO_ESCOLHIDO;

      $(".nomePlan").text(plano.NAME);
      $(".precoPlan").text(plano.PRICE);
      $(".picture-plan").attr("src", plano.imgSrc);
      setTimeout(() => {
        $("#loading").hide();
      }, 500);
    }

    $("#btnE2").click(function () {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      delete infoCustomer.PLANO_ESCOLHIDO;
      localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));
      localStorage.setItem("currentStep", "2");

      window.location.href = "2_escolha_seu_plano.php";
    });

    $("#btnE3").click(function () {
      if ($("#declaraMPS").is(":checked")) {
        var id_operadora = $("#idOperadora").val();
        var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
        localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));
        localStorage.setItem("currentStep", "4");

        window.location.href = "4_incluir_dependentes.php";
      } else {
        $.alert({
          title: "Alerta!",
          theme: "modern",
          content:
            "É necessário marcar a caixa de seleção informando que leu e está ciente."
        });
      }
    });

    // $("#declaraMPS").change(function () {
    //   if ($(this).is(":checked")) {
    //     $("#btnE3").removeAttr("disabled");
    //   } else {
    //     $("#btnE3").addAttr("disabled", "disabled");
    //   }
    // });

    carregaPlano();
  }
  //fim etapa 3

  //funções etapa 4
  if (localStorage.getItem("currentPage") === "4") {
    function carregaPlano() {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      var plano = infoCustomer.PLANO_ESCOLHIDO;

      $(".nomePlan").text(plano.NAME);
      $(".somaPlanos").text(plano.PRICE);
      $(".picture-plan").attr("src", plano.imgSrc);
      setTimeout(() => {
        $("#loading").hide();
      }, 500);
    }

    $("#btnE4").click(function () {
      var qtDep = parseInt($(".qtDep").text());
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      infoCustomer.UF_CRM_1580318169 = qtDep > 0 ? "1" : "0";
      localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));
      localStorage.setItem("qtDep", $(".qtDep").text());
      localStorage.setItem("currentStep", "5");
      window.location.href = "5_ficha_titular.php";
    });

    $("#btnSemDependente").click(function () {
      $.confirm({
        title: "Confirmação.",
        content: "Tem certeza?",
        theme: "modern",
        buttons: {
          Sim: function () {
            var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
            infoCustomer.UF_CRM_1580318169 = "0";
            var somaPlanos = parseFloat($(".somaPlanos").text()).toFixed(2);
            infoCustomer.SUBTOTAL = somaPlanos;
            localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));
            localStorage.setItem("qtDep", "0");
            localStorage.setItem("currentStep", "5");
            window.location.href = "5_ficha_titular.php";
          },
          Não: function () {
            //nothing
          }
        }
      });
    });

    $("#btnAddDep").click(function () {
      var qtdep = parseInt($(".qtDep").text());
      var dataToAdd = $("#data_nasc").val();

      if (qtdep >= 5) {
        alert("Você já adicionou o máximo permitido de 5 dependentes.");
        return false;
      }

      if (dataToAdd == "") return false;

      //
      $.confirm({
        title: "Inclusão Dependente",
        theme: "modern",
        content:
          "" +
          '<form action="" class="formNameK">' +
          '<div class="form-group">' +
          "<label>Informe o nome do Dependente</label>" +
          '<input type="text" placeholder="Nome Dependente" class="nameDepAdd form-control" required />' +
          "</div>" +
          "</form>",
        buttons: {
          formSubmit: {
            text: "Salvar",
            btnClass: "btn-blue",
            action: function () {
              var name = this.$content.find(".nameDepAdd").val().toUpperCase();
              if (!name) {
                $.alert("Informe um nome.");
                return false;
              }
              doAddDep(name);
            }
          },
          Cancelar: function () {
            $("#data_nasc").val("");
          }
        },
        onContentReady: function () {
          // bind to events
          this.$content.find(".nameDepAdd").focus();
          var jc = this;
          this.$content.find(".formNameK").on("submit", function (e) {
            // if the user submits the form by pressing enter in the field.
            e.preventDefault();
            jc.$$formSubmit.trigger("click"); // reference the button and click it
          });
        }
      });
      //

      function doAddDep(nome) {
        if (dataToAdd != "") {
          dataToShow = dataToAdd.split("-");
          dataToShow =
            dataToShow[2] + "/" + dataToShow[1] + "/" + dataToShow[0];
          var elem =
            '<tr>\
                        <td scope="row">' +
            dataToShow +
            "</td>\
                    <td>" +
            nome +
            '</td><td><img width="24" class="delDep" src="assets/img/b_drop.png" /></td>\
                    <input type="hidden" name="data_nasc[]" value="' +
            dataToAdd +
            '" />\
                    <input type="hidden" name="nome_dep[]" value="' +
            nome +
            '" />\
                      </tr>';
          $(".datas_deps").append(elem);
          qtdep++;
          $("#data_nasc").val("");
          $(".qtDep").text(qtdep);

          if (qtDep == 5) $("#data_nasc").attr("disabled", "disabled");

          //troca botão
          $("#btnSemDependente").hide();
          $("#btnEncerraAddDep").show();
        }
      }
    });

    function encerraAddDep() {
      $("#loading").show();
      setTimeout(() => {
        var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
        var plano = infoCustomer.PLANO_ESCOLHIDO;
        var qtdep = $(".qtDep").text();
        infoCustomer.UF_CRM_1580318169 = qtdep;

        infoCustomer.dependentes = new Object();

        //iterate deps, call api, get id produto e price
        var dep_i = 1;
        var somaPlanos = parseFloat(plano.PRICE);
        $('input[name^="data_nasc[]"]').each(function () {
          var dataNasc = $(this).val();
          var nomeDep = $(this)
            .closest("tr")
            .find('input[name^="nome_dep[]"]')
            .val();
          var idade = CalcularIdade(dataNasc);
          var data = new FormData();
          data.append("frmType", "buscaPlanoDep");
          data.append("uf", infoCustomer.UF_CRM_1582805357);
          data.append("plano_escolhido", JSON.stringify(plano));
          data.append("idade", idade);

          $.ajax({
            type: "POST",
            enctype: "multipart/form-data",
            url: "api.php",
            data: data,
            async: false,
            processData: false, // impedir que o jQuery tranforma a "data" em querystring
            contentType: false, // desabilitar o cabeçalho "Content-Type"
            cache: false, // desabilitar o "cache"
            dataType: "json",
            success: function (result) {
              if (result.error === "false") {
                var dependente = new Object();
                dependente.nome = nomeDep;
                dependente.data_nasc = dataNasc;
                dependente.id_plano = result.plano.ID;
                dependente.price_plano = result.plano.PRICE;
                dependente.idade = idade;

                somaPlanos += parseFloat(result.plano.PRICE);

                infoCustomer.dependentes[dep_i] = dependente;
              } else {
                alert("Erro, recarregando página.");
                window.location.reload();
              }
            }
          });
          dep_i++;
        });

        infoCustomer.SUBTOTAL = somaPlanos;
        $(".somaPlanos").text(
          " R$ " +
            new Intl.NumberFormat("de-DE", { currency: "EUR" }).format(
              somaPlanos
            )
        );

        $("#btnEncerraAddDep").hide();
        $("#btnE4").removeAttr("disabled");
        $("#btnE4").show();

        setTimeout(() => {
          console.log(infoCustomer);
          localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));
          $(".delDep").remove();
          $(".AddDepTR").html("");
          $("#loading").hide();
        }, 500);
      }, 500);

      // localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));
      // localStorage.setItem("qtDep", qtdep);
      // localStorage.setItem("currentStep", "5");
      // window.location.href = "5_resumo.php";
    }

    $("#btnEncerraAddDep").click(function () {
      $.confirm({
        title: "Confirmação.",
        theme: "modern",
        content: "Tem certeza?",
        buttons: {
          Sim: function () {
            encerraAddDep();
          },
          Não: function () {}
        }
      });
    });

    $(".datas_deps").on("click", ".delDep", function (e) {
      var qtdep = parseInt($(".qtDep").text());
      $(this).closest("tr").remove();
      qtdep--;
      $(".qtDep").text(qtdep);
      $("#data_nasc").val("");
      if (qtdep == 0) {
        //troca botão
        $("#btnEncerraAddDep").hide();
        $("#btnSemDependente").show();
      }
    });

    // carregaPlano();
    //if (localStorage.getItem("deal_id") === null) persisteDados();
    carregaPlano();
  }
  //fim etapa 4

  //funções etapa 5
  if (localStorage.getItem("currentPage") === "5") {
    $("#btnE5").click(function () {
      //todo
    });

    function carregaPlano() {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      var plano = infoCustomer.PLANO_ESCOLHIDO;

      $(".nomeTit").text(infoCustomer.NAME);
      $(".profissaoTit").text(infoCustomer.UF_CRM_1578521646);
      $(".nomePlan").text(plano.NAME);
      $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      $(".qtDep").text(localStorage.getItem("qtDep"));
      $(".picture-plan").attr("src", plano.imgSrc);

      /**
       * inicializa form com campos ja coletados
       */
      $("#ufTit").html(
        "<option selected value=" +
          infoCustomer.UF_CRM_1582805357 +
          ">" +
          infoCustomer.UF_CRM_1582805357 +
          "</option"
      );
      //  $("#ufTit option[value=" + infoCustomer.UF_CRM_1582805357 + "]").attr(
      //   "selected",
      //   "selected"
      // );
      $("input#nomeTit").val(infoCustomer.NAME);
      $("input#emailTit").val(infoCustomer.EMAIL);
      $("input#profissaoTit").val(infoCustomer.UF_CRM_1578521646);
      $("input#dataNascTit").val(infoCustomer.UF_CRM_1578521856);
      $("input#cepTit").val(infoCustomer.UF_CRM_1578510751);
      $("input#endTit").val(infoCustomer.UF_CRM_1578510781);
      /**
       * fim inicialização
       */

      setTimeout(() => {
        $("#loading").hide();
      }, 500);
    }

    carregaPlano();
    //fim carregamento pagina

    /**
     * Eventos
     */
    //forma pagamento
    $("#formaPgto").on("change", function (e) {
      var opcao = $(this).val();
      if (opcao === "") {
        $(".divPgto").hide();
        $(".dadosBanco").html("");
      } else if (opcao === "1") {
        /* Boleto */
        $(".dadosBanco").html("");
        var htmlBoleto =
          '\
        <div class="form-check form-check-inline">\
          <input class="form-check-input" type="checkbox" id="aceitaCobDigital" value="1">\
          <label class="form-check-label" for="aceitaCobDigital">Autorizo o envio do boleto por email e SMS em substituição do envio pelos correios.</label>\
        </div>';
        $(".boletoDigital").html(htmlBoleto);
        $(".divPgto").show();
      } else if (opcao === "2") {
        /* Débito em conta */
        $(".dadosBanco").html("");
        $(".boletoDigital").html("");
        var htmlDebito =
          '\
          <div class="form-row">\
            <div class="form-group col-md-12">\
            <label for="bancoDebito">Banco</label>\
            <select id="bancoDebito" class="form-control" required>\
                <option value="">Escolha</option>\
                <option value="001">BANCO DO BRASIL</option>\
                <option value="341">ITAÚ</option>\
                <option value="033">SANTANDER</option>\
            </select>\
            <small class="form-text text-muted">Se o seu banco não está nessa lista, por gentileza utilize boleto como forma de pagamento.</small>\
            </div>\
            <div class="form-group col-md-6">\
              <label for="bancoAg">Agência</label>\
              <input type="text" max-length="4" class="form-control" id="bancoAg" placeholder="Agência sem dígito" required>\
            </div>\
            <div class="form-group col-md-6">\
              <label for="bancoDigAg">Digito Agência</label>\
              <input type="text" max-length="1" class="form-control" id="bancoDigAg" placeholder="Dígito Agência" required>\
            </div>\
            <div class="form-group col-md-6">\
              <label for="bancoConta">Conta</label>\
              <input type="text" class="form-control" id="bancoConta" placeholder="Conta sem dígito" required>\
            </div>\
            <div class="form-group col-md-6">\
              <label for="bancoDigConta">Digito Conta</label>\
              <input type="text" max-length="1" class="form-control" id="bancoDigConta" placeholder="Dígito Conta" required>\
            </div>\
          </div>';
        $(".dadosBanco").html(htmlDebito);
        $(".divPgto").show();
      }
    });

    //submit form
    $("#frmFichaTit").submit(function (e) {
      e.preventDefault();
      $("#loading").show();
      var nome = $.trim($("#nomeTit").val());
      var cep = $.trim($("#cepTit").val());
      var data_nascimento = $.trim($("#dataNascTit").val());
      var profissao = $.trim($("#profissaoTit").val());
      var email = $.trim($("#emailTit").val());
      //var uf = $.trim($("#ufTit").val());
      var endTit = $.trim($("#endTit").val());
      var numTit = $.trim($("#numTit").val());
      var compTit = $.trim($("#compTit").val());
      var cpfTit = $.trim($("#cpfTit").val());
      var rgTit = $.trim($("#rgTit").val());
      var sexoTit = $.trim($("#sexoTit").val());
      var estCivilTit = $.trim($("#estCivilTit").val());
      var munNascTit = $.trim($("#munNascTit").val());
      var nomeMaeTit = $.trim($("#nomeMaeTit").val());
      var cardSusTit = $.trim($("#cardSusTit").val());
      var formaPgto = $("#formaPgto").val();

      var continua = true;
      var msgErro = "Verifique os seguintes campos:\n";

      //inicializa formaPgto
      var cobBoleto = "0";
      var cobDigital = "0";
      var codigoBanco = "";
      var nomeBanco = "";
      var agencia = "";
      var digAgencia = "";
      var conta = "";
      var digConta = "";
      var cobDebito = "0";

      //formaPgto
      if (formaPgto === "") {
        continua = false;
        msgErro += "\nForma de pagamento.";
      } else if (formaPgto === "1") {
        cobBoleto = "1";
        if ($("#aceitaCobDigital").is(":checked")) cobDigital = 1;
      } else if (formaPgto === "2") {
        cobBoleto = "0";
        cobDigital = "0";
        cobDebito = "1";

        var bancoEscolhido = $("#bancoDebito").val();
        if (bancoEscolhido === "") {
          continua = false;
          msgErro += "\nBanco.";
        } else {
          codigoBanco = bancoEscolhido;
          nomeBanco = $("#bancoDebito option:selected").text();
        }

        agencia = $("#bancoAg").val();
        if (agencia === "" || agencia.toString().length > 4) {
          continua = false;
          msgErro += "\nAgência.";
        }

        digAgencia = $("#bancoDigAg").val();
        if (digAgencia === "" || digAgencia.toString().length > 1) {
          continua = false;
          msgErro += "\nDígito Agência.";
        }

        conta = $("#bancoConta").val();
        if (conta === "") {
          continua = false;
          msgErro += "\nConta.";
        }

        digConta = $("#bancoDigConta").val();
        if (digConta === "" || digConta.toString().length > 1) {
          continua = false;
          msgErro += "\nDígito Conta.";
        }
      }

      if (isEmpty(nome) || isBlank(nome)) {
        continua = false;
        msgErro += "Nome.";
      }
      if (isEmpty(cep) || isBlank(cep) || cep.length !== 8) {
        continua = false;
      }
      if (
        isEmpty(data_nascimento) ||
        isBlank(data_nascimento) ||
        data_nascimento.length !== 10
      )
        continua = false;
      if (isEmpty(profissao) || profissao === "false" || isBlank(profissao))
        continua = false;
      if (isEmpty(email) || isBlank(email) || !isEmail(email)) {
        continua = false;
        msgErro += "\nEmail.";
      }
      if (isEmpty(endTit) || isBlank(endTit)) {
        continua = false;
        msgErro += "\nEndereço.";
      }
      if (isEmpty(compTit) || isBlank(compTit)) {
        continua = false;
        msgErro += "\nComplemento/Ponto de Referência.";
      }
      if (isEmpty(cpfTit) || isBlank(cpfTit) || validaCpf(cpfTit) === false) {
        continua = false;
        msgErro += "\nCPF.";
      }
      if (isEmpty(rgTit) || isBlank(rgTit)) {
        continua = false;
        msgErro += "\nRG.";
      }
      if (isEmpty(munNascTit) || isBlank(munNascTit)) {
        continua = false;
        msgErro += "\nMunicipio Nascimento.";
      }
      if (isEmpty(nomeMaeTit) || isBlank(nomeMaeTit)) {
        continua = false;
        msgErro += "\nNome Mãe.";
      }
      if (isEmpty(cardSusTit) || isBlank(cardSusTit)) {
        continua = false;
        msgErro += "\nCartão SUS.";
      }

      //continua = false;

      if (!continua) {
        $("#loading").hide();
        $.alert({
          title: "Alerta!",
          theme: "modern",
          content: msgErro
        });
      } else {
        var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
        infoCustomer.NAME = nome.toUpperCase();
        infoCustomer.EMAIL = email;
        infoCustomer.UF_CRM_1578510751 = cep;
        infoCustomer.UF_CRM_1578510781 = endTit;
        infoCustomer.UF_CRM_1578510927 = numTit;
        infoCustomer.UF_CRM_1578510945 = compTit.toUpperCase();
        infoCustomer.UF_CRM_1578521943 = munNascTit.toUpperCase();
        infoCustomer.UF_CRM_1578521726 = nomeMaeTit.toUpperCase();
        infoCustomer.UF_CRM_1578521887 = sexoTit;
        infoCustomer.UF_CRM_1578521815 = estCivilTit;
        infoCustomer.UF_CRM_1583766955763 = cardSusTit;
        infoCustomer.UF_CRM_1578521601 = cpfTit;
        infoCustomer.UF_CRM_1583444098092 = rgTit;

        //info pgto
        infoCustomer.UF_CRM_1581529436 = cobBoleto;
        infoCustomer.UF_CRM_1581529045 = cobDigital;
        infoCustomer.UF_CRM_1581529498 = cobDebito;
        infoCustomer.UF_CRM_1581529934 = codigoBanco;
        infoCustomer.UF_CRM_1581529962 = nomeBanco;
        infoCustomer.UF_CRM_1581530003 = agencia;
        infoCustomer.UF_CRM_1581530045 = digAgencia;
        infoCustomer.UF_CRM_1581530083 = conta;
        infoCustomer.UF_CRM_1581530136 = digConta;

        localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));

        $.dialog({
          title: "Aguarde!",
          content: "Estamos processando as informações!"
        });

        localStorage.setItem("currentStep", "6");
        window.location.href = "6_resumo.php";
      }
    });
  }
  //fim etapa 5

  //funções etapa 6
  if (localStorage.getItem("currentPage") === "6") {
    function persisteDados() {
      if (
        localStorage.getItem("deal_id") !== null ||
        localStorage.getItem("contact_id") !== null
      ) {
        carregaPlano();
        return;
      } else {
        if (localStorage.getItem("currentStep") === null) return;
      }

      var data = new FormData();
      data.append("frmType", "converteLead");
      data.append("payload", localStorage.getItem("infoCustomer"));
      data.append("lead_id", localStorage.getItem("lead_id"));

      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "api.php",
        data: data,
        async: false,
        processData: false, // impedir que o jQuery tranforma a "data" em querystring
        contentType: false, // desabilitar o cabeçalho "Content-Type"
        cache: false, // desabilitar o "cache"
        dataType: "json",
        success: function (result) {
          if (result.error === "false") {
            localStorage.setItem("contact_id", result.contact_id);
            localStorage.setItem("deal_id", result.deal_id);
            carregaPlano();
            $("#loading").hide();
          } else {
            alert("erro");
            $("#loading").hide();
          }
        }
      });
    }

    function base64ToBlob(base64) {
      var mime = mime || "";
      var file_parts = base64.split(";");
      mime = file_parts[0].split(":");
      mime = mime[1];
      localStorage.setItem("proofEntityAttachmentMime", mime);
      base64 = file_parts[1].split(",");
      base64 = base64[1];
      var sliceSize = 1024;
      var byteChars = window.atob(base64);
      var byteArrays = [];

      for (
        var offset = 0, len = byteChars.length;
        offset < len;
        offset += sliceSize
      ) {
        var slice = byteChars.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
          byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
      }

      return new Blob(byteArrays, { type: mime });
    }

    $("#btnE6").click(function () {
      $("#loading").show();
      var data = new FormData();
      data.append("frmType", "uploadFicha");
      data.append("payload", localStorage.getItem("infoCustomer"));
      data.append("deal_id", localStorage.getItem("deal_id"));
      data.append(
        "proofEntityAttachment",
        localStorage.getItem("proofEntityAttachment")
      );
      setTimeout(() => {
        $.ajax({
          type: "POST",
          enctype: "multipart/form-data",
          url: "api.php",
          data: data,
          async: false,
          processData: false, // impedir que o jQuery tranforma a "data" em querystring
          contentType: false, // desabilitar o cabeçalho "Content-Type"
          cache: false, // desabilitar o "cache"
          dataType: "json",
          success: function (result) {
            if (result.error === "false") {
              localStorage.setItem("currentStep", "8");
              window.location.href = "8_ficha_dependentes.php";
              $("#loading").hide();
            } else {
              alert("erro, tente novamente.");
              $("#loading").hide();
            }
          }
        });
      }, 500);
    });

    function carregaPlano() {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));

      // if (
      //   infoCustomer.COD_DOC_ENTIDADE === undefined ||
      //   infoCustomer.COD_DOC_ENTIDADE === "" ||
      //   infoCustomer.UF_CRM_1583411966 === undefined ||
      //   infoCustomer.UF_CRM_1583411966 === "" ||
      //   infoCustomer.NOME_ENTIDADE === undefined ||
      //   infoCustomer.NOME_ENTIDADE === ""
      // ) {
      //   //getEntidade
      //   var data = new FormData();
      //   data.append("frmType", "buscaEntidade");
      //   data.append("payload", localStorage.getItem("infoCustomer"));

      //   $.ajax({
      //     type: "POST",
      //     enctype: "multipart/form-data",
      //     url: "api.php",
      //     data: data,
      //     async: false,
      //     processData: false, // impedir que o jQuery tranforma a "data" em querystring
      //     contentType: false, // desabilitar o cabeçalho "Content-Type"
      //     cache: false, // desabilitar o "cache"
      //     dataType: "json",
      //     success: function (result) {
      //       if (result.error === "false") {
      //         var dados = result.data;
      //         infoCustomer.UF_CRM_1583411966 = dados.PROPERTY_324.value;
      //         infoCustomer.UF_CRM_1591131187 = dados.PROPERTY_324.value;
      //         infoCustomer.UF_CRM_1582823504 = dados.PROPERTY_324.value;
      //         infoCustomer.COD_DOC_ENTIDADE = dados.PROPERTY_326.value;
      //         infoCustomer.NOME_ENTIDADE = dados.PROPERTY_368.value;
      // var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      //       } else {
      //         alert("erro");
      //       }
      //     }
      //   });
      //   //fim getEntidade
      // }

      var plano = infoCustomer.PLANO_ESCOLHIDO;

      $(".nomeTit").text(infoCustomer.NAME);
      $(".profissaoTit").text(infoCustomer.UF_CRM_1578521646);
      $(".nomePlan").text(plano.NAME);
      $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      $(".qtDep").text(localStorage.getItem("qtDep"));
      $(".picture-plan").attr("src", plano.imgSrc);
      //$(".nomeEntidade").text(infoCustomer.NOME_ENTIDADE);

      // var imagem =
      //   infoCustomer.UF_CRM_1587331426 === "294"
      //     ? "assets/img/logo-unimed-natal.png"
      //     : "assets/img/logo-unimed-recife.png";
      // $(".nomeTit").text(infoCustomer.NAME);
      // $(".profissaoTit").text(infoCustomer.UF_CRM_1578521646);
      // $(".nomePlan").text(infoCustomer.NOME_PRODUTO);
      // $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      // $(".qtDep").text(localStorage.getItem("qtDep"));
      // $(".picture-plan").attr("src", plano.imgSrc);
      // $(".nomeEntidade").text(infoCustomer.NOME_ENTIDADE);
      //$("#idOperadora").val(infoCustomer.UF_CRM_1587331426);

      localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));

      setTimeout(() => {
        $("#loading").hide();
      }, 500);
    }

    //carregaPlano();
    persisteDados();
    //fim carregamento pagina

    //         infoCustomer.UF_CRM_1583411966 = dados.PROPERTY_324.value;
    //         infoCustomer.UF_CRM_1591131187 = dados.PROPERTY_324.value;
    //         infoCustomer.UF_CRM_1582823504 = dados.PROPERTY_324.value;
    //         infoCustomer.COD_DOC_ENTIDADE = dados.PROPERTY_326.value;
    //         infoCustomer.NOME_ENTIDADE = dados.PROPERTY_368.value;
    //event listeners
    $(".btnTemVinculo").click(function () {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      if ($(this).val() == "Sim") {
        $(".btnTemVinculo").attr("disabled", "disabled");
        $(this).addClass("btn-success");
        localStorage.setItem("hasEntity", true);
        //
        if (infoCustomer.PROFISSAO.PROPERTY_372 === null) {
          infoCustomer.UF_CRM_1583411966 =
            infoCustomer.PROFISSAO.PROPERTY_324.value;
          infoCustomer.UF_CRM_1591131187 =
            infoCustomer.PROFISSAO.PROPERTY_324.value;
          infoCustomer.UF_CRM_1582823504 =
            infoCustomer.PROFISSAO.PROPERTY_324.value;
        } else {
          infoCustomer.UF_CRM_1583411966 =
            infoCustomer.PROFISSAO.PROPERTY_372.value;
          infoCustomer.UF_CRM_1591131187 =
            infoCustomer.PROFISSAO.PROPERTY_372.value;
          infoCustomer.UF_CRM_1582823504 =
            infoCustomer.PROFISSAO.PROPERTY_372.value;
        }
        //
        localStorage.setItem("proofEntityAttached", false);
        $("#temVinculo").show(500);
      } else {
        $(".btnTemVinculo").attr("disabled", "disabled");
        $(this).addClass("btn-danger");
        localStorage.setItem("hasEntity", false);

        infoCustomer.UF_CRM_1583411966 =
          infoCustomer.PROFISSAO.PROPERTY_324.value;
        infoCustomer.UF_CRM_1591131187 =
          infoCustomer.PROFISSAO.PROPERTY_324.value;
        infoCustomer.UF_CRM_1582823504 =
          infoCustomer.PROFISSAO.PROPERTY_324.value;
        infoCustomer.COD_DOC_ENTIDADE =
          infoCustomer.PROFISSAO.PROPERTY_326.value;
        infoCustomer.NOME_ENTIDADE = infoCustomer.PROFISSAO.PROPERTY_368.value;
        $(".nomeEntidade").text(infoCustomer.NOME_ENTIDADE);

        $("#associarEntidade").show(500);
      }
      localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));
    });

    $(".btnDesfazEscolhas").click(function () {
      localStorage.removeItem("hasEntity");
      localStorage.removeItem("proofEntityAttachment");
      localStorage.removeItem("proofEntityAttached");
      localStorage.removeItem("acceptAssoc");
      window.location.reload();
    });

    function uploadProofEntity() {
      var files = document.getElementById("fileVinculo").files;
      if (files.length > 0) {
        getBase64(files[0]);
        setTimeout(() => {
          if (localStorage.getItem("proofEntityAttachment") === false) {
            alert("Ocorreu um erro, tente anexar novamente");
            localStorage.removeItem("hasEntity");
            localStorage.removeItem("proofEntityAttachment");
            localStorage.removeItem("proofEntityAttached");
            window.location.reload();
          } else {
            localStorage.setItem("proofEntityAttached", true);
            $(".uploadProofEntity").hide();
            $(".uploadProofEntityOK").show();
            $("#btnE6").removeAttr("disabled");
            $("#btnE6").focus();
          }
        }, 500);
      }
    }

    $("#btnDoUploadFilevinculo").click(function () {
      $.confirm({
        title: "Confirmação.",
        theme: "modern",
        content: "Tem certeza?",
        buttons: {
          Sim: function () {
            uploadProofEntity();
          },
          Não: function () {}
        }
      });
    });

    $(".btnContinuaAssocEntidade").click(function () {
      if ($(this).val() == "Sim") {
        $(".btnContinuaAssocEntidade").attr("disabled", "disabled");
        localStorage.setItem("acceptAssoc", true);
        $(this).addClass("btn-success");
        $("#vinculaEntidade").show(500);
      } else {
        $.confirm({
          title: "Alerta!",
          theme: "modern",
          content:
            "Para ter direito a estas condições exclusivas, é necessário que você comprove seu vinculo com uma entidade.",
          type: "red",
          buttons: {
            Fechar: function () {}
          }
        });
      }
    });

    $("#cepEnt").blur(function () {
      if ($(this).val() !== "" && $(this).val().length === 8) {
        var data = new FormData();
        var retorno = null;
        data.append("frmType", "buscaCep");
        data.append("frmCep", $(this).val());
        $.ajax({
          type: "POST",
          enctype: "multipart/form-data",
          url: "api.php",
          data: data,
          async: false,
          processData: false, // impedir que o jQuery tranforma a "data" em querystring
          contentType: false, // desabilitar o cabeçalho "Content-Type"
          cache: false, // desabilitar o "cache"
          dataType: "json",
          success: function (result) {
            retorno = result;
          }
        });

        if (retorno.error === "true") {
          $.alert({
            title: "Alerta!",
            theme: "modern",
            content: "Cep inválido ou não localizado!"
          });
        } else {
          $("#endEnt").val(retorno.logradouro);
          $("#localidadeEnt").val(retorno.localidade);
          $("#bairroEnt").val(retorno.bairro);
          $("#ufEnt").val(retorno.uf);
          $(".btnEnviaDadosVinculo").removeAttr("disabled");
          $("#numEnt").focus();
        }
      }
    });

    function geraFichaAssociacao() {
      $(".loading-text").html(
        "<p>Para que você possa vincular-se a esta entidade de classe, <br>vou te enviar uma ficha de associação. <br>O Documento é em formato digital, onde você vai assinar rapidamente, pelo computador ou celular. <br>A assinatura digital tem o mesmo valor jurídico da assinatura tradicional.</p>"
      );
      $("#loading").show();

      setTimeout(() => {
        var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
        infoCustomer.UF_CRM_1583447214343 = $("#cepEnt").val();
        infoCustomer.UF_CRM_1583453003241 = $("#bairroEnt").val();
        infoCustomer.UF_CRM_1583453318705 = $("#localidadeEnt").val();
        infoCustomer.UF_CRM_1583453300308 = $("#ufEnt").val();
        infoCustomer.UF_CRM_1583451688644 = $("#endEnt").val();
        infoCustomer.UF_CRM_1583451717890 = $("#numEnt").val();

        localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));
      }, 500);

      setTimeout(() => {
        var data = new FormData();
        var retorno = null;
        data.append("frmType", "fichaAssociacao");
        data.append("payload", localStorage.getItem("infoCustomer"));
        data.append("contact_id", localStorage.getItem("contact_id"));
        data.append("lead_id", localStorage.getItem("lead_id"));
        data.append("deal_id", localStorage.getItem("deal_id"));
        // $.ajax({
        //   type: "POST",
        //   enctype: "multipart/form-data",
        //   url: "api.php",
        //   data: data,
        //   async: false,
        //   processData: false, // impedir que o jQuery tranforma a "data" em querystring
        //   contentType: false, // desabilitar o cabeçalho "Content-Type"
        //   cache: false, // desabilitar o "cache"
        //   dataType: "json",
        //   success: function (result) {
        //     retorno = result;
        //   }
        // });

        fetch("api.php", {
          method: "POST",
          body: data
        })
          .then(function (response) {
            response.json().then(function (result) {
              retorno = result;
            });
          })
          .catch(function (err) {
            console.error("Failed retrieving information", err);
          });

        if (retorno.error === "true") {
          $.alert({
            title: "Alerta!",
            theme: "modern",
            content: "Erro!"
          });
          $("#loading").hide();
        } else {
          //todo
          localStorage.setItem("id_ficha", retorno.id_ficha);
          setTimeout(() => {
            getFichaAssociacao(retorno.id_ficha);
          }, 15000);
          // localStorage.setItem("key_doc", retorno.key_doc);
          // localStorage.setItem("currentStep", "8");
          // $("#loading-corpo").hide();
          // setTimeout(() => {
          //   window.location.href = "8_ficha_dependentes.php";
          // }, 500);
        }
      }, 1500);
    }

    function getFichaAssociacao(id_ficha) {
      var data = new FormData();
      data.append("frmType", "getFichaAssociacao");
      data.append("ficha_id", id_ficha);
      data.append("payload", localStorage.getItem("infoCustomer"));
      // $.ajax({
      //   type: "POST",
      //   enctype: "multipart/form-data",
      //   url: "api.php",
      //   data: data,
      //   async: true,
      //   processData: false, // impedir que o jQuery tranforma a "data" em querystring
      //   contentType: false, // desabilitar o cabeçalho "Content-Type"
      //   cache: false, // desabilitar o "cache"
      //   dataType: "json",
      //   success: function (result) {
      //     if (result.error === "true") {
      //       setTimeout(() => {
      //         getFichaAssociacao(id_ficha);
      //       }, 15000);
      //     } else {
      //       localStorage.setItem("id_ficha", result.id_ficha);
      //       localStorage.setItem("ficha_download", "true");
      //       localStorage.setItem("key_doc", result.key_doc);
      //       localStorage.setItem("currentStep", "8");
      //       $(".loading-text").html(
      //         "<p>Enviamos um e-mail com sua ficha associativa.<br> Por favor, conclua a assinatura digital deste documento para que possamos continuar.</p>"
      //       );
      //       setTimeout(() => {}, 4000);
      //       $("#loading").hide();
      //       setTimeout(() => {
      //         window.location.href = "8_ficha_dependentes.php";
      //       }, 500);
      //     }
      //   }
      // });
      fetch("api.php", {
        method: "POST",
        body: data
      })
        .then(function (response) {
          response.json().then(function (result) {
            if (result.error === "true") {
              setTimeout(() => {
                getFichaAssociacao(id_ficha);
              }, 10000);
            } else {
              localStorage.setItem("id_ficha", result.id_ficha);
              localStorage.setItem("ficha_download", "true");
              localStorage.setItem("key_doc", result.key_doc);
              localStorage.setItem("currentStep", "8");
              $(".loading-text").html(
                "<p>Enviamos um e-mail com sua ficha associativa.<br> Por favor, conclua a assinatura digital deste documento para que possamos continuar.</p>"
              );
              setTimeout(() => {}, 4000);
              $("#loading").hide();
              setTimeout(() => {
                window.location.href = "8_ficha_dependentes.php";
              }, 500);
            }
          });
        })
        .catch(function (err) {
          console.error("Failed retrieving information", err);
        });
    }

    $(".btnEnviaDadosVinculo").click(function () {
      var valida = true;

      if ($("#cepEnt").val() === "" || $("#cepEnt").val().length !== 8)
        valida = false;
      if ($("#endEnt").val() === "") valida = false;
      if ($("#numEnt").val() === "" || $("#numEnt").val() === 0) valida = false;

      // $("#loading").hide();
      if (valida) {
        geraFichaAssociacao();
      } else {
        $.alert({
          title: "Alerta!",
          theme: "modern",
          content: "Preencha os campos corretamente"
        });
      }
    });
  }
  //fim etapa 6

  //etapa 8
  if (localStorage.getItem("currentPage") === "8") {
    var qtDep = parseInt(localStorage.getItem("qtDep"));
    if (qtDep == 0) {
      localStorage.setItem("currentStep", "9");
      window.location.href = "9_fichas_anexos.php";
    } else {
      if (localStorage.getItem("fichaDep") === null) {
        localStorage.setItem("fichaDep", 1);
      }
    }

    function carregaPlano() {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      var plano = infoCustomer.PLANO_ESCOLHIDO;

      $(".nomeTit").text(infoCustomer.NAME);
      $(".nomePlan").text(plano.NAME);
      $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      $(".qtDep").text(localStorage.getItem("qtDep"));
      $(".picture-plan").attr("src", plano.imgSrc);

      // var imagem =
      //   infoCustomer.UF_CRM_1587331426 === "294"
      //     ? "assets/img/logo-unimed-natal.png"
      //     : "assets/img/logo-unimed-recife.png";
      // $(".nomeTit").text(infoCustomer.NAME);
      // $(".nomePlan").text(infoCustomer.NOME_PRODUTO);
      // $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      // $(".qtDep").text(localStorage.getItem("qtDep"));
      // $(".picture-plan").attr("src", plano.imgSrc);

      /**
       * inicializa form com campos ja coletados
       */
      var depAtual = parseInt(localStorage.getItem("fichaDep"));

      if (depAtual == 2) {
        $("#estCivilDep").html(
          '<option value="">não selecionada</option>\
            <option value="400">Solteiro(a)</option>\
            <option value="402">Casado(a)</option>\
            <option value="404">Separado(a)</option>\
            <option value="406">Viúvo(a)</option>\
            <option value="408">Divorciado(a)</option>\
            <option value="410">Outros</option>'
        );
        $("#sexoDep").html(
          '<option value="">não selecionada</option>\
              <option value="412">Masculino</option>\
              <option value="414">Feminino</option>'
        );
        $("#grauDep").html(
          '<option value="">não selecionada</option>\
              <option value="416">Cônjuge</option>\
              <option value="418">Filho/Filha</option>\
              <option value="420">Outros</option>'
        );
      } else if (depAtual == 3) {
        $("#estCivilDep").html(
          '<option value="">não selecionada</option>\
              <option value="422">Solteiro(a)</option>\
              <option value="424">Casado(a)</option>\
              <option value="426">Separado(a)</option>\
              <option value="428">Viúvo(a)</option>\
              <option value="430">Divorciado(a)</option>\
              <option value="432">Outros</option>'
        );
        $("#sexoDep").html(
          '<option value="">não selecionada</option>\
              <option value="434">Masculino</option>\
              <option value="436">Feminino</option>'
        );
        $("#grauDep").html(
          '<option value="">não selecionada</option>\
              <option value="438">Cônjuge</option>\
              <option value="440">Filho/Filha</option>\
              <option value="442">Outros</option>'
        );
      } else if (depAtual == 4) {
        $("#estCivilDep").html(
          '<option value="">não selecionada</option>\
              <option value="444">Solteiro(a)</option>\
              <option value="446">Casado(a)</option>\
              <option value="448">Separado(a)</option>\
              <option value="450">Viúvo(a)</option>\
              <option value="452">Divorciado(a)</option>\
              <option value="454">Outros</option>'
        );
        $("#sexoDep").html(
          '<option value="">não selecionada</option>\
              <option value="456">Masculino</option>\
              <option value="458">Feminino</option>'
        );
        $("#grauDep").html(
          '<option value="">não selecionada</option>\
              <option value="460">Cônjuge</option>\
              <option value="462">Filho/Filha</option>\
              <option value="464">Outros</option>'
        );
      } else if (depAtual == 5) {
        $("#estCivilDep").html(
          '<option value="">não selecionada</option>\
              <option value="466">Solteiro(a)</option>\
              <option value="468">Casado(a)</option>\
              <option value="470">Separado(a)</option>\
              <option value="472">Viúvo(a)</option>\
              <option value="474">Divorciado(a)</option>\
              <option value="476">Outros</option>'
        );
        $("#sexoDep").html(
          '<option value="">não selecionada</option>\
              <option value="478">Masculino</option>\
              <option value="480">Feminino</option>'
        );
        $("#grauDep").html(
          '<option value="">não selecionada</option>\
              <option value="482">Cônjuge</option>\
              <option value="484">Filho/Filha</option>\
              <option value="486">Outros</option>'
        );
      }

      var dadosDep = JSON.parse(localStorage.getItem("infoCustomer"));
      dadosDep = dadosDep.dependentes;

      $("input#dataNascDep").val(dadosDep[depAtual].data_nasc);
      $("input#nomeDep").val(dadosDep[depAtual].nome);
      $(".depAtual").text(depAtual);
      var _dataDep = dadosDep[depAtual].data_nasc.split("-");
      if (parseInt(_dataDep[0]) >= 2010)
        $("#nascidoVivoDep").removeAttr("readonly");

      /**
       * fim inicialização
       */

      setTimeout(() => {
        $("#loading").hide();
      }, 500);
    }

    carregaPlano();

    //events
    $("#frmFichaDep").submit(function (e) {
      e.preventDefault();
      $("#loading").show();
      var depAtual = parseInt(localStorage.getItem("fichaDep"));
      var qtDep = parseInt(localStorage.getItem("qtDep"));
      var nome = $.trim($("#nomeDep").val());
      var data_nascimento = $.trim($("#dataNascDep").val());
      var cpfDep = $.trim($("#cpfDep").val());
      var rgDep = $.trim($("#rgDep").val());
      var sexoDep = $.trim($("#sexoDep").val());
      var estCivilDep = $.trim($("#estCivilDep").val());
      var grauDep = $.trim($("#grauDep").val());
      var munNascDep = $.trim($("#munNascDep").val());
      var nomeMaeDep = $.trim($("#nomeMaeDep").val());
      var cardSusDep = $.trim($("#cardSusDep").val());
      var nascidoVivoDep = $.trim($("#nascidoVivoDep").val());

      var continua = true;
      var msgErro = "Verifique os seguintes campos:\n";
      if (isEmpty(nome) || isBlank(nome)) {
        continua = false;
        msgErro += "Nome.";
      }
      if (
        isEmpty(data_nascimento) ||
        isBlank(data_nascimento) ||
        data_nascimento.length !== 10
      )
        continua = false;
      if (isEmpty(cpfDep) || isBlank(cpfDep) || validaCpf(cpfDep) === false) {
        continua = false;
        msgErro += "\nCPF.";
      }
      if (isEmpty(rgDep) || isBlank(rgDep)) {
        continua = false;
        msgErro += "\nRG.";
      }
      if (isEmpty(munNascDep) || isBlank(munNascDep)) {
        continua = false;
        msgErro += "\nMunicipio Nascimento.";
      }
      if (isEmpty(nomeMaeDep) || isBlank(nomeMaeDep)) {
        continua = false;
        msgErro += "\nNome Mãe.";
      }
      if (isEmpty(cardSusDep) || isBlank(cardSusDep)) {
        continua = false;
        msgErro += "\nCartão SUS.";
      }

      if (!continua) {
        $("#loading").hide();
        $.alert({
          title: "Alerta!",
          theme: "modern",
          content: msgErro
        });
      } else {
        var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
        infoCustomer.dependentes[depAtual].NAME = nome;
        infoCustomer.dependentes[depAtual].CPF = cpfDep;
        infoCustomer.dependentes[depAtual].RG = rgDep;
        infoCustomer.dependentes[depAtual].SEXO = sexoDep;
        infoCustomer.dependentes[depAtual].ESTCIVIL = estCivilDep;
        infoCustomer.dependentes[depAtual].GRAU = grauDep;
        infoCustomer.dependentes[depAtual].MUNNASC = munNascDep;
        infoCustomer.dependentes[depAtual].NOMMAE = nomeMaeDep;
        infoCustomer.dependentes[depAtual].CARDSUS = cardSusDep;
        infoCustomer.dependentes[depAtual].NASCVIVO = nascidoVivoDep;
        localStorage.setItem("infoCustomer", JSON.stringify(infoCustomer));

        if (qtDep > depAtual) {
          depAtual++;
          localStorage.setItem("fichaDep", depAtual);
          window.location.href = "8_ficha_dependentes.php";
        } else {
          localStorage.setItem("currentStep", "9");
          window.location.href = "9_fichas_anexos.php";
        }
      }
    });
  }
  //fim etapa 8

  //etapa 9
  if (localStorage.getItem("currentPage") === "9") {
    //$("input").removeAttr("required");
    //$("select").removeAttr("required");
    var qtDep = parseInt(localStorage.getItem("qtDep"));
    if (localStorage.getItem("dataDep") === null && qtDep > 0) {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      var data = new FormData();
      var retorno = null;
      data.append("frmType", "gravaDadosDep");
      data.append("payload", JSON.stringify(infoCustomer.dependentes));
      data.append("qtDep", localStorage.getItem("qtDep"));
      data.append("deal_id", localStorage.getItem("deal_id"));
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "api.php",
        data: data,
        async: false,
        processData: false, // impedir que o jQuery tranforma a "data" em querystring
        contentType: false, // desabilitar o cabeçalho "Content-Type"
        cache: false, // desabilitar o "cache"
        dataType: "json",
        success: function (result) {
          if (result.error === "true") {
            console.log("Error: failed to persist data.");
          } else {
            localStorage.setItem("dataDep", "OK");
          }
        }
      });
    } else {
      var data = new FormData();
      data.append("frmType", "avancaParaDocumentacao");
      data.append("deal_id", localStorage.getItem("deal_id"));
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "api.php",
        data: data,
        async: false,
        processData: false, // impedir que o jQuery tranforma a "data" em querystring
        contentType: false, // desabilitar o cabeçalho "Content-Type"
        cache: false, // desabilitar o "cache"
        dataType: "json",
        success: function (result) {
          //nothing
        }
      });
    }

    function carregaPlano() {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      var plano = infoCustomer.PLANO_ESCOLHIDO;

      $(".nomeTit").text(infoCustomer.NAME);
      $(".nomePlan").text(plano.NAME);
      $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      $(".qtDep").text(localStorage.getItem("qtDep"));
      $(".picture-plan").attr("src", plano.imgSrc);

      // var imagem =
      //   infoCustomer.UF_CRM_1587331426 === "294"
      //     ? "assets/img/logo-unimed-natal.png"
      //     : "assets/img/logo-unimed-recife.png";
      // $(".nomeTit").text(infoCustomer.NAME);
      // $(".nomePlan").text(infoCustomer.NOME_PRODUTO);
      // $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      // $(".qtDep").text(localStorage.getItem("qtDep"));
      // $(".picture-plan").attr("src", plano.imgSrc);

      //mudalabel acordeao
      // if (infoCustomer.dependentes[1] !== null) {
      //   $(".acdDep_1").text(
      //     "Documentação Dependente 1 - " + infoCustomer.dependentes[1].NAME
      //   );
      // }

      //montagem upload dependentes
      for (var q = 1; q <= qtDep; q++) {
        var htmltoAdd = montaFileUploadDeps(q);
        $("#accordion").append(htmltoAdd);
      }
      /**
       * fim inicialização
       */

      setTimeout(() => {
        $("#loading").hide();
      }, 500);
    }

    carregaPlano();

    //eventos
    $("#frmAnexos").submit(function (e) {
      $("#loading").show();
      $(".loading-text").text("Fazendo upload, aguarde...");
      setTimeout(() => {}, 1000);
      e.preventDefault();
      var data = new FormData($("#frmAnexos")[0]);
      data.append("frmType", "uploadAnexos");
      data.append("deal_id", localStorage.getItem("deal_id"));
      data.append("qtDep", localStorage.getItem("qtDep"));
      $.ajax({
        xhr: function () {
          var xhr = new window.XMLHttpRequest();

          // Upload progress
          xhr.upload.addEventListener(
            "progress",
            function (evt) {
              if (evt.lengthComputable) {
                var percentComplete = (evt.loaded / evt.total) * 100;
                //Do something with upload progress
                console.log(percentComplete);
                $(".loading-text").text(
                  "Fazendo upload, aguarde... " +
                    percentComplete.toFixed(2) +
                    "%"
                );
              }
            },
            false
          );

          return xhr;
        },
        type: "POST",
        enctype: "multipart/form-data",
        url: "api.php",
        data: data,
        async: true,
        processData: false, // impedir que o jQuery tranforma a "data" em querystring
        contentType: false, // desabilitar o cabeçalho "Content-Type"
        cache: false, // desabilitar o "cache"
        dataType: "json",
        success: function (result) {
          $("#loading").hide();
          setTimeout(() => {}, 500);
          if (result.error === "true") {
            alert("Erro, tente novamente");
            window.location.reload();
          } else {
            localStorage.setItem("currentStep", 11);
            window.location.href = "11_ds.php";
            console.log(result.debug);
          }
        }
      });
      // localStorage.setItem("currentStep", 11);
      // window.location.href = "11_ds.php";
    });

    //funções
    $('input[name^="radioDocTit"]').on("change", function (e) {
      var escolha = $(this).val();
      if (escolha === "cnh") {
        $('.docsTit input[type="file"]').attr("disabled", "disabled");
        $("#cnhTit").removeAttr("disabled");
        $("#comprovanteTit").removeAttr("disabled");
      } else if (escolha === "rgcom") {
        $('.docsTit input[type="file"]').attr("disabled", "disabled");
        $("#comprovanteTit").removeAttr("disabled");
        $("#rgfTit").removeAttr("disabled");
        $("#rgvTit").removeAttr("disabled");
      } else {
        $('.docsTit input[type="file"]').attr("disabled", "disabled");
        $("#comprovanteTit").removeAttr("disabled");
        $("#rgfTit").removeAttr("disabled");
        $("#rgvTit").removeAttr("disabled");
        $("#cpffTit").removeAttr("disabled");
        $("#cpfvTit").removeAttr("disabled");
      }
    });
  }
  //fim etapa 9

  //etapa 11
  if (localStorage.getItem("currentPage") === "11") {
    var ds = "";

    function carregaPlano() {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      var plano = infoCustomer.PLANO_ESCOLHIDO;
      var ds_operadoras = {
        "6410": "ds",
        "6412": "ds2",
        "7058": "ds3"
      };
      ds = ds_operadoras[plano.operadoraID];
      $(".nomeTit").text(infoCustomer.NAME);
      $(".nomePlan").text(plano.NAME);
      $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      $(".qtDep").text(localStorage.getItem("qtDep"));
      $(".picture-plan").attr("src", plano.imgSrc);

      var paramsDS = new Object();
      paramsDS.nome = infoCustomer.NAME;
      paramsDS.email = infoCustomer.EMAIL;
      paramsDS.telefone = infoCustomer.PHONE;
      paramsDS.qtdep = localStorage.getItem("qtDep");

      var paramsDSParsed = JSON.stringify(paramsDS);

      var url_ds =
        "ds_hom/ds_oauth.php?form=" +
        ds +
        "&deal_id=" +
        localStorage.getItem("deal_id") +
        "&embed&params=" +
        paramsDSParsed;
      $("#dsFrame").attr("src", url_ds);

      //mudalabel acordeao
      // if (infoCustomer.dependentes[1] !== null) {
      //   $(".acdDep_1").text(
      //     "Documentação Dependente 1 - " + infoCustomer.dependentes[1].NAME
      //   );
      // }

      /**
       * fim inicialização
       */

      setTimeout(() => {
        $("#loading").hide();
      }, 1000);
    }

    carregaPlano();

    //eventos
    $("#btnE11").click(function () {
      localStorage.setItem("currentStep", 13);
      window.location.href = "13_rascunho.php";
    });
  }
  //fim etapa 11

  //etapa 13
  if (localStorage.getItem("currentPage") === "13") {
    function carregaPlano() {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      var plano = infoCustomer.PLANO_ESCOLHIDO;

      $(".nomeTit").text(infoCustomer.NAME);
      $(".nomePlan").text(plano.NAME);
      $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      $(".qtDep").text(localStorage.getItem("qtDep"));
      $(".picture-plan").attr("src", plano.imgSrc);

      // if (localStorage.getItem("rascunho_id") !== null) {
      //   $("#btnGerarRascunho").text("Ver");
      //   $("#btnGerarRascunho").removeAttr("disabled");
      // }
      /**
       * fim inicialização
       */

      var data = new FormData();
      data.append("frmType", "avancaParaRascunho");
      data.append("deal_id", localStorage.getItem("deal_id"));
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "api.php",
        data: data,
        async: false,
        processData: false, // impedir que o jQuery tranforma a "data" em querystring
        contentType: false, // desabilitar o cabeçalho "Content-Type"
        cache: false, // desabilitar o "cache"
        dataType: "json",
        success: function (result) {
          setTimeout(() => {
            $("#loading").hide();
          }, 500);
        }
      });
    }

    carregaPlano();

    //eventos
    $("#btnE13").click(function () {
      $.confirm({
        title: "Tem certeza?",
        theme: "modern",
        content: "Você confirma a aprovação da proposta?",
        buttons: {
          Sim: function () {
            localStorage.setItem("currentStep", 14);
            setTimeout(() => {
              window.location.href = "14_gerar_proposta.php";
            }, 500);
          },
          Não: function () {}
        }
      });
    });

    $("#btnGerarRascunho").click(function () {
      $(".carrega-doc").show();
      $(this).attr("disabled", "disabled");

      setTimeout(() => {
        if (localStorage.getItem("rascunho_id") === null) {
          var data = new FormData();
          var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
          data.append("frmType", "geraRascunho");
          data.append("deal_id", localStorage.getItem("deal_id"));
          data.append(
            "template",
            infoCustomer.PLANO_ESCOLHIDO.templates_docs.rascunho
          );
          // $.ajax({
          //   type: "POST",
          //   enctype: "multipart/form-data",
          //   url: "api.php",
          //   data: data,
          //   async: false,
          //   processData: false, // impedir que o jQuery tranforma a "data" em querystring
          //   contentType: false, // desabilitar o cabeçalho "Content-Type"
          //   cache: false, // desabilitar o "cache"
          //   dataType: "json",
          //   success: function (result) {
          //     if (result.error === "true") {
          //       alert("Erro.");
          //       $(".carrega-doc").hide();
          //     } else {
          //       localStorage.setItem("rascunho_id", result.rascunho_id);
          //       console.log(result.retorno);
          //       setTimeout(() => {
          //         getRascunho(result.rascunho_id);
          //       }, 5000);
          //     }
          //   }
          // });
          fetch("api.php", {
            method: "POST",
            body: data
          })
            .then(function (response) {
              response.json().then(function (result) {
                if (result.error === "true") {
                  alert("Erro.");
                  $(".carrega-doc").hide();
                } else {
                  localStorage.setItem("rascunho_id", result.rascunho_id);
                  console.log(result.retorno);
                  setTimeout(() => {
                    getRascunho(result.rascunho_id);
                  }, 5000);
                }
              });
            })
            .catch(function (err) {
              console.error("Failed retrieving information", err);
            });
        } else {
          if (localStorage.getItem("rascunho_download") === null) {
            getRascunho(localStorage.getItem("rascunho_id"));
          } else {
            $(".carrega-doc").hide();
            $("#accordion").hide();
            $("#btnE13").removeAttr("disabled");
            $("#rascunhoFrame").attr(
              "src",
              "https://drive.google.com/viewerng/viewer?embedded=true&url=http://gpsoft.com.br/waystore_dev_valida/proposta_rascunho_" +
                localStorage.getItem("rascunho_id") +
                ".pdf"
            );
            $("#rascunhoFrame").show();
          }
        }
      }, 1500);
    });

    function getRascunho(rascunho_id) {
      var data = new FormData();
      data.append("frmType", "baixaRascunho");
      data.append("rascunho_id", rascunho_id);

      fetch("api.php", {
        method: "POST",
        body: data
      })
        .then(function (response) {
          response.json().then(function (result) {
            if (result.error === "true") {
              setTimeout(() => {
                getRascunho(rascunho_id);
              }, 5000);
            } else {
              localStorage.setItem("rascunho_id", result.rascunho_id);
              localStorage.setItem("rascunho_download", "true");
              $(".carrega-doc").hide();
              $("#accordion").hide();
              $("#btnE13").removeAttr("disabled");
              $("#rascunhoFrame").attr(
                "src",
                "https://drive.google.com/viewerng/viewer?embedded=true&url=http://gpsoft.com.br/waystore_dev_valida/proposta_rascunho_" +
                  result.rascunho_id +
                  ".pdf"
              );
              $("#rascunhoFrame").show();
            }
          });
        })
        .catch(function (err) {
          console.error("Failed retrieving information", err);
        });

      // $.ajax({
      //   type: "POST",
      //   enctype: "multipart/form-data",
      //   url: "api.php",
      //   data: data,
      //   async: false,
      //   processData: false, // impedir que o jQuery tranforma a "data" em querystring
      //   contentType: false, // desabilitar o cabeçalho "Content-Type"
      //   cache: false, // desabilitar o "cache"
      //   dataType: "json",
      //   success: function (result) {
      //     if (result.error === "true") {
      //       setTimeout(() => {
      //         getRascunho(rascunho_id);
      //       }, 5000);
      //     } else {
      //       localStorage.setItem("rascunho_id", result.rascunho_id);
      //       localStorage.setItem("rascunho_download", "true");
      //       $(".carrega-doc").hide();
      //       $("#accordion").hide();
      //       $("#btnE13").removeAttr("disabled");
      //       $("#rascunhoFrame").attr(
      //         "src",
      //         "http://" +
      //           window.location.host +
      //           "/gpsoft_waystore/proposta_rascunho_" +
      //           result.rascunho_id +
      //           ".pdf"
      //       );
      //       $("#rascunhoFrame").show();
      //     }
      //   }
      // });
    }
  }
  //fim etapa 13

  //etapa 14
  if (localStorage.getItem("currentPage") === "14") {
    function carregaPlano() {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      var plano = infoCustomer.PLANO_ESCOLHIDO;

      ds = plano.cidade === "natal" ? "ds" : "ds2";
      $(".nomeTit").text(infoCustomer.NAME);
      $(".nomePlan").text(plano.NAME);
      $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      $(".qtDep").text(localStorage.getItem("qtDep"));
      $(".picture-plan").attr("src", plano.imgSrc);

      // if (localStorage.getItem("rascunho_id") !== null) {
      //   $("#btnGerarRascunho").text("Ver");
      //   $("#btnGerarRascunho").removeAttr("disabled");
      // }
      /**
       * fim inicialização
       */

      var data = new FormData();
      data.append("frmType", "avancaParaProposta");
      data.append("deal_id", localStorage.getItem("deal_id"));
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "api.php",
        data: data,
        async: false,
        processData: false, // impedir que o jQuery tranforma a "data" em querystring
        contentType: false, // desabilitar o cabeçalho "Content-Type"
        cache: false, // desabilitar o "cache"
        dataType: "json",
        success: function (result) {}
      });

      setTimeout(() => {
        $("#loading").hide();
        setTimeout(() => {
          if (
            localStorage.getItem("rascunho_id") !== null &&
            localStorage.getItem("rascunho_download") === "true" &&
            localStorage.getItem("proposta_id") === null
          ) {
            geraProposta(localStorage.getItem("deal_id"));
          } else {
            if (
              localStorage.getItem("proposta_id") !== null &&
              localStorage.getItem("proposta_download") === null
            ) {
              getProposta(localStorage.getItem("proposta_id"));
            } else {
              $("#btnE14").removeAttr("disabled");
              $("#btnE14").focus();
              $(".carrega-doc").hide();
              $("#accordion").hide();
              $("#btnE13").removeAttr("disabled");
              $("#rascunhoFrame").attr(
                "src",
                "https://drive.google.com/viewerng/viewer?embedded=true&url=http://gpsoft.com.br/waystore_dev_valida/proposta_final_" +
                  localStorage.getItem("proposta_id") +
                  ".pdf"
              );
              $("#rascunhoFrame").show();
              $(".msgGeraProp").text("Parabéns, sua proposta foi gerada.");
            }
          }
        }, 3000);
      }, 2000);
    }

    carregaPlano();

    //eventos
    $("#btnE14").click(function () {
      localStorage.setItem("currentStep", "16");
      window.location.href = "16_fim.php";
    });

    function geraProposta(deal_id) {
      var data = new FormData();
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      data.append("frmType", "geraProposta");
      data.append("deal_id", deal_id);
      data.append(
        "template",
        infoCustomer.PLANO_ESCOLHIDO.templates_docs.proposta
      );
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "api.php",
        data: data,
        async: false,
        processData: false, // impedir que o jQuery tranforma a "data" em querystring
        contentType: false, // desabilitar o cabeçalho "Content-Type"
        cache: false, // desabilitar o "cache"
        dataType: "json",
        success: function (result) {
          if (result.error === "true") {
            alert("Erro.");
            $(".carrega-doc").hide();
          } else {
            localStorage.setItem("proposta_id", result.proposta_id);
            console.log(result.retorno);
            setTimeout(() => {
              getProposta(result.proposta_id);
            }, 20000);
          }
        }
      });
    }

    function getProposta(proposta_id) {
      var data = new FormData();
      data.append("frmType", "baixaProposta");
      data.append("proposta_id", proposta_id);
      data.append("payload", localStorage.getItem("infoCustomer"));
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "api.php",
        data: data,
        async: true,
        processData: false, // impedir que o jQuery tranforma a "data" em querystring
        contentType: false, // desabilitar o cabeçalho "Content-Type"
        cache: false, // desabilitar o "cache"
        dataType: "json",
        success: function (result) {
          if (result.error === "true") {
            setTimeout(() => {
              getProposta(proposta_id);
            }, 10000);
          } else {
            localStorage.setItem("proposta_id", result.proposta_id);
            localStorage.setItem("proposta_download", "true");
            $("#btnE14").removeAttr("disabled");
            $("#btnE14").focus();
            $(".carrega-doc").hide();
            $("#accordion").hide();
            $("#btnE13").removeAttr("disabled");
            $("#rascunhoFrame").attr(
              "src",
              "https://drive.google.com/viewerng/viewer?embedded=true&url=http://gpsoft.com.br/waystore_dev_valida/proposta_final_" +
                proposta_id +
                ".pdf"
            );
            $("#rascunhoFrame").show();
            $(".msgGeraProp").text("Parabéns, sua proposta foi gerada.");
          }
        }
      });
    }
  }
  //fim etapa 14

  if (localStorage.getItem("currentPage") === "16") {
    function carregaPlano() {
      var infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
      var plano = infoCustomer.PLANO_ESCOLHIDO;

      ds = plano.cidade === "natal" ? "ds" : "ds2";
      $(".nomeTit").text(infoCustomer.NAME);
      $(".nomePlan").text(plano.NAME);
      $(".subTotal").text(parseFloat(infoCustomer.SUBTOTAL).toFixed(2));
      $(".qtDep").text(localStorage.getItem("qtDep"));
      $(".picture-plan").attr("src", plano.imgSrc);

      setTimeout(() => {
        localStorage.clear();
      }, 2000);
    }

    carregaPlano();
  }
});
