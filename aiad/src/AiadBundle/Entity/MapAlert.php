<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* MapAlert
*
* @ORM\Table(name="map_alert", indexes={@ORM\Index(name="parcela_fk_map_idx", columns={"parcela"})})
* @ORM\Entity
*/
class MapAlert {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \ParcelaIdentifikimi
     *
     * @ORM\ManyToOne(targetEntity="ParcelaIdentifikimi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parcela", referencedColumnName="id")
     * })
     */
    private $parcela;



    /**
     * @var integer
     *
     * @ORM\Column(name="radius", type="integer", nullable=true)
     */
    private $radius;


    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcel
     * @return MapAlert
     */
    public function setParcel(\AiadBundle\Entity\ParcelaIdentifikimi $parcel = null)
    {
        $this->parcela = $parcel;

        return $this;
    }

    /**
     * Get parcel
     *
     * @return \AiadBundle\Entity\ParcelaIdentifikimi
     */
    public function getParcel()
    {
        return $this->parcela;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="circle_color", type="string", length=100, nullable=true)
     */
    private $circleColor;


    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=400, nullable=true)
     */
    private $message;







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
     * Set message
     *
     * @param string $message
     * @return MapAlert
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }


    /**
     * Set circleColor
     *
     * @param string $circleColor
     * @return MapAlert
     */
    public function setCircleColor($circleColor)
    {
        $this->circleColor = $circleColor;

        return $this;
    }

    /**
     * Get circleColor
     *
     * @return string
     */
    public function getCircleColor()
    {
        return $this->circleColor;
    }

    /**
     * Set radius
     *
     * @param integer $radius
     * @return MapAlert
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;

        return $this;
    }

    /**
     * Get radius
     *
     * @return integer
     */
    public function getRadius()
    {
        return $this->radius;
    }




} 