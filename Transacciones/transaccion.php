<?php

class Transaccion{
    public $id;
    public $Fecha;
    public $Monto;
    public $Descripcion;

    private $utiles;
    public function __contruct(){
        $this->utiles = new Utiles();
    }
    public function set($Data){
        foreach($Data as $key => $value) $this->{$key} = $value;
    }
    public function Inicializador($id,$Fecha,$Monto,$Descripcion){
        $this->id = $id;
        $this->Fecha = $Fecha;
        $this->Monto = $Monto;
        $this->Descripcion = $Descripcion;
    }
    }
    ?>