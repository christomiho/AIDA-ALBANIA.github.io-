<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VendndodhjaQarku
 *
 * @ORM\Table(name="vendndodhja_qarku")
 * @ORM\Entity
 */
class VendndodhjaQarku
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
     * @ORM\Column(name="emri_qarkut", type="string", length=100, nullable=false)
     */
    private $emriQarkut;

    /**
     * @return string
     */
    public function __toString(){
        return $this->emriQarkut;
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
     * Set emriQarkut
     *
     * @param string $emriQarkut
     * @return VendndodhjaQarku
     */
    public function setEmriQarkut($emriQarkut)
    {
        $this->emriQarkut = $emriQarkut;

        return $this;
    }

    /**
     * Get emriQarkut
     *
     * @return string 
     */
    public function getEmriQarkut()
    {
        return $this->emriQarkut;
    }
}
