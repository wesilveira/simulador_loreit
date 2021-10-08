
<?php
	$utm_campaign = (isset($_GET['utm_campaign'])) ? $_GET['utm_campaign'] : "";
	$utm_source = (isset($_GET['utm_source'])) ? $_GET['utm_source'] : "";
	$utm_medium = (isset($_GET['utm_medium'])) ? $_GET['utm_medium'] : "";
	$utm_content = (isset($_GET['utm_content'])) ? $_GET['utm_content'] : "";
	$utm_term = (isset($_GET['utm_term'])) ? $_GET['utm_term'] : "";
?>


<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Way.Digital</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets_new/images/favicon.png" type="image/png">
    
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

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="css/select2.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/wizard.css" rel="stylesheet">
  <link rel="stylesheet" href="css/jquery-confirm.min.css">

  <link href='css/font-awesome.css' rel='stylesheet'>       
  <script type='text/javascript' src='js/jquery.min.js'></script>
  <script src="js/jquery-1.11.1.min.js"></script>


<!-- CSS E JS CUSTOMIZADOS -->
<link href='css/way.css' rel='stylesheet'>  
<link href='css/privacy.css' rel='stylesheet'>  
<!-- CSS E JS CUSTOMIZADOS -->

<!-- CSS E JS CUSTOMIZADOS -->
<link href='css/way.css' rel='stylesheet'>  
<link href='css/privacy.css' rel='stylesheet'>  
<!-- CSS E JS CUSTOMIZADOS -->


<!-- ESCONDER DIV NA VERSÃO MOBILE -->
<style>
 @media only screen and (max-width: 980px){
      .divTableCell3 { display: none; }
  }

  .jconfirm{
    z-index: 100000 !important;
}

