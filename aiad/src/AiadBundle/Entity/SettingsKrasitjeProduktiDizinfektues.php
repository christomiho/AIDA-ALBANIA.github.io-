<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsKrasitjeProduktiDizinfektues
 *
 * @ORM\Table(name="settings_krasitje_produkti_dizinfektues")
 * @ORM\Entity
 */
class SettingsKrasitjeProduktiDizinfektues
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
     * @ORM\Column(name="produkti_dizinfektues", type="string", length=100, nullable=true)
     */
    private $produktiDizinfektues;

    /**
     * @return string
     */
    public function __toString(){
        return $this->getProduktiDizinfektues();
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
     * Set produktiDizinfektues
     *
     * @param string $produktiDizinfektues
     * @return SettingsKrasitjeProduktiDizinfektues
     */
    public function setProduktiDizinfektues($produktiDizinfektues)
    {
        $this->produktiDizinfektues = $produktiDizinfektues;

        return $this;
    }

    /**
     * Get produktiDizinfektues
     *
     * @return string 
     */
    public function getProduktiDizinfektues()
    {
        return $this->produktiDizinfektues;
    }
}
