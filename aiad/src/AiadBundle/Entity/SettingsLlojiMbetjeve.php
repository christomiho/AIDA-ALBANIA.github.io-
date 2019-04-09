<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsLlojiMbetjeve
 *
 * @ORM\Table(name="settings_lloji_mbetjeve")
 * @ORM\Entity
 */
class SettingsLlojiMbetjeve
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
     * @ORM\Column(name="lloji_mbetjeve", type="string", length=100, nullable=true)
     */
    private $llojiMbetjeve;

    /**
     * @return string
     */
public  function __toString(){
    return $this->getLlojiMbetjeve();
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
     * Set llojiMbetjeve
     *
     * @param string $llojiMbetjeve
     * @return SettingsLlojiMbetjeve
     */
    public function setLlojiMbetjeve($llojiMbetjeve)
    {
        $this->llojiMbetjeve = $llojiMbetjeve;

        return $this;
    }

    /**
     * Get llojiMbetjeve
     *
     * @return string 
     */
    public function getLlojiMbetjeve()
    {
        return $this->llojiMbetjeve;
    }


}
