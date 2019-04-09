<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsArsyeUjitje
 *
 * @ORM\Table(name="settings_arsye_ujitje")
 * @ORM\Entity
 */
class SettingsArsyeUjitje
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
     * @ORM\Column(name="arsyeja_ujitjes", type="string", length=100, nullable=true)
     */
    private $arsyejaUjitjes;



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
     * Set arsyejaUjitjes
     *
     * @param string $arsyejaUjitjes
     * @return SettingsArsyeUjitje
     */
    public function setArsyejaUjitjes($arsyejaUjitjes)
    {
        $this->arsyejaUjitjes = $arsyejaUjitjes;

        return $this;
    }

    /**
     * Get arsyejaUjitjes
     *
     * @return string 
     */
    public function getArsyejaUjitjes()
    {
        return $this->arsyejaUjitjes;
    }

    public function __toString(){
        return $this->arsyejaUjitjes;
    }
}
