<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsLlojiMbulesesBimore
 *
 * @ORM\Table(name="settings_lloji_mbuleses_bimore")
 * @ORM\Entity
 */
class SettingsLlojiMbulesesBimore
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
     * @ORM\Column(name="lloji_mbuleses_bimore", type="string", length=100, nullable=true)
     */
    private $llojiMbulesesBimore;



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
     * Set llojiMbulesesBimore
     *
     * @param string $llojiMbulesesBimore
     * @return SettingsLlojiMbulesesBimore
     */
    public function setLlojiMbulesesBimore($llojiMbulesesBimore)
    {
        $this->llojiMbulesesBimore = $llojiMbulesesBimore;

        return $this;
    }

    /**
     * Get llojiMbulesesBimore
     *
     * @return string 
     */
    public function getLlojiMbulesesBimore()
    {
        return $this->llojiMbulesesBimore;
    }

    public function __toString(){
        return $this->llojiMbulesesBimore;
    }
}
