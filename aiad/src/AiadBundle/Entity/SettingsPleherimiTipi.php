<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsPleherimiTipi
 *
 * @ORM\Table(name="settings_pleherimi_tipi")
 * @ORM\Entity
 */
class SettingsPleherimiTipi
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
     * @ORM\Column(name="tipi_pleherimit", type="string", length=100, nullable=true)
     */
    private $tipiPleherimit;



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
     * Set tipiPleherimit
     *
     * @param string $tipiPleherimit
     * @return SettingsPleherimiTipi
     */
    public function setTipiPleherimit($tipiPleherimit)
    {
        $this->tipiPleherimit = $tipiPleherimit;

        return $this;
    }

    /**
     * Get tipiPleherimit
     *
     * @return string 
     */
    public function getTipiPleherimit()
    {
        return $this->tipiPleherimit;
    }
}
