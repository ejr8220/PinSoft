<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="""Login""", name="""Aplicacion""")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\AplicacionRepository")
 */
class Aplicacion
{
    /**
    * @var integer $id
    *
    * @ORM\Column(name="ID_APLICION", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\SequenceGenerator(sequenceName= """Login"".SEQ_APLICACION", allocationSize=1, initialValue=1)
    */
    private $id;
 
    /**
     * @var integer $aplicacion
     * 
     * @ORM\Column(name="NOMBRE_APLICACION", type="string")
     */
    private $aplicacion;
 
    /**
     * @var string $tiempo
     * 
     * @ORM\Column(name="TIEMPO", type="string")
     */
    private $tiempo;
 
    /**
     * @var string $descripcion
     * 
     * @ORM\Column(name="DESCRIPCION", type="string")
     */
    private $descripcion;
    
    /**
    * @var string $fechaCreacion
    * 
    * @ORM\Column(name="FECHA_CREACION", type="string")
    */
    private $fechaCreacion;
   
    /**
    * @var string $idCreacion
    * 
    * @ORM\Column(name="ID_CREACION", type="string")
    */
    private $idCreacion;
    
    /**
    * @var string $fechaModifica
    * 
    * @ORM\Column(name="FECHA_MODIFICA", type="string")
    */
    private $fechaModifica;
   
    /**
    * @var string $idModifica
    * 
    * @ORM\Column(name="ID_MODIFICA", type="string")
    */
    private $idModifica;

    /**
     * Get $id
     *
     * @return  integer
     */ 
    public function getId()
    
    {
        return $this->id;
    }

    /**
     * Get $aplicacion
     *
     * @return  string
     */ 
    public function getAplicacion()
    {
        return $this->aplicacion;
    }

    /**
     * Set $aplicacion
     *
     * @param  string  $aplicacion 
     *
     * @return  self
     */ 
    public function setAplicacion($aplicacion)
    {
        $this->aplicacion = $aplicacion;

        return $this;
    }

    /**
     * Get $tiempo
     *
     * @return  string
     */ 
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Set $tiempo
     *
     * @param  string  $tiempo
     *
     * @return  self
     */ 
    public function setTiempo(string $tiempo)
    {
        $this->tiempo = $tiempo;
        return $this;
    }

    /**
     * Get $descripcion
     * 
     * @return  string
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set $descripcion
     *
     * @param  string  $descripcion
     *
     * @return  self
     */ 
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get $fechaCreacion
     * 
     * @return  string
     */ 
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }
    
    /**
     * Set $fechaCracion
     *
     * @param  string  $fechaCreacion
     *
     * @return  self
     */ 
    public function setFechaCreacion(string $fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }
    
    /**
     * Get $idCreacion
     * 
     * @return  string
     */ 
    public function getIdCreacion()
    {
        return $this->idCreacion;
    }

    /**
     * Set $idCracion
     *
     * @param  string  $idCreacion
     *
     * @return  self
     */ 
    public function setIdCreacion(string $idCreacion)
    {
        $this->idCreacion = $idCreacion;
    }

    /**
     * Get $fechaModifica
     * 
     * @return  string
     */ 
    public function getFechaModifica()
    {
        return $this->fechaModifica;
    }

    /**
     * Set $fechaCracion
     *
     * @param  string  $fechaModifica
     *
     * @return  self
     */ 
    public function setFechaModifica(string $fechaModifica)
    {
        $this->fechaModifica = $fechaModifica;
    }

    /**
     * Get $idModifica
     * 
     * @return  string 
     */ 
    public function getIdModifica()
    {
        return $this->IdModifica;
    }

    /**
     * Set $idCracion
     *
     * @param  string  $idModifica
     *
     * @return  self
     */ 
    public function setIdModifica(string $idModifica)
    {
        $this->idModifica = $idModifica;
    }
}
