<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsMjete
 *
 * @ORM\Table(name="settings_mjete")
 * @ORM\Entity
 */
class SettingsMjete
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
     * @ORM\Column(name="mjeti", type="string", length=100, nullable=true)
     */
    private $mjeti;

    /**
     * @return string
     */
    public function __toString(){
        return $this->getMjeti();
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
     * Set mjeti
     *
     * @param string $mjeti
     * @return SettingsMjete
     */
    public function setMjeti($mjeti)
    {
        $this->mjeti = $mjeti;

        return $this;
    }

    /**
     * Get mjeti
     *
     * @return string 
     */
    public function getMjeti()
    {
        return $this->mjeti;
    }
}
