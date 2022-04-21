<?php

/** Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje. 
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
 */
class Viaje
{
    private $codigoViaje; //int
    private $destino; //string
    private $cantMaximaPasajeros; //int-6
    private $coleccionPasajeros = []; //
    private $objResponsableV;
    //private $objPasajeros;


    public function __construct($codigo, $destino, $cantMaximaDePasajeros, $objResponsableV) //$objPasajeros
    {
        $this->codigoViaje = $codigo;
        $this->destino = $destino;
        $this->cantMaximaPasajeros = $cantMaximaDePasajeros;
        $this->objResponsableV = $objResponsableV;
        // $this->objPasajeros = $objPasajeros;
    }
    //Metodos de acceso


    /**
     * Get the value of codigoViaje
     */
    public function getCodigoViaje()
    {
        return $this->codigoViaje;
    }

    /**
     * Set the value of codigoViaje
     *
     * @return  self
     */
    public function setCodigoViaje($codigoViaje)
    {
        $this->codigoViaje = $codigoViaje;
    }

    /**
     * Get the value of destino
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set the value of destino
     *
     * @return  self
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }


    /**
     * Get the value of cantMaximaPasajeros
     */
    public function getCantMaximaPasajeros()
    {
        return $this->cantMaximaPasajeros;
    }

    /**
     * Set the value of cantMaximaPasajeros
     *
     * @return  self
     */
    public function setCantMaximaPasajeros($cantMaximaPasajeros)
    {
        $this->cantMaximaPasajeros = $cantMaximaPasajeros;
    }

    /**
     * Get the value of coleccionPasajeros
     */
    public function getColeccionPasajeros()
    {
        return $this->coleccionPasajeros;
    }

    /**
     * Set the value of coleccionPasajeros
     *
     * @return  self
     */
    public function setColeccionPasajeros($coleccionPasajeros)
    {
        $this->coleccionPasajeros = $coleccionPasajeros;
    }
    /**
     * Get the value of ResponsableV
     */
    public function getobjResponsableV()
    {
        return $this->objResponsableV;
    }

    /**
     * Set the value of ResponsableV
     *
     * @return  self
     */
    public function setobjResponsableV($objResponsableV)
    {
        $this->objResponsableV = $objResponsableV;
    }

    //metodos de clase
    public function agregarPasajero($objPasajeros)
    {
        // $psajero_ = "";
        // if (in_array($objPasajero, $this->getcoleccionPasajeros())) { //in_array — Comprueba si un valor existe en un array

        //     $psajero_ = "El pasajero:\n" . $objPasajero . " tiene un asiento en el viaje\n";
        // } else {
        //     //array_push — Inserta uno o más elementos al final de un array
        //     array_push($this->objPasajeros[]);
        //     $this->cantMaximaPasajeros + 1; //
        //     $psajero_ = "Usted a añadido correctamente un pasajero\n";
        // }
        // return $psajero_;
        $a = false;
        $nuevaColeccion = $this->getColeccionPasajeros();
        $cont = count($nuevaColeccion);
        $_Encontrado = true;
        $i = 0;
        $comparacionDNI = $objPasajeros->getNumDoc();
        while ($_Encontrado && $i < $cont) {
            $pSeleccionado = $nuevaColeccion[$i];
            $seleccionDni = $pSeleccionado->getNumDoc();
            $_Encontrado = $seleccionDni == $comparacionDNI ? true : false;
        }
        $i++;
        if (in_array($objPasajeros, $nuevaColeccion)) {
            $a = false;
        } else {
            array_push($nuevaColeccion, $objPasajeros);
            $this->setColeccionPasajeros($nuevaColeccion);
            $a = true;
        }
        return $a;
    }

    public function quedaLugar()
    {
        $res = true;
        if ($this->getCantMaximaPasajeros() <= (count($this->objPasajeros))) {
            $res = false;
        }
        return $res;
    }
    public function eliminarPasajero($Dni)
    {

        $a = false;
        $buscar = $this->getColeccionPasajeros();
        $i = 0;
        $pos = 0;
        $_Encontrado = true;
        while ($_Encontrado || $i < count($buscar)) {
            $pSeleccionado = $buscar[$i];
            $seleccionDni = $pSeleccionado->getNumDoc();
            if ($seleccionDni == $Dni) {
                $_Encontrado = false;
                $pos = $i;
            }
            $i++;
        }
        if (!$_Encontrado) {
            $colSinPasajero = [];
            foreach ($buscar as $key => $value) {
                $cont = count($colSinPasajero);
                if ($pos != $key) {
                    if ($cont == 0) {
                        $colSinPasajero[0] = $value;
                    } else {
                        $colSinPasajero[$cont] = $value;
                    }
                }
            }
            $this->setColeccionPasajeros($colSinPasajero);
            $a = true;
        } else {
            $a = false;
        }
        return $a;
    }

