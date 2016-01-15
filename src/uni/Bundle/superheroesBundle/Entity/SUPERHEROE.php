<?php

namespace uni\Bundle\superheroesBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SUPERHEROE
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SUPERHEROE
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
     * @ORM\Column(name="Nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="Habilidades", type="string", length=50)
     */
    private $habilidades;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Edad", type="date")
     */
    private $edad;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexo", type="string", length=10)
     */
    private $sexo;


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
     * Set nombre
     *
     * @param string $nombre
     * @return SUPERHEROE
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return SUPERHEROE
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
     * Set habilidades
     *
     * @param string $habilidades
     * @return SUPERHEROE
     */
    public function setHabilidades($habilidades)
    {
        $this->habilidades = $habilidades;

        return $this;
    }

    /**
     * Get habilidades
     *
     * @return string 
     */
    public function getHabilidades()
    {
        return $this->habilidades;
    }

    /**
     * Set edad
     *
     * @param \DateTime $edad
     * @return SUPERHEROE
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return \DateTime 
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return SUPERHEROE
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }
    /**
* @ORM\ManyToOne(targetEntity="TIPOS", inversedBy="ALLSUPERHEROE", cascade={"remove"})

*/
protected $ALLTIPOS;


/**
* @ORM\ManyToMany(targetEntity="ZONAS", mappedBy="ALLSUPERHEROE")
*
*/
private $ALLZONAS;

public function __construct() {
$this->ALLZONAS = new ArrayCollection();
}

    /**
     * Set ALLTIPOS
     *
     * @param \uni\Bundle\superheroesBundle\Entity\TIPOS $aLLTIPOS
     * @return SUPERHEROE
     */
    public function setALLTIPOS(\uni\Bundle\superheroesBundle\Entity\TIPOS $aLLTIPOS = null)
    {
        $this->ALLTIPOS = $aLLTIPOS;

        return $this;
    }

    /**
     * Get ALLTIPOS
     *
     * @return \uni\Bundle\superheroesBundle\Entity\TIPOS 
     */
    public function getALLTIPOS()
    {
        return $this->ALLTIPOS;
    }

    /**
     * Add ALLZONAS
     *
     * @param \uni\Bundle\superheroesBundle\Entity\ZONAS $aLLZONAS
     * @return SUPERHEROE
     */
    public function addALLZONA(\uni\Bundle\superheroesBundle\Entity\ZONAS $aLLZONAS)
    {
        $this->ALLZONAS[] = $aLLZONAS;

        return $this;
    }

    /**
     * Remove ALLZONAS
     *
     * @param \uni\Bundle\superheroesBundle\Entity\ZONAS $aLLZONAS
     */
    public function removeALLZONA(\uni\Bundle\superheroesBundle\Entity\ZONAS $aLLZONAS)
    {
        $this->ALLZONAS->removeElement($aLLZONAS);
    }

    /**
     * Get ALLZONAS
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getALLZONAS()
    {
        return $this->ALLZONAS;
    }
}
