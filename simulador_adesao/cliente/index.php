<?php
  session_start();
  $user_id = false;
  if(!isset($_SESSION["user_id"]) or $_SESSION["user_id"] == "")
  {
    header('Location: login.php');
    exit;
  }else{
    if(isset($_GET["logout"]))
    {
      session_destroy();
      header('Location: login.php');
    }else{
      $user_id = $_SESSION["user_id"];
      //get dados usuários
      include "../config/db_connect.php";
      $dadosUsuario = false;
      $dadosProposta = false;
      $propostasUsuario = false;

      $buscaDadosUsuario = mysqli_query($conexao,"select * from clientes where id = $user_id");
      if(mysqli_num_rows($buscaDadosUsuario) == 0)
      {
        session_destroy();
        header('Location: login.php');
      }else{
        $dadosUsuario = mysqli_fetch_array($buscaDadosUsuario);
      }
      
      if(isset($_GET["proposta"]) and $_GET["proposta"] != "")
      {
        $deal_id = $_GET["proposta"];
        $buscaProposta = mysqli_query($conexao,"select * from propostas where deal_id = $deal_id and cliente_id = $user_id");
        if(mysqli_num_rows($buscaProposta) > 0)
        {
          $dadosProposta = array();
          while($rs=mysqli_fetch_array($buscaProposta))
          {
            $dadosProposta[] = $rs;
          }
        }
      }else{
        //busca propostas
        $buscaDadosPropostas = mysqli_query($conexao,"select * from propostas where cliente_id = $user_id");
        if(mysqli_num_rows($buscaDadosPropostas) > 0)
        {
          $propostasUsuario = array();
          while($rs=mysqli_fetch_array($buscaDadosPropostas))
          {
            $propostasUsuario[] = $rs;
          }
        }
      }
    }
  }

  function curl_rest($url){
		//  Initiate curl
		$ch = curl_init();
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$url);
		// Execute
		$result=curl_exec($ch);
		// Closing
		curl_close($ch);
		//return
		return $result;
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Way.Digital - Store (Área do Cliente)</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="../css/font-google.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
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


