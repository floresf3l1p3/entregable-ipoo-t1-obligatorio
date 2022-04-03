<?php
//Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. */
require_once('ViajeFeliz.php');

echo"------------------MENU----------------------\n";

echo"ingrese los datos de su viaje: \n";
echo"/-------------viaje-feliz-------------------/ \n";
echo"Ingrese nombre del pasajero:\n";
$nombre=trim(fgets(STDIN))."\n";
echo"/--------------------------------/\n";
echo"Ingrese el apellido del pasajero:\n";
$apellido=trim(fgets(STDIN))."\n";
echo"/--------------------------------/\n";
echo"Ingrese destino:\n";
$destino=trim(fgets(STDIN))."\n";
echo"/-------------------------------/\n";
echo"Ingrese codigo del viaje:\n";
$codViaje=trim(fgets(STDIN))."\n";

$objViaje= new ViajeFeliz($nombre,$apellido,$destino,$codViaje);

function menu()
{
      $menu= "--------------------Opciones-------------------\n";
     "opcion 1"."\n"."Modificar el destino del viaje:\n";
     "opcion 2"."\n"."Agregar pasajero:\n";
     "opcion 3"."\n"."Modificar el codigo del viaje:\n";
     "opcion 4"."\n"."Quitar pasajero:\n";
     "opcion 5"."\n"."Modificar pasajero:\n";
     "opcion 6"."\n"."Ver viaje:\n";
     "opcion 7"."\n"."Modificar la cantidad de asientos delviaje:\n";
     "opcion 8"."\n"."salir.\n";
     "--------------------Hasta pronto---------------\n";
     return $menu;

}


function recogerDatos()
{
    echo"DNI\n";
    $dni=strval(trim(fgets(STDIN)))."\n";//convierte cualquier variable en cadena string
    echo"Nombre\n";
    $nombre=trim(fgets(STDIN))."\n";
    echo"Apellido\n";
    $apellido=trim(fgets(STDIN))."\n";
    $pasajero=["DNI"=>$dni,"Nombre"=>$nombre,"Apellido"=>$apellido];
    return $pasajero;

}
$ejecucion=true;
do {
    print menu();
    $opc=trim(fgets(STDIN));
    switch ($opc) {
        case 'opcion 1':
            if($objViaje->quedaLugar()){
                echo "Ingrese los datos de un pasajero: \n";
                $pasajero = recogerDatos();
                echo $objViaje->agregarPasajero($pasajero);
            }else{
                echo "No hay mas lugare en este viaje.\n";
            }            
            break;
        
        case 'opcion 2':
            echo "El viaje con destino a: {$objViaje->getDestino()}. \n";
            echo "Ingrese el nuevo destino: \n";
            $destino = trim(fgets(STDIN));
            $objViaje->setDestino($destino);
            break;
        
        case 'opcion 3':
             echo "Ingrese los datos del pasajero a modificar: \n";
            $pasajero = recogerDatos();
            echo "Ingrese los nuevos datos: \n";
            $otroPasajero = recogerDatos();
            echo $objViaje->cambiaDatosPasajeros($pasajero, $otroPasajero);
            break;
        
        case 'opcion 4':
            echo "Ingrese los datos del pasajero a quitar: \n";
            $pasajero = recogerDatos();
            echo $objViaje->eliminarPasajero($pasajero);
            break;
        
        case 'opcion 5'://revisar mañana
            echo "El viaje posee {$objViaje->getCantMaximaPasajeros()} asientos. \n";
            echo "Ingrese la nueva cantidad de asientos: \n";
            $cantidadAsientos = trim(fgets(STDIN));
            $cantidadAsientos = intval($cantidadAsientos);
            $objViaje->setCantMaximaPasajeros($cantidadAsientos);
            break;
        
        case 'opcion 6':
            echo "El viaje posee el código: {$objViaje->getCodigoViaje()}. \n";
            echo "Ingrese el nuevo código: \n";
            $codigo = trim(fgets(STDIN));
            $codigo = intval($codigo);
            $objViaje->setCodigoViaje($codigo);
            break;
        
        case 'opcion 7':
            echo $objViaje;
            break;
        
        default:
            $ejecucion=false;
            break;
    }
} while ($ejecucion == true);
