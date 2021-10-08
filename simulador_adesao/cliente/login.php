<?php
  session_start();
  $user_id = false;
  if(isset($_SESSION["user_id"]) and $_SESSION["user_id"] != "")
  {
    header('Location: index.php');
  }

  if(isset($_GET["doLogin"]))
  {
    //chama conexão banco
    include "../config/db_connect.php";
    $cpf_login = $_POST["txtLogin"];
    $senha_login = $_POST["txtPassword"];

    if($cpf_login == "" or $senha_login == "")
    {
      echo "<script>alert('CPF e Senha são requeridos.');window.history.back()</script>";
      exit;
    }
    $encoded_password = md5(base64_encode($senha_login));
    $buscaLogin = mysqli_query($conexao,"select * from clientes where cpf = '$cpf_login' and password = '$encoded_password'");
    if(mysqli_num_rows($buscaLogin) > 0)
    {
      while($rs=mysqli_fetch_assoc($buscaLogin))
      {
        $_SESSION["user_id"] = $rs["id"];
        header('Location: index.php');
        exit;
      }
    }else{
      echo "<script>alert('CPF e/ou senha inválido.');window.history.back()</script>";
      exit;
    }
  }
?>
<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Way.Digital</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets_new/images/favicon.png" type="image/png">
    
    <link rel="stylesheet" href="../assets_new/css/slick.css">
    <link rel="stylesheet" href="../assets_new/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets_new/css/default.css">
    <link rel="stylesheet" href="../assets_new/css/style.css">
    <link rel="stylesheet" href="../assets_new/css/LineIcons.css">
    
    <script src="../assets_new/js/vendor/jquery-1.12.4.min.js"></script>  
    <script src="../assets_new/js/slick.min.js"></script>    
    <script src="../assets_new/js/jquery.counterup.min.js"></script>
    <script src="../assets_new/js/jquery.magnific-popup.min.js"></script>    
    <script src="../assets_new/js/main.js"></script>
    <script src="../assets_new/js/bootstrap.min.js"></script>

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../css/select2.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/wizard.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/jquery-confirm.min.css">

  <link href='../css/font-awesome.css' rel='stylesheet'>       
  <script type='text/javascript' src='../js/jquery.min.js'></script>
  <script src="../js/jquery-1.11.1.min.js"></script>


<!-- CSS E JS CUSTOMIZADOS -->
<link href='../css/way.css' rel='stylesheet'>  
<link href='../css/privacy.css' rel='stylesheet'>  
<!-- CSS E JS CUSTOMIZADOS -->

<!-- CSS E JS CUSTOMIZADOS -->
<link href='../css/way.css' rel='stylesheet'>  
<link href='../css/privacy.css' rel='stylesheet'>  
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
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
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


    
</head>

<body>

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
        
    <?php include("../menu_topo.php"); ?>


    <div style="background-color:#ffffff; background-image: linear-gradient(#ffffff, #cdedff, #a2cee8, #00639b);">
      <div class="container col-4">
          <br><br><br><p class="texto"><strong>Área do Cliente</strong></p>
          <p class="texto1">Se você já tem uma proposta em andamento e deseja saber o status da mesma, logue informando seu cpf e a senha cadastrada no processo.</p>
          <form id="msform" method="post" action="?doLogin">
            <fieldset>
            <div class="inner" align="left">
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="texto1" for="txtLogin">Login (CPF Apenas números)</label>
                    <input type="text" class="form-control" pattern="[0-9]*" inputmode="numeric" maxlength="11" id="txtLogin" name="txtLogin" placeholder="Informe seu cpf" required>
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="texto1" for="txtPassword">Senha</label>
                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Informe sua senha" required>
                </div>
                </div>
            </div>
            <p class="texto1" style="text-align:center;"><a href="esqueceu_senha.php">Esqueceu sua senha? Clique aqui.</a></p>
            <input type="submit" name="next" id="btnLogin" class="next action-button" value="Login" >
            </fieldset>
          </form>
      </div>
    </div>
        
    </header>
    
    <?php include("../rodape.php"); ?>
    
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>

<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="../assets/vendor/venobox/venobox.min.js"></script>
<script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="../assets/vendor/counterup/counterup.min.js"></script>
<script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->  
<script src="../assets/js/main.js"></script>
<script src="../js/jquery-confirm.min.js"></script>
<script src="../js/select2.min.js"></script>
<script type='text/javascript' src='../js/way.js?v=1.21'></script>
  <script type="text/javascript">
    $(document).ready(function () {
      (function ($) {
        $.fn.inputFilter = function (inputFilter) {
          return this.on(
            "input keydown keyup mousedown mouseup select contextmenu drop",
            function () {
              if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
              } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(
                  this.oldSelectionStart,
                  this.oldSelectionEnd
                );
              } else {
                this.value = "";
              }
            }
          );
        };
      })(jQuery);

      $("#txtLogin").inputFilter(function (value) {
        return /^\d*$/.test(value); // Allow digits only, using a RegExp
      });
    });
  </script>
</body>

</html>
