<?php

include_once("AccessDB.php");
//include_once("../ca/pages/events.php");



class TEsdeveniment{
    private $servidor = "localhost";
	private $usuari = "root";
	private $passw = "usbw";
    private $bd = "DAW2_LIIGHTCODE";

    public function obtenirDades(){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        

        if($adb->connectat()){

            $sql = "select id_esdeveniment, nom_esdeveniment, imtge_p from esdeveniment order by id_esdeveniment DESC limit 3";
            $adb->consulta_multiple($sql);

            $res = "";

            $esd = $adb->obtenir_fila();
            //obtenim esd lliures de la DB
            while ($esd){ 
                
                $res = $res."<div class='col-md-6 col-lg-4 ultimos_eventos' data-aos='fade-up'>";
                $res = $res."<a href='pages/events.php?id=".$esd['id_esdeveniment']."' value='".$esd['id_esdeveniment']."' class='room'>";
                $res = $res."<figure class='img-wrap ultimos_eventos_imagen'>";
                $res = $res."<img src='".$esd['imtge_p']."' name='imatge' alt='Free website template' class='img-fluid mb-3'>";
                $res = $res."</figure>";
                $res = $res."<div class='p-3 text-center room-info'>";
                $res = $res."<h2>".$esd['nom_esdeveniment']."</h2>";
                $res = $res."</div></a></div>";

                $esd = $adb->obtenir_fila();
            }

            $adb->tancar_consulta_multiple();
        }else{
            $res = "<div style='background-color:red'>Error BD</div>";
        }

        return $res;
    }

    public function mostrarEventsUsuari($id){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        

        if($adb->connectat()){

            $sql = "select id_esdeveniment, nom_esdeveniment, imtge_p from esdeveniment where esdeveniment.id_promotor = $id order by id_esdeveniment DESC";
            $adb->consulta_multiple($sql);

            $res = "";

            $esd = $adb->obtenir_fila();
            //obtenim esd lliures de la DB

            if (!$esd) {
                $res = "";
            }

            while ($esd){ 
                
                $res = $res."<div class='col-md-6 col-lg-4 ultimos_eventos' data-aos='fade-up'>";
                $res = $res."<a href='events.php?id=".$esd['id_esdeveniment']."' value='".$esd['id_esdeveniment']."' class='room'>";
                $res = $res."<figure class='img-wrap ultimos_eventos_imagen'>";
                $res = $res."<img src='../".$esd['imtge_p']."' name='imatge' alt='Free website template' class='img-fluid mb-3'>";
                $res = $res."</figure>";
                $res = $res."<div class='p-3 text-center room-info'>";
                $res = $res."<h2>".$esd['nom_esdeveniment']."</h2>";
                $res = $res."</div></a></div>";

                $esd = $adb->obtenir_fila();
            }

            $adb->tancar_consulta_multiple();
        }else{
            $res = "<div style='background-color:red'>Error BD</div>";
        }

        return $res;

    }

    public function getDate($id, $lang){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        $res = "";
        if($adb->connectat()){

            $sql = "select data_m, data_me from esdeveniment where id_esdeveniment = $id";
            $adb->consulta_multiple($sql);

            $desc = $adb->obtenir_fila($sql);

            switch ($lang) {
                case 'en':
                    $res = $desc['data_me'];
                    break;
                
                case 'ca':
                    $res = $desc['data_m'];
                    break;
            }
            $adb->tancar_consulta_multiple();

        }
        return $res;
    }

    public function getDescripcio($id, $lang){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        $res = "";
        if($adb->connectat()){

            $sql = "select descripcio, descripcio_e from esdeveniment where id_esdeveniment = $id";
            $adb->consulta_multiple($sql);

            $desc = $adb->obtenir_fila($sql);

            switch ($lang) {
                case 'en':
                    $res = $desc['descripcio_e'];
                    break;
                
                case 'ca':
                    $res = $desc['descripcio'];
                    break;
            }
            $adb->tancar_consulta_multiple();

        }
        return $res;

    }

