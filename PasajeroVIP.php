<?php

class PasajeroVIP extends Pasajero{

    //ATRIBUTOS
 
    private $numViajeroFrecuente;
    private $millasdePasajero;
   


    //METODO CONSTRUCTOR

                //en este constructor se detallan todos los atributos
    public function __construct($apellido,$nombre,$dni,$tel,$numAs,$numticket,$numviajfrec,$millas){
                
        //invocamos al constructor de la clase Pasajero
                parent::__construct($apellido,$nombre,$dni,$tel,$numAs,$numticket);

        $this->numViajeroFrecuente=$numviajfrec;
        $this->millasdePasajero=$millas;
    }

    //METODOS DE ACCESO

    public function getNumViajeroFrec(){
        return $this->numViajeroFrecuente;
    }

    public function getMillas(){
        return $this->millasdePasajero;
    }


    //METODOS DE CAMBIO


    public function setNumViajeroFrec($numviajerof){
        $this->numViajeroFrecuente=$numviajerof;
    }

    public function setMillas($millas){
        $this->millasdePasajero=$millas;
    }


    //METODO TRANSFORMADOR

    public function __toString(){
        $cadena=parent::__toString();
        return  $cadena.= "N° de Viajero Frecuente: ".$this->getNumViajeroFrec() ."\n"
                            ."Cantidad de Millas acumuladas: ".$this->getMillas();
    }

}