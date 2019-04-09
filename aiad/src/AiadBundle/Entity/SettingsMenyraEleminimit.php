<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsMenyraEleminimit
 *
 * @ORM\Table(name="settings_menyra_eleminimit")
 * @ORM\Entity
 */
class SettingsMenyraEleminimit
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
     * @ORM\Column(name="menyra", type="string", length=150, nullable=true)
     */
    private $menyra;

    /**
     * @return string
     */
    public function __toString(){
        return $this->getMenyra();
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
     * Set menyra
     *
     * @param string $menyra
     * @return SettingsMenyraEleminimit
     */
    public function setMenyra($menyra)
    {
        $this->menyra = $menyra;

        return $this;
    }

    /**
     * Get menyra
     *
     * @return string 
     */
    public function getMenyra()
    {
        return $this->menyra;
    }
}
