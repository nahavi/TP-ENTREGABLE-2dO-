<?php

class PasajeroESPECIAL extends Pasajero{

    //ATRIBUTOS

    private $requerimiento;


    //METODO CONSTRUCTOR

    public function __construct($apellido,$nombre,$dni,$tel,$numAs,$numticket,$requerimiento){

       //invocamos al constructor de la clase Pasajero
       parent::__construct($apellido,$nombre,$dni,$tel,$numAs,$numticket);

       $this->requerimiento=$requerimiento;
    }

    //METODOS DE ACCESO

  
    public function getRequerimiento(){
        return $this->requerimiento;
    }

    //METODOS DE CAMBIO

    public function setRequerimiento($req){
        $this->requerimiento=$req;
    }


    //METODO TRANSFORMADOR

    public function __toString(){
        $cadena=parent::__toString();
        return  $cadena.= "Detalle atencion Especial: ".$this->getRequerimiento() ."\n";
                            
    }
 


}