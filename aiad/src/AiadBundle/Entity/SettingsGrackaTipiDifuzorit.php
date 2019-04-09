<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsGrackaTipiDifuzorit
 *
 * @ORM\Table(name="settings_gracka_tipi_difuzorit")
 * @ORM\Entity
 */
class SettingsGrackaTipiDifuzorit
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
     * @ORM\Column(name="tipi_difuzori", type="string", length=100, nullable=true)
     */
    private $tipiDifuzori;
    /**
     * @return string
     */
    public function __toString(){
        return $this->getTipiDifuzori();
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
     * Set tipiDifuzori
     *
     * @param string $tipiDifuzori
     * @return SettingsGrackaTipiDifuzorit
     */
    public function setTipiDifuzori($tipiDifuzori)
    {
        $this->tipiDifuzori = $tipiDifuzori;

        return $this;
    }

    /**
     * Get tipiDifuzori
     *
     * @return string 
     */
    public function getTipiDifuzori()
    {
        return $this->tipiDifuzori;
    }
}
