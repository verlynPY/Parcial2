<?php

require_once '../helper/utiles.php';
require_once 'Transaccion.php';
require_once '../helper/JsonFileHandler.php';
require_once 'ServicioFile.php';


$servicio = new ServicioFile("transaccion/data");



if(isset($_GET['id'])){

  $estudianteid = $_GET['id'];

  $ele = $servicio->GetID($estudianteid);


  if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera'])){

    $updated = new Transaccion();
    
    $updated->Inicializador($estudianteid,$_POST['nombre'],$_POST['apellido'],$_POST['carrera']);
    
    $servicio->Editar($estudianteid,$updated);

    $LogFile = 'LogFileAdd.txt';
    $file = fopen($LogFile, 'a');
    $Date = date("Y-m-d H:i:s");
    fwrite($file, " Se modifico la transaccion con el ID:$estudianteid a las $Date"."\n");
    fclose();
    

   header("Location: index.php");
   exit();
}
}
else{
  header("Location: index.php");
  exit();
}


?>






<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/bootstrap-theme.min.css"/>
<script src="../js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

<h3>
<center>
  Editando Transaccion
  </center>
 </h3>
  <div class="card-body">
  <form action="editar.php?id= <?php echo $ele->id?>" method="post">

<div class="row">
    <div class="col col-sm-12">
       <div class="input-group form-group">
           <span class="input-group-addon">Fecha</span>
           <input class="form-control" id="nombre" name="nombre" value="<?php echo $ele->Fecha?>">
       </div>
         <div class="input-group form-group">
           <span class="input-group-addon">Monto</span>
           <input class="form-control" name="apellido" value="<?php echo $ele->Monto?>">
       </div>
         
       <div class="input-group form-group">
           <span class="input-group-addon">Descripcion</span>
           <input class="form-control" name="carrera" value="<?php echo $ele->Descripcion?>">
       </div>
       
      
 

       <div class="col col-sm-3">
       <input class="btn btn-info" id="bt" type="submit" value="Actualizar" >
       </div>
       <div class="col col-sm-3">
       <a class="btn btn-success" id="bt" href="index.php">Volver</a>
       </div>
    </div>
    
</div>

</form>
  </div>
</div>
</div>