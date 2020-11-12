<?php

require_once '../helper/utiles.php';
require_once 'Transaccion.php';
require_once '../helper/JsonFileHandler.php';
require_once 'ServicioFile.php';

$utiles = new Utiles();

$servicio = new ServicioFile("transaccion/data");
$ListaEstudiantes = $servicio->GetList();
if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera'])){

    $newestudiante = new Transaccion();
    $newestudiante->Inicializador(0,$_POST['nombre'],$_POST['apellido'],$_POST['carrera']);
    $servicio->Agrega($newestudiante);
    
    $LogFile = 'LogFileAdd.txt';
    $file = fopen($LogFile, 'a');
    $Date = date("Y-m-d H:i:s");
    fwrite($file, " Se agrego una nueva transaccion con el ID:$newestudiante->id a las $Date"."\n");
    fclose();


   // array_push($estudiante, ['id'=>$estudianteid, 'nombre'=>$_POST['nombre'], 'apellido'=>$_POST['apellido'],
  //   'carrera'=> $_POST['carrera'], 'estado'=> $estado, 'foto'=> $_POST['Foto']]);

  header("Location: index.php");
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
<div id="main">

<h3><center>
  Agregar Transaccion
  </center>
</h3>
  <form enctype="multipart/form-data" action="agregar.php" method="post">

<div class="row">
    <div class="col col-sm-12">
       <div class="input-group form-group">
           <span class="input-group-addon">Fecha</span>
           <input class="form-control" id="nombre" name="nombre">
       </div>
         <div class="input-group form-group">
           <span class="input-group-addon">Monto</span>
           <input class="form-control" name="apellido">
       </div>
         
         <div class="input-group form-group">
            <span class="input-group-addon">Descripcion</span>
            <input class="form-control" name="carrera">
        </div>
          
   
       <div class="form group">
       <input class="btn btn-info" id="bt" type="submit" value="Agregar" >
       
       
       <a class="btn btn-success pull-right" id="bt" href="index.php">Volver</a>
       </div>
    </div>
</div>

</form>
  </div>
</div>
</div>


