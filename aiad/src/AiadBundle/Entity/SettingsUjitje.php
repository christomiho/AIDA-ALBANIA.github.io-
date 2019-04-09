<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsUjitje
 *
 * @ORM\Table(name="settings_ujitje")
 * @ORM\Entity
 */
class SettingsUjitje
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
     * @ORM\Column(name="ujitje_lloji", type="string", length=100, nullable=true)
     */
    private $ujitjeLloji;



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
     * Set ujitjeLloji
     *
     * @param string $ujitjeLloji
     * @return SettingsUjitje
     */
    public function setUjitjeLloji($ujitjeLloji)
    {
        $this->ujitjeLloji = $ujitjeLloji;

        return $this;
    }

    /**
     * Get ujitjeLloji
     *
     * @return string 
     */
    public function getUjitjeLloji()
    {
        return $this->ujitjeLloji;
    }

    public function __toString(){
        return $this->ujitjeLloji;
    }
}
