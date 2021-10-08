
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
    
    <header class="header-area">
        
    <?php include("menu_topo.php"); ?>


  <!-- modal preenchimento dados iniciais -->
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


  <!-- modal preenchimento dados iniciais -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="background: #e6f1f7;">
        <h4 class="modal-title"><img src="assets/img/favicon.png" width="40">&nbsp;<strong>Por que preencher esses dados?</strong></h4>
        </div>
        <div class="modal-body">
        <P><strong>Dados de contato:</strong> Com os seus dados, podemos entrar em contato, entender melhor a sua necessidade e lhe oferecer o plano mais adequado.</P> 
        <p><strong>CEP:</strong> A disponibilidade e as condições do plano variam conforme o local em que você reside.</p>
        <p><strong>Profissão:</strong> Oferecemos planos para categorias profissionais por meio das entidades de classe que os representam.</p>
        </div>
        <div class="modal-footer" style="background: #e6f1f7;">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fechar</button>
        </div>
    </div>
    </div>
  </div>
  <!-- modal preenchimento dados iniciais fim --> 


        
        <div id="planos" style="background-color:#ffffff; background-image: linear-gradient(#ffffff, #cdedff, #a2cee8, #00639b);">
            <div class="container">
                <div class="row justify-content-center">
                    
                    <table border="0">
                        <tr>
                            <td width="30%" valign="top" style="padding-top:100px;"><img src="assets_new/images/medico-1.png" height="400" width="400"></td>
                            <td width="70%" height="1000" valign="top" style="padding:100px;">
                            
                            
                            
                            <div>
                            
            <div id="loading-corpo" align="center" style="display:none">
              <span id="loading-image"><h4 class="loading-text">Aguarde enquanto geramos sua ficha para assinatura eletrônica.</h4> <img width="100" src="assets/img/carregando.gif" alt="Carregando..." /></span>
            </div>

            <div class="container-fluid"> <p class="texto11"><strong>COMPROVAÇÃO DE VÍNCULO COM ENTIDADE/ASSOCIAÇÃO</strong></p>
                <p class="texto1" style="text-align: justify; text-justify: inter-word;">ENTIDADE é uma associação de categoria ou grupo profissional do qual você faz parte. 
