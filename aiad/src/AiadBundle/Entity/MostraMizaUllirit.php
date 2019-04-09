<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraMizaUllirit
 *
 * @ORM\Table(name="mostra_miza_ullirit", indexes={@ORM\Index(name="fk_parcela_miza_ullirit_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraMizaUllirit
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
     * @ORM\Column(name="data_miza_ullirit", type="date", nullable=true)
     */
    private $dataMizaUllirit;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_nrmiza_kurthdite", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioNrmizaKurthdite;

    /**
     * @var float
     *
     * @ORM\Column(name="nr_femra_vezhguara", type="float", precision=10, scale=0, nullable=true)
     */
    private $nrFemraVezhguara;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_femraveze", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeFemraveze;

    /**
     * @var float
     *
     * @ORM\Column(name="indeksi_rrezikut", type="float", precision=10, scale=0, nullable=true)
     */
    private $indeksiRrezikut;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_nrmiza_pllakedite", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioNrmizaPllakedite;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_fruta_pickuara", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeFrutaPickuara;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_fruta_mizegjalle", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeFrutaMizegjalle;

    /**
     * @var float
     *
     * @ORM\Column(name="fruta_vrimedaljemize", type="float", precision=10, scale=0, nullable=true)
     */
    private $frutaVrimedaljemize;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_mizaparazite", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeMizaparazite;

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
     * Set dataMizaUllirit
     *
     * @param \DateTime $dataMizaUllirit
     * @return MostraMizaUllirit
     */
    public function setDataMizaUllirit($dataMizaUllirit)
    {
        $this->dataMizaUllirit = $dataMizaUllirit;

        return $this;
    }

    /**
     * Get dataMizaUllirit
     *
     * @return \DateTime 
     */
    public function getDataMizaUllirit()
    {
        return $this->dataMizaUllirit;
    }

    /**
     * Set ratioNrmizaKurthdite
     *
     * @param float $ratioNrmizaKurthdite
     * @return MostraMizaUllirit
     */
    public function setRatioNrmizaKurthdite($ratioNrmizaKurthdite)
    {
        $this->ratioNrmizaKurthdite = $ratioNrmizaKurthdite;

        return $this;
    }

    /**
     * Get ratioNrmizaKurthdite
     *
     * @return float 
     */
    public function getRatioNrmizaKurthdite()
    {
        return $this->ratioNrmizaKurthdite;
    }

    /**
     * Set nrFemraVezhguara
     *
     * @param float $nrFemraVezhguara
     * @return MostraMizaUllirit
     */
    public function setNrFemraVezhguara($nrFemraVezhguara)
    {
        $this->nrFemraVezhguara = $nrFemraVezhguara;

        return $this;
    }

    /**
     * Get nrFemraVezhguara
     *
     * @return float 
     */
    public function getNrFemraVezhguara()
    {
        return $this->nrFemraVezhguara;
    }

    /**
     * Set perqindjeFemraveze
     *
     * @param float $perqindjeFemraveze
     * @return MostraMizaUllirit
     */
    public function setPerqindjeFemraveze($perqindjeFemraveze)
    {
        $this->perqindjeFemraveze = $perqindjeFemraveze;

        return $this;
    }

    /**
     * Get perqindjeFemraveze
     *
     * @return float 
     */
    public function getPerqindjeFemraveze()
    {
        return $this->perqindjeFemraveze;
    }

    /**
     * Set indeksiRrezikut
     *
     * @param float $indeksiRrezikut
     * @return MostraMizaUllirit
     */
    public function setIndeksiRrezikut($indeksiRrezikut)
    {
        $this->indeksiRrezikut = $indeksiRrezikut;

        return $this;
    }

    /**
     * Get indeksiRrezikut
     *
     * @return float 
     */
    public function getIndeksiRrezikut()
    {
        return $this->indeksiRrezikut;
    }

    /**
     * Set ratioNrmizaPllakedite
     *
     * @param float $ratioNrmizaPllakedite
     * @return MostraMizaUllirit
     */
    public function setRatioNrmizaPllakedite($ratioNrmizaPllakedite)
    {
        $this->ratioNrmizaPllakedite = $ratioNrmizaPllakedite;

        return $this;
    }

    /**
     * Get ratioNrmizaPllakedite
     *
     * @return float 
     */
    public function getRatioNrmizaPllakedite()
    {
        return $this->ratioNrmizaPllakedite;
    }

    /**
     * Set perqindjeFrutaPickuara
     *
     * @param float $perqindjeFrutaPickuara
     * @return MostraMizaUllirit
     */
    public function setPerqindjeFrutaPickuara($perqindjeFrutaPickuara)
    {
        $this->perqindjeFrutaPickuara = $perqindjeFrutaPickuara;

        return $this;
    }

    /**
     * Get perqindjeFrutaPickuara
     *
     * @return float 
     */
    public function getPerqindjeFrutaPickuara()
    {
        return $this->perqindjeFrutaPickuara;
    }

    /**
     * Set perqindjeFrutaMizegjalle
     *
     * @param float $perqindjeFrutaMizegjalle
     * @return MostraMizaUllirit
     */
    public function setPerqindjeFrutaMizegjalle($perqindjeFrutaMizegjalle)
    {
        $this->perqindjeFrutaMizegjalle = $perqindjeFrutaMizegjalle;

        return $this;
    }

    /**
     * Get perqindjeFrutaMizegjalle
     *
     * @return float 
     */
    public function getPerqindjeFrutaMizegjalle()
    {
        return $this->perqindjeFrutaMizegjalle;
    }

    /**
     * Set frutaVrimedaljemize
     *
     * @param float $frutaVrimedaljemize
     * @return MostraMizaUllirit
     */
    public function setFrutaVrimedaljemize($frutaVrimedaljemize)
    {
        $this->frutaVrimedaljemize = $frutaVrimedaljemize;

        return $this;
    }

    /**
     * Get frutaVrimedaljemize
     *
     * @return float 
     */
    public function getFrutaVrimedaljemize()
    {
        return $this->frutaVrimedaljemize;
    }

    /**
     * Set perqindjeMizaparazite
     *
     * @param float $perqindjeMizaparazite
     * @return MostraMizaUllirit
     */
    public function setPerqindjeMizaparazite($perqindjeMizaparazite)
    {
        $this->perqindjeMizaparazite = $perqindjeMizaparazite;

        return $this;
    }

    /**
     * Get perqindjeMizaparazite
     *
     * @return float 
     */
    public function getPerqindjeMizaparazite()
    {
        return $this->perqindjeMizaparazite;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraMizaUllirit
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
