<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VendndodhjaFshati
 *
 * @ORM\Table(name="vendndodhja_fshati", indexes={@ORM\Index(name="fk_perkatesia_bashki_fshat_idx", columns={"perkatesia_bashki"})})
 * @ORM\Entity
 */
class VendndodhjaFshati
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
     * @ORM\Column(name="emri_fshati", type="string", length=100, nullable=true)
     */
    private $emriFshati;

    /**
     * @var \VendndodhjaBashkia
     *
     * @ORM\ManyToOne(targetEntity="VendndodhjaBashkia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="perkatesia_bashki", referencedColumnName="id")
     * })
     */
    private $perkatesiaBashki;


    public function __toString(){
        return $this->getEmriFshati()." ".$this->getPerkatesiaBashki();
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
     * Set emriFshati
     *
     * @param string $emriFshati
     * @return VendndodhjaFshati
     */
    public function setEmriFshati($emriFshati)
    {
        $this->emriFshati = $emriFshati;

        return $this;
    }

    /**
     * Get emriFshati
     *
     * @return string 
     */
    public function getEmriFshati()
    {
        return $this->emriFshati;
    }

    /**
     * Set perkatesiaBashki
     *
     * @param \AiadBundle\Entity\VendndodhjaBashkia $perkatesiaBashki
     * @return VendndodhjaFshati
     */
    public function setPerkatesiaBashki(\AiadBundle\Entity\VendndodhjaBashkia $perkatesiaBashki = null)
    {
        $this->perkatesiaBashki = $perkatesiaBashki;

        return $this;
    }

    /**
     * Get perkatesiaBashki
     *
     * @return \AiadBundle\Entity\VendndodhjaBashkia 
     */
    public function getPerkatesiaBashki()
    {
        return $this->perkatesiaBashki;
    }
}