Para ter direito a estas condições exclusivas você precisa comprovar o seu vínculo com alguma entidade ligada a sua profissão.</p>
                <p class="texto1">Sua profissão informada foi: <strong><span class="profissaoTit"></span>.</strong></p>
                <p class="texto1 entidadeFechada"><strong>Você possui vínculo com a entidade <span class="nomeEntidadeFechada"></span> relativa a sua profissão?</strong></p>    
                <p class="texto1 entidadeAberta hide"><strong>Você possui vínculo com alguma das entidades a seguir <span class="entidadesAbertas"></span> relativa a sua profissão?</strong></p>    
                <table>
                    <tr>
                        <td><input type="button" class="btnTemVinculo vSim" name="next" value="Sim"></td>
                        <td><input type="button" class="btnTemVinculo VNao" name="next" value="Não"></td>
                    </tr>
                </table> 
            </div>

            <div class="container-fluid" id="temVinculo" style="display:none;">  <br>              
                <p class="texto1 entidadeFechada"><strong>Sim, eu tenho um vínculo com a entidade <span class="nomeEntidadeFechada"></span></strong></p>
                <p class="texto1 entidadeAberta hide"><strong>Sim, eu tenho vínculo com a entidade <span class="nomeEntidadeEscolhida"></span>.</strong></p>
                <p class="texto1">Para prossegir, basta enviar um <strong>comprovante de vínculo com a entidade/associação em questão (<span class="nomeEntidadeEscolhida"></span>).</strong></p>
                <div class="form-group uploadProofEntity">
                    <label for="fileVinculo">Comprovante de vínculo com Entidade/Associação.</label>
                    <input type="file" class="form-control-file" id="fileVinculo">
                </div>
                <div class="form-group uploadProofEntity">
                  <input type="button" id="btnDoUploadFilevinculo" value="Enviar" />  
                  <!--<input type="button" class="btnDesfazEscolhas" value="Recomeçar" />-->
                </div>
                <div class="form-group uploadProofEntityOK" style="display:none">
                  <h5 style="color:green">Arquivo gravado, clique em continuar.</h5>
                </div>
            </div>

            <div class="container-fluid" id="associarEntidade" style="display:none;">  <br>         
                <p class="texto1 entidadeFechada"><strong>Não, eu não tenho vínculo com a entidade/associação acima</strong></p>  
                <p class="texto1 entidadeAberta hide"><strong>Não, eu não tenho vínculo com nenhuma entidade/associação acima</strong></p>  
                <p class="texto1 entidadeFechada">Como você não tem vínculo com a entidade/associação informada, vamos te vincular a <strong><span class="nomeEntidade"></span></strong>. Será cobrado uma pequena taxa de associação, que estará descrita no documento que será encaminhado em seguida para o seu e-mail.</p>
                <p class="texto1 entidadeAberta hide">Como você não tem vínculo com nenhuma entidade/associação acima, ao clicar para prosseguir, você deverá escolher uma entidade disponível. Será cobrado uma pequena taxa de associação, que estará descrita no documento que será encaminhado em seguida para o seu e-mail.</p>
                <p class="texto1">Podemos prosseguir com a associação?</p>  
                <table>
                    <tr>
                        <td><input type="button" class="btnContinuaAssocEntidade aSim" name="next" value="Sim"></td>
                        <td><input type="button" class="btnContinuaAssocEntidade aNao" value="Não"></td>
                    </tr>
                    <!--<tr>
                      <td colspan="2"><input type="button" class="btnDesfazEscolhas" value="Recomeçar" /></td>
                    </tr>-->
                </table> 
            </div>

            <div class="container-fluid" id="vinculaEntidade" style="display:none;">  <br>              
                <p class="texto1 entidadeFechada"><strong>Sim, quero me vincular à entidade/associação informada.</strong></p>
                <p class="texto1 entidadeAberta hide"><strong>Sim, quero me vincular à entidade/associação informada (<span class="nomeEntidadeEscolhida"></span>).</strong></p>
                <p class="texto1">Ótimo vamos prosseguir com sua associação.</p>
                <p class="texto1">Agora vou precisar do comprovante de exercício profissional, além dos dados de local de trabalho.</p>
                
                <form id="frmAssocia">
                <hr />
                <div class="form-row">
                  <div class="form-group uploadProofProfession">
                      <label for="fileProfissao">Comprovante de profissão.</label>
                      <input type="file" class="form-control-file" id="fileProfissao" required>
                  </div>
                </div>
                <hr />
                <p class="texto1"><strong>Dados do seu local de trabalho:</strong>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cepEnt" maxLength="8" aria-describedby="cep" placeholder="CEP (Somente numeros)" required>
                    <!-- <small id="emailHelp" class="form-text text-muted">informacoes aqui</small> -->
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="end">Endereço</label>
                    <input type="text" class="form-control" id="endEnt" aria-describedby="end" placeholder="Rua, Av. etc..." required>
                    <!-- <small id="emailHelp" class="form-text text-muted">informacoes aqui</small> -->
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                    <label for="num">Número</label>
                    <input type="numeric" class="form-control" id="numEnt" placeholder="Número" required>
                    </div>
                    <div class="form-group col-md-8">
                    <label for="comp">Complemento</label>
                    <input type="text" class="form-control" id="compEnt" placeholder="Casa, Bloco, Sala, etc...">
                    </div>
                </div>
                <table>
                    <tr>
                      <input type="hidden" id="localidadeEnt">  
                      <input type="hidden" id="bairroEnt">
                      <input type="hidden" id="ufEnt">
                      <td><input disabled type="submit" name="next" class="btnEnviaDadosVinculo" value="Enviar"></td>
                    </tr>
                </table> 
                </form>
                <br>
                <div id="email" style="display:none;">  <br>              
                    <p class="texto1">Para que você possa vincular-se a esta entidade de classe, enviamos um e-mail com sua Ficha Associativa em formato digital.</p>  
                    <p class="texto1">Você precisa assinar rapidamente pelo computador ou celular.</p>
                    <p class="texto1">A Assinatura digital tem o mesmo valor jurídico da assinatura tradicional.</p>
                    <p class="texto1">Após a assinatura digital clique no botão <strong>próximo</strong></p>
                    
                <table>
                    <tr>
                        <td><input type="button" name="next" value="Próximo" class="btnChecaAssinaturaAssoc"></td>
                    </tr>
                </table> 

                <br>
                </div>
            </div>

          </div>
          <div>
            
            <div class="row justify-content-center">

              <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-11 text-center p-0 mt-3 mb-2">
                  <div>
               <form id="msform">
                                                  
                          <p class="texto1"><strong><span class="nomeTit"></span></strong>, o plano que você escolheu é do tipo Coletivo por Adesão. Para esse tipo de Plano é necessário comprovar seu vínculo com uma entidade de classe profissional. Caso não possua este vínculo, para continuar com este benefício, podemos imediatamente vincular a uma classe.</p>
                          <p class="texto1"><strong>Resumo do Plano Escolhido:</strong></p>
                                <fieldset>	

                                  <div class="form-card" id="planos2">
                                    <p class="texto6"><img class="picture-plan" src="assets/img/logo-unimed-natal.png"></p>
                                    <p class="texto0"><span class="nomePlan"></span></p>
                                    <p class="texto0"><strong>Subtotal: R$ <span class="subTotal"></span></strong></p>
                                    <p class="texto1"></p>
                                    <p class="texto1"><strong><span class="qtDep"></span> </strong>dependente(s).</p>
                                    <p class="texto1"></p>                                    
                                    
                                  </p>
                                  </div> 
                                  <input type="button" id="btnE6" name="next" class="next action-button" value="Continuar" disabled>
                                  <!--<input type="button" name="previous" class="previous action-button-previous" value="Anterior" onClick="parent.location='4_incluir_dependentes.php'">-->

                                  </fieldset>
                      </form>
                  </div>
              </div>
          </div>
                            
                            
                            
                            </td>
                        </tr>
                    </table>

                </div>                 
            </div> 
            <div id="particles-1" class="particles"></div>
            
        </div> 
        
    </header>
    
    <?php include("rodape.php"); ?>
    
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
<!--<script src="js/select2.min.js"></script>
<script type='text/javascript' src='js/way.js?v=1.21'></script>-->
</body>

</html>
