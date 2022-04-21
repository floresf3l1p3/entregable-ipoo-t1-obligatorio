<?php
require_once('modViaje.php');
require_once('ResponsableV.php');
require_once('objPasajeros.php');

$objResponsable = new ResponsableV(001, 123, "pepe", "grillo");
$objViaje = new Viaje(001, "cancun", 20, $objResponsable);
$objPasajero1 = new Pasajeros("juan", "fernandez", 65223100, 2996565789);
$objPasajero2 = new Pasajeros("pedro", "sanchez", 784754564, 2336465489);
$objPasajero3 = new Pasajeros("pepe", "soto", 4564654, 2996554312);
$objViaje->agregarPasajero($objPasajero1);
$objViaje->agregarPasajero($objPasajero2);
$objViaje->agregarPasajero($objPasajero3);

$ejecuta = true;
do {
    echo menu();
    $opc = trim(fgets(STDIN));
    switch ($opc) {
        case '1':
            echo "codigo del viaje:\n" . $objViaje->getCodigoViaje();
            echo "\nIngrese nuevo codigo:\n" . $codigo = trim(fgets(STDIN));
            $codigo = intval($codigo);
            $objViaje->setCodigoViaje($codigo);
            break;
        case '2':
            echo "Destino del viaje a:\n" . $objViaje->getDestino();
            echo "\nIngrese nuevo destino:\n";
            $destino = trim(fgets(STDIN));
            $objViaje->setDestino($destino);
            break;
        case '3':
            echo"Cantidad de asientos:".$objViaje->getCantMaximaPasajeros();
            echo"\nIngrese la nueva cantidad de asientos:\n";
            $cantAsientos=trim(fgets(STDIN));
            $objViaje=intval($cantAsientos);
            break;
            case '4':
                $lugar = ($objViaje->quedaLugar()) ? true : false ;
                echo "Ingrese datos del pasajero:\n";
                $objPasajero=recogerDatos();
                if ($objViaje->agregarPasajero($objPasajero)) {
                    echo"Pasajero agregado.\n";
                } else {
                    echo"Pasajero ya registrado.\n";
                    echo"sin lugares disponibles.\n";
                }
                
                break;
                case '5':
                    echo"Borrar pasajero ingrese DNI:\n";
                    $selecDni=intval(trim(fgets(STDIN)));
                    if ($objViaje->eliminarPasajero($selecDni)) {
                        echo"Pasajero Borrado con exito.\n";
                    } else {
                        echo"Pasajero no encontrado";
                    }
                    
                    break;
                    case '6':
                        echo"Pasajero a modificar:\n";
                        $dniPasajero=intval(trim(fgets(STDIN)));
                        if ($objViaje->cambiaDatosPasajeros($dniPasajero)) {
                            echo"Se modificaron los datos correctamente..\n";
                        } else {
                            echo"Pasajero no identificado:\n";
                        }
                        case '7':
                            echo $objViaje;
                            break;
                            case '8':
                                $responsable=$objViaje->getObjResponsableV();
                                echo $responsable;
                                break;
                                case '9':
                                    echo "Modifica datos del responsable:\n"."numero empleado:\n";
                                    $numEmpl=trim(fgets(STDIN));
                                    echo"\nNumero Licencia:\n";
                                    $numLic=trim(fgets(STDIN));
                                    echo"\nNombre:\n";
                                    $nombre=trim(fgets(STDIN));
                                    echo"\nApellido:\n";
                                    $apellido=trim(fgets(STDIN));
                                    $objResponsable =new ResponsableV($numEmpl,$numLic,$nombre,$apellido);
                                    $objViaje->setobjResponsableV($objResponsable);

                                    break;
                                    
                        
                        break;

        default:
            $ejecutar=false;
            break;
    }
} while ($ejecutar);

function menu()
{
    $menu = "Elija una opción:\n
    1. Modificar el código del viaje.\n
    2. Modificar el destino del viaje.\n
    3. Modificar la cantidad de asientos del viaje.\n
    4. Agregar Pasajero. \n
    5. Quitar Pasajero. \n
    6. Modificar Pasajero. \n
    7. Ver viaje. \n
    8. Ver datos del responsable. \n 
    9. Modificar datos del responsable. \n
    10. Salir. \n";
    return $menu;
}
function tomarDatos(){
    echo "Nombre: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: \n";
    $apellido = trim(fgets(STDIN));
    echo "DNI: \n";
    $numDoc = intval(trim(fgets(STDIN)));
    echo "Teléfono: \n";
    $telefono = trim(fgets(STDIN));
    $objPasajero = new Pasajeros($nombre, $apellido, $numDoc, $telefono);
    return $objPasajero;
}