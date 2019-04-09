<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsGrackaKompProdhuse
 *
 * @ORM\Table(name="settings_gracka_komp_prodhuse")
 * @ORM\Entity
 */
class SettingsGrackaKompProdhuse
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
     * @ORM\Column(name="emri_kompanise", type="string", length=100, nullable=true)
     */
    private $emriKompanise;

    /**
     * @return string
     */
    public function __toString(){
        return $this->getEmriKompanise();
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
     * Set emriKompanise
     *
     * @param string $emriKompanise
     * @return SettingsGrackaKompProdhuse
     */
    public function setEmriKompanise($emriKompanise)
    {
        $this->emriKompanise = $emriKompanise;

        return $this;
    }

    /**
     * Get emriKompanise
     *
     * @return string 
     */
    public function getEmriKompanise()
    {
        return $this->emriKompanise;
    }
}
