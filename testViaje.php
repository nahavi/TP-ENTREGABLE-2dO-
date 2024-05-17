 <?php

   
    include_once "Pasajero.php";
    include_once "PasajeroVIP.php";
    include_once "PasajeroESPECIAL.php";
    include_once "Responsable.php";
    include_once "Viaje.php";

  
     function retornarCadena($coleccion){
        $cadena="";
        foreach($coleccion as $unElemento){
            $cadena= $cadena. " ".$unElemento. "\n";
        }
        return $cadena;

    }

    //SE CREA LA PRIMERA INSTANCIA VIAJE VACIA
    $objViaje1 = new Viaje(0, 0, 0, [], 0,0,0);
    $objPasajero = new Pasajero(0, 0, 0, 0,0,0,0,0,0);

    //MENU INGRESO DE DATOS PARA UN SOLO VIAJE
    echo "************************************************************\n";
    echo "-------------------INGRESAR DATOS VIAJE ---------------------\n";
    echo "*************************************************************\n";

    echo "Ingrese codigo de viaje: ";
    $codigo = trim(fgets(STDIN));

    echo "Ingrese destino: ";
    $destino = trim(fgets(STDIN));

    echo "Ingrese cantidad máxima de pasajeros que pueden ir: ";
    $cantmaxp = trim(fgets(STDIN));
    $objViaje1->setCantMaxPas($cantmaxp);//ver si esto esta bien

    echo " Ingrese Nombre Responsable Viaje: ";
    $nomresp = trim(fgets(STDIN));

    echo "Ingrese Apellido Responsable Viaje: ";

    $apresp = trim(fgets(STDIN));

    echo "Ingrese N° Empleado: ";
    $numemplresp = trim(fgets(STDIN));

    echo "Ingrese N° Licencia: ";
    $numlicresp = trim(fgets(STDIN));

    echo "Costo del Viaje por pasajero: ";
    $costopasajero=trim(fgets(STDIN));
    $objViaje1->setCostoViaje($costopasajero);//ver si esto esta bien

   
    //se crea el objeto "responsable"
    $objResponsable = new Responsable($numemplresp, $numlicresp, $nomresp, $apresp,);


    echo "*************************************************************\n";
    echo "-------------------INGRESAR DATOS PASAJEROS------------------\n";
    echo "*************************************************************\n";
    // SE INGRESAN LOS PASAJEROS Y SE ARMA LA COLECCION

  
    $salir = false;
    while (!$salir) {

        echo "Ingrese dni: ";
        $dni = trim(fgets(STDIN));
        //se ingresa DNI y se invoca a los metodos que controlan que el pasajero no se encuentre cargado
        //y que la carga no supere la cantidad de pasajeros permitidos
        $repetido=$objViaje1->controlDNIPasajero($dni);
        $disponible=$objViaje1->hayPasajesDisponibles();
       

        if ($repetido == true || $disponible == false) {
            
            echo "Verifique la cantidad de pasajeros permitidos o si el pasajero ya se encuentra cargado\n";
            $salir = true;
        } else {
           
            echo "Ingrese apellido: ";
            $apellido = trim(fgets(STDIN));

            echo "Ingrese nombre: ";
            $nombre = trim(fgets(STDIN));

            echo "Ingrese telefono: ";
            $tel = trim(fgets(STDIN));

            echo "Ingrese N° asiento: ";
            $numAsiento=trim(fgets(STDIN));

            echo "Ingrese N° Pasaje: ";
            $numticketpasaje=trim(fgets(STDIN));

            echo "N° Pasajero Frecuente: ";
            $numViajeroFrecuente=trim(fgets(STDIN));
          
            
            echo "Millas acumuladas: ";
            $millasdePasajero=trim(fgets(STDIN));
           
            echo "Requerimiento -silla de rueda / asistencia / comida especial: ";
            $requerimiento=trim(fgets(STDIN));
           
                   
            //se crea el objeto pasajero y con array_push se agrega a la coleccion de pasajeros ($colpasajeros)
            $objPasajero = new Pasajero($apellido, $nombre, $dni, $tel,$numAsiento,$numticketpasaje,$numViajeroFrecuente, $millasdePasajero,$requerimiento);
            

            $precioViaje=$objViaje1->venderPasaje($objPasajero);
            echo "Precio con incremento: ".$precioViaje. "\n";
           
        }
    }

    //SE CREA LA PRIMERA INSTANCIA DE LA CLASE "VIAJE"  CON LOS DATOS del Viaje, Responsable y Pasajeros INGRESADOS DESDE EL MENU
    $colpasajeros=$objViaje1->getPasajeros();
    $totalVenta= $objViaje1->getPrecioFinalTotal();
    
    $objViaje1 = new Viaje($codigo, $destino, $cantmaxp, $colpasajeros, $objResponsable,$costopasajero,$totalVenta);
  
 
   
    //SE GENERA UN RESUMEN DE LO CARGADO... 
    echo "\n";
    echo "////////////////////////////////////////////////////////////////\n";
    echo "               RESUMEN VIAJE MES DE JUNIO 2024                  \n";
    echo "////////////////////////////////////////////////////////////////\n";
    echo $objViaje1;

    //...LUEGO DE VER EL RESUMEN SE OFRECE HACER ALGUN CAMBIO
    $sinmodificar = false;

    while (!$sinmodificar) {

        echo "Desea modificar algún dato?:  S/N)\n";
        $cambiar = trim(fgets(STDIN));

        if ($cambiar == "N") {
            $sinmodificar = true;
            echo "SU VIAJE NO SERA MODIFICADO \n";
        } else {

            echo "marque C si quiere modificar CODIGO \n" .
                "marque D si quiere modificar DESTINO \n" .
                "marque M si quiere modificar CAPACIDAD MAXIMA\n" .
                "marque RN si quiere modificar el NOMBRE del responsable\n" .
                "marque RA si quiere modificar el APELLIDO del responsable\n" .
                "marque RE si quiere modificar el N° EMPLEADO del responsable\n" .
                "marque RL si quiere modificar el N° de LICENCIA del responsable\n" .
                "marque DNI si quiere modificar el N° DNI del pasajero\n" .
                "marque A si quiere modificar el APELLIDO del pasajero\n" .
                "marque N si quiere modificar el NOMBRE del pasajero\n" .
                "marque T si quiere modificar el TELEFONO del pasajero\n";


            $datoamodificar = trim(fgets(STDIN));
            if ($datoamodificar == "C") {
                echo "Ingrese el numero de codigo: \n";
                $nuevocodigo = trim(fgets(STDIN));
                $objViaje1->setcodigoViaje($nuevocodigo);
            }
            if ($datoamodificar == "D") {
                echo "Ingrese destino: \n";
                $nuevodestino = trim(fgets(STDIN));
                $objViaje1->setDestino($nuevodestino);
            }
            if ($datoamodificar == "M") {
                echo "Ingrese capacidad maxima de pasajeros: \n";
                $nuevacapacidad = trim(fgets(STDIN));
                $objViaje1->setCantMaxPas($nuevacapacidad);
            }
            if ($datoamodificar == "RN") {
                echo "Ingrese nombre responsable: \n";
                $nuevonombreResponsable = trim(fgets(STDIN));
                $objResponsable->setNombre($nuevonombreResponsable);
            }
            if ($datoamodificar == "RA") {
                echo "Ingrese apellido responsable: \n";
                $nuevoapellidoResponsable = trim(fgets(STDIN));
                $objResponsable->setApellido($nuevoapellidoResponsable);
            }
            if ($datoamodificar == "RE") {
                echo "Ingrese N° Empleado responsable: \n";
                $nuevoNEResponsable = trim(fgets(STDIN));
                $objResponsable->setNumempleado($nuevoNEResponsable);
            }
            if ($datoamodificar == "RL") {
                echo "Ingrese N° Licencia responsable: \n";
                $nuevoNLResponsable = trim(fgets(STDIN));
                $objResponsable->setNumlicencia($nuevoNLResponsable);
            }
            if ($datoamodificar == "DNI") {
                echo "Ingrese N° de documento pasajero: \n";
                $nuevoDNIPasajero = trim(fgets(STDIN));
                $objPasajero->setDni($nuevoDNIPasajero);
            }
            if ($datoamodificar == "A") {
                echo "Ingrese Apellido pasajero: \n";
                $nuevoApellidoPasajero = trim(fgets(STDIN));
                $objPasajero->setApellido($nuevoApellidoPasajero);
            }
            if ($datoamodificar == "N") {
                echo "Ingrese Nombre pasajero: \n";
                $nuevoNombrePasajero = trim(fgets(STDIN));
                $objPasajero->setNombre($nuevoNombrePasajero);
            }
            if ($datoamodificar == "T") {
                echo "Ingrese Telefono pasajero: \n";
                $nuevoTelefonoPasajero = trim(fgets(STDIN));
                $objPasajero->setTelefono($nuevoTelefonoPasajero);
            }
            echo "******************************************************\n";
            echo        "RESUMEN VIAJE MES DE JUNIO 2024 MODIFICADO:    \n";
            echo "******************************************************\n";
            echo "\n";
  
            echo $objViaje1;
        }
    }

