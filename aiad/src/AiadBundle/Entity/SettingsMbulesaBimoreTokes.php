<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsMbulesaBimoreTokes
 *
 * @ORM\Table(name="settings_mbulesa_bimore_tokes")
 * @ORM\Entity
 */
class SettingsMbulesaBimoreTokes
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
     * @ORM\Column(name="mbulesa_bimore_tokes", type="string", length=100, nullable=true)
     */
    private $mbulesaBimoreTokes;



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
     * Set mbulesaBimoreTokes
     *
     * @param string $mbulesaBimoreTokes
     * @return SettingsMbulesaBimoreTokes
     */
    public function setMbulesaBimoreTokes($mbulesaBimoreTokes)
    {
        $this->mbulesaBimoreTokes = $mbulesaBimoreTokes;

        return $this;
    }

    /**
     * Get mbulesaBimoreTokes
     *
     * @return string 
     */
    public function getMbulesaBimoreTokes()
    {
        return $this->mbulesaBimoreTokes;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->mbulesaBimoreTokes;
    }

}
