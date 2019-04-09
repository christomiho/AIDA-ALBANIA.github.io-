<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsDistanca
 *
 * @ORM\Table(name="settings_distanca")
 * @ORM\Entity
 */
class SettingsDistanca
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
     * @ORM\Column(name="distanca", type="string", length=100, nullable=true)
     */
    private $distanca;

    /**
     * @var float
     *
     * @ORM\Column(name="distanca_shumezimi", type="float", precision=10, scale=0, nullable=true)
     */
    private $distancaShumezimi;



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
     * Set distanca
     *
     * @param string $distanca
     * @return SettingsDistanca
     */
    public function setDistanca($distanca)
    {
        $this->distanca = $distanca;

        return $this;
    }

    /**
     * Get distanca
     *
     * @return string 
     */
    public function getDistanca()
    {
        return $this->distanca;
    }

    /**
     * Set distancaShumezimi
     *
     * @param float $distancaShumezimi
     * @return SettingsDistanca
     */
    public function setDistancaShumezimi($distancaShumezimi)
    {
        $this->distancaShumezimi = $distancaShumezimi;

        return $this;
    }

    /**
     * Get distancaShumezimi
     *
     * @return float 
     */
    public function getDistancaShumezimi()
    {
        return $this->distancaShumezimi;
    }

    public function __toString(){
        return $this->distanca;
    }

}
