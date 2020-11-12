<?php

require_once '../helper/utiles.php';
require_once 'ServicioFile.php';


$servicio = new ServicioFile("transaccion/data");

$iscontainID = isset($_GET['id']);

if($iscontainID){
    
     $estudianteId = $_GET['id'];
     $servicio->Eliminar($estudianteId);

     $LogFile = 'LogFileAdd.txt';
     $file = fopen($LogFile, 'a');
     $Date = date("Y-m-d H:i:s");
     fwrite($file, " Se elimino una transaccion con el ID:$estudianteId a las $Date"."\n");
     fclose();

}

header('Location: index.php');
exit();
?>