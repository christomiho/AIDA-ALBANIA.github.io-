<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsMtokesSpeciamb
 *
 * @ORM\Table(name="settings_mtokes_speciamb")
 * @ORM\Entity
 */
class SettingsMtokesSpeciamb
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
     * @ORM\Column(name="specia_mbjell", type="string", length=100, nullable=true)
     */
    private $speciaMbjell;

    public function __toString(){
        return $this->speciaMbjell;
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
     * Set speciaMbjell
     *
     * @param string $speciaMbjell
     * @return SettingsMtokesSpeciamb
     */
    public function setSpeciaMbjell($speciaMbjell)
    {
        $this->speciaMbjell = $speciaMbjell;

        return $this;
    }

    /**
     * Get speciaMbjell
     *
     * @return string 
     */
    public function getSpeciaMbjell()
    {
        return $this->speciaMbjell;
    }
}
