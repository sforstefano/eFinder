<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="../../images/evinder.png" />
    <title>Evinder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/aos.css">
    <link rel="stylesheet" href="../../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../css/jquery.timepicker.css">
    <link rel="stylesheet" href="../../css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <?php
    session_start();
    $url = $_SERVER['REQUEST_URI'];   // obetnim url
    $urlParts = explode ('/', $url); // la separem en parts per el /

    $lang = $urlParts[2];  
    $lang = $urlParts[2] ;  
    setcookie("lang", $lang, time() + (86400*30), "/"); // 86400 = 1 day

    if (isset($_GET['nom_usuari'])) {
      $nom_usuari = $_GET['nom_usuari'];
    }else{
      $nom_usuari = "";
    }

    if (isset($_GET['titol'])) {
      $titol = $_GET['titol'];
    } else {
      $titol = "";
    }
    
  ?>
  <body data-spy="scroll" data-target="#templateux-navbar" data-offset="200">
    <section class="site-hero overlay" style="background-image: url(../../images/formadmin.jpg)" data-stellar-background-ratio="0.5" id="section-home">
    <section class="section contact-section" id="section-contact">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
              <div class="col-md-7">
                <h2 class="heading formularisblanc">Entra com a administrador</h2>
                <p class="formularisgris" name="titulo" style="background-color:red;"><?php echo($titol)?></p>
              </div>
            </div>
          <div class="row">
            <div class="col-md-7" data-aos-delay="100">
              
                <form method="post" action="../../php/vista.php" class="bg-formpanel p-md-5 p-4 mb-5 border">
                    <div class="row formularisnegre">
                        <div class="col-md-6 form-group">
                        <label for="user">Nom d'usuari</label>
                        <input type="text" name="nom_usuari" id="user" required value="<?php echo($nom_usuari)?>" class="form-control ">
                        </div>  
                        <div class="col-md-6 form-group">
                        </div>
                        <div class="col-md-6 form-group">
                        <label for="pasw">Contrasenya</label>
                        <input type="password" name="psswd" id="pasw" required class="form-control ">
                        </div>
                        <div class="col-md-6 form-group">
                        <label for="pasw">Repetir contrasenya</label>
                        <input type="password" name="paswd2" id="pasw" required class="form-control ">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 form-group">
                        <input type="submit" name="opcio" value="Crear">
                        <input type="hidden" name="arxiu" value="dades.xml" />
						            <input type="hidden" name="opcio" value="importar_xml" />
                        <!-- <input type="button" value="Enviar" class="btn btn-primary text-white font-weight-bold"> -->
                        <div class="submitting"></div>
                        </div>
                    </div>
                        
                </form>
    
            </div>
            <div class="col-md-5" data-aos-delay="200">
              <div class="row">
                <div class="col-md-10 ml-auto contact-info">
                  <p><span class="d-block formularisgris">Adreça:</span> <span class="formularisblanc"> ILERNA </span></p>
                  <p><span class="d-block formularisgris">Telèfon:</span> <span class="formularisblanc"> 666 666 666</span></p>
                  <p><span class="d-block formularisgris">Correu:</span> <span class="formularisblanc">info@lightcode.com</span></p>
                </div>
              </div>
            </div>
          </div>
    </div>
  </section>
</body>
</html>   





<!-- <html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
</head>
<body>

	<br>
	<h2>Prem el botó per a importar l'arxiu dades.xml:</h2>
	<br>
	<form action="../../php/vista.php" method = "post">	
		
		<input type="hidden" name="arxiu" value="dades.xml" />
		 <br>
		 <input type="hidden" name="opcio" value="importar_xml" />
		<a href="../index.php" class="button">
 		<input class="button" type="submit" value="Importar"/>
		 </a>
	</form>



</body>
</html> -->