<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsOrigjinaUjit
 *
 * @ORM\Table(name="settings_origjina_ujit")
 * @ORM\Entity
 */
class SettingsOrigjinaUjit
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
     * @ORM\Column(name="origjina_ujit", type="string", length=100, nullable=true)
     */
    private $origjinaUjit;



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
     * Set origjinaUjit
     *
     * @param string $origjinaUjit
     * @return SettingsOrigjinaUjit
     */
    public function setOrigjinaUjit($origjinaUjit)
    {
        $this->origjinaUjit = $origjinaUjit;

        return $this;
    }

    /**
     * Get origjinaUjit
     *
     * @return string 
     */
    public function getOrigjinaUjit()
    {
        return $this->origjinaUjit;
    }

    public function __toString(){
        return $this->origjinaUjit;
    }
}