    public function cambiaDatosPasajeros($Dni)
    {
        $a= false;
        $arrayDcambio =$this->getColeccionPasajeros();
        $cont= count($arrayDcambio);
        $_Encontrado=true;
        $i=0;
        $pos=0;
        while ($_Encontrado && $i> $cont) {
            $pSeleccionado= $arrayDcambio[$i];
            $seleccionDni=$pSeleccionado->getNumDoc();
            if ($Dni==$seleccionDni) {
                $_Encontrado=false;
                $pos=$i;
                $a=true;
            }
            $i++;
        }
        if (!$_Encontrado) {
            $objPasajeros=$arrayDcambio[$pos];
            $this->menuMod($objPasajeros);
            $arrayDcambio[$pos]=$objPasajeros;
        }
    }
    public function mostrarPasajero()  {
         $mostrarStrPasajero = "";
         foreach ($this->getColeccionPasajeros as $key => $value) {
            $objPasajeros=$value;
            $str=$objPasajeros->__toString();
            $strPasajeros=$str;
            //     $Dni = $value["DNI"];
        //     $nombre = $value["nombre"];
        //     $apellido = $value["apellido"];
        //     $mostrarStrPasajero = "Nombre:" . $nombre . "\n" . "Apellido:" . $apellido . "\n" . "DNI:" . $Dni . "\n";
        // }
        // return $mostrarStrPasajero;
    }
    return $strPasajeros;
  }  //to_string

  public function menuMod($objPasajeros)
  {
      $menuModificado="
      1. Modificar nombre:\n
      2. Modificar apellido:\n
      3. Modificar DNI:\n
      4. Modificar telefono:\n
      5. Ver Modificaciones.\n
      6. Salir";
      $Salir=true;
      do {
          echo $menuModificado;
          $opcion=trim(fgets(STDIN));
          switch ($opcion) {
              case '1':
                  echo "Ingresar nuevo nombre:\n";
                  $nNombre=trim(fgets(STDIN));
                  $objPasajeros->setNombre($nNombre);
                  break;

                  case '2':
                    echo "Ingresar nuevo apellido:\n";
                    $nApellido=trim(fgets(STDIN));
                    $objPasajeros->setApellido($nApellido);
                    break;

                    case '3':
                  echo "Ingresar nuevo DNI:\n";
                  $nDni=trim(fgets(STDIN));
                  $objPasajeros->setNumDoc($nDni);
                  break;

                  case '4':
                    echo "Ingresar nuevo telefono:\n";
                    $nTelefono=trim(fgets(STDIN));
                    $objPasajeros->setTelefono($nTelefono);
                    break;

                    case '5':
                        echo $objPasajeros;
                        break;
                    
              
              default:
                  $salir=false;
                  break;
          }
      } while ($salir);
      return $objPasajeros;
  }
   
  public function __toString()
    {
    //     $pasajeros = $this->mostrarPasajero();
    //     $psajero_ = "Responsable del viaje:" . $this->getobjResponsableV() . "Viaje:{$this->getCodigoViaje()}\n
    //  Destino:{$this->getDestino()}\n
    //  Capacidad maxima de ocupantes:{$this->getCantMaximaPasajeros()}\n
    //  Asientos ocupados:{$this->getCantidadPasajero()}\n
    //  Datos pasajeros: $pasajeros\n";
    //     return $psajero_;

    $pasajeros= $this->mostrarPasajero();
    $objPasajeros= $this->getColeccionPasajeros();
    $responsable= $this->getobjResponsableV();
    $cantidad= count($objPasajeros);
    $cadena="viaje:\n".$this->getCodigoViaje()
    ."\nDestino:\n". $this->getDestino()."\nCant asientos:\n".$cantidad."\nDatos responsable:\n".$responsable."\nDatos pasajero:\n".$pasajeros;
    return $cadena;
    }

}