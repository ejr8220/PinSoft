<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="""inventario""", name="""Imagenes""")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ImagenesRepository")
 */
class Imagenes
{
    /**
    * @var integer $id
    *
    * @ORM\Column(name="ID_IMAGEN", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\SequenceGenerator(sequenceName= """inventario"".SEQ_IMAGENES", allocationSize=1, initialValue=1)
    */
    private $id;

    /**
     * @var integer $productoId
     * 
     * @ORM\Column(name="producto_id", type="integer")
     */
    private $productoId;

    /**
     * @var string $ruta
     * 
     * @ORM\Column(name="ruta", type="string")
     */
    private $ruta;


    
    /**
     * @var string $principal
     * 
     * @ORM\Column(name="principal", type="string")
     */
    private $principal;

    
    /**
     * @var string $estado
     * 
     * @ORM\Column(name="estado", type="string")
     */
    private $estado;

    /**
     * @var string $feCreacion
     * 
     * @ORM\Column(name="fe_creacion", type="datetime")
     */
    private $feCreacion;


 
       /**
     * @var string $usuarioCreacion
     * 
     * @ORM\Column(name="usuario_creacion", type="integer")
     */
    private $usuarioCreacion;


     /**
     * @var string $ipCreacion
     * 
     * @ORM\Column(name="ip_creacion", type="string")
     */
    private $ipCreacion;
    
       /**
     * @var string $feModifica
     * 
     * @ORM\Column(name="fe_modifica", type="datetime")
     */
    private $feModifica;

    
       /**
     * @var string $usuarioModifica
     * 
     * @ORM\Column(name="usuario_modifica", type="string")
     */
    private $usuarioModifica;

     /**
     * @var string $ipModifica
     * 
     * @ORM\Column(name="ip_modifica", type="string")
     */
    private $ipModifica;
    

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
     * Set $id
     *
     * @param  integer  $id  $id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get $estado
     *
     * @return  integer
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set $estado
     *
     * @param  integer  $estado  $estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get $feCreacion
     *
     * @return  string
     */ 
    public function getFeCreacion()
    {
        return $this->feCreacion;
    }

    /**
     * Set $feCreacion
     *
     * @param  string  $feCreacion  $feCreacion
     *
     * @return  self
     */ 
    public function setFeCreacion(string $feCreacion)
    {
        $this->feCreacion = $feCreacion;

        return $this;
    }

    /**
     * Get $usuarioCreacion
     *
     * @return  string
     */ 
    public function getUsuarioCreacion()
    {
        return $this->usuarioCreacion;
    }

    /**
     * Set $usuarioCreacion
     *
     * @param  string  $usuarioCreacion  $usuarioCreacion
     *
     * @return  self
     */ 
    public function setUsuarioCreacion(string $usuarioCreacion)
    {
        $this->usuarioCreacion = $usuarioCreacion;

        return $this;
    }

    /**
     * Get $feModifica
     *
     * @return  string
     */ 
    public function getFeModifica()
    {
        return $this->feModifica;
    }

    /**
     * Set $feModifica
     *
     * @param  string  $feModifica  $feModifica
     *
     * @return  self
     */ 
    public function setFeModifica(string $feModifica)
    {
        $this->feModifica = $feModifica;

        return $this;
    }

    /**
     * Get $usuarioModifica
     *
     * @return  string
     */ 
    public function getUsuarioModifica()
    {
        return $this->usuarioModifica;
    }

    /**
     * Set $usuarioModifica
     *
     * @param  string  $usuarioModifica  $usuarioModifica
     *
     * @return  self
     */ 
    public function setUsuarioModifica(string $usuarioModifica)
    {
        $this->usuarioModifica = $usuarioModifica;

        return $this;
    }

    
    /**
     * Get $ipCreacion
     *
     * @return  string
     */ 
    public function getIpCreacion()
    {
        return $this->ipCreacion;
    }

    /**
     * Set $ipCreacion
     *
     * @param  string  $ipCreacion  $ipCreacion
     *
     * @return  self
     */ 
    public function setIpCreacion(string $ipCreacion)
    {
        $this->ipCreacion = $ipCreacion;

        return $this;
    }

    /**
     * Get $ipModifica
     *
     * @return  string
     */ 
    public function getIpModifica()
    {
        return $this->ipModifica;
    }

    /**
     * Set $ipModifica
     *
     * @param  string  $ipModifica  $ipModifica
     *
     * @return  self
     */ 
    public function setIpModifica(string $ipModifica)
    {
        $this->ipModifica = $ipModifica;

        return $this;
    }


    /**
     * Get $ruta
     *
     * @return  string
     */ 
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set $ruta
     *
     * @param  string  $ruta  $ruta
     *
     * @return  self
     */ 
    public function setRuta(string $ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get $principal
     *
     * @return  string
     */ 
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Set $principal
     *
     * @param  string  $principal  $principal
     *
     * @return  self
     */ 
    public function setPrincipal(string $principal)
    {
        $this->principal = $principal;

        return $this;
    }

    /**
     * Get $productoId
     *
     * @return  integer
     */ 
    public function getProductoId()
    {
        return $this->productoId;
    }

    /**
     * Set $productoId
     *
     * @param  integer  $productoId  $productoId
     *
     * @return  self
     */ 
    public function setProductoId($productoId)
    {
        $this->productoId = $productoId;

        return $this;
    }
}