    public function llistaLlocs(){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);

        if ($adb->connectat()) {
            
            $sql = "select DISTINCT lloc
            FROM esdeveniment";

            $adb->consulta_multiple($sql);

            $res = "<option ></option>";

            $esd = $adb->obtenir_fila();

            while ($esd) {
                $res = $res."<option value='".$esd['lloc']."'>".$esd['lloc']."</option>";

                $esd = $adb->obtenir_fila();

            }
            $adb->tancar_consulta_multiple();

        }else{
            $res = "<div style='background-color:red'>Error BD</div>";
        }

        return $res;

    }

    public function llistaTipus($lang){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);

        

        if ($adb->connectat()) {
            
            $sql = "select DISTINCT tipus
            FROM esdeveniment";

            $adb->consulta_multiple($sql);

            $res = "<option ></option>";

            $esd = $adb->obtenir_fila();

            $lang2 = $_COOKIE['lang'];

            while ($esd) {
                $tipus = $this->nomTipus($esd['tipus'], $lang2);

                $res = $res."<option value='".$esd['tipus']."'>".$tipus."</option>";

                $esd = $adb->obtenir_fila();

            }
            $adb->tancar_consulta_multiple();

        }else{
            $res = "<div style='background-color:red'>Error BD</div>";
        }

        return $res;

    }

    public function cercaUsuari($tipus, $lloc, $preu, $id, $idioma){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        //crear consulta SQL a partir del parámetres de la url proporcionats per el usuari

        if($adb->connectat()){
            

            $sql = "select esdeveniment.*, usuari.*, usr_promotor.* from esdeveniment inner join usuari on 
            usuari.id = esdeveniment.id_promotor inner join usr_promotor on usr_promotor.id_usuari = usuari.id where 1 and usuari.id=esdeveniment.id_promotor ";


            if($tipus!=""){
                $sql = $sql."and tipus = $tipus ";
            }

            if( $lloc != ""){
                $sql = $sql."and lloc = '$lloc' ";
            }

            if($preu !=""){
                $sql = $sql."and preu $preu ";
            }

            if($id !=""){
                $sql = $sql."and id_esdeveniment = $id ";
            }
            //si existeix alguna d'aquestes, afegeix-la a la consulta

            echo '<script>console.log("Your '.$sql.' stuff here")</script>';
            

            $adb->consulta_multiple($sql);

            $res = "";

            $esd = $adb->obtenir_fila();

           

            while($esd){
                $data = $this->getDate($esd['id_esdeveniment'], $idioma);
                $descripcio = $this->getDescripcio($esd['id_esdeveniment'], $idioma);
                //obteim la descripció i la data a mostrar segons l'idioma

                $res = $res."<div class='row justify-content-center text-center mb-5'>
                <div class='col-md-7'>
                  <h2 class='heading' data-aos='fade-up'>".$esd['nom_esdeveniment']."</h2>
                  <p class='text-black' data-aos='fade' data-aos-delay='100'>".$descripcio."</p>
                  <p class='text-black' data-aos='fade' data-aos-delay='100'><a href='usuari.php?id=".$esd['id_promotor']."'>".$esd['nom_usuari']."</a><img src='../../images/".$esd['validat'].".png' style='height: 22px; width: 15px' /></p>
                </div>
              </div>
              <div class='row'>
                <div class='js-carousel-2 owl-carousel mb-5' data-aos='fade-up' data-aos-delay='200'></div>
      
                  <img src='../".$esd['imatge_s']."' class='fotoevento'>
      
                  <div class='col-md-5' data-aos-delay='200'>
                      <div class='row'>
                        <div class='col-md-10 ml-auto contact-info formularisblanc'>
                          <h3><span class='formularisgris'>".$data."</span></h3>
                          <br>
                          <h3><span class='formularisgris'>".$esd['lloc']."</span></h3>
                        <iframe src='".$esd['localitzacioGoogle']." width='300' height='250' frameborder='0' style='border:0' allowfullscreen></iframe>
                            <br>
                          <br>
                          <h3><span class='formularisgris'><a href=".$esd['entrada']."> ".$esd['preu']." €  Tickets </a></span></h3>
                        </div>
                      </div>
                  </div>
    
              </div><br/><br/><br/><br/>";

              $esd = $adb->obtenir_fila();
            }
            $adb->tancar_consulta_multiple();

        }

        return $res;


    }

    public function nomTipus($valor, $idioma){
    //depenent del idioma, obtenir el tipus d'esdeveniemnt
       
        switch ($idioma) {
            case 'ca':
                switch ($valor) {
                    case 1:
                        $palabra = "Concert";
                        break;
                    
                    case 2:
                        $palabra = "Projecció";
                        break;

                    case 3:
                        $palabra = "Exhibició";
                        break;
                    
                    case 4:
                        $palabra = "Esportiu";
                        break;

                    case 5:
                        $palabra = "Exposició";
                        break;
                    case 6:
                        $palabra = "Moda";
                    break;

                    case 7:
                        $palabra = "Negocis";
                    break;
                }

                break;
            
            case 'en':
                switch ($valor) {
                    case 1:
                        $palabra = "Concert";
                        break;
                
                    case 2:
                        $palabra = "Proyection";
                        break;

                    case 3:
                        $palabra = "Exibition"; 
                        break;
                
                    case 4:
                        $palabra = "Sport";
                        break;

                    case 5:
                        $palabra = "Exposition";
                        break;

                    case 6:
                        $palabra = "Fashion";
                    break;

                    case 7:
                        $palabra = "Business";
                    break;
                }
                break;
        }

        return $palabra;
    }

    public function esdEsp($tipus, $idioma){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        //mostrar esdeveniemnts que coincideixin amb un tipus determinat
       

        if($adb->connectat()){
            $sql = "select * from esdeveniment where tipus = $tipus order by id_esdeveniment DESC limit 3";
            $adb->consulta_multiple($sql);

            $res = "";

            $esd = $adb->obtenir_fila();

            while ($esd) {
                $data = $this->getDate($esd['id_esdeveniment'], $idioma);
                $descripcio = $this->getDescripcio($esd['id_esdeveniment'], $idioma);

                $res = $res."<div class='col-md-9'>
                <div class='food-menu mb-5'>
                  <span class='d-block text-primary h4 mb-3'>".$esd['nom_esdeveniment']."</span>
                  <h3 class='text-white'><a target='_blank' href='".$esd['entrada']."' class='text-white'>".$descripcio."</a></h3>
                  <p class='text-white text-opacity-7'>".$data.", ".$esd['lloc']."</p>
                </div>
              </div>";

              $esd = $adb->obtenir_fila();

            }
            $adb->tancar_consulta_multiple();
        } else {
            $res = "<div style='background-color:red'>Error BD</div>";
        }

        return $res;


    }

    public function totsEsdeveniments($idioma){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        //mostrar tots els esdeveniemnts

        if ($adb->connectat()) {
            $sql = "select * from esdeveniment order by id_esdeveniment DESC";

            $adb->consulta_multiple($sql);

            $res = "";
            $e = 0;

            $esd = $adb->obtenir_fila();

            

            while($esd){

                $data = $this->getDate($esd['id_esdeveniment'], $idioma);
                

                $res = $res. "<div class='col-md-6 col-lg-4 padevent' data-aos='fade-up'>
                    <div class='flip-card'>
                        <div class='flip-card-inner'>
                            <div class='flip-card-front'>
                            <img src=".$esd['imtge_p']." alt='Avatar' class='poster_frontal'>
                            </div>
                            <div class='flip-card-back'>
                                <div class='card'>";
                                $res= $res."<a href='pages/events.php?id=".$esd['id_esdeveniment']."' value='".$esd['id_esdeveniment']."' class='room'><img src=".$esd['imatge_s']." class='poster_atras' style='width:100%'></a>";
                                    $res = $res."<h1>".$esd['nom_esdeveniment']."</h1>
                                    <p class='title'><img src='../images/calendar.png' class='iconos' />".$data."</p>
                                    <p class='title'><img src='../images/loca.png' class=iconos' />".$esd['lloc']."</p>
                                    <p class='title'><img src='../images/precio.png' class='iconos' />".$esd['preu']." €</p>
                                    <p class='title'></p>
                                    <p class='title'></p>
                                    <p><a target='_blank' href='".$esd['entrada']."'><button>Entrades</button></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
                $e++;
                $esd = $adb->obtenir_fila();

                if($e == 3){
                    $res = $res."<div style='height: 50px;'></div>";
                    $e = 0;
                }
                
            }

            $adb->tancar_consulta_multiple();
        } else {
            $res = "<div style='background-color:red'>Error BD</div>";
        }

        return $res;
        
    }

    public function esdevenimentsTXT(){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);

        if ($adb->connectat()) {
            $sql = "select * from esdeveniment order by id_esdeveniment DESC";

            $adb->consulta_multiple($sql);

            $res = "";

            $esd = $adb->obtenir_fila();

            while($esd){
                $res = $res. "Nom de l'esdeveniment: ".$esd['nom_esdeveniment']."
                \r\nData: ".$esd['data_m']."
                \r\nLloc: ".$esd['lloc']."
                \r\nPreu: ".$esd['preu']." €
                \r\n";

                $esd = $adb->obtenir_fila();
            }

            $adb->tancar_consulta_multiple();
        } else {
            $res = "<div style='background-color:red'>Error BD</div>";
        }

        return $res;
        
    }

    public function importar_xml($arxiu)
        {
            $res = 0;
            $xml = simplexml_load_file($arxiu);
            if (isset($xml))
            {
                $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
                
                if ($adb->connectat()){
                    $instruccio = "start transaction";
                    $adb->executa_SQL($instruccio);
                    
                    foreach ($xml->esdeveniment as $esdeveniment)
                    {
                        $id_promotor = $esdeveniment->id_promotor;
                        $tipus = $esdeveniment->tipus;
                        $nom_esdeveniment = $esdeveniment->nom_esdeveniment;
                        $preu = $esdeveniment->preu;
                        $entrada = $esdeveniment->entrada;
                        $localitzacioGoogle = $esdeveniment->localitzacioGoogle;
                        $lloc = $esdeveniment->lloc;
                        $data_inici = $esdeveniment->data_inici;
                        $data_fi = $esdeveniment->data_fi;
                        $data_m = $esdeveniment->data_m;
                        $descripcio = $esdeveniment->descripcio;
                        $imtge_p = $esdeveniment->imtge_p;
                        $imatge_s = $esdeveniment->imatge_s;
                        $descripcio_e = $esdeveniment->descripcio_e;
                        $data_me = $esdeveniment->data_me;

                        $instruccio = "insert into esdeveniment (id_promotor, tipus, nom_esdeveniment, preu, entrada, localitzacioGoogle, lloc, data_inici, data_fi, data_m, descripcio, imtge_p, imatge_s, descripcio_e, data_me) 
                        VALUES ($id_promotor, $tipus, $nom_esdeveniment, $preu, $entrada, $localitzacioGoogle, $lloc, $data_inici, $data_fi, $data_m, $descripcio, $imtge_p, $imatge_s, $descripcio_e, $data_me)";

                            
                        $adb->executa_SQL($instruccio);
                        
                    }
                    $adb->executa_SQL("commit");
                }
                else
                {
                    $res = -3;
                }
            }
            else
            {
                $res = -6;
            }		
            return ($res);
        }

}





?>