<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsLendaAktive
 *
 * @ORM\Table(name="settings_lenda_aktive")
 * @ORM\Entity
 */
class SettingsLendaAktive
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
     * @ORM\Column(name="emri_lendes_aktive", type="string", length=150, nullable=true)
     */
    private $emriLendesAktive;

    /**
     * @var float
     *
     * @ORM\Column(name="pastertia_lendes", type="float", precision=10, scale=0, nullable=true)
     */
    private $pastertiaLendes;

    /**
     * @return string
     */
    public function __toString(){
        return $this->getEmriLendesAktive();
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
     * Set emriLendesAktive
     *
     * @param string $emriLendesAktive
     * @return SettingsLendaAktive
     */
    public function setEmriLendesAktive($emriLendesAktive)
    {
        $this->emriLendesAktive = $emriLendesAktive;

        return $this;
    }

    /**
     * Get emriLendesAktive
     *
     * @return string 
     */
    public function getEmriLendesAktive()
    {
        return $this->emriLendesAktive;
    }

    /**
     * Set pastertiaLendes
     *
     * @param float $pastertiaLendes
     * @return SettingsLendaAktive
     */
    public function setPastertiaLendes($pastertiaLendes)
    {
        $this->pastertiaLendes = $pastertiaLendes;

        return $this;
    }

    /**
     * Get pastertiaLendes
     *
     * @return float 
     */
    public function getPastertiaLendes()
    {
        return $this->pastertiaLendes;
    }
}
