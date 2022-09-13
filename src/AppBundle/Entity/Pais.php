<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table(name="pais", uniqueConstraints={@ORM\UniqueConstraint(name="abrev", columns={"abrev"})})
 * @ORM\Entity
 */

//          DECLARACIÓN TABLA PAIS

class Pais
{
    //  CAMPO DESCRIPCIÓN
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=false)
     */
    private $descripcion;

    // CAMPO ABREVIACIÓN
    /**
     * @var string
     *
     * @ORM\Column(name="abrev", type="string", length=10, nullable=false)
     */
    private $abrev;

    //  CAMPO ACTIVO
    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    private $activo = true;

    //  CAMPO ID
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Pais
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     * 
     * @return string
     *
     */

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set abrev
     *
     * @param string $abrev
     *
     * @return Pais
     */
    public function setAbrev($abrev)
    {
        $this->abrev = $abrev;

        return $this;
    }

     /**
     * Get abrev
     * 
     * @return string
     *
     */

    public function getAbrev()
    {
        return $this->abrev;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Pais
     */
    public function setActivo(?bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     * 
     * @return boolean
     *
     */

    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Get id
     * 
     * @return integer
     *
     */

    public function getId()
    {
        return $this->id;
    }

}

