<?php

class Pasajero{

    //ATRIBUTOS
    private $apellido;
    private $nombre;
    private $dni;
    private $telefono;
    private $numAsiento;
    private $numticketpasaje;


    //METODO CONSTRUCTOR

    public function __construct($apellido,$nombre,$dni,$tel,$numAs,$numticket){

        $this->apellido=$apellido;
        $this->nombre=$nombre;
        $this->dni=$dni;
        $this->telefono=$tel;
        $this->numAsiento=$numAs;
        $this->numticketpasaje=$numticket;
    }

    //METODOS DE ACCESO

    public function getApellido(){
        return $this->apellido;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getNumAsiento(){
        return $this->numAsiento;
    }
    public function getNumTicket(){
        return $this->numticketpasaje;
    }

    //METODOS DE CAMBIO


    public function setApellido($adress){
         $this->apellido=$adress;
    }
    public function setNombre($name){
        $this->nombre=$name;
    }
    public function setDni($doc){
        $this->dni=$doc;
    }
    public function setTelefono($tel){
        $this->telefono=$tel;
    }
    public function setNumAsiento($nasien){
        $this->numAsiento=$nasien;
    }
    public function setNumTicket($numticket){
        $this->numticketpasaje=$numticket;
    }


    //METODO TRANSFORMADOR

    public function __toString(){
    return "\n".
                "#  Apellido: ".strtoupper($this->getApellido())."\n".
                "#  Nombre: ".strtoupper($this->getNombre())."\n".
                "#  DNI N°: ".$this->getDni()."\n".
                "#  Telefono: ".$this->getTelefono()."\n".
                "#  N° de Asiento: ".$this->getNumAsiento()."\n".
                "#  N° Ticket Pasaje: ".$this->getNumTicket()."\n";
    }
 
   
}