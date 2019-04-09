<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kultivaret
 *
 * @ORM\Table(name="kultivaret")
 * @ORM\Entity
 */
class Kultivaret
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="kultivari", type="string", length=150, nullable=true)
     */
    private $kultivari;

    /**
     * @return string
     */
   public function __toString(){
       return $this->kultivari;
   }

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
     * Set kultivari
     *
     * @param string $kultivari
     * @return Kultivaret
     */
    public function setKultivari($kultivari)
    {
        $this->kultivari = $kultivari;

        return $this;
    }

    /**
     * Get kultivari
     *
     * @return string 
     */
    public function getKultivari()
    {
        return $this->kultivari;
    }
}
