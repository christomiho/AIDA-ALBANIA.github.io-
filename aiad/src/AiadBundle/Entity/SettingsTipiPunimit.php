<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsTipiPunimit
 *
 * @ORM\Table(name="settings_tipi_punimit")
 * @ORM\Entity
 */
class SettingsTipiPunimit
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
     * @ORM\Column(name="tipi_punimit", type="string", length=100, nullable=true)
     */
    private $tipiPunimit;



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
     * Set tipiPunimit
     *
     * @param string $tipiPunimit
     * @return SettingsTipiPunimit
     */
    public function setTipiPunimit($tipiPunimit)
    {
        $this->tipiPunimit = $tipiPunimit;

        return $this;
    }

    /**
     * Get tipiPunimit
     *
     * @return string 
     */
    public function getTipiPunimit()
    {
        return $this->tipiPunimit;
    }
    public function __toString(){
        return $this->tipiPunimit;
    }

}
