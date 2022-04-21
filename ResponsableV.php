<?php
/** Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje. 
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
 */

 class ResponsableV
 {
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numEmpleado,$numLicencia,$nombre,$apellido) {
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
    

    /**
     * Get the value of numEmpleado
     */ 
    public function getNumEmpleado()
    {
        return $this->numEmpleado;
    }

    /**
     * Set the value of numEmpleado
     *
     * @return  self
     */ 
    public function setNumEmpleado($numEmpleado)
    {
        $this->numEmpleado = $numEmpleado;
    }

    /**
     * Get the value of numLicencia
     */ 
    public function getNumLicencia()
    {
        return $this->numLicencia;
    }

    /**
     * Set the value of numLicencia
     *
     * @return  self
     */ 
    public function setNumLicencia($numLicencia)
    {
        $this->numLicencia = $numLicencia;

    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function __toString()
    {
        $cad= "N° Empleado: ". $this->getNumEmpleado()."\nLicencia: ". $this->getNumLicencia()."\nNombre: ". $this->getNombre()."\nApellido: ". $this->getApellido();
        return $cad;
    }
 }


//  $empleado1= new ResponsableV(123123,002,"felipe","flores");
//  echo $empleado1;