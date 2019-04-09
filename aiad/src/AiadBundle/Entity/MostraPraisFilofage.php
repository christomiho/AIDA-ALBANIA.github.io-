<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraPraisFilofage
 *
 * @ORM\Table(name="mostra_prais_filofage", indexes={@ORM\Index(name="fk_parcela_filofage_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraPraisFilofage
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
     * @var \DateTime
     *
     * @ORM\Column(name="data_prais_filofage", type="date", nullable=true)
     */
    private $dataPraisFilofage;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_lastarprekur", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeLastarprekur;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_lastarprekur_formagjalla", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioLastarprekurFormagjalla;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dataPraisFilofage
     *
     * @param \DateTime $dataPraisFilofage
     * @return MostraPraisFilofage
     */
    public function setDataPraisFilofage($dataPraisFilofage)
    {
        $this->dataPraisFilofage = $dataPraisFilofage;

        return $this;
    }

    /**
     * Get dataPraisFilofage
     *
     * @return \DateTime 
     */
    public function getDataPraisFilofage()
    {
        return $this->dataPraisFilofage;
    }

    /**
     * Set perqindjeLastarprekur
     *
     * @param float $perqindjeLastarprekur
     * @return MostraPraisFilofage
     */
    public function setPerqindjeLastarprekur($perqindjeLastarprekur)
    {
        $this->perqindjeLastarprekur = $perqindjeLastarprekur;

        return $this;
    }

    /**
     * Get perqindjeLastarprekur
     *
     * @return float 
     */
    public function getPerqindjeLastarprekur()
    {
        return $this->perqindjeLastarprekur;
    }

    /**
     * Set ratioLastarprekurFormagjalla
     *
     * @param float $ratioLastarprekurFormagjalla
     * @return MostraPraisFilofage
     */
    public function setRatioLastarprekurFormagjalla($ratioLastarprekurFormagjalla)
    {
        $this->ratioLastarprekurFormagjalla = $ratioLastarprekurFormagjalla;

        return $this;
    }

    /**
     * Get ratioLastarprekurFormagjalla
     *
     * @return float 
     */
    public function getRatioLastarprekurFormagjalla()
    {
        return $this->ratioLastarprekurFormagjalla;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraPraisFilofage
     */
    public function setParcela(\AiadBundle\Entity\ParcelaIdentifikimi $parcela = null)
    {
        $this->parcela = $parcela;

        return $this;
    }

    /**
     * Get parcela
     *
     * @return \AiadBundle\Entity\ParcelaIdentifikimi 
     */
    public function getParcela()
    {
        return $this->parcela;
    }
}
