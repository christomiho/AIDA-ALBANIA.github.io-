<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pronari
 *
 * @ORM\Table(name="pronari")
 * @ORM\Entity
 */
class Pronari
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
     * @ORM\Column(name="emer", type="string", length=100, nullable=true)
     */
    private $emer;

    /**
     * @var string
     *
     * @ORM\Column(name="mbiemer", type="string", length=100, nullable=true)
     */
    private $mbiemer;

    /**
     * @var string
     *
     * @ORM\Column(name="numri_id", type="string", length=100, nullable=true)
     */
    private $numriId;

    /**
     * @var string
     *
     * @ORM\Column(name="numer_telefoni", type="string", length=100, nullable=true)
     */
    private $numerTelefoni;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @return string
     */
    public function __toString(){
        return $this->emer." ".$this->mbiemer;
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
     * Set emer
     *
     * @param string $emer
     * @return Pronari
     */
    public function setEmer($emer)
    {
        $this->emer = $emer;

        return $this;
    }

    /**
     * Get emer
     *
     * @return string 
     */
    public function getEmer()
    {
        return $this->emer;
    }

    /**
     * Set mbiemer
     *
     * @param string $mbiemer
     * @return Pronari
     */
    public function setMbiemer($mbiemer)
    {
        $this->mbiemer = $mbiemer;

        return $this;
    }

    /**
     * Get mbiemer
     *
     * @return string 
     */
    public function getMbiemer()
    {
        return $this->mbiemer;
    }

    /**
     * Set numriId
     *
     * @param string $numriId
     * @return Pronari
     */
    public function setNumriId($numriId)
    {
        $this->numriId = $numriId;

        return $this;
    }

    /**
     * Get numriId
     *
     * @return string 
     */
    public function getNumriId()
    {
        return $this->numriId;
    }

    /**
     * Set numerTelefoni
     *
     * @param string $numerTelefoni
     * @return Pronari
     */
    public function setNumerTelefoni($numerTelefoni)
    {
        $this->numerTelefoni = $numerTelefoni;

        return $this;
    }

    /**
     * Get numerTelefoni
     *
     * @return string 
     */
    public function getNumerTelefoni()
    {
        return $this->numerTelefoni;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Pronari
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}
