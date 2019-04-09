<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsGrackaKompShperndarese
 *
 * @ORM\Table(name="settings_gracka_komp_shperndarese")
 * @ORM\Entity
 */
class SettingsGrackaKompShperndarese
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
     * @ORM\Column(name="emri_komp_shperndarese", type="string", length=100, nullable=true)
     */
    private $emriKompShperndarese;
    /**
     * @return string
     */
    public function __toString(){
        return $this->getEmriKompShperndarese();
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
     * Set emriKompShperndarese
     *
     * @param string $emriKompShperndarese
     * @return SettingsGrackaKompShperndarese
     */
    public function setEmriKompShperndarese($emriKompShperndarese)
    {
        $this->emriKompShperndarese = $emriKompShperndarese;

        return $this;
    }

    /**
     * Get emriKompShperndarese
     *
     * @return string 
     */
    public function getEmriKompShperndarese()
    {
        return $this->emriKompShperndarese;
    }
}
