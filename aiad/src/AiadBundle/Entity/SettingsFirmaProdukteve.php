<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsFirmaProdukteve
 *
 * @ORM\Table(name="settings_firma_produkteve")
 * @ORM\Entity
 */
class SettingsFirmaProdukteve
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
     * @ORM\Column(name="emri_firmes", type="string", length=150, nullable=true)
     */
    private $emriFirmes;
    /**
     * @return string
     */
    public function __toString(){
        return $this->getEmriFirmes();
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
     * Set emriFirmes
     *
     * @param string $emriFirmes
     * @return SettingsFirmaProdukteve
     */
    public function setEmriFirmes($emriFirmes)
    {
        $this->emriFirmes = $emriFirmes;

        return $this;
    }

    /**
     * Get emriFirmes
     *
     * @return string 
     */
    public function getEmriFirmes()
    {
        return $this->emriFirmes;
    }
}
