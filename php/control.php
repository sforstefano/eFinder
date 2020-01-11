<?php

include_once("usuaris.php");
include_once("esdeveniment.php");


class TControl
{

    public function obtenirDades(){
    //obtenir dades del esdeveniment
        $esd = new TEsdeveniment();

        $dades = $esd->obtenirDades();

        return $dades;

    }

    public function mostrarEventsUsuari($id){
    //mostrar esdeveniments usuaris
        $esd = new TEsdeveniment();

        $dades = $esd->mostrarEventsUsuari($id);

        return $dades;
    }

    public function mostraUser($id){

        $usr = new TUsuario();

        $dades = $usr->mostraUser($id);

        return $dades;
    }

    public function llistaLlocs(){

        $esd = new TEsdeveniment();

        $dades = $esd->llistaLlocs();

        return $dades;

    }

    public function llistaTipus($lang){

        $esd = new TEsdeveniment();

        $dades = $esd->llistaTipus($lang);

        return $dades;

    }

    public function totsEsdeveniments($lang){
        $esd = new TEsdeveniment();

        $dades = $esd->totsEsdeveniments($lang);

        return $dades;
    }

    public function esdEsp($tipus, $lang){
        $esd = new TEsdeveniment();

        $dades = $esd->esdEsp($tipus, $lang);

        return $dades;

    }

    public function cercaUsuari($tipus, $lloc, $preu, $id, $lang){

        echo("<script>console.log( Les dades per buscar son ".$tipus." ".$lloc." ".$preu." ".$id.")</script>");
        $esd = new TEsdeveniment();

        $dades = $esd->cercaUsuari($tipus, $lloc, $preu, $id, $lang);


        return $dades;

    }
    
    public function esdevenimentsTXT(){
        $esd = new TEsdeveniment();

        $dades = $esd->esdevenimentsTXT();

        return $dades;
    }

    public function RegistrePromotor($nom_usuari, $nom, $cognoms, $psswd, $psswd2, $cif_promotor, $nom_local, $adreca, $mail){
    //registro usuario promotor
        $user = new TUsuario();

        $u = $user->RegistreUsuari($mail, $nom_usuari, $nom, $cognoms, $psswd, $psswd2);
        //primero se registra como usuario

        
        if($u == 0){
            echo("Ahora sabremos si entra aqui -> ".$u);
            
            $u = $user->RegistrePromotor($cif_promotor, $nom_local, $adreca, $nom_usuari);  

            

        }

        $user->updateUser($nom_usuari, $u);
        
        
        return $u;
    }

    public function RegistreUsuari($mail, $nom_usuari, $nom, $cognoms, $psswd, $psswd2){
        $user = new TUsuario();

        $u = $user->RegistreUsuari($mail, $nom_usuari, $nom, $cognoms, $psswd, $psswd2);

        return $u;

    }

    public function LoginAdmin($nom_usuari, $psswd, $psswd2){
        $user = new TUsuario();

        $u = $user->LoginAdmin($nom_usuari, $psswd, $psswd2);

        return $u;

    }

    public function importar_xml($arxiu)
	{
		$esdeveniment = new TEsdeveniment();
		$error = $esdeveniment->importar_xml($arxiu);
		return($error);
	}
    
}


?>