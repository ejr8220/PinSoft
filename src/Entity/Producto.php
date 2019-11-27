<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="""inventario""", name="producto")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ProductoRepository")
 */
class Producto
{
    /**
    * @var integer $id
    *
    * @ORM\Column(name="ID_PRODUCTO", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\SequenceGenerator(sequenceName= """inventario"".SEQ_PRODUCTO", allocationSize=1, initialValue=1)
    */
    private $id;
 
   
    
    /**
     * @var string $feCreacion
     * 
     * @ORM\Column(name="FE_CREACION", type="string")
     */
    private $feCreacion;

    
    /**
     * @var integer  $usuarioCreacion
     * 
     * @ORM\Column(name="USUARIO_CREACION", type="integer")
     */
    private $usuarioCreacion;

    /**
     * @var  string $feModifica
     * 
     * @ORM\Column(name="FE_MODIFICA", type="string")
     */
    private $feModifica;

    /**
     * @var  string $usuarioModifica
     * 
     * @ORM\Column(name="USUARIO_MODIFICA", type="string")
     */
    private $usuarioModifica;

    /**
     * @var string  $codigo
     * 
     * @ORM\Column(name="CODIGO", type="string")
     */
    private $codigo;

    /**
     * @var string $codigoBarra
     * 
     * @ORM\Column(name="CODIGO_BARRA", type="string")
     */
    private $codigoBarra;

    /**
     * @var  string $nombreProducto
     * 
     * @ORM\Column(name="NOMBRE_PRODUCTO", type="string")
     */
    private $nombreProducto;

    /**
     * @var  string $feIngreso
     * 
     * @ORM\Column(name="FE_INGRESO", type="string")
     */
    private $feIngreso;

    /**
     * @var  integer $lineaId
     * 
     * @ORM\Column(name="LINEA_ID", type="integer")
     */
    private $lineaId;

    /**
     * @var  integer $grupoId
     * 
     * @ORM\Column(name="GRUPO_ID", type="integer")
     */
    private $grupoId;



    /**
     * @var integer $subgrupoId
     * 
     * @ORM\Column(name="SUBGRUPO_ID", type="integer")
     */
    private $subgrupoId;

    /**
     * @var integer $tipoProductoId
     * 
     * @ORM\Column(name="TIPO_PRODUCTO_ID", type="integer")
     */
    private $tipoProductoId;

    
    /**
     * @var string  $estado
     * 
     * @ORM\Column(name="ESTADO", type="string")
     */
    private $estado;

    /**
     * @var string $bdEstado
     * 
     * @ORM\Column(name="BD_ESTADO", type="string")
     */
    private $bdEstado;

    /**
     * @var  string $ipCreacion
     * 
     * @ORM\Column(name="IP_CREACION", type="string")
     */
    private $ipCreacion;

    /**
     * @var  string $ipModifica
     * 
     * @ORM\Column(name="IP_MODIFICA", type="string")
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
    public function setFeCreacion($feCreacion)
    {
        $this->feCreacion = $feCreacion;

        return $this;
    }

    /**
     * Get $usuarioCreacion
     *
     * @return  integer
     */ 
    public function getUsuarioCreacion()
    {
        return $this->usuarioCreacion;
    }

    /**
     * Set $usuarioCreacion
     *
     * @param  integer  $usuarioCreacion  $usuarioCreacion
     *
     * @return  self
     */ 
    public function setUsuarioCreacion($usuarioCreacion)
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
     * @param  string  $feModifica  
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
     * Get $codigo
     *
     * @return  string
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set $codigo
     *
     * @param  string  $codigo  $codigo
     *
     * @return  self
     */ 
    public function setCodigo(string $codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get $codigoBarra
     *
     * @return  string
     */ 
    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }

    /**
     * Set $codigoBarra
     *
     * @param  string  $codigoBarra  $codigoBarra
     *
     * @return  self
     */ 
    public function setCodigoBarra( $codigoBarra)
    {
        $this->codigoBarra = $codigoBarra;

        return $this;
    }

    /**
     * Get $nombreProducto
     *
     * @return  string
     */ 
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set $nombreProducto
     *
     * @param  string  $nombreProducto  $nombreProducto
     *
     * @return  self
     */ 
    public function setNombreProducto( $nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get $feIngreso
     *
     * @return  string
     */ 
    public function getFeIngreso()
    {
        return $this->feIngreso;
    }

    /**
     * Set $feIngreso
     *
     * @param  string  $feIngreso  $feIngreso
     *
     * @return  self
     */ 
    public function setFeIngreso(string $feIngreso)
    {
        $this->feIngreso = $feIngreso;

        return $this;
    }

    /**
     * Get $lineaId
     *
     * @return  integer
     */ 
    public function getLineaId()
    {
        return $this->lineaId;
    }

    /**
     * Set $lineaId
     *
     * @param  integer  $lineaId  $lineaId
     *
     * @return  self
     */ 
    public function setLineaId($lineaId)
    {
        $this->lineaId = $lineaId;

        return $this;
    }

    /**
     * Get $grupoId
     *
     * @return  integer
     */ 
    public function getGrupoId()
    {
        return $this->grupoId;
    }

    /**
     * Set $grupoId
     *
     * @param  integer  $grupoId  $grupoId
     *
     * @return  self
     */ 
    public function setGrupoId($grupoId)
    {
        $this->grupoId = $grupoId;

        return $this;
    }

    /**
     * Get $subgrupoId
     *
     * @return  integer
     */ 
    public function getSubgrupoId()
    {
        return $this->subgrupoId;
    }

    /**
     * Set $subgrupoId
     *
     * @param  integer  $subgrupoId  $subgrupoId
     *
     * @return  self
     */ 
    public function setSubgrupoId($subgrupoId)
    {
        $this->subgrupoId = $subgrupoId;

        return $this;
    }

    /**
     * Get $tipoProductoId
     *
     * @return  integer
     */ 
    public function getTipoProductoId()
    {
        return $this->tipoProductoId;
    }

    /**
     * Set $tipoProductoId
     *
     * @param  integer  $tipoProductoId  $tipoProductoId
     *
     * @return  self
     */ 
    public function setTipoProductoId($tipoProductoId)
    {
        $this->tipoProductoId = $tipoProductoId;

        return $this;
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
    public function setEstado(string $estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get $bdEstado
     *
     * @return  string
     */ 
    public function getBdEstado()
    {
        return $this->bdEstado;
    }

    /**
     * Set $bdEstado
     *
     * @param  string  $bdEstado  $bdEstado
     *
     * @return  self
     */ 
    public function setBdEstado( string $bdEstado)
    {
        $this->bdEstado = $bdEstado;

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
