<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsPleherimiJustifikim
 *
 * @ORM\Table(name="settings_pleherimi_justifikim")
 * @ORM\Entity
 */
class SettingsPleherimiJustifikim
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
     * @ORM\Column(name="justifikimi_pleherimit", type="string", length=250, nullable=true)
     */
    private $justifikimiPleherimit;

    public function __toString(){
        return $this->justifikimiPleherimit;
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
     * Set justifikimiPleherimit
     *
     * @param string $justifikimiPleherimit
     * @return SettingsPleherimiJustifikim
     */
    public function setJustifikimiPleherimit($justifikimiPleherimit)
    {
        $this->justifikimiPleherimit = $justifikimiPleherimit;

        return $this;
    }

    /**
     * Get justifikimiPleherimit
     *
     * @return string 
     */
    public function getJustifikimiPleherimit()
    {
        return $this->justifikimiPleherimit;
    }
}
