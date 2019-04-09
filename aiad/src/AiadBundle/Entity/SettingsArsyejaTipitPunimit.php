<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsArsyejaTipitPunimit
 *
 * @ORM\Table(name="settings_arsyeja_tipit_punimit")
 * @ORM\Entity
 */
class SettingsArsyejaTipitPunimit
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
     * @ORM\Column(name="arsyeja_punimit", type="string", length=150, nullable=true)
     */
    private $arsyejaPunimit;



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
     * Set arsyejaPunimit
     *
     * @param string $arsyejaPunimit
     * @return SettingsArsyejaTipitPunimit
     */
    public function setArsyejaPunimit($arsyejaPunimit)
    {
        $this->arsyejaPunimit = $arsyejaPunimit;

        return $this;
    }

    /**
     * Get arsyejaPunimit
     *
     * @return string 
     */
    public function getArsyejaPunimit()
    {
        return $this->arsyejaPunimit;
    }

    public function __toString(){
        return $this->arsyejaPunimit;
    }
}
