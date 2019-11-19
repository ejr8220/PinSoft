<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="""General""", name="PROVINCIA")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ProvinciaRepository")
 */
class Provincia
{
    /**
    * @var integer $id
    *
    * @ORM\Column(name="ID_PROVINCIA", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\SequenceGenerator(sequenceName="SEQ_PROVINCIA", allocationSize=1, initialValue=1)
    */
    private $id;

    /**
    * @var Pais
    *
    * @ORM\ManyToOne(targetEntity="Pais")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="PAIS_ID", referencedColumnName="ID_PAIS")
    * })
    */
    private $provinciaId;

    /**
     * @var string $codigo
     * 
     * @ORM\Column(name="CODIGO", type="string")
     */
    private $codigo;

    /**
     * @var string $nombreProvincia
     * 
     * @ORM\Column(name="NOMBRE_PROVINCIA", type="string")
     */
    private $nombreProvincia;



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
     * Get the value of provinciaId
     *
     * @return  Pais
     */ 
    public function getProvinciaId()
    {
        return $this->provinciaId;
    }

    /**
     * Set the value of provinciaId
     *
     * @param  Pais  $provinciaId
     *
     * @return  self
     */ 
    public function setProvinciaId(Pais $provinciaId)
    {
        $this->provinciaId = $provinciaId;

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
     * Get $nombreProvincia
     *
     * @return  string
     */ 
    public function getNombreProvincia()
    {
        return $this->nombreProvincia;
    }

    /**
     * Set $nombreProvincia
     *
     * @param  string  $nombreProvincia  $nombreProvincia
     *
     * @return  self
     */ 
    public function setNombreProvincia(string $nombreProvincia)
    {
        $this->nombreProvincia = $nombreProvincia;

        return $this;
    }
}   
