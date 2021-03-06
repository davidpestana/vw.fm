<?php

namespace PublicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * vehiculos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class vehiculos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="marcaslug", type="string", length=255)
     */
    private $marcaslug;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=255)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="modeloslug", type="string", length=255)
     */
    private $modeloslug;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=1500)
     */
    private $descripcion;
    /**
     * @var array
     *
     * @ORM\Column(name="skills", type="array")
     */
    private $skills;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set marca
     *
     * @param string $marca
     * @return vehiculos
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    
        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return vehiculos
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    
        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set marcaslug
     *
     * @param string $marcaslug
     * @return vehiculos
     */
    public function setMarcaslug($marcaslug)
    {
        $this->marcaslug = $marcaslug;
    
        return $this;
    }

    /**
     * Get marcaslug
     *
     * @return string 
     */
    public function getMarcaslug()
    {
        return $this->marcaslug;
    }

    /**
     * Set modeloslug
     *
     * @param string $modeloslug
     * @return vehiculos
     */
    public function setModeloslug($modeloslug)
    {
        $this->modeloslug = $modeloslug;
    
        return $this;
    }

    /**
     * Get modeloslug
     *
     * @return string 
     */
    public function getModeloslug()
    {
        return $this->modeloslug;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return vehiculos
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
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set skills
     *
     * @param array $skills
     *
     * @return vehiculos
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get skills
     *
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }
}
