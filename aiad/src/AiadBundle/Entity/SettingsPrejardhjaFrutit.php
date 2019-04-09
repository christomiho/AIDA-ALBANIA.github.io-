<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsPrejardhjaFrutit
 *
 * @ORM\Table(name="settings_prejardhja_frutit")
 * @ORM\Entity
 */
class SettingsPrejardhjaFrutit
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
     * @ORM\Column(name="prejardhja_frutit", type="string", length=150, nullable=true)
     */
    private $prejardhjaFrutit;



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
     * Set prejardhjaFrutit
     *
     * @param string $prejardhjaFrutit
     * @return SettingsPrejardhjaFrutit
     */
    public function setPrejardhjaFrutit($prejardhjaFrutit)
    {
        $this->prejardhjaFrutit = $prejardhjaFrutit;

        return $this;
    }

    /**
     * Get prejardhjaFrutit
     *
     * @return string 
     */
    public function getPrejardhjaFrutit()
    {
        return $this->prejardhjaFrutit;
    }
    public function __toString()
    {
        return $this->prejardhjaFrutit;
    }
}
