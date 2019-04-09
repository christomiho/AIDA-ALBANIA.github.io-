<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsOrientimi
 *
 * @ORM\Table(name="settings_orientimi")
 * @ORM\Entity
 */
class SettingsOrientimi
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
     * @ORM\Column(name="orientimi", type="string", length=100, nullable=true)
     */
    private $orientimi;



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
     * Set orientimi
     *
     * @param string $orientimi
     * @return SettingsOrientimi
     */
    public function setOrientimi($orientimi)
    {
        $this->orientimi = $orientimi;

        return $this;
    }

    /**
     * Get orientimi
     *
     * @return string 
     */
    public function getOrientimi()
    {
        return $this->orientimi;
    }
    /**
     * Get orientimi
     *
     * @return string
     */
    public function __toString()
    {
        return $this->orientimi;
    }
}
