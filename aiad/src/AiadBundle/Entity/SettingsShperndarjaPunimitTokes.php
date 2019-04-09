<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsShperndarjaPunimitTokes
 *
 * @ORM\Table(name="settings_shperndarja_punimit_tokes")
 * @ORM\Entity
 */
class SettingsShperndarjaPunimitTokes
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
     * @ORM\Column(name="shperndarja", type="string", length=150, nullable=true)
     */
    private $shperndarja;



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
     * Set shperndarja
     *
     * @param string $shperndarja
     * @return SettingsShperndarjaPunimitTokes
     */
    public function setShperndarja($shperndarja)
    {
        $this->shperndarja = $shperndarja;

        return $this;
    }

    /**
     * Get shperndarja
     *
     * @return string 
     */
    public function getShperndarja()
    {
        return $this->shperndarja;
    }

    public function __toString(){
        return $this->shperndarja;
    }
}
