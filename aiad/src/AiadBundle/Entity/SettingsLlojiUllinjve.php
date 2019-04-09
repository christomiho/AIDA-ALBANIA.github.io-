<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsLlojiUllinjve
 *
 * @ORM\Table(name="settings_lloji_ullinjve")
 * @ORM\Entity
 */
class SettingsLlojiUllinjve
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
     * @ORM\Column(name="lloji_ullinjve", type="string", length=150, nullable=true)
     */
    private $llojiUllinjve;



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
     * Set llojiUllinjve
     *
     * @param string $llojiUllinjve
     * @return SettingsLlojiUllinjve
     */
    public function setLlojiUllinjve($llojiUllinjve)
    {
        $this->llojiUllinjve = $llojiUllinjve;

        return $this;
    }

    /**
     * Get llojiUllinjve
     *
     * @return string 
     */
    public function getLlojiUllinjve()
    {
        return $this->llojiUllinjve;
    }
    public function __toString()
    {
        return $this->llojiUllinjve;
    }
}