.select2-container--open {
    z-index: 9999999 !important;
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
<script>
$( function() {
  // var availableTags = [
  //   "Administrador","Advogado","Aeronauta","Aeroviário","Agronomo","Arquiteto","Arquivista","Artista","Assistente Social","Atleta Profissional","Atuário","Autônomo","Auxiliar de Enfermagem","Bacharel em Letras","Bibliotecário","Biólogo","Biomédico","Contabilista","Corretor de Imóveis","Corretor de Seguros","Desenhista Industrial","Designer","Despachante aduaneiro","Economista","Educador Fisico","Enfermeiro","Engenheiro","Estatístico","Estudante","Farmacêutico","Filósofo","Físico","Fisioterapeuta","Fonoaudiólogo","Fotógrafo","Funcionário do comércio","Gastrônomo","Geólogo","Historiador","Hotelaria","Jornalista","Marketeiro","Matemático","Médico","Médico Veterinário","Músico","Nutricionista","Odontólogo","Pedagogo","Professor","Profissional de Finanças","Profissional de Informática","Profissional de Logística","Profissional de Recursos Humanos","Profissional de Segurança do Trabalho","Profissional de segurança privada","Profissional de Tecnologia da Informação","Psicólogo","Publicitário","Químico","Radialista","Radiologista","Relações Públicas e Internacionais","Representante Comercial","Secretário","Servidor Público Estadual","Servidor público Federal","Servidor Público Municipal","Sociólogo","técnico de enfermangem","Técnico em contabilidade","Técnico Industrial","Teólogo","Tradutor","Turismólogo","Vendedor"
  // ];
  // $( "#profissao" ).autocomplete({
  //   source: availableTags
  // });
} );
</script>
<!-- AUTOCOMPLETE -->


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

//planos 1
  function esconder() {      
        if(document.getElementById('planos').style.display=='block') {
          document.getElementById('planos').style.display='none';
        }
    }  

  function mostrar() {
      if(document.getElementById('planos').style.display=='none') {
        document.getElementById('planos').style.display='block';
      }
  }

//planos 2

  function mostrar2() {
      if(document.getElementById('planos2').style.display=='none') {
        document.getElementById('planos2').style.display='block';
      }
  }


  </script>

<!-- ESCONDER DIV E HABILITAR -->


<!---- Inclusão de dependentes ---->
<script type="text/javascript">
$(document).ready(function() {
	var max_fields      = 5; 
	var wrapper   		  = $(".input_fields_wrap"); 
	var add_button      = $(".add_field_button"); 
	
	var x = 1;
	$(add_button).click(function(e){ 
		e.preventDefault();
		if(x < max_fields){ 
			x++;
			$(wrapper).append('<div><table><tr><td><div class="input-group mb-2 mr-sm-2"><div class="input-group-prepend"><div class="input-group-text"><i class="fa fa-calendar" style="width:20px;" title="Data de Nascimento"></i></div></div><input type="date" class="form-control" id="data" placeholder="Data de Nasc." title="Data de Nascimento" name="mytext[]"></div></td><td></td></tr></table>  <a href="#" class="remove_field">Excluir</a></div>'); 
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ 
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});
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





        <!-- LOADING -->
        <div class="modal" id="loading" style="display:block" id="modal-default">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #e6f1f7;">
                <h4 class="modal-title"><img src="assets/img/favicon.png" width="40">&nbsp;<strong>Carregando</strong> <img width="100" src="assets/img/carregando.gif" alt="Carregando..." /></h4>
                </div>
                <div class="modal-body">
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
                    
                                       


                      <div id="planos2" class="container ">
                        <div class=" col-12">
                          <div class="card col-12 mt-12 mb-12" style="background-color:#ffffff; background-image: linear-gradient(#ffffff, #cdedff, #a2cee8, #00639b); align-items:center;">
                            <div>
                              <table height="800">
                                <tr>
                                  <td width="25%"><img src="assets_new/images/medico-1.png" height="500"></td>
                                  <td width="75%">
                                  

                                  <div>
                                    <div id="planos" class="container ">
                                    <br><br><br>
                                        
                                        <p class="texto"><strong>Manual de Orientação</strong></p>
                                        <p class="texto1" style="text-align:justify !IMPORTANT"><strong class="nomeTit"></strong>, A ANS (Agência Nacional de Saúde) fez um material que auxilia o seu processo de compras, o MPS (Manual de Orientação para Contratação de Plano de Saúde).
                                        <p class="texto1">Clique no botão abaixo para visualizar o documento.</p>
                                        <center>
                                          <p><a href="https://way.digital/Documents/mpspadrao/MPS_PADRAO.pdf" target="_blank"><button type="button" class="botao1">Visualizar MPS</button></a></p>
                                        </center>
                                        <form id="msform">
                                          
                                            <p class="texto1">Declaro que tive acesso ao MPS (Manual de Orientação para Contratação de Plano de Saúde) estando ciente das condições deste instrumento.</p>
                                            <p class="texto1"><input type="checkbox" id="declaraMPS" /> <label for="declaraMPS">Sim, eu li e desejo continuar.</label>
                                              
                                                    <fieldset>
                                                    <div>                

                                                    <div class="form-card" id="planos2">
                                                      <p class="texto6"><img class="picture-plan" src="assets/img/logo-unimed-natal.png"></p>
                                                      <p class="texto0"><span class="nomePlan"></span></p>
                                                      <p class="texto0"><strong>R$ <span class="precoPlan"></span></strong></p>
                                                      <p class="texto1"></p>
                                                      <input type="hidden" name="idOperadora" id="idOperadora" />
                                                    </div>
                                                    <span style="color:red" class="erroCheck"></span>
                                                    <input type="button" id="btnE3" name="next" class="next action-button" value="Continuar">
                                                    <!-- <input type="button" id="btnE2" class="previous action-button-previous" value="Anterior (Escolha plano)"> -->
                                                        
                                                    </fieldset>

                                                    <br><br><br>        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>





                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>



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
<script src="js/select2.min.js"></script>
<script type='text/javascript' src='js/way.js?v=1.21'></script>
</body>

</html>
