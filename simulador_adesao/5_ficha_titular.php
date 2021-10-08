
<?php
	$utm_campaign = (isset($_GET['utm_campaign'])) ? $_GET['utm_campaign'] : "";
	$utm_source = (isset($_GET['utm_source'])) ? $_GET['utm_source'] : "";
	$utm_medium = (isset($_GET['utm_medium'])) ? $_GET['utm_medium'] : "";
	$utm_content = (isset($_GET['utm_content'])) ? $_GET['utm_content'] : "";
	$utm_term = (isset($_GET['utm_term'])) ? $_GET['utm_term'] : "";

  include "session_valide.php";
?>


<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Lore IT - V1.2.2</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">

    <link rel="stylesheet" href="assets_new/css/slick.css">
    <link rel="stylesheet" href="assets_new/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets_new/css/default.css">
    <link rel="stylesheet" href="assets_new/css/style.css">
    <link rel="stylesheet" href="assets_new/css/LineIcons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <script src="assets_new/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets_new/js/slick.min.js"></script>
    <script src="assets_new/js/jquery.counterup.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="assets_new/js/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.2.2/web-animations.min.js"></script>
    <script src="https://vincentgarreau.com/particles.js/assets/_build/js/lib/particles.js"></script>
    <script src="assets_new/js/main.js"></script>
    <script src="assets_new/js/bootstrap.min.js"></script>

  <!-- Google Fonts -->
  <link href="css/font-google.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/wizard.css" rel="stylesheet">
  <link rel="stylesheet" href="css/jquery-confirm.min.css">

  <link href='css/font-awesome.css' rel='stylesheet'>
  <script type='text/javascript' src='js/jquery.min.js'></script>
  <script src="js/jquery-1.11.1.min.js"></script>


<!-- CSS E JS CUSTOMIZADOS -->
<script type='text/javascript' src='js/way.js?v=1.21'></script>
<link href='css/way.css' rel='stylesheet'>
<link href='css/privacy.css' rel='stylesheet'>
<!-- CSS E JS CUSTOMIZADOS -->


<!-- ESCONDER DIV NA VERSÃO MOBILE -->
<style>
 @media only screen and (max-width: 980px){
      .divTableCell3 { display: none; }
  }

  .hide {
    left: -9999px !important;
    position: absolute !important;
    visibility: hidden;
    z-index: -500;
    top: -9999px;
    -webkit-transition: all 1.5s ease;
    -moz-transition: all 1.5s ease;
    -o-transition: all 1.5s ease;
    transition: all 1.5s ease;
}

</style>
<!-- ESCONDER DIV NA VERSÃO MOBILE -->

<!-- MASCARA DO CEP -->
<script language="JavaScript">
  function mascara(t, mask){
  var i = t.value.length;
  var saida = mask.substring(1,0);
  var texto = mask.substring(i)
  if (texto.substring(0,1) != saida){
  t.value += texto.substring(0,1);
  }
  }
</script>
<!-- MASCARA DO CEP -->

