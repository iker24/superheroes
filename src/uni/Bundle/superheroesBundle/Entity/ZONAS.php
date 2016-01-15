<?php

namespace uni\Bundle\superheroesBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ZONAS
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ZONAS
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
     * @return ZONAS
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
     * @return ZONAS
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
* @ORM\ManyToMany(targetEntity="SUPERHEROE", inversedBy="ALLZONAS")
*/

private $ALLSUPERHEROE;

public function __construct() {
$this->ALLSUPERHEROE = new ArrayCollection();
}

    /**
     * Add ALLSUPERHEROE
     *
     * @param \uni\Bundle\superheroesBundle\Entity\SUPERHEROE $aLLSUPERHEROE
     * @return ZONAS
     */
    public function addALLSUPERHEROE(\uni\Bundle\superheroesBundle\Entity\SUPERHEROE $aLLSUPERHEROE)
    {
        $this->ALLSUPERHEROE[] = $aLLSUPERHEROE;

        return $this;
    }

    /**
     * Remove ALLSUPERHEROE
     *
     * @param \uni\Bundle\superheroesBundle\Entity\SUPERHEROE $aLLSUPERHEROE
     */
    public function removeALLSUPERHEROE(\uni\Bundle\superheroesBundle\Entity\SUPERHEROE $aLLSUPERHEROE)
    {
        $this->ALLSUPERHEROE->removeElement($aLLSUPERHEROE);
    }

    /**
     * Get ALLSUPERHEROE
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getALLSUPERHEROE()
    {
        return $this->ALLSUPERHEROE;
    }
    public function __toString() {
     return $this->nombre;
}
}
