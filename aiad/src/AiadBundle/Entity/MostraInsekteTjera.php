<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MostraInsekteTjera
 *
 * @ORM\Table(name="mostra_insekte_tjera", indexes={@ORM\Index(name="fk_parcela_insekte_tjera_idx", columns={"parcela"})})
 * @ORM\Entity
 */
class MostraInsekteTjera
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
     * @ORM\Column(name="data_insekte_tjera", type="date", nullable=true)
     */
    private $dataInsekteTjera;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_pambuku_formagjalla_lule", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioPambukuFormagjallaLule;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_aranjelo_lastarprekur", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeAranjeloLastarprekur;

    /**
     * @var float
     *
     * @ORM\Column(name="aranjelo_larvagjateshkundjes", type="float", precision=10, scale=0, nullable=true)
     */
    private $aranjeloLarvagjateshkundjes;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_gusanobardhe_territur_grackadite", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioGusanobardheTerriturGrackadite;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_gusanobardhe_vrimadalje_peme", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioGusanobardheVrimadaljePeme;

    /**
     * @var float
     *
     * @ORM\Column(name="perqindje_gusanobardhe_pememesimptoma", type="float", precision=10, scale=0, nullable=true)
     */
    private $perqindjeGusanobardhePememesimptoma;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_mushkonjakurores_territur_grackedite", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioMushkonjakuroresTerriturGrackedite;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_mushkonjakurores_degezaprekura_peme", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioMushkonjakuroresDegezaprekuraPeme;

    /**
     * @var float
     *
     * @ORM\Column(name="ratio_zeusera_territur_grackedite", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratioZeuseraTerriturGrackedite;

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
     * Set dataInsekteTjera
     *
     * @param \DateTime $dataInsekteTjera
     * @return MostraInsekteTjera
     */
    public function setDataInsekteTjera($dataInsekteTjera)
    {
        $this->dataInsekteTjera = $dataInsekteTjera;

        return $this;
    }

    /**
     * Get dataInsekteTjera
     *
     * @return \DateTime 
     */
    public function getDataInsekteTjera()
    {
        return $this->dataInsekteTjera;
    }

    /**
     * Set ratioPambukuFormagjallaLule
     *
     * @param float $ratioPambukuFormagjallaLule
     * @return MostraInsekteTjera
     */
    public function setRatioPambukuFormagjallaLule($ratioPambukuFormagjallaLule)
    {
        $this->ratioPambukuFormagjallaLule = $ratioPambukuFormagjallaLule;

        return $this;
    }

    /**
     * Get ratioPambukuFormagjallaLule
     *
     * @return float 
     */
    public function getRatioPambukuFormagjallaLule()
    {
        return $this->ratioPambukuFormagjallaLule;
    }

    /**
     * Set perqindjeAranjeloLastarprekur
     *
     * @param float $perqindjeAranjeloLastarprekur
     * @return MostraInsekteTjera
     */
    public function setPerqindjeAranjeloLastarprekur($perqindjeAranjeloLastarprekur)
    {
        $this->perqindjeAranjeloLastarprekur = $perqindjeAranjeloLastarprekur;

        return $this;
    }

    /**
     * Get perqindjeAranjeloLastarprekur
     *
     * @return float 
     */
    public function getPerqindjeAranjeloLastarprekur()
    {
        return $this->perqindjeAranjeloLastarprekur;
    }

    /**
     * Set aranjeloLarvagjateshkundjes
     *
     * @param float $aranjeloLarvagjateshkundjes
     * @return MostraInsekteTjera
     */
    public function setAranjeloLarvagjateshkundjes($aranjeloLarvagjateshkundjes)
    {
        $this->aranjeloLarvagjateshkundjes = $aranjeloLarvagjateshkundjes;

        return $this;
    }

    /**
     * Get aranjeloLarvagjateshkundjes
     *
     * @return float 
     */
    public function getAranjeloLarvagjateshkundjes()
    {
        return $this->aranjeloLarvagjateshkundjes;
    }

    /**
     * Set ratioGusanobardheTerriturGrackadite
     *
     * @param float $ratioGusanobardheTerriturGrackadite
     * @return MostraInsekteTjera
     */
    public function setRatioGusanobardheTerriturGrackadite($ratioGusanobardheTerriturGrackadite)
    {
        $this->ratioGusanobardheTerriturGrackadite = $ratioGusanobardheTerriturGrackadite;

        return $this;
    }

    /**
     * Get ratioGusanobardheTerriturGrackadite
     *
     * @return float 
     */
    public function getRatioGusanobardheTerriturGrackadite()
    {
        return $this->ratioGusanobardheTerriturGrackadite;
    }

    /**
     * Set ratioGusanobardheVrimadaljePeme
     *
     * @param float $ratioGusanobardheVrimadaljePeme
     * @return MostraInsekteTjera
     */
    public function setRatioGusanobardheVrimadaljePeme($ratioGusanobardheVrimadaljePeme)
    {
        $this->ratioGusanobardheVrimadaljePeme = $ratioGusanobardheVrimadaljePeme;

        return $this;
    }

    /**
     * Get ratioGusanobardheVrimadaljePeme
     *
     * @return float 
     */
    public function getRatioGusanobardheVrimadaljePeme()
    {
        return $this->ratioGusanobardheVrimadaljePeme;
    }

    /**
     * Set perqindjeGusanobardhePememesimptoma
     *
     * @param float $perqindjeGusanobardhePememesimptoma
     * @return MostraInsekteTjera
     */
    public function setPerqindjeGusanobardhePememesimptoma($perqindjeGusanobardhePememesimptoma)
    {
        $this->perqindjeGusanobardhePememesimptoma = $perqindjeGusanobardhePememesimptoma;

        return $this;
    }

    /**
     * Get perqindjeGusanobardhePememesimptoma
     *
     * @return float 
     */
    public function getPerqindjeGusanobardhePememesimptoma()
    {
        return $this->perqindjeGusanobardhePememesimptoma;
    }

    /**
     * Set ratioMushkonjakuroresTerriturGrackedite
     *
     * @param float $ratioMushkonjakuroresTerriturGrackedite
     * @return MostraInsekteTjera
     */
    public function setRatioMushkonjakuroresTerriturGrackedite($ratioMushkonjakuroresTerriturGrackedite)
    {
        $this->ratioMushkonjakuroresTerriturGrackedite = $ratioMushkonjakuroresTerriturGrackedite;

        return $this;
    }

    /**
     * Get ratioMushkonjakuroresTerriturGrackedite
     *
     * @return float 
     */
    public function getRatioMushkonjakuroresTerriturGrackedite()
    {
        return $this->ratioMushkonjakuroresTerriturGrackedite;
    }

    /**
     * Set ratioMushkonjakuroresDegezaprekuraPeme
     *
     * @param float $ratioMushkonjakuroresDegezaprekuraPeme
     * @return MostraInsekteTjera
     */
    public function setRatioMushkonjakuroresDegezaprekuraPeme($ratioMushkonjakuroresDegezaprekuraPeme)
    {
        $this->ratioMushkonjakuroresDegezaprekuraPeme = $ratioMushkonjakuroresDegezaprekuraPeme;

        return $this;
    }

    /**
     * Get ratioMushkonjakuroresDegezaprekuraPeme
     *
     * @return float 
     */
    public function getRatioMushkonjakuroresDegezaprekuraPeme()
    {
        return $this->ratioMushkonjakuroresDegezaprekuraPeme;
    }

    /**
     * Set ratioZeuseraTerriturGrackedite
     *
     * @param float $ratioZeuseraTerriturGrackedite
     * @return MostraInsekteTjera
     */
    public function setRatioZeuseraTerriturGrackedite($ratioZeuseraTerriturGrackedite)
    {
        $this->ratioZeuseraTerriturGrackedite = $ratioZeuseraTerriturGrackedite;

        return $this;
    }

    /**
     * Get ratioZeuseraTerriturGrackedite
     *
     * @return float 
     */
    public function getRatioZeuseraTerriturGrackedite()
    {
        return $this->ratioZeuseraTerriturGrackedite;
    }

    /**
     * Set parcela
     *
     * @param \AiadBundle\Entity\ParcelaIdentifikimi $parcela
     * @return MostraInsekteTjera
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
