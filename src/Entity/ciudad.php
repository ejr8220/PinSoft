<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(schema="""General""", name="CIUDAD")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CiudadRepository")
 */
class Ciudad
{
    /**
    * @var integer $id
    *
    * @ORM\Column(name="ID_CIUDAD", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\SequenceGenerator(sequenceName="SEQ_CIUDAD", allocationSize=1, initialValue=1)
    */
    private $id;

    /**
    * @var InfoPunto
    *
    * @ORM\ManyToOne(targetEntity="Pais")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="PROVINCIA_ID", referencedColumnName="ID_PUNTO")
    * })
    */


}   
