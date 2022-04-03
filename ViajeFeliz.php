<?php
/**La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. */

class ViajeFeliz
{
    private $codigoViaje;//int
    private $destino;//string
    private $cantidadPasajero=0;
    private $cantMaximaPasajeros;//int-6
    private $coleccionPasajeros=[];// nombre,apellido,DNI-8

    public function __construct($codigo, $destino,$cantMaximaDePasajeros)
    {
        $this->codigoViaje=$codigo;
        $this->destino=$destino;
        $this->cantMaximaPasajeros=$cantMaximaDePasajeros;
    
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
     * Get the value of cantidadPasajero
     */ 
    public function getCantidadPasajero()
    {
        return $this->cantidadPasajero;
    }

    /**
     * Set the value of cantidadPasajero
     *
     * @return  self
     */ 
    public function setCantidadPasajero($cantidadPasajero)
    {
        $this->cantidadPasajero = $cantidadPasajero;

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
    public function agregarPasajero($pasajero)
    {
        $psajero_="";
        if (in_array($pasajero,$this->getColeccionPasajeros())) {//****ojo */in_array — Comprueba si un valor existe en un array

            $psajero_="El pasajero:\n".$pasajero." tiene un asiento en el viaje\n";
        } else {
            //array_push — Inserta uno o más elementos al final de un array
            array_push($this->coleccionPasajeros,$pasajero);
            $this->cantMaximaPasajeros+1;//ojo de
            $psajero_="Usted a añadido correctamente un pasajero\n";
        }
        return $psajero_;
        
    }

    public function quedaLugar()
    {
        $res= true;
        if ($this->getCantMaximaPasajeros()<=(count($this->coleccionPasajeros))) {
            $res=false;
        }
        return $res;
    }
    public function eliminarPasajero($pasajero)
    {
        $psajero_="El pasajero no esta registrado en este viaje\n";
        if (in_array($pasajero,$this->getColeccionPasajeros())) {
            //array_search — Busca un valor determinado en un array y devuelve la primera clave correspondiente en caso de éxito
            $key =array_search($pasajero, $this->coleccionPasajeros);
            //array_splice — Elimina una porción del array y la reemplaza con otra cosa
            array_splice($this->coleccionPasajeros,$key,1);
            $this->cantMaximaPasajeros-1;
            $psajero_="Pasajero borrado correctamente\n";
        }
        return $psajero_;
    }
    public function cambiaDatosPasajeros($pasajero, $otroPasajero)
    {
        $psajero_="El pasajero no existe en nuestros registros\n";
        if (in_array($pasajero,$this->getColeccionPasajeros())) {
            $key =array_search($pasajero, $this->getColeccionPasajeros());
            $this->coleccionPasajeros[$key]=$otroPasajero;
            $psajero_="El dato de a sido modificado\n";
        }
        return $psajero_;
    }
    public function mostrarPasajero()
    {
        $mostrarStrPasajero="";
        foreach ($this->coleccionPasajeros as $key => $value) {
            $Dni=$value["DNI"];
            $nombre=$value["nombre"];
            $apellido=$value["apellido"];
            $mostrarStrPasajero="Nombre:".$nombre."\n"."Apellido:".$apellido."\n"."DNI:".$Dni."\n";
        }
        return $mostrarStrPasajero;
    }
    //to_string
    public function __toString()
    {
     $pasajeros=$this->mostrarPasajero();
     $psajero_="Viaje:{$this->getCodigoViaje()}\n
     Destino:{$this->getDestino()}\n
     Capacidad maxima de ocupantes:{$this->getCantMaximaPasajeros()}\n
     Asientos ocupados:{$this->getCantidadPasajero()}\n
     Datos pasajeros: $pasajeros\n";
     return $psajero_;
    }
}
