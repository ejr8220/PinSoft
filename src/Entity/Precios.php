<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="""inventario""", name="""Precios""")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PreciosRepository")
 */
class Precios
{
    /**
    * @var integer $id
    *
    * @ORM\Column(name="ID_PRECIO", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\SequenceGenerator(sequenceName= """inventario"".SEQ_PRECIOS", allocationSize=1, initialValue=1)
    */
    private $id;
 
    /**
     * @var string $estado
     * 
     * @ORM\Column(name="estado", type="string")
     */
    private $estado;


 
    /**
     * @var datetime $feCreacion
     * 
     * @ORM\Column(name="fe_creacion", type="datetime")
     */
    private $feCreacion;


 /**
     * @var string $ipCreacion
     * 
     * @ORM\Column(name="ip_creacion", type="string")
     */
    private $ipCreacion;

 
       /**
     * @var Integer $usuarioCreacion
     * 
     * @ORM\Column(name="usuario_creacion", type="integer")
     */
    private $usuarioCreacion;

    
       /**
     * @var datetime $feModifica
     * 
     * @ORM\Column(name="fe_modifica", type="datetime")
     */
    private $feModifica;


 
    
       /**
     * @var Integer $usuarioModifica
     * 
     * @ORM\Column(name="usuario_modifica", type="integer")
     */
    private $usuarioModifica;

 /**
     * @var string $ipModifica
     * 
     * @ORM\Column(name="ip_modifica", type="string")
     */
    private $ipModifica;

    /**
     * @var Integer $productoId
     * 
     * @ORM\Column(name="producto_id", type="integer")
     */
    private $productoId;



    /**
     * @var Integer $tipoId
     * 
     * @ORM\Column(name="tipo_id", type="integer")
     */
    private $tipoId;



    /**
     * @var Integer $precioId
     * 
     * @ORM\Column(name="precio_id", type="integer")
     */
    private $precioId;



    /**
     * @var Float $precio
     * 
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;



    /**
     * @var datetime $feDesde
     * 
     * @ORM\Column(name="fe_desde", type="datetime")
     */
    private $feDesde;


    /**
     * @var datetime $feHasta
     * 
     * @ORM\Column(name="fe_hasta", type="datetime")
     */
    private $feHasta;


    /**
     * @var Boolean $aplicaProm
     * 
     * @ORM\Column(name="aplica_prom", type="boolean")
     */
    private $aplicaProm;


    /**
     * @var Integer $empaques
     * 
     * @ORM\Column(name="empaques", type="integer")
     */
    private $empaques;


    /**
     * @var integer $rango
     * 
     * @ORM\Column(name="rango", type="integer")
     */
    private $rango;



    /**
     * @var integer $factor
     * 
     * @ORM\Column(name="factor", type="integer")
     */
    private $factor;

    


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
     * Get $estado
     *
     * @return  string
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set $estado
     *
     * @param  string  $estado  $estado
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
     * @return  datetime
     */ 
    public function getFeCreacion()
    {
        return $this->feCreacion;
    }

    /**
     * Set $feCreacion
     *
     * @param  datetime  $feCreacion  $feCreacion
     *
     * @return  self
     */ 
    public function setFeCreacion(Datetime $feCreacion)
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
     * Get $productoId
     *
     * @return  string
     */ 
    public function getProductoId()
    {
        return $this->productoId;
    }

    /**
     * Set $productoId
     *
     * @param  string  $productoId  $productoId
     *
     * @return  self
     */ 
    public function setProductoId(string $productoId)
    {
        $this->productoId = $productoId;

        return $this;
    }

    /**
     * Get $tipoId
     *
     * @return  string
     */ 
    public function getTipoId()
    {
        return $this->tipoId;
    }

    /**
     * Set $tipoId
     *
     * @param  string  $tipoId  $tipoId
     *
     * @return  self
     */ 
    public function setTipoId(string $tipoId)
    {
        $this->tipoId = $tipoId;

        return $this;
    }

    /**
     * Get $precioId
     *
     * @return  string
     */ 
    public function getPrecioId()
    {
        return $this->precioId;
    }

    /**
     * Set $precioId
     *
     * @param  string  $precioId  $precioId
     *
     * @return  self
     */ 
    public function setPrecioId(string $precioId)
    {
        $this->precioId = $precioId;

        return $this;
    }

    /**
     * Get $precio
     *
     * @return  string
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set $precio
     *
     * @param  string  $precio  $precio
     *
     * @return  self
     */ 
    public function setPrecio(string $precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get $feDesde
     *
     * @return  string
     */ 
    public function getFeDesde()
    {
        return $this->feDesde;
    }

    /**
     * Set $feDesde
     *
     * @param  string  $feDesde  $feDesde
     *
     * @return  self
     */ 
    public function setFeDesde(string $feDesde)
    {
        $this->feDesde = $feDesde;

        return $this;
    }

    /**
     * Get $feHasta
     *
     * @return  string
     */ 
    public function getFeHasta()
    {
        return $this->feHasta;
    }

    /**
     * Set $feHasta
     *
     * @param  string  $feHasta  $feHasta
     *
     * @return  self
     */ 
    public function setFeHasta(string $feHasta)
    {
        $this->feHasta = $feHasta;

        return $this;
    }

    /**
     * Get $aplicaProm
     *
     * @return  integer
     */ 
    public function getAplicaProm()
    {
        return $this->aplicaProm;
    }

    /**
     * Set $aplicaProm
     *
     * @param  integer  $aplicaProm  $aplicaProm
     *
     * @return  self
     */ 
    public function setAplicaProm($aplicaProm)
    {
        $this->aplicaProm = $aplicaProm;

        return $this;
    }

    /**
     * Get $empaques
     *
     * @return  integer
     */ 
    public function getEmpaques()
    {
        return $this->empaques;
    }

    /**
     * Set $empaques
     *
     * @param  integer  $empaques  $empaques
     *
     * @return  self
     */ 
    public function setEmpaques($empaques)
    {
        $this->empaques = $empaques;

        return $this;
    }

    /**
     * Get $rango
     *
     * @return  integer
     */ 
    public function getRango()
    {
        return $this->rango;
    }

    /**
     * Set $rango
     *
     * @param  integer  $rango  $rango
     *
     * @return  self
     */ 
    public function setRango($rango)
    {
        $this->rango = $rango;

        return $this;
    }

    /**
     * Get $factor
     *
     * @return  integer
     */ 
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * Set $factor
     *
     * @param  integer  $factor  $factor
     *
     * @return  self
     */ 
    public function setFactor($factor)
    {
        $this->factor = $factor;

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
}