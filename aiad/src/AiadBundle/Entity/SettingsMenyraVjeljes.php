<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsMenyraVjeljes
 *
 * @ORM\Table(name="settings_menyra_vjeljes")
 * @ORM\Entity
 */
class SettingsMenyraVjeljes
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
     * @ORM\Column(name="menyra_vjeljes", type="string", length=150, nullable=true)
     */
    private $menyraVjeljes;



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
     * Set menyraVjeljes
     *
     * @param string $menyraVjeljes
     * @return SettingsMenyraVjeljes
     */
    public function setMenyraVjeljes($menyraVjeljes)
    {
        $this->menyraVjeljes = $menyraVjeljes;

        return $this;
    }

    /**
     * Get menyraVjeljes
     *
     * @return string 
     */
    public function getMenyraVjeljes()
    {
        return $this->menyraVjeljes;
    }
    public function __toString()
    {
        return $this->menyraVjeljes;
    }
}
