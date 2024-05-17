<?php
/*Importante: Deben enviar el link a la resolución en su repositorio en GitHub del ejercicio.
-------------------------------------------------------------------------------------------------------------------------------
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase 
(incluso los datos de los pasajeros). 
--------------------------------------------------------------------------------------------------------------------------------
Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros. 
Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.
---------------------------------------------------------------------------------------------------------------------------------
Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar 
a información del viaje, modificar y ver sus datos.
---------------------------------------------------------------------------------------------------------------------------------
Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre,
 apellido, numero de documento y teléfono. 
El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. 
También se desea guardar la información de la persona responsable de realizar el viaje, 
para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. 
La clase Viaje debe hacer referencia al responsable de realizar el viaje.
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. 
Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. 
Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. 
De la misma forma cargue la información del responsable del viaje.
--------------------------------------------------------------------------------------------------------------------------------
TP 3 HERENCIA 
Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros
e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros 
( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.*/

class Viaje
{

    //ATRIBUTOS 

    private $codigoViaje;
    private $destino;
    private $cantmaxPasajeros;
    private $colpasajeros;
    private $objresponsable;
    private $costoViaje;
    private $precioFinalTotal;

    //METODO CONSTRUCTOR

    public function __construct($codv, $destino, $cantmaxp, $colpasajeros, $objresponsable, $costo, $precioft)
    {
 
        $this->codigoViaje = $codv;
        $this->destino = $destino;
        $this->cantmaxPasajeros = $cantmaxp;
        $this->colpasajeros = $colpasajeros;
        $this->objresponsable = $objresponsable;
        $this->costoViaje = $costo;
        $this->precioFinalTotal = $precioft;
    }

    //METODOS de acceso

    public function getCodigoviaje()
    {
        return $this->codigoViaje;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getCantMaxPas()
    {
        return $this->cantmaxPasajeros;
    }
    public function getPasajeros()
    {
        return $this->colpasajeros;
    }
    public function getObjresponsable()
    {
        return $this->objresponsable;
    }
    public function getCostoViaje()
    {
        return $this->costoViaje;
    }
    public function getPrecioFinalTotal()
    {
        return $this->precioFinalTotal;
    }



    //METODOS de cambio

    public function setCodigoviaje($codigo)
    {
        $this->codigoViaje = $codigo;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }
    public function setCantMaxPas($cantmax)
    {
        $this->cantmaxPasajeros = $cantmax;
    }
    public function setPasajeros($pasajeros)
    {
        $this->colpasajeros = $pasajeros;
    }
    public function setObjresponsable($objresp)
    {
        $this->objresponsable = $objresp;
    }
    public function setCostoViaje($costo)
    {
        $this->costoViaje = $costo;
    }
    public function setPrecioFinalTotal($precio)
    {
        $this->precioFinalTotal = $precio;
    }

    //METODOS AUXILIARES (funciones)


    function listaPasajeros()
    { //CONVIERTE EL ARRAY EN CADENA para poder mostrar en pantalla
        $pasaj = $this->getPasajeros();

        $pasajeros = " ";
        for ($i = 0; $i < count($pasaj); $i++) {
            $pasajeros .= $pasaj[$i] . "\n";
        }
        return $pasajeros;
    }

    //METODO transformador

    public function __toString()
    {
        return  "Codigo de Viaje: " . $this->getCodigoviaje() . "\n" .
            "Destino del Viaje: " . strtoupper($this->getDestino()) . "\n" .
            "Cantidad maxima que pueden viajar: " . $this->getCantMaxPas() . "\n" .
            "Responsable del viaje: \n" . $this->getObjresponsable() . "\n" .
            "Costo del Viaje por Pasajero: ".$this->getCostoViaje(). "\n".
            "Venta Total: ".$this->getPrecioFinalTotal()."\n".
            "\n".
            "<<>>           LISTA DE  PASAJEROS           <<>>\n" . 
            ".................................................\n".
            $this->listaPasajeros() . "\n";//llamo a la funcion que convierte array en cadena
          
    }

    // METODOS AUXILIARES


    public function controlDNIPasajero($dni)
    {
        $pasajeros = $this->getPasajeros();
        $repetido = false;

        for ($i = 0; $i < count($pasajeros); $i++) {

            $unpasajero = $pasajeros[$i];
            if ($unpasajero->getDNI() == $dni) {
                $repetido = true;
            } else {
                $repetido = false;
            }
        }

        return $repetido;
    }


    //METODOS AUXILIARES

    /*Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según 
   las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas 
   supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, 
   asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados 
   entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.*/

    public function darPorcentajeIncremento()
    {
        $colpasajeros = $this->getPasajeros();
        $porcentajeIncremento = 0;

        for ($i = 0; $i < count($colpasajeros); $i++) {

            $unpasajero = $colpasajeros[$i];
        
            //PASAJERO ESTANDAR
           if ($unpasajero->getNumViajeroFrec() == null && $unpasajero->getMillas() == null && $unpasajero->getRequerimiento() == null) {
                $porcentajeIncremento = 1.10;
            }
            //PASAJERO VIP
            if ($unpasajero->getRequerimiento() == null && $unpasajero->getMillas() <= 300) {
                $porcentajeIncremento = 1.30;
            }
            if ($unpasajero->getRequerimiento() == null && $unpasajero->getMillas() > 300) {
                $porcentajeIncremento = 1.35;
            }
            //PASAJERO ESPECIAL
            if (
                $unpasajero->getNumViajeroFrec() == null && $unpasajero->getMillas() == null && $unpasajero->getRequerimiento() == "silla de rueda" &&
                $unpasajero->getRequerimiento() == "asistencia"  &&  $unpasajero->getRequerimiento() == "comida especial"
            ) {
                $porcentajeIncremento = 1.30;
            }
            if (
                $unpasajero->getNumViajeroFrec() == null && $unpasajero->getMillas() == null && $unpasajero->getRequerimiento() == "silla de rueda" ||
                $unpasajero->getRequerimiento() == "asistencia"  ||  $unpasajero->getRequerimiento() == "comida especial"
            ) {
                $porcentajeIncremento = 1.30;
            }
            return $porcentajeIncremento;
        }
       
    }

    /*Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor 
    a la cantidad máxima de pasajeros y falso caso contrario*/


    public function hayPasajesDisponibles(){

        $cantpasajeros= count($this->getPasajeros());
        $cantmaximapasajeros=$this->getCantMaxPas();

        if($cantpasajeros == $cantmaximapasajeros ){

            $disponibles= false;
        }else{
            $disponibles= true;
        }
        return $disponibles;

    }
    /*Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e 
    implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de 
    pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser
    abonado por el pasajero.*/

    public function venderPasaje($objPasajero){

        $colpasajeros=$this->getPasajeros();
        $costo=$this->getCostoViaje();
        $porc_incremento=1.10;// deberia llamar al metodo "darPorcentajeIncremento"
        $ventaTotal=$this->getPrecioFinalTotal();
      
        if($this->hayPasajesDisponibles()== true){
            $precioFinalxpasajero= $costo * $porc_incremento; 
            $ventaTotal= $ventaTotal + $precioFinalxpasajero;
            array_push($colpasajeros, $objPasajero);
            $this->setPasajeros($colpasajeros);
            $this->setPrecioFinalTotal($ventaTotal);
        }
        return $precioFinalxpasajero;

    }


}
