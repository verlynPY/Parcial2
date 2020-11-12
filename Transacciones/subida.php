<?php

require_once '../helper/utiles.php';
require_once 'Transaccion.php';
require_once '../helper/JsonFileHandler.php';
require_once 'ServicioFile.php';

$utiles = new Utiles();

$servicio = new ServicioFile("transaccion/data");



$ListaEstudiantes = $servicio->GetList();
$formatos = array('.json','.csv');
    if(isset($_POST['bt'])){

$nombrefile = $_FILES['Foto']['name'];
    $nombretmpfile = $_FILES['Foto']['tmp_name'];
if(isset($_POST['bt'])){
   if(!file_exists('Foto')){
    mkdir('Foto',0777,true);
    if(file_exists('Foto')){
        if(move_uploaded_file($nombretmpfile,'Foto/'.$nombrefile)){
            echo "Guardado";
        }else{
            echo "No Guardado";
        }
    }
   }else{
       if(move_uploaded_file($nombretmpfile, 'Foto/'.$nombrefile)){
       $data = file_get_contents('Foto/' .$nombrefile);
        $objetos = json_decode($data, true);
  
        foreach($objetos as $obj){
          
         $newestudiante = new Transaccion();  
          $newestudiante->Inicializador(0,$obj['Fecha'],$obj['Monto'],$obj['Descripcion']);
           $servicio->Agrega($newestudiante);
           
        } 
        }else{
           "No Guardo";
       }
   }

    }
    

   header('Location: index.php');
   exit();

}
?>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/bootstrap-theme.min.css"/>
<script src="../js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Transacciones</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="agregar.php">Agregar</a></li>
      <li><a href="subida.php">Subir Transaccion</a></li>
     
    </ul>
  </div>
</nav>
</header>
<style>
#main{
  
  margin: auto;
width: 40%;

padding: 30px;
}
.row{
    margin-top:30px;
}
</style>

<div class="container">
<div class="col-md-6 col-md-offset-3">
    <h3><center><b>Subir Transaccion</b></center></h3>
<form  enctype="multipart/form-data" action="subida.php" method="post">
	<!-- COMPONENT START -->
	<div class="form-group">
		<div class="input-group input-file" name="Fichier1">
			<span class="input-group-btn">
        		<button class="btn btn-default btn-choose" type="button">Seleccionar</button>
    		</span>
    		<input type="file" name="Foto" class="form-control" accept=".json, .csv" placeholder='Choose a file...' />
    		<span class="input-group-btn">
       			 <button class="btn btn-warning btn-reset" type="button">Reset</button>
    		</span>
		</div>
	</div>
	<!-- COMPONENT END -->
  	<div class="form-group">
	
    <a class="btn btn-success pull-right" id="bt" href="index.php">Volver</a>
    	<button type="submit" class="btn btn-info" name="bt">Agregar</button>
	</div>
</form>
      
   




