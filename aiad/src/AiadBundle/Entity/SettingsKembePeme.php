<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsKembePeme
 *
 * @ORM\Table(name="settings_kembe_peme")
 * @ORM\Entity
 */
class SettingsKembePeme
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
     * @var integer
     *
     * @ORM\Column(name="nr_kembe_peme", type="integer", nullable=true)
     */
    private $nrKembePeme;



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
     * Set nrKembePeme
     *
     * @param integer $nrKembePeme
     * @return SettingsKembePeme
     */
    public function setNrKembePeme($nrKembePeme)
    {
        $this->nrKembePeme = $nrKembePeme;

        return $this;
    }

    /**
     * Get nrKembePeme
     *
     * @return integer 
     */
    public function getNrKembePeme()
    {
        return $this->nrKembePeme;
    }

    public function __toString(){
        return $this->nrKembePeme.'';
    }
}
