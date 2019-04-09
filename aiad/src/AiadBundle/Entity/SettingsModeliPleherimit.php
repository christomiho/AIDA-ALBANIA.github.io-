<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsModeliPleherimit
 *
 * @ORM\Table(name="settings_modeli_pleherimit")
 * @ORM\Entity
 */
class SettingsModeliPleherimit
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
     * @ORM\Column(name="modeli_pleherimit", type="string", length=100, nullable=true)
     */
    private $modeliPleherimit;



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
     * Set modeliPleherimit
     *
     * @param string $modeliPleherimit
     * @return SettingsModeliPleherimit
     */
    public function setModeliPleherimit($modeliPleherimit)
    {
        $this->modeliPleherimit = $modeliPleherimit;

        return $this;
    }

    /**
     * Get modeliPleherimit
     *
     * @return string 
     */
    public function getModeliPleherimit()
    {
        return $this->modeliPleherimit;
    }
}
