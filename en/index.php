  <!DOCTYPE HTML>
  <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Evinder</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="icon" type="image/png" href="../images/evinder.png" />
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/animate.css">
      <link rel="stylesheet" href="../css/owl.carousel.min.css">
      <link rel="stylesheet" href="../css/aos.css">
      <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="../css/jquery.timepicker.css">
      <link rel="stylesheet" href="../css/fancybox.min.css">
      
      <link rel="stylesheet" href="../fonts/ionicons/css/ionicons.min.css">
      <link rel="stylesheet" href="../fonts/fontawesome/css/font-awesome.min.css">

      <!-- Theme Style -->
      <link rel="stylesheet" href="../css/style.css">
    </head>
    <?php
      
      $url = $_SERVER['REQUEST_URI'];   // obetnim url
      $urlParts = explode ('/', $url); // la separem en parts per el /
    
      $lang = $urlParts[2] ;  
      setcookie("lang", $lang, time() + (86400*30), "/"); // 86400 = 1 day
    ?>
    <body data-spy="scroll" data-target="#templateux-navbar" data-offset="200">

    <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="templateux-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="../images/evinder.png" class="fotoevinder"></a>
        <div class="site-menu-toggle js-site-menu-toggle  ml-auto"  data-aos="fade" data-toggle="collapse" data-target="#templateux-navbar-nav" aria-controls="templateux-navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

        <div class="collapse navbar-collapse" id="templateux-navbar-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="#section-home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-destacado">Relevant</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-events">All events</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-testimoni">About us</a></li>
            <li class="nav-item cta-btn ml-xl-2 ml-lg-2 ml-md-0 ml-sm-0 ml-0"><a class="nav-link" href="pages/formusuari.php"><span class="pb_rounded-4 px-4 rounded">Register</span></a></li>
            <li class="nav-item"><a href="../ca/index.php"><img src="../images/ca.png" alt="ca" class="nav-link fotoidioma"></a></li>
            <li class="nav-item"><a href="index.php"><img src="../images/en.png" alt="en" class="nav-link fotoidioma"></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

      <section class="site-hero overlay" style="background-image: url(../images/hero_5.jpg)" data-stellar-background-ratio="0.5" id="section-home">
        <div class="container">
          <div class="row site-hero-inner justify-content-center align-items-center">
            <div class="col-md-10 text-center" data-aos="fade-up">
              <h1 class="heading">Culture in movement</h1>
            </div>
          </div>
        </div>
      </section>
      <!-- END section -->

      <section class="section bg-light pb-0"  >
        <div class="container">
         
          <div class="row check-availabilty" id="next">
            <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

              <form action="../php/vista.php" method="post">
                <div class="row">
                  <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                    <label for="checkin_date" class="font-weight-bold text-black">Location</label>
                    <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name='lloc' id='adults' class='form-control'>
                      <?php
                        include_once("../php/control.php");
                        $c = new TControl();
                        $dades = "";
                        $dades = $c->llistaLlocs();

                        echo($dades);
                      
                      ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                    <label for="checkout_date" class="font-weight-bold text-black">Event</label>
                    <div class="field-icon-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="tipus" id="adults" class="form-control">
                      <?php
                          include_once("../php/control.php");
                          $c = new TControl();
                          $dades = "";
                          $url = $_SERVER['REQUEST_URI'];   // obetnim url
                          $urlParts = explode ('/', $url); // la separem en parts per el /
                          $lang = $urlParts[2] ;  
                          $dades = $c->llistaTipus($lang);

                          echo($dades);
                      
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                    <div class="row">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label for="children" class="font-weight-bold text-black">Price</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="preu" id="children" class="form-control">
                            <option vlaue=""></option>
                            <option value="0">0</option>
                            <option value="<10">-10</option>
                            <option value="<20">-20</option>
                            <option value="<50">-50</option>
                            <option value="<100">-100</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-lg-3 align-self-end">
                    <input type="submit" name="opcio" value ="Search" class="btn btn-primary btn-block text-white" />
                  </div>
                </div>
              </form>
            </div>


          </div>
        </div>
      </section>

      <section class="py-5 bg-light" id="section-about">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
              <img src="../images/hero_4.jpg" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
              <h2 class="heading mb-4">Welcome!</h2>
              <h2 class="text-black font-weight-bold">¿Wanna post your event? <br> ¡Register now!</h2>
              <a href="pages/formpromotor.php" class="btn btn-outline-secondary py-3 text-black px-5">Join</a>
            </div>
          </div>
        </div>
      </section>
    <!-- END .block-2 -->
      <section class="section" id="section-rooms">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
              <h2 class="heading" data-aos="fade-up">Latest events</h2>
            </div>
          </div>
          <div class="row">
            <?php
                include_once("../php/control.php");
                $c = new TControl();
                $dades = "";
                $dada = $c->obtenirDades();
                
                echo($dada);

            ?>

          </div>
        </div>
      </section>

      
      <section class="section bg-image overlay" style="background-image: url('../images/hero_3.jpg');" id="section-destacado">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
              <h2 class="heading text-white" data-aos="fade">Relevant</h2>
              <p class="text-white" data-aos="fade" data-aos-delay="100">The list of the most important events of the month. Concerts, film projections, exhibitions...</p>
            </div>
          </div>
          <div class="food-menu-tabs" data-aos="fade">
            <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active letter-spacing-2" id="mains-tab" data-toggle="tab" href="#mains" role="tab" aria-controls="mains" aria-selected="true">Concerts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link letter-spacing-2" id="desserts-tab" data-toggle="tab" href="#desserts" role="tab" aria-controls="desserts" aria-selected="false">Film Projections</a>
              </li>
              <li class="nav-item">
                <a class="nav-link letter-spacing-2" id="drinks-tab" data-toggle="tab" href="#drinks" role="tab" aria-controls="drinks" aria-selected="false">Exhibitions</a>
              </li>
            </ul>
            <div class="tab-content py-5" id="myTabContent">
              
              
              <div class="tab-pane fade show active text-left" id="mains" role="tabpanel" aria-labelledby="mains-tab">
                <div class="row">
                <?php
                    include_once("../php/control.php");
                    $c = new TControl();

                    $url = $_SERVER['REQUEST_URI'];   // obetnim url
                    $urlParts = explode ('/', $url); // la separem en parts per el /
                    $lang = $urlParts[2] ; 
      
                    $dada = $c->esdEsp(1, $lang);
                  
                    echo($dada);
                  ?>
                  
                </div>
                

              </div> <!-- .tab-pane -->

              <div class="tab-pane fade text-left" id="desserts" role="tabpanel" aria-labelledby="desserts-tab">
              <?php
                    include_once("../php/control.php");
                    $c = new TControl();

                    $url = $_SERVER['REQUEST_URI'];   // obetnim url
                    $urlParts = explode ('/', $url); // la separem en parts per el /
                    $lang = $urlParts[2] ; 
      
                    $dada = $c->esdEsp(2, $lang);
                  
                    echo($dada);
                  ?>
              </div> <!-- .tab-pane -->

              <div class="tab-pane fade text-left" id="drinks" role="tabpanel" aria-labelledby="drinks-tab">
                <?php
                    include_once("../php/control.php");
                    $c = new TControl();
                    $url = $_SERVER['REQUEST_URI'];   // obetnim url
                    $urlParts = explode ('/', $url); // la separem en parts per el /
                    $lang = $urlParts[2] ; 
      
                    $dada = $c->esdEsp(3, $lang);
                  
                    echo($dada);
                  ?>
              </div> <!-- .tab-pane -->
            </div>
          </div>
        </div>
      </section>
      
      <!-- END section -->
      
      <section class="section blog-post-entry bg-light" id="section-events">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
              <h2 class="heading" data-aos="fade-up">All events</h2>
            </div>
          </div>
          <div class="row row_eventos">
            
            <div class="row row_eventos">
            
            <?php
              include_once("../php/control.php");
              $c = new TControl();

              $url = $_SERVER['REQUEST_URI'];   // obetnim url
              $urlParts = explode ('/', $url); // la separem en parts per el /
              $lang = $urlParts[2] ; 

              $dada = $c->totsEsdeveniments($lang);
            
              echo($dada);

            ?>

        </div>
      </section>

      <section class="section testimonial-section" id="section-testimoni">
        <div class="container">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
              <h2 class="heading" data-aos="fade-up">About us</h2>
            </div>
          </div>
          <div class="row">
            <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">

              <div class="testimonial text-center slider-item">
                <div class="author-image mb-3">
                  <img src="../images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
                </div>
                <blockquote>
                  <p>&ldquo;LightCode has allowed me not only to show me as an artist, but also to discover new experiences that, without their help, I would probably never lived.&rdquo;</p>
                </blockquote>
                <p><em>&mdash; Aleix Bernadó, bohemian artist</em></p>
              </div>

              <div class="testimonial text-center slider-item">
                <div class="author-image mb-3">
                  <img src="../images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
                </div>
                <blockquote>

                  <p>&ldquo;LightCode has made more visible what a lot of small villages offer.&rdquo;</p>
                </blockquote>
                <p><em>&mdash; Juan Gomez, culture councilor</em></p>
              </div>


              <div class="testimonial text-center slider-item">
                <div class="author-image mb-3">
                  <img src="../images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
                </div>
                <blockquote>

                  <p>&ldquo;Thanks to LightCode, we can reach to more audience that will really enjoy our work.&rdquo;</p>
                </blockquote>
                <p><em>&mdash; Jean Smith</em></p>
              </div>

            </div>
              <!-- END slider -->
          </div>

        </div>
      </section>

      <footer class="section footer-section">
        <div class="container">
          <div class="row">
            <div class="col-md-4 mb-5">
              <ul class="list-unstyled link">
                <li><a href="#section-home">Home</a></li>
                <li><a href="#section-destacado">Relevant</a></li>
                <li><a href="#section-events">All events</a></li>
                <li><a href="#section-testimoni">About us</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-5">
              <ul class="list-unstyled link">
                <li><a href="#">LightCode</a></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
                <li><a href="../php/fitxerdetext.php">Create TXT file</a></li>
                <li><a href="pages/crearevent.php">Create an event with XML</a></li>
              </ul>
            </div>
            <div class="col-md-1 mb-5 pr-md-5 contact-info">
              <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li>
              <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Dirección:</span> <span> 221B Baker Street, <br> London</span></p>
              <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> info@lightcode.com</span></p> -->
            </div>
            <div class="col-md-3">
              <p>Register to our newsletter</p>
              <form action="pages/formusuari.html" class="footer-newsletter">
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
                  <form action="index.html"  method="post" class="bg-white p-4">
                    <div class="row mb-4"><div class="col-12"><h2>Login</h2></div></div>                
                    <div class="row">
                      <div class="col-md-12 form-group">
                        <label class="text-black font-weight-bold" for="text">Username</label>
                        <input type="text" id="text" class="form-control ">
                      </div>
                      <div class="col-md-12 form-group">
                          <label class="text-black font-weight-bold" for="password">Password</label>
                          <input type="password" id="password" class="form-control ">
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <input type="submit" value="Join" class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                      </div>
                    </div>
                  </form>
                </div>        
              </div>
            </div>   
          </div>
        </div>
      </div>
      
      <script src="../js/jquery-3.3.1.min.js"></script>
      <script src="../js/jquery-migrate-3.0.1.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/owl.carousel.min.js"></script>
      <script src="../js/jquery.stellar.min.js"></script>
      <script src="../js/jquery.fancybox.min.js"></script>
      <script src="../js/jquery.easing.1.3.js"></script>
      
      
      
      <script src="../js/aos.js"></script>
      
      <script src="../js/bootstrap-datepicker.js"></script> 
      <script src="../js/jquery.timepicker.min.js"></script> 

      <script src="../js/main.js"></script>
    </body>
  </html>