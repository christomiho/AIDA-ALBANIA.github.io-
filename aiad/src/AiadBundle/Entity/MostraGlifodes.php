<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraGlifodes
 *
 * @ORM\Table(name="mostra_glifodes", indexes={@ORM\Index(name="fk_parcela_glifodes_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraGlifodes
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
     * @ORM\Column(name="data_glifodes", type="date", nullable=true)
     */
    private $dataGlifodes;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_territur_grackadite", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioTerriturGrackadite;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_degezaprekur", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeDegezaprekur;

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
     * Set dataGlifodes
     *
     * @param \DateTime $dataGlifodes
     * @return MostraGlifodes
     */
    public function setDataGlifodes($dataGlifodes)
    {
        $this->dataGlifodes = $dataGlifodes;

        return $this;
    }

    /**
     * Get dataGlifodes
     *
     * @return \DateTime 
     */
    public function getDataGlifodes()
    {
        return $this->dataGlifodes;
    }

    /**
     * Set ratioTerriturGrackadite
     *
     * @param float $ratioTerriturGrackadite
     * @return MostraGlifodes
     */
    public function setRatioTerriturGrackadite($ratioTerriturGrackadite)
    {
        $this->ratioTerriturGrackadite = $ratioTerriturGrackadite;

        return $this;
    }

    /**
     * Get ratioTerriturGrackadite
     *
     * @return float 
     */
    public function getRatioTerriturGrackadite()
    {
        return $this->ratioTerriturGrackadite;
    }

    /**
     * Set perqindjeDegezaprekur
     *
     * @param float $perqindjeDegezaprekur
     * @return MostraGlifodes
     */
    public function setPerqindjeDegezaprekur($perqindjeDegezaprekur)
    {
        $this->perqindjeDegezaprekur = $perqindjeDegezaprekur;

        return $this;
    }

    /**
     * Get perqindjeDegezaprekur
     *
     * @return float 
     */
    public function getPerqindjeDegezaprekur()
    {
        return $this->perqindjeDegezaprekur;
    }

    /**
     * Set perqindjeLastarprekur
     *
     * @param float $perqindjeLastarprekur
     * @return MostraGlifodes
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
     * @return MostraGlifodes
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
