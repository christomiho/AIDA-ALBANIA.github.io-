<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraPraisAntofage
 *
 * @ORM\Table(name="mostra_prais_antofage", indexes={@ORM\Index(name="fk_parcela_antofage_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraPraisAntofage
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
     * @ORM\Column(name="data_prais_antofage", type="date", nullable=true)
     */
    private $dataPraisAntofage;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_lule_prekura", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeLulePrekura;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_perqindjeluleprekura_formagjalla", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioPerqindjeluleprekuraFormagjalla;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_praisantofage_lastar", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioPraisantofageLastar;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_lastareinfektuar", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeLastareinfektuar;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_vezenecelje", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeVezenecelje;

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
     * Set dataPraisAntofage
     *
     * @param \DateTime $dataPraisAntofage
     * @return MostraPraisAntofage
     */
    public function setDataPraisAntofage($dataPraisAntofage)
    {
        $this->dataPraisAntofage = $dataPraisAntofage;

        return $this;
    }

    /**
     * Get dataPraisAntofage
     *
     * @return \DateTime 
     */
    public function getDataPraisAntofage()
    {
        return $this->dataPraisAntofage;
    }

    /**
     * Set perqindjeLulePrekura
     *
     * @param float $perqindjeLulePrekura
     * @return MostraPraisAntofage
     */
    public function setPerqindjeLulePrekura($perqindjeLulePrekura)
    {
        $this->perqindjeLulePrekura = $perqindjeLulePrekura;

        return $this;
    }

    /**
     * Get perqindjeLulePrekura
     *
     * @return float 
     */
    public function getPerqindjeLulePrekura()
    {
        return $this->perqindjeLulePrekura;
    }

    /**
     * Set ratioPerqindjeluleprekuraFormagjalla
     *
     * @param float $ratioPerqindjeluleprekuraFormagjalla
     * @return MostraPraisAntofage
     */
    public function setRatioPerqindjeluleprekuraFormagjalla($ratioPerqindjeluleprekuraFormagjalla)
    {
        $this->ratioPerqindjeluleprekuraFormagjalla = $ratioPerqindjeluleprekuraFormagjalla;

        return $this;
    }

    /**
     * Get ratioPerqindjeluleprekuraFormagjalla
     *
     * @return float 
     */
    public function getRatioPerqindjeluleprekuraFormagjalla()
    {
        return $this->ratioPerqindjeluleprekuraFormagjalla;
    }

    /**
     * Set ratioPraisantofageLastar
     *
     * @param float $ratioPraisantofageLastar
     * @return MostraPraisAntofage
     */
    public function setRatioPraisantofageLastar($ratioPraisantofageLastar)
    {
        $this->ratioPraisantofageLastar = $ratioPraisantofageLastar;

        return $this;
    }

    /**
     * Get ratioPraisantofageLastar
     *
     * @return float 
     */
    public function getRatioPraisantofageLastar()
    {
        return $this->ratioPraisantofageLastar;
    }

    /**
     * Set perqindjeLastareinfektuar
     *
     * @param float $perqindjeLastareinfektuar
     * @return MostraPraisAntofage
     */
    public function setPerqindjeLastareinfektuar($perqindjeLastareinfektuar)
    {
        $this->perqindjeLastareinfektuar = $perqindjeLastareinfektuar;

        return $this;
    }

    /**
     * Get perqindjeLastareinfektuar
     *
     * @return float 
     */
    public function getPerqindjeLastareinfektuar()
    {
        return $this->perqindjeLastareinfektuar;
    }

    /**
     * Set perqindjeVezenecelje
     *
     * @param float $perqindjeVezenecelje
     * @return MostraPraisAntofage
     */
    public function setPerqindjeVezenecelje($perqindjeVezenecelje)
    {
        $this->perqindjeVezenecelje = $perqindjeVezenecelje;

        return $this;
    }

    /**
     * Get perqindjeVezenecelje
     *
     * @return float 
     */
    public function getPerqindjeVezenecelje()
    {
        return $this->perqindjeVezenecelje;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraPraisAntofage
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
