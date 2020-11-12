<?php

require_once '../helper/CsvFileHandler.php';
require_once '../helper/utiles.php';
require_once 'transaccion.php';


class ServicioFile{
    private $utiles;
    public $filehandler;
    public $directory;
    public $filename;

    public function __construct($directory = "data"){

        $this->utiles = new Utiles();
        $this->directory = $directory;
        $this->filename = "transaccion";
        $this->filehandler = new CsvFileHandler($this->directory,$this->filename);
         
    }

    public function GetList(){
        $listaestudiantedecode = $this->filehandler->readFile();
        $listaestudiante = array();

        if($listaestudiantedecode == false){
            $this->filehandler->saveFile($listaestudiante);
        }
        else{
            foreach($listaestudiantedecode as $eledecode){
                $ele = new Transaccion();
                $ele->set($eledecode);

                array_push($listaestudiante, $ele);
            }
        }
        return $listaestudiante;
       
    }
    public function Agrega($entity){
        $listaestudiante = $this->GetList();
        $estudianteid = 1;

        if(!empty($listaestudiante)){
            $lastestudiante = $this->utiles->getUltimo($listaestudiante);
            $estudianteid = $lastestudiante->id + 1;
        }

        $entity->id = $estudianteid;

        array_push($listaestudiante, $entity);
        $this->filehandler->saveFile($listaestudiante);
    }


    public function Editar($id,$objeto){
        $listaestudiante = $this->GetList();
        $elementoindice = $this->utiles->encontrarIndice($listaestudiante,'id',$id);

        $listaestudiante[$elementoindice] = $objeto;
        $this->filehandler->saveFile($listaestudiante);
    }



    public function Eliminar($id){
        $listaestudiante = $this->GetList();
        $elementoindice = $this->utiles->encontrarIndice($listaestudiante,'id',$id);

        unset($listaestudiante[$elementoindice]);
        
        $listaestudiante = array_values($listaestudiante);
        $this->filehandler->saveFile($listaestudiante);

    }
    public function GetID($id){
   $listaestudiante = $this->GetList();
        $decode = $this->Filtradorr($listaestudiante,'id',$id)[0];
        $estudiante = new Transaccion();
        $estudiante->set($decode);
        return $decode;

    }
    
   public function Filtradorr($list, $propiedad, $valor){
    $filtro = [];

    foreach($list as $item){
        if($item->$propiedad == $valor){
            array_push($filtro, $item);
        }
        
    }
    return $filtro;
    }
    


}
?>