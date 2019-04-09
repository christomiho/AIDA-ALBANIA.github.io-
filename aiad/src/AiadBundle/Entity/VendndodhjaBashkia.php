<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VendndodhjaBashkia
 *
 * @ORM\Table(name="vendndodhja_bashkia", indexes={@ORM\Index(name="fk_perkatesia_qarku_bashki_idx", columns={"perkatesia_qarku"})})
 * @ORM\Entity
 */
class VendndodhjaBashkia
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
     * @ORM\Column(name="emri_bashkia", type="string", length=100, nullable=true)
     */
    private $emriBashkia;

    /**
     * @var \VendndodhjaQarku
     *
     * @ORM\ManyToOne(targetEntity="VendndodhjaQarku")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="perkatesia_qarku", referencedColumnName="id")
     * })
     */
    private $perkatesiaQarku;

    /**
     * @return string
     */
    public function __toString(){
            return $this->emriBashkia." ".$this->getPerkatesiaQarku();
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
     * Set emriBashkia
     *
     * @param string $emriBashkia
     * @return VendndodhjaBashkia
     */
    public function setEmriBashkia($emriBashkia)
    {
        $this->emriBashkia = $emriBashkia;

        return $this;
    }

    /**
     * Get emriBashkia
     *
     * @return string 
     */
    public function getEmriBashkia()
    {
        return $this->emriBashkia;
    }

    /**
     * Set perkatesiaQarku
     *
     * @param \AiadBundle\Entity\VendndodhjaQarku $perkatesiaQarku
     * @return VendndodhjaBashkia
     */
    public function setPerkatesiaQarku(\AiadBundle\Entity\VendndodhjaQarku $perkatesiaQarku = null)
    {
        $this->perkatesiaQarku = $perkatesiaQarku;

        return $this;
    }

    /**
     * Get perkatesiaQarku
     *
     * @return \AiadBundle\Entity\VendndodhjaQarku 
     */
    public function getPerkatesiaQarku()
    {
        return $this->perkatesiaQarku;
    }
}
