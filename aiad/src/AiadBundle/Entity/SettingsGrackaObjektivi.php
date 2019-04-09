<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsGrackaObjektivi
 *
 * @ORM\Table(name="settings_gracka_objektivi")
 * @ORM\Entity
 */
class SettingsGrackaObjektivi
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
     * @ORM\Column(name="objektivi", type="string", length=150, nullable=true)
     */
    private $objektivi;
    /**
     * @return string
     */
    public function __toString(){
        return $this->getObjektivi();
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
     * Set objektivi
     *
     * @param string $objektivi
     * @return SettingsGrackaObjektivi
     */
    public function setObjektivi($objektivi)
    {
        $this->objektivi = $objektivi;

        return $this;
    }

    /**
     * Get objektivi
     *
     * @return string 
     */
    public function getObjektivi()
    {
        return $this->objektivi;
    }
}
