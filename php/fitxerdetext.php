<?php 
    $file = fopen("arxiu.txt", "w");

    include_once("../php/control.php");
    $c = new TControl();

    $dada = $c->esdevenimentsTXT();
  
    fwrite($file, $dada . PHP_EOL);

    fclose($file);

    header( "refresh:1;url=../ca/index.php" );

?>