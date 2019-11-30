<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="""seguridad""", name="usuario")
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
    * @ORM\SequenceGenerator(sequenceName= """seguridad"".SEQ_USUARIO", allocationSize=1, initialValue=1)
    */
    private $id;

	


    /**
     * @var integer $cedula
     * 
     * @ORM\Column(name="cedula", type="integer")
     */
    private $cedula;
    /**
     * @var string $nombre
     * 
     * @ORM\Column(name="nombre", type="string")
     */
    private $nombre;
    /**
     * @var string $apellido
     * 
     * @ORM\Column(name="apellido", type="string")
     */
    private $apellido;
    /**
     * @var string $correo
     * 
     * @ORM\Column(name="correo", type="string")
     */
    private $correo;
    /**
     * @var string $nombreUsuario
     * 
     * @ORM\Column(name="nombre_usuario", type="string")
     */
    private $nombreUsuario;
 
    /**
     * @var string $contrasenia
     * 
     * @ORM\Column(name="contrasenia", type="string")
     */
    private $contrasenia;
 
    /**
     * @var string $estado
     * 
     * @ORM\Column(name="estado", type="string")
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
      * Get the value of cedula
      */ 
     public function getCedula()
     {
          return $this->cedula;
     }

     /**
      * Set the value of cedula
      *
      * @return  self
      */ 
     public function setCedula($cedula)
     {
          $this->cedula = $cedula;

          return $this;
     }

    /**
     * Get $nombre
     *
     * @return  string
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set $nombre
     *
     * @param  string  $nombre  $nombre
     *
     * @return  self
     */ 
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get $apellido
     *
     * @return  string
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set $apellido
     *
     * @param  string  $apellido  $apellido
     *
     * @return  self
     */ 
    public function setApellido(string $apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get $correo
     *
     * @return  string
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set $correo
     *
     * @param  string  $correo  $correo
     *
     * @return  self
     */ 
    public function setCorreo(string $correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get $nombreUsuario
     *
     * @return  string
     */ 
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set $nombreUsuario
     *
     * @param  string  $nombreUsuario  $nombreUsuario
     *
     * @return  self
     */ 
    public function setNombreUsuario(string $nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get $contrasenia
     ** @return  string
     */ 
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    /**
     * Set $contrasenia
     *
     * @param  string  $contrasenia  $contrasenia
     *
     * @return  self
     */ 
    public function setContrasenia(string $contrasenia)
    {
        $this->contrasenia = $contrasenia;

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
}   
