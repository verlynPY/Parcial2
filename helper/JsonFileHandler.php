<?php

require_once 'IHandlerFile.php';

class JsonFileHandler implements IHandlerFile{

    public $directory;
    public $filename;

    function __construct($directory,$filename){
        $this->directory = $directory;
        $this->filename = $filename;

    }

    function creardirectorio(){

        if(!file_exists($this->directory)){
            mkdir($this->directory,0777,true);
        }

    }
    function saveFile($value){

        $this->creardirectorio($this->directory);
        $path = $this->directory . "/" . $this->filename . ".json";
        $serializadatos = json_encode($value);
        $file = fopen($path,"w+");

        fwrite($file, $serializadatos);
        fclose();


    }
    function readFile(){

        $this->creardirectorio($this->directory);
        $path = $this->directory . "/" . $this->filename  . ".json";
        
        if(file_exists($path)){
            $file = fopen($path,"r");
            $content = fread($file,filesize($path));
            fclose($file); 
             return json_decode($content);
        }
        else{
            return false;
        }
      

    }
    function readFilee($namefile){

        $this->creardirectorio($this->directory);
        $path = 'Foto' . "/" . $namefile  . ".json";
        
        if(file_exists($path)){
            $file = fopen($path,"r");
            $content = fread($file,filesize($path));
            fclose($file); 
             return json_decode($content);
        }
        else{
            return false;
        }
      

    }
}

?>