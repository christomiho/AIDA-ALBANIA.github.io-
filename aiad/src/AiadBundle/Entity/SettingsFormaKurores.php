<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsFormaKurores
 *
 * @ORM\Table(name="settings_forma_kurores")
 * @ORM\Entity
 */
class SettingsFormaKurores
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
     * @ORM\Column(name="forma_kurores", type="string", length=100, nullable=true)
     */
    private $formaKurores;



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
     * Set formaKurores
     *
     * @param string $formaKurores
     * @return SettingsFormaKurores
     */
    public function setFormaKurores($formaKurores)
    {
        $this->formaKurores = $formaKurores;

        return $this;
    }

    /**
     * Get formaKurores
     *
     * @return string 
     */
    public function getFormaKurores()
    {
        return $this->formaKurores;
    }

    public function __toString(){
        return $this->formaKurores;
    }
}
