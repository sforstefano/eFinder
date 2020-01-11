<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Evinder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../../images/evinder.png" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/aos.css">
    <link rel="stylesheet" href="../../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../../css/jquery.timepicker.css">
    <link rel="stylesheet" href="../../css/fancybox.min.css">
    
    <link rel="stylesheet" href="../fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <?php
    session_start();
    $url = $_SERVER['REQUEST_URI'];   // obetnim url
    $urlParts = explode ('/', $url); // la separem en parts per el /

    $lang = $urlParts[2];  
     
    $link = $urlParts[4]; 
    setcookie("lang", $lang, time() + (86400*30), "/"); // 86400 = 1 day
    //obtenir dades de la url i fiquem l'idioma a la cookie
    

    if(isset($_GET['id'])){
      $id = $_GET['id'];
    }else{
      $id = null;
    }
      

    if (isset($_GET['lloc'])) {
      $lloc = $_GET['lloc'];
    } else {
      $lloc = null;
    }

    if(isset($_GET['tipus'])){
      $tipus = $_GET['tipus'];
    }else{
      $tipus = null;
    }

    if(isset($_GET['preu'])){
      $preu = $_GET['preu'];
    }else{
      $preu = null;
    }
  
  ?>
  <body data-spy="scroll" data-target="#section-esdeveniment"  data-offset="200">

  <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="templateux-navbar">
    <div class="container">
      <a class="navbar-brand" href="../index.php"><img src="../../images/evinder.png" class="fotoevinder"></a>
      <div class="site-menu-toggle js-site-menu-toggle  ml-auto"  data-aos="fade" data-toggle="collapse" data-target="#templateux-navbar-nav" aria-controls="templateux-navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <!-- END menu-toggle -->

      <div class="collapse navbar-collapse" id="templateux-navbar-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="../index.php#section-home">Inici</a></li>
          <li class="nav-item"><a class="nav-link" href="../index.php#section-destacado">Destacat</a></li>
          <li class="nav-item"><a class="nav-link" href="../index.php#section-events">Tots</a></li>
          <li class="nav-item"><a class="nav-link" href="../index.php#section-testimoni">Sobre nosaltres</a></li>
          <li class="nav-item cta-btn ml-xl-2 ml-lg-2 ml-md-0 ml-sm-0 ml-0"><a class="nav-link" href="formusuari.php"><span class="pb_rounded-4 px-4 rounded">Registra't</span></a></li>
          <li class="nav-item"><a href=""><img src="../../images/ca.png" alt="ca" class="nav-link fotoidioma"></a></li>
          <li class="nav-item"><?php echo("<a href='../../en/pages/$link'>"); ?><img src="../../images/en.png" alt="en" class="nav-link fotoidioma"></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="site-hero overlay" style="background-image: url(../../images/hero_5.jpg)" data-stellar-background-ratio="0.5" id="section-home">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade-up">
          <h1 class="heading">La cultura en moviment</h1>
        </div>
      </div>
    </div>
  </section>

    <section class="section testimonial-section" id="section-esdeveniment" >
      <div class="container">
      <div class="container">
        <?php
          include_once("../../php/control.php");
          $c = new TControl();
          //creidem a la funció de cerca d'usuari amb els parámetres necessaris

          $url = $_SERVER['REQUEST_URI'];   // obetnim url
                    $urlParts = explode ('/', $url); // la separem en parts per el /
                    $lang = $urlParts[2] ; 

          $dades = $c->cercaUsuari($tipus, $lloc, $preu, $id, $lang);

          echo($dades);
              
        ?>

      </div>
    </section>

    <footer class="section footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5">
            <ul class="list-unstyled link">
              <li><a href="../index.php#section-home">Inici</a></li>
              <li><a href="../index.php#section-destacado">Destacat</a></li>
              <li><a href="../index.php#section-events">Tots</a></li>
              <li><a href="../index.php#section-testimoni">Sobre nosaltres</a></li>
            </ul>
          </div>
          <div class="col-md-4 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">LightCode</a></li>
              <li><a href="#">Termes i condicions</a></li>
              <li><a href="#">Política de Privacitat</a></li>
            </ul>
          </div>
          <div class="col-md-1 mb-5 pr-md-5 contact-info">
            <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li>
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Dirección:</span> <span> 221B Baker Street, <br> London</span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@lightcode.com</span></p> -->
          </div>
          <div class="col-md-3">
            <p>Registra't a la nostra websletter</p>
            <form action="pages/formusuari.php" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
            <br>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3"></span>Email:</span> <span> info@lightcode.com</span></p>
          </div>
        </div>
        <div class="row">
          <p class="col-md-8 text-left">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> LightCode All rights reserved
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
            
          <p class="col-md-4 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-vimeo"></span></a>
          </p>
        </div>
      </div>
    </footer>

  
    <!-- Modal -->
    <div class="modal fade " id="login-form" tabindex="-1" role="dialog" aria-labelledby="reservationFormTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                <form action="index.php"  method="post" class="bg-white p-4">
                  <div class="row mb-4"><div class="col-12"><h2>Accedeix</h2></div></div>                
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label class="text-black font-weight-bold" for="text">Nom d'usuari</label>
                      <input type="text" id="text" class="form-control ">
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="text-black font-weight-bold" for="password">Contrasenya</label>
                        <input type="password" id="password" class="form-control ">
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Entra" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                    </div>
                  </div>
                </form>
              </div>        
            </div>
          </div>   
        </div>
      </div>
    </div>
    
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/jquery.stellar.min.js"></script>
    <script src="../../js/jquery.fancybox.min.js"></script>
    <script src="../../js/jquery.easing.1.3.js"></script>
    
    
    
    <script src="../../js/aos.js"></script>
    
    <script src="../../js/bootstrap-datepicker.js"></script> 
    <script src="../../js/jquery.timepicker.min.js"></script> 

    <script src="../../js/main.js"></script>
  </body>
</html>