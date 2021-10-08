
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
              <li class="done" id="personal"></li>
              <li class="done" id="propostas"></li>
              <li class="active" id="finalizado"></li>
              <!--<li class="done" id="user"></li> -->
            </ul>   
    </div>
    <div class="container-full">
        <div class="area-principal">
              <div class="bar-left">
                  <div class="card mt-3 mb-3" style="padding: 20px">
                  
                     
                      <form id="msform">            
                          <p class="texto1 msgGeraProp">Proposta finalizada</p>
                          <p class="texto1"><strong>Resumo do Plano Escolhido:</strong></p>
                          <fieldset>	

                            <div class="form-card" id="planos2">
                              <p class="texto6"><img class="picture-plan" src="assets/img/logo_aacl.png"></p>
                              <p class="texto0"><span class="nomePlan"></span></p>
                              <p class="texto0"><strong>Subtotal: R$ <span class="subTotal"></span></strong></p>
                              <p class="texto1"></p>
                              <p class="texto1"><strong><span class="qtDep"></span> </strong>dependente(s).</p>
                              <p class="texto1"></p>                                    
                              
                            </p>
                            </div> 
                            <input type="button" onclick="window.location.href='index.php'" class="next action-button" value="Concluído" style="width:100%">
                                
                            </fieldset>
                      </form>
                     
                  </div>
              </div>
              <div class="bar-central">
                  <div class="container-central" style="margin-top:60px;margin-left:0; width:75%">
                                
                       
                         
                      <div class="card">
                          <div class="card-header" id="headingOne" style="background-color: #fff">
                            
                          </div>

                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="background-color: #fff">
                            <div class="card-body">
                              <center>
                                <div class="container_proposta">
                                  <center><p class="texto11-left"><strong>Proposta Finalizada</strong></p><center></center></center>
                                  <br>
                                  <br>
                                  <p class="texto1-central">Você concluiu o preenchimento desta proposta com êxito.</p>
                                  <p class="texto1-central">Verifique se a proposta foi assinada corretamente e documentos foram encaminhados.</p>
                                  <p class="texto1-central"></p>
                                  <p class="texto1-central">
                                Você pode acompanhar o status desta proposta acessando a área do consultor 
                                informando o código do callcenter e a senha cadastrada, <a style="text-decoration: underline;text-transform: uppercase;" href="consultor/">clique aqui</a> se você deseja acessar agora.
                              </p>
                              </div>
                              </center>
                              
                            </div>
                          </div>
                      </div>
                        
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
