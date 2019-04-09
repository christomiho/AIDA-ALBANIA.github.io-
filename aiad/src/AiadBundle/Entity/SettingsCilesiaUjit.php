<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsCilesiaUjit
 *
 * @ORM\Table(name="settings_cilesia_ujit")
 * @ORM\Entity
 */
class SettingsCilesiaUjit
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
     * @ORM\Column(name="cilesia_ujit", type="string", length=100, nullable=true)
     */
    private $cilesiaUjit;



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
     * Set cilesiaUjit
     *
     * @param string $cilesiaUjit
     * @return SettingsCilesiaUjit
     */
    public function setCilesiaUjit($cilesiaUjit)
    {
        $this->cilesiaUjit = $cilesiaUjit;

        return $this;
    }

    /**
     * Get cilesiaUjit
     *
     * @return string 
     */
    public function getCilesiaUjit()
    {
        return $this->cilesiaUjit;
    }

    public function __toString(){
        return $this->cilesiaUjit;
    }
}
