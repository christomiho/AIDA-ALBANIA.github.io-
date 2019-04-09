<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraPraisKarpofage
 *
 * @ORM\Table(name="mostra_prais_karpofage", indexes={@ORM\Index(name="fk_parcela_karpofage_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraPraisKarpofage
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
     * @ORM\Column(name="data_prais_karpofage", type="date", nullable=true)
     */
    private $dataPraisKarpofage;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_frutaprekura_formategjalla", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeFrutaprekuraFormategjalla;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_vezetecelura", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeVezetecelura;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_vezebosh", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeVezebosh;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_frutanetoketotal_peme", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioFrutanetoketotalPeme;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_frutanetokeprais_peme", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioFrutanetokepraisPeme;

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
     * Set dataPraisKarpofage
     *
     * @param \DateTime $dataPraisKarpofage
     * @return MostraPraisKarpofage
     */
    public function setDataPraisKarpofage($dataPraisKarpofage)
    {
        $this->dataPraisKarpofage = $dataPraisKarpofage;

        return $this;
    }

    /**
     * Get dataPraisKarpofage
     *
     * @return \DateTime 
     */
    public function getDataPraisKarpofage()
    {
        return $this->dataPraisKarpofage;
    }

    /**
     * Set perqindjeFrutaprekuraFormategjalla
     *
     * @param float $perqindjeFrutaprekuraFormategjalla
     * @return MostraPraisKarpofage
     */
    public function setPerqindjeFrutaprekuraFormategjalla($perqindjeFrutaprekuraFormategjalla)
    {
        $this->perqindjeFrutaprekuraFormategjalla = $perqindjeFrutaprekuraFormategjalla;

        return $this;
    }

    /**
     * Get perqindjeFrutaprekuraFormategjalla
     *
     * @return float 
     */
    public function getPerqindjeFrutaprekuraFormategjalla()
    {
        return $this->perqindjeFrutaprekuraFormategjalla;
    }

    /**
     * Set perqindjeVezetecelura
     *
     * @param float $perqindjeVezetecelura
     * @return MostraPraisKarpofage
     */
    public function setPerqindjeVezetecelura($perqindjeVezetecelura)
    {
        $this->perqindjeVezetecelura = $perqindjeVezetecelura;

        return $this;
    }

    /**
     * Get perqindjeVezetecelura
     *
     * @return float 
     */
    public function getPerqindjeVezetecelura()
    {
        return $this->perqindjeVezetecelura;
    }

    /**
     * Set perqindjeVezebosh
     *
     * @param float $perqindjeVezebosh
     * @return MostraPraisKarpofage
     */
    public function setPerqindjeVezebosh($perqindjeVezebosh)
    {
        $this->perqindjeVezebosh = $perqindjeVezebosh;

        return $this;
    }

    /**
     * Get perqindjeVezebosh
     *
     * @return float 
     */
    public function getPerqindjeVezebosh()
    {
        return $this->perqindjeVezebosh;
    }

    /**
     * Set ratioFrutanetoketotalPeme
     *
     * @param float $ratioFrutanetoketotalPeme
     * @return MostraPraisKarpofage
     */
    public function setRatioFrutanetoketotalPeme($ratioFrutanetoketotalPeme)
    {
        $this->ratioFrutanetoketotalPeme = $ratioFrutanetoketotalPeme;

        return $this;
    }

    /**
     * Get ratioFrutanetoketotalPeme
     *
     * @return float 
     */
    public function getRatioFrutanetoketotalPeme()
    {
        return $this->ratioFrutanetoketotalPeme;
    }

    /**
     * Set ratioFrutanetokepraisPeme
     *
     * @param float $ratioFrutanetokepraisPeme
     * @return MostraPraisKarpofage
     */
    public function setRatioFrutanetokepraisPeme($ratioFrutanetokepraisPeme)
    {
        $this->ratioFrutanetokepraisPeme = $ratioFrutanetokepraisPeme;

        return $this;
    }

    /**
     * Get ratioFrutanetokepraisPeme
     *
     * @return float 
     */
    public function getRatioFrutanetokepraisPeme()
    {
        return $this->ratioFrutanetokepraisPeme;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraPraisKarpofage
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
