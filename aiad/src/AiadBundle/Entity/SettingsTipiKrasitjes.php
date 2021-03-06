<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsTipiKrasitjes
 *
 * @ORM\Table(name="settings_tipi_krasitjes")
 * @ORM\Entity
 */
class SettingsTipiKrasitjes
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
     * @ORM\Column(name="tipi", type="string", length=100, nullable=true)
     */
    private $tipi;

    /**
     * @return string
     */
    public function __toString(){
        return $this->getTipi();
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
     * Set tipi
     *
     * @param string $tipi
     * @return SettingsTipiKrasitjes
     */
    public function setTipi($tipi)
    {
        $this->tipi = $tipi;

        return $this;
    }

    /**
     * Get tipi
     *
     * @return string 
     */
    public function getTipi()
    {
        return $this->tipi;
    }
}
