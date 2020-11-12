<?php

class Utiles{


public function getUltimo($number){
    $countList = count($number);
    $ultimoElemento = $number[$countList -1];

    return $ultimoElemento;
}

public function GetCookieTime(){
    return time() + 60*60*24*30;
}

public function Filtrador($list,$propiedad,$valor){
    $filtro = [];

    foreach($list as $item){
        if($item[$propiedad] == $valor){
            array_push($filtro, $item);
        }
    }
    return $filtro;
}

public function encontrarIndice($list, $idcarrera, $valor){
    $indice = 0;

    foreach($list as $key=>$item){
        if($item->$idcarrera == $valor){
            $indice = $key;
        }
    }
    return $indice;
}
public function cargarfoto($directory,$nombre,$tmpfile,$type,$size){
    $isSuccess = false;
    if($type == "image/gif" || $type == "image/jpeg" ||
    $type == "image/png" || $type == "image/jpg" ||
    $type == "image/JPG" || $type == "image/pjpeg" && ($size<1000000)){
        if(!file_exists($directory)){
            mkdir($directory,0777,true);
     
            if(file_exists($directory)){
                $this->cargararchivo($directory.$nombre,$tmpfile);
                $isSuccess = true;
        }

    }else{
        $this->cargararchivo($nombre,$tmpfile);
        $isSuccess = true;
      }
    }
    else{
        $isSuccess = false;
    }
    return $isSuccess;
}
private function cargararchivo($nombre,$tmpfile){
    if(file_exists($nombre)){
        unlink($nombre);
    }
    move_uploaded_file($tmpfile,$nombre);
   
}
}
?>
