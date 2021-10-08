<?php
include 'mobile/detect/Mobile_Detect.php';
$detect = new Mobile_Detect();

if ($detect->isMobile()) {
    header('Location: simulador_adesao/index.php');
    exit(0);
}

include "session_valide.php";

?>

<!doctype html>
<html class="no-js" lang="pt-br">
<head>

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TSVXJDT');</script>

    <meta charset="utf-8">
    <title>Lore IT</title>    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="simulador_adesao/assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/LineIcons.css">    
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>  
    <script src="assets/js/slick.min.js"></script>    
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>    
    <script src="assets/js/main.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/client.css">
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
			$('.customer-logos').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				autoplay: false,
				autoplaySpeed: 1500,
				arrows: false,
				dots: false,
				pauseOnHover: false,
				responsive: [{
					breakpoint: 768,
					settings: {
						slidesToShow: 4
					}
				}, {
					breakpoint: 520,
					settings: {
						slidesToShow: 3
					}
				}]
			});
		});
    </script>
    <script type="text/javascript">
            const go = (elem) => {
        window.scroll({       // 1
            top: document
            .querySelector( elem )
            .offsetTop,       // 2
            left: 0,
            behavior: 'smooth'// 3
        });
        }
      </script>
</head>
<body>
    
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TSVXJDT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>


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
        <div id="planos" class="corpo">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <table border="0">
                                <<!--<tr>
                                    <td rowspan="4">
                                        <img src="assets/images/medico-3.png" style="width: 60%">
                                    </td>
                                    <td width="5%" rowspan="4"></td>
                                    <td height="20%"></td>
                                </tr>-->
                                <tr>

                                </tr>
                                <tr>
                                    <td valign="top">
                                        <br>
                                    <p class="text3" style="text-align: center">É muito fácil simular e contratar o plano ideal para seu cliente.
                                    </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <br/>
                                    <p class="text2" data-wow-duration="1.3s" data-wow-delay="0.8s" style="text-align: center" >CONTRATE AGORA</p>
                                    <br>
                                    </td>
                                </tr>
                            </table> 
                        </div> 
                    </div>                    
                    <div class="container">
                    <div class="row">
                        <div class="col-2"></div> 
                        <div class="col-8">
                            <section class="customer-logos slider">
                                <div class="slide single-testimonial" onclick="localStorage.clear();localStorage.setItem('currentStep', '1');localStorage.setItem('currentPage', '1');window.location.href='simulador_adesao/index.php'">                                           
                                        <img src="assets/images/icon-voce_e_familia-4.png" alt="">
                                        <p class="texto_carousel"><br>COLETIVO POR ADESÃO </p>
                                </div>
                                <div class="slide single-testimonial" onclick="go('#plano2')">                                           
                                        <img src="assets/images/icon-empresa-4.png" alt="">
                                        <p class="texto_carousel"><br>ASSOCIAÇÃO ENTIDADE</p>
                                </div>
                                <!--<div class="slide single-testimonial" onclick="go('#plano3')">                                           
                                        <img src="../assets/images/icon-empregado-4.png" alt="">
                                        <p class="texto_carousel">PLANO PARA <br><b>VOCÊ FUNCIONÁRIO</b></p>
                                </div>-->
                               <!-- <div class="slide single-testimonial" onclick="go('#plano4')">                                           
                                        <img src="../assets/images/icon-entidades-4.png" alt="">
                                        <p class="texto_carousel">PLANO PARA<br><b>FILIADOS A ENTIDADE</b></p>
                                </div>-->
                            </section>
                        </div>
                        <div class="col-2"></div> 
                    </div>
                    </div>
                </div>                 
            </div> 
            <div id="particles-1" class="particles"></div>
            <br>
        </div> 
    </header>
    <!--<div class="brand-area pt-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-logo d-flex align-items-center justify-content-center justify-content-md-between">
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <img src="assets/images/logo-unimed-natal.png" alt="brand">
                        </div> 
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.2s">
                            <img src="assets/images/logo-unimed-recife.png" alt="brand">
                        </div>
                        <div class="single-logo mt-30 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.4s">
                            <img src="assets/images/logo-hapvida.png" alt="brand">
                        </div> 
                    </div>
                </div>
            </div>   
        </div>
        <br>
    </div>-->
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>    
</body>
</html>
