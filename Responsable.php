<?php



class Responsable{

//ATRIBUTOS
    private $numempleado;
    private $numlicencia;
    private $nombre;
    private $apellido;


//METODO CONSTRUCTOR

    public function __construct($numempl,$numlic,$nombre,$apellido){
        $this->numempleado=$numempl;
        $this->numlicencia=$numlic;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }

//METODOS DE ACCESOS

public function getNumempleado(){
    return $this->numempleado;
}
public function getNumlicencia(){
    return $this->numlicencia;
}
public function getNombre(){
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}

//METODOS DE MODIFICACION

public function setNumempleado($nempl){
    $this->numempleado=$nempl;
}
public function setNumlicencia($nlic){
    $this->numlicencia=$nlic;
}
public function setNombre($nom){
     $this->nombre=$nom;
}
public function setApellido($apell){
    $this->apellido=$apell;
}
//METODOS AUXILIARES (funciones)

//METODO TRANSFORMADOR

public function __toString(){
    return "----------------------> N° Empleado: ".$this->getNumempleado()."\n".
            "----------------------> N° Licencia: ".$this->getNumlicencia()."\n".
            "----------------------> Nombre: ".strtoupper($this->getNombre())."\n".
            "----------------------> Apellido: ".strtoupper($this->getApellido())."\n";
}

}

