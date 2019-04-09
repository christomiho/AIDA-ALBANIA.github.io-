<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserHasParcel
 *
 * @ORM\Table(name="user_has_parcel", indexes={@ORM\Index(name="fk_user_id_refference_idx", columns={"user_id"}), @ORM\Index(name="fk_parcel_id_refference_idx", columns={"parcel_id"})})
 * @ORM\Entity
 */
class UserHasParcel
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \ParcelaIdentifikimi
     *
     * @ORM\ManyToOne(targetEntity="ParcelaIdentifikimi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parcel_id", referencedColumnName="id")
     * })
     */
    private $parcel;



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
     * Set user
     *
     * @param \AiadBundle\Entity\User $user
     * @return UserHasParcel
     */
    public function setUser(\AiadBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AiadBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set parcel
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcel
     * @return UserHasParcel
     */
    public function setParcel(\AiadBundle\Entity\ParcelaIdentifikimi $parcel = null)
    {
        $this->parcel = $parcel;

        return $this;
    }

    /**
     * Get parcel
     *
     * @return \AiadBundle\Entity\ParcelaIdentifikimi 
     */
    public function getParcel()
    {
        return $this->parcel;
    }
}
