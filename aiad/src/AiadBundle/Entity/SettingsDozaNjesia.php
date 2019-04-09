<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsDozaNjesia
 *
 * @ORM\Table(name="settings_doza_njesia")
 * @ORM\Entity
 */
class SettingsDozaNjesia
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
     * @ORM\Column(name="njesia", type="string", length=45, nullable=true)
     */
    private $njesia;

public function __toString(){
    return $this->getNjesia();
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
     * Set njesia
     *
     * @param string $njesia
     * @return SettingsDozaNjesia
     */
    public function setNjesia($njesia)
    {
        $this->njesia = $njesia;

        return $this;
    }

    /**
     * Get njesia
     *
     * @return string 
     */
    public function getNjesia()
    {
        return $this->njesia;
    }
}