<!-- MASCARA DO CELULAR -->
<script language="JavaScript">
function mask(o, f) {
  setTimeout(function() {
    var v = mphone(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function mphone(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}
</script>
<!-- MASCARA DO CELULAR -->
<!-- AUTOCOMPLETE -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!-- VALIDAR E-MAIL -->
<script language="Javascript">
  function validacaoEmail(field) {
  usuario = field.value.substring(0, field.value.indexOf("@"));
  dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);

  if ((usuario.length >=1) &&
      (dominio.length >=3) &&
      (usuario.search("@")==-1) &&
      (dominio.search("@")==-1) &&
      (usuario.search(" ")==-1) &&
      (dominio.search(" ")==-1) &&
      (dominio.search(".")!=-1) &&
      (dominio.indexOf(".") >=1)&&
      (dominio.lastIndexOf(".") < dominio.length - 1)) {
  document.getElementById("msgemail").innerHTML="E-mail válido";
  alert("E-mail valido");
  }
  else{
  document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
  alert("E-mail invalido");
  }
  }
  </script>
<!-- VALIDAR E-MAIL -->

<!-- ESCONDER DIV E HABILITAR -->
<script>
        //divs, mostrar ou nao

        function mostrar_entidade() {
              if(document.getElementById('entidade').style.display=='none') {
                document.getElementById('entidade').style.display='block';
              }
          }


          function esconder_apbl() {
                if(document.getElementById('apbl').style.display=='block') {
                  document.getElementById('apbl').style.display='none';
                }
            }


            function mostrar_apbl() {
              if(document.getElementById('apbl').style.display=='none') {
                document.getElementById('apbl').style.display='block';
              }
          }

          function mostrar_vinculo() {
            if(document.getElementById('vinculo').style.display=='none') {
              document.getElementById('vinculo').style.display='block';
            }
        }

        function mostrar_email() {
            if(document.getElementById('email').style.display=='none') {
              document.getElementById('email').style.display='block';
            }
        }

</script>

<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->

</head>

<header class="header-area">

    <?php include("menu_topo.php"); ?>

</header>

<body>

<!-- Google Tag Manager (noscript) -->

<!-- End Google Tag Manager (noscript) -->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <!-- modal preenchimento dados iniciais e carregamento-->
  <div class="modal" id="loading" style="display:block" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content" style="border: none;">
            <div class="modal-header" style="background: #fff;border-radius: 30px;border: 2px;border-style: solid;border-color: rgba(0,123,255,.25);">
            <center>
            <h4 class="modal-title">
              <strong>Processando informações</strong>
              <br>
              <img width="100" src="assets/img/carregando1.gif" alt="Carregando..." />
             </h4>
            </center>
            </div>
            <div class="modal-body">
              <br>
            <P class="loading-text">Aguarde enquanto carregamos os dados.</P>
            </div>
        </div>
      </div>
    </div>


    <!-- Conteiner da área geral central da página-->
    <div class="div-progressbar">
          <ul id="progressbar">
              <!-- <li class="done" id="account"></li> -->
              <li class="done" id="sigin"></li>
              <li class="done" id="search"></li>
              <li class="done" id="listplans"></li>
              <li class="done" id="dependentes"></li>
              <li class="active" id="personal"></li>
              <li class="done" id="propostas"></li>
              <li class="done" id="finalizado"></li>
              <!--<li class="done" id="user"></li> -->
            </ul>
    </div>
    <div class="container-full">
        <div class="area-principal">
              <div class="bar-left">
                  <div class="card mt-3 mb-3" style="padding: 20px">

                        <p class="texto1-left">Preencha todos os campos ao lado com os dados do Titular do plano.</p>

                       <form id="msform">

                          <p class="texto1"><strong>Resumo dos Planos Escolhido:</strong></p>
                          <fieldset>

                          <div class="form-card" id="planos2">
                                  <p class="texto6"><img class="picture-plan" src=""></p>
                                  <p class="texto0-left"><span class="nomePlan"></span><br>ANS: <span class="ansPlan"></p>
                                  <br>
                                  <p class="texto0"><strong>SUBTOTAL</strong></p>
                                  <p class="texto0-left-sub"><strong>R$ <span class="somaPlanos"></span></strong></p>
                                  <br>
                                  <p class="texto1"></p>
                                  <p class="texto1-left-dep"><strong><span class="qtDept">0</span> </strong>dependente(s).</p>
                                  <p class="texto1"></p>
                                </div>
                          <!--<input type="button" id="btnE5" name="next" class="next action-button" value="Continuar" disabled>-->
                          <!--<input type="button" name="previous" class="previous action-button-previous" value="Anterior" onClick="parent.location='4_incluir_dependentes.php'">-->

                          </fieldset>
                          <input type="submit" style="display:none" name="next" class="btn action-button" value="Continuar">
                      </form>

                  </div>
              </div>
              <div class="bar-central">
                  <div class="container-central" style="margin-top:0;margin-left:0; width:100%">

                                <table border="0">
                                    <tr>
                                        <td valign="top" style="padding-top:0px;">

                                        <div class="container">
                                          <div class="row">

                                              <form id="frmFichaTit" style="width: 900px;margin-left: 20px;">
                                              <div class="container-fluid">
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                      <label for="nome">Nome Completo</label>
                                                      <input type="text" class="form-control" id="nomeTit" placeholder="Entre com seu nome" required>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                      <label for="email">E-Mail</label>
                                                      <input type="email" class="form-control" id="emailTit" placeholder="Informe um e-mail válido" required>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                      <label for="profissaoTit">Profissão</label>
                                                      <input type="text" class="form-control" id="profissaoTit" placeholder="Informe a profissão">
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                      <label for="entidadeTit">Entidade</label>
                                                      <input type="text" class="form-control" id="entidadeTit" placeholder="Informe a Entidade de Classe">
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                      <label for="data">Data de Nascimento</label>
                                                      <input required type="date" readonly class="form-control" id="dataNascTit" placeholder="Data Nascimento">
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-5">
                                                      <label for="cep">CEP</label>
                                                      <input type="text" maxlength="8" readonly class="form-control" id="cepTit" readonly placeholder="CEP (Apenas números)">
                                                      </div>
                                                      <div class="form-group col-md-7">
                                                      <label for="ufTit">UF</label>
                                                      <select id="ufTit" class="form-control" readonly>
                                                          <option selected>Escolha</option>
                                                          <option value="AC">Acre</option>
                                                          <option value="AL">Alagoas</option>
                                                          <option value="AP">Amapá</option>
                                                          <option value="AM">Amazonas</option>
                                                          <option value="BA">Bahia</option>
                                                          <option value="CE">Ceará</option>
                                                          <option value="DF">Distrito Federal</option>
                                                          <option value="ES">Espírito Santo</option>
                                                          <option value="GO">Goiás</option>
                                                          <option value="MA">Maranhão</option>
                                                          <option value="MT">Mato Grosso</option>
                                                          <option value="MS">Mato Grosso do Sul</option>
                                                          <option value="MG">Minas Gerais</option>
                                                          <option value="PA">Pará</option>
                                                          <option value="PB">Paraíba</option>
                                                          <option value="PR">Paraná</option>
                                                          <option value="PE">Pernambuco</option>
                                                          <option value="PI">Piauí</option>
                                                          <option value="RJ">Rio de Janeiro</option>
                                                          <option value="RN">Rio Grande do Norte</option>
                                                          <option value="RS">Rio Grande do Sul</option>
                                                          <option value="RO">Rondônia</option>
                                                          <option value="RR">Roraima</option>
                                                          <option value="SC">Santa Catarina</option>
                                                          <option value="SP">São Paulo</option>
                                                          <option value="SE">Sergipe</option>
                                                          <option value="TO">Tocantins</option>
                                                      </select>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                      <label for="end">Endereço</label>
                                                      <input type="text" class="form-control" id="endTit" placeholder="Endereço completo" required>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-3">
                                                      <label for="num">Número</label>
                                                      <input type="text" pattern="[0-9]*" inputmode="numeric" class="form-control" id="numTit" placeholder="Número">
                                                      </div>
                                                      <div class="form-group col-md-9">
                                                      <label for="comp">Complemento/Ponto de Referência</label>
                                                      <input type="text" class="form-control" id="compTit" placeholder="Sala, Bloco, Andar, Casas, etc..." required>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                      <label for="cpf">CPF</label>
                                                      <input type="text" pattern="[0-9]*" inputmode="numeric" maxlength="11" class="form-control" id="cpfTit" placeholder="Insira seu CPF" required>
                                                      </div>
                                                      <div class="form-group col-md-6">
                                                      <label for="rg">RG</label>
                                                      <input type="text" pattern="[0-9]*" inputmode="numeric" class="form-control" id="rgTit" placeholder="Insira seu RG" required>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                        <label for="sexoTit">Sexo</label>
                                                        <select id="sexoTit" class="form-control" required>
                                                            <option selected="selected">não selecionada</option>
                                                            <option value="696">Masculino</option>
                                                            <option value="698">Feminino</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                        <label for="estCivilTit">Estado Civil</label>
                                                        <select id="estCivilTit" class="form-control" required>
                                                          <option selected="selected">não selecionada</option>
                                                          <option value="60">Solteiro(a)</option>
                                                          <option value="62">Casado(a)</option>
                                                          <option value="64">Separado(a)</option>
                                                          <option value="66">Viúvo(a)</option>
                                                          <option value="68">Divorciado(a)</option>
                                                          <option value="70">Outros</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                      <label for="mun">Município de Nascimento</label>
                                                      <input type="text" class="form-control" id="munNascTit" placeholder="Informe o município que você nasceu" required>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                      <label for="mae">Nome da Mãe</label>
                                                      <input type="text" class="form-control" id="nomeMaeTit" placeholder="Informe o nome completo de sua mãe" required>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                      <label for="sus">Cartão do SUS</label>
                                                      <input type="text" pattern="[0-9]*" inputmode="numeric" class="form-control" id="cardSusTit" placeholder="Número do seu cartão do SUS" required>
                                                      <small id="sus" class="form-text text-muted"><a href="https://meudigisus.saude.gov.br/menu/home" target="_blank">Consulte aqui</a></small>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                    <label for="formaPgto">Forma de Cobrança</label>
                                                    <select id="formaPgto" class="form-control" required>
                                                        <option value="">Escolha</option>
                                                        <option value="1">Boleto</option>
                                                        <option value="2">Débito em Conta</option>
                                                    </select>
                                                    </div>
                                                  </div>
                                                  <div class="form-row divPgto" style="display:none">
                                                    <div class="form-group boletoDigital col-md-12">

                                                    </div>
                                                    <div class="form-group boletoDigitalDados col-md-12" style="display:none">

                                                    </div>
                                                    <div class="form-group dadosBanco col-md-12">

                                                    </div>
                                                  </div>
                                                  <div class="resumo_titular"></div><br>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                        <label for="sus">Nome do Vendedor</label>
                                                        <input type="text" class="form-control" id="nomeVendedor" placeholder="Nome do Vendedor" required>
                                                      </div>
                                                  </div>
                                                  <div class="form-row">
                                                      <div class="form-group col-md-6">
                                                        <label for="cpf">CPF do Vendedor</label>
                                                        <input type="text" pattern="[0-9]*" inputmode="numeric" maxlength="11" class="form-control" id="cpfVendedor" placeholder="CPF do Vendedor" required>
                                                      </div>
                                                  </div>
                                              </div>
                                              <input type="submit" name="next" class="btn action-button" value="Continuar">
                                              <br>
                                              <br>

                                              <input type="hidden" id="hasAccount" value="0" />
                                              </form>

                                          </div>





                                        </td>
                                    </tr>
                                </table>



                        <div id="particles-1" class="particles"></div>



                  </div>
              </div>
              <!-- fim bar central-->
        </div>
    </div>


    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>

<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="js/jquery-confirm.min.js"></script>
<script src="js/select2.min.js"></script>
<!--<script type='text/javascript' src='js/way.js?v=1.21'></script>-->
</body>
</html>
