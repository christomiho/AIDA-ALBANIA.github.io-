<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsArsyeAplikimiSemundje
 *
 * @ORM\Table(name="settings_arsye_aplikimi_semundje")
 * @ORM\Entity
 */
class SettingsArsyeAplikimiSemundje
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
     * @ORM\Column(name="arsye_aplikimi", type="string", length=300, nullable=true)
     */
    private $arsyeAplikimi;

    /**
     * @return string
     */
    public function __toString(){
        return $this->getArsyeAplikimi();
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
     * Set arsyeAplikimi
     *
     * @param string $arsyeAplikimi
     * @return SettingsArsyeAplikimiSemundje
     */
    public function setArsyeAplikimi($arsyeAplikimi)
    {
        $this->arsyeAplikimi = $arsyeAplikimi;

        return $this;
    }

    /**
     * Get arsyeAplikimi
     *
     * @return string 
     */
    public function getArsyeAplikimi()
    {
        return $this->arsyeAplikimi;
    }
}
