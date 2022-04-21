<?php
/**Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje. 
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
 */

class  Pasajeros
{
    private $nombre;
    private $apellido;
    private $numDoc;
    private $telefono;
    //constructor

    public function __construct($nombre,$apellido,$numDoc,$telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDoc = $numDoc;
        $this->telefono = $telefono;
    }

    //metodos de acceso 
    
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

    /**
     * Get the value of numDoc
     */ 
    public function getNumDoc()
    {
        return $this->numDoc;
    }

    /**
     * Set the value of numDoc
     *
     * @return  self
     */ 
    public function setNumDoc($numDoc)
    {
        $this->numDoc = $numDoc;

    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

    }

    public function __toString()
    {
        $cadena="\nNombre: ". $this->getNombre()."\nApellido: ". $this->getApellido(). "\nDNI: ". $this->getNumDoc()."\nTelefono: ". $this->getTelefono();
        return $cadena;
    }
}
 
