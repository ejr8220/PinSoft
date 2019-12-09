<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="""Login""", name="""Usuario""")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
    * @var integer $id
    *
    * @ORM\Column(name="ID_USUARIO", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\SequenceGenerator(sequenceName= """Login"".SEQ_USUARIO", allocationSize=1, initialValue=1)
    */
    private $id;
 
    /**
     * @var integer $usuario
     * 
     * @ORM\Column(name="NOMBRE_USUARIO", type="string")
     */
    private $usuario;
 
    /**
     * @var string $clave
     * 
     * @ORM\Column(name="CLAVE", type="string")
     */
    private $clave;
 
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
     * Get $usuario
     *
     * @return  string
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set $usuario
     *
     * @param  string  $usuario 
     *
     * @return  self
     */ 
    public function setUsario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * Get $clave
     *
     * @return  string
     */ 
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set $clave
     *
     * @param  string  $clave
     *
     * @return  self
     */ 
    public function setClave(string $clave)
    {
        $this->clave = $clave;

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
