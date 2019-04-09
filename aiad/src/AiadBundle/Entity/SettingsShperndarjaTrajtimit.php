<?php
/**
 * Created by PhpStorm.
 * User: Dorjan
 * Date: 5/14/16
 * Time: 6:15 PM
 */

namespace AiadBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * SettingsShperndarjaTrajtimit
 *
 * @ORM\Table(name="settings_shperndarja_trajtimit")
 * @ORM\Entity
 */

class SettingsShperndarjaTrajtimit {

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
     * @ORM\Column(name="shperndarja_trajtimit", type="string", length=200, nullable=true)
     */
    private $shperndarjaTrajtimit;

    /**
     * @return string
     */
    public function __toString(){
        return $this->getShperndarjaTrajtimit();
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
     * Set shperndarjaTrajtimit
     *
     * @param string $shperndarjaTrajtimit
     * @return SettingsShperndarjaTrajtimit
     */
    public function setShperndarjaTrajtimit($shperndarjaTrajtimit)
    {
        $this->shperndarjaTrajtimit = $shperndarjaTrajtimit;

        return $this;
    }

    /**
     * Get shperndarjaTrajtimit
     *
     * @return string
     */
    public function getShperndarjaTrajtimit()
    {
        return $this->shperndarjaTrajtimit;
    }

} 