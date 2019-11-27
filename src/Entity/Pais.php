<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**ads
 * @ORM\Table(schema="""General""", name="pais")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PaisRepository")
 */
class Pais
{
    /**
    * @var integer $id
    *
    * @ORM\Column(name="ID_PAIS", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\SequenceGenerator(sequenceName= """General"".SEQ_PAIS", allocationSize=1, initialValue=1)
    */
    private $id;
 
    /**
     * @var integer $codigo
     * 
     * @ORM\Column(name="codigo", type="integer")
     */
    private $codigo;
 
    /**
     * @var string $iso2
     * 
     * @ORM\Column(name="iso2", type="string")
     */
    private $iso2;
 
    /**
     * @var string $iso3
     * 
     * @ORM\Column(name="iso3", type="string")
     */
    private $iso3;

    /**
     * @var string $nombrePais
     * 
     * @ORM\Column(name="NOMBRE_PAIS", type="string")
     */
    private $nombrePais;

    /**
     * @var string $estado
     * 
     * @ORM\Column(name="ESTADO", type="string")
     */
    private $estado;

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
     * Get $codigo
     *
     * @return  integer
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set $codigo
     *
     * @param  integer  $codigo 
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get $iso2
     *
     * @return  string
     */ 
    public function getIso2()
    {
        return $this->iso2;
    }

    /**
     * Set $iso2
     *
     * @param  string  $iso2 
     *
     * @return  self
     */ 
    public function setIso2(string $iso2)
    {
        $this->iso2 = $iso2;

        return $this;
    }

    /**
     * Get $iso3
     *
     * @return  string
     */ 
    public function getIso3()
    {
        return $this->iso3;
    }

    /**
     * Set $iso3
     *
     * @param  string  $iso3 
     *
     * @return  self
     */ 
    public function setIso3(string $iso3)
    {
        $this->iso3 = $iso3;

        return $this;
    }

    /**
     * Get $nombrePais
     *
     * @return  string
     */ 
    public function getNombrePais()
    {
        return $this->nombrePais;
    }

    /**
     * Set $nombrePais
     *
     * @param  string  $nombrePais
     *
     * @return  self
     */ 
    public function setNombrePais(string $nombrePais)
    {
        $this->nombrePais = $nombrePais;

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
    }
}
