<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraOtiorrinko
 *
 * @ORM\Table(name="mostra_otiorrinko", indexes={@ORM\Index(name="fk_parcela_otiorrinko_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraOtiorrinko
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
     * @ORM\Column(name="data_otirrinko", type="date", nullable=true)
     */
    private $dataOtirrinko;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_territur_pemedite", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioTerriturPemedite;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_lastarprekur", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeLastarprekur;

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
     * Set dataOtirrinko
     *
     * @param \DateTime $dataOtirrinko
     * @return MostraOtiorrinko
     */
    public function setDataOtirrinko($dataOtirrinko)
    {
        $this->dataOtirrinko = $dataOtirrinko;

        return $this;
    }

    /**
     * Get dataOtirrinko
     *
     * @return \DateTime 
     */
    public function getDataOtirrinko()
    {
        return $this->dataOtirrinko;
    }

    /**
     * Set ratioTerriturPemedite
     *
     * @param float $ratioTerriturPemedite
     * @return MostraOtiorrinko
     */
    public function setRatioTerriturPemedite($ratioTerriturPemedite)
    {
        $this->ratioTerriturPemedite = $ratioTerriturPemedite;

        return $this;
    }

    /**
     * Get ratioTerriturPemedite
     *
     * @return float 
     */
    public function getRatioTerriturPemedite()
    {
        return $this->ratioTerriturPemedite;
    }

    /**
     * Set perqindjeLastarprekur
     *
     * @param float $perqindjeLastarprekur
     * @return MostraOtiorrinko
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
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraOtiorrinko
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
