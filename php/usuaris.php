<?php

include_once("AccessDB.php");


class TUsuario{
    private $servidor = "localhost";
	private $usuari = "root";
	private $passw = "usbw";
    private $bd = "efinder";

    public function RegistrePromotor($cif_promotor, $nom_local, $adreca, $nom_usuari){
    //registrar promotor
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        
        if($adb->connectat()){
            if($this->checkNIF($cif_promotor)){
            //mirem si el NIF te la caracateritzacio correcta
                if(!$this->existe("cif_promotor", "usr_promotor", $cif_promotor)){
                //mirem si ja existeix
                    if(!$this->existe("adreca", "usr_promotor", $adreca)){
                        $id = $this->getID($nom_usuari);
                        //obtenim id del usuari e inserim el promotor
                        $instruccio = "insert into usr_promotor (id_usuari, validat, cif_promotor, adreca, nom_local, num_events_creats)
                        values ($id, 'n','$cif_promotor','$adreca','$nom_local',0)";
                        if($adb->executa_SQL($instruccio)){
                            $m = 0;
                        }else {
                            $m = -1;
                        }
                    }else{
                        $m = -8;
                    }
                }else{
                    $m = -7;
                }
            }else{
                $m = -6;
            }
        }else{
            $m = -1;
            
        }

        return $m;
    }

    public function RegistreUsuari($mail, $nom_usuari, $nom, $cognoms, $psswd, $psswd2){
    //registrar usuario
    $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);


        $m = 5;

        if($adb->connectat()){
        //es connecta base de dades
            
            if($psswd == $psswd2){
                
                if(!$this->existe("mail", "usuari", $mail)){
                //si no existe
                    date_default_timezone_set('Europe/Madrid');
                    $date = date('Y-m-d H:i:s');
                    //obtenemos fecha con zona horaria
                    if(!$this->existe("nom_usuari", "usuari", $nom_usuari)){
                    //si el user no existe ya
                        $instruccio = "insert into usuari (mail, nom_usuari, nom, cognoms, psswd, esPromotor, data_creacio)
                        values ('$mail','$nom_usuari','$nom','$cognoms','$psswd','n', '$date')";
                        if($adb->executa_SQL($instruccio)){
                            $m = 0;
                        }else {
                            $m = -5;
                        }
                    }else{
                    //usuario ya registrado
                        $m = -4;
                    }

                }else{
                //si es true, existe
                    $m = -3;
                }

            }else{
            //error contra
                $m = -2;
            }
            

        }else{
            $m = -1;
        }