</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!--<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:atendimento@way.digital">atendimento@way.digital</a>
        <i class="icofont-phone"></i> 0800 878 0042
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>-->

  <?php include("menu.php"); ?>

  <!-- modal preenchimento dados iniciais -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="background: #e6f1f7;">
        <h4 class="modal-title"><img src="../assets/img/favicon.png" width="40">&nbsp;<strong>Por que preencher esses dados?</strong></h4>
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

  <!-- ======= Hero Section ======= -->
  <div style="background-color: #e6f1f7;">
  
    <div class="container-fluid">



      <div class="container">
        <div class="row">
          <div class="corpo2" style="width:100%">
            
            <div class="row justify-content-center">

              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                <div class="card" style="background-color: #e6f1f7;">
                    <p class="texto"><strong>Área do Cliente</strong></p>
                    <p class="texto11">Olá, <strong><?php echo $dadosUsuario["nome"]; ?></strong>. <a href="?logout">[Sair]</a></p>
                    <p class="texto1"><strong>Veja abaixo sua(s) proposta(s):</strong></p>
                </div>
              </div>
              <div class="col-md-12">
                <?php
				echo '<hr />';
				  
				if(isset($_GET["proposta"]) and $_GET["proposta"] != "")
				{
					if(!$dadosProposta)
					{
					  echo '<center>
							  <p class="texto11">Proposta não localizada. <a href="index.php">[Voltar para início]</a></p>
							</center>';
					}else{
					  $dadosProposta = $dadosProposta[0];
					  $infoCustomer = unserialize($dadosProposta["infoCustomer"]);
					  $operadoras = array();
					  $buscaOperadoras = mysqli_query($conexao,"select xml_id, nome, img from operadoras");

					  while($rs=mysqli_fetch_array($buscaOperadoras))
					  {
						$operadoraId = $rs["xml_id"];
						$operadoras["$operadoraId"]["nome"] = $rs["nome"];
						$operadoras["$operadoraId"]["img"] = $rs["img"];
					  }
					  $ultima_modificacao = ($dadosProposta["updatedon"] === NULL) ? date("d/m/Y H:i",strtotime($dadosProposta["createdon"])) : date("d/m/Y H:i",strtotime($dadosProposta["updatedon"]));

					  //Dados ficha Associativa
					  $ficha_associativa = ($dadosProposta["keyid_ficha_associativa"] === NULL) ? "Não associado." : curl_rest("https://app.clicksign.com/api/v1/documents/".$dadosProposta["keyid_ficha_associativa"]."?access_token=5a8bb3dc-d2e0-4be5-adf7-e827d576326e");
					  if($dadosProposta["keyid_ficha_associativa"] !== NULL)
					  {
						$fichaDocInfo = json_decode($ficha_associativa,true);
						$statusFicha = $fichaDocInfo["document"]["status"];
						if($statusFicha == "canceled")
						{
						  $ficha_associativa = '<span style="color:red">Documento não assinado foi cancelado, contate a central.</span>';
						}else if($statusFicha == "closed"){
						  $ficha_associativa = '<a href="'.$fichaDocInfo["document"]["downloads"]["signed_file_url"].'" target="_blank"><i class="fa fa-download"></i> Visualizar</a>';
						}else if($statusFicha == "running"){
						  $ficha_associativa = '<span style="color:red">Pendente assinatura</span> <a href="'.$fichaDocInfo["document"]["signers"][0]["url"].'" target="_blank"><i class="fa fa-edit"></i> Assinar</a>';
						}
					  }

					  //Dados proposta
					  $proposta_final = ($dadosProposta["keyid_proposta"] === NULL) ? "Contate atendimento." : curl_rest("https://app.clicksign.com/api/v1/documents/".$dadosProposta["keyid_proposta"]."?access_token=5a8bb3dc-d2e0-4be5-adf7-e827d576326e");
					  if($dadosProposta["keyid_proposta"] !== NULL)
					  {
						$propostaDocInfo = json_decode($proposta_final,true);
						$statusProposta = $propostaDocInfo["document"]["status"];
						if($statusProposta == "canceled")
						{
						  $proposta_final = '<span style="color:red">Documento não assinado foi cancelado, contate a central.</span>';
						}else if($statusProposta == "closed"){
						  $proposta_final = '<a href="'.$propostaDocInfo["document"]["downloads"]["signed_file_url"].'" target="_blank"><i class="fa fa-download"></i> Visualizar</a>';
						}else if($statusProposta == "running"){
						  $proposta_final = '<span style="color:red">Pendente assinatura</span> <a href="'.$propostaDocInfo["document"]["signers"][0]["url"].'" target="_blank"><i class="fa fa-edit"></i> Assinar</a>';
						}
					  }
					?>
					  <div class="row">
						<div class="card bg-light mb-3" style="width:100%">
						  <div class="card-header"><a href="index.php">[<i class="fa fa-home"></i>Início]</a><a href="" onClick="window.location.reload()">[<i class="fa fa-refresh"></i>Atualizar]</a> <center><strong>Proposta Nº <?php echo $dadosProposta["deal_id"].' [STATUS: '.$dadosProposta["status"].']'; ?></strong></center></div>
						  <div class="card-body">
							<div class="row">
							  <div class="col-12 col-md-4 col-sm-6">
								<div class="card">
								  <div class="card-header texto1">
									Dados Titular
								  </div>
								  <ul class="list-group list-group-flush" style="font-size:12px">
									<li class="list-group-item"><strong>Nome:</strong> <?php echo $dadosUsuario["nome"]; ?></li>
									<li class="list-group-item"><strong>Data Nascimento:</strong> <?php echo date("d/m/Y",strtotime($dadosUsuario["data_nascimento"])); ?></li>
									<li class="list-group-item"><strong>Valor Titular:</strong> <?php echo 'R$ '.number_format($infoCustomer["PLANO_ESCOLHIDO"]["PRICE"], 2, ',', '.'); ?></li>
									<li class="list-group-item">
										<center><img src="../<?php echo $operadoras[$infoCustomer["PLANO_ESCOLHIDO"]["operadoraID"]]["img"]; ?>"</center>
										<hr />
										<strong>Plano Escolhido:</strong> <?php echo $operadoras[$infoCustomer["PLANO_ESCOLHIDO"]["operadoraID"]]["nome"]." - ".$infoCustomer["PLANO_ESCOLHIDO"]["NAME"]."<br><strong>ANS:</strong> ".$infoCustomer["PLANO_ESCOLHIDO"]["PROPERTY_163"]["value"]." <strong>Detalhes Plano:</strong> ".'<a href="'.$infoCustomer["PLANO_ESCOLHIDO"]["PROPERTY_382"]["value"].'" target="_blank"><i class="fa fa-download"></i> Visualizar</a>'; ?>
									</li>
								  </ul>
								</div>
							  </div>
							  <?php
								if(isset($infoCustomer["dependentes"]) and (sizeof($infoCustomer["dependentes"]) > 0))
								{
							  ?>
							  <div class="col-12 col-md-4 col-sm-6">
								<div class="card">
								  <div class="card-header texto1">
									Dados Dependentes
								  </div>
								  <div class="table-responsive-sm">
									<table class="table" style="font-size:12px">
									  <thead>
										<tr>
										  <th scope="col">Nome</th>
										  <th scope="col">Data Nascimento</th>
										  <th scope="col">Valor</th>
										</tr>
									  </thead>
									  <tbody>
									<?php
									  foreach($infoCustomer["dependentes"] as $dadoDep)
									  {
									?>
									  <tr>
										<td><?php echo $dadoDep["nome"]; ?></td>
										<td><?php echo date("d/m/Y",strtotime($dadoDep["data_nasc"])); ?></td>
										<td><?php echo 'R$ '.number_format($dadoDep["price_plano"], 2, ',', '.'); ?></td>
									  </tr>
									<?php
									  }
									?>
									  </tbody>
									</table>
								  </div>
								</div>
							  </div>
							  <?php
								}
							  ?>
							  <div class="col-12 col-md-4 col-sm-6">
								<div class="card">
								  <div class="card-header texto1">
									Proposta/Ficha Associativa
								  </div>
								  <ul class="list-group list-group-flush" style="font-size:12px">
									<li class="list-group-item"><strong>Ficha Associativa:</strong> <?php echo $ficha_associativa; ?></li>
									<li class="list-group-item"><strong>Proposta:</strong> <?php echo $proposta_final; ?></li>
								  </ul>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					<?php
					}
					echo '</div>';
				}else{
                    if(!$propostasUsuario)
                    {
                      echo '<center>
                              <p class="texto">Nenhuma proposta localizada.</p>
                            </center>';
                    }else{
                      $html = '
                        <div class="table-responsive-sm">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Número Proposta</th>
                                <th scope="col">Operadora</th>
                                <th scope="col">Qtde. Dependentes</th>
                                <th scope="col">Valor Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Última Atualização</th>
                              </tr>
                            </thead>
                            <tbody>';

                      foreach($propostasUsuario as $proposta)
                      {
                        $infoCustomer = unserialize($proposta["infoCustomer"]);

                        $operadoras = array();
                        $buscaOperadoras = mysqli_query($conexao,"select xml_id, nome, img from operadoras");

                        while($rs=mysqli_fetch_array($buscaOperadoras))
                        {
                          $operadoraId = $rs["xml_id"];
                          $operadoras["$operadoraId"]["nome"] = $rs["nome"];
                          $operadoras["$operadoraId"]["img"] = $rs["img"];
                        }

                        $ultima_modificacao = ($proposta["updatedon"] === NULL) ? date("d/m/Y H:i",strtotime($proposta["createdon"])) : date("d/m/Y H:i",strtotime($proposta["updatedon"]));
                        
                        $qtdep = (isset($infoCustomer["dependentes"])) ? sizeof($infoCustomer["dependentes"]) : 0;

                        $html .= '<tr>
                                <td scope="row"><a href="?proposta='.$proposta["deal_id"].'"<i class="fa fa-search" style="cursor:pointer;color:#0376af"></i>Ver detalhe</a></td>
                                <td>'.$proposta["deal_id"].'</td>
                                <td>'.$operadoras[$infoCustomer["PLANO_ESCOLHIDO"]["operadoraID"]]["nome"].'</td>
                                <td>'.$qtdep.'</td>
                                <td>R$ '.number_format($infoCustomer["SUBTOTAL"], 2, ',', '.').'</td>
                                <td>'.$proposta["status"].'</td>
                                <td>'.$ultima_modificacao.'</td>
                              </tr>';
                      }
                              
                      $html .=  '</tbody>
                          </table>
                        </div>
                      ';

                      echo $html; 
                    }
                }
                echo '<hr />';
                ?>
              </div>
          </div>

          </div>
        </div>
      </div>



  
  </div>

  <?php include("rodape.php"); ?>

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
  <!-- <script type='text/javascript' src='js/way.js?v=1.21'></script>
  <script src="js/privacy.js"></script> -->
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