
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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
                                  <!--<p class="texto6"><img class="picture-plan" src="assets/img/logo-unimed-natal.png"></p>-->
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
                          <td width="100%" valign="top" style="padding-top:30px;">



                          <div class="container-fluid-anexos" style="width:70%;margin:0px; margin-left: 20px">
                          <div class="container_plan_anexos">
                            <p align="center" class="texto1"><strong>IMPORTANTE</strong></p>
                            <p class="texto1-central">1º - Passo: Solicite ao Cliente que tire fotos dos seguintes documentos: <br>CNH ou RG com CPF (caso haja dependentes, foto do RG) | Comprovante de Residência atualizado</p>
                            <p class="texto1-central" style="text-align: justify; text-justify: inter-word;">2º- Oriente-o a colocar o documento sob uma superfície plana para uma melhor qualidade. Evite tirar a foto segurando-a, para evitar foto tremida.</p>
                            <p class="texto1-central" style="text-align: justify; text-justify: inter-word;">3º- Solicite para que envie pelo WhatsApp ou E-mail da Operação e baixe os arquivos para que possa adicioná-los a proposta.</p>
                          </div>
                          <form id="frmAnexos" enctype="multipart/form-data">
                          <div id="accordion" class="accordion_anexos" style="margin-bottom:20px;margin-top:20px">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                  <button type="button" class="btn btn-link collapsed acdTit" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    DOCUMENTOS DO TITULAR
                                  </button>
                                  <hr>
                                 </h5>
                              </div>

                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body docsTit">
                                       <p class="texto0" ><strong>Escolha quais documentos você prefere enviar</strong></p>
                                  <br>

                                  <div class="button-document">
                                          <button class="btn btn-primary-document addodonto" name="addodonto" id="addodontoCNH" type="button" onclick="localStorage.setItem('tipoDocument', 'cnh')">CNH+ Comp de residência</button>
                                          <button class="btn btn-primary-document addodonto" name="addodonto" id="addodontoRGCOM" type="button" onclick="localStorage.setItem('tipoDocument', 'rgcom')">RG com CPF + Comp de residência</button>
                                          <button class="btn btn-primary-document addodonto" name="addodonto" id="addodontoRGSEM" type="button" onclick="localStorage.setItem('tipoDocument', 'rgsem')">RG + CPF + Comp de residência</button>
                                          <!-- <button class="btn btn-primary addodonto" name="addodonto" id="addodonto" onclick="localStorage.setItem('qntdOdonto', '4')" type="button">4</button>
                                          <button class="btn btn-primary addodonto" name="addodonto" id="addodonto" onclick="localStorage.setItem('qntdOdonto', '5')" type="button">5</button>
                                          <button class="btn btn-primary addodonto" name="addodonto" id="addodonto" onclick="localStorage.setItem('qntdOdonto', '6')" type="button">6</button> -->
                                          <!-- <button id="btnAddDep" type="button" class="btn add_field_button action-button1">Incluir</button> -->
                                  </div>
                                  <br>
                                  <!-- <div class="row col-md-12">
                                    <div class="form-group">
                                      <div class="form-check">
                                        <input class="form-check-input radioDocTit" type="radio" name="radioDocTit" id="radioDocTit1" value="cnh">
                                        <label class="form-check-label radioDocTit" for="radioDocTit1">
                                        CNH + Comprovante de residência;
                                        </label>
                                      </div>
                                     <div class="form-check">
                                        <input class="form-check-input radioDocTit" type="radio" name="radioDocTit" id="radioDocTit2" value="rgcom">
                                        <label class="form-check-label radioDocTit" for="radioDocTit2">
                                        RG com CPF (frente e verso) + Comprovante de residência;
                                        </label>
                                      </div>
                                      <div class="form-check disabled">
                                        <input class="form-check-input radioDocTit" type="radio" name="radioDocTit" id="radioDocTit3" value="rgsem">
                                        <label class="form-check-label radioDocTit" for="radioDocTit3">
                                        RG (frente e verso) + CPF separado (frente e verso) + Comprovante de residência;
                                        </label>
                                      </div>
                                    </div>
                                  </div> -->
                                  <div class="row col-md-12">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <!-- <label for="cnhTit">CNH</label> -->
                                        <!-- <input type="file" class="form-control-file" name="UF_CRM_1606400876" id="cnhTit" disabled>                                         -->
                                        <input type="button" class="btn-file" onclick="localStorage.setItem('currentDocument', 'cnhTit')" id="cnhTitbtn" value="CNH" disabled>
                                        <input type="file" name="UF_CRM_1606400876" id="cnhTit" class="arquivo">
                                        <input type="text" name="filecnhTit" id="filecnhTit" class="file" placeholder="Nenhum arquivo" readonly="readonly">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <!-- <label for="comprovanteTit">Comprovante Residência</label> -->
                                        <!-- <input type="file" class="form-control-file" name="UF_CRM_1606401119" id="comprovanteTit" disabled> -->

                                        <input type="button" class="btn-file" onclick="localStorage.setItem('currentDocument', 'comprovanteTit')" id="comprovanteTitbtn" value="Comprovante residência" disabled>
                                        <input type="file" name="UF_CRM_1606401119" id="comprovanteTit" class="arquivo" >
                                        <input type="text" name="filecomprovanteTit" id="filecomprovanteTit" class="file" placeholder="Nenhum arquivo" readonly="readonly">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <!-- <label for="rgfTit">RG Frente</label> -->
                                        <!-- <input type="file" class="form-control-file" name="UF_CRM_1606400844" id="rgfTit" disabled> -->
                                        <input type="button" class="btn-file" onclick="localStorage.setItem('currentDocument', 'rgfTit')" id="rgfTitbtn" value="RG Frente" disabled>
                                        <input type="file" name="UF_CRM_1606400844" id="rgfTit" class="arquivo" >
                                        <input type="text" name="filergfTit" id="filergfTit" class="file" placeholder="Nenhum arquivo" readonly="readonly">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <!-- <label for="rgvTit">RG Verso</label> -->
                                        <!-- <input type="file" class="form-control-file" name="UF_CRM_1606400944" id="rgvTit" disabled> -->

                                        <input type="button" class="btn-file" onclick="localStorage.setItem('currentDocument', 'rgvTit')" id="rgvTitbtn" value="RG Verso" disabled>
                                        <input type="file" name="UF_CRM_1606400944" id="rgvTit" class="arquivo" >
                                        <input type="text" name="filergvTit" id="filergvTit" class="file" placeholder="Nenhum arquivo" readonly="readonly">

                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <!-- <label for="cpffTit">CPF Frente</label> -->
                                        <!-- <input type="file" class="form-control-file" name="UF_CRM_1606400862" id="cpffTit" disabled> -->
                                        <input type="button" class="btn-file" onclick="localStorage.setItem('currentDocument', 'cpffTit')" id="cpffTitbtn" value="CPF Frente" disabled>
                                        <input type="file" name="UF_CRM_1606400862" id="cpffTit" class="arquivo" >
                                        <input type="text" name="filecpffTit" id="filecpffTit" class="file" placeholder="Nenhum arquivo" readonly="readonly">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <!-- <label for="cpfvTit">CPF Verso</label> -->
                                        <!-- <input type="file" class="form-control-file" name="UF_CRM_1606401100" id="cpfvTit" disabled> -->
                                        <input type="button" class="btn-file" onclick="localStorage.setItem('currentDocument', 'cpfvTit')" id="cpfvTitbtn" value="CPF Verso" disabled>
                                        <input type="file" name="UF_CRM_1606401100" id="cpfvTit" class="arquivo" >
                                        <input type="text" name="filecpfvTit" id="filecpfvTit" class="file" placeholder="Nenhum arquivo" readonly="readonly">
                                      </div>
                                    </div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<input type="button" class="btn-file" onclick="localStorage.setItem('currentDocument', 'outroDocTit')" id="outroDocTitbtn" value="Outro Documento" disabled>
																				<input type="file" name="UF_CRM_1620501346" id="outroDocTit" class="arquivo" >
																				<input type="text" name="fileoutroDocTit" id="fileoutroDocTit" class="file" placeholder="Nenhum arquivo" readonly="readonly">
																			</div>
																		</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <input type="submit" class="btn action-button" value="Continuar" disabled>
                          <input type="hidden" name="frmType" value="uploadAnexos" />
                          </form>
                          </div>

                          </td>
                        </tr>
                  </table>



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
