<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 *
 * @ORM\Table(name="provincia", indexes={@ORM\Index(name="pais_id", columns={"pais_id"})})
 * @ORM\Entity
 */

//          DECLARACIÓN TABLA PROVINCIAS

class Provincia
{
    //  CAMPO DESCRIPCIÓN
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=false)
     */
    private $descripcion;

    //  CAMPO ABREVIACIÓN
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

    //CAMPO PAIS (FK)
    /**
     * @var \AppBundle\Entity\Pais
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Pais", inversedBy="provincias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     * })
     */
    private $pais;

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Provincia
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
     * @return Provincia
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
     * @return Provincia
     */
    public function setActivo($activo)
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

    /**
     * Set pais
     *
     * @param \AppBundle\Entity\Pais $pais
     *
     * @return Provincia
     */
    public function setPais(\AppBundle\Entity\Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \AppBundle\Entity\Pais
     */
    public function getPais()
    {
        return $this->pais;
    }

}

