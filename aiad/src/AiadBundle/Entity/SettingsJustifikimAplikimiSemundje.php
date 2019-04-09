<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsJustifikimAplikimiSemundje
 *
 * @ORM\Table(name="settings_justifikim_aplikimi_semundje")
 * @ORM\Entity
 */
class SettingsJustifikimAplikimiSemundje
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
     * @ORM\Column(name="justifikim_aplikimi", type="string", length=300, nullable=true)
     */
    private $justifikimAplikimi;
    /**
     * @return string
     */
    public function __toString(){
        return $this->getJustifikimAplikimi();
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
     * Set justifikimAplikimi
     *
     * @param string $justifikimAplikimi
     * @return SettingsJustifikimAplikimiSemundje
     */
    public function setJustifikimAplikimi($justifikimAplikimi)
    {
        $this->justifikimAplikimi = $justifikimAplikimi;

        return $this;
    }

    /**
     * Get justifikimAplikimi
     *
     * @return string 
     */
    public function getJustifikimAplikimi()
    {
        return $this->justifikimAplikimi;
    }
}
