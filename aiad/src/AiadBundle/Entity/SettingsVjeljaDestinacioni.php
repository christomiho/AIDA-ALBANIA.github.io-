<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsVjeljaDestinacioni
 *
 * @ORM\Table(name="settings_vjelja_destinacioni")
 * @ORM\Entity
 */
class SettingsVjeljaDestinacioni
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
     * @ORM\Column(name="destinacioni", type="string", length=150, nullable=true)
     */
    private $destinacioni;



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
     * Set destinacioni
     *
     * @param string $destinacioni
     * @return SettingsVjeljaDestinacioni
     */
    public function setDestinacioni($destinacioni)
    {
        $this->destinacioni = $destinacioni;

        return $this;
    }

    /**
     * Get destinacioni
     *
     * @return string 
     */
    public function getDestinacioni()
    {
        return $this->destinacioni;
    }
    public function __toString()
    {
        return $this->destinacioni;
    }
}
