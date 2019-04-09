<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LlojiProduktitKomercial
 *
 * @ORM\Table(name="lloji_produktit_komercial")
 * @ORM\Entity
 */
class LlojiProduktitKomercial
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
     * @ORM\Column(name="lloji_produktit", type="string", length=100, nullable=true)
     */
    private $llojiProduktit;

    /**
     * @return string
     */
    public function __toString(){
        return $this->getLlojiProduktit();
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
     * Set llojiProduktit
     *
     * @param string $llojiProduktit
     * @return LlojiProduktitKomercial
     */
    public function setLlojiProduktit($llojiProduktit)
    {
        $this->llojiProduktit = $llojiProduktit;

        return $this;
    }

    /**
     * Get llojiProduktit
     *
     * @return string 
     */
    public function getLlojiProduktit()
    {
        return $this->llojiProduktit;
    }
}