        return $m;

    }

    public function mostraUser($id){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);


        if($adb->connectat()){
            //obtenim les dades de l'usuari que ens proporcionen
            $sql = "SELECT usuari.* , esdeveniment.* , usr_promotor.* 
            FROM usuari
            INNER JOIN esdeveniment ON usuari.id = esdeveniment.id_promotor
            INNER JOIN usr_promotor ON usuari.id = usr_promotor.id_usuari
            WHERE usuari.id = $id";
            $adb->consulta_multiple($sql);

            $usr = $adb->obtenir_fila();

            if (!$usr) {
                $res = "<h1>404 Not found</h1>";
            }

            //while ($usr) {

                $res = $res. "<div class='col-md-7'>
                <h2 class='heading' data-aos='fade-up'>".$usr['nom']." ".$usr['cognoms']."</h2>
                <p class='text-black' data-aos='fade' data-aos-delay='100'>".$usr['nom_usuari']."<img src='../../images/".$usr['validat'].".png' style='height: 22px; width: 15px' /></p>
              </div>
            </div>
            <div class='row'>
              <div class='js-carousel-2 owl-carousel mb-5' data-aos='fade-up' data-aos-delay='200'></div>
    
                <img src='' class='fotoevento'>
    
                <div class='col-md-5' data-aos-delay='200'>
                    <div class='row'>
                      <div class='col-md-10 ml-auto contact-info formularisblanc'>
                        <h3><span class='formularisgris'>".$usr['nom_local']."</span></h3>
                        <br>
                        <h3><span class='formularisgris'>".$usr['mail']."</span></h3>
                        <br>
                        <h3><span class='formularisgris'>".$usr['num_events_creats']."</span></h3>
                        <iframe src='".$usr['adreca']." 'width='300' height='250' frameborder='0' style='border:0' allowfullscreen></iframe>
                        <br>
                        <br>
                      </div>
                    </div>
                </div>
  
            </div><br/>";
            //$usr = $adb->obtenir_fila();
            //}
            $adb->tancar_consulta_multiple();

        }

        return $res;


    }

    public function getID($nom){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        $sql = "select id from usuari where nom_usuari = '$nom'";

        $id = $adb->consulta_dada($sql); 

        return $id;

    }

    public function updateUser($nom_usuari, $u){
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        //en cas de que el registre funcioni malament, eliminem l'usuari normal acabat d'afegir
        //si funciona l'actualitzem a s promotor

        if($u > -1){
            $sql = "update usuari set esPromotor = 's' where nom_usuari = '$nom_usuari'";
            

        }else{

            $sql = "delete from usuari where nom_usuari = '$nom_usuari'";
            
        }


    }

    public function existe($atributo, $taula, $valor){
        
        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);
        $existeix = false;
        //mirem si existeix l'usuari

        if($adb->connectat()){
            $sql = "select count(*) from $taula where $atributo = '$valor'";
            $quants = $adb->consulta_dada($sql); 
            echo($sql);
            if($quants > 0){
                $existeix = true;
            }
        }
 
        return $existeix;

    }

    public function LoginAdmin ($nom_usuari, $psswd, $psswd2)
	{		

        $adb = new TAccesDB($this->servidor, $this->usuari, $this->passw, $this->bd);

        if($adb->connectat()){
            $sql = "select esPromotor from usuari where nom_usuari = '$nom_usuari'";
            $espromotor = $adb->consulta_dada($sql); 
        }

        if($adb->connectat()){
            $sql = "select passwd from usuari where nom_usuari = '$contras'";
            $contras = $adb->consulta_dada($sql); 
        }

        if($this->existe("nom_usuari", "usuari", $nom_usuari))
        {
            if ($espromotor == 's')
            {	
                if($psswd == $contras && $psswd2 == $contras)
                {
                    $m=0;	
                }
                else
                {
                    $m = -2;
                }
            }
            else
            {
                $m=-9;
            }
        }

		return $m;
	}

    public function checkNIF($cif){
        $cif = strtoupper($cif);
          if (preg_match('~(^[XYZ\d]\d{7})([TRWAGMYFPDXBNJZSQVHLCKE]$)~', $cif, $parts)) {
            $control = 'TRWAGMYFPDXBNJZSQVHLCKE';
            $nie = array('X', 'Y', 'Z');
            $parts[1] = str_replace(array_values($nie), array_keys($nie), $parts[1]);
            $cheksum = substr($control, $parts[1] % 23, 1);
            return ($parts[2] == $cheksum);
          } elseif (preg_match('~(^[ABCDEFGHIJKLMUV])(\d{7})(\d$)~', $cif, $parts)) {
            $checksum = 0;
            foreach (str_split($parts[2]) as $pos => $val) {
              $checksum += array_sum(str_split($val * (2 - ($pos % 2))));
            }
            $checksum = ((10 - ($checksum % 10)) % 10);
            return ($parts[3] == $checksum);
          } elseif (preg_match('~(^[KLMNPQRSW])(\d{7})([JABCDEFGHI]$)~', $cif, $parts)) {
            $control = 'JABCDEFGHI';
            $checksum = 0;
            foreach (str_split($parts[2]) as $pos => $val) {
              $checksum += array_sum(str_split($val * (2 - ($pos % 2))));
            }
            $checksum = substr($control, ((10 - ($checksum % 10)) % 10), 1);
            return ($parts[3] == $checksum);
          }
          return false;
      }

}
?>