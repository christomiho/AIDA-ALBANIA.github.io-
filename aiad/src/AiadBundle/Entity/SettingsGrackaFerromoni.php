<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsGrackaFerromoni
 *
 * @ORM\Table(name="settings_gracka_ferromoni")
 * @ORM\Entity
 */
class SettingsGrackaFerromoni
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
     * @ORM\Column(name="ferromoni", type="string", length=100, nullable=true)
     */
    private $ferromoni;

    /**
     * @return string
     */
public function __toString(){
    return $this->getFerromoni();
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
     * Set ferromoni
     *
     * @param string $ferromoni
     * @return SettingsGrackaFerromoni
     */
    public function setFerromoni($ferromoni)
    {
        $this->ferromoni = $ferromoni;

        return $this;
    }

    /**
     * Get ferromoni
     *
     * @return string 
     */
    public function getFerromoni()
    {
        return $this->ferromoni;
    }
}
