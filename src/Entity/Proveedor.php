<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="""inventario""", name="proveedor")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ProveedorRepository")
 */
class Proveedor
{
    /**
    * @var integer $id
    *
    * @ORM\Column(name="ID_PROVEEDOR", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\SequenceGenerator(sequenceName= """inventario"".SEQ_PROVEEDOR", allocationSize=1, initialValue=1)
    */
    private $id;

    /**
     * @var integer $ruc
     * 
     * @ORM\Column(name="ruc", type="integer")
     */
    private $ruc;

    
    /**
     * @var string $nombreEmpresa
     * 
     * @ORM\Column(name="nombre_empresa", type="string")
     */
    private $nombreEmpresa;

    
    /**
     * @var string $direccion
     * 
     * @ORM\Column(name="direccion", type="string")
     */
    private $direccion;

    
    /**
     * @var string $codigoPostal
     * 
     * @ORM\Column(name="codigo_postal", type="string")
     */
    private $codigoPostal;

    
    /**
     * @var string $email
     * 
     * @ORM\Column(name="email", type="string")
     */
    private $email;

    
    /**
     * @var string $telefono
     * 
     * @ORM\Column(name="telefono", type="string")
     */
    private $telefono;

    
    /**
     * @var string $localidad
     * 
     * @ORM\Column(name="localidad", type="string")
     */
    private $localidad;

    
    /**
     * @var string $estado
     * 
     * @ORM\Column(name="estado", type="string")
     */
    private $estado;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

     /**
      * Get the value of ruc
      */ 
     public function getRuc()
     {
          return $this->ruc;
     }

     /**
      * Set the value of ruc
      *
      * @return  self
      */ 
     public function setRuc($ruc)
     {
          $this->ruc = $ruc;

          return $this;
     }

     /**
      * Get the value of nombreEmpresa
      */ 
     public function getNombreEmpresa()
     {
          return $this->nombreEmpresa;
     }

     /**
      * Set the value of nombreEmpresa
      *
      * @return  self
      */ 
     public function setNombreEmpresa($nombreEmpresa)
     {
          $this->nombreEmpresa = $nombreEmpresa;

          return $this;
     }

     /**
      * Get the value of direccion
      */ 
     public function getDireccion()
     {
          return $this->direccion;
     }

     /**
      * Set the value of direccion
      *
      * @return  self
      */ 
     public function setDireccion($direccion)
     {
          $this->direccion = $direccion;

          return $this;
     }

     /**
      * Get the value of codigoPostal
      */ 
     public function getCodigoPostal()
     {
          return $this->codigoPostal;
     }

     /**
      * Set the value of codigoPostal
      *
      * @return  self
      */ 
     public function setCodigoPostal($codigoPostal)
     {
          $this->codigoPostal = $codigoPostal;

          return $this;
     }

     /**
      * Get the value of email
      */ 
     public function getEmail()
     {
          return $this->email;
     }

     /**
      * Set the value of email
      *
      * @return  self
      */ 
     public function setEmail($email)
     {
          $this->email = $email;

          return $this;
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

          return $this;
     }

     /**
      * Get the value of localidad
      */ 
     public function getLocalidad()
     {
          return $this->localidad;
     }

     /**
      * Set the value of localidad
      *
      * @return  self
      */ 
     public function setLocalidad($localidad)
     {
          $this->localidad = $localidad;

          return $this;
     }

     /**
      * Get the value of estado
      */ 
     public function getEstado()
     {
          return $this->estado;
     }

     /**
      * Set the value of estado
      *
      * @return  self
      */ 
     public function setEstado($estado)
     {
          $this->estado = $estado;

          return $this;
     }
}