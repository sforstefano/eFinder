<?php
session_start();
include_once("control.php");


$opcio = $_POST["opcio"];
$c = new TControl();

$_SESSION["nom_usuari"] = $_POST["nom_usuari"];
$_SESSION["nom"] = $_POST["nom"];
$_SESSION["cognoms"] = $_POST["cognoms"];
$_SESSION["mail"] = $_POST["mail"];







switch ($opcio) {
    case 'Registre':
        $nom_usuari = $_POST["nom_usuari"];
        $nom = $_POST["nom"];
        $cognoms = $_POST["cognoms"];
        $psswd = $_POST["psswd"];
        $paswd2 = $_POST["paswd2"];
        $cif_promotor = $_POST["cif_promotor"];
        $nom_local = $_POST["nom_local"];
        $adreca = $_POST["adreca"];
        $mail = $_POST["mail"];


        
        $m = $c->RegistrePromotor($nom_usuari, $nom, $cognoms, $psswd, $paswd2, $cif_promotor, $nom_local, $adreca, $mail);
        
        
        mostrarMissatges($m, "formpromotor");

        break;

    case 'Entra':
        $user = $_POST["nom_usuari"];
        $nom = $_POST["nom"];
        $cognoms = $_POST["cognoms"];
        $psswd = $_POST["psswd"];
        $psswd2 = $_POST["paswd2"];
        $mail = $_POST["mail"];
        
        $m = $c->RegistreUsuari($mail, $user, $nom, $cognoms, $psswd, $psswd2);

        mostrarMissatges($m, "formusuari");
        break;

    case 'Crear':
        $user = $_POST["nom_usuari"];
        $psswd = $_POST["psswd"];
        $psswd2 = $_POST["paswd2"];

        
        $m = $c->LoginAdmin($user, $psswd, $psswd2);

        mostrarMissatges($m, "crearevent");
    break;
    
    case 'Search';
        $sql = "?";

        if(isset($_POST['tipus'])){
            $tipus = $_POST['tipus'];
            $sql = $sql."&tipus=$tipus";

            
        }
        if(isset($_POST['lloc'])){
            $lloc = $_POST['lloc'];
            $sql = $sql."&lloc=$lloc";
        }

        if(isset($_POST['preu'])){
            $preu = $_POST['preu'];
            $sql = $sql."&preu=$preu";
        }

        mostrarMissatges(2, $sql);



        break;

        case "importar_xml";
				$arxiu = $_POST["arxiu"];

					if (isset($arxiu) && $arxiu <> '')
					{
						$res = $c->importar_xml($arxiu);
						if($res == 0)
						{
							mostrarMissatges('Arxiu importat correctament', "crearevent");
						}
						else
						{
							mostrarMissatges($res, "crearevent");
						}
					}
					else
					{
                        mostrarMissatges(-5, "crearevent");
                    }
			break;	  

    
    default:
        # code...
        break;
}

function mostrarMissatges($m, $page){
    $nom_usuari = $_SESSION["nom_usuari"];
    $nom = $_SESSION["nom"];
    $cognoms = $_SESSION["cognoms"];
    $mail = $_SESSION["mail"];
    $idioma = $_COOKIE['lang'];
    //


    $titol = obtenirMissatge($m, $idioma);
    

    switch ($m) {

        case 2:
            header("Location: ../$idioma/pages/events.php$page");
            break;

        case 0:
            header("Location: ../$idioma/index.php");
            break;
        
        case -1:
            
            header("Location: ../$idioma/pages/$page.php?nom_usuari=$nom_usuari&nom=$nom&cognoms=$cognoms&titol=$titol");
            break;

        case -2:
        //contraseña
            
            header("Location: ../$idioma/pages/$page.php?nom_usuari=$nom_usuari&nom=$nom&cognoms=$cognoms&mail=$mail&titol=$titol");
            
            break;

        case -3:

            header("Location: ../$idioma/pages/$page.php?nom_usuari=$nom_usuari&nom=$nom&cognoms=$cognoms&titol=$titol");
        
            break;
        
        case -4:

            header("Location: ../$idioma/pages/$page.php?nom=$nom&cognoms=$cognoms&mail=$mail&titol=$titol");
        
            break;
        
        case -6:

            header("Location: ../$idioma/pages/$page.php?nom_usuari=$nom_usuari&nom=$nom&cognoms=$cognoms&mail=$mail&titol=$titol");
        
            break;

        case -7:
   
            header("Location: ../$idioma/pages/$page.php?nom_usuari=$nom_usuari&nom=$nom&cognoms=$cognoms&mail=$mail&titol=$titol");
        
            break;
        
        case -8:

            header("Location: ../$idioma/pages/$page.php?nom_usuari=$nom_usuari&nom=$nom&cognoms=$cognoms&mail=$mail&titol=$titol");
        
            break;

        case -9:

        header("Location: ../$idioma/pages/$page.php?nom_usuari=$nom_usuari&nom=$nom&cognoms=$cognoms&mail=$mail&titol=$titol");
    
        break;

        default:
            echo("Location: ../$idioma/pages/$page.php");
            # code...
            break;
    }

}

function obtenirMissatge($m, $idioma){
    switch ($idioma) {
        case 'ca':
            switch ($m) {
                case -1:
                    $titol = "Problemes amb la BDs, intanta-ho mes tard";
                    break;
                
                case -2:
                    $titol = "Contrassenya incorrecta";
                    break;
                
                case -3:
                    $titol = "Correu ja en ús";
                    break;
                    
                case -4:
                    $titol = "Nom d'usuari ja en ús";
                    break;
                    
                case -6:
                    $titol = "CIF incorrecte";
                    break;
                    
                case -7:
                    $titol = "CIF ja en ús";
                    break;
                    
                case -8:
                    $titol = "Adreça no válida";
                    break;
                case -9:
                $titol = "No és administrador";
                break;
                
            }
            break;
        
        case 'en':
            switch ($m) {
                case -1:
                    $titol = "Problems with the DataBase. Try again later";
                    break;
                
                case -2:
                    $titol = "Wrong password";
                    break;
                
                case -3:
                    $titol = "Mail already in use";
                    break;
                    
                case -4:
                    $titol = "Username already in use";
                    break;
                    
                case -6:
                    $titol = "Wrong CIF";
                    break;
                    
                case -7:
                    $titol = "CIF already in use";
                    break;
                    
                case -8:
                    $titol = "Wrong adress";
                    break;

                case -9:
                $titol = "He is not administrator";
                break;
            }
            break;
    }

    return $titol;
}

?>