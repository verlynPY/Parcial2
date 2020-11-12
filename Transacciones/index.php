<?php

require_once '../helper/utiles.php';
require_once 'Transaccion.php';
require_once '../helper/JsonFileHandler.php';
require_once 'ServicioFile.php';

$utiles = new Utiles();

$servicio = new ServicioFile("transaccion/data");
$ListaEstudiantes = $servicio->GetList();
    $newestudiante = new Transaccion();


   // array_push($estudiante, ['id'=>$estudianteid, 'nombre'=>$_POST['nombre'], 'apellido'=>$_POST['apellido'],
  //   'carrera'=> $_POST['carrera'], 'estado'=> $estado, 'foto'=> $_POST['Foto']]);

  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../js/bootstrap.min.js"></script>
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
.main{
  margin: auto;
  width: 50%;
  padding: 30px;
}
#bt{
    background:#2C2C2C;
    color:#c7c7c7;
}
.row{
    margin-top:30px;
}

</style>


</head>
<body>

<div class="main">
<div class="row">
    <div class="col col-sm-12">
    <a class="btn" id="bt"  href="agregar.php" id="btndownload"><i class="glyphicon glyphicon-open"></i> Agregar Transaccion</a>
            <a class="btn" id="bt" href="subida.php" id="btndownload"><i class="glyphicon glyphicon-open"></i> Subir Transaccion</a>
            <a class="btn" id="bt"  href="../DonwloadsManager/DonwloadFile.php" id="btndownload"><i class="glyphicon glyphicon-download-alt"></i> Descargar Json</a>
            <a class="btn" id="bt"  href="../DonwloadsManager/DonwloadFileCSV.php" id="btndownload"><i class="glyphicon glyphicon-download-alt"></i> Descargar Csv</a>
        <table class="table table-striped" id="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Descripcion</th>
                <th>DE || ED</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($ListaEstudiantes)):?>
                <h3>No se ha registrado ningun estudiante aun.</h3>
            <?php else: ?>
                
                <?php foreach($ListaEstudiantes as $student):?>
                <tr> 
                    <td><?php  echo $student->Fecha ?></td>
                    <td><?php  echo $student->Monto ?></td>
                    <td><?php  echo $student->Descripcion ?></td>
                    <td><a  href="" data-id="<?php echo $student->id?>" class="card-link delete btn btn-danger">Eliminar</a>
                    <a class="btn btn-success" href="editar.php?id=<?php echo $student->id?>">Editar</a></td>
          
                  
                </tr>
                <?php endforeach;?>

                
            <?php endif; ?>
        </tbody>
        </table>

          
     
    </div>
</div>
</div>
<script src="..\js\Sections\index\index.js"></script>
</body>
</html>