<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AplikimeSemundje
 *
 * @ORM\Table(name="aplikime_semundje")
 * @ORM\Entity
 */
class AplikimeSemundje
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
     * @ORM\Column(name="lloji", type="string", length=45, nullable=true)
     */
    private $lloji;

public function __toString(){
    return $this->getLloji();
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
     * Set lloji
     *
     * @param string $lloji
     * @return AplikimeSemundje
     */
    public function setLloji($lloji)
    {
        $this->lloji = $lloji;

        return $this;
    }

    /**
     * Get lloji
     *
     * @return string 
     */
    public function getLloji()
    {
        return $this->lloji;
    }
}
