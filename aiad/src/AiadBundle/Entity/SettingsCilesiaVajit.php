<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsCilesiaVajit
 *
 * @ORM\Table(name="settings_cilesia_vajit")
 * @ORM\Entity
 */
class SettingsCilesiaVajit
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
     * @ORM\Column(name="cilesia_vajit", type="string", length=150, nullable=true)
     */
    private $cilesiaVajit;



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
     * Set cilesiaVajit
     *
     * @param string $cilesiaVajit
     * @return SettingsCilesiaVajit
     */
    public function setCilesiaVajit($cilesiaVajit)
    {
        $this->cilesiaVajit = $cilesiaVajit;

        return $this;
    }

    /**
     * Get cilesiaVajit
     *
     * @return string 
     */
    public function getCilesiaVajit()
    {
        return $this->cilesiaVajit;
    }

    public function __toString(){
        return $this->cilesiaVajit;
    }
}
