<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsSistemiUjitjes
 *
 * @ORM\Table(name="settings_sistemi_ujitjes")
 * @ORM\Entity
 */
class SettingsSistemiUjitjes
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
     * @ORM\Column(name="sistemi_ujitjes", type="string", length=100, nullable=true)
     */
    private $sistemiUjitjes;



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
     * Set sistemiUjitjes
     *
     * @param string $sistemiUjitjes
     * @return SettingsSistemiUjitjes
     */
    public function setSistemiUjitjes($sistemiUjitjes)
    {
        $this->sistemiUjitjes = $sistemiUjitjes;

        return $this;
    }

    /**
     * Get sistemiUjitjes
     *
     * @return string 
     */
    public function getSistemiUjitjes()
    {
        return $this->sistemiUjitjes;
    }

    public function __toString(){
        return $this->sistemiUjitjes;
    }
}